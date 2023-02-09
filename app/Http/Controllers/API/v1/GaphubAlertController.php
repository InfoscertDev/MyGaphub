<?php

namespace App\Http\Controllers\API\v1;

use App\Helper\IntegrationParties;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\UserAudit;
use Illuminate\Support\Facades\Validator;
use stdClass;

class GaphubAlertController extends Controller
{
    private static $mygaphub_token = "iuahyszuishxdixuhciudxcghsiudcjpoixsvauhjg\aq276eyudiojqsi7fgudgsww8iusjno78szd9jsnf7yqg76aqgdihsj9aqogsno8svclb;sdcfujaqsodxb";
    // REAP
    private static $token = 'qswsdopspncagajkxnnznbxghsjksjujiubszajkbagznbzvszhjvxhvsvzghzgxgvxhgdjhvhchxbhxbxvvxvhhxvhvhhmdjxdbjxvhjhxdbvjxdxjbvlbjz';
    private static $reap_link = 'https://gappropertyhub.com/api';
    // GANP  
    private static $ganp_token = 'xnbbnxbcbvjhnbkgvnmbbnfmohbvjcfgjmcbjmhnomcfjnomnpamqasxmbcvbvnfvbcfhfbvhjjjkfjknfvbiolckojinkjondodnglhdn';
    private static $ganp_link = 'http://www.gapassethub.com/api';

    public function triggerReapAlert(Request $request){
        $token = $request->get('token');
        if($this::$mygaphub_token == $token){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch,CURLOPT_URL, $this::$reap_link."/asset/last?token=".$this::$token);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
            $data = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($data); 
            $asset = $data->asset;
    
            $user_audit = UserAudit::get();
    
            foreach ($user_audit as $audit) { 
                $alerts = json_decode($audit->reap_alert);
                if($alerts && count($alerts)){
                    foreach($alerts as $alert){
                        if($alert == $asset->category->name){
                            $notification = new Notification();
                            $notification->user_id = $audit->user_id;
                            $notification->action = route('user.single_reap', $asset->id);   
                            $notification->title = "REAP Acquisition Alert";
                            $notification->category = "acquisition";
                            $notification->message =  "New Reap acquistion has been added";
                            $notification->save();
                            echo 'Done Category';
                        }elseif(str_contains($asset->name,strval($alert))){
                            $notification = new Notification(); 
                            $notification->user_id = $audit->user_id;
                            $notification->action = route('user.single_reap', $asset->id);   
                            $notification->title = "REAP Acquisition Alert";
                            $notification->category = "acquisition";
                            $notification->message =  "New Reap acquistion has been added";
                            $notification->save(); 
                            echo 'Done Name';
                        }
                    }
                }
    
            }
        }else{
            return Null;
        }
  
    }
    
    public function triggerAuthorizeReap(Request $request,$asset){
        $token = $request->get('token');
        if($this::$mygaphub_token == $token){
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch,CURLOPT_URL, $this::$reap_link."/assets/$asset?token=".$this::$token);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
            $data = curl_exec($ch); 
            curl_close($ch); 
            $data = json_decode($data); 
            $asset = $data->asset;
    
            $user_audit = UserAudit::get();

            foreach ($user_audit as $audit) {  
                $alerts = json_decode($audit->reap_alert);
                if($alerts && count($alerts)){
                    foreach($alerts as $alert){
                        if($alert == $asset->category->name){
                            $notification = new Notification();
                            $notification->user_id = $audit->user_id;
                            $notification->action = route('user.single_reap', $asset->id);   
                            $notification->title = "REAP Acquisition Alert";
                            $notification->category = "acquisition";
                            $notification->message =  "New Reap acquistion has been added";
                            $notification->save();
                            echo 'Done Category';
                        }elseif(str_contains($asset->name,strval($alert))){
                            $notification = new Notification(); 
                            $notification->user_id = $audit->user_id;
                            $notification->action = route('user.single_reap', $asset->id);   
                            $notification->title = "REAP Acquisition Alert";
                            $notification->category = "acquisition";
                            $notification->message =  "New Reap acquistion has been added";
                            $notification->save(); 
                            echo 'Done Name';
                        }
                    }
                }

            }
        }else{
            return Null;
        }
    }

    public function nonMemberSMS(Request $request){
        info($request->all()); 
        $validator = Validator::make($request->all(), [
            'country_code' => 'required',
            'phone_number' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $phone = explode(" ",$request->country_code)[0].$request->phone_number;
        $profile = new stdClass();
        $profile->phone = $phone;
        $message = "Hello Gaphuber. 
            You can download MyGaphub on Android Playstore on https://play.google.com/store/apps/details?id=com.prismcheck.GapHub 
            or on App Store https://apps.apple.com/us/app/gaphub/id1577758374
        ";
         
        $integrations = new IntegrationParties(); 
        $sms_reminder = $integrations->send_sendinblue_sms($profile, $message);
        $status = true;
        info(compact('status', 'sms_reminder'));
        return response()->json(compact('status', 'sms_reminder'));
    }
}
