<?php

namespace App\Helper;

use App\FinicialCalculator as Calculator;
use App\Asset\SeedBudget as Budget;
use App\DiscretionaryBudget as Philantrophy;
use App\UserAudit as Audit;
use App\Helper\IncomeHelper;
use stdClass;


// 
class CalculatorClass{

    public static function finicial($user){
        // Initial Budget or Calculator Workflow
        $calculator = Calculator::where('user_id', $user->id)->first();
        // Current Budget or Average Seed
        $seed = CalculatorClass::averageSeedDetail($user);
        $averageSeed = CalculatorClass::getAverageSeed($user);
        $isBudgetable = ($seed['total_seed'] > 1) ? true : false;
        // Use Seed if Average Income is available
        if($seed['total_seed'] > 1){
            $cost = $seed['total']; 
            $calculator->periodic_savings = $seed['table']['savings'];
            $expenditure = $seed['table']['expenditure']; 
            $calculator->charity = $seed['table']['discretionary'];
            $calculator->education =  $seed['table']['education'];
            $calculator->mortgage = $averageSeed->accomodation;
            $calculator->mobility = $averageSeed->mobility;
            $calculator->utility = $averageSeed->utilities; 
            $calculator->expenses = $averageSeed->expenses;
            $calculator->dept_repay = $averageSeed->debt_repay; 
        }else{ 
            // Primary Cost of Living
            $expenditure =  $calculator->mortgage + $calculator->mobility + $calculator->utility + 
                     $calculator->expenses + $calculator->dept_repay;
            $cost = $expenditure + $calculator->charity + $calculator->education + $calculator->periodic_savings;
        }
        // Portfolio and Asset
        $portfolios = IncomeHelper::analyseIncome($user, $calculator->other_income);
        $income_audit = Audit::where('user_id', $user->id)->select('income_allocated')->first();
        $funds = PortfolioHelper::investmentFunds($user); 
       
        if(!$income_audit){
            $tiles = HelperClass::dashboardTiles();
            $audit = new Audit();  
            $audit->user_id = $user->id; 
            $audit->dashboard = json_encode($tiles);
            $audit->save(); 
            $income_audit = Audit::where('user_id', $user->id)->select('income_allocated')->first();
        } 
        $portfolio  = ($portfolios['isPortfolio'] || $income_audit->income_allocated) ? $portfolios['income_portfolio'] : $calculator->other_income; 
        $non_portfolio  = $portfolios['income_non_portfolio'];
        $calculator->other_income = $portfolio;
        
        $investment = $funds['investment'];
        $saving = $calculator->extra_save; 
        // $investment = $calculator->investment;
        $roce = $calculator->roce;   
        return compact('cost', 'saving', 'portfolio', 'non_portfolio', 'roce', 
                            'expenditure','investment', 'calculator', 'isBudgetable');
    }
 
    public static function snapshot($calculator, $cost){
        // info([$calculator->other_income, $calculator->extra_save, $cost]);
        if($cost){
            $currenttime = (30 * $calculator->extra_save)  / $cost;
            $currentper = ($calculator->other_income * 100) / $cost;
        }else{
            $currenttime = 0;  $currentper = 0;
        }
        
        $timecolor = HelperClass::daysPercentageColor($currenttime);
        $percolor = HelperClass::numPercentageColor($currentper);
         
        $data = [
            'timeper' => round(($currenttime / 360 )* 100),
            'currenttime' => round($currenttime),
            'currentper' => round($currentper),
            'timecolor' => $timecolor,  'percolor' => $percolor
        ];
        return $data;
    }

    public static function accountBackground(){
        return  [
             "#00B050",
             "#E6C069",
             "#D13B56",
             "#77A2BB"
        ];
    }

    public static function getCurrentSeed($user){
        $current_seed = Budget::where('user_id', $user->id)->where('period', date('Y-m').'-01')
            ->orderBy('period', 'DESC')->first();
        $month = date('m')-1;
        $last_seed = Budget::where('user_id', $user->id)->where('period', date('Y-').$month.'-01')
            ->orderBy('period', 'DESC')->first();
        // var_dump($last_seed);
        if(!$current_seed){
                $current_seed = new Budget();
                $current_seed->user_id = $user->id;
                $current_seed->period = date('Y-m').'-01';
                if($last_seed){
                    $current_seed->investment_fund =  $last_seed->investment_fund;
                    $current_seed->personal_fund =  $last_seed->personal_fund;
                    $current_seed->emergency_fund =  $last_seed->emergency_fund;
                    $current_seed->financial_training =  $last_seed->financial_training;
                    $current_seed->career_development =  $last_seed->career_development;
                    $current_seed->mental_development =  $last_seed->mental_development;
                    $current_seed->accomodation  = $last_seed->accomodation;
                    $current_seed->mobility  = $last_seed->mobility;
                    $current_seed->expenses  = $last_seed->expenses;
                    $current_seed->utilities  = $last_seed->utilities;
                    $current_seed->debt_repay  = $last_seed->debt_repay;
                    $current_seed->charity =  $last_seed->charity;
                    $current_seed->family_support =  $last_seed->family_support;
                    $current_seed->personal_commitments =  $last_seed->personal_commitments;
                    $current_seed->save();
                }  
                $current_seed->save();
                $current_seed = Budget::where('user_id', $user->id)
                                    ->where('period', date('Y-m').'-01')
                                    ->orderBy('period', 'DESC')->first(); 
        }else{
            $total = [ $current_seed->investment_fund, $current_seed->personal_fund,$current_seed->emergency_fund,$current_seed->financial_training,
                        $current_seed->career_development,$current_seed->mental_development, $current_seed->accomodation, $current_seed->mobility,
                        $current_seed->expenses,$current_seed->utilities,$current_seed->debt_repay, $current_seed->charity,
                        $current_seed->family_support, $current_seed->personal_commitments ];
            $total = array_sum($total);
            if($last_seed && $total == 0){
                $current_seed->investment_fund =  $last_seed->investment_fund;
                $current_seed->personal_fund =  $last_seed->personal_fund;
                $current_seed->emergency_fund =  $last_seed->emergency_fund;
                $current_seed->financial_training =  $last_seed->financial_training;
                $current_seed->career_development =  $last_seed->career_development;
                $current_seed->mental_development =  $last_seed->mental_development;
                $current_seed->accomodation  = $last_seed->accomodation;
                $current_seed->mobility  = $last_seed->mobility;
                $current_seed->expenses  = $last_seed->expenses;
                $current_seed->utilities  = $last_seed->utilities;
                $current_seed->debt_repay  = $last_seed->debt_repay;
                $current_seed->charity =  $last_seed->charity;
                $current_seed->family_support =  $last_seed->family_support;
                $current_seed->personal_commitments =  $last_seed->personal_commitments;
                $current_seed->save();
            } 
        }
        return  $current_seed;
    }

    public static function getTargetSeed($user){
        $year = (int)date('Y') + 1;  
        $target = $year.'-01-01'; 
        $target_seed = Budget::where('user_id', $user->id)->where('period',$target)
                             ->orderBy('period', 'DESC')->first();

        if(!$target_seed){
            $target_seed = new Budget();
            $target_seed->user_id = $user->id;
            $target_seed->period =$target;
            $target_seed->save();
            $target_seed = Budget::where('user_id', $user->id)->where('period',$target)
                ->orderBy('period', 'DESC')->first();
        }
        return  $target_seed;
    }
 
    public static function averageSeedDetail($user){
        $calculator = Calculator::where('user_id', $user->id)->first();
        $year = (int)date('Y') + 1;  
        $target = $year.'-01-01';  
        $philantrophy = Philantrophy::where('user_id', $user->id)->first();
        // Make sure Philantrophy Information is available
        if(!$philantrophy) {
            GapAccountCalculator::initUserChartity($user);
            $philantrophy = Philantrophy::where('user_id', $user->id)->first();
        }
        // Load the last 6 months without current month and next year
        $seeds =  Budget::where('user_id', $user->id)->where('period', '!=', $target)
                            ->where('period', '!=', date('Y-m').'-01')
                            ->latest()->limit(6)->get();
    
        $savings = [];
        $education = [];
        $expenditure = [];
        $discretionary = [];
        foreach($seeds as $seed){
            array_push($savings,  $seed->investment_fund) ;
            array_push($savings,  $seed->personal_fund) ;
            array_push($savings,  $seed->emergency_fund) ;
            array_push($education,  $seed->financial_training) ;
            array_push($education,  $seed->career_development) ;
            array_push($education,  $seed->mental_development) ;
            array_push($expenditure,  $seed->accomodation) ;
            array_push($expenditure,  $seed->mobility) ;
            array_push($expenditure,  $seed->expenses) ;
            array_push($expenditure,  $seed->utilities) ;
            array_push($expenditure,  $seed->debt_repay) ;
            array_push($discretionary,  $seed->charity) ;
            array_push($discretionary,  $seed->family_support) ;
            array_push($discretionary,  $seed->personal_commitments) ;
            array_push($discretionary,  $seed->others) ;
        }
 
        // info(['Calculator >>>'.$calculator]); 
        $mortgage = isset($calculator->mortgage) ? $calculator->mortgage : 0;
        $calc_expenditure =  $mortgage + $calculator->mobility + $calculator->utility + 
                        $calculator->expenses + $calculator->dept_repay;

        $isSeed = (count($seeds->toArray()) > 1) ? 0 : 1; 
        $total_seed =  count($seeds->toArray());
        $avg_savings = ( array_sum($savings) > 0) ? count($seeds->toArray()) + $isSeed : 1;
        $avg_education = ( array_sum($education) > 0) ? count($seeds->toArray()) + $isSeed : 1;
        $avg_expenditure = ( array_sum($expenditure) > 0) ? count($seeds->toArray()) + $isSeed : 1;
        $avg_discretionary = ( array_sum($discretionary) > 0) ? count($seeds->toArray()) + $isSeed : 1;

        if(count($seeds->toArray()) > 1){
            // After 2 months
            $savings =  round(array_sum($savings) / $avg_savings, 2);
            $education = round(array_sum($education) / $avg_education, 2);
            $expenditure = round(array_sum($expenditure)  / $avg_expenditure,2);
            $discretionary = round(array_sum($discretionary) / $avg_discretionary, 2);
        }else{ 
            // Before 2 months of  use
            $savings = (array_sum($savings) + $calculator->periodic_savings) / $avg_savings;
            $education = (array_sum($education) + $calculator->education) / $avg_education;
            $expenditure = (array_sum($expenditure) + $calc_expenditure) / $avg_expenditure;
            $philantrophy_sum = [$philantrophy->charity, $philantrophy->family_support, $philantrophy->personal_commitments, $philantrophy->others ];
            $discretionary = (array_sum($discretionary) + array_sum($philantrophy_sum) ) / $avg_discretionary;
        }

        $table = compact('savings', 'education', 'expenditure', 'discretionary');
        $total = array_sum($table);
        $seed = [
            'savings' => ($savings) ? round(($savings / $total) * 100) : 0,
            'education' => ($education) ? round(($education / $total) * 100) : 0,
            'expenditure' => ($expenditure) ? ($expenditure / $total) * 100 : 0,
            'discretionary' => ($discretionary) ? ($discretionary / $total) * 100 : 0
        ];
        $seed_web = [
            ($savings) ? round(($savings / $total) * 100) : 0,
            ($education) ? round(($education / $total) * 100) : 0,
            ($expenditure) ? round(($expenditure / $total) * 100): 0,
            ($discretionary) ? round(($discretionary / $total) * 100) : 0
        ];

        return  compact('table', 'seed','seed_web', 'total','total_seed');

    }

    // Construct Average Seed Object
    public static function getAverageSeed($user){
        $calculator = Calculator::where('user_id', $user->id)->first();
        $philantrophy = Philantrophy::where('user_id', $user->id)->first();
        $year = (int)date('Y') + 1;  
        $target = $year.'-01-01';  
        // Make sure Philantrophy Information is available
        if(!$philantrophy) {
            GapAccountCalculator::initUserChartity($user);
            $philantrophy = Philantrophy::where('user_id', $user->id)->first();
        }

        // Load the last 6 months without current month where('period', date('Y-m').'-01')
        $seeds =  Budget::where('user_id', $user->id)->where('period', '!=', $target)
                            ->where('period', '!=', date('Y-m').'-01')
                            ->latest()->limit(6)->get();
        // Init Seed Detail Variable
        $investment_fund = []; $personal_fund = [];
        $emergency_fund = [];  $financial_training = [];
        $career_development = []; $mental_development = [];
        $accomodation = []; $mobility = [];
        $expenses = []; $utilities = [];
        $debt_repay = []; $charity = [];
        $family_support = []; $personal_commitments = [];
        $others = [];
       
        $total_seed = (count($seeds->toArray())) ? count($seeds->toArray()) : 1;
        $isSeed = (count($seeds->toArray()) == 1) ? 1 : 0;  
        // $isSeed = 0;  
        
        // Add Calculator Values if User is not upto 2 months on the system
        if($total_seed <= 1){ 
            // Expenditure
            array_push($accomodation,$calculator->mortgage ?? 0);
            array_push($mobility,$calculator->mobility ?? 0);
            array_push($utilities,$calculator->utility  ?? 0);
            array_push($expenses, $calculator->expenses  ?? 0);
            array_push($debt_repay,$calculator->dept_repay  ?? 0);
            // Discretionary
            array_push( $charity, $philantrophy->charity ?? 0); 
            array_push( $family_support, $philantrophy->family_support ?? 0);
            array_push( $personal_commitments, $philantrophy->personal_commitments ?? 0);
            array_push( $others, $philantrophy->others ?? 0);
        }
        
        // Group Data to respective Unit
        foreach($seeds as $seed){ 
            array_push($investment_fund,  $seed->investment_fund) ;
            array_push($personal_fund,  $seed->personal_fund) ;
            array_push($emergency_fund,  $seed->emergency_fund) ;
            array_push($financial_training,  $seed->financial_training) ;
            array_push($career_development,  $seed->career_development) ;
            array_push($mental_development,  $seed->mental_development) ;
            array_push($accomodation,  $seed->accomodation) ;
            array_push($mobility,  $seed->mobility) ;
            array_push($expenses,  $seed->expenses) ;
            array_push($utilities,  $seed->utilities) ;
            array_push($debt_repay,  $seed->debt_repay) ;
            array_push($charity,  $seed->charity) ;
            array_push($family_support,  $seed->family_support) ;
            array_push($personal_commitments,  $seed->personal_commitments) ;
            array_push($others,  $seed->others) ;
        } 
        // Get Total average Unit
        // Savings
        $investment_fund = round(array_sum($investment_fund) / $total_seed,2); 
        $personal_fund = round(array_sum($personal_fund) / $total_seed, 2);
        $emergency_fund = round(array_sum($emergency_fund) / $total_seed, 2);
        // Education  
        $financial_training = round(array_sum($financial_training) / $total_seed, 2);
        $career_development = round(array_sum($career_development) / $total_seed, 2); 
        $mental_development = round(array_sum($mental_development) / $total_seed, 2);
        // Expenditure
        $accomodation = round(array_sum($accomodation) / ($total_seed + $isSeed), 2); 
        $mobility = round(array_sum($mobility) / ($total_seed + $isSeed), 2);
        $expenses = round(array_sum($expenses) / ($total_seed + $isSeed), 2); 
        $utilities = round(array_sum($utilities) / ($total_seed + $isSeed), 2);
        $repay = round((array_sum($debt_repay))/ ($total_seed + $isSeed), 2);
        // Discretionary 
        $charity = round(array_sum($charity) /  ($total_seed + $isSeed), 2);
        $family_support = round(array_sum($family_support) /  ($total_seed + $isSeed), 2); 
        $personal_commitments = round(array_sum($personal_commitments) /  ($total_seed + $isSeed), 2);
        $others = round(array_sum($others) /  ($total_seed + $isSeed), 2);
         
        //Load Seed information into new Average Seed Object
        $averageSeed = new stdClass(); 
        $averageSeed->investment_fund = $investment_fund;  
        $averageSeed->personal_fund = $personal_fund;
        $averageSeed->emergency_fund = $emergency_fund;

        $averageSeed->financial_training = $financial_training;
        $averageSeed->career_development = $career_development;
        $averageSeed->mental_development = $mental_development;
        
        $averageSeed->accomodation = $accomodation;
        $averageSeed->mobility = $mobility;
        $averageSeed->expenses = $expenses; 
        $averageSeed->utilities = $utilities;
        $averageSeed->debt_repay = $repay;

        $averageSeed->charity = $charity;
        $averageSeed->family_support = $family_support;
        $averageSeed->personal_commitments = $personal_commitments;
        $averageSeed->others = $others;

        return $averageSeed;
    }
    
    public static function getSeedDetail($seed){
        // List of Seed Section
        $savings = [];
        $education = [];
        $expenditure = [];
        $discretionary = [];

        // Unroll given SEED data to  each section
        array_push($savings,  $seed->investment_fund) ;
        array_push($savings,  $seed->personal_fund) ;
        array_push($savings,  $seed->emergency_fund) ;
        array_push($education,  $seed->financial_training) ;
        array_push($education,  $seed->career_development) ;
        array_push($education,  $seed->mental_development) ;
        array_push($expenditure,  $seed->accomodation) ;
        array_push($expenditure,  $seed->mobility) ;
        array_push($expenditure,  $seed->expenses) ;
        array_push($expenditure,  $seed->utilities) ;
        array_push($expenditure,  $seed->debt_repay) ;
        array_push($discretionary,  $seed->charity) ;
        array_push($discretionary,  $seed->family_support) ;
        array_push($discretionary,  $seed->personal_commitments) ;
        array_push($discretionary,  $seed->others) ;

        // Sum each section amount
        $savings = array_sum($savings) ;
        $education = array_sum($education) ;
        $expenditure = array_sum($expenditure) ;
        $discretionary = array_sum($discretionary);

        // Format Information according to its platform
        $table = compact('savings', 'education', 'expenditure', 'discretionary');
        $total = array_sum($table);
        $seed = [
            'savings' => ($savings) ? round(($savings / $total) * 100) : 0,
            'education' => ($education) ? round(($education / $total) * 100) : 0,
            'expenditure' => ($expenditure) ? ($expenditure / $total) * 100 : 0,
            'discretionary' => ($discretionary) ? ($discretionary / $total) * 100 : 0
        ];
        $seed_web = [
            ($savings) ? round(($savings / $total) * 100) : 0,
            ($education) ? round(($education / $total) * 100) : 0,
            ($expenditure) ? round(($expenditure / $total) * 100): 0,
            ($discretionary) ? round(($discretionary / $total) * 100) : 0
        ];
        return  compact('table', 'seed','seed_web', 'total');
    }
} 