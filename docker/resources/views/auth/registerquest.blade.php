@extends('layouts.guest')
@section('header')
  @include('inc.authheader')
@endsection 
@section('content') 
<div class="">
    <div id="intro" class="wd-f hg-f  py-4 bg-white">
        <div class="gap-center-sm">
            <div class="elevation-1">
                <div class="row">
                    {{-- <div class="col-6">
                        <div class="cal-img" style="width:100%; height:400px">
                            <img width="250px" height="400px" src="{{ asset('/assets/images/computer.jpg') }}" class="img img-responsive" alt="">
                            <div class="gap-header mb-3">
                                <h3 class="mx-1"><b>Registration</b></h3>
                                <span class="line-step" style="width: 40%"></span>
                                <span class="line-nextstep"></span>
                            </div> 
                            <div class="py-4 cal-text">
                                <h4>We're excited you have decided to open a</h4>
                                <h4> GAP Account!</h4>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-10 justify-content-center">
                        <div class="px-2" > 
                            <p class="pt-5 pb-1" style="font-size: 17px">
                                {{-- To help you take control of your finicial life go ahead and take the <b>7-Goal challenge</b> 
                                and win the PRIZE that will be waiting for you in your account --}}
                                Before you start enjoying the great features, we would like you take this quick financial health check so you can maximise your experience with My GAPhub!
                            </p>
                            <p class="text-center"  >
                                <button class="btn btn-pry px-3" onclick="registerNow()">START</button>
                            </p>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div id="register"  style="display: none" class="wd-f py-4 ">
        <div class="gap-center">
            <div class="gap-body">
                <form method="POST" action="{{ route('register.questions') }}">
                    @csrf
                    <div class="sheet-steps elevate-1"> 
                        <div class="gap-header">
                            <h5 class="mt-2 mx-2"><b>Please answer the following multiple questions</b> </h5>
                            <span class="line-step" style="width: 50%"></span>
                            {{-- <span class="line-nextstep"></span> --}}
                        </div>  
                        <ul class="step-lists">
                            <li class="row">
                                <div><p class="step-quest"><b class="mr-1">Step One:</b>  Have you got a Rainy Day Funds (money) to cover one year's worth of your living expense? </p></div>
                                <div class="step-choice">
                                    <label for="" class="answer1" onclick="activateQuest(1)"><input type="radio" required  name="step1" value="Yes"> Yes</label> 
                                    <label for="" class="answer1" onclick="activateQuest(1)"><input type="radio" required  name="step1" value="No"> No</label> 
                                </div>
                            </li> 
                            <li class="row none" id="step2">
                                <div><p class="step-quest"><b class="mr-1">Step Two:</b> Are you saving up for your own house or you have already bought one? </p></div>
                                <div class="step-choice">
                                    <label for="" class="answer2" onclick="activateQuest(2)"><input type="radio" required  name="step2" value="Yes"> Yes</label> 
                                    <label for="" class="answer2" onclick="activateQuest(2)"><input type="radio" required  name="step2" value="No"> No</label> 
                                    <label for="" class="answer2" onclick="activateQuest(2)"><input type="radio" required  name="step2" value="Already Bought One"> Already Bought One</label> 
                                </div>
                            </li> 
                            <li class="row none" id="step3">
                                <div><p class="step-quest"><b class="mr-1">Step Three:</b>  Are you free from all unsecured debts - credit cards, loans and hire purchases? </p></div>
                                <div class="step-choice">
                                    <label for="" class="answer3" onclick="activateQuest(3)"><input type="radio" required  name="step3" value="Yes"> Yes</label> 
                                <label for="" class="answer3" onclick="activateQuest(3)"><input type="radio" required  name="step3" value="No"> No</label> 
                                </div>
                            </li>
                            <li class="row none" id="step4">
                                <div><p class="step-quest"><b class="mr-1">Step Four:</b>  Are you mortgage free? </p></div>
                                <div class="step-choice">
                                    <label for="" class="answer4" onclick="activateQuest(4)"><input type="radio" required  name="step4" value="Yes"> Yes</label> 
                                <label for="" class="answer4" onclick="activateQuest(4)"><input type="radio" required  name="step4" value="No"> No</label> 
                                <label for="" class="answer4" onclick="activateQuest(4)"><input type="radio" required  name="step4" value="Actively Paying it Off"> Actively Paying it Off</label> 
                                <label for="" class="answer4" onclick="activateQuest(4)"><input type="radio" required  name="step4" value="Not Applicable"> Not Applicable</label> 
                                </div>
                            </li>
                            <li class="row none" id="step5"> 
                                <div><p class="step-quest"><b class="mr-1">Step Five:</b>  Are you saving towards or have you secured funds for your Children's University education or is this not applicable to you? </p></div>
                                <div class="step-choice">
                                    <label for="" class="answer5" onclick="activateQuest(5)"><input type="radio" required  name="step5" value="Secured"> Secured</label> 
                                    <label for="" class="answer5" onclick="activateQuest(5)"><input type="radio" required  name="step5" value="Saving"> Saving</label> 
                                    <label for="" class="answer5" onclick="activateQuest(5)"><input type="radio" required  name="step5" value="Not Saving"> Not Saving</label> 
                                    <label for="" class="answer5" onclick="activateQuest(5)"><input type="radio" required  name="step5" value="Not Applicable"> Not Applicable</label> 
                                </div>
                            </li> 
                            <li class="row none" id="step6">
                                <div><p class="step-quest"><b class="mr-1">Step Six:</b> Have you got an income generating asset portfolio that brings an income equal to or more than your cost of living </p></div>
                                <div class="step-choice">
                                    <label for="" class="answer6" onclick="activateQuest(6)"><input type="radio" required  name="step6" value="Yes"> Yes</label> 
                                <label for="" class="answer6" onclick="activateQuest(6)"><input type="radio" required  name="step6" value="No"> No</label> 
                                </div>
                            </li>
                        
                            <li class="row none" id="step7">
                                <div><p class="step-quest"><b class="mr-1">Step Seven:</b>Like Warren Buffet & Bill Gates, have you successfully given away to charity or a cause you believe in an amount equal to or more than your cost of living in any particular year? </p></div>
                                <div class="step-choice">
                                    <label for="" class="answer7" onclick="activateQuest(7)"><input type="radio" required  name="step7" value="Yes"> Yes</label> 
                                <label for="" class="answer7" onclick="activateQuest(7)"><input type="radio" required  name="step7" value="No"> No</label> 
                                </div>
                            </li>
                            <li class="text-center none" id="submit">
                                <button type="submit" class="btn px-3 btn-pry">Submit </button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function activateQuest(step){
        step = parseInt(step); 
        let answers = document.querySelectorAll('.answer'+step),
            label = event.target, nexts = step +1,
            input = label.childNodes[0],
            nextstep = document.getElementById('step'+ nexts);

        for (let i = 0; i < answers.length; i++) {
            answers[i].classList.remove("bg-primary") ;
        }
        label.classList.add("bg-primary"); 
        input.checked = true; 
        // console.log(step, input.value, input.checked); 
        $("#step"+nexts).fadeIn(600); 
        if(nexts == 7) $("#submit").fadeIn(500); 
    }

    function registerNow(){
        $("#intro").hide();
        $("#authhead").hide();
        $("#register").fadeIn(500);
    }
</script>
@endsection

