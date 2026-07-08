<?php

namespace App\Models\Asset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class ActionStrategy extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'reason', 'category',
        'monthly_percent', 'lumpsum_percent',
    ];

    const CATEGORIES = ['retirement', 'investment', 'cash', 'equity'];

    const SUB_CATEGORIES = [
        'retirement' => ['private_pension', 'company_pension', 'state_pension', 'other_pensions'],
        'cash'       => ['isa', 'fixed_income', 'easy_asset'],
        'investment' => ['business_asset', 'appreciating_asset', 'risk_asset'],
        'equity'     => ['wholly_owned_home', 'jointly_owned_home'],
    ];

    const ALLOCATION_PERCENTAGES = [10, 25, 50, 100];

    public function items()
    {
        return $this->hasMany(ActionStrategyItem::class, 'strategy_id');
    }

    public function investigation()
    {
        return $this->hasOne(ActionStrategyInvestigation::class, 'strategy_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

// ALTER TABLE `action_strategies`
// ADD COLUMN `monthly_amount` DECIMAL(15,2) NULL AFTER `monthly_percent`,
// ADD COLUMN `lumpsum_amount` DECIMAL(15,2) NULL AFTER `lumpsum_percent`;