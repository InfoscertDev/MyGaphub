<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Asset\ActionStrategy;
use App\Models\Asset\ActionStrategyItem;
use App\Models\Asset\ActionStrategyInvestigation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ActionStrategyController extends Controller
{
    /**
     * List all strategies for the authenticated user.
     */
    public function index(Request $request)
    {
        $strategies = ActionStrategy::where('user_id', $request->user()->id)
            ->with(['items', 'investigation'])
            ->latest()
            ->get();

        return response()->json($strategies);
    }

    /**
     * Show a single strategy with its items and investigation.
     */
    public function show(Request $request, $id)
    {
        $strategy = ActionStrategy::where('user_id', $request->user()->id)
            ->with(['items', 'investigation'])
            ->findOrFail($id);

        return response()->json($strategy);
    }

    /**
     * Step 1 + 2: Create the strategy shell (name, reason, category).
     * Called when the user taps Continue after screen 1 & 2.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'reason'   => 'required|string|min:10',
            'category' => 'required|in:' . implode(',', ActionStrategy::CATEGORIES),
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $strategy = ActionStrategy::create([
            'user_id'  => $request->user()->id,
            'name'     => $request->name,
            'reason'   => $request->reason,
            'category' => $request->category,
        ]);

        return response()->json($strategy, 201);
    }

    /**
     * Step 3: Save/update checklist items for a strategy.
     * Payload: { items: [ { sub_category, note }, ... ] }
     * Each sub_category must belong to the strategy's category.
     */
    public function storeItems(Request $request, $strategyId)
    {
        $strategy = ActionStrategy::where('user_id', $request->user()->id)
            ->findOrFail($strategyId);

        $allowedSubs = ActionStrategy::SUB_CATEGORIES[$strategy->category];

        $validator = Validator::make($request->all(), [
            'items'                  => 'required|array|min:1',
            'items.*.sub_category'   => 'required|in:' . implode(',', $allowedSubs),
            'items.*.note'           => 'nullable|string|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        DB::transaction(function () use ($request, $strategy) {
            foreach ($request->items as $item) {
                ActionStrategyItem::updateOrCreate(
                    [
                        'strategy_id'  => $strategy->id,
                        'sub_category' => $item['sub_category'],
                    ],
                    [
                        'note' => $item['note'] ?? null,
                    ]
                );
            }
        });

        return response()->json($strategy->load('items'));
    }

    /**
     * Step 4: Save/update investigation answers for a strategy.
     */
    public function storeInvestigation(Request $request, $strategyId)
    {
        $strategy = ActionStrategy::where('user_id', $request->user()->id)
            ->findOrFail($strategyId);

        $validator = Validator::make($request->all(), [
            'opportunity_age'    => 'nullable|string|min:5',
            'investors_last_5yr' => 'nullable|string|min:5',
            'team_experience'    => 'nullable|string|min:5',
            'customer_value'     => 'nullable|string|min:5',
            'other_details'      => 'nullable|string',
            // At least one investigation field must be filled
            '_any'               => [
                function ($attr, $value, $fail) use ($request) {
                    $fields = ['opportunity_age', 'investors_last_5yr', 'team_experience', 'customer_value', 'other_details'];
                    $filled = collect($fields)->filter(fn($f) => filled($request->$f));
                    if ($filled->isEmpty()) {
                        $fail('At least one investigation field is required.');
                    }
                }
            ],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $investigation = ActionStrategyInvestigation::updateOrCreate(
            ['strategy_id' => $strategy->id],
            $request->only([
                'opportunity_age',
                'investors_last_5yr',
                'team_experience',
                'customer_value',
                'other_details',
            ])
        );

        return response()->json($investigation);
    }

   /**
     * Step 5: Save allocation percentages on the strategy itself.
     *
     * monthly_percent applies to: user->monthly_asset_growth_savings (existing model field)
     * lumpsum_percent applies to:  user->alpha_balance (existing model field)
     *
     * Actual £ amounts are computed on the frontend:
     *   monthly_amount = (monthly_percent / 100) * user.monthly_asset_growth_savings
     *   lumpsum_amount = (lumpsum_percent  / 100) * user.alpha_balance
     */
    public function storeAllocation(Request $request, $strategyId)
    {
        $strategy = ActionStrategy::where('user_id', $request->user()->id)
            ->findOrFail($strategyId);

        $validator = Validator::make($request->all(), [
            'monthly_percent' => 'required|in:10,25,50,100',
            'lumpsum_percent' => 'required|in:10,25,50,100',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $strategy->update([
            'monthly_percent' => $request->monthly_percent,
            'lumpsum_percent' => $request->lumpsum_percent,
        ]);

        return response()->json($strategy->load(['items', 'investigation']));
    }

    /**
     * Delete a strategy and all its related data (cascade handles DB cleanup).
     */
    public function destroy(Request $request, $id)
    {
        $strategy = ActionStrategy::where('user_id', $request->user()->id)->findOrFail($id);
        $strategy->delete();

        return response()->json(['message' => 'Strategy deleted successfully.']);
    }
}