<?php

namespace App\Models\Asset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionStrategyInvestigation extends Model
{
    use HasFactory;

    protected $fillable = [
        'strategy_id',
        'opportunity_age',
        'investors_last_5yr',
        'team_experience',
        'customer_value',
        'other_details',
    ];

    public function strategy()
    {
        return $this->belongsTo(ActionStrategy::class, 'strategy_id');
    }
}
