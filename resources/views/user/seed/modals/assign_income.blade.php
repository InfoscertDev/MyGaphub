
<div class="modal fade" id="incomeAllocationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wd-c b-rad-20">
            <div class="modal-body">
                <div class="d-flex my-3 ">
                    <h4 class="ff-rob"> Balance to assign </h4>
                    <h4 class="ff-rob"> Assigned  </h4>
                    <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">X</span>
                    </button>
                </div>

                <div class="px-4">
                    <h5 class="text-underline bold">List of Income Accounts </h5>
                    <ul class="list-group list-group-flush cash-tiles list-toggled">
                        @foreach ($incomes as $key => $equ)
                            <li class="list-group-item my-1" onclick="editAccount({{$key}})">
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

                <div style="display: none">
                    <form action="{{ route('seed.store.allocation') }}" method="POST">
                        @csrf
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil totam sed quos, optio voluptate sequi velit tempora qui doloremque molestias temporibus inventore dolor commodi? Illum, odit suscipit. Officia, sequi rem?</p>
                    </form>
                </div>
            </div>
        </div>

        <script>

        </script>
    </div>
</div>
