<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Asset\AssetAction as Action;
use App\Helper\GapExchangeHelper as Exchanger;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\AcquisitionCms;
use App\Models\AcquisitionOpportunityCms;
use App\UserProfile as Profile;
use Illuminate\Support\Facades\Http;
use App\Helper\GaphubTracker;

class AcquisitionController extends Controller
{
    // REAP
    private static $token = 'qswsdopspncagajkxnnznbxghsjksjujiubszajkbagznbzvszhjvxhvsvzghzgxgvxhgdjhvhchxbhxbxvvxvhhxvhvhhmdjxdbjxvhjhxdbvjxdxjbvlbjz';
    private static $link = 'https://gappropertyhub.com/api';
    // GANP
    private static $ganp_token = 'xnbbnxbcbvjhnbkgvnmbbnfmohbvjcfgjmcbjmhnomcfjnomnpamqasxmbcvbvnfvbcfhfbvhjjjkfjknfvbiolckojinkjondodnglhdn';
    private static $ganp_link = 'https://gapassethub.com/public/api';
    /**
     * Display a listing of the resource./web/app/core_new/app/Http/Controllers/Web
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acquisition = AcquisitionCms::all();
        return view('user.acquisition.index', compact('acquisition'));
    }

    public function opportunity($asset)
    {
        $acquisition = AcquisitionOpportunityCms::all();
        $sasset = null ;$set = $asset;
        if(strtolower($asset) == 'business' || strtolower($asset) == 'risk' || strtolower($asset) == 'appreciating' ||
                 strtolower($asset) == 'intellectual' || strtolower($asset) == 'depreciating'){
            $isListAsset = true;
            return view('user.acquisition.oppportunity', compact('asset', 'sasset', 'set', 'acquisition'));
        }else{
            return  redirect('404');
        }
    }

    public function searchReap(Request $request,$asset)
    {
        $prop = $request->get('property');
        $sasset = $request->get('sasset');
        $page = $request->get('page');
        $set = $asset;$id = $asset;

        $keyword = str_replace(' ', '%20', $request->cr_keyword);
        $country = str_replace(' ', '%20', $request->ct_country);
        $city = str_replace(' ', '%20', $request->ct_city);
        $property = str_replace(' ', '%20', $request->ct_property);
        $price_from = str_replace(' ', '%20', $request->ct_price_from);
        $price_to = str_replace(' ', '%20', $request->ct_price_to);
        $sort = $request->ct_sort;
        try {
            if($keyword || $country || $city || $property || $price_from || $price_to){
                $reap_search = compact('keyword', 'country', 'city', 'property', 'price_from', 'price_to', 'sort');
                $status = Http::get($this::$link."/search?ct_keyword=$keyword&page=$page&ct_country=$country&ct_city=$city&ct_property=$property&ct_price_from=$price_from&ct_price_to=$price_to&token=".$this::$token);
                $reap  = json_decode($status);
                $total = $reap->total || 0;
                $assets = json_decode(json_encode($reap->result), false);
                $isAcquisiton = true;
                $isListAsset = true;

                return view('user.acquisition.opportunity.reap_gap_asset',
                                compact('set', 'isListAsset',  'isAcquisiton', 'total','sasset', 'sort','prop' , 'assets', 'reap_search'));
            }else{
                return redirect()->back()->with(['error' => 'One of the search criteria is required']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'One of the search criteria is required']);
        }
    }

    public function searchPaginaton(Request $request,$asset)
    {
        $prop = $request->get('property');
        $sasset = $request->get('sasset');
        $page = $request->get('page');
        $set = $asset;$id = $asset;

        $keyword = $request->get('keyword');
        $country = $request->get('country');
        $city = $request->get('city');
        $sort = $request->get('sort');
        $property = $request->get('property');
        $price_from = $request->get('pfrom');
        $price_to = $request->get('pto');
        try {
            if($keyword || $country || $city || $property || $price_from || $price_to || $sort){
                $reap_search = compact('keyword', 'country', 'city', 'property', 'price_from', 'price_to', 'sort');
                $status = Http::get($this::$link."/search?ct_keyword=$keyword&page=$page&ct_country=$country&ct_city=$city&ct_property=$property&ct_price_from=$price_from&ct_sort=$sort&ct_price_to=$price_to&token=".$this::$token) ;
                $reap  = json_decode($status);
                $total = $reap->total || 0;
                $assets = json_decode(json_encode($reap->result), false);
                $isAcquisiton = true;
                return view('user.acquisition.opportunity.reap_gap_asset',
                                    compact('set', 'isAcquisiton', 'total','sasset', 'sort','prop' , 'assets', 'reap_search'));
            }else{
                return redirect()->back()->with(['error' => 'One of the search criteria is required']);
            }
            // echo($this::$link."/search?ct_keyword=$keyword&ct_country=$country&ct_city=$city&ct_property=$property&ct_price_from=$price_from&ct_price_to=$price_to&token=".$this::$token);
        } catch (\Throwable $th) {
            return  redirect('404')->with(['error' => 'Server Down. Check back later']);
        }
    }

    public function favouriteAsset(Request $request,$asset){
        $user = auth()->user();
        $type = $request->get('kajhhsvbncbx');
        $sign = $request->get('sign');

        if($type && $sign == 'sjh78wuhdf625765272nudihncuhjbcuhscb'){
            if($type == 'retyanshamdhankdxmp_ashdhgagdhb'){
                Exchanger::addReapFavourite($user, $asset);
                return redirect()->back()->with(['success' => 'Asset has been added to favourite']);
            }else if($type == 'retyanshamdaahgs_rmzojishjbdx'){
                Exchanger::removeReapFavourite($user, $asset);
                return redirect()->back()->with(['success' => 'Asset has been removed from favourite']);
            }
            if($type == 'gaoajkjxjnjzsbdhankdxmp_ashdhshbsed'){
                Exchanger::addGanpFavourite($user, $asset);
                return redirect()->back()->with(['success' => 'GANP has been added to favourite']);
            }else if($type == 'gaoajkjxjnjzsbdaahgs_rmzojickjnsjz'){
                Exchanger::removeGanpFavourite($user, $asset);
                return redirect()->back()->with(['success' => 'GANP has been removed from favourite']);
            }
        }else{
            return redirect()->back();
        }
    }

    public function reapOpportunity(Request $request,$asset) {
        $user = auth()->user();
        $prop = $request->get('property');
        $sort = $request->get('sort');
        $page = $request->get('page');
        $sasset = $request->get('sasset');
        $set = $asset; $id = $asset;

        try {
            if($prop || $sort){
                // Track Property Listing
                if($prop && $user){
                    $tracker = new GaphubTracker($user);
                    $tracker->reapPropertyTracker($prop);
                }

                $status = Http::get($this::$link."/search?ct_property_type=$prop&ct_sort=$sort&page=$page&token=".$this::$token) ;
                $reap  = json_decode($status);
                $total = $reap->total;

                $assets = json_decode(json_encode($reap->result), false);
                if(!$sort) $sort = 1;
                $isAcquisiton = true;
                return view('user.acquisition.opportunity.reap_gap_asset',
                                    compact('set',  'isAcquisiton',  'total', 'sasset', 'sort','prop' , 'assets'));
            }else{
                // Listing page
                if(strtolower($asset) == 'business' || strtolower($asset) == 'risk' || strtolower($asset) == 'appreciating' ||
                         strtolower($asset) == 'intellectual' || strtolower($asset) == 'depreciating'){
                    $isListAsset = true;

                    return view('user.acquisition.opportunity.reap_asset', compact('isListAsset','sasset', 'asset', 'set'));
                }else{
                    return   redirect('404');
                }
            }
        } catch (\Throwable $th) {
            return  redirect('404')->with(['error' => 'Server Down. Check back later']);
        }

    }

    public function ganpOpportunity(Request $request,$asset)
    {
        $country = $request->get('country');
        $sasset = $request->get('sasset');
        $sort = $request->get('sort');
        $page = $request->get('page');
        $set = $asset;

        try {
            if($country){
                // info($this::$ganp_link."/ganp/assets/$country?token=".$this::$ganp_token);
                $status = Http::get($this::$ganp_link."/ganp/assets/$country?page=$page&token=".$this::$ganp_token) ;
                $plant  = json_decode($status);
                $cultivations = $plant->cultivations;// info($cultivations); // info([$cultivations->data]);
                $gcountry = $plant->country;
                $isGanp = true;
                return view('user.acquisition.opportunity.ganp_country', compact('set','asset', 'country', 'cultivations', 'gcountry', 'isGanp', 'sort', 'page'));
            }else{
                if(strtolower($asset) == 'business' || strtolower($asset) == 'risk' || strtolower($asset) == 'appreciating' ||
                            strtolower($asset) == 'intellectual' || strtolower($asset) == 'depreciating'){

                    $status = Http::get($this::$ganp_link."/ganp/countries?token=".$this::$ganp_token) ;
                    $ganp  = json_decode($status);
                    $countries = $ganp->countries;
                    $country = 0;
                    return view('user.acquisition.opportunity.ganp_assets', compact('asset', 'countries', 'country', 'sort', 'page'));
                }else{
                    return  redirect('404');
                }
            }
        } catch (\Throwable $th) {
            return  redirect('404')->with(['error' => 'Server Down. Check back later']);
        }
    }

    public function ganpCultivation(Request $request, $ganp_asset)
    {
        $user = auth()->user();
        $prop = $request->get('property');
        $sort = $request->get('sort');
        $page = $request->get('page');
        $tresh = $request->get('tresh');
        $sasset = $request->get('sasset');
        // return $country.$ganp;
        // $stat = Http::get($this::$ganp_link."/ganp/countries?token=".$this::$ganp_token) ;
        // $ganps  = json_decode($stat);
        // $countries = $ganps->countries;
        $countries = null;
        $is_favourite = null;
        $status = Http::get($this::$ganp_link."/ganp/asset/$ganp_asset?token=".$this::$ganp_token) ;
        $plant  = json_decode($status);
        $plant = $plant->cultivation;
        $plant->share = route('user.single_ganp', [$plant->id.'_'.explode(' ',$plant->name)[0]]);
        $isSingleGanp = true;
        $page_title =  $plant->name;
        if($user){
            $ganp_favourite = Exchanger::ganp_favourite($user);
            $is_favourite = in_array($plant->id, (array)$ganp_favourite);
        }
        return view('user.acquisition.opportunity.ganp_cultivate', compact('sasset','countries', 'plant',  'page_title', 'is_favourite','isSingleGanp'));

        // if($ganp || $tresh){
        //     $status = Http::get($this::$ganp_link."/ganp/asset/$ganp?token=".$this::$ganp_token) ;
        //     $plant  = json_decode($status);
        //     $gcountry = $plant->country;
        //     $isSingleGanp = true;
        //     $page_title =  $plant->name;
        //     if($user){
        //         $ganp_favourite = Exchanger::ganp_favourite($user);
        //         $is_favourite = in_array($plant->id, (array)$ganp_favourite);
        //     }
        //     return view('user.acquisition.opportunity.ganp_cultivate', compact('asset', 'sasset','countries', 'plant', 'gcountry', 'page_title', 'is_favourite','isSingleGanp'));

        // }else{
        //     $status = Http::get($this::$ganp_link."/ganp/assets/$country?&sort=$sort&page=$page&token=".$this::$ganp_token) ;
        //     $plant  = json_decode($status);
        //     $cultivations = json_decode(json_encode($plant->cultivations), true);
        //     $gcountry = $plant->country;
        //     if(!$sort) $sort = 1;
        //     $isGanp = true;
        //     return view('user.acquisition.opportunity.ganp_country', compact('asset', 'countries', 'country', 'cultivations', 'gcountry', 'isGanp','sort'));
        //     // $cultivations = json_decode($plant->cultivations, true);
        //     // var_dump($cultivations['data'][0]['id']) ;
        // }

    }

    public function searchGANP(Request $request,$asset)
    {
        $prop = $request->get('property');
        $sasset = $request->get('sasset');
        $set = $asset;$id = $asset;
        $country = 0;
        // $this->validate($request, [
        //     'cr_keyword' => 'required|min:3'
        // ]);
        $stat = Http::get($this::$ganp_link."/ganp/countries?token=".$this::$ganp_token) ;
        $ganp  = json_decode($stat);
        $countries = $ganp->countries;
        $sort = $request->ct_sort;

        $keyword = str_replace(' ', '%20', $request->cr_keyword);
        $roi_from = str_replace(' ', '%20',$request->gt_roi_from);
        $roi_to = str_replace(' ', '%20',$request->gt_roi_to);
        $country = str_replace(' ', '%20',$request->gt_country);
        $status = Http::get($this::$ganp_link."/search/ganp?query=$keyword&roi_from=$roi_from&roi_to=$roi_to&sort=$sort&country=$country&token=".$this::$ganp_token) ;
        $plant  = json_decode($status);
        $g_keyword = $keyword; $g_country = $country;
        $ganp_search = compact('g_keyword', 'g_country', 'roi_from', 'roi_to');
        // echo $this::$ganp_link."/search/ganp?query=$keyword&roi_from=$roi_from&roi_to=$roi_to&country=$country&token=".$this::$ganp_token;
        // var_dump($plant); return;
        $cultivations = json_decode(json_encode($plant->cultivations), true);
        $gcountry = $plant->country; $sort = 1;
        $isGanp = true;
        return view('user.acquisition.opportunity.ganp_country', compact('isGanp','asset', 'countries', 'country', 'cultivations', 'gcountry', 'ganp_search', 'sort'));
    }

    public function searchGanpPaginaton(Request $request, $asset)
    {
        $prop = $request->get('property');
        $sasset = $request->get('sasset');
        $page = $request->get('page');
        $set = $asset;$id = $asset;

        $keyword = $request->get('keyword');
        $country = $request->get('country');
        $sort = $request->get('sort');
        $roi_from = $request->get('rfrom');
        $roi_to = $request->get('rto');

        if($keyword || $country || $roi_from || $roi_to || $sort){
            $status = Http::get($this::$ganp_link."/search/ganp?query=$keyword&roi_from=$roi_from&roi_to=$roi_to&sort=$sort&country=$country&token=".$this::$ganp_token) ;
            $plant  = json_decode($status);
            $cultivations = json_decode(json_encode($plant->cultivations), true);
            $gcountry = $plant->country;
            // var_dump($this::$ganp_link."/search/ganp?query=$keyword&roi_from=$roi_from&roi_to=$roi_to&sort=$sort&country=$country&token=".$this::$ganp_token); return;
            $g_keyword = $keyword; $g_country = $country;
            $ganp_search = compact('g_keyword', 'g_country', 'roi_from', 'roi_to');
            // $gcountry = ["name"=>"","image"=>""]; $sort = 1;
            $isGanp = true;
            return view('user.acquisition.opportunity.ganp_country', compact('isGanp','asset', 'country', 'cultivations', 'gcountry', 'ganp_search', 'sort'));
        }else{
            return redirect()->back()->with(['error' => 'One of the search criteria is required']);
        }
        // echo($this::$link."/search?ct_keyword=$keyword&ct_country=$country&ct_city=$city&ct_property=$property&ct_price_from=$price_from&ct_price_to=$price_to&token=".$this::$token);
    }

    public function action()
    {
        $user =  auth()->user();
        $profile = Profile::find($user->profile_id);
        $lim = 3;
        $business = Action::where('user_id', $user->id)->where('action', 'business')->latest()->paginate($lim);
        $risk = Action::where('user_id', $user->id)->where('action', 'risk')->latest()->paginate($lim);
        $intellectual = Action::where('user_id', $user->id)->where('action', 'intellectual')->latest()->paginate($lim);
        $appreciating = Action::where('user_id', $user->id)->where('action', 'appreciating')->latest()->paginate($lim);
        $depreciating = Action::where('user_id', $user->id)->where('action', 'depreciating')->latest()->paginate($lim);

        $todaynote = $this::todaynote();

        return view('user.actionplan.index', compact('profile','business', 'risk','intellectual',
            'appreciating', 'depreciating', 'todaynote') );
    }

    public static function todaynote(){
        $today = date('Y-m-d');
        $user =  auth()->user();
        $business = Action::where('user_id', $user->id)->where('date', $today)->where('action', 'business')->first();
        $risk = Action::where('user_id', $user->id)->where('date', $today)->where('action', 'risk')->first();
        $intellectual = Action::where('user_id', $user->id)->where('date', $today)->where('action', 'intellectual')->first();
        $appreciating = Action::where('user_id', $user->id)->where('date', $today)->where('action', 'appreciating')->first();
        $depreciating = Action::where('user_id', $user->id)->where('date', $today)->where('action', 'depreciating')->first();

        return compact('business', 'risk', 'intellectual', 'appreciating', 'depreciating');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user =  auth()->user();
        $this->validate($request, [
            'action' => 'required', 'note' => 'required|min:10'
        ]);
        $today = date('Y-m-d');

        if($request->action == "vafgskgkzhskdfgzkgzkfgx"){
            $bus_asset = Action::where('user_id', $user->id)->where('action', 'business')
                        ->where('date', $today)->first();
            if($bus_asset){
                $business = $bus_asset;
            }else{
                $business = new Action();
                $business->action = 'business';
                $business->user_id = $user->id;
                $business->date = $today;
            }
            $business->note = $request->note;
            $business->save();
            return redirect()->back();
        }

        if($request->action == "apwgdhsvjxgsdgkgdxbgdcg"){
            $asset = Action::where('user_id', $user->id)->where('action', 'risk')
                        ->where('date', $today)->first();
            if($asset){
                $risk = $asset;
            }else{
                $risk = new Action();
                $risk->action = 'risk';
                $risk->user_id = $user->id;
                $risk->date = $today;
            }
            $risk->note = $request->note;
            $risk->save();
            return redirect()->back();
        }

        if($request->action == "ingtfsjvfejafdkshcvsxgcfsd"){
            $asset = Action::where('user_id', $user->id)->where('action', 'appreciating')
                        ->where('date', $today)->first();
            if($asset){
                $appreciating = $asset;
            }else{
                $appreciating = new Action();
                $appreciating->action = 'appreciating';
                $appreciating->user_id = $user->id;
                $appreciating->date = $today;
            }
            $appreciating->note = $request->note;
            $appreciating->save();
            return redirect()->back();
        }

        if($request->action == "dehnspeabwrtindgozid"){
            $asset = Action::where('user_id', $user->id)->where('action', 'intellectual')
                        ->where('date', $today)->first();
            if($asset){
                $intellectual = $asset;
            }else{
                $intellectual = new Action();
                $intellectual->action = 'intellectual';
                $intellectual->user_id = $user->id;
                $intellectual->date = $today;
            }
            $intellectual->note = $request->note;
            $intellectual->save();
            return redirect()->back();
        }

        if($request->action == "asfshjsgvnbxsgbbsnndepljn"){
            $asset = Action::where('user_id', $user->id)->where('action', 'depreciating')
                        ->where('date', $today)->first();
            if($asset){
                $depreciating = $asset;
            }else{
                $depreciating = new Action();
                $depreciating->action = 'depreciating';
                $depreciating->user_id = $user->id;
                $depreciating->date = $today;
            }
            $depreciating->note = $request->note;
            $depreciating->save();
            return redirect()->back();
        }
        return redirect()->back();
    }

}



// @php
// $href =  route('user.ganp-search',[$asset, 'keyword' => ($ganp_search->g_keyword)? $ganp_search->g_keyword : '', 'country' => ($country)? $country : 0, 'pagers' => 0 ]) ;
// @endphp
// <script>
// var href =  "{{ print($href) }}"
// </script>
