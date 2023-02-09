<?php

namespace App\Helper;
use App\Asset\PortfolioAsset;
use App\Asset\PortfoloAssetRecord;
use App\Models\Asset\NonPortfolioRecord;
use App\User;
use App\Wheel\IncomeAccount as Income;
use App\Wheel\IncomeAccount;
use Carbon\Carbon;

class IncomeHelper{
 
    public static function analyseIncome($user, $fin, $isAsset = true){
        // $fin = Fin::finicial($user);
        $incomes = Income::where('user_id', $user->id)->where('isArchive', 0)->get();
        $tracked_incomes = Income::where('user_id', $user->id)->get();
        $current_portfolio = ($fin) ? $fin : 0;
        $income_portfolios = [];
        $income_non_portfolios = [];  

        // Available Portfolio Asset
        $portfolio_asset =  PortfolioAsset::where('user_id', $user->id)
                                    ->where('isArchive', 0)
                                    ->where('asset_category', 'existing')->get();
     
        foreach($portfolio_asset as $key => $asset){
           foreach($tracked_incomes as $income){
                if($income->income_id == $asset->id){
                    unset($portfolio_asset[$key]);
                }
           }
        }

        foreach($incomes as $key => $asset){
            $value = GapExchangeHelper::convert_currency($user, $asset->income_currency, $asset->amount, $asset->automated);
            if($asset->income_type == 'portfolio') {
                array_push($income_portfolios,$value);
            }
            if($asset->income_type == 'non_portfolio'){  
                array_push($income_non_portfolios,$value);
            } 
        }  
        $income_portfolio = array_sum($income_portfolios);
        $income_non_portfolio = array_sum($income_non_portfolios);
        $total_portfolio = ($income_portfolio + $income_non_portfolio);
        
        $portfolio_diff  = $current_portfolio - $income_portfolio; //var_dump($portfolio_diff);
        $isPortfolio  = $income_portfolio > $current_portfolio;
        return compact('current_portfolio', 'income_portfolio', 'income_non_portfolio', 'portfolio_diff', 'total_portfolio','portfolio_asset', 'isPortfolio');
    }   

    public static function addNewIncome($user, $request){
        $last_period = date("Y-m-d",strtotime("-1 months", strtotime(date('Y-m').'-01')) );
        $income = new Income();
        $income->user_id = $user->id;
        $income->income_type = $request->income_type; 
        $income->automated = $request->automated_rate;
        $income->amount = $request->amount; 
        $income->channel = $request->channel;
        $income->income_name = $request->income_name;
        $income->income_currency = $request->currency;
        $income->portfolio_asset_id = $request->portfolio_asset;
        $income->income_date = $request->income_date;
        $income->income_frequency = $request->income_frequency;
        $income->status = $request->status;  
        if($request->income_type == 'portfolio'){
            $income->income_name = '';
            $income->income_currency = '';
            $income->amount =  0;
            $income->income_frequency = 'Monthly'; 
            $income->channel = '';
        }
        $income->save();
        if($request->income_type == 'portfolio'){
            $asset = PortfolioAsset::where('user_id', $user->id)->where('id',$request->portfolio_asset)->first();
            $asset->income_id = $income->id;
            $asset->save();
        }  else{
            $asset_records = new NonPortfolioRecord();
            $asset_records->user_id = $user->id;
            $asset_records->income_id = $income->id;
            $asset_records->period = $last_period;
            $asset_records->amount = $request->amount;
            $asset_records->save();   
        } 
        WheelClass::updateIncomeTile($user);
        return true;
    }

    /**
     * 
     * Get Income Channels
     * @return Boolean 
     */
    public function getIncomeChannels($user, $incomes, $total_portfolio){
        // Avoid Non-Income Error
        if(!$incomes){
            $incomes = Income::where('user_id', $user->id)->where('isArchive', 0)->latest()->get(); 
        }

        // Available Gap Channels 
        $primary = []; $hustle = [];
        $business = []; $risk = [];
        $appreciating = []; $intellectual = [];
        $depreciating = [];

        // Group Incomes to channels
        foreach($incomes as $asset){
            $asset_value = GapExchangeHelper::convert_currency($user, $asset->income_currency, $asset->amount, $asset->automated);

            if($asset->income_type == 'portfolio' && strtolower($asset->channel) == 'business') array_push($business,$asset_value);
            if($asset->income_type == 'portfolio' && strtolower($asset->channel) == 'risk') array_push($risk,$asset_value);
            if($asset->income_type == 'portfolio' && strtolower($asset->channel) == 'appreciating') array_push($appreciating,$asset_value);
            if($asset->income_type == 'portfolio' && strtolower($asset->channel) == 'intellectual') array_push($intellectual,$asset_value);
            if($asset->income_type == 'portfolio' && strtolower($asset->channel) == 'depreciating') array_push($depreciating,$asset_value);
            
            if($asset->income_type == 'non_portfolio' && strtolower($asset->channel) == 'primary employment') {
                array_push($primary,$asset_value); 
            }else if($asset->income_type == 'non_portfolio' && strtolower($asset->channel) != 'primary employment'){
                array_push($hustle,$asset_value);
            }
        }

        //Calculate Amount and percentage of each Channels
        $primary = array_sum($primary);
        $total_portfolio = (($total_portfolio)) ? $total_portfolio : 1;
        // info($total_portfolio); 
        $primary_percentage = round(($primary / $total_portfolio) * 100);
        $hustle = array_sum($hustle); 
        $hustle_percentage = round(($hustle / $total_portfolio) * 100);
        $business = array_sum($business);
        $business_percentage = round(($business / $total_portfolio) * 100);
        $risk = array_sum($risk); 
        $risk_percentage = round(($risk / $total_portfolio) * 100);
        $appreciating = array_sum($appreciating);
        $appreciating_percentage = round(($appreciating / $total_portfolio) * 100);
        $intellectual = array_sum($intellectual);
        $intellectual_percentage = round(($intellectual / $total_portfolio) * 100);
        $depreciating = array_sum($depreciating);
        $depreciating_percentage = round(($depreciating / $total_portfolio) * 100);
 
        // Format Channels information to List
        $values = compact('primary', 'hustle', 'business', 'risk', 'appreciating', 'intellectual', 'depreciating');
        $percentages = [ 'primary' => $primary_percentage, 'hustle' => $hustle_percentage, 'business' => $business_percentage, 
                          'risk' => $risk_percentage, 'appreciating' => $appreciating_percentage, 
                          'intellectual' => $intellectual_percentage,  'depreciating' => $depreciating_percentage];
        return compact('values', 'percentages');
    }
    
     /**
     * 
     *  Income Characteristics
     * @return List 
     */
    public function getIncomeCharacteristics(User $user){
        $current_period = date('Y-m').'-01';
        $start_period = date("Y-m-d",strtotime("-1 months", strtotime( date('Y-m').'-01')) );
        $last_period = date("Y-m-d",strtotime("-3 months", strtotime( date('Y-m').'-01')) );
        
        $portfolio = PortfoloAssetRecord::where('user_id', $user->id)
                        ->whereBetween('period', [$last_period, $start_period])
                        ->orderBy('period', 'ASC')->get();
        
        $non_portfolio = NonPortfolioRecord::where('user_id', $user->id)
                            ->whereBetween('period', [$last_period, $start_period])
                            ->orderBy('period', 'ASC')->get();
     
        $non_portfolio_values = $this->aggregatePeiodicValue($user, $non_portfolio);
        $portfolio_values = $this->portfolioPeiodicValue($user, $portfolio); 
        $periods = [
            date('M', strtotime("-2 months", strtotime($start_period))),
            date("M",strtotime("-1 months", strtotime($start_period)) ),
            date('M', strtotime($start_period)) 
        ];  
        $past_month = (isset($portfolio_values[1])  && isset($non_portfolio_values[1])) ? $portfolio_values[1] ?? 0 + $non_portfolio_values[1] ?? 0: 0;
        $last_month = (isset($portfolio_values[2])  && isset($non_portfolio_values[2])) ? $portfolio_values[2] ?? 0 + $non_portfolio_values[2] ?? 0: 0;
        $hasImprove = ($last_month >= $past_month) ? true : false; 
        // info([$non_portfolio_values, $portfolio_values]);  
        return compact( 'periods','non_portfolio_values', 'portfolio_values', 'hasImprove');
    }

    public function aggregatePeiodicValue(User $user, object $assets){
        $values = [];  $amount = 0;  
        $month1 = date("Y-m-d",strtotime("-1 months", strtotime( date('Y-m').'-01')) );
        $month2 = date("Y-m-d",strtotime("-2 months", strtotime( date('Y-m').'-01')) );
        $month3 = date("Y-m-d",strtotime("-3 months", strtotime( date('Y-m').'-01')) );
        $groups = [];

        foreach($assets as $key => $asset){ 
            $asset_info = IncomeAccount::whereId($asset->income_id)->first();
            $current_amount = GapExchangeHelper::convert_currency($user, $asset_info->income_currency ?? '', $asset->amount, $asset_info->automated);
            $groups[$asset->period][] = $current_amount;
        } 
        return [
            isset($groups[$month3]) ? array_sum($groups[$month3]) : 0, 
            isset($groups[$month2]) ? array_sum($groups[$month2]) : 0,  
            isset($groups[$month1]) ? array_sum($groups[$month1]) : 0, 
        ];
    }

    public function portfolioPeiodicValue(User $user, object $assets){
        $amount = 0;   $values = [];
        
        $month1 = date("Y-m-d",strtotime("-1 months", strtotime( date('Y-m').'-01')) );
        $month2 = date("Y-m-d",strtotime("-2 months", strtotime( date('Y-m').'-01')) );
        $month3 = date("Y-m-d",strtotime("-3 months", strtotime( date('Y-m').'-01')) );
        $groups = [];

        foreach($assets as $key => $asset){  
            $asset_info = PortfolioAsset::whereId($asset->portfolio_asset_id)->first();
            $current_amount = GapExchangeHelper::convert_currency($user, $asset_info->asset_currency ?? '', $asset->net_income, $asset_info->automated);
            $groups[$asset->period][] = $current_amount;
        }

        return [
            isset($groups[$month3]) ? array_sum($groups[$month3]) : 0, 
            isset($groups[$month2]) ? array_sum($groups[$month2]) : 0,  
            isset($groups[$month1]) ? array_sum($groups[$month1]) : 0, 
        ];
    }
   
 
    /**
     * 
     * Add Non Portfolio Period
     * @return Boolean 
    */
    public function  addNewNonPorfolioRecord($user, $income_id, $header, $access, $period){
        $income = Income::find($income_id);
        if ($header == 'ajnjxbnuhjsbxnhujbxncujhbxdcbhjnasuhjbn' &&  isset($income->income_type) == 'non_portfolio') {
            if($access == 'checkperiod_ajhbxsjnbjsxbnoaklmsikn'){
                $current = $period.'-01';
                $asset_records = NonPortfolioRecord::where('user_id', $user->id)
                                    ->where('income_id', $income->id)
                                    ->where('period', $current)->first();
                if($asset_records){ 
                    $success = true;
                    return response()->json(compact('success','asset_records'));
                }else{
                    $success = false;
                    return response()->json(compact('success','asset_records'));
                }
            }else if($access == 'addnewperiodadd_ajhbxsjbhnsjhbjbnsxjk'){
                $current = $period.'-01';
                $asset_records = NonPortfolioRecord::where('user_id', $user->id)
                                    ->where('income_id', $income->id)
                                    ->where('period', $current)->first();
                $success = true;
                if($asset_records){ 
                    return response()->json(compact('success','asset_records'));
                }else{
                    $asset_records = new NonPortfolioRecord();
                    $asset_records->user_id = $user->id;
                    $asset_records->income_id = $income->id;
                    $asset_records->period = $current;
                    $asset_records->amount = 0;
                    $asset_records->save();  
                    $asset_records = NonPortfolioRecord::where('user_id', $user->id)
                                        ->where('income_id', $income->id)
                                            ->where('period', $current)->first();
                    return response()->json(compact('success','asset_records'));
                }
            }
        }else{
            $success = false; $info = 'Incorrect Information';
            return response()->json(compact('success', 'info'));
        }
    }

    /**
     * 
     * Update Non Portfolio Period
     * @return Boolean 
     */
    public static function updateNonPeriodRecord($user, $period, $income_id, $request){

        $asset_records = NonPortfolioRecord::where('user_id', $user->id)
                            ->where('income_id', $income_id)
                            ->where('period', $period)->first();
        //  info([,$asset_records]);                   
        if($asset_records){
            $income =  Income::where('user_id', $user->id)->where('id', $income_id)->first();
            if(isset($request->automated_rate)) $income->automated = $request->automated_rate; 
            if(isset($request->automated_rate)) $income->income_date = $request->income_date;
            if(isset($request->automated_rate)) $income->income_frequency = $request->income_frequency;
            $income->updated_at = now();
            $income->update(); 
            $asset_records->amount = $request->amount;
            $asset_records->others = 0;  
            $asset_records->note = $request->note;
            $asset_records->save();
            return true;
        }else{
            return false;
        }
    }

    /**
     * 
     *  Non Portfolio Detail for each period available
     * @return Array 
     */
    public  function nonPortfolioDetailChart($user,$account){
        $labels = [];  
        $values = []; 
        
        $asset_records = NonPortfolioRecord::where('user_id', $user->id)
                            ->where('income_id', $account->id) 
                            ->orderBy('period', 'ASC')->limit(6)->get(); 
        foreach($asset_records as $record){
            $period = Carbon::parse($record->period)->format('M');
            array_push($labels, $period); 
            array_push($values, $record->amount);
        }

        $target = (count($asset_records)) ? max($values) * 1.25 : $account->amount * 1.10;
        return compact('labels', 'values', 'target');
    }

    /**
     * 
     *  Portfolio Detail for each period available
     * @return Array 
     */
    public  function portfolioDetailChart($user,$account){
        $labels = [];  
        $values = []; 
        $asset_records = PortfoloAssetRecord::where('user_id', $user->id)
                            ->where('portfolio_asset_id', $account->portfolio_asset_id) 
                            ->orderBy('period', 'ASC')->limit(6)->get(); 
                            
        foreach($asset_records as $record){
            $period = Carbon::parse($record->period)->format('M');
            array_push($labels, $period); 
            array_push($values, $record->net_income);
        } 

        $target = (count($asset_records)) ? max($values) * 1.25 : $account->amount * 1.10;
        return compact('labels', 'values', 'target');
    }

}  