<?php
namespace App\Helper;

use App\Reminder;
use App\UserAudit;

use App\SevenG\AlphaFin as Alpha;
use App\SevenG\BetaFin as Beta;
use App\SevenG\CreditFin as Credit;
use App\SevenG\DeptFin as Dept;
use App\SevenG\EducationFin as Education;
use App\SevenG\FreedomFin as Freedom;
use App\SevenG\GrandFin as Grand;
use DateTime;
use Illuminate\Support\Facades\Http;
use App\Models\Notification;

class PersonalAssistance {

    protected $user;
    // REAP
    private $token = 'qswsdopspncagajkxnnznbxghsjksjujiubszajkbagznbzvszhjvxhvsvzghzgxgvxhgdjhvhchxbhxbxvvxvhhxvhvhhmdjxdbjxvhjhxdbvjxdxjbvlbjz';
    private $link = 'https://gappropertyhub.com/api';
    // GANP
    private $ganp_token = 'xnbbnxbcbvjhnbkgvnmbbnfmohbvjcfgjmcbjmhnomcfjnomnpamqasxmbcvbvnfvbcfhfbvhjjjkfjknfvbiolckojinkjondodnglhdn';
    private $ganp_link = 'http://gapassethub.com/api';


    public function __construct($user)
    {
        $this->user = $user;
    }

    public function priority(){
        $today = date('d');
        $priority = null;
        $reminder = Reminder::where('user_id', $this->user->id)
                    ->where('complete', 0)->whereDate('date', '>=', date('Y-m-d'))
                    ->orderBy('date', 'ASC')
                    ->orderBy('name', 'ASC')
                    ->first();
        if($today == 2){
            $report = Notification::where('user_id', $this->user->id)
                        ->where('category','seed_report')
                        ->first();
            $priority = $report;
        } else if($reminder){
            $alert = new DateTime(date('Y-m-d'));
            $reminder->dueday = $alert->diff(new DateTime($reminder->date)) ;
            $reminder->dueday = $reminder->dueday->days;
            $priority = $reminder;
        }

        return $priority;
    }

    public function acqusition(){

        $audit = UserAudit::where('user_id', $this->user->id)->first();
        $reaps = json_decode($audit->reap_favourite);
        $ganps = json_decode($audit->ganp_favourite);
        $reaps = ($reaps) ? $reaps : [];
        $ganps = ($ganps) ? $ganps : [];
        $total_reap = count($reaps);
        $total_ganp = count($ganps);
        $random_reap = rand(0, $total_reap - 1);
        $random_ganp = rand(0, $total_ganp - 1);
        $asset = null;
        $type = $this->acqusition_choice($total_reap, $total_ganp);
        try{
            if($type == "reap"){
                if(isset($reaps[$random_reap])){
                    $status = Http::get($this->link."/assets/$reaps[$random_reap]?token=".$this->token) ;
                    $reap  = json_decode($status);
                    $asset = $reap->asset;
                }
            }else if($type == "ganp"){
                if($ganps[$random_ganp]){
                    $status = Http::get($this->ganp_link."/ganp/asset/$ganps[$random_ganp]?token=".$this->ganp_token) ;
                    $ganp  = json_decode($status);
                    // var_dump($ganps[$random_ganp],$ganp);s
                    $asset = $ganp;
                }
            }
            return compact('type', 'asset');
        }catch (\Throwable $th) {
            return compact('type', 'asset');
        }
    }

    public function acqusition_choice($total_reap, $total_ganp){
        $choice = null;
        if($total_ganp && $total_reap){
            $average = ($total_reap / $total_ganp);
            if($average > 3){
                $choice = "reap";
            }else{
               $choice = (rand(0, 1)) ? "ganp" :"reap";
            }
        }else if($total_reap) $choice = "reap";
        else if($total_ganp) $choice = "ganp";
        return $choice;
    }

    public function personal(){
        $profile = $this->user->profile;
        $setup = null; $type = null;
        $alpha = Alpha::where('user_id', $this->user->id)->first();
        $beta = Beta::where('user_id', $this->user->id)->first();
        $credit = Credit::where('user_id', $this->user->id)->first();
        $debt = Dept::where('user_id', $this->user->id)->first();
        $education = Education::where('user_id', $this->user->id)->first();
        $freedom = Freedom::where('user_id', $this->user->id)->first();
        $grand = Grand::where('user_id', $this->user->id)->first();

        // Analytics
        if(!$alpha->main){ $type = "7g"; $setup = "Validate your Alpha 7G assumption";}
        else if(!$beta->main) {  $type = "7g"; $setup = "Validate your Beta 7G assumption";}
        else if(!$credit->main){ $type = "7g"; $setup = "Validate your Credit 7G assumption";}
        else if(!$debt->main){ $type = "7g"; $setup = "Validate your Debt 7G assumption";}
        else if(!$education->main){ $type = "7g"; $setup = "Validate your Education 7G assumption";}
        else if(!$freedom->main){ $type = "7g"; $setup = "Validate your Freedom 7G assumption";}
        else if(!$grand->main){ $type = "7g"; $setup = "Validate your Grand 7G assumption";}

        // Profile
        elseif($profile && !$profile->phone){ $type = "profile"; $setup = "Complete your profile: Input your phone number";}
        else if($profile && !$profile->date_of_birth) {$type = "profile"; $setup = "Complete your profile: Input your date of birth";}
        else if($profile && !$profile->country){$type = "profile"; $setup = "Complete your profile: Input your country of residence"; }

        return compact('type', 'setup');
    }

    public function payments(){
        $reminders = Reminder::where('user_id', $this->user->id)
                        ->where('complete', 0)->where('amount', '>', 0)
                        ->whereDate('date', '>=', date('Y-m-d'))
                        ->orderBy('date', 'ASC')->orderBy('name', 'ASC')
                        ->limit(3)->get();
        foreach($reminders as $reminder){
            $alert = new DateTime(date('Y-m-d'));
            $reminder->dueday = $alert->diff(new DateTime($reminder->date)) ;
            $reminder->dueday = $reminder->dueday->days;
        }
        return compact('reminders');
    }

    public function assistance(){
        // var_dump($this->payments()['reminders'][0]);
        return [
            'priority' => $this->priority(),
            'acquisition' => $this->acqusition(),
            'personal' => $this->personal(),
            'payments' => $this->payments()
        ];
    }
}
