@extends('layouts.guest')
@section('content')
    <div class="container-fluid">
        <div class="calc-card">
            <form method="POST" id="calc-form"  action="{{ route('store.calculator') }}">
                {{ csrf_field() }}
                <div class="tabs">
                    <div class="tab" id="tab1">
                        <div class="tab-header">
                            <div class="tab-title text-center">Cost of Living</div>
                            <span class="line-head"></span>
                        </div>
                        <div class="text-center">
                            <span for="">Total</span> <span id="totalexpenses" >$0</span>
                        </div>
                        <div class="tab-content">
                            
                            <div class="act tab-pane" id="step1">
                                <ul>
                                    <li>
                                        <label>How much is your monthly rent or mortgage?</label>
                                        <div class="errorTxt"></div>
                                        <span class="currency"> $</span> 
                                        <input type="number" oninput="calcTotalExpenses()" min="0" value="0" class="" name="mortgage" id="mortgage" required>
                                    </li>
                                    <li>
                                        <label>What is your total mobility cost (incl. car insurance, MOT, fuel e.t.c)?</label>
                                        <div class="errorTxt"></div>
                                        
                                        <span class="currency"> $</span> 
                                        <input type="number"  oninput="calcTotalExpenses()" min="0" value="0" class="" name="mobility" id="mobility" required>
                                    </li>
                                    <li style="list-style: none; display: inline">
                                        <button class="next-btn next-btn1 btn-block" type="button">Next</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane" id="step2">
                                <ul>
                                    <li>
                                        <label>How much is your monthly home expenses (incl. groceries, clothes insurances etc)?</label>
                                        <div class="errorTxt"></div>
                                     
                                        
                                        <span class="currency"> $</span> 
                                        <input type="number"  oninput="calcTotalExpenses()" min="0" value="0" class="" name="expenses" id="expenses" required>
                                    </li>
                                    <li>
                                        <label>How much is your monthly utility costs (incl. council tax, energy, tv, mobile e.t.c)?</label>
                                        <div class="errorTxt"></div>
                                        
                                        <span class="currency"> $</span> 
                                        <input type="number"  oninput="calcTotalExpenses()" min="0" value="0" class="" name="utility" id="utility" required>
                                    </li>
                                
                                    <li >
                                        <button class="prev-btn prev-btn1 btn-left" type="button">Prev</button>
                                        <button class="next-btn next-btn2 btn-right" type="button">Next</button>
                                        <br> <br>
                                    </li>
                                </ul>
                            </div> 
                            <div class="tab-pane" id="step3">
                                <ul>
                                    <li>
                                        <label>What is your monthly debt repayment cost (incl. credit cards, loan, hire purchase etc)? </label>
                                        <div class="errorTxt"></div>
                                        
                                        <span class="currency"> $</span> 
                                        <input type="number"  oninput="calcTotalExpenses()" min="0" value="0" name="dept_pay" id="dept_pay">
                                    </li>
                                    <li>
                                        <button class="prev-btn prev-btn2 btn-left" type="button">Prev</button>
                                        <button class="save-btn btn-right" type="button">Save</button>
                                        <br> <br>
                                    </li>
                                </ul>
                            </div>
                        </div> 
                        <div>
                            <div class="progress-wrap">
                                <div class="line-progress-bar">
                                    <div class="line"></div>
                                    <ul class="checkout-bar">
                                        <li class="progressbar-dots active"><span>step 1</span></li>
                                        <li class="progressbar-dots"><span>step 2</span></li>
                                        <li class="progressbar-dots"><span>Final step</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="loader" style="display: none;">
                            <img src="//d2erq0e4xljvr7.cloudfront.net/assets/img/ring.svg">
                        </div>
                    </div>

                    <div class="tab" id="tab2">
                        <div class="tab-header">
                            <div class="tab-title text-center">Savings and Portfolio Income</div>
                            <span class="line-head"></span>
                        </div>
                        <div class="text-center">
                            <span for="">Total</span> <span id="total-savings" >$0</span>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane tp" >
                                <ul>
                                    <li>
                                        <label>How much regular income do you earn from sources (assets) other than your wages?</label>
                                        <div class="errorTxt"></div>
                                        
                                        <span class="currency"> $</span> 
                                        <input type="number"  oninput="calcTotalSavings()" min="0" value="0" class="" name="income" id="income" required>
                                    </li>
                                    <li> 
                                        <label>How much do you have in savings for rainy day? </label>
                                        <div class="errorTxt"></div>
                                        
                                        <span class="currency"> $</span> 
                                        <input type="number"  oninput="calcTotalSavings()" min="0" value="0" class="" name="extra" id="extra" required>
                                    </li>
                                    <li style="list-style: none; display: inline">
                                        <button class="next-btn btn-block" type="submit">See Result</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div> 
    </div>
<script>
$(".next-btn1").click(function() {
      $(".tab-pane").hide();
      $("#step2").fadeIn(500);
      $('.progressbar-dots').removeClass('active');
      $('.progressbar-dots:nth-child(2)').addClass('active');
 });
$(".next-btn2").click(function() {
      $(".tab-pane").hide();
      $("#step3").fadeIn(500);
      $('.progressbar-dots').removeClass('active');
      $('.progressbar-dots:nth-child(3)').addClass('active');
});
 
$(".prev-btn1").click(function() {
      $(".tab-pane").hide();
      $("#step1").fadeIn(500);
      $('.progressbar-dots').removeClass('active');
      $('.progressbar-dots:nth-child(1)').addClass('active');
 });
 $(".prev-btn2").click(function() {
      $(".tab-pane").hide();
      $("#step2").fadeIn(500);
      $('.progressbar-dots').removeClass('active');
      $('.progressbar-dots:nth-child(2)').addClass('active');
 });

$(".save-btn").click(function() {
    //   if (v.form()) {
    $("#tab1").hide();
    $("#tab2").fadeIn(500);
    $("#tab2").addClass('tp');
});

// var 
function calcTotalExpenses(){
    let totalexpenses = document.getElementById('totalexpenses'),
        expenses = document.getElementById('expenses').value,
        mortgage = document.getElementById('mortgage').value,
        mobility = document.getElementById('mobility').value,
        utility = document.getElementById('utility').value,
        dept_pay = document.getElementById('dept_pay').value;

    var total = +expenses + +mortgage + +mobility + +utility + +dept_pay;
    totalexpenses.textContent = '$'+total;
}

function calcTotalSavings(){ 
    let totalsavings = document.getElementById('total-savings'),
        extra = document.getElementById('extra').value,
        income = document.getElementById('income').value; 

    let total = +extra + +income;
    totalsavings.textContent =  '$'+total;   
}
</script>
@endsection
<div class="tab-content">
        <div class="tab-pane">
            <ul>
                <li>
                    <label>Monthly Asset Portfolio Income (APi) needed</label>
                    <div class="errorTxt"></div>
                    <input type="number" disabled min="0" value="{{ $cost }}" class="" name="cost" id="cost" required>
                </li>
                <li>
                    <label>What is your expected Return on Capital Employed (ROCE)?</label>
                    <div class="errorTxt"></div>
                    <input type="number" min="0" max="100" value="0" class="" name="roce" id="roce" required>
                </li>
                <li>
                    <button class="save-btn" type="submit">Recommend</button>
                </li>
            </ul>
        </div>
    </div>