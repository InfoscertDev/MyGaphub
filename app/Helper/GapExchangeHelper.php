<?php

namespace App\Helper;

use App\Asset\GapCurrency;
use App\UserAudit as Audit;
use App\Wheel\LiabilityAccount as Liability;
use App\Wheel\MortgageAccount as Mortgage;
use App\SevenG\DeptFin as Debt;
use App\Helper\IncomeHelper;
use Illuminate\Support\Facades\Log;

use App\SevenG\BespokeKPI;
use App\Wheel\BespokeWheel;
use App\Wheel\CashAccount;
use App\FinicialCalculator as Calculator;
use stdClass;

class GapExchangeHelper
{


    /**
     * Get user's preferred currency
     *
     * @param \App\Models\User $user
     * @return string|null
     */
    private static function getUserPreferredCurrency($user)
    {
        $preference = \App\Models\UserSetting::where('user_id', $user->id)
                            ->where('setting_key', 'preferences')
                            ->first();

        return $preference ? ($preference->setting_value['preferred_currency'] ?? null) : null;
    }

    /**
     * Convert currency from base currency to target currency.
     *
     * If a preferred base currency is specified, the conversion will be reversed:
     * the system will convert from $preferred_base_currency to the user's base currency
     * (which becomes the new target currency).
     *
     * Example:
     *   - Default: 100 USD → EUR
     *   - Preferred: preferred_base_currency = GBP
     *       => Converts 100 GBP → USD (user's base currency)
     *
     * @param \App\Models\User $user
     * @param string $target_currency  The currency to convert to (ignored if preferred base is set)
     * @param float $money             The amount to convert
     * @param int $automated           Whether to use automated rates (1 = system, 0 = manual)
     * @param string $preferred_base_currency (optional)  Override the base currency logic
     * @return float
     */
    public static function convert_currency($user, $target_currency, $money, $automated = 1, $preferred_base_currency = '')
    {
        try {
            // Get calculator and currency data
            $calculator = Calculator::where('user_id', $user->id)->first();
            $system_currencies = GapCurrency::where('user_id', 0)->first();
            $manual_currencies = GapCurrency::where('user_id', $user->id)->first();

            // Determine base currency (user’s main currency)
            $base_currency = $calculator && $calculator->currency
                ? self::extractCurrencyCode($calculator->currency)
                : 'USD';

            // Normalize target currency
            $target_currency = self::normalizeCurrencyCode($target_currency);

            // Handle preferred base currency override
            if (!empty($preferred_base_currency)) {
                $preferred_base_currency = self::normalizeCurrencyCode($preferred_base_currency);

                // Swap logic: we are now converting from the asset (target_currency) to the preferred currency
                $base_currency = $target_currency;        // asset currency (source)
                $target_currency = $preferred_base_currency; // preferred display currency (destination)
            }


            // If same currency, return original amount
            if ($base_currency === $target_currency) {
                return round($money, 2);
            }

            // Get exchange rates
            $exchange_rates = self::getExchangeRates($system_currencies, $manual_currencies, $automated);

            if (!$exchange_rates) {
                return round($money, 2);
            }

            // Perform conversion
            $converted_amount = self::performConversion(
                $money,
                $base_currency,
                $target_currency,
                $exchange_rates
            );

            return round($converted_amount, 2);

        } catch (\Exception $e) {
            Log::error('Currency conversion failed', [
                'user_id' => $user->id,
                'target_currency' => $target_currency,
                'money' => $money,
                'error' => $e->getMessage()
            ]);

            return round($money, 2);
        }
    }



    /**
     * Extract currency code from currency string
     *
     * @param string $currency_string
     * @return string
     */
    public static function extractCurrencyCode($currency_string)
    {
        if (strlen($currency_string) === 3) {
            return strtoupper($currency_string);
        }

        $parts = explode(" ", $currency_string);
        return strtoupper($parts[1] ?? 'USD');
    }

    public static function convertRatesToBaseCurrency(array $rates, string $baseCurrencyCode, array $popularCurrencies): array
    {
        // Extract currency codes from popular currencies
        $popularCurrencyCodes = [];
        foreach ($popularCurrencies as $popular) {
            $code = GapExchangeHelper::extractCurrencyCode($popular['currency']);
            $popularCurrencyCodes[$code] = true;
        }

        // Always include USD as it's the reference currency
        $popularCurrencyCodes['USD'] = true;

        // If base currency is USD, no conversion needed
        if ($baseCurrencyCode === 'USD') {
            $result = array_filter($rates, function ($code) use ($popularCurrencyCodes) {
                return isset($popularCurrencyCodes[$code]);
            }, ARRAY_FILTER_USE_KEY);

            // Add USD = 1.0 when base is USD
            $result['USD'] = 1.0;
            return $result;
        }

        // Check if base currency exists in rates
        if (!isset($rates[$baseCurrencyCode])) {
            $result = array_filter($rates, function ($code) use ($popularCurrencyCodes) {
                return isset($popularCurrencyCodes[$code]);
            }, ARRAY_FILTER_USE_KEY);

            // Add USD = 1.0 as fallback
            $result['USD'] = 1.0;
            return $result;
        }

        $baseRate = $rates[$baseCurrencyCode];

        // Convert all rates to base currency
        $convertedRates = [];

        // Add USD explicitly (1 USD = 1/baseRate in base currency)
        $convertedRates['USD'] = 1 / $baseRate;

        // Then add other popular currencies
        foreach ($rates as $currencyCode => $rate) {
            // Only include popular currencies (excluding USD since we already added it)
            if (isset($popularCurrencyCodes[$currencyCode]) && $currencyCode !== 'USD') {
                if ($currencyCode === $baseCurrencyCode) {
                    $convertedRates[$currencyCode] = 1.0;
                } else {
                    $convertedRates[$currencyCode] = $rate / $baseRate;
                }
            }
        }

        return $convertedRates;
    }


    /**
     * Normalize currency code
     *
     * @param string|null $currency
     * @return string
     */
    private static function normalizeCurrencyCode($currency)
    {
        if (!$currency) {
            return 'USD';
        }

        if (strlen($currency) === 3) {
            return strtoupper($currency);
        }

        $parts = explode(" ", $currency);
        return strtoupper($parts[1] ?? 'USD');
    }


    /**
     * Get exchange rates based on automation setting
     *
     * @param \App\Models\GapCurrency|null $system_currencies
     * @param \App\Models\GapCurrency|null $manual_currencies
     * @param int $automated
     * @return array|null
     */
    private static function getExchangeRates($system_currencies, $manual_currencies, $automated)
    {
        if ($automated && $system_currencies && $system_currencies->currencies) {
            return json_decode($system_currencies->currencies, true);
        }

        if (!$automated && $manual_currencies && $manual_currencies->currencies) {
            return json_decode($manual_currencies->currencies, true);
        }

        // Fallback to system currencies if manual not available
        if ($system_currencies && $system_currencies->currencies) {
            return json_decode($system_currencies->currencies, true);
        }

        return null;
    }

    /**
     * Perform the actual currency conversion
     *
     * @param float $amount
     * @param string $from_currency
     * @param string $to_currency
     * @param array $rates
     * @return float
     */
    private static function performConversion($amount, $from_currency, $to_currency, $rates)
    {
        // Check if currencies exist in rates
        if (!isset($rates[$from_currency]) && $from_currency !== 'USD') {
            throw new \Exception("Base currency {$from_currency} not found in exchange rates");
        }

        if (!isset($rates[$to_currency]) && $to_currency !== 'USD') {
            throw new \Exception("Target currency {$to_currency} not found in exchange rates");
        }

        // If converting from USD
        if ($from_currency === 'USD') {
            return $amount * $rates[$to_currency];
        }

        // If converting to USD
        if ($to_currency === 'USD') {
            return $amount / $rates[$from_currency];
        }

        // Converting between two non-USD currencies
        // First convert from source currency to USD, then USD to target currency
        $usd_amount = $amount / $rates[$from_currency];
        return $usd_amount * $rates[$to_currency];
    }

    /**
     * Get available currencies from system
     *
     * @return array
     */
    public static function getAvailableCurrencies()
    {
        $system_currencies = GapCurrency::where('user_id', 0)->first();

        if (!$system_currencies || !$system_currencies->currencies) {
            return [];
        }

        $rates = json_decode($system_currencies->currencies, true);
        return array_keys($rates);
    }

    /**
     * Get exchange rate between two currencies
     *
     * @param string $from_currency
     * @param string $to_currency
     * @return float|null
     */
    public static function getExchangeRate($from_currency, $to_currency)
    {
        if ($from_currency === $to_currency) {
            return 1.0;
        }

        $system_currencies = GapCurrency::where('user_id', 0)->first();

        if (!$system_currencies || !$system_currencies->currencies) {
            return null;
        }

        $rates = json_decode($system_currencies->currencies, true);

        try {
            return self::performConversion(1, $from_currency, $to_currency, $rates);
        } catch (\Exception $e) {
            Log::error('Failed to get exchange rate', [
                'from' => $from_currency,
                'to' => $to_currency,
                'error' => $e->getMessage()
            ]);
            return null;
        }
    }

    public static function reap_favourite($user){
        $audit = Audit::where('user_id', $user->id)->first();
        $wheel = [];
        if (!$audit->reap_favourite) {
            $audit->reap_favourite = $wheel;
        }else{
            $audit->reap_favourite = json_decode($audit->reap_favourite);
        }
        return (array)($audit->reap_favourite);
    }

    public static function paginate_favourite($reap_favourite,$pageNumber = 0){
        $perpage = 6;
        $pagedArray = array_chunk($reap_favourite, $perpage, true);
        $total_reap = count($reap_favourite);
        $last_page = ceil($total_reap / $perpage);
        $favourite  = $pagedArray[$pageNumber - 1];
        $current_page = $pageNumber;
        return compact( 'favourite', 'total_reap', 'last_page','current_page');
    }


    public static function addReapFavourite($user, $asset){
        $audit = Audit::where('user_id', $user->id)->first();
        $wheel = [];
        if (!$audit->reap_favourite) {
            $wheel = $wheel;
        }else{
            $wheel = json_decode($audit->reap_favourite);
        }
        $wheel = (array)$wheel;
        if (!in_array($asset, $wheel)) {
            array_unshift($wheel,$asset);
        }
        $audit->reap_favourite = json_encode($wheel);
        $audit->save();
        return $audit;
    }

    public static function removeReapFavourite($user, $asset){
        $reap_favourite = GapExchangeHelper::reap_favourite($user);
        $audit = Audit::where('user_id', $user->id)->first();
        if(count($reap_favourite)){
            // if (($key = array_search($asset, $reap_favourite)) !== false) {
            //     unset($reap_favourite[$key]);
            // }
            $key = array_search($asset, $reap_favourite );
            unset($reap_favourite[$key]);
            $wheel = array_values($reap_favourite);
            // var_dump( $audit->reap_favourite, $key ,json_encode($wheel)); return;
            $audit->reap_favourite = json_encode($wheel) ;
            $audit->save();
        }
        return $audit;
    }

    public static function ganp_favourite($user){
        $audit = Audit::where('user_id', $user->id)->first();
        $wheel = [];
        if (!$audit->ganp_favourite) {
            $audit->ganp_favourite = $wheel;
        }else{
            $audit->ganp_favourite = json_decode($audit->ganp_favourite);
        }
        return (array)($audit->ganp_favourite);
    }


    public static function addGanpFavourite($user, $asset){
        $audit = Audit::where('user_id', $user->id)->first();
        $wheel = [];
        if (!$audit->ganp_favourite) {
            $wheel = $wheel;
        }else{
            $wheel = json_decode($audit->ganp_favourite);
        }
        $wheel = (array)$wheel;
        if (!in_array($asset, $wheel)) {
            array_unshift($wheel,$asset);
        }
        $audit->ganp_favourite = json_encode($wheel);
        $audit->save();
        return $audit;
    }

    public static function removeGanpFavourite($user, $asset){
        $ganp_favourite = GapExchangeHelper::ganp_favourite($user);
        $audit = Audit::where('user_id', $user->id)->first();
        if(count($ganp_favourite)){
            // if (($key = array_search($asset, $ganp_favourite)) !== false) {
            //     unset($ganp_favourite[$key]);
            // }
            $key = array_search($asset, $ganp_favourite );
            unset($ganp_favourite[$key]);
            $wheel = array_values($ganp_favourite);
            // var_dump( $audit->ganp_favourite, $key ,json_encode($wheel)); return;
            $audit->ganp_favourite = json_encode($wheel) ;
            $audit->save();
        }
        return $audit;
    }

    public static function availabeleMortgages($user){
        $primary_resident = Mortgage::where('user_id', $user->id)->where('secured_against','Primary Residential Home')
                                ->where('isArchive', 0)->first();
        $primary_debt = Debt::where('user_id', $user->id)->first();
        // var_dump($primary_debt->isArchive);
        $primary_exist = ($primary_resident || $primary_debt->isArchive == 0) ? true : false;
        $residential = WheelClass::primaryEquityDetails($user)['primary'];

        $debt = Debt::where('user_id', $user->id)->where('equity_id', 0)->first();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $mortgages = Mortgage::where('user_id', $user->id)->where('equity_id', 0)->where('isArchive', 0)
                            ->where('secured_against','!=','Primary Residential Home')->latest()->get();
        if($debt) $debt = GapExchangeHelper::switchToDebtAccount($debt, 'Debt', $calculator->currency);

        if($debt)  $mortgages_available = [$debt];
        else $mortgages_available = [];
        foreach($mortgages as $mortgage) array_push($mortgages_available, $mortgage);
        $countries = HelperClass::countries();
        $gap_currencies = GapExchangeHelper::gapCurrencies($user);
        return compact('mortgages_available', 'countries', 'gap_currencies', 'primary_exist', 'residential');
    }

    // public function get

    public static function gapCurrencies($user)
    {
        $manual_currencies = GapCurrency::where('user_id', $user->id)->first();
        $system_currencies = GapCurrency::where('user_id', 0)->first();
        $calculator = Calculator::where('user_id', $user->id)->first();

        $user_currency = $calculator ? $calculator->currency : null;
        $bcurrency = $user_currency
            ? explode(" ", $user_currency)[1]
            : 'USD';

        if (!$system_currencies) {
            return compact('user_currency','manual_currencies', 'system_currencies');
        }

        $manual_rates = json_decode($system_currencies->currencies ?? '{}');

        if (!$manual_currencies) {

            $manual_currencies = new GapCurrency();
            $manual_currencies->user_id = $user->id;

            $currency_rate = property_exists($manual_rates, $bcurrency)
                ? $manual_rates->$bcurrency
                : 1;

            $eur_rate = property_exists($manual_rates, 'EUR')
                ? $manual_rates->EUR
                : 1;

            $base = $currency_rate == 0 ? 1 : ($eur_rate / $currency_rate);

            foreach ($manual_rates as $key => $rate) {
                $manual_rates->$key = round(($rate * $base), 4);
            }

            $manual_currencies->base = $bcurrency;
            $manual_currencies->currencies = json_encode($manual_rates);
            $manual_currencies->save();
        }

        $current = json_decode($system_currencies->currencies ?? '{}');
        $base = 1;

        foreach ($current as $key => $rate) {
            $current->$key = round(($rate * $base), 4);
        }

        $system_currencies->currencies = json_encode($current);

        return compact('user_currency','manual_currencies', 'system_currencies');
    }

    public static function gapSystemCurrencies($user){
        $system_currencies = GapCurrency::where('user_id', 0)->first();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $user_currency = $calculator->currency;

        // Extract base currency code
        $bcurrency = explode(" ", $user_currency)[1];

        // Process system currencies only
        // if($system_currencies){
        //     $current = json_decode($system_currencies->currencies);

        //     $base = $current->EUR / $current->$bcurrency;

        //     foreach ($current as $key => &$rate) {
        //         $current->$key = round(($rate * $base), 4);
        //     }

        //     $system_currencies->currencies = json_encode($current);
        // }

        return compact('user_currency', 'system_currencies');
    }

    public static function switchToCashAccount($account, $name, $currency){
        $account->account_name = $name;
        $account->account_purpose = GapExchangeHelper::autoCashPurpose($name);
        $account->account_alias = strtolower($name);
        $account->account_currency = $currency;
        return $account;
    }

    public static function switchToCreditAccount($account, $name, $currency){
        $account->alias = $name;
        $account->account_currency = $currency;
        $account->account_type = ($account->account_type ? $account->account_type: 'Others');
        return $account;
    }

    public static function switchToDebtAccount($account, $name, $currency){
        $account->alias = $name;
        $account->id = -1;
        $account->account_currency = $currency;
        $account->open_balance = $account->baseline;
        $account->current_balance = $account->current;
        $account->secured_against = 'Primary Residential Home';
        // $account->account_type = ($account->account_type ? $account->account_type: 'Others');
        return $account;
    }
    public static function emptyMortgage(){
        $account = new stdClass();
        $account->alias = '';
        $account->id = 0;
        $account->account_currency = '';
        $account->open_balance = 0;
        $account->current_balance = 0;
        $account->secured_against = '';
        return $account;
    }

    private static function autoCashPurpose($name){
        $name = strtolower($name); $purpose = '';
        if($name == 'alpha'){
            $purpose = 'Rainy Day Fund';
        } if($name == 'beta'){
            $purpose = 'Home Purchase Savings';
        } if($name == 'education'){
            $purpose = 'Children Education';
        }
        return $purpose;
    }

    public static function wheelKPIAccount($user, $currency, $archive = false){
        if ($archive) {
            $bespokes = BespokeKPI::where('user_id', $user->id)->where('isArchive', 1)->latest()->limit(7)->get();
        } else {
            $bespokes = BespokeKPI::where('user_id', $user->id)->where('isArchive', 0)->latest()->limit(7)->get();
        }

        $cash = []; $liabilities = [];
        // Init Bespoke
        foreach($bespokes as $bespoke){
            $wheel = BespokeWheel::where('bespoke_id', $bespoke->id)->first();
            if(!$wheel){
                $wheel = new BespokeWheel();
                $wheel->bespoke_id = $bespoke->id;
                $wheel->save();
            }
        }

        foreach($bespokes as $bespoke){
            $bespoke->wheel;
            if($bespoke->bespoke_type == 'saveup'){
                array_push($cash, $bespoke);
            }elseif($bespoke->bespoke_type == 'dept'){
                array_push($liabilities, $bespoke);
            }
        }
        $cash = GapExchangeHelper::kpiToCash($cash, $currency);
        $liabilities = GapExchangeHelper::kpiToLiability($liabilities, $currency);
        return compact('cash', 'liabilities');
    }

    public static function kpiToCash($bespokes, $currency){
        foreach($bespokes as $bespoke){
            $bespoke->account_name = $bespoke->kpi_name;
            $bespoke->account_purpose = $bespoke->savings_purposes;
            $bespoke->account_type = $bespoke->cash_keptin;
            $bespoke->account_details = $bespoke->kpi_details;
            $bespoke->account_currency = $currency;
            $bespoke->account_alias = $bespoke->wheel->account_alias;
            $bespoke->account_location = $bespoke->wheel->fund;
            $bespoke->target_date = $bespoke->wheel->target_date;
            // $bespoke->isAnalytics = $bespoke->wheel->isAnalytics;
            $bespoke->account_header = 'tahbhzjbhvaghvxghavgysvxtysghzvxstyghxgyxvsgyzvxghsbvsyuh';
        }
        return $bespokes;
    }

    public static function kpiToLiability($bespokes, $currency){
        foreach($bespokes as $bespoke){
            $bespoke->creditor_name = $bespoke->kpi_name;
            $bespoke->account_type = $bespoke->dept_types;
            $bespoke->account_type = $bespoke->dept_types;
            $bespoke->account_details = $bespoke->kpi_details;
            $bespoke->pay_strategy = $bespoke->extra;
            $bespoke->interest_rate = $bespoke->dept_interest;
            $bespoke->account_currency = $currency;
            $bespoke->account_alias = $bespoke->wheel->account_alias;
            $bespoke->target_date = $bespoke->wheel->target_date;
            $bespoke->periodical_pay = $bespoke->wheel->periodical_pay;
            // $bespoke->isAnalytics = $bespoke->wheel->isAnalytics;
            $bespoke->account_header = 'lapakoihangbshjbsxhgbxuhxbshxbxujahnzoazjmsozklnsz';
        }
        return $bespokes;
    }

    public static function bespokeInWheel($user, $total){
        $wheel = collect();
        if($total <= 7){
            $cash = CashAccount::where('user_id', $user->id)->where('isAnalytics',1)->latest()->get();
            $liability = Liability::where('user_id', $user->id)->where('isAnalytics',1)->latest()->get();
            $cash = GapExchangeHelper::cashToBespoke($cash);
            $liability = GapExchangeHelper::liabiliToBespoke($liability);

            foreach($cash as $bespoke){ $wheel->push($bespoke);}
            foreach($liability as $bespoke){ $wheel->push($bespoke);}
        }
        return $wheel;
    }


    public static function cashToBespoke($cash){
        foreach($cash as $bespoke){
            $bespoke->kpi_name = $bespoke->account_name ;
            $bespoke->savings_purposes = $bespoke->account_purpose ;
            $bespoke->cash_keptin  = $bespoke->account_type ;
            $bespoke->kpi_details = $bespoke->account_details ;
            $bespoke->pay = $bespoke->extra  ;
            $bespoke->bespoke_type = 'saveup';
            $bespoke->account_header = 'aznjzbhxjnsxjbnxhsjgczbhzbvcjhbxvnbjhjzcb';
        }
        return $cash;
    }

    public static function liabiliToBespoke($liabilities){
        foreach($liabilities as $bespoke){
            $bespoke->kpi_name = $bespoke->creditor_name ;
            $bespoke->dept_types = $bespoke->account_type ;
            $bespoke->dept_types = $bespoke->account_type ;
            $bespoke->kpi_details = $bespoke->account_details;
            $bespoke->extra = $bespoke->extra  ;
            $bespoke->dept_interest = $bespoke->interest_rate ;
            $bespoke->bespoke_type = 'dept';
            $bespoke->account_header = 'skjnaznkszxjnszjnzjnzjnmhjzbnhjxvgyzbjhbxc';
        }
        return $liabilities;
    }

    public static function submitIncomeAllocation($user, $crd, $alo){
        $fin = CalculatorClass::finicial($user);
        $income_detail = IncomeHelper::analyseIncome($user, $fin['portfolio'],false);
        if($income_detail['portfolio_diff'] <= 0 && $crd == 'ajkmzxjkcnkfsnznnjksxnjnkcnjc' & $alo == 'azsjkhbdjcbjszbhjbxjhcbjbhhbjghdx'){
            $success = true;
            $audit = Audit::where('user_id', $user->id)->first();
            $audit->income_allocated = 1;
            $audit->save();
        }else{
            $success = false;
        }
        return $success;
    }

    public static function submitAllocation($user, $crd, $alo){
        $total = GapAccountCalculator::creditAllocated($user)['total'];
        if($crd == 'ajkmzxjkcnkfsnznnjksxnjnkcnjc' & $alo == 'azsjkhbdjcbjszbhjbxjhcbjbhhbjghdx'){
            $success = true;
            $audit = Audit::where('user_id', $user->id)->first();
            $audit->is_allocated = 1;
            $audit->save();
        }else{
            $success = false;
        }
        return $success;
    }
}
