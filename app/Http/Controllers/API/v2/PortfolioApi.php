<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\PortfolioHelper;
use Illuminate\Support\Facades\Validator;
use App\Asset\PortfolioAsset as Portfolio;
use App\Asset\PortfolioAsset;
use App\Asset\PortfoloAssetRecord;
use App\Helper\ArchiveAccount;
use App\Models\AcquisitionCms;
use App\Models\AcquisitionOpportunityCms;
use App\Models\GapAssetType;
use Illuminate\Support\Facades\Storage;

class PortfolioApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $portfolio = PortfolioAsset::where('user_id', $user->id)->where('isArchive', 0)->get();

        $global = PortfolioHelper::globalPortfolio($user);
        $existing_report = PortfolioHelper::activateBRAID($user, 'existing', $portfolio);
        $desired_report = PortfolioHelper::activateBRAID($user, 'desired', $portfolio);
        $roi_watch = PortfolioHelper::roiWatch($user, $portfolio);
        $portfolio_asset =  PortfolioAsset::where('user_id', $user->id)->where('income_id', 0)
                                    ->where('isArchive', 0)->where('asset_category', 'existing')->get();

        return response()->json(compact('roi_watch','existing_report','desired_report','global','portfolio_asset'));
    }


    public function information(Request $request)
    {
        $user = $request->user();

        $acquisition = AcquisitionCms::all();
        $opportunies = AcquisitionOpportunityCms::all();
        $business = GapAssetType::where('acqusition', 'business')->whereStatus(1)->get();
        $risk = GapAssetType::where('acqusition', 'risk')->whereStatus(1)->get();
        $appreciating = GapAssetType::where('acqusition', 'appreciating')->whereStatus(1)->get();
        $intellectual = GapAssetType::where('acqusition', 'intellectual')->whereStatus(1)->get();
        $depreciating = GapAssetType::where('acqusition', 'depreciating')->whereStatus(1)->get();
        $asset_types = compact('business', 'risk', 'appreciating', 'intellectual', 'depreciating');
        return response()->json(compact('acquisition', 'opportunies', 'asset_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'currency' => 'required',
            'asset_name' => 'required|max:50',
            'description' => 'required|max:350',
            'asset_value' => 'required|numeric',
            'monthly_roi' => 'required|numeric',
            'credit_value' => 'required|numeric',
            'projected_value' => 'required|numeric',
            'portfolio_type' => 'required|numeric',
            'asset_category' => 'required|in:existing,desired',
            'asset_class' => 'required|in:business,risk,intellectual,depreciating,appreciating'
        ],[
            'asset_category.in' => 'Invalid Credensials',
            'asset_class.in' => 'Invalid Credensials'
        ]);


        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        return  PortfolioHelper::addNewPortfolioAsset($user, $request);
    }

    public function investment(Request $request)
    {
        $user = $request->user();

        $archive =  $request->get('archive');

        $business_details = PortfolioHelper::existingDetailChart($user, 'business');
        $risk_details = PortfolioHelper::existingDetailChart($user, 'risk');
        $appreciating_details = PortfolioHelper::existingDetailChart($user, 'appreciating');
        $intellectual_details = PortfolioHelper::existingDetailChart($user, 'intellectual');
        $depreciating_details = PortfolioHelper::existingDetailChart($user, 'depreciating');

        $braid_table = PortfolioHelper::groupBraidPortfolio($user, $archive);
        $braid_details = compact('business_details', 'risk_details',  'appreciating_details','intellectual_details', 'depreciating_details');
        $investment_sum =  PortfolioHelper::investmentFunds($user)['investment'];

        return response()->json(compact('archive','braid_table', 'braid_details', 'investment_sum'));

    }


    public function braid(Request $request,$braid)
    {
        $user = $request->user();
        $archive =  $request->get('archive');

        if(strtolower($braid) == 'business' || strtolower($braid) == 'risk' || strtolower($braid) == 'appreciating'
            || strtolower($braid) == 'intellectual' || strtolower($braid) == 'depreciating'){
            $existing = PortfolioHelper::groupPortfolio($user, $braid, $archive)["existing"];
            $desired = PortfolioHelper::groupPortfolio($user, $braid, $archive)["desired"];
            $existing_details = PortfolioHelper::existingDetailChart($user, $braid);
           return  response()->json(compact('existing',  'archive','desired','existing_details'));
        }else{
           return  response()->json(['status'=> false, 'message' => 'Asset Type Not found']);
        }
    }

    public function braidInformation(Request $request, $braid, $id)
    {
        $user = $request->user();

        $asset  = Portfolio::where('user_id', $user->id)->where('id',$id)->first();
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
        if($asset){
            $status = true;
            $asset_finicial = PortfoloAssetRecord::where('user_id', $user->id)
                        ->where('portfolio_asset_id', $asset->id)
                        ->orderBy('period', 'ASC')->get();
            $asset_finicial_record = PortfolioHelper::assetFinancialChart($asset_finicial);
            $asset_finicial_detail = PortfolioHelper::assetFinancialDetail($user, $asset,$asset_finicial);
           return  response()->json(compact('status','asset', 'archive','asset_finicial','asset_finicial_detail','asset_finicial_record'));
        }else{
           return  response()->json(['status'=> false, 'message' => 'Asset Type Not found']);
        }
    }


    // Update Asset Photo
    public function updateAssetPhoto(Request $request, $id)
    {
        $user = $request->user();
        $asset  = Portfolio::where('user_id', $user->id)->where('id',$id)->first();
        $validator = Validator::make($request->all(), ['photo'=> 'required|mimes:jpeg,jpg,png,gif|max:2140']);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        if($request->hasFile(['photo'])){
            $ext = $request->file('photo')->extension();
            $filename = $user->id.'_'.sha1(time()). rand(100000, 999999) . '.'.$ext;
            $year = date('Y');
            $ref_path  = "public/$year/portfolio";
            $upload_path = $request->file('photo')->storeAs($ref_path, $filename);

            if(isset($asset->photo)){
                Storage::delete($asset->photo);
            }
            $asset->photo  = $upload_path;
            $asset->save();
            return  response()->json(compact('asset'));
        }else{
           return  response()->json(['status'=> false, 'message' => 'NO File Upload']);
        }
    }

    // Update Asset Details
    public function updateAssetDetails(Request $request, $id)
    {
        $user = $request->user();
        $asset  = Portfolio::where('user_id', $user->id)->where('id',$id)->first();
        $validator = Validator::make($request->all(), [
            'asset_name' => 'required|string',
            'asset_value' => 'required|numeric',
            'income' => 'numeric',
            'portfolio_type' => 'required|numeric',
            'automated_rate' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        if($asset){
            $asset->name = $request->asset_name;
            $asset->location = $request->location;
            $asset->description = $request->description;
            $asset->asset_value = $request->asset_value;
            $asset->monthly_roi = $request->income;
            $asset->portfolio_type_id = $request->portfolio_type;
            if($request->hasFile(['asset_document'])){
                PortfolioHelper::uploadPortfolioDocument($user,$asset, $request);
            }
            $asset->save();
            return  response()->json(compact('asset'));
        }else{
            return  response()->json(['status'=> false, 'message' => 'Asset Not found']);
        }
    }

    public function updateAssetRecords(Request $request, $id)
    {
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0|max:10000000000',
            'revenue' => 'required|numeric|min:0|max:10000000000',
            'management' => 'required|numeric|min:0|max:10000000000',
            'maintenance' => 'required|numeric|min:0|max:10000000000',
            'taxes' => 'required|numeric|min:0|max:10000000000',
        ]);
        $period  = date('Y-m').'-01';
        if($request->period){
            $request->period = $request->period.'-01';
            $period = $request->period;
            $validator = Validator::make($request->all(), ['period' => 'date|before:today'], ['period.date' => 'Incorrect Period'] );
        }

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $status = PortfolioHelper::updatePeriodRecord($user, $period, $id, $request);
        if($status){
            $message = 'Asset Updated successfully';
            return  response()->json(compact('status', 'message'));
        }else{
            return  response()->json(['status'=> false, 'message' => 'Asset Not found']);
        }
    }

    public function updateAssetNote(Request $request, $id){
        $user = $request->user();
        $validator = Validator::make($request->all(), [
            'note' => 'required|min:10|max:256',
            'period' => 'required'
        ]);

        if($request->period){
            $request->period = $request->period.'-01';
            $period = $request->period;
            $validator = Validator::make($request->all(), ['period' => 'date|before:today'], ['period.date' => 'Incorrect Period'] );
        }

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $status = PortfolioHelper::updateNoteRecord($user, $period, $id, $request);
        if($status){
            $message = 'Asset Updated successfully';
            return  response()->json(compact('status', 'message')); ;
        }else{
            return  response()->json(['status'=> false, 'message' => 'Asset Not found']);
        }
    }
}
