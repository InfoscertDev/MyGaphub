<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\GapExchangeHelper as Exchanger;
use App\Mail\GanpAssetInvestment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ReapAssetInterest;
use App\Mail\ReapInterestedArea;
use App\Models\ReapAssetInterest as ModelsReapAssetInterest;
use Illuminate\Support\Facades\Http;

class AcquisitionApi extends Controller
{
    // REAP
    private static $token = 'qswsdopspncagajkxnnznbxghsjksjujiubszajkbagznbzvszhjvxhvsvzghzgxgvxhgdjhvhchxbhxbxvvxvhhxvhvhhmdjxdbjxvhjhxdbvjxdxjbvlbjz';
    private static $reap_link =  'https://gappropertyhub.com/api';
    // GANP
    private static $ganp_token = 'xnbbnxbcbvjhnbkgvnmbbnfmohbvjcfgjmcbjmhnomcfjnomnpamqasxmbcvbvnfvbcfhfbvhjjjkfjknfvbiolckojinkjondodnglhdn';
    private static $ganp_link = 'http://www.gapassethub.com/api';

    public function favourite(Request $request)
    {
        $user =  $request->user();
        $page = $request->get('page', 1);
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
        $status = true;
        return response()->json(compact('status','assets','favourite_meta'));
    }

    public function favouriteGanp(Request $request)
    {
        $user =  $request->user();
        $page = $request->get('page', 1);
        $country = $request->get('country');

        $cultivations = [];
        $favourite_meta = [];
        $ganp_favourite = Exchanger::ganp_favourite($user);
        if(count($ganp_favourite)){
            $favourite_meta = Exchanger::paginate_favourite($ganp_favourite, $page);
            $data =  [ 'list' => $favourite_meta['favourite'], 'token' => $this::$ganp_token]  ;
            $status = Http::post($this::$ganp_link."/ganp/cultivations/list",$data) ;
            $ganp  = json_decode($status);
            info($ganp);

            if($ganp && $ganp->success){
                $cultivations = $ganp->cultivations;
                foreach($cultivations as $asset){
                    $asset->share = route('user.single_ganp', [$asset->id.'_'.explode(' ',$asset->name)[0]]);
                }
            }
        }
        $status = true;
        return response()->json(compact('status','country', 'cultivations','favourite_meta'));
    }

    public function favouriteAsset(Request $request, $asset)
    {
        $user =  $request->user();
        $type = $request->get('acquisition');
        $sign = $request->get('signature');

        if($type && $sign == 'ahgfhagbhgsbhgsbyuhjwgs65wytgv7wystdg6tygfvdtydgvgyhdnxngb'){
            // REAP
            if($type == 'retyanshamdhankdxmp_ashdhgagdhb'){
                Exchanger::addReapFavourite($user, $asset);
                return response()->json(['success' => 'Asset has been added to favourite']);
            }else if($type == 'retyanshamdaahgs_rmzojishjbdx'){
                Exchanger::removeReapFavourite($user, $asset);
                return response()->json(['success' => 'Asset has been removed from favourite']);
            }
            // GANP
            if($type == 'gaoajkjxjnjzsbdhankdxmp_ashdhshbsed'){
                Exchanger::addGanpFavourite($user, $asset);
                return response()->json(['success' => 'GANP has been added to favourite']);
            }else if($type == 'gaoajkjxjnjzsbdaahgs_rmzojickjnsjz'){
                Exchanger::removeGanpFavourite($user, $asset);
                return response()->json(['success' => 'GANP has been removed from favourite']);
            }
        }else{
            return response()->json(['error' => 'Bad Signature']);
        }
    }

    public function interestReapInvestment(Request $request, $sasset){
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'message' => 'required|min:10|max:512'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $request['user_id'] = $user->id;
        $request['name'] = $user->firstname . ' '.$user->surname;
        $request['email'] = $user->email;

        if($request->mobile){
            $validator = Validator::make($request->all(), [
                'mobile' => 'required|numeric'
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }

            $profile = $user->profile;
            $profile->phone = $request->mobile;
            $profile->save();

            $request['mobile'] = $request->mobile;
        }
        $request['mobile'] = $user->profile->phone;

        $feedback = ModelsReapAssetInterest::create($request->all());
        Mail::to('admin@mygaphub.com')->send(new ReapInterestedArea($user, $user->profile,$feedback));

        return response()->json([
            'status' => true,
            'message' => "Your Interest has been submitted"
        ]);
    }

    public function reserveReapInvestment(Request $request, $sasset){
        $user =  $request->user();
        $status = Http::get($this::$reap_link."/assets/$sasset?token=".$this::$token) ;
        $reap  = json_decode($status);
        if($reap){
            $asset  = $reap->asset;
            Mail::to('admin@mygaphub.com')->send(new ReapAssetInterest($user, $user->profile,$asset));
            return response()->json([
                'status' => true,
                'message' => "Your Interest has been submitted"
            ], 200);
        }else{
            $msg = "There is an error reserving this Asset";
            return response()->json([
                'status' => false,
                'message' => $msg
            ], 400);
        }
    }

    public function reserveGanpInvestment(Request $request, $sasset){

        $user =  $request->user();
        $validator = Validator::make($request->all(), [
            'units' => 'required|integer|min:1'
        ]);

        if($validator->fails()){
            return response()->json([
               'status' => false,
               'error' => $validator->errors()->toJson()
             ], 400);
        }

        $status = Http::get($this::$ganp_link."/ganp/asset/$sasset?token=".$this::$ganp_token) ;

        $plant  = json_decode($status);
        if($plant){
            $asset  = $plant->cultivation;
            Mail::to('admin@mygaphub.com')->send(new GanpAssetInvestment($user, $user->profile,$asset, $request->units));
            return response()->json([
                'status' => true,
                'message' => "Your Interest has been submitted"
            ], 200);
        }else{
            $msg = "There is an error reserving this Asset";
            return response()->json([
                'status' => false,
                'message' => $msg
            ], 400);
        }
    }
}
