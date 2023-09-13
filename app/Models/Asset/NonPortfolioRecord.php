<?php

namespace App\Models\Asset;

use App\Wheel\IncomeAccount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonPortfolioRecord extends Model
{
    use HasFactory;
     //env('APP_ENV') ? 'non_portfolio_records' :

    // protected $table = 'non_portfolio_income';

    protected $appends = [
        'income_currency'
    ];

    protected function getIncomeCurrencyAttribute(){
    //    return IncomeAccount::whereId($this->income_id)->value('income_currency');
    }
}
