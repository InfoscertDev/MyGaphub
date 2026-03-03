@extends('layouts.guest')

@section('header')
  @include('inc.calculatorheader')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="gap-intro mt-3 text-center gap-center-sm">
          {{-- <p>Ready to see how close you are to becoming financially independent?</p> --}}
          <p>To calculate your Financial Independence status, 
            compute your cost of living and provide figures for your savings & portfolio income below</p>
          {{-- <span class="btn btn-pry px-3 py-1"> CALCULATE</span>  --}}
          {{-- <p>
            <span class="smaller">Result will be displayed in both Time & Percentage</span>
          </p> --}}
        </div>
        <div class="gap-card pb-0">
            <div class="gap-card-header">
                <div class="gap-card-title txt-primary text-center">Financial Independence Calculator                </div>
            </div>
            <span class="">
                <span id="costError" class="d-block my-2 pl-4 text-danger wd-8"></span>
            </span>
            <form method="POST" id="calc-form"  action="{{ route('store.calculator') }}">
                {{ csrf_field() }}
                <div id="accordion">
                    <div class="card">
                        <div class="accord-header" id="headingOne">
                          <div class="wd-f">
                              <span class="gap-card-title accord-title">Cost Of Living</span>
                              <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-chevron-down"></i>
                              </button> 
                          </div>
                        </div>
                  
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body pb-1">
                            <div class="form-sheet">
                              <div class="sheet-intro">
                                <p>To calculate your Financial Independence status, compute your cost of living and provide
                                  figures for your savings & portfolio income.</p>
                                <p>Open the ‘Cost of Living’ bar to commence the calculation.</p>
                              </div>
                              <ul class="lists">
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">Choose your prefered currency</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <select name="currency" id="currency" value="{{ $currency }}" onchange="chooseCurrency()" class="form-control" id="">
                                        @foreach ($currencies as $current)
                                            @if ($currency == $current)
                                            <option value="{{ $current }}" selected>{{ $current }}</option>
                                            @else
                                              <option value="{{ $current }}">{{ $current }}</option>
                                            @endif
                                        @endforeach
                                      </select>
                                    </div> 
                                  </div>
                                </li>
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">How much is your monthly rent or mortgage?</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <label for="" class="price-currency"></label>
                                      <input type="number"  onblur="calcTotalExpenses()" oninput="calcTotalExpenses()" onfocus="focalPoint(this)" value="{{ $calculator->mortgage }}" min="0" class="" name="mortgage" id="mortgage" required>
                                      <span class="min-total" id="mortgage-total">Total 0</span>
                                    </div> 
                                  </div>
                                </li>
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">What is your total mobility cost (incl. Car insurance, MOT, fuel e.t.c)?</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <label for="" class="price-currency"></label>
                                      <input type="number"  onblur="calcTotalExpenses()" oninput="calcTotalExpenses()" onfocus="focalPoint(this)" value="{{ $calculator->mobility }}" min="0" class="" name="mobility" id="mobility" required>
                                      <span class="min-total" id="mobility-total">Total 0</span>
                                    </div> 
                                  </div>
                                </li>
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">How much is your monthly home expenses (incl. groceries, clothes, insurances etc)?</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <label for="" class="price-currency"></label>
                                      <input type="number"  onblur="calcTotalExpenses()" oninput="calcTotalExpenses()" onfocus="focalPoint(this)" value="{{ $calculator->expenses }}" min="0" class="" name="expenses" id="expenses" required>
                                      <span class="min-total" id="expenses-total">Total 0</span>
                                    </div> 
                                  </div>
                                </li>
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">How much is your monthly utility costs
                                      (incl. council tax, energy, tv, mobile etc)?</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <label for="" class="price-currency"></label>
                                      <input type="number"  onblur="calcTotalExpenses()" oninput="calcTotalExpenses()" onfocus="focalPoint(this)" value="{{ $calculator->utility }}" min="0" class="" name="utility" id="utility" required>
                                      <span class="min-total" id="utility-total">Total 0</span>
                                    </div> 
                                  </div>
                                </li>
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">What is your monthly debt repayment cost (incl. credit cards, loan, hire purchase etc)?</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <label for="" class="price-currency"></label>
                                      <input type="number"  onblur="calcTotalExpenses()" oninput="calcTotalExpenses()" onfocus="focalPoint(this)" value="{{ $calculator->dept_repay }}" min="0" class="" name="dept_pay" id="dept_pay" required>
                                      <span class="min-total col-total" id="col-total">Total 0</span>
                                    </div> 
                                  </div>
                                </li>
                                <li class="details">
                                  <div class="detail-left">
                                    <h4 class="detail-title">Total Monthly Expenditure:</h4>
                                    <span class="detail-subtitle">This is the TARGET income for your Asset Portfolio income</span>
                                  </div>
                                  <div class="detail-right">
                                    <div class="simp-box">
                                      {{-- <div> Total</div> --}}
                                      <h4 class="col-total py-1" id="col-total2">0</h4>
                                    </div>
                                  </div>
                                </li>
                                <li class="see-result mt-3">
                                  <button id="next" disabled class="btn btn-pry px-3" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" 
                                  aria-controls="collapseTwo">Continue</button>
                                </li>
                              </ul>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="accord-header last" id="headingOne">
                        <div class="wd-f">
                            <span class="gap-card-title accord-title">Savings and Portfolio Income</span>
                            <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                              <i class="fa fa-chevron-down"></i>
                            </button> 
                        </div>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body pb-1">
                          <div class="form-sheet tp-n1">
                            <ul class="lists">
                              <li class="row mx-0 bg-white">
                                <div class="col-md-8">
                                  <label for="">How much regular income do you earn from sources
                                    (assets) other than your wages?</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="price-wrap">
                                    <label for="" class="price-currency"></label>
                                    <input type="number" value="{{ $calculator->other_income }}" onfocus="focalPoint(this)"  min="0" class="" name="income" id="income" required>
                                  </div> 
                                </div>  
                              </li>
                              <li class="row mx-0 bg-white">
                                <div class="col-md-8">
                                  <label for="">How much do you have in savings for rainy day?</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="price-wrap">
                                    <label for="" class="price-currency"></label>
                                    <input type="number" value="{{ $calculator->extra_save }}" onfocus="focalPoint(this)"  min="0" class="" name="extra" id="extra" required>
                                  </div> 
                                </div>
                              </li> 
                              <li class="see-result mt-3">
                                <button class="btn btn-pry px-3" type="submit"> See Result </button>
                              </li>
                            </ul> 
                            <p class="text-center">
                              <span class="smaller">Result will be displayed in both Time & Percentage</span>
                            </p>
                        </div>
                      </div>
                    </div>
                </div>
            </form>
        </div> 
    </div>
<script>
// var 

function calcTotalExpenses(){
    let currency = document.getElementById('currency').value;
    if(currency) currency = currency.split(' ');
    // Properties
    let mobility_total = document.getElementById('mobility-total'),
        mortgage_total = document.getElementById('mortgage-total'),
        utility_total = document.getElementById('utility-total'),
        expenses_total = document.getElementById('expenses-total'),
        col_total = document.getElementById('col-total'),
        col_total2 = document.getElementById('col-total2');

    // Values
    let expenses = document.getElementById('expenses').value,
        mortgage = document.getElementById('mortgage').value,
        mobility = document.getElementById('mobility').value,
        utility = document.getElementById('utility').value,
        dept_pay = document.getElementById('dept_pay').value;

    // Error
    let costError = document.getElementById('costError'),
        next = document.getElementById('next');

    if(total > 10){
      next.disabled = false;
    }else{ 
      next.disabled = true;
    }

    if( expenses === "" || mortgage === '' ||  mobility === '' || utility === '' || dept_pay === ''){
      costError.textContent = 'All fields are required';
      next.disabled = true;
    }else{
      next.disabled = false;
      costError.textContent = '';
    }

    var total = +expenses + +mortgage + +mobility + +utility + +dept_pay,
        mobtotal = +mortgage + +mobility, 
        exptotal = +mortgage + +mobility + +expenses,
        utitotal = +mortgage + +mobility + +expenses + +utility;

    mortgage_total.textContent = 'Total '+ currency[0] + mortgage; 
    mobility_total.textContent = 'Total '+ currency[0] + mobtotal;
    expenses_total.textContent = 'Total '+ currency[0] + exptotal;
    utility_total.textContent = 'Total '+ currency[0] + utitotal;
    col_total.textContent = 'Total '+ currency[0] +total;
    col_total2.textContent = currency[0]+total;
} 

function calcTotalSavings(){ 
    let totalsavings = document.getElementById('total-savings'),
        extra = document.getElementById('extra').value,
        income = document.getElementById('income').value; 

    let total = +extra + +income;
    totalsavings.textContent =  currency+total;   
}

function chooseCurrency(){
   let currency = document.getElementById('currency').value,
       prices = document.getElementsByClassName('price-currency');
   if (currency) {
      let cur = currency.split(' ');
      // console.log();
      for (let i = 0; i < prices.length; i++) {
        // prices[i].textContent = cur[0];
        prices[i].innerHTML = cur[0];
      } 
   }
   calcTotalExpenses();
}

chooseCurrency();
</script>
@endsection