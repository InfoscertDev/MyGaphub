<?php

namespace App\Http\Controllers\Web;

use App\Asset\PortfolioAsset;
use App\Asset\PortfoloAssetRecord;
use App\Helper\HelperClass;
use App\Helper\PortfolioHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\FinicialCalculator as Calculator;
use App\Helper\GapExchangeHelper;
use App\Helper\ArchiveAccount;
use App\Models\GapAssetType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $page_title = "Global Asset Portfolio Management";
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $portfolio = PortfolioAsset::where('user_id', $user->id)->where('isArchive', 0)->get();
        $existing_report = PortfolioHelper::activateBRAID($user, 'existing', $portfolio);
        $desired_report = PortfolioHelper::activateBRAID($user, 'desired', $portfolio);
        $roi_watch = PortfolioHelper::roiWatch($user, $portfolio);
        $global = PortfolioHelper::globalPortfolio($user);
        return view('user.portfolio.master', compact('page_title','roi_watch','existing_report','desired_report', 'currency', 'global'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function portfolioAssetType($type)
    {
        $user = auth()->user();
        $page_title = "Global Asset Portfolio Management";
        if(strtolower($type) == 'existing' || strtolower($type) == 'desired'){
            $currencies = HelperClass::popularCurrenciens();
            $gap_currencies = GapExchangeHelper::gapCurrencies($user);
            $business = GapAssetType::where('acqusition', 'business')->whereStatus(1)->get();
            $risk = GapAssetType::where('acqusition', 'risk')->whereStatus(1)->get();
            $appreciating = GapAssetType::where('acqusition', 'appreciating')->whereStatus(1)->get();
            $intellectual = GapAssetType::where('acqusition', 'intellectual')->whereStatus(1)->get();
            $depreciating = GapAssetType::where('acqusition', 'depreciating')->whereStatus(1)->get();

            return view('user.portfolio.asset_type', compact(
                            'page_title','type','currencies','gap_currencies',
                            'business', 'risk', 'appreciating', 'intellectual', 'depreciating'
                ));
        }else{
           return  redirect('404');
        }
    }

    public function investment(Request $request)
    {
        $user = auth()->user();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $archive =  $request->get('archive');

        $page_title = "Global Investment Summary";
        $goback = true;
        $currencies = HelperClass::popularCurrenciens();
        $backgrounds = PortfolioHelper::accountBackground();

        $business_details = PortfolioHelper::existingDetailChart($user, 'business');
        $risk_details = PortfolioHelper::existingDetailChart($user, 'risk');
        $appreciating_details = PortfolioHelper::existingDetailChart($user, 'appreciating');
        $intellectual_details = PortfolioHelper::existingDetailChart($user, 'intellectual');
        $depreciating_details = PortfolioHelper::existingDetailChart($user, 'depreciating');
        // info($appreciating_details);
        $portfolio = PortfolioAsset::where('user_id', $user->id)->where('isArchive', 0)->get();
        $existing_report = PortfolioHelper::activateBRAID($user, 'existing', $portfolio);
        $braid_table = PortfolioHelper::groupBraidPortfolio($user, $archive);
        $braid_details = compact('business_details', 'risk_details', 'appreciating_details', 'intellectual_details', 'depreciating_details');
        $investment_sum =  PortfolioHelper::investmentFunds($user)['investment'];

        return view('user.portfolio.investment_tab', compact('archive','page_title','goback',
                    'currency','backgrounds','existing_report','investment_sum',
                    'currencies','braid_table', 'braid_details' ));
    }

    public function braid(Request $request, $braid)
    {
        $user = auth()->user();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $archive =  $request->get('archive');
        if($archive){
            $page_title = "Archived $braid Asset";
        }else{
            $page_title = "$braid Asset Portfolio";
        }
        $goback = true;
        if(strtolower($braid) == 'business' || strtolower($braid) == 'risk' || strtolower($braid) == 'appreciating'
            || strtolower($braid) == 'intellectual' || strtolower($braid) == 'depreciating'){
            $currencies = HelperClass::popularCurrenciens();
            $existing = PortfolioHelper::groupPortfolio($user, $braid, $archive)["existing"];
            $desired = PortfolioHelper::groupPortfolio($user, $braid, $archive)["desired"];
            $existing_details = PortfolioHelper::existingDetailChart($user, $braid);
            $backgrounds = PortfolioHelper::accountBackground();

            return view('user.portfolio.braid', compact('archive','page_title','goback','currency','braid', 'backgrounds','currencies',
                                        'existing', 'desired','existing_details'));
        }else{
           return  redirect('404');
        }
    }


    public function braidInformation(Request $request, $braid, $id)
    {
        $user = auth()->user();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $asset  = PortfolioAsset::where('user_id', $user->id)->where('id',explode("_",$id)[0] )->first();
        $header =  $request->get('header');
        $access =  $request->get('access');
        $period =  $request->get('period');
        $account =  $request->get('account');
        $archive =  $request->get('archive');

        if($header){
            // Periodical Helper for updating records
            if($period) return PortfolioHelper::addNewRecordPeriod($user, $asset, $header, $access, $period);
            // Archive Portfolio
            if($account) return ArchiveAccount::portfolioArchiveAction($user, $header, $access, $account);
        }

        $goback = true;
        if($asset){
            $page_title = "$asset->name";
            $currencies = HelperClass::popularCurrenciens();
            $backgrounds = PortfolioHelper::accountBackground();
            $asset_types = GapAssetType::where('acqusition', $braid)->get();
            $asset_finicial = PortfoloAssetRecord::where('user_id', $user->id)->where('portfolio_asset_id', $asset->id)->orderBy('period', 'ASC')->get();
            $asset_finicial_detail = PortfolioHelper::assetFinancialDetail($user,$asset,$asset_finicial);

            return view('user.portfolio.braid_info', compact('page_title','goback','currency', 'braid',
                     'backgrounds','currencies','asset', 'archive',  'asset_finicial_detail', 'asset_types'));
        }else{
           return  redirect('404');
        }
    }

    public function braidFinancialInformation(Request $request,$braid, $id)
    {
        $user = auth()->user();
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[0];
        $asset  = PortfolioAsset::where('user_id', $user->id)->where('id',explode("_",$id)[0] )->first();
        $archive =  $request->get('archive');

        $goback = true;
        if($asset){
            $page_title = "$asset->name";
            $currencies = HelperClass::popularCurrenciens();
            $asset_finicial = PortfoloAssetRecord::where('user_id', $user->id)->where('portfolio_asset_id', $asset->id)->orderBy('period', 'ASC')->get();
            $asset_finicial_record = PortfolioHelper::assetFinancialChart($asset_finicial);

            $backgrounds = PortfolioHelper::accountBackground();

            return view('user.portfolio.braid_infochart', compact('page_title','goback','currency','braid', 'backgrounds','currencies','asset',
                'archive','asset_finicial', 'asset_finicial_record'));
        }else{
           return  redirect('404');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPortfolioAsset(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'currency' => 'required',
            'asset_name' => 'required|max:50',
            'description' => 'max:350',
            'asset_value' => 'required|numeric',
            'monthly_roi' => 'required|numeric',
            'projected_value' => 'required|numeric',
            'credit_value' => 'required|numeric',
            'portfolio_type' => 'required|integer',
            'ahbjjshbjsnmbnmsbxdnvsxbv' => 'required|in:existing,desired',
            'ajnsjxnjsnxbjnbajknsjnds' => 'required|in:business,risk,intellectual,depreciating,appreciating'
        ],[
            'ahbjjshbjsnmbnmsbxdnvsxbv.in' => 'Invalid Credensials',
            'ajnsjxnjsnxbjnbajknsjnds.in' => 'Invalid Credensials'
        ]);

        return  PortfolioHelper::addNewPortfolioAsset($user, $request);
    }

    // Update Asset Photo
    public function updateAssetPhoto(Request $request, $id)
    {
        $user = auth()->user();
        $asset  = PortfolioAsset::where('user_id', $user->id)->where('id',$id)->first();
        $this->validate($request, ['photo'=> 'required|mimes:jpeg,jpg,png,gif|max:2140']);

        if($request->hasFile(['photo'])){
            $ext = $request->file('photo')->extension();
            $filename = $user->id.'_'.sha1(time()). rand(100000, 999999) . '.'.$ext;
            $year = date('Y');
            $ref_path  = "public/portfolio/$year";
            $upload_path = $request->file('photo')->storeAs($ref_path, $filename);

            if($asset->photo){
                Storage::delete($asset->photo);
            }

            $asset->photo  = $upload_path;
            $asset->save();
            return redirect()->back()->with(['success'=> 'Asset Photo Updated']);
        }else{
            return redirect()->back()->with(['error'=> 'No Image Selected']);
        }
    }

    // Update Asset Details
    public function updateAssetDetails(Request $request, $id)
    {
        $user = auth()->user();

        $this->validate($request, [
            'asset_name' => 'required|string',
            'asset_value' => 'required|numeric',
            'income' => 'numeric',
            'portfolio_type' => 'required|integer',
            'automated_rate' => 'required'
        ]);

        // info($request->all());
        // $asset  = PortfolioAsset::where('user_id', $user->id)->where('id',$id)->firstOrFail();
        $asset  = PortfolioAsset::findOrFail($id);

        if($asset){
            if($request->hasFile(['asset_document'])) PortfolioHelper::uploadPortfolioDocument($user,$asset, $request);
            $asset->name = $request->asset_name;
            $asset->location = $request->location;
            $asset->description = $request->description;
            $asset->asset_value = $request->asset_value;
            $asset->monthly_roi = $request->income;
            $asset->automated = $request->automated_rate;
            $asset->portfolio_type_id = $request->portfolio_type;

            $asset->save();
            return redirect()->back()->with(['success'=> 'Asset Updated successfully']);
        }else{
            return redirect()->back()->with(['error'=> 'Asset not found']);
        }
    }

    public function updateAssetRecords(Request $request, $id)
    {
        $user = auth()->user();

        $this->validate($request, [
            'note' => 'max:256',
            'amount' => 'required|integer|min:0|max:10000000000',
            'revenue' => 'required|integer|min:0|max:10000000000',
            'management' => 'required|integer|min:0|max:10000000000',
            'maintenance' => 'required|integer|min:0|max:10000000000',
            'taxes' => 'required|integer|min:0|max:10000000000',
        ]);
        $period  = date('Y-m').'-01';
        // before:yesterday
        if($request->jaznjsxnjszbnjcknjkxnjkxncskniujkns){
            $period = $request->jaznjsxnjszbnjcknjkxnjkxncskniujkns.'-01';
            $this->validate($request,
                ['jaznjsxnjszbnjcknjkxnjkxncskniujkns' => 'date'],
                ['jaznjsxnjszbnjcknjkxnjkxncskniujkns.date' => 'Incorrect Period']
            );
        }
        if($period){
            if($period > date('Y-m-d')) return redirect()->back()->with(['error'=> 'Asset Update Records not found']);
        }
       $status = PortfolioHelper::updatePeriodRecord($user, $period, $id, $request);
       if($status){
            return redirect()->back()->with(['success'=> 'Asset Record Updated successfully']);
        }else{
            // info('Asset Record Error '.$status);
            return redirect()->back()->with(['error'=> 'Asset not found']);
        }
    }


    public function updateAssetNote(Request $request, $id)
    {
        $user = auth()->user();
        $this->validate($request, [
                'note' => 'required|min:10|max:256',
                'jaznjsxnjszbnjcknjkxnjkxncskniujkns' => 'date|before:today',
            ],
            [
                'jaznjsxnjszbnjcknjkxnjkxncskniujkns.date' => 'Incorrect Period',
                'jaznjsxnjszbnjcknjkxnjkxncskniujkns.before' => 'Incorrect Period'
            ]
        );
        $period = $request->jaznjsxnjszbnjcknjkxnjkxncskniujkns.'-01';
        if($period){
            // if($period > date('Y-m-d')) return redirect()->back()->with(['error'=> 'Asset Update Records not found']);
        }
        $status = PortfolioHelper::updateNoteRecord($user, $period, $id, $request);
        if($status){
            return redirect()->back()->with(['success'=> 'Asset Updated successfully']);
        }else{
            // info('Asset Record Error '.$status);
            return redirect()->back()->with(['error'=> 'Asset not found']);
        }
    }
}
