<?php

namespace App\Models\Asset;

use App\Wheel\IncomeAccount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonPortfolioRecord extends Model
{
    use HasFactory;

    // protected $table;

    // public function __construct(array $attributes = [])
    // {
    //     parent::__construct($attributes);

    //     $this->table = (env('APP_ENV') == 'local') ?  'non_portfolio_income' : 'non_portfolio_records';
    // }

    protected $appends = [
        'income_currency'
    ];

    protected function getIncomeCurrencyAttribute(){
    //    return IncomeAccount::whereId($this->income_id)->value('income_currency');
    }
}
