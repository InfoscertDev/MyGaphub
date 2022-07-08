<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data['subject']}}</title>
    <link href="http://infoscert.net/releasea/gap/assets/css/style.css" rel="stylesheet">
    <link href="http://infoscert.net/releasea/gap/assets/css/radical.css" rel="stylesheet">
</head>

<body> 
    <table> 
        <input type="hidden" name="independence" value="GAPHUB FINANICIAL">
        <div class="row m-0 mx-auto py-4">
            <div class="gap-center">
                 <div class="fin-result row">
                    <div class="col-xs-12 col-md-6 ">
                        <div class="text-center mx-auto">
                            <div class="radial-progress" data-progress="{{$data['timeper']}}">
                                <div class="circle">
                                    <div class="mask full">
                                        <div class="fill" style="background: {{$data['timecolor'] }} !important"></div>
                                    </div>
                                    <div class="mask half">
                                        <div class="fill" style="background: {{$data['timecolor'] }} !important"></div>
                                        <div class="fill fix" style="background: {{$data['timecolor']}} !important"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                                <div class="inset time">
                                    <img class="img img-responsive" src="http://infoscert.net/releasea/gap/assets/images/hourglass.png" alt="">
                                </div>
                            </div>
                            <div class="text-left mt-1">
                                <span class="target"> <b>Current Status:</b>  {{$data['currenttime']}} Days</span>
                                <span class="target"> <b> Target:</b> 360 Days</span>
                            </div>
                        </div> 
                    </div>
                    <div class="col-xs-12 col-md-6 ">
                        <div class="text-center"> 
                            <div class="radial-progress" data-progress="{{$data['currentper']}}">
                                <div class="circle">
                                    <div class="mask full">
                                        <div class="fill" style="background: {{$data['percolor']}} !important"></div>
                                    </div>
                                    <div class="mask half"> 
                                        <div class="fill"  style="background: {{$data['percolor']}} !important"></div>
                                        <div class="fill fix" style="background: {{$data['percolor']}} !important"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                                <div class="inset percent">
                                    <span>%</span>
                                </div>
                            </div> 
                            <div class="text-left mt-1">
                                <span class="target"> <b> Current Status:</b> {{$data['currentper']}}%</span>
                                <span class="target"><b> Target:</b> 100%</span>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="gap-center text-center mt-4 mb-1">
                    <label for="" class="mr-3">
                        <span class="color-zone" style="background: red"></span>
                        Red Zone
                    </label>
                    <label for="" class="mr-3">
                        <span class="color-zone" style="background: #ffc200"></span>
                        Amber Zone
                    </label>
                    <label for="" class="mr-3">
                        <span class="color-zone" style="background: green"></span>
                        Green Zone
                    </label>
                    <label for="" class="mr-3">
                        <span class="color-zone" style="background: blue"></span>
                        Blue Zone
                    </label>
                </div>
                
                    From: gaphubteam@mygaphub.com
                    To: user@theiremail.com
                    Subject: Your Financial Independence Status Result
 
 
  
                    Hello,
                    
                    Thank you for using the GAPhub calculator. 
                    
                    Please find your personalized financial independence calculation result in the attached PDF file. 
                    
                    At GAPhub we have extensive resources to help you on your financial independence journey.
                    
                    To take advantage of our additional personal finance resources, such as our asset portfolio management platform, periodic budget management system, asset acquisition opportunities and many more, please click the link below to register.
                    

                    
                    We look forward to having you as part of the GAP family. 
                    
                    If you have any further questions or need assistance please contact us at gaphubteam@gaphub.com
                    
                    
                    Thank you for using GAPhub Products.
                    
                    We wish you the very best on your financial journey, 
                    
                    The GAPhub Team
                    
                    MyGAPhub© is the digital product of PRISM Financial Technology Limited, a Fintech company registered in England & Wales with registration no. 12837226 and registered office at 20-22 Wenlock Road, London, England, N1 7GU.
                    Our terms and conditions apply.

                    This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. If you have received this email in error, please notify the system manager. This message contains confidential information and is intended only for the individual named. If you are not the named addressee, you should not disseminate, distribute or copy this email. Please notify the sender immediately by email if you have received this email by mistake and delete this email from your system. If you are not the intended recipient, you are notified that disclosing, copying, distributing or taking any action in reliance on the contents of this information is strictly prohibited.


            </div>
        </div>
    </table>
</body>
    
</html>