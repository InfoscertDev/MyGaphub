<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;

use App\UserProfile as Profile;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class MobileAuth extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->user()->id;
        $user = User::find($id);
        $biometric = Profile::where('id',$user->profile_id)->select([ 'passcode', 'fingerprint'])->first();
        // return response()->json(compact('profile'));
        return response()->json([
            'success' => true,
            'message' => '',
            'data' => [
                'biometric' =>  $biometric
            ]
        ]);
    }

    // public function confirmPassCode(Request $request){
    //     $id = $request->user()->id;
    //     $user = User::find($id);
    //     $profile = $user->profile;
    //     $success = false;

    //     $validator = Validator::make($request->all(), [ 'pass' => 'required' ]);

    //     if($validator->fails()){
    //         return response()->json($validator->errors()->toJson(), 400);
    //     }

    //     $pass = Hash::check($request->pass, $profile->passcode);

    //     if ($pass) {
    //         $success = true;
    //         return response()->json(compact('success', 'profile'));
    //     } else {
    //         return response()->json(compact('success'));
    //     }
    // }

    public function confirmPasscode(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'passcode' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 400);
        }

        $user = $request->user();
        $profile = $user->profile;

        if (!$profile || empty($profile->passcode)) {
            return response()->json([
                'success' => false,
                'message' => 'No passcode set for this user',
            ], 400);
        }

        $isValid = Hash::check($request->passcode, $profile->passcode);

        return response()->json([
            'success' => $isValid,
            'message' => $isValid ? 'Passcode verified successfully' : 'Invalid passcode',
        ]);
    }

    public function setFingerprint(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'fingerprint' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 400);
        }

        $user = $request->user();
        $profile = $user->profile;

        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'User profile not found',
            ], 404);
        }

        $profile->fingerprint = $request->fingerprint;
        $profile->save();

        return response()->json([
            'success' => true,
            'message' => 'Fingerprint setting updated successfully',
            'data' => [
                'fingerprint' => $profile->fingerprint
            ]
        ]);
    }

    public function setPasscode(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'passcode' => 'required|string|min:4|max:8'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 400);
        }

        $user = $request->user();
        $profile = $user->profile;

        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'User profile not found',
            ], 404);
        }

        $profile->passcode = Hash::make($request->passcode);
        $profile->save();

        return response()->json([
            'success' => true,
            'message' => 'Passcode updated successfully',
            'data' => [
                'has_passcode' => !empty($profile->passcode)
            ]
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->user()->id;
        $user = User::find($id);
        $profile = $user->profile;
        $success = false;
        $validator = Validator::make($request->all(), [ 'security' => 'required' ]);
        // $validator = Validator::make($request->all(), [ 'security' => 'required' ]);

        if($request->security == "ahgajhgsbjgbjhxbsjdhhsjjhd"){
            $validator = Validator::make($request->all(), [ 'fingerprint' => 'required' ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }
            $profile->fingerprint = $request->fingerprint;
            $profile->save();
            $success = true;
            return response()->json(compact('success', 'profile'));
        }

        if($request->security == "agvabnvdnbsnvdbnvsjnbnffv"){
            $validator = Validator::make($request->all(), [ 'passcode' => 'required' ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }
            $profile->passcode = Hash::make($request->passcode);
            $profile->save();
            $success = true;
            return response()->json(compact('success', 'profile'));
        }

        if($request->security == "prghwedbnshvdvsbnnzskn"){
            $validator = Validator::make($request->all(), [ 'preference' => 'required|integer|min:0|max:2' ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }
            $profile->preference = $request->preference;
            $profile->save();
            $success = true;
            return response()->json(compact('success', 'profile'));
        }

        return response()->json(['error' => 'No Security Information']);
    }

    public function updatePassword(Request $request){

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8|confirmed'
        ]);

        if($validator->fails()){
            $status = false;
            $message = $validator->errors()->toJson();
            return response()->json(compact('status', 'message'), 400);
        }

        $id = $request->user()->id;
        $user = User::find($id);
        $isPass = Hash::check($request->current_password, $user->password);
        if ($isPass) {
            $password = Hash::make($request->new_password);
            $user->password = $password;
            $user->save();
            return response()->json(['success' => 'Your password has been updated.']);
        } else {
            return  response()->json(['error' => 'Current Password  does not match']);
        }
    }
}
