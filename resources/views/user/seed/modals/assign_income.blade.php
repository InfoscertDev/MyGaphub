
<div class="modal fade" id="incomeAllocationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wd-c b-rad-20">
            <div class="modal-body">
                <div class="d-flex">
                    <div class="col allocateIncome" style="display: none">
                            <a onclick="goBack()" class="text-dark" >
                                <i class="fa fa-chevron-left mr-1"></i> Back
                            </a>
                    </div>
                    <button type="button" class="btn btn-sm btn-close  flex-end" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">X</span>
                    </button>
                </div>
                <div class="d-flex mt-3 mb-4">
                    <div class="col">
                        <h5 class="ff-rob"> Budget to assign {{$currency}}{{number_format($current_seed->budget_amount, 2) }} </h5>
                    </div>
                    <div class="col">
                        <h5 class="ff-rob text-right"> Balance to assigned {{$currency}}{{number_format(($current_seed->budget_amount - $total_assigned), 2)}} </h5>
                    </div>
                </div>

                <div id="previewIncome" class="px-4" >
                    <h5 class="text-underline bold">List of Income Accounts </h5>
                    <ul class="list-group list-group-flush cash-tiles list-toggled">
                        @foreach ($incomes as $key => $equ)
                            <li class="list-group-item my-1" onclick="manageAccount({{$key}})">
                                @if(isset($backgrounds[$key]))<span class="account_detail" style="background: {{$backgrounds[$key]}};"> </span> @endif
                                <span class="mr-2 bold">{{$equ->income_name }}:</span>
                                <span class="mr-2 bold">{{($equ->income_type == 'portfolio') ? 'Portolio' : 'Non Portfolio'}}:</span>
                                <span class="mr-2">{{$equ->currency}}{{ number_format($equ->amount, 2) }}</span>

                                <span class="pull-right">
                                    @if( $equ->assigned_income )
                                        <dov class="mr-4">
                                            <span class="px-3 py-1" style="background: #00B050;" >Assigned</span>
                                        </dov>
                                    @endif
                                    <i class="fa fa-chevron-right"></i>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                    <div class="text-center my-3">
                        <a  href="{{ route('360.income.list')  }}"   class="btn btn-pry px-2" > Add Account </a>
                    </div>
                </div>

                <div class="allocateIncome" style="display: none">
                    <div class="my-3 text-center">
                        <h5 id="income-title"></h5>
                    </div>
                    <form action="{{ route('seed.assign.income') }}" method="POST">
                        @csrf
                        <input type="hidden" id="seed_income" name="seed_income">

                        <div class="form-gorup row">
                            <div class="col"> <h5 class="bold">Income Period</h5> </div>
                            <div class="col"> <h5 class="bold"> Net Income</h5></div>
                            <div class="col-5"> <h5 class="bold">Assigned Income</h5> </div>
                        </div>
                        <div id="record-list-container">

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            let account = null;

            function manageAccount(index){
                let income = incomes[index];
                this.account = income;

                bindIncome(income)
                $('#previewIncome').hide()
                $('.allocateIncome').fadeIn(500)
            }

            function goBack(){
                $('.allocateIncome').hide()
                $('#previewIncome').fadeIn(500)
            }

            function bindIncome(income){
                $('#seed_income').val(income.id);
                let currency = income.income_currency.split(' ')[0]
                let summary = `${income.income_name} Average Income ${currency}${income.amount.toFixed(2)}`
                $('#income-title').text(summary);

                var recordList = document.getElementById('record-list-container');
                recordList.innerHTML = '';
                income.records.forEach(function(item) {
                    var div = document.createElement('div');
                    div.className = 'form-group row my-2';

                    if (item.isCurrent) {
                        div.innerHTML = `
                            <div class="col">  <span class="pl-3">${item.period}</span></div>
                            <div class="col">
                                <span class="pl-3">${currency}${item.net_income.toFixed(2)}</span>
                            </div>
                            <div class="col-5">
                                <div class="d-flex">
                                    <div class="input-group  col mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">${currency}</span>
                                        </div>
                                        <input type="number" step="any" disabled name="seed_budget" value="${item.seed_budget}" id="current" min="0" required class="bs-none form-control">
                                    </div>
                                    <div class="ml-2">
                                        <button type="button" class="btn btn-sm bg-none px-2" onclick="$('#current').prop('disabled', (i, v) => !v);">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="submit" class="btn btn-sm btn-pry">Submit</button>
                                    </div>
                                </div>
                            </div>
                        `;
                    }else {
                        div.innerHTML = `
                            <div class="col">  <span class="pl-3">${item.period}</span></div>
                            <div class="col">
                                <span class="pl-3">${currency}${item.net_income.toFixed(2)}</span>
                            </div>
                            <div class="col-5">
                                <span class="pl-3">${currency}${item.seed_budget.toFixed(2)}</span>
                            </div>
                        `;
                    }

                    recordList.appendChild(div);
                });
            }

        </script>
    </div>
</div>
