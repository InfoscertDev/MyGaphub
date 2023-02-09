    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
        <title>Financial Independence Status</title>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="https://www.mygaphub.com/app/assets/css/app.css" rel="stylesheet">
        <link href="https://www.mygaphub.com/app/assets/css/style.css" rel="stylesheet">
        <link href="https://www.mygaphub.com/app/assets/css/radical.css" rel="stylesheet">

        {{-- <script src="https://www.mygaphub.com/app/assets/js/jquery.min.js"></script>
        <script src="https://www.mygaphub.com/app/assets/js/app.js"></script> --}}
    </head>  
    <body style="background: white; margin:0px; padding: 0px;"> 
        <style>
            .txt-primary{
                color: #ED3237 !important;
            } 
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse; 
            }
            .no_table, .no_table th, .no_table td {
                border: none !important;
            }
            .no_table tr td {
                width: 50%;
                text-align: center; 
                vertical-align: middle;
            } 
            td{
                line-height: 85%;
            }
            .color-zone{
                height: 15px; padding: 0 8px; width: 15px;
                margin-left: 10px; display: inline-block;
            }  
            .col-each{ 
                width: 20%;  margin:0px 10px; 
                display: inline;
            }
            .col-half{ 
                width: 40%;  margin:0px 10px; 
                display: inline;
            } 
        </style>
        <div class="">  
            <div class="row">
                <div class="col text-left">    
                    <img style="margin-left: 15px;" src="https://www.mygaphub.com/app/assets/images/logo.png" alt="Logo" height="50" class="logo_main">
                </div> 
                <div class="col text-center"> 
                    <h5 class="bold mt-2" style="margin-left: 15px;">Financial Independence Status Result</h5>
                </div>
            </div> <br> 
        </div>
        <div> 
        <h6 class="line-height: 24px !important; margin-bottom: 15px !important; font-weight:400 !important">Thank you for using the GAPhub to calculate your financial independence status. Below is the copy of your result. You can also save and monitor your progress by registering for a GAPhub account. Use the link provided in the email to register today. </h6>
        <div class="row m-0 mx-auto bg-white py-4 mb-5">
            
            <div class="gap-center"><h3 class="fin-stat-text">Your  <span class="txt-primary">Financial Independence Status</span> Is:</h3></div>
            <br>
        </div> 
        <br> 
        </div><br> <br>  
        <table class="no_table" style="">
            <tr class="">
                <td>
                    <div class="" style="margin-left: 30px; margin-right: 20px;">
                        <div class="">
                            <div class="radial-progress text-center"> 
                                @if ($timeper > 99)
                                    <img src="{{ "https://www.mygaphub.com/app/assets/chart/chart_time_100.png" }}" class="img img-responsive" alt="">
                                @else
                                    <img src="{{ "https://www.mygaphub.com/app/assets/chart/chart_time_$timeper.png" }}" class="img img-responsive" alt="">
                                @endif
                            </div> <br>
                            <div class="text-left mt-1 sm-center">
                                <div class="target"> <b>Current Status:</b>  {{($currenttime) }} Days</div>
                                <div class="target"> <b> Target:</b> 360 Days</div>
                            </div>  <br>
                        </div> 
                    </div> 
                </td>  
                <td>  
                    <div class="" style="margin-left: 30px; margin-right: 20px;">
                        <div class="radial-progress text-center ">
                            @if ($currentper > 99)
                                <img src="{{ "https://www.mygaphub.com/app/assets/chart/chart_per_100.png" }}" class="img img-responsive" alt="">
                            @else
                                <img src="{{ "https://www.mygaphub.com/app/assets/chart/chart_per_$currentper.png" }}" class="img img-responsive" alt="">
                            @endif
                        </div>  <br>
                        <div class="text-left mt-1 sm-center">
                            <div class="target"> <b> Current Status:</b> {{ ($currentper)}}%</div>
                            <div class="target"><b> Target:</b> 100%</div>
                        </div>  <br>
                    </div> 
                </td>
            </tr>
        </table>
        
        <br><br> 
        <div class="my-3"></div>
        <div class="" style="display: block; width: 90%; margin:10px 10px; ">
            <div for="" class="col col-each">
                <span class="color-zone" style="background: red"></span>
                Red Zone
            </div>
            <div for="" class="col col-each">
                <span class="color-zone" style="background: #ffc200"></span>
                Amber Zone
            </div>
            <div for="" class="col col-each">
                <span class="color-zone" style="background: green"></span>
                Green Zone
            </div>
            <div for="" class="col col-each">
                <span class="color-zone" style="background: #65B8E8"></span>
                Blue Zone
            </div>
            <br>  
        </div>
        <table class="" style="">
            <tr>
                <td>
                    <span for="" class="mr-30">
                        <span class="color-zone" style="margin-bottom:1px;background: red"></span>
                        Red Zone (0-25%) 
                    </span> 
                </td>
                <td>
                    This is an undesirable state. It means if you were to lose your job, you have savings to cover you only for a period between 0-90 days. It also means you have an asset portfolio income that is 25% or less of your cost of living.
                </td>
            </tr>
            <tr>
                <td>
                    <span for="" class="mr-30">
                        <span class="color-zone" style="margin-bottom:1px; background: #ffc200"></span>
                        Amber Zone (25% - 50%) 
                    </span>
                </td>
                <td>
                    This is a progressive state. It means if you were to lose your job, you have savings to cover you for a period between 91-180 days. It also means you have an asset portfolio income that is between 26 - 50% of your cost of living.
                </td>
            </tr>
            <tr>
                <td>
                    <span for="" class="mr-30">
                        <span class="color-zone" style="margin-bottom:1px; background: #00ff00"></span>
                        Green Zone (51% - 75%) 
                    </span> 
                </td>
                <td>
                This is a comfortable state. It means if you were to lose your job, you have savings to cover you for a period between 181-270 days. It also means you have an asset portfolio income that is between 51 - 75% of your cost of living.
                </td>
            </tr>
            <tr> 
                <td>
                    <span for="" class="mr-30">
                        <span class="color-zone" style="margin-bottom:1px; margin-top:2px; background: #65B8E8"></span>
                        Blue Zone  (76% - 100+%) 
                    </span>
                </td>
                <td>
                    <span> This is a desirable state. It means if you were to lose your job, you have savings to cover you for a period between 271-360 days and possibly beyond. It also means you have an asset portfolio income that is between 76 - 100%+ of your cost of living.</span>
                </td>
            </tr>
        </table>  
        <br>
        <div class="">
            <h4 class="mt-4"> 
                YOUR FINANCIAL INDEPENDENCE STATUS NOTE
            </h4>
        </div>
        <table>
            <tr>
                <td>
                    <span  style="margin-right: 10px;"> <img src="https://www.mygaphub.com/app/assets/icon/pdf_current.png" alt="" height="25">
                        Current</span>
                </td>
                <td>
                    @if ((int)$currenttime > 1 && (int)$currenttime < 360)
                        <p class="">
                            <span class="" >Your current rainy day savings can only last you {{($currenttime) }} days. Are you comfortable with this?</span>
                        </p> 
                    @elseif ((int)$currenttime <= 1 )
                        <p class="">   
                            <span class="" >Your current rainy day savings is at {{($currenttime) }} days. This is a critical situation. You do not have any savings currently as a fall back plan incase you lose your job or income today. You should seriously consider speaking with one of our financial advisors.</span>
                        </p> 
                    @elseif((int)$currenttime == 360)
                        <p class="">
                            <span class="" >Your current rainy day savings can last you up to {{($currenttime) }} days. Congratulations you have a whole year worth of living expenses saved up. Ensure you maintain this level as a minimum</span>
                        </p> 
                    @else 
                        <p class="">
                            <span class="" >Your current rainy day savings can last you up to {{($currenttime) }} days. Wow! This is beyond the typical 360-day target.
                                Congratulations you have more than a whole yer worth of living expenses saved up. Ensure you maintain this level as a minimum.
                            </span>
                        </p> 
                    @endif
                </td>
                <td>
                    @if ((int)$currentper > 1 && (int)$currentper < 100)
                        <p class="">
                            <span class="" >You are currently meeting {{($currentper)}}% of your monthly expenses from your portfolio income. What happens if you lose your main source of income?</span>
                        </p> 
                    @elseif ((int)$currentper <= 1)
                        <p class="">
                            <span class="" >You are currently meeting {{($currentper)}}% of your monthly expenses. You do not have any portfolio income. You should seriously consider speaking with one of our financial advisors.</span>
                        </p> 
                    @else 
                        <p class="">
                            <span class="" >You are currently meeting {{($currentper)}}% of your monthly expenses from your portfolio income. Well done! You are financially independent. Always remember to increase your means before increasing the cost of your lifestyle.</span>
                        </p> 
                    @endif
                </td>
            </tr> 
            <tr>
                <td>
                    <span  style="margin-right: 10px;">  <img src="https://www.mygaphub.com/app/assets/icon/pdf_target.png" alt="" height="20">
                        Target</span>
                </td>
                <td>
                    <span>With a 360-day target, you are secure for one whole year.</span>
                </td>
                <td>
                    <span>With a target of 100% of your cost of living coming from your Asset Portfolio, you become Financially Independent.</span>
                </td>
            </tr>
        </table>
        <br>
        <h4 style="text-align: center; font-weight:bold; text-decoration: underline">END OF REPORT</h4>
        <hr><hr>
        
        <table class="no_table">
            <tr>
                <td>
                    <p style="width: 80%; margin: 0 auto;text-align: center;">
                        <small style="text-align: center">My GAPhub is the digital product of PRISM Financial Technology Limited, a Fintech company registered in England & Wales with registration no. 12837226 and registered office at 20-22 Wenlock Road, London, England, N1 7GU.
                            Our terms and conditions apply</small>
                    </p>
                </td> 
            </tr>
            <tr> 
                <td>
                    <p style="width: 80%; margin:10px auto;text-align: center;">
                        <small  style="text-align: center">
                            <span> Tel: +44 (0)207 754 5704 |</span>
                            <span><a href="mailto:gaphubteam@gaphub.com">gaphubteam@gaphub.com |</a> </span> 
                            <span><a href="mailto: www.gaphub.com"> www.gaphub.com</a> </span> 
                        </small> 
                    </p>
                </td>
            </tr>
        </table>

    </body>
</html>
