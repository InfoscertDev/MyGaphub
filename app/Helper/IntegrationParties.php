<?php
namespace App\Helper;

use App\Asset\GapCurrency;
use App\FinicialCalculator as Calculator;
use App\Mail\ExhangeRateFailure;
use Illuminate\Support\Facades\Mail;
use App\AdminConfiguration as Configration;

class IntegrationParties{

    private $sender = 'MyGaphub';
    private static $fixer_key;
    private static $sendinblue_key;

    public static  function initializeKeys()
    {
        self::$fixer_key = config("app.fixer_key");
        self::$sendinblue_key = config("app.brevo_key");
    }


    public static function import_details_to_crm(){
        IntegrationParties::initializeKeys();
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
        IntegrationParties::initializeKeys();
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
        IntegrationParties::initializeKeys();
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
        IntegrationParties::initializeKeys();
        $contact_curl = curl_init();
        curl_setopt_array($contact_curl, [
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
        $response = curl_exec($contact_curl);
        $err = curl_error($contact_curl);
        curl_close($contact_curl);

        if(!$err){
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

            $contact = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            // info([  IntegrationParties::$sendinblue_key,' Sendiblue REsponse', $err, $contact ]);
            return $contact;
        }

        return false;
    }

    public static function migrate_sendinblue_to_prospect($user){
        IntegrationParties::initializeKeys();

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

        if (!$err) {
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
        return false;
    }

    public static function send_user_to_brevo_prospect($user) {
        IntegrationParties::initializeKeys();

        // Initialize cURL session to add user to Brevo (Sendinblue)
        $curl = curl_init();

        // Prepare payload
        $payload = json_encode([
            "email" => $user->email,
            "attributes" => [
                "FIRSTNAME" => $user->firstname ?? '',
                "LASTNAME" => $user->surname ?? '',
                // Add other attributes here if needed, like LASTNAME, SMS, etc.
            ],
            "listIds" => [27],
            "updateEnabled" => true // Set true to update if contact exists
        ]);

        // Set cURL options
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.brevo.com/v3/contacts",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Content-Type: application/json",
                "api-key: " . IntegrationParties::$sendinblue_key
            ],
        ]);

        // Execute cURL and capture response
        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        // Return result
        if ($error) {
            // Optionally log the error or handle it
            return false;
        }

        return $response;
    }


    public static function migrate_sendinblue_to_active_prospect($user){
        IntegrationParties::initializeKeys();
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

        if (!$err) {
          $prospect_curl = curl_init();

          curl_setopt_array($prospect_curl, [
            CURLOPT_URL => "https://api.sendinblue.com/v3/contacts",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"attributes\":{\"Firstname\":\"$user->firstname\"},\"listIds\":[38],\"updateEnabled\":false,\"email\":\"$user->email\"}",
            CURLOPT_HTTPHEADER => [
              "Accept: application/json",
              "Content-Type: application/json",
              "api-key: ".IntegrationParties::$sendinblue_key
            ],
          ]);

          $prospect = curl_exec($prospect_curl);

          return $prospect;
        }

        return false;
    }

    public static function migrate_sendinblue_to_reap_prospect($user){
        IntegrationParties::initializeKeys();
        $prospect_curl = curl_init();
        curl_setopt_array($prospect_curl, [
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
        $response = curl_exec($prospect_curl);
        $err = curl_error($prospect_curl);

        curl_close($prospect_curl);

        if (!$err) {
          $prospect_curl = curl_init();

          curl_setopt_array($prospect_curl, [
            CURLOPT_URL => "https://api.sendinblue.com/v3/contacts",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"attributes\":{\"Firstname\":\"$user->firstname\"},\"listIds\":[33],\"updateEnabled\":false,\"email\":\"$user->email\"}",
            CURLOPT_HTTPHEADER => [
              "Accept: application/json",
              "Content-Type: application/json",
              "api-key: ".IntegrationParties::$sendinblue_key
            ],
          ]);

          $prospect = curl_exec($prospect_curl);

          return $prospect;
        }

        return false;
    }


    public function update_currency_converter($base='EUR'){
        IntegrationParties::initializeKeys();
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
        IntegrationParties::initializeKeys();
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
        IntegrationParties::initializeKeys();
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
    //   IntegrationParties::initializeKeys();
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
