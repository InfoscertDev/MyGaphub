<?php

namespace App\Helper;

use App\Asset\PortfolioAsset;
use App\Asset\PortfoloAssetRecord;
use App\Wheel\IncomeAccount;

class PortfolioHelper {

    public static function globalPortfolio($user){
        $portfolio =  PortfolioAsset::where('user_id', $user->id)->where('asset_category', 'existing')
                            ->where('isArchive', 0)->select('asset_currency')->get();
        $north_america = 0; $europe = 0;
        $africa = 0; $asia = 0;
        $austrailia = 0; $south_america = 0;

        foreach($portfolio as $asset){
            $currency = ($asset->asset_currency) ? explode(' ', $asset->asset_currency)[1] : null;

            if($currency && $currency == 'USD' || $currency == 'CAD'){
                $north_america += 1;
            } else if($currency && $currency == 'EUR' || $currency == 'CHF' || $currency == 'RUB' || $currency == 'GBP'){
                $europe += 1;
            } else if($currency && $currency == 'NGN' || $currency == 'GHS' || $currency == 'ZAR'){
                $africa += 1;
            } else if($currency && $currency == 'JPY' || $currency == 'CNY' || $currency == 'SAR' || $currency == 'AED'
                        || $currency == 'IDR' || $currency == 'INR'){
                $asia += 1;
            } else if($currency && $currency == 'MXN' || $currency == 'BRL'){
                $south_america += 1;
            }else if($currency && $currency == 'AUD'){
                $austrailia += 1;
            }
        }
        $total = array_sum([$north_america, $europe, $africa, $asia, $austrailia, $south_america]);
        if($total){
            $north_america = ($north_america > 0) ? round(($north_america * 100) / $total) : 0;
            $south_america = ($south_america > 0) ? round(($south_america * 100) / $total) : 0;
            $asia = ($asia > 0) ? round(($asia * 100) / $total) : 0;
            $africa = ($africa > 0) ? round(($africa * 100) / $total) : 0;
            $austrailia = ($austrailia > 0) ? round(($austrailia * 100) / $total) : 0;
            $europe = ($europe > 0) ? round(($europe * 100) / $total) : 0;
        }

        $global = compact('north_america', 'europe', 'africa', 'asia', 'austrailia', 'south_america');

        return $global;
    }

    public static  function convertAssetValue($user, $assets){
        foreach($assets as $asset){
            $asset->converted_asset_value = GapExchangeHelper::convert_currency($user, $asset->asset_currency, $asset->asset_value, $asset->automated);
            $asset->converted_monthly_roi = GapExchangeHelper::convert_currency($user, $asset->asset_currency, $asset->monthly_roi, $asset->automated);
            $asset->converted_projected_market_value = GapExchangeHelper::convert_currency($user, $asset->asset_currency, $asset->projected_market_value, $asset->automated);
        }
        return $assets;
    }

    public static function investmentFunds($user){
        $investment_funds = PortfolioAsset::where('user_id', $user->id)
                                ->where('asset_category', 'existing')
                                ->where('isArchive', 0)->get();

        $funds = PortfolioHelper::convertAssetValue($user,$investment_funds);
        $investment = array_sum(array_column($funds->toArray(), 'converted_asset_value') );
        // info($investment);
        return compact('investment');
    }

    public static function activateBRAID($user, $type, $portfolio){
        // BRAID
        $business = []; $risk = []; $appreciate = [];
        $intellect = []; $depreciate = [];
        //
        $values = []; $incomes = [];

        // Split Asset
        foreach ($portfolio as  $asset) {
            if($asset->asset_class == 'business' && $asset->asset_category == $type) array_push($business,$asset) ;
            if($asset->asset_class == 'risk' && $asset->asset_category == $type) array_push($risk,$asset) ;
            if($asset->asset_class == 'appreciating' && $asset->asset_category == $type) array_push($appreciate,$asset) ;
            if($asset->asset_class == 'intellectual' && $asset->asset_category == $type) array_push($intellect,$asset) ;
            if($asset->asset_class == 'depreciating' && $asset->asset_category == $type) array_push($depreciate,$asset) ;
        }
        // Bussiness
        $business = PortfolioHelper::convertAssetValue($user,$business);
        $business_value = array_sum(array_column($business, 'converted_asset_value'));
        $business_income = array_sum(array_column($business, 'converted_monthly_roi'));

        // Risk
        $risk = PortfolioHelper::convertAssetValue($user,$risk);
        $risk_value = array_sum(array_column($risk, 'converted_asset_value'));
        $risk_income = array_sum(array_column($risk, 'converted_monthly_roi'));
        // Appreciating
        $appreciate = PortfolioHelper::convertAssetValue($user,$appreciate);
        $appreciate_value = array_sum(array_column($appreciate, 'converted_asset_value'));
        $appreciate_income = array_sum(array_column($appreciate, 'converted_monthly_roi'));
        // intellect
        $intellect = PortfolioHelper::convertAssetValue($user,$intellect);
        $intellect_value = array_sum(array_column($intellect, 'converted_asset_value'));
        $intellect_income = array_sum(array_column($intellect, 'converted_monthly_roi'));
        // Depreciate
        $depreciate = PortfolioHelper::convertAssetValue($user,$depreciate);
        $depreciate_value = array_sum(array_column($depreciate, 'converted_asset_value'));
        $depreciate_income = array_sum(array_column($depreciate, 'converted_monthly_roi'));

        $values = [ $business_value, $risk_value, $appreciate_value, $intellect_value, $depreciate_value ];
        $incomes = [ $business_income, $risk_income, $appreciate_income, $intellect_income, $depreciate_income];

        return compact('values', 'incomes');
    }

    public static function roiWatch($user, $portfolio){
        //  ROI = {(Monthly Income x 12)*100%}/Cost of Asset Acquisition
        $bus = []; $risk = []; $appreciate = [];
        $intellect = []; $depreciate = [];

        $braid = ['B' => 0, 'R' => 0, 'A' => 0, 'I' => 0, 'D' => 0];
        $braid_roi = [];

        foreach ($portfolio as  $asset) {
            if($asset->asset_class == 'business' && $asset->asset_category == 'existing') array_push($bus,$asset) ;
            if($asset->asset_class == 'risk' && $asset->asset_category == 'existing') array_push($risk,$asset) ;
            if($asset->asset_class == 'appreciating' && $asset->asset_category == 'existing') array_push($appreciate,$asset) ;
            if($asset->asset_class == 'intellectual' && $asset->asset_category == 'existing') array_push($intellect,$asset) ;
            if($asset->asset_class == 'depreciating' && $asset->asset_category == 'existing') array_push($depreciate,$asset) ;
        }

        $total_portfolio = count($bus) + count($risk) + count($appreciate) + count($intellect) + count($depreciate);
        $total_portfolio = $total_portfolio ? $total_portfolio : 1;

        $braid['B'] = round((count($bus) / ($total_portfolio)) * 100);
        $braid['R'] = round((count($risk) / ($total_portfolio)) * 100);
        $braid['A'] = round((count($appreciate) / ($total_portfolio)) * 100);
        $braid['I'] = round((count($intellect) / ($total_portfolio)) * 100);
        $braid['D'] = round((count($depreciate) / ($total_portfolio)) * 100);

        $braid_roi = [$braid['B'], $braid['R'], $braid['A'], $braid['I'], $braid['D']];

        $bus = PortfolioHelper::convertAssetValue($user,$bus);
        $bus_roi = [];

        foreach ($bus as $b) {
            $roi = (($b->converted_monthly_roi * 12) * 100) / ($b->converted_asset_value  ? $b->converted_asset_value  : 1);
            array_push($bus_roi, $roi);
        }

        $risk = PortfolioHelper::convertAssetValue($user,$risk);
        $risk_roi = [];
        foreach ($risk as $b) {
            $average_income = $b->converted_monthly_roi * 12;
            $asset_value = ($b->converted_asset_value) ? $b->converted_asset_value  : 1;
            $roi = ($average_income / $asset_value)  * 100;
            array_push($risk_roi, $roi);
        }

        //
        $appreciate = PortfolioHelper::convertAssetValue($user,$appreciate);
        $appreciate_roi = [];
        foreach ($appreciate as $b) {
            $roi = (($b->converted_monthly_roi * 12) * 100) / ($b->converted_asset_value  ? $b->converted_asset_value  : 1);
            array_push($appreciate_roi, $roi);
        }

        $intellect = PortfolioHelper::convertAssetValue($user,$intellect);
        $intellect_roi = [];
        foreach ($intellect as $b) {
            $roi = (($b->converted_monthly_roi * 12) * 100) / ($b->converted_asset_value  ? $b->converted_asset_value  : 1);
            array_push($intellect_roi, $roi);
        }

        //
        $depreciate = PortfolioHelper::convertAssetValue($user,$depreciate);
        $depreciate_roi = [];
        foreach ($depreciate as $b) {
            $roi = (($b->converted_monthly_roi * 12) * 100) / ($b->converted_asset_value  ? $b->converted_asset_value  : 1);
            array_push($depreciate_roi, $roi);
        }

        $bus_percentage = (array_sum($bus_roi) / (count($bus) ? count($bus) : 1)) ;
        $risk_percentage = (array_sum($risk_roi )/ (count($risk) ? count($risk) : 1)) ;
        $appreciate_percentage = (array_sum($appreciate_roi) / (count($appreciate) ? count($appreciate) : 1)) ;
        $intellect_percentage = (array_sum($intellect_roi) / (count($intellect) ? count($intellect) : 1)) ;
        $depreciate_percentage = (array_sum($depreciate_roi) / (count($depreciate) ? count($depreciate) : 1)) ;

        // $roi = [$bus_roi, $risk_roi, $appreciate_roi,$intellect_roi, $depreciate_roi ];
        $roi = [$bus_percentage, $risk_percentage, $appreciate_percentage,$intellect_percentage, $depreciate_percentage ];
        return compact('total_portfolio', 'braid', 'braid_roi', 'roi');
    }

    public static function roiTrend($currentRoi, $previousRoi) {
        $trend = [];

        foreach ($currentRoi as $index => $value) {
            if (!isset($previousRoi[$index])) {
                $trend[] = ['change' => 0, 'direction' => 'neutral'];
                continue;
            }

            $difference = $value - $previousRoi[$index];
            $direction = $difference > 0 ? 'increasing' : ($difference < 0 ? 'decreasing' : 'neutral');

            $trend[] = [
                'change' => round($difference, 2),
                'direction' => $direction
            ];
        }

        return $trend;
    }

    public static function getCurrentRoi($user, $portfolio) {
        $roiData = self::roiWatch($user, $portfolio);
        return $roiData['roi'];
    }

    public static function getPreviousRoi($user, $from, $to) {
        $previousPortfolio = PortfolioAsset::where('user_id', $user->id)
            ->where('isArchive', 0)
            ->whereBetween('created_at', [$from, $to])
            ->get();

        $roiData = self::roiWatch($user, $previousPortfolio);
        return $roiData['roi'];
    }



    private static function calculateROI($asset) {
        $monthly_income = $asset->converted_monthly_roi ?? 0;
        $asset_value = $asset->converted_asset_value ?? 1; // Avoid division by zero
        return (($monthly_income * 12) / $asset_value) * 100;
    }

    private static function calculatePercentageChange($previous, $current) {
        if ($previous == 0) {
            return $current > 0 ? 100 : ($current < 0 ? -100 : 0);
        }
        return (($current - $previous) / $previous) * 100;
    }

    public static function groupPortfolio($user, $type, $archive, $period=[]){
        $existing = []; $desired = [];
        if ($archive) {
            $portfolio_assets = PortfolioAsset::where('user_id', $user->id)->where('asset_category', 'existing')
                    ->where('isArchive', 1)->where('asset_class', $type)
                    ->when( isset($period['from']) && isset($period['to']), function ($query) use ($period) {
                        return $query->whereBetween('created_at', [$period['from'], $period['to']]);
                    })
                    ->latest()->get();
        }else{
            $portfolio_assets = PortfolioAsset::where('user_id', $user->id)->where('isArchive', 0)
                    ->where('asset_class', $type)
                    ->when( isset($period['from']) && isset($period['to']), function ($query) use ($period) {
                        return $query->whereBetween('created_at', [$period['from'], $period['to']]);
                    })
                    ->latest()->get();
        }
        foreach($portfolio_assets as $asset){
            if($asset->asset_category == 'existing') array_push($existing, $asset);
            if($asset->asset_category == 'desired') array_push($desired, $asset);
        }
        return compact('existing', 'desired');
    }

    public static function groupBraidPortfolio($user, $archive){
        $business = []; $risk = [];
        $appreciating = [];
        $intellectual = [];
        $depreciating = [];
        if ($archive) {
            $portfolio_assets = PortfolioAsset::where('user_id', $user->id)->where('asset_category', 'existing')->where('isArchive', 1)->latest()->get();
        }else{
            $portfolio_assets = PortfolioAsset::where('user_id', $user->id)->where('asset_category', 'existing')->where('isArchive', 0)->latest()->get();
        }

        foreach($portfolio_assets as $asset){
            if($asset->asset_class == 'business') array_push($business, $asset);
            if($asset->asset_class == 'risk') array_push($risk, $asset);
            if($asset->asset_class == 'appreciating') array_push($appreciating, $asset);
            if($asset->asset_class == 'intellectual') array_push($intellectual, $asset);
            if($asset->asset_class == 'depreciating') array_push($depreciating, $asset);
        }

        return compact('business', 'risk', 'appreciating', 'intellectual', 'depreciating');
    }

    public static function assetFinancialDetail($user, $asset, $financials, $convert = true){
        $expenditure_labels = [];
        $asset_values = [];
        $revenue = [];
        $expenditure = [];
        $net = [];

        // Initialize percentage changes array
        $percentage_changes = [
            'revenue' => 0,
            'expenditure' => 0,
            'net' => 0
        ];

        // Get the last 6 records
        $latest_financials = array_slice($financials->toArray(), -6);

        foreach($latest_financials as $finicial) {
            array_push($expenditure_labels, date('M', strtotime($finicial['period']) ). ' '. date('Y', strtotime($finicial['period'])) );

            if($convert){
                array_push($revenue, GapExchangeHelper::convert_currency($user, $asset->asset_currency, $finicial['revenue'], $asset->automated));
                array_push($expenditure, GapExchangeHelper::convert_currency($user, $asset->asset_currency, $finicial['expenditure'], $asset->automated));
                array_push($net, GapExchangeHelper::convert_currency($user, $asset->asset_currency, $finicial['net_income'], $asset->automated));
                array_push($asset_values, GapExchangeHelper::convert_currency($user, $asset->asset_currency, $finicial['amount'], $asset->automated));
            } else {
                array_push($revenue, $finicial['revenue']);
                array_push($expenditure, $finicial['expenditure']);
                array_push($net, $finicial['net_income']);
                array_push($asset_values, $finicial['amount']);
            }
        }

        // Calculate percentage changes if we have at least 2 records
        if (count($revenue) >= 2) {
            $latest_idx = count($revenue) - 1;
            $previous_idx = $latest_idx - 1;

            // Calculate percentage change for revenue
            if ($revenue[$previous_idx] != 0) {
                $percentage_changes['revenue'] = (($revenue[$latest_idx] - $revenue[$previous_idx]) / abs($revenue[$previous_idx])) * 100;
            }

            // Calculate percentage change for expenditure
            if ($expenditure[$previous_idx] != 0) {
                $percentage_changes['expenditure'] = (($expenditure[$latest_idx] - $expenditure[$previous_idx]) / abs($expenditure[$previous_idx])) * 100;
            }

            // Calculate percentage change for net
            if ($net[$previous_idx] != 0) {
                $percentage_changes['net'] = (($net[$latest_idx] - $net[$previous_idx]) / abs($net[$previous_idx])) * 100;
            }
        }

        return compact('expenditure_labels', 'asset_values', 'revenue', 'expenditure', 'net', 'percentage_changes');
    }

    public static function assetFinancialChart($assets){
        $expenditure_labels = [];
        $management = [];
        $taxes = [];
        $maintenance = [];
        $others = [];
        $revenue = [];
        $expenditure = [];
        $net = [];

        // Get the last 6 records
        $latest_assets = array_slice($assets->toArray(), -6);

        foreach($latest_assets as $finicial) {
            array_push($expenditure_labels, date('M', strtotime($finicial['period']) ). ' '. date('Y', strtotime($finicial['period'])) );
            array_push($management, $finicial['management']);
            array_push($taxes, $finicial['taxes']);
            array_push($maintenance, $finicial['maintenance']);
            array_push($others, $finicial['others']);

            array_push($revenue, $finicial['revenue']);
            array_push($expenditure, $finicial['expenditure']);
            array_push($net, $finicial['net_income']);
        }

        $curriculum = [array_sum($revenue), array_sum($expenditure), array_sum($net)];

        return compact('expenditure_labels', 'management', 'taxes', 'maintenance', 'others', 'curriculum');
    }


    public static function existingDetailChart($user, $braid = '', $periods = [])
    {
        $existing = PortfolioAsset::join('portfolo_asset_records','portfolio_assets.id', '=','portfolo_asset_records.portfolio_asset_id')
                        ->where('portfolio_assets.user_id', $user->id)
                        ->where('portfolio_assets.asset_class', $braid)
                        ->when(isset($periods['from']) && isset($periods['to']), function ($query) use ($periods) {
                            return $query->whereBetween('period', [$periods['from'], $periods['to']]);
                        })
                        ->orderBy('period', 'DESC')->get();

        $labels = [];
        $label_asset = [];
        $incomes = [];
        $values = [];
        $period = [];
        $current_period_amount = 0;
        $current_period_income = 0;

        foreach($existing as $key => $asset){
            if(count($period) < 6){
                $period_date = strtotime($asset->period);

                if(end($period) != $asset->period) {
                    if($current_period_amount > 0) {
                        $values[] = $current_period_amount;
                        $incomes[] = $current_period_income;
                    }

                    array_push($label_asset, date('F Y', $period_date));
                    array_push($labels, date('M Y', $period_date));
                    array_push($period, $asset->period);

                    $current_period_amount = 0;
                    $current_period_income = 0;
                }

                $expenditure = $asset->management + $asset->taxes + $asset->maintenance + $asset->others;
                $net_income = $asset->revenue - $expenditure;
                if($net_income == 0 && $asset->net_income) $net_income = $asset->net_income;

                $current_amount = GapExchangeHelper::convert_currency($user, $asset->asset_currency, $asset->amount, $asset->automated);
                $current_net_income = GapExchangeHelper::convert_currency($user, $asset->asset_currency, $net_income, $asset->automated);

                $current_period_amount += $current_amount;
                $current_period_income += $current_net_income;
            }
        }

        if($current_period_amount > 0) {
            $values[] = $current_period_amount;
            $incomes[] = $current_period_income;
        }

        $asset_incomes = $incomes;
        $asset_values = $values;

        return compact('labels', 'label_asset', 'asset_incomes', 'asset_values');
    }

    public static function accountBackground(){
        return  [
            "#8C8D86",
            "#E6C069",
            "#897B61",
            "#8DAB8E",
            "#77A2BB",
            "#E28394"
        ];
    }

    public static function uploadPortfolioDocument($user,$asset, $request){
        //  |mimes:jpeg,jpg,png,gif,pdf,txt,doc,docx,xls
        $request->validate(['asset_document_name' => 'required','asset_document' => 'required|max:7140']);
        $ext = $request->file('asset_document')->extension();
        $filename = $user->id.sha1(time()). rand(100000, 999999) . '.'.$ext;
        $year = date('Y');
        $ref_path  = "public/portfolio/$year";
        $upload_path = $request->file('asset_document')->storeAs($ref_path, $filename);

        if(!$asset->document1) $asset->document1  = "$request->asset_document_name|$upload_path";
        elseif(!$asset->document2) $asset->document2  = "$request->asset_document_name|$upload_path";
        elseif(!$asset->document3) $asset->document3  = "$request->asset_document_name|$upload_path";
        elseif(!$asset->document4) $asset->document4  = "$request->asset_document_name|$upload_path";
        elseif(!$asset->document5) $asset->document5  = "$request->asset_document_name|$upload_path";
        elseif(!$asset->document6) $asset->document6  = "$request->asset_document_name|$upload_path";
        elseif(!$asset->document7) $asset->document7  = "$request->asset_document_name|$upload_path";
        elseif(!$asset->document8) $asset->document8  = "$request->asset_document_name|$upload_path";
        else{ return false;}

        $asset->save();
     }


     public static function  addNewPortfolioAsset($user,$request){
        $last_period = date("Y-m-d",strtotime("-1 months", strtotime(date('Y-m').'-01')) );
        if($request->asset_category) $request->ahbjjshbjsnmbnmsbxdnvsxbv = $request->asset_category;
        if($request->asset_class) $request->ajnsjxnjsnxbjnbajknsjnds = $request->asset_class;

        $portfolio = new PortfolioAsset();
        $portfolio->user_id = $user->id;
        $portfolio->asset_category = $request->ahbjjshbjsnmbnmsbxdnvsxbv;
        $portfolio->asset_class = $request->ajnsjxnjsnxbjnbajknsjnds;
        $portfolio->asset_type = 'manual';
        $portfolio->portfolio_type_id = $request->portfolio_type;
        $portfolio->automated =  $request->automated_rate;
        $portfolio->asset_currency = $request->currency;
        $portfolio->name = $request->asset_name;
        $portfolio->description = $request->description;
        $portfolio->asset_value = $request->asset_value;
        $portfolio->monthly_roi = $request->monthly_roi;
        $portfolio->credit_value = $request->credit_value;
        $portfolio->projected_market_value = $request->projected_value;
        $portfolio->save();

        $asset_records = new PortfoloAssetRecord();
        $asset_records->user_id = $user->id;
        $asset_records->portfolio_asset_id = $portfolio->id;
        $asset_records->period = $last_period;
        $asset_records->amount = (float)$portfolio->asset_value; // Explicit casting
        // $asset_records->net_income = (float)$portfolio->monthly_roi;
        $asset_records->net_income = $portfolio->monthly_roi;
        $asset_records->save();
        $success = true;
        return response()->json(compact('success', 'portfolio'));
    }

    public static function addNewRecordPeriod($user, $asset, $header, $access, $period){
        $last_asset_record = PortfoloAssetRecord::where('user_id', $user->id)->where('portfolio_asset_id', $asset->id)
                                 ->orderBy('period', 'DESC')->first();
        // info([ $last_asset_record ]);

        if ($header == 'ajnjxbnuhjsbxnhujbxncujhbxdcbhjnasuhjbn') {
            if($access == 'current_ajjaknjkxbnjnksxknmcfaz'){
                $current = date('Y-m-d', strtotime(date('Y-m') . '-01'));

                $asset_records = PortfoloAssetRecord::where('user_id', $user->id)->where('portfolio_asset_id', $asset->id)
                            ->where('period', $current)->first();
                $success = true;
                if($asset_records){
                    return response()->json(compact('success','asset_records'));
                }else{
                    $asset_records = new PortfoloAssetRecord();
                    $asset_records->user_id = $user->id;
                    $asset_records->portfolio_asset_id = $asset->id;
                    $asset_records->period = $current;
                    $asset_records->amount =  $last_asset_record ?? $asset->asset_value;
                    $asset_records->save();
                    $asset_records->income = $asset->monthly_roi;
                    $asset_records = PortfoloAssetRecord::where('user_id', $user->id)->where('portfolio_asset_id', $asset->id)
                                ->where('period', $current)->first();
                    return response()->json(compact('success','asset_records'));
                }
            }else if($access == 'addperiod_ajhbxsjnbjsxbnoaklmsikn'){
                $current = date('Y-m-d', strtotime($period . '-01'));
                $asset_records = PortfoloAssetRecord::where('user_id', $user->id)
                                        ->where('portfolio_asset_id', $asset->id)
                                        ->where('period', $current)->first();
                $success = true;
                if($asset_records){
                    return response()->json(compact('success','asset_records'));
                }else{
                    return response()->json(compact('success','asset_records'));
                }
            }else if($access == 'addnewperiodadd_ajhbxsjbhnsjhbjbnsxjk'){
                $current = date('Y-m-d', strtotime($period . '-01'));
                $asset_records = PortfoloAssetRecord::where('user_id', $user->id)->where('portfolio_asset_id', $asset->id)
                        ->where('period', $current)->first();
                        $success = true;
                if($asset_records){
                    return response()->json(compact('success','asset_records'));
                }else{
                    $asset_records = new PortfoloAssetRecord();
                    $asset_records->user_id = $user->id;
                    $asset_records->portfolio_asset_id = $asset->id;
                    $asset_records->period = $current;
                    $asset_records->amount = $asset->asset_value;
                    $asset_records->save();
                    $asset_records = PortfoloAssetRecord::where('user_id', $user->id)->where('portfolio_asset_id', $asset->id)
                                ->where('period', $current)->first();
                    return response()->json(compact('success','asset_records'));
                }
            }
        }else{
            $success = false; $info = 'Incorrect Header';
            return response()->json(compact('success', 'info'));
        }
    }

    public static function updatePeriodRecord($user, $period,$asset,$request){
        $asset_records = PortfoloAssetRecord::where('user_id', $user->id)->where('portfolio_asset_id', $asset)
                ->where('period', $period)->first();
        // info(['Asset ', $asset, $period]);
        if(!$asset_records){
            $asset_records = new PortfoloAssetRecord();
            $asset_records->user_id = $user->id;
            $asset_records->portfolio_asset_id = $asset;
            $asset_records->period = $period;
            $asset_records->amount = $request->amount;
            $asset_records->revenue = $request->revenue;
            $asset_records->management = $request->management;
            $asset_records->taxes = $request->taxes;
            $asset_records->others = $request->others;
            $asset_records->maintenance = $request->maintenance;
            $asset_records->maintenance_details = $request->maintenance_details;
            $asset_records->note = $request->note;
            $asset_records->save();
            return true;
        }

        if($asset_records){
            $income =  IncomeAccount::where('user_id', $user->id)->where('portfolio_asset_id', $asset)->first();
            if($income){
                $income->updated_at = now();
                $income->update();
            }

            $asset_records->amount = $request->amount;
            $asset_records->revenue = $request->revenue;
            $asset_records->management = $request->management;
            $asset_records->taxes = $request->taxes;
            $asset_records->others = $request->others;
            $asset_records->maintenance = $request->maintenance;
            $asset_records->maintenance_details = $request->maintenance_details;
            $asset_records->note = $request->note;
            $asset_records->save();
            return true;
        }else{
            return false;
        }
    }

    public static function updateNoteRecord($user, $period,$asset,$request){
        $asset_records = PortfoloAssetRecord::where('user_id', $user->id)->where('portfolio_asset_id', $asset)
                ->where('period', $period)->first();

        if(!$asset_records){
            $asset_records = new PortfoloAssetRecord();
            $asset_records->user_id = $user->id;
            $asset_records->portfolio_asset_id = $asset;
            $asset_records->period = $period;
            $asset_records->note = $request->note;
            $asset_records->save();
        }else{
            $asset_records->note = $request->note;
            $asset_records->save();
        }
        return true;
    }
}
