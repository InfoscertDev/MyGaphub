
<div class="modal fade" id="incomeAllocationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wd-c b-rad-20">
            <div class="modal-body">
                <div class="col allocateIncome" style="display: none">
                        <a onclick="goBack()" class="text-dark" >
                            <i class="fa fa-chevron-left mr-1"></i> Back
                        </a>
                </div>
                <div class="d-flex mt-3 mb-4">
                    <div class="col">
                        <h5 class="ff-rob"> Budget to assign {{$currency}}{{number_format($current_seed->budget_amount, 2) }} </h5>
                    </div>
                    <div class="col">
                        <h5 class="ff-rob"> Balance to assign {{$currency}}{{number_format($current_seed->budget_amount, 2)}}
                            <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="text-white">X</span>
                            </button>
                        </h5>
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

                                <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                            </li>
                        @endforeach
                        @if(count($incomes) > 6)
                            <button class="list-toggle mx-auto btn-sm wd-5 btn px-2 bg-none mt-2">
                                <span class="expand text-underline">View More</span>
                                <span class="collapse text-underline">View Less</span>
                            </button>
                        @endif
                    </ul>
                </div>

                <div class="allocateIncome" style="display: none">
                    <div class="my-3 text-center">
                        <h5 id="income-title"></h5>
                    </div>
                    <form action="{{ route('seed.store.allocation') }}" method="POST">
                        @csrf
                        <div class="form-gorup row">
                            <div class="col"> <h5 class="bold">Income Period</h5> </div>
                            <div class="col"> <h5 class="bold"> Net Income</h5></div>
                            <div class="col-5"> <h5 class="bold">Assigned Income</h5> </div>
                        </div>

                        @for($i = 0; $i  < 1;  $i++)
                            <div class="form-gorup row my-2">
                                <div class="col">  <span class="pl-3">September 2023</span></div>
                                <div class="col">
                                    <span class="pl-3"> {{$currency}}{{ number_format(5000,2)  }}</span>
                                </div>
                                <div class="col-5">
                                    <div class="d-flex">
                                        <div class="input-group  col mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">{{ $currency }}</span>
                                            </div>
                                            <input type="text" disabled name="current" id="current" min="0" required  class="bs-none form-control">
                                        </div>
                                        <div class="ml-2">
                                            <button type="button" class="btn btn-sm bg-none px-2" onclick="$('#current').prop('disabled', (i, v) => !v);" >
                                                    <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-pry"> Submit </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor


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
                console.log(this.account);
                let currency = income.income_currency.split(' ')[0]
                let summary = `${income.income_name} Average Income ${currency}${income.amount.toFixed(2)}`
                $('#income-title').text(summary);
            }

        </script>
    </div>
</div>
