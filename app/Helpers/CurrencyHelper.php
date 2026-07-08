<?php

namespace App\Helpers;

use App\Models\Asset\GapCurrency;
use App\FinicialCalculator as Calculator;
use Illuminate\Support\Facades\Log;

/**
 * CurrencyHelper
 *
 * Handles all currency conversion and exchange rate logic.
 * Extracted from GapExchangeHelper — non-currency methods have
 * been moved to AccountMapper or FavouriteService.
 */
class CurrencyHelper
{
    /**
     * Convert an amount from the user's base currency to a target currency.
     *
     * If $preferred_base_currency is provided, the logic inverts:
     * it converts FROM the asset currency TO the preferred display currency.
     *
     * Falls back to the original amount on any failure to avoid breaking UI.
     */
    public static function convert($user, string $target_currency, float $money, int $automated = 1,$preferred_base_currency = ''): float
    {
        try {
            $calculator        = Calculator::where('user_id', $user->id)->first();
            $system_currencies = GapCurrency::where('user_id', 0)->first();
            $manual_currencies = GapCurrency::where('user_id', $user->id)->first();

            $base_currency   = $calculator?->currency
                ? self::extractCode($calculator->currency)
                : 'USD';

            $target_currency = self::normalizeCode($target_currency);

            // Invert base/target when a preferred display currency is set
            if (!empty($preferred_base_currency)) {
                $base_currency   = $target_currency;
                $target_currency = self::normalizeCode($preferred_base_currency);
            }

            if ($base_currency === $target_currency) {
                return round($money, 2);
            }

            $rates = self::getRates($system_currencies, $manual_currencies, $automated);

            if (!$rates) {
                return round($money, 2);
            }

            return round(self::calculate($money, $base_currency, $target_currency, $rates), 2);

        } catch (\Exception $e) {
            Log::error('Currency conversion failed', [
                'user_id'         => $user->id,
                'target_currency' => $target_currency,
                'amount'          => $money,
                'error'           => $e->getMessage(),
            ]);

            return round($money, 2);
        }
    }

    /**
     * Get the direct exchange rate between two currency codes.
     * Returns null if either currency is not found in the system rates.
     */
    public static function getRate(string $from, string $to): ?float
    {
        if ($from === $to) return 1.0;

        $system = GapCurrency::where('user_id', 0)->first();

        if (!$system?->currencies) return null;

        $rates = json_decode($system->currencies, true);

        try {
            return self::calculate(1, $from, $to, $rates);
        } catch (\Exception $e) {
            Log::error('Exchange rate lookup failed', ['from' => $from, 'to' => $to, 'error' => $e->getMessage()]);
            return null;
        }
    }

    /**
     * Return all available currency codes from the system rate table.
     */
    public static function availableCurrencies(): array
    {
        $system = GapCurrency::where('user_id', 0)->first();

        if (!$system?->currencies) return [];

        return array_keys(json_decode($system->currencies, true));
    }

    /**
     * Rebuild all system/manual rates relative to a given base currency.
     * Used to display exchange rates from the user's own currency perspective.
     *
     * @param  array  $rates             Raw USD-based rates
     * @param  string $baseCurrencyCode  The currency to rebase to
     * @param  array  $popularCurrencies List of popular currency objects with a 'currency' key
     */
    public static function rebaseRates(array $rates, string $baseCurrencyCode, array $popularCurrencies): array
    {
        // Build a lookup of popular currency codes for filtering
        $popular = ['USD' => true];
        foreach ($popularCurrencies as $item) {
            $popular[self::extractCode($item['currency'])] = true;
        }

        // No rebasing needed when base is already USD
        if ($baseCurrencyCode === 'USD') {
            return array_merge(
                array_filter($rates, fn($code) => isset($popular[$code]), ARRAY_FILTER_USE_KEY),
                ['USD' => 1.0]
            );
        }

        if (!isset($rates[$baseCurrencyCode])) {
            return array_merge(
                array_filter($rates, fn($code) => isset($popular[$code]), ARRAY_FILTER_USE_KEY),
                ['USD' => 1.0]
            );
        }

        $baseRate = $rates[$baseCurrencyCode];
        $result   = ['USD' => 1 / $baseRate];

        foreach ($rates as $code => $rate) {
            if (!isset($popular[$code]) || $code === 'USD') continue;
            $result[$code] = ($code === $baseCurrencyCode) ? 1.0 : $rate / $baseRate;
        }

        return $result;
    }

    /**
     * Extract the ISO currency code (e.g. "USD") from a stored currency string
     * which may be in the format "Flag USD" or simply "USD".
     */
    public static function extractCode(string $currency): string
    {
        if (strlen($currency) === 3) return strtoupper($currency);

        $parts = explode(' ', $currency);
        return strtoupper($parts[1] ?? 'USD');
    }

    // -------------------------------------------------------------------------
    // Private helpers
    // -------------------------------------------------------------------------

    /**
     * Normalise any currency string to a 3-letter ISO code.
     */
    private static function normalizeCode(?string $currency): string
    {
        if (!$currency) return 'USD';
        if (strlen($currency) === 3) return strtoupper($currency);

        $parts = explode(' ', $currency);
        return strtoupper($parts[1] ?? 'USD');
    }

    /**
     * Resolve the correct rate table based on automation preference.
     * Falls back to system rates when manual rates are unavailable.
     */
    private static function getRates(?GapCurrency $system, ?GapCurrency $manual, int $automated): ?array
    {
        if ($automated && $system?->currencies) {
            return json_decode($system->currencies, true);
        }

        if (!$automated && $manual?->currencies) {
            return json_decode($manual->currencies, true);
        }

        return $system?->currencies ? json_decode($system->currencies, true) : null;
    }

    /**
     * Perform the cross-rate conversion.
     * All rates are stored relative to USD, so non-USD pairs route through USD.
     *
     * @throws \Exception if a required currency code is missing from the rate table
     */
    private static function calculate(float $amount, string $from, string $to, array $rates): float
    {
        if (!isset($rates[$from]) && $from !== 'USD') {
            throw new \Exception("Currency {$from} not found in rate table.");
        }
        if (!isset($rates[$to]) && $to !== 'USD') {
            throw new \Exception("Currency {$to} not found in rate table.");
        }

        if ($from === 'USD') return $amount * $rates[$to];
        if ($to === 'USD')   return $amount / $rates[$from];

        // Cross-rate via USD
        return ($amount / $rates[$from]) * $rates[$to];
    }
}
