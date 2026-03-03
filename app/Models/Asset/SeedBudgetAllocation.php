<?php

namespace App\Models\Asset;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeedBudgetAllocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'period',
        'seed_category',
        'label',
        'amount', 'note',
        'expenditure',
        'recuring',
        'date'
    ];


    // public function getExpenditureAttribute($value){
    //     if($value == 'family'){
    //         $value = 'Home & Family';
    //     }else if ($value == 'debt_repayment') {
    //         $value = 'Debt Repayment';
    //     }else if($value){
    //        $value = ucfirst($value);
    //     }
    //     return $value;
    // }
}
