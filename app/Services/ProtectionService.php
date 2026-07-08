<?php

namespace App\Services;

use App\Helpers\ArchiveAccount;
use App\Helpers\GapAccountCalculator as GapAccount;
use App\Helpers\WheelClass as Wheel;
use App\Models\Wheel\ProtectionAccount as Protection;

class ProtectionService
{

    public function getProtectionList($user, array $filters, string $period = 'yearly')
    {
        $header  = isset($filters['header'])  ? $filters['header']  : null;
        $access  = isset($filters['access'])  ? $filters['access']  : null;
        $account = isset($filters['account']) ? $filters['account'] : null;
        $archive = isset($filters['archive']) ? $filters['archive'] : null;

        if ($header) {
            return ArchiveAccount::protectionArchiveAction($user, $header, $access, $account);
        }

        // Apply period scope: 'monthly' filters to Monthly pay_frequency only
        // 'yearly' (default) returns all records
        $protection = Protection::where('user_id', $user->id)
            ->where('isArchive', $archive ? 1 : 0)
            ->period($period)
            ->latest()
            ->get();

        $protection_detail       = GapAccount::calcProtectionAccount($protection, $user);
        $protection_distribution = $this->calcProtectionDistribution($protection);

        return compact('protection', 'protection_detail', 'protection_distribution');
    }

    public function storeProtection($user, $request): Protection
    {
        $document = $this->handleDocument($request);

        $protection                      = new Protection();
        $protection->user_id             = $user->id;
        $protection->protection_category = $request->category;
        $protection->protection_type     = $request->type;
        $protection->provider_policy     = $request->provider_policy;
        $protection->bank     = $request->bank;
        $protection->currency     = $request->currency;
        $protection->current_balance    = $request->current_balance;
        $protection->details             = $request->details;
        $protection->provider_contact    = $request->contact;
        $protection->sum_assured         = $request->sum_assured;
        $protection->premium_pay         = $request->premium_pay;
        $protection->pay_frequency       = $request->pay_freq;
        $protection->payment_type        = $request->pay_type;
        $protection->cover_start         = $request->cover_start;
        $protection->cover_end           = $request->cover_end;
        $protection->document            = $document;
        $protection->save();

        Wheel::updateProtectionTile($user);

        return $protection;
    }

    public function updateProtection($user, $request, int $id): Protection
    {
        $protection                   = Protection::where('user_id', $user->id)->where('id', $id)->firstOrFail();
        $protection->details          = $request->details;
        $protection->sum_assured      = $request->sum_assured;
        $protection->provider_contact = $request->contact;
        $protection->pay_frequency    = $request->pay_freq;
        $protection->bank     = $request->bank;
        $protection->currency     = $request->currency;
        $protection->provider_policy     = $request->provider_policy;
        $protection->current_balance    = $request->current_balance;
        // $protection->protection_type  = $request->protection_type;
        // $protection->protection_type     = $request->pay_type;
        $protection->premium_pay      = $request->premium_pay;
        $protection->payment_type     = $request->pay_type;
        $protection->cover_start      = $request->cover_start;
        $protection->cover_end        = $request->cover_end;

         // Only update document if a new file was uploaded
        // Existing document is preserved if no new file is sent
        if ($request->hasFile('document')) {
            $protection->document = $this->handleDocument($request);
        }

        $protection->save();

        Wheel::updateProtectionTile($user);

        return $protection;
    }

    private function handleDocument($request): string
    {
        if (!$request->hasFile('document')) {
            return '';
        }

        $ext           = $request->file('document')->getClientOriginalExtension();
        $fileNameStore = sha1(time()) . rand(100000, 999999) . '.' . $ext;

        return $request->file('document')->storeAs('public/user', $fileNameStore);
    }

      /**
     * Group protection records by protection_category.
     * Percentage is based on premium_pay — best fit for cost distribution.
     * Each group shows: category name, record count, total premium, percentage of total.
     */
    private function calcProtectionDistribution($protection): array
    {
        $total_premium = 0;
        $groups        = array();

        // First pass: group records and sum premiums
        foreach ($protection as $account) {
            $category = $account->protection_category;

            if (!isset($groups[$category])) {
                $groups[$category] = array(
                    'category'      => $category,
                    'count'         => 0,
                    'total_premium' => 0,
                    'percentage'    => 0,
                );
            }

            $groups[$category]['count']         += 1;
            $groups[$category]['total_premium'] += (int) $account->premium_pay;
            $total_premium                      += (int) $account->premium_pay;
        }

        // Second pass: calculate percentage for each group
        foreach ($groups as $category => $group) {
            $groups[$category]['percentage'] = round(
                ($group['total_premium'] / ($total_premium > 0 ? $total_premium : 1)) * 100,
                2
            );
        }

        return array(
            'total_premium'  => $total_premium,
            'group_count'    => count($groups),
            'distribution'   => array_values($groups), // reset keys for clean JSON
        );
    }
}
