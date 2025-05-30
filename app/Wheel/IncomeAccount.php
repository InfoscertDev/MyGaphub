<?php

namespace App\Wheel;

use Illuminate\Database\Eloquent\Model;
use App\Asset\PortfolioAsset;
use App\Asset\PortfoloAssetRecord;
use App\Models\Asset\NonPortfolioRecord;

class IncomeAccount extends Model
{
    protected $table = 'income_accounts';


    protected $fillable = [
        'amount', 'income_currency', 'income_name',
        'automated',
        'income_date',
        'income_frequency',
    ];

    protected $attributes = [
        'automated' => false
    ];

    protected $appends = [
        'assigned_income'
    ];

    protected function getIncomeNameAttribute($value){
        return (($this->income_type == 'non_portfolio') ? $value : $this->incomeName()) ;
    }

    public function getAssignedIncomeAttribute(){
        $value = false;
        $current_period = date('Y-m').'-01';
        $last_period = date("Y-m-d", strtotime ( '-1 month' , strtotime ( $current_period ) )) ;

        if($this->income_type  == 'portfolio'){
            $assigned =  PortfoloAssetRecord::where('portfolio_asset_id', $this->id)
                        ->whereIn('period', [$last_period])
                        ->value('seed_budget');
            $value =  $assigned;//($assigned > 0) ? true : false;
        }else{
            $assigned =  NonPortfolioRecord::where('income_id', $this->id)
                        ->whereIn('period', [$last_period])->value('seed_budget');
            $value =  $assigned;//($assigned > 0) ? true : false;
        }

        return $value;
    }

    protected function getAmountAttribute($value){
        if($this->income_type  == 'portfolio'){
            $portfolio = PortfolioAsset::find($this->portfolio_asset_id);
            return ($portfolio) ? round($portfolio->monthly_roi,2) : 0;
        }else{
            $non_portfolio = NonPortfolioRecord::where('user_id', $this->user_id)->where('income_id', $this->id)
                                ->select('amount','tithe','taxes', 'others')->get();
            if(count($non_portfolio)){
                $amount = array_sum(array_column($non_portfolio->toArray(), 'amount'));
                $tithe = array_sum(array_column($non_portfolio->toArray(), 'tithe'));
                $taxes = array_sum(array_column($non_portfolio->toArray(), 'taxes'));
                $others = array_sum(array_column($non_portfolio->toArray(), 'others'));
                $average = ( $amount - ($taxes + $tithe + $others ) )/ count($non_portfolio);
                return round($average, 2) ?? 0;
            }else{
                return round($value, 2);
            }
        }
    }

    protected function getChannelAttribute($value){
        if($this->income_type  == 'portfolio'){
            $portfolio = PortfolioAsset::find($this->portfolio_asset_id);
            return ucfirst($portfolio->asset_class);
        }else{
            return $value;
        }
    }

    protected function getAutomatedAttribute($value){
        if($this->income_type  == 'portfolio'){
            $portfolio = PortfolioAsset::find($this->portfolio_asset_id);
            return ($portfolio) ? $portfolio->automated : 1;
        }else{
            return $value;
        }
    }

    protected function getIncomeCurrencyAttribute($value){
        if($this->income_type == 'portfolio'){
            $portfolio = PortfolioAsset::find($this->portfolio_asset_id);
            return ($portfolio) ? $portfolio->asset_currency : '$';
        }else{
            return $value;
        }
    }

    protected function incomeName(){
        if($this->income_type  == 'portfolio'){
            $portfolio = PortfolioAsset::find($this->portfolio_asset_id);
            return $portfolio->name ?? '';
        }
    }
}
