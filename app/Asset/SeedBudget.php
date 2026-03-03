<?php

namespace App\Asset;

use Illuminate\Database\Eloquent\Model;

class SeedBudget extends Model
{
    protected $fillable = [
        'user_id',
        'period',
        'budget_amount',
        'priviewed'
    ];

}
