<?php
namespace App\Helper;

use App\Asset\GapCurrency;
use App\FinicialCalculator as Calculator;
use App\Mail\ExhangeRateFailure;
use Illuminate\Support\Facades\Mail;
use App\AdminConfiguration as Configration;

class IntegrationParties{

    private static $fixer_key = "fc3db8b71bc7539e66f35dc137bff97d";
    private static $sendinblue_key = "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";
    private $sender = 'MyGaphub';
    #key = "";
    public static function import_details_to_crm(){
        $data1 = 'NAME;SURNAME;EMAIL\n"Kabiru";"Wahab";"versatilekaywize94@gmail.com"\n"Samuel";"Johnson";"dev.kabiruwahab@gmail.com';
        $data = '\EMAIL;SURNAME;FIRSTNAME\\n#versatilekaywize94@gmail.com;Kabiru;Wahab';
        // $data = '\EMAIL;SURNAME;FIRSTNAME\\\\n#versatilekaywize94@gmail.com;Kabiru;Wahab';

        $curl = curl_init();

        curl_setopt_array($curl, [
          CURLOPT_URL => "https://api.sendinblue.com/v3/contacts/import",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\"listIds\":[26],\"emailBlacklist\":false,\"smsBlacklist\":false,\"updateExistingContacts\":true,\"emptyContactsAttributes\":false,\"fileBody\":\"EMAIL;SURNAME;FIRSTNAME\\\\\\\\n#versatilekaywize94@gmail.com;Kabiru;WahabEMAIL;SURNAME;FIRSTNAME\\\\\\\\n#versatilekaywize94@gmail.com;Kabiru;WahabEMAIL;SURNAME;FIRSTNAME\\\\\\\\n#versatilekaywize94@gmail.com;Kabiru;WahabEMAIL;SURNAME;FIRSTNAME\\\\\\\\n#versatilekaywize94@gmail.com;Kabiru;Wahab\"}",
          CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Content-Type: application/json",
            "api-key: ".IntegrationParties::$sendinblue_key
          ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          return $err;
        } else {
          return $response;
        }
    }

    //  Load new Gaphuber too Suspect Contact List
    public static function create_contact_to_sendinblue($email){
        $curl = curl_init();

        curl_setopt_array($curl, [
          CURLOPT_URL => "https://api.sendinblue.com/v3/contacts",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\"attributes\":{\"Firstname\":\".\"},\"listIds\":[25],\"updateEnabled\":false,\"email\":\"$email\"}",
          CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Content-Type: application/json",
            "api-key: ".IntegrationParties::$sendinblue_key
          ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
          return false;
        } else {
          return $response;
        }
    }

    // GSB 10  MOve Gaphuber to Lead contact after verification
    public static function join_sendinblue_leads($user){
        $remove_curl = curl_init();
        curl_setopt_array($remove_curl, [
          CURLOPT_URL => "https://api.sendinblue.com/v3/contacts/$user->email",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "DELETE",
          CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "api-key: ".IntegrationParties::$sendinblue_key
          ],
        ]);

        $response = curl_exec($remove_curl);

        $err = curl_error($remove_curl);
        curl_close($remove_curl);

        if (!$err) {
          $curl = curl_init();
          curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.sendinblue.com/v3/contacts",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"attributes\":{\"Firstname\":\"$user->firstname\"},\"listIds\":[26],\"updateEnabled\":false,\"email\":\"$user->email\"}",
            CURLOPT_HTTPHEADER => [
              "Accept: application/json",
              "Content-Type: application/json",
              "api-key: ".IntegrationParties::$sendinblue_key
            ],
          ]);

          $lead = curl_exec($curl);
          $lead_err = curl_error($curl);
          curl_close($curl);

          if ($lead_err) {
            return false;
          } else {
            return $lead;
          }
        }

    }

    public static function join_sendinblue_contact($user, $contact){
      // $user->email = "darul9089@gmail.com";
      $curl = curl_init();
      curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.sendinblue.com/v3/contacts",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"attributes\":{\"Firstname\":\"$user->firstname\"},\"listIds\":[$contact],\"updateEnabled\":false,\"email\":\"$user->email\"}",
        CURLOPT_HTTPHEADER => [
          "Accept: application/json",
          "Content-Type: application/json",
          "api-key: ".IntegrationParties::$sendinblue_key
        ],
      ]);

      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);
    //   info([$err, $response, "{\"attributes\":{\"Firstname\":\"$user->firstname\"},\"listIds\":[$contact],\"updateEnabled\":false,\"email\":\"$user->email\"}"]);

      if ($err) {
        return false;
      } else {
        return $response;
      }
    }

    public static function migrate_sendinblue_to_prospect($user){
      $lead_curl = curl_init();
      curl_setopt_array($lead_curl, [
        CURLOPT_URL => "https://api.sendinblue.com/v3/contacts/$user->email",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "DELETE",
        CURLOPT_HTTPHEADER => [
          "Accept: application/json",
          "api-key: ".IntegrationParties::$sendinblue_key
        ],
      ]);
      $response = curl_exec($lead_curl);
      $err = curl_error($lead_curl);

      curl_close($lead_curl);

      if ($err) {
        return false;
      } else {
        $prospect_curl = curl_init();

        curl_setopt_array($prospect_curl, [
          CURLOPT_URL => "https://api.sendinblue.com/v3/contacts",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{\"attributes\":{\"Firstname\":\"$user->firstname\"},\"listIds\":[27],\"updateEnabled\":false,\"email\":\"$user->email\"}",
          CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Content-Type: application/json",
            "api-key: ".IntegrationParties::$sendinblue_key
          ],
        ]);

        $prospect = curl_exec($prospect_curl);

        return $prospect;
      }
    }

    public function update_currency_converter($base='EUR'){
        $url = "http://data.fixer.io/api/latest?base=$base&access_key=".IntegrationParties::$fixer_key;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $request = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        $result = json_decode($request, false);

        if($err){
          $configration = Configration::first();
          Mail::to($configration->exchange_email)->send(new ExhangeRateFailure());
        }else{
          return $result;
        }
    }

    public  function user_currency_converter($user){
        $system_currencies = GapCurrency::where('user_id', $user->id)->first();
        if($system_currencies && ($system_currencies->last_update) == date('Y-m-d')){
            // var_dump("Good");
            return $system_currencies;
        }
        $calculator = Calculator::where('user_id', $user->id)->first();
        $currency = explode(" ", $calculator->currency)[1];
        $converter = $this->update_currency_converter();

        if($converter && $converter->success){
            if(!$system_currencies){
                $system_currencies = new GapCurrency();
                $system_currencies->user_id = $user->id;
                // $system_currencies->save();
            }
            $system_currencies->base = $converter->base;
            $system_currencies->last_update = $converter->date;
            $system_currencies->currencies = json_encode($converter->rates);
            $system_currencies->save();
        }
        return $system_currencies;
    }

    public  function load_currency_converter(){
        $system_currencies = GapCurrency::where('user_id', 0)->first();
        $converter = $this->update_currency_converter();

        if($converter && $converter->success){
            if(!$system_currencies){
                $system_currencies = new GapCurrency();
                $system_currencies->user_id = 0;
                $system_currencies->save();
            }
            $system_currencies->base = $converter->base;
            $system_currencies->last_update = $converter->date;
            $system_currencies->currencies = json_encode($converter->rates);
            $system_currencies->save();
        }
        return $system_currencies;
    }

    public function send_sendinblue_sms($user, $message){
      $curl = curl_init();
      $post_data = [
        'type' => 'transactional',
        'sender' => $this->sender,
        'recipient' => $user->phone,
        'content' => $message
        // ,"webUrl" => "http://requestb.in/173lyyx1"
      ];

      curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.sendinblue.com/v3/transactionalSMS/sms",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($post_data) ,
        CURLOPT_HTTPHEADER => [
          "Accept: application/json",
          "Content-Type: application/json",
          "api-key: ".IntegrationParties::$sendinblue_key
        ],
      ]);

      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);

      if ($err) {
        return false;
      } else {
        return $response;
      }
    }
}
