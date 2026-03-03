<?php 

namespace App;

use App\Asset\Emails;
use Illuminate\Support\Facades\Mail;

class EmailTemplate {
    
    public static function send_improve_email( $to, $name){
        $temp = Emails::where('section', 'improve_status')->first();

        $message = $temp->message; 
        $subject = $temp->subject; 
        // $from = $temp->sender;
        $from = 'kabiru.wahab@infoscert.com';
        // return $message;
        if($temp)
        {
            $headers = "From: Gaphub <> \r\n";
            $headers .= "Reply-To: Gaphub <> \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            // $mm = str_replace("{{name}}",$name,$template);     
            // $message = str_replace("{{message}}",$message,$mm); 
            $data = compact('subject', 'to');
            Mail::raw([],  function($message) use ($data){
                $message 
                        ->subject($data['subject'])
                        ->to($data['to']); 
            }); 

            // if (mail($to, $subject, $message, $headers)) {
            //     // echo 'Your message has been sent.';
            // } else {
            //     //echo 'There was a problem sending the email.';
            // }

        }
    
    }
    
}