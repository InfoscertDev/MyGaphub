<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$subject}}</title>
</head>

<body> 
    <table> 
    <style>
        p { font-size: 15px !important; }
    </style>
        <div class="" style="padding: 10px; ">
            <div class="gap-center">
                <br>
                <p class="margin-top: 10px"> Hello,</p>
                <p>
                    Reminder {{ $reminder->name }} 
                    <span class="ml-4">{{ $reminder->date }}</span>
                </p>
                <p>
                    Amount {{ $reminder->amount }}
                </p>
                <p>
                    Note {{ $reminder->note }}
                </p>
                <p>  <br> 
                    <small>
                        MyGAPhub© is the digital product of PRISM Financial Technology Limited, a Fintech company registered in England & Wales with registration no. 12837226 and registered office at 20-22 Wenlock Road, London, England, N1 7GU.
                        Our <a href="">terms and conditions </a> apply.
                    </small>
                </p>
                <p>    <br>
                    <small>
                        This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. If you have received this email in error, please notify the system manager. 
                        This message contains confidential information and is intended only for the individual named. If you are not the named addressee, you should not disseminate, distribute or copy this email. Please notify the sender immediately 
                        by email if you have received this email by mistake and delete this email from your system. If you are not the intended recipient, you are notified that disclosing, copying, distributing or taking any action in reliance on the 
                        contents of this information is strictly prohibited.
                    </small>
                </p> 

            </div>
        </div>
    </table>
</body>
    
</html>