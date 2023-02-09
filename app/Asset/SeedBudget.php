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
    //ALTER TABLE `seed_budgets` ADD `priviewed` INT(4) NOT NULL DEFAULT '0' AFTER `budget_amount`;
}
