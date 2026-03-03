@extends('layouts.user')

@section('content')
    @include('user.360.modals.iLab')
    <style>
        .table-striped  tr:nth-of-type(even) {
            background-color: gray !important;
        }
    </style>  
    <div class="bg-whiteks row py-2" id=""> 
        <div>
            <span class="mx-3 pb-2" id="goback">
                <a href="#" class="text-dark bold" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i> Back</a>
            </span>
        </div> 
        <h2 class="text-center bold sm-fs-24 mx-auto">Play with Your iLAB Clock
            <div class="play_hr"></div> 
        </h2>
    </div>  
    <div class="my-4"> 
        <!-- <div class="ilab-vr"></div> --> 
        <div class="row mt-2">
            <div class="col-lab col-sm-12 sm-text-center mx-aut">
                <div class="d-block lab_right">
                    <h5 class="mb-5 wd-25 md-txt-right text-center">CURRENT POSITION: {{date('Y')}}   </h5>
                    <div class='lab_circle ml-3 sm-lt-30'>
                        <div class="lab_clock">
                            <h5 class="bold">12</h5>
                            <h5 class="bold">3</h5>
                            <h5 class="bold">6</h5>
                            <h5 class="bold">9</h5>
                        </div>
                        <div class="quarter quarter1">
                            <div class="contain">
                                <h4 class="ff-rob bold text-white mb-2 text-center">ASSET</h4>
                                <div class="quarter_list">
                                    <span class="d-block"><input type="checkbox" oninput="sumCurrentAsset()" id="add_investment" value="{{$current_ilab['investment']}}" checked>Investments</span>
                                    <span class="d-block"><input type="checkbox" oninput="sumCurrentAsset()" id="add_equity" value="{{$current_ilab['equity']}}" checked>Home Equity</span>
                                    <span class="d-block"><input type="checkbox" oninput="sumCurrentAsset()" id="add_savings" value="{{$current_ilab['savings']}}" checked>Cash</span>
                                </div>
                                <div class="total">
                                    <h6 class="text-white  b-round pl-1">{{$currency}} <span id="current_asset">{{ ($current_info['asset'])}}</span>  <h6>
                                </div> 
                            </div>
                        </div> 
                        <div class="quarter quarter2"> 
                            <div class="contain">
                                <h4 class="ff-rob bold text-white mb-2 ">LIABILITY</h4>
                                <div class="quarter_list">
                                    <span class="d-block"><input type="checkbox" oninput="sumCurrentLiabity()" id="add_credit" value="{{$current_ilab['credit']}}" checked>Credit</span>
                                    <span class="d-block"><input type="checkbox" oninput="sumCurrentLiabity()" id="add_mortgage" value="{{$current_ilab['mortgage']}}" checked>Mortgage</span>
                                </div>
                                <div class="total"> 
                                    <h6 class="text-white  b-round pl-1">{{$currency}}<span id="current_liability">{{ ($current_info['liabilities'])}}</span> </h6>                                            </div> 
                            </div>
                        </div>
                        <div class="quarter quarter3">
                            <div class="contain">
                                <h4 class="ff-rob bold text-white mb-2 text-center">INCOME</h4>
                                <div class="quarter_list">
                                    <span class="d-block"><input type="checkbox" oninput="sumCurrentIncome()" id="add_non_portfolio" value="{{$current_ilab['non_portfolio']}}" checked>Non-Portfolio</span>
                                    <span class="d-block"><input type="checkbox" oninput="sumCurrentIncome()" id="add_portfolio" value="{{$current_ilab['portfolio']}}" checked>Portfolio</span>
                                </div>
                                <div class="total"> 
                                    <h6 class="text-white  b-round pl-1">{{$currency}}<span id="current_income">{{ ($current_info['income'])}}</span> </h6>
                                </div> 
                            </div>
                        </div> 
                        <div class="quarter quarter4">
                            <div class="contain">
                                <h4 class="ff-rob bold text-white mb-2 text-center">BUDGET</h4>
                                <div class="quarter_list">
                                    <span class="d-block"><input type="checkbox" oninput="sumCurrentBudget()" id="add_periodic_savings" value="{{$current_ilab['periodic_saving']}}" checked>Saving Periodic</span>
                                    <span class="d-block"><input type="checkbox" oninput="sumCurrentBudget()" id="add_education" value="{{$current_ilab['education']}}" checked>Education</span>
                                    <span class="d-block"><input type="checkbox" oninput="sumCurrentBudget()" id="add_expenditure" value="{{$current_ilab['expenditure']}}" checked>Expenditure</span>
                                    <span class="d-block"><input type="checkbox" oninput="sumCurrentBudget()" id="add_discretionary" value="{{$current_ilab['discretionary']}}" checked>Discretionary</span>
                                </div>
                                <div class="total">
                                    <h6 class="text-white  b-round pl-1">{{$currency}} <span id="current_budget"> {{ ($current_info['budget'])}}</span> </h6>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
            <div class="col-gap sm-mt-4">
                <div class="d-block middle mx-auto mt-5 sm-mt-4">
                    <h5 class="text-center text-underline bold d-block">GAP ANALYSIS</h5>
                    <table class="table table-striped table-bordered">
                        <tr class="text-white text-center thead-dark">
                            <th>iLAB</th> <th>Diffrence</th> 
                        </tr>
                        @php
                          $non_income =  $current_ilab['non_portfolio'] - $ilab->non_portfolio;
                          $income_diff = $current_ilab['portfolio'] - $ilab->asset_portfolio;
                          $asset_dif = $current_info['asset'] - $target_info['asset'] ;
                          $liabilities_dif = $target_info['liabilities'] -  $current_info['liabilities'] ;
                          $budget_dif = $target_info['budget'] - $current_info['budget'];
                        //   $income_dif = $current_info['income'] - $target_info['income'];
                        @endphp
                        <tr>
                            <td style="background: #DBDBD9;">INCOME (NPi)</td> <td class="{{ ($non_income > 0) ? 'ilab_pos' : 'ilab_neg'}}" id="npi_class">{{$currency}} <span id="npi_total">{{ ($non_income) }}</span> </td>
                        </tr>
                        <tr>  
                            <td style="">INCOME (APi)</td> <td class="{{ ($income_diff > 0) ? 'ilab_pos' : 'ilab_neg'}}" id="api_class">{{$currency}} <span id="api_total">{{ ($income_diff) }}</span> </td>
                        </tr>
                        <tr>
                            <td style="background: #DBDBD9;">LIABILITIES</td> <td  id="liability_class" class="{{ ($liabilities_dif > 0) ? 'ilab_pos' : 'ilab_neg'}}">{{$currency}} <span id="liability_total"> {{ ($liabilities_dif) }}</span></td>
                        </tr>
                        <tr>
                            <td style="">ASSET</td> <td id="asset_class" class="{{ ($asset_dif > 0) ? 'ilab_pos' : 'ilab_neg'}}">{{$currency}}<span id="asset_total">{{ ($asset_dif) }}</span> </td>
                        </tr>
                        <tr>
                            <td style="background: #DBDBD9;">BUDGET</td> <td id="budget_class" class="{{ ($budget_dif > 0) ? 'ilab_pos' : 'ilab_neg'}}">{{$currency}} <span id="budget_total">{{ ($budget_dif) }}</span> </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lab col-sm-12 sm-text-center mx-aut">
                <h5 class="mb-5 tag-text wd-25 text-center">TARGET POSITION: {{date('Y')+1}}             </h5>
                <div class="d-block lab_left" >
                    <div class='lab_circle ml-3'>
                        <div class="lab_clock"> 
                            <h5 class="bold">12</h5>
                            <h5 class="bold">3</h5>
                            <h5 class="bold">6</h5>
                            <h5 class="bold">9</h5>
                        </div>
                        <div class="quarter quarter1">
                            <div class="contain">
                                <h4 class="ff-rob bold text-white mb-2 text-center">ASSET</h4>
                                <div class="quarter_list">
                                    <span class="d-block"><input type="checkbox" oninput="sumTargetAsset()" id="tag_investment" value="{{$ilab->investment}}" checked>Investments</span>
                                    <span class="d-block"><input type="checkbox" oninput="sumTargetAsset()" id="tag_equity" value="{{$ilab->equity}}" checked>Home Equity</span>
                                    <span class="d-block"><input type="checkbox" oninput="sumTargetAsset()" id="tag_savings" value="{{$ilab->savings}}" checked>Cash</span>
                                </div>
                                <div class="total">
                                    <h6 class="text-white  b-round pl-1">{{$currency}}<span id="target_asset">{{ ($target_info['asset'])}}</span> <h6>
                                </div> 
                            </div>
                        </div> 
                        <div class="quarter quarter2">
                            <div class="contain">
                                <h4 class="ff-rob bold text-white mb-2 ">LIABILITY</h4>
                                <div class="quarter_list">
                                    <span class="d-block"><input type="checkbox" oninput="sumTargetLiabity()" id="tag_credit" value="{{$ilab->credit}}" checked>Credit</span>
                                    <span class="d-block"><input type="checkbox" oninput="sumTargetLiabity()" id="tag_mortgage" value="{{$ilab->mortgage}}" checked>Mortgage</span>
                                </div>
                                <div class="total"> 
                                    <h6 class="text-white  b-round pl-1">{{$currency}} <span id="target_liability">{{ ($target_info['liabilities'])}}</span>  </h6>                                            </div> 
                            </div>
                        </div>
                        <div class="quarter quarter3">
                            <div class="contain">
                                <h4 class="ff-rob bold text-white mb-2 text-center">INCOME</h4>
                                <div class="quarter_list">
                                    <span class="d-block"><input type="checkbox" oninput="sumTargetIncome()" id="tag_non_portfolio" value="{{$ilab->non_portfolio}}" checked>Non-Portfolio</span>
                                    <span class="d-block"><input type="checkbox" oninput="sumTargetIncome()" id="tag_portfolio" value="{{$ilab->asset_portfolio}}" checked>Portfolio</span>
                                </div>
                                <div class="total">
                                    <h6 class="text-white  b-round pl-1">{{$currency}}<span id="target_income">{{ ($target_info['income'])}}</span> </h6>
                                </div> 
                            </div>
                        </div>
                        <div class="quarter quarter4">
                            <div class="contain">
                                <h4 class="ff-rob bold text-white mb-2 text-center">BUDGET</h4>
                                <div class="quarter_list">
                                    <span class="d-block"><input type="checkbox" oninput="sumTargetBudget()" id="tag_periodic_savings" value="{{$ilab->periodic_savings}}" checked>Saving Periodic</span>
                                    <span class="d-block"><input type="checkbox" oninput="sumTargetBudget()" id="tag_education" value="{{$ilab->education}}" checked>Education</span>
                                    <span class="d-block"><input type="checkbox" oninput="sumTargetBudget()" id="tag_expenditure" value="{{$ilab->expenditure}}" checked>Expenditure</span>
                                    <span class="d-block"><input type="checkbox" oninput="sumTargetBudget()" id="tag_discretionary" value="{{$ilab->discretionary}}" checked>Discretionary</span>
                                </div>
                                <div class="total">
                                    <h6 class="text-white  b-round pl-1">{{$currency}}<span id="target_budget">{{ ($target_info['budget'])}} </span> </h6>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mx-auto mt-5">
                    <button class="btn btn-pry px-2" id="edit_target" data-toggle="modal" data-target="#iLabModal"> 
                        {{($target_info['budget'] + $target_info['income'] + $target_info['asset'] + $target_info['liabilities'] == 0) ? 'Set Target' : 'Edit Target'}}
                    </button>
                </div>
            </div>
        </div>
        
    </div>
    <script>
        function sumCurrentAsset(){
            var investment = document.getElementById('add_investment'),
                equity = document.getElementById('add_equity'),
                savings = document.getElementById('add_savings');
            var current_asset = document.getElementById('current_asset');
            var sum = 0; 
            if(investment.checked) sum += +investment.value;
            if(equity.checked) sum += +equity.value;
            if(savings.checked) sum += parseInt(savings.value); 
            this.gapAnalysis('asset'); 
            current_asset.textContent = sum.toLocaleString();
        }
        function sumCurrentLiabity(){
            var credit = document.getElementById('add_credit'),
                mortgage = document.getElementById('add_mortgage');
            var current_asset = document.getElementById('current_liability');
            var sum = 0;
            if(credit.checked) sum += +credit.value;
            if(mortgage.checked) sum += +mortgage.value;
            current_asset.textContent = sum.toLocaleString();
            this.gapAnalysis('liability');
        } 
        function sumCurrentIncome(){
            var portfolio = document.getElementById('add_portfolio'),
                non_portfolio = document.getElementById('add_non_portfolio');
            var current_asset = document.getElementById('current_income');
            var sum = 0;
            if(portfolio.checked) sum += +portfolio.value;
            if(non_portfolio.checked) sum += +non_portfolio.value;
            current_asset.textContent = sum.toLocaleString();
            this.gapAnalysis('income');
        }
        function sumCurrentBudget(){
            var periodic_savings = document.getElementById('add_periodic_savings'),
                education = document.getElementById('add_education'),
                expenditure = document.getElementById('add_expenditure'),
                discretionary = document.getElementById('add_discretionary');
            var current_asset = document.getElementById('current_budget');
            var sum = 0;
            if(periodic_savings.checked) sum += +periodic_savings.value;
            if(education.checked) sum += +education.value;
            if(expenditure.checked) sum += +expenditure.value;
            if(discretionary.checked) sum += +discretionary.value;
            current_asset.textContent = sum.toLocaleString();
            this.gapAnalysis('budget');
        }
        function sumTargetAsset(){
            var investment = document.getElementById('tag_investment'),
                equity = document.getElementById('tag_equity'),
                savings = document.getElementById('tag_savings');
            var current_asset = document.getElementById('target_asset');
            var sum = 0;
            if(investment.checked) sum += +investment.value;
            if(equity.checked) sum += +equity.value;
            if(savings.checked) sum += +savings.value;
            current_asset.textContent = sum.toLocaleString();
            this.gapAnalysis('asset');
        }
        function sumTargetLiabity(){
            var credit = document.getElementById('tag_credit'),
                mortgage = document.getElementById('tag_mortgage');
            var current_asset = document.getElementById('target_liability');
            var sum = 0;
            if(credit.checked) sum += +credit.value;
            if(mortgage.checked) sum += +mortgage.value;
            current_asset.textContent = sum.toLocaleString();
            this.gapAnalysis('liability');
        }
        function sumTargetIncome(){
            var portfolio = document.getElementById('tag_portfolio'),
                non_portfolio = document.getElementById('tag_non_portfolio');
            var current_asset = document.getElementById('target_income');
            var sum = 0;
            if(portfolio.checked) sum += +portfolio.value;
            if(non_portfolio.checked) sum += +non_portfolio.value;
            current_asset.textContent = sum.toLocaleString();
            this.gapAnalysis('income');
        }
        function sumTargetBudget(){
            var periodic_savings = document.getElementById('tag_periodic_savings'),
                education = document.getElementById('tag_education'),
                expenditure = document.getElementById('tag_expenditure'),
                discretionary = document.getElementById('tag_discretionary');
            var current_asset = document.getElementById('target_budget');
            var sum = 0;
            if(periodic_savings.checked) sum += +periodic_savings.value;
            if(education.checked) sum += +education.value;
            if(expenditure.checked) sum += +expenditure.value;
            if(discretionary.checked) sum += +discretionary.value;
            current_asset.textContent = sum.toLocaleString();
            this.gapAnalysis('budget');
        }
        function gapAnalysis(name){
            // console.log("GAP Analysis Runnning");
            let npi_total = document.getElementById('npi_total'),
                api_total = document.getElementById('api_total'),
                liability_total = document.getElementById('liability_total'),
                asset_total = document.getElementById('asset_total'),
                budget_total = document.getElementById('budget_total');
            setTimeout(()=> {
                if(name == 'asset'){  this.asset_diff() }
                if(name == 'liability'){ this.liability_diff() }
                if(name == 'budget'){ this.budget_diff() }
                if(name == 'income'){ this.income_diff() }
            }, 500);
          
        } 
        sumCurrentAsset(); sumTargetAsset();
        sumCurrentLiabity();  sumTargetLiabity();
        sumCurrentIncome();  sumTargetIncome();
        sumCurrentBudget(); sumTargetBudget();
       
        function asset_diff(){
            let asset_class = $('#asset_class');
            var current_asset = document.getElementById('current_asset').textContent,
                target_asset = document.getElementById('target_asset').textContent; 
            current_asset = current_asset.replace(/\D/g,'');
            target_asset = target_asset.replace(/\D/g,'');
            var diff = parseFloat(current_asset) - parseFloat(target_asset);
            
            if(diff > 0){
                asset_class.addClass('ilab_pos');asset_class.removeClass('ilab_neg');
            }else{
                asset_class.removeClass('ilab_pos'); asset_class.addClass('ilab_neg');
            }
            asset_total.textContent = parseInt(diff).toLocaleString();
        }
        function liability_diff(){
            let liability_class = $('#liability_class');
            var current_liability = document.getElementById('current_liability').textContent,
                target_liability = document.getElementById('target_liability').textContent; 
            current_liability = current_liability.replace(/\D/g,'');
            target_liability = target_liability.replace(/\D/g,'');
            var diff = parseFloat(target_liability) - parseFloat(current_liability) ;
            
            if(diff > 0){ 
                liability_class.addClass('ilab_pos');liability_class.removeClass('ilab_neg');
            }else{ 
                liability_class.addClass('ilab_neg');liability_class.removeClass('ilab_pos');
            }
            liability_total.textContent = parseInt(diff).toLocaleString();
        }
        function budget_diff(){
            let budget_class = $('#budget_class');
            var current_budget = document.getElementById('current_budget').textContent,
                target_budget = document.getElementById('target_budget').textContent; 
            current_budget = current_budget.replace(/\D/g,'');
            target_budget = target_budget.replace(/\D/g,'');
            var diff =  parseFloat(target_budget) - parseFloat(current_budget) ;
            
            if(diff > 0){
                budget_class.addClass('ilab_pos');budget_class.removeClass('ilab_neg');
            }else{
                budget_class.addClass('ilab_neg');budget_class.removeClass('ilab_pos');
            }
            budget_total.textContent = parseInt(diff).toLocaleString();
        }
        function income_diff(){
            let npi_class = $('#npi_class'),
                api_class = $('#api_class');
            var cur_portfolio = document.getElementById('add_non_portfolio'),
                cur_non_portfolio = document.getElementById('add_portfolio'),
                tag_portfolio = document.getElementById('tag_non_portfolio'),
                tag_non_portfolio = document.getElementById('tag_portfolio');
            var npi_total = document.getElementById('npi_total'),
                api_total = document.getElementById('api_total');
            
            var tag_portfolio_val = (!tag_portfolio.checked) ? 0 : tag_portfolio.value,
                tag_non_portfolio_val = (!tag_non_portfolio.checked) ? 0 : tag_non_portfolio.value,
                cur_portfolio_val = (!cur_portfolio.checked) ? 0 : cur_portfolio.value,
                cur_non_portfolio_val = (!cur_non_portfolio.checked) ? 0 : cur_non_portfolio.value;
            
            
            var npi_diff =  parseFloat(cur_non_portfolio_val) - parseFloat(tag_non_portfolio_val) ;
            var api_diff =  parseFloat(cur_portfolio_val) - parseFloat(tag_portfolio_val) ;
            
            if(npi_diff > 0){
                npi_class.addClass('ilab_pos');npi_class.removeClass('ilab_neg');
            }else{
                npi_class.addClass('ilab_neg');npi_class.removeClass('ilab_pos');
            }
            npi_total.textContent = parseInt(npi_diff).toLocaleString();
            if(api_diff > 0){
                api_class.addClass('ilab_pos');api_class.removeClass('ilab_neg');
            }else{
                api_class.addClass('ilab_neg');api_class.removeClass('ilab_pos');
            }
            api_total.textContent = parseInt(api_diff).toLocaleString();
            
        }
    </script>
@endsection