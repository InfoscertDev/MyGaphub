<?php

namespace App\Models\Asset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordBudgetSpent extends Model
{
    // ALTER TABLE `record_budget_spents` ADD `recuring` INT(2) NOT NULL DEFAULT '0' AFTER `date`;
    use HasFactory;

    protected $fillable = [
        'user_id', 'period',
        'allocation_id', 'label',
        'amount', 'note',
        'date' , 'recuring'
    ];
}
