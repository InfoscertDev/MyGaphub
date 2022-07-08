<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Asset\AssetAction as Action;
use Illuminate\Support\Facades\Validator; 


class AssetActionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function action(Request $request)
    {
        $lim = 3;
        $user =  $request->user();
        $business = Action::where('user_id', $user->id)->where('action', 'business')->latest()->get();
        $risk = Action::where('user_id', $user->id)->where('action', 'risk')->latest()->get();
        $intellectual = Action::where('user_id', $user->id)->where('action', 'intellectual')->latest()->get();
        $appreciating = Action::where('user_id', $user->id)->where('action', 'appreciating')->latest()->get();
        $depreciating = Action::where('user_id', $user->id)->where('action', 'depreciating')->latest()->get();

        $data =  compact('business', 'risk','intellectual', 'appreciating', 'depreciating');

        return response()->json($data);
    } 

    public function today(Request $request)
    {
        $user =  $request->user();
        $today = date('Y-m-d'); 
        $business = Action::where('user_id', $user->id)->where('date', $today)->where('action', 'business')->first();
        $risk = Action::where('user_id', $user->id)->where('date', $today)->where('action', 'risk')->first();
        $intellectual = Action::where('user_id', $user->id)->where('date', $today)->where('action', 'intellectual')->first();
        $appreciating = Action::where('user_id', $user->id)->where('date', $today)->where('action', 'appreciating')->first();
        $depreciating = Action::where('user_id', $user->id)->where('date', $today)->where('action', 'depreciating')->first();

        $data =  compact('business', 'risk', 'intellectual', 'appreciating', 'depreciating');

        return response()->json($data); 
    } 
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    { 
        $user =  $request->user();

        $validator = Validator::make($request->all(), [ 
            'action' => 'required', 
            'note' => 'required|min:10'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        } 

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
            return response()->json($business); 
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
            return response()->json($risk); 
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
            return response()->json($appreciating); 
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
            return response()->json($intellectual); 
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
            return response()->json($depreciating); 
        }

        return response()->json(['Error' => 'Not Valid']); 
    }

}
