<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Helper\GapExchangeHelper as Exchanger;
use App\Helper\ListedInfo;
use App\Http\Controllers\Controller;
use App\Mail\GanpAssetInvestment;
use App\Mail\ReapAssetInterest;
use App\Mail\ReapInterestedArea;
use App\Mail\VerifyEmailReminder;
use App\Models\ReapAssetInterest as ModelsReapAssetInterest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use stdClass;

class ListedAcquisitionController extends Controller
{
    // REAP
    private static $token = 'qswsdopspncagajkxnnznbxghsjksjujiubszajkbagznbzvszhjvxhvsvzghzgxgvxhgdjhvhchxbhxbxvvxvhhxvhvhhmdjxdbjxvhjhxdbvjxdxjbvlbjz';
    private static $reap_link = 'https://gappropertyhub.com/api';
    // GANP
    private static $ganp_token = 'xnbbnxbcbvjhnbkgvnmbbnfmohbvjcfgjmcbjmhnomcfjnomnpamqasxmbcvbvnfvbcfhfbvhjjjkfjknfvbiolckojinkjondodnglhdn';
    private static $ganp_link = 'https://gapassethub.com/public/api';

    public function featuredReap(Request $request){
        $user = auth()->user();
        $sort = $request->get('sort');
        $page = $request->get('page');
        $prop = $request->get('property');
        $sasset = $request->get('sasset');
        $set = 0;

        $reap_favourite = Exchanger::reap_favourite($user);
        $status = Http::get($this::$reap_link."/index?ct_sort=$sort&page=$page&token=".$this::$token) ;
        $reap  = json_decode($status);
        $featured = $reap->features;

        $data = [];
        foreach ($featured as $feature) {
            foreach($feature->feature_type as $asset) array_push($data,$asset);
        }
        $total = count($data);
        $assets = new stdClass();
        $assets->data = $data;
        // var_dump($total);
        if(!$sort) $sort = 1;
        $isAcquisiton = true;
        return view('user.acquisition.opportunity.reap_gap_asset',
                                compact('isAcquisiton',  'total', 'sort', 'prop' ,'sasset' ,
                                     'set','assets'));
    }

    public function singleReap($sasset){
        $user = auth()->user();

        if(str_contains($sasset,'_')){
            $id = explode('_',$sasset)[0];
        }else{
            $id = $sasset;
        }
        try {
            $status = Http::get($this::$reap_link."/assets/$sasset?token=".$this::$token) ;
            $reap  = json_decode($status);
            if($reap){
                $is_favourite = null;
                if($user){
                    $reap_favourite = Exchanger::reap_favourite($user);
                    $is_favourite = in_array($sasset, (array)$reap_favourite);
                }
                $asset  = $reap->asset;
                $asset->share = route('user.single_reap', [$asset->id.'_'.explode(' ',$asset->name)[0]]);
                $specials  = $reap->specials;
                $features1  = $reap->features1;
                $features2  = $reap->features2;
                $images  = $reap->images;
                $related = array_slice( $reap->related, 0, 4);
                $promotion = json_decode(json_encode($reap->promotion), false); ;
                $promotion = array_slice( $reap->promotion, 0, 2);
                $isSingleReap = true;
                $page_title = $asset->name;
                $country = 0;
                // info([$asset->share]);

                return view('user.acquisition.opportunity.gap_single_asset', compact( 'sasset' ,'asset', 'id','is_favourite','page_title' ,
                      'country','isSingleReap',  'specials', 'features1', 'features2', 'images', 'related', 'promotion'));
            }else{
                return  redirect('404');
            }
        } catch (\Throwable $th) {
            return  redirect('404')->with(['error' => 'Server Down. Check back later']);
        }

    }

    public function createAlert(Request $request){
        $user = auth()->user();
        $header = $request->get('header');
        $access = $request->get('access');
        $acquisition = $request->get('acquisition');

        if($acquisition == 'reap'){
            $alert = $request->get('alert');
            if($header == "cakjsnodidjnjksnjbnxdjdbndjcbdbncfjn" && $access == "soilkamziajmiojamsioajsmisnmisjoisjxoiasjiasojksijdksnjswidjsdijkns"){
                $alert_detail = ListedInfo::addToReapAlert($user, $alert);
                return response()->json(['status' => true, 'date' => $alert_detail ,'message' => 'Listing Saved succefully']);
            }else{
                return response()->json(['status' => false, 'message' => 'Acquisition not available']);
            }
        }else{
            return response()->json(['status' => false, 'message' => 'Acquisition not available']);
        }
    }

    public function intrestReapInvestment(Request $request, $sasset){
        $user = auth()->user();
        if($user){
            $this->validate($request, [
                'subject' => 'required',
                'message' => 'required|min:10|max:512'
            ]);
            $request['user_id'] = $user->id;
            $request['name'] = $user->firstname . ' '.$user->surname;
            $request['email'] = $user->email;
            if($request->mobile){
                $this->validate($request, [
                    'mobile' => 'required|numeric',
                ]);
                $profile = $user->profile;
                $profile->phone = $request->mobile;
                $profile->save();
                $request['mobile'] = $request->mobile;
            }
            $request['mobile'] = $user->profile->phone;
        }else{
             $this->validate($request, [
                'name' => 'required|between:3,25',
                'email' => 'required|email',
                'mobile' => 'required|numeric',
                'subject' => 'required',
                'message' => 'required|min:10|max:512',
            ]);
        }
        $feedback = ModelsReapAssetInterest::create($request->all());
        Mail::to('admin@mygaphub.com')->send(new ReapInterestedArea($user, $user->profile,$feedback));
        $msg = "Your Interest has been submitted";
        return redirect('/acquisition/asset/appreciating')->with('success', $msg);
    }

    public function reserveReapInvestment(Request $request, $sasset){
        $user = auth()->user();
        $status = Http::get($this::$reap_link."/assets/$sasset?token=".$this::$token) ;
        $reap  = json_decode($status);
        if($reap){
            $asset  = $reap->asset;
            Mail::to('admin@mygaphub.com')->send(new ReapAssetInterest($user,  $user->profile, $asset));
            $msg = "Your Interest has been submitted";
            return redirect('/acquisition/asset/appreciating')->with('success', $msg);
        }else{
            $msg = "There is an error reserving this Asset";
            return redirect('/acquisition/asset/appreciating')->with('error', $msg);
        }
    }

    public function favourite(Request $request){
        $user = auth()->user();
        $page = $request->get('page', 1);
        $sort = $request->get('sort');
        $prop = $request->get('property');
        $sasset = $request->get('sasset');
        $set = 0;
        $assets = [];
        $favourite_meta = [];
        $reap_favourite = Exchanger::reap_favourite($user);
        if(count($reap_favourite)){
            $favourite_meta = Exchanger::paginate_favourite($reap_favourite, $page);
            $data =  [ 'list' => $favourite_meta['favourite'], 'token' => $this::$token]  ;

            $status = Http::post($this::$reap_link."/assets/list",$data) ;
            $reap  = json_decode($status);
            if($reap->success){
                $assets = $reap->assets;
                foreach($assets as $asset){
                    $asset->share = route('user.single_reap', [$asset->id.'_'.explode(' ',$asset->name)[0]]);
                }
            }
        }

        return view('user.acquisition.favourite.reap_assets', compact( 'assets','favourite_meta'));
    }

    public function favouriteGanp(Request $request){
        $user = auth()->user();
        $page = $request->get('page', 1);
        $country = $request->get('country');

        $cultivations = [];
        $favourite_meta = [];
        $ganp_favourite = Exchanger::ganp_favourite($user);
        if(count($ganp_favourite)){
            $favourite_meta = Exchanger::paginate_favourite($ganp_favourite, $page);
            $data =  [ 'list' => $favourite_meta['favourite'], 'token' => $this::$ganp_token];
            $status = Http::post($this::$ganp_link."/ganp/cultivations/list",$data) ;
            $ganp  = json_decode($status);
            // info([$this::$ganp_link."/ganp/cultivations/list",$data]);
            if($ganp && $ganp->success){
                $cultivations = $ganp->cultivations;
                foreach($cultivations as $asset){
                    $asset->share = route('user.single_ganp', [$asset->id.'_'.explode(' ',$asset->name)[0]]);
                }
            }
        }

        return view('user.acquisition.favourite.ganp_assets', compact( 'country', 'cultivations', 'favourite_meta'));
    }

    public function reserveGanpInvestment(Request $request, $sasset){
        $user = auth()->user();
        $status = Http::get($this::$ganp_link."/ganp/asset/$sasset?token=".$this::$ganp_token) ;
        $plant  = json_decode($status);
        if($plant){
            $asset = $plant->cultivation;
            Mail::to('admin@mygaphub.com')->send(new GanpAssetInvestment($user,  $user->profile, $asset, $request->units));
            $msg = "Your Interest has been submitted";
            return response()->json([
                'success' => true,
                'message' => $msg
            ]);
        }else{
            $msg = "There is an error reserving this Asset";
            return response()->json([
                'success' => false,
                'message' => $msg
            ]);
        }
    }
}
