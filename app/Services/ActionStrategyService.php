<?php

namespace App\Services;

use App\Helpers\CalculatorClass;
use App\Models\Asset\ActionStrategy;
use App\Models\Asset\ActionStrategyItem;
use App\Models\Asset\ActionStrategyInvestigation;
use App\Http\Requests\StoreActionStrategyRequest;
use App\Http\Requests\StoreActionStrategyItemsRequest;
use App\Http\Requests\StoreActionStrategyInvestigationRequest;
use App\Http\Requests\StoreActionStrategyAllocationRequest;
use App\Models\SevenG\AlphaFin;
use Illuminate\Support\Facades\DB;

class ActionStrategyService
{
    public function getStrategies($user)
    {
        return ActionStrategy::where('user_id', $user->id)
            ->with(['items', 'investigation'])
            ->latest()
            ->get();
    }

    public function getStrategy($user, $id): ActionStrategy
    {
        return ActionStrategy::where('user_id', $user->id)
            ->with(['items', 'investigation'])
            ->findOrFail($id);
    }

    public function storeStrategy($user, StoreActionStrategyRequest $request): ActionStrategy
    {
        return ActionStrategy::create([
            'user_id'  => $user->id,
            'name'     => $request->name,
            'reason'   => $request->reason,
            'category' => $request->category,
        ]);
    }

    public function storeItems($user, StoreActionStrategyItemsRequest $request, $strategyId): ActionStrategy
    {
        $strategy = ActionStrategy::where('user_id', $user->id)
            ->findOrFail($strategyId);

        DB::transaction(function () use ($request, $strategy) {
            foreach ($request->items as $item) {
                ActionStrategyItem::updateOrCreate(
                    [
                        'strategy_id'  => $strategy->id,
                        'sub_category' => $item['sub_category'],
                    ],
                    [
                        'note' => isset($item['note']) ? $item['note'] : null,
                    ]
                );
            }
        });

        return $strategy->load('items');
    }

    public function storeInvestigation($user, StoreActionStrategyInvestigationRequest $request, $strategyId): ActionStrategyInvestigation
    {
        $strategy = ActionStrategy::where('user_id', $user->id)
            ->findOrFail($strategyId);

        return ActionStrategyInvestigation::updateOrCreate(
            ['strategy_id' => $strategy->id],
            $request->only([
                'opportunity_age',
                'investors_last_5yr',
                'team_experience',
                'customer_value',
                'other_details',
            ])
        );
    }

    public function storeAllocation($user, StoreActionStrategyAllocationRequest $request, $strategyId): ActionStrategy
    {
        $financial = CalculatorClass::finicial($user);
        $alpha     = AlphaFin::where('user_id', $user->id)->first();

        $strategy = ActionStrategy::where('user_id', $user->id)
            ->findOrFail($strategyId);

        // Source fields assumed on user or linked profile model
        $monthly_base = $financial['saving'] ?? 0;
        $lumpsum_base = $alpha->current ?? 0;

        $strategy->update([
            'monthly_percent' => $request->monthly_percent,
            'lumpsum_percent' => $request->lumpsum_percent,
            'monthly_amount'  => round(($request->monthly_percent / 100) * $monthly_base, 2),
            'lumpsum_amount'  => round(($request->lumpsum_percent / 100) * $lumpsum_base, 2),
        ]);

        return $strategy->load(['items', 'investigation']);
    }

    public function deleteStrategy($user, $id): void
    {
        $strategy = ActionStrategy::where('user_id', $user->id)->findOrFail($id);
        $strategy->delete();
    }
}