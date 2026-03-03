<?php

namespace App\Models\Asset;

use App\Wheel\IncomeAccount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonPortfolioRecord extends Model
{
    use HasFactory;

    protected $table;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        // info([ env('APP_ENV'), config('app.env') ]);
        $this->table = (config('app.env') == 'local') ?  'non_portfolio_income' : 'non_portfolio_records';
    }

    protected $appends = [
        'income_currency'
    ];

    protected function getIncomeCurrencyAttribute(){
    //    return IncomeAccount::whereId($this->income_id)->value('income_currency');
    }
}
