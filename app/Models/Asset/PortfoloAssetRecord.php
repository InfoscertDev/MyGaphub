<?php

namespace App\Models\Asset;

use Illuminate\Database\Eloquent\Model;

class PortfoloAssetRecord extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public $appends = [
        'expenditure'
    ];

    protected $casts = [
        'amount' => 'float',
    ];

    public function getExpenditureAttribute($value){
        return $this->management + $this->taxes + $this->maintenance + $this->others;
    }

    public function getNetIncomeAttribute($value){
        return $this->revenue - $this->expenditure;
    }

}
