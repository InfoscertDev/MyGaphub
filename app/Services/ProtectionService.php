<?php

namespace App\Services;

use App\Helpers\ArchiveAccount;
use App\Helpers\GapAccountCalculator as GapAccount;
use App\Helpers\WheelClass as Wheel;
use App\Models\Wheel\ProtectionAccount as Protection;

class ProtectionService
{
    public function getProtectionList($user, array $filters): array
    {
        ['header' => $header, 'access' => $access, 'account' => $account, 'archive' => $archive] = $filters;

        if ($header) {
            return ArchiveAccount::protectionArchiveAction($user, $header, $access, $account);
        }

        $protection = Protection::where('user_id', $user->id)
            ->where('isArchive', $archive ? 1 : 0)
            ->latest()
            ->get();

        $protection_detail = GapAccount::calcProtectionAccount($protection, $user);

        return compact('protection', 'protection_detail');
    }

    public function storeProtection($user, $request): Protection
    {
        $document = $this->handleDocument($request);

        $protection                      = new Protection();
        $protection->user_id             = $user->id;
        $protection->protection_category = $request->category;
        $protection->protection_type     = $request->type;
        $protection->details             = $request->details;
        $protection->provider_contact    = $request->contact;
        $protection->sum_assured         = $request->sum_assured;
        $protection->premium_pay         = $request->premium;
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
        $protection->provider_contact = $request->provider_contact;
        $protection->pay_frequency    = $request->pay_frequently;
        $protection->protection_type  = $request->protection_type;
        $protection->premium_pay      = $request->premium_pay;
        $protection->payment_type     = $request->pay_typed;
        $protection->cover_start      = $request->cover_start;
        $protection->cover_end        = $request->cover_end;
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
}
