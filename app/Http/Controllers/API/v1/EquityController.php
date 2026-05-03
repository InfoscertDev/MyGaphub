<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\GapExchangeHelper as Exchange;
use App\Models\Wheel\HomeEquity;
use App\Models\Wheel\MortgageAccount as Mortgage;
use App\Models\SevenG\DeptFin as Debt;
use App\Helpers\GapAccountCalculator as GapAccount;

class EquityController extends Controller
{
    /**
     * Get available mortgage options for equity.
     */
    public function equityInfo(Request $request)
    {
        $user        = $request->user();
        $equity_info = Exchange::availabeleMortgages($user);

        return response()->json([
            'status'  => true,
            'data'    => ['equity_info' => $equity_info],
            'message' => 'Equity info retrieved successfully.',
        ]);
    }

    /**
     * Store a new home equity record.
     */
    public function storeEquity(Request $request)
    {
        $user      = $request->user();
        $validator = Validator::make($request->all(), [
            'location'     => 'required',
            'market_value' => 'required|numeric|min:10',
            'country'      => 'required',
            'ismortgage'   => 'required|integer',
        ], [
            'ismortgage.integer' => 'Please choose a Mortgage',
        ]);

        if ($request->ismortgage) {
            $validator = Validator::make($request->all(), [
                'mortgage' => 'required|integer',
            ]);
        }

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'data'    => [],
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $equity               = new HomeEquity();
        $equity->user_id      = $user->id;
        $equity->location     = $request->location;
        $equity->zip_code     = $request->zip_code;
        $equity->market_value = $request->market_value;
        $equity->ismortgage   = $request->ismortgage;
        $equity->country      = $request->country;
        $equity->mortgage_id  = $request->mortgage;
        $equity->save();

        if ((int) $request->mortgage === -1 && $request->ismortgage) {
            $debt            = Debt::where('user_id', $user->id)->first();
            $debt->equity_id = $equity->id;
            $debt->save();
        }

        if ((int) $request->mortgage > 0 && $request->ismortgage) {
            $debt            = Mortgage::find($request->mortgage);
            $debt->equity_id = $equity->id;
            $debt->save();
        }

        return response()->json([
            'status'  => true,
            'data'    => ['equity' => $equity],
            'message' => 'Equity stored successfully.',
        ], 201);
    }

    /**
     * List home equity records (active or archived).
     */
    public function equity(Request $request)
    {
        $user    = $request->user();
        $archive = $request->get('archive');

        $equity = HomeEquity::where('user_id', $user->id)
            ->where('isArchive', $archive ? 1 : 0)
            ->latest()
            ->get();

        $equity_detail = GapAccount::calcEquityAccount($equity, $user);

        foreach ($equity as $eq) {
            $eq->mortgage;
            $balance           = $eq->mortgage ? $eq->mortgage->current_balance : 0;
            $marketValue       = $eq->market_value > 0 ? $eq->market_value : 1;
            $eq->equity        = $eq->market_value - $balance;
            $eq->ownership     = round($eq->equity * 100 / $marketValue);
            $eq->per_mortgage  = round(($balance / $marketValue) * 100);
            $eq->chart         = [
                'labels'      => ['Mortgage', 'Home Equity'],
                'values'      => [$balance, $eq->equity],
                'percentages' => [$eq->per_mortgage, $eq->ownership],
            ];
        }

        return response()->json([
            'status'  => true,
            'data'    => compact('equity', 'equity_detail'),
            'message' => 'Equity records retrieved successfully.',
        ]);
    }

    /**
     * Update an existing home equity record.
     */
    public function updateEquity(Request $request, $id)
    {
        $user      = $request->user();
        $validator = Validator::make($request->all(), [
            'market_value' => 'required|numeric|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'data'    => [],
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $equity               = HomeEquity::where('user_id', $user->id)->where('id', $id)->firstOrFail();
        $equity->market_value = $request->market_value;
        $equity->date_acquired = $request->date_acquired;
        $equity->save();

        return response()->json([
            'status'  => true,
            'data'    => ['equity' => $equity],
            'message' => 'Equity information updated successfully.',
        ]);
    }
}
