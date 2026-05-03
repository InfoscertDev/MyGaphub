<?php

namespace App\Models\Asset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionStrategyItem extends Model
{
    use HasFactory;

    protected $fillable = ['strategy_id', 'sub_category', 'note', 'monthly_percent', 'lumpsum_percent'];

    public function strategy()
    {
        return $this->belongsTo(ActionStrategy::class, 'strategy_id');
    }
}
