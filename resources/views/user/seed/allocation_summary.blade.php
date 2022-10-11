
@extends('layouts.user')

@section('content')
    @php
        function filterExpenditure($value){
            if($value == 'family'){
                $value = 'Home & Family';
            }else if ($value == 'debt_repayment') {
                $value = 'Debt Repayment';
            }else if($value){
            $value = ucfirst($value);
            }
            return $value;
        }
    @endphp
    <div class="row justify-content-center">
        <div class="col-12 my-4">
            <div class="d-flex">
                <span class="mr-3 pb-2" id="goback">
                    <a href="{{ str_contains(Request::path(), 'expenditure') ?  route('seed.summary', 'expenditure') : route('seed.create') }}"
                                class="text-dark" ><i class="fa fa-chevron-left mr-1"></i> Back</a>
                </span>
                <span class="mx-auto text-center">
                    {{ date('F')}} {{ date('Y')}}
                </span>
            </div>
            <div class="summary-card">
                <div class="summary-header bg-gray">
                    <div class="summary-card-header seed-{{$seed}}">
                        @if(isset($category))
                            <h4 class="summary-card-title">{{filterExpenditure($category)}}</h4>
                        @else
                            <h4 class="summary-card-title">{{$seed}} Allocation Summary</h4>
                        @endif
                    </div>
                </div>
                <div class="summary-card-body">
                    <div class="list-group">
                        @foreach($allocations as $allocation)
                            <div class="list-group-item" data-allocation="{{$allocation->id}}" onclick="handleAllocationView(this)">
                                <div class="d-flex mt-2 mb-1">
                                    <span class="box-identify box-{{$seed}}"></span>
                                    <h5> {{$allocation->label}}</h5>
                                    <h5 class="flex-end">{{$currency}}{{ number_format($allocation->amount, 2) }}</h5>
                                </div>
                                <div class="small mb-1 ff-rob" style="margin-left: 36px;">{{$currency}}{{ number_format($allocation->summary['summary']['total_left'],2) }} Balance</div>
                            </div>
                        @endforeach
                    </div>
                    @if($seed == 'savings')   <p class="my-3 ff-rob text-center" data-toggle="modal" data-target="#savingsAllocationModal" onclick="$('#savingsSummaryModal').modal('hide')">Add more</p> @endif
                    @if($seed == 'expenditure')   <p class="my-3 ff-rob text-center" data-toggle="modal" data-target="#expenditureAllocationModal" onclick="$('#savingsSummaryModal').modal('hide')">Add more</p> @endif
                    @if($seed == 'education')   <p class="my-3 ff-rob text-center" data-toggle="modal" data-target="#educationAllocationModal" onclick="$('#savingsSummaryModal').modal('hide')">Add more</p> @endif
                    @if($seed == 'discretionary')   <p class="my-3 ff-rob text-center" data-toggle="modal" data-target="#discretionaryAllocationModal" onclick="$('#savingsSummaryModal').modal('hide')">Add more</p> @endif
                </div>


                @include('user.seed.modals.savings_allocation')
                @include('user.seed.modals.education_allocation')
                @include('user.seed.modals.discretionary_allocation')
                @include('user.seed.modals.expenditure_allocation')

                @include('user.seed.modals.view_transactions')
                @include('user.seed.modals.view_allocation')
                @include('user.seed.modals.edit_allocation')
            </div>
        </div>
    </div>

    <script>
        var seed = {}, record = {},id;
        var url = `{{ route('seed.store.allocation')  }}`;
        var record_url = `{{ route('seed.add.record_spent')  }}`;

        function handleAllocationView(e){
            id = e.dataset.allocation;
            $('#deleteForm').attr('action', url+'/'+id)
            $.ajax({
                type: 'GET',
                url: '/home/seed/allocate/'+id,
                success: function(data, status){
                    seed = data.data;
                    if(seed){
                        $('#allocation_label').html(seed.allocated.label);
                        $('#allocation_note').html(seed.allocated.note)
                        $('.allocation_budget').html(seed.allocated.amount)
                        $('.allocation_balance').html(seed.summary.total_left)
                        $('.left_percentage').html(seed.summary.spent_percentage);
                        $('.progress-bar').css({'width': seed.summary.spent_percentage+'%'});
                        $('#viewAllocationModal').modal('show');
                    }
                },
                error: function (request, status, error) {
                    // console.log(status, error)
                    // alert(request.responseText);
                }
            });
        }

        function handleAllocationEdit(){
            if(seed){
                
                $('#edit_allocation').attr('action', url+'/'+seed.allocated.id)

                $('.seed_category').html(seed.allocated.seed_category);
                $('#edit_label').val(seed.allocated.label);
                $('#edit_amount').val(seed.allocated.amount);
                $('#edit_note').val(seed.allocated.note);
                $('#allocation_recurring').attr('checked', seed.allocated.recuring);
                // $('#edit_allocation').attr('action', url+'/'+id)
                // $('div.seed_category').html(allocation.label);
                // $('#edit_label').val(allocation.label)
                // $('#edit_amount').val(allocation.amount)
                // $('#edit_note').val(allocation.note)
                $('#editAssetAllocationModal').modal('show');
            }
        }

        function handleAllocationTransaction(){
            let record_spents = seed.record_spents,
                currency = "<?php echo $currency ?>"
                spent_list = $('#spent_list');
            spent_list.empty()

            $('#viewAllocationModal').modal('hide');
            $('#viewTransactionsModal').modal('show');

            $.each(record_spents, function(key1, records){
                let header =  $(`<div class="ml-3 mt-3"> ${(Object.keys(records)[0])}
                        <span class="float-right mr-3"> ${currency}${(Object.values(records)[key1]) ? (Object.values(records)[key1].total_amount).toFixed(2) : 0.00 } </span>
                    </div>`);
                // console.log(Object.values(records)[key1], header);

                spent_list.append(header)
                        //   .append(`<span class="float-right"> </span>`).text('2022');
                $.each(records[Object.keys(records)].list, function(key2, spent){
                    let row =   $(`<div  style="height:50px" data-record="${spent.id}"
                    class="list-group-item mb-2 bg-gray d-flex" onclick="handleRecordView(this)">
                        <span class="box-badge">${spent.label.charAt(0)}</span>
                        <p>  ${spent.label}  </p>
                        <p class="flex-end"> ${currency}${spent.amount}  </p>
                    </div>`)

                    spent_list.append(row);
                });
            });
        }

        function handleRecordView(e){
            let id = e.dataset.record;
            $('#viewTransactionsModal').modal('hide');
            $('#viewRecordDetailModal').modal('show');
            // console.log(e.dataset.record);

            $.ajax({
                type: 'GET',
                url: '/home/seed/record/'+id,
                success: function(data, status){
                    record = data.data;
                    $('.ico').text(record.label.charAt(0))
                    $('#record_label').text(record.label)
                    $('#record_amount').text((record.amount).toFixed(2))
                    $('#record_date').text(record.date)
                    $('#record_note').text(record.note)
                    $('#spent_current_month').text(record.spent_current_month);
                    $('#spent_last_month').text(record.spent_last_month);
                },
                error: function (request, status, error) {
                    // console.log(status, error)
                    // alert(request.responseText);
                }
            });
        }

        function handleUpdateRecord(){
            if(record){
                $('#edit_record_allocation').attr('action', record_url+'/'+record.id);
                $('#edit_record_label').val(record.label);
                $('#edit_record_amount').val(record.amount);
                $('#edit_record_note').val(record.note);
                $('#update_record_recurring').attr('checked', record.recuring);
                $('#editRecordDetailModal').modal('show');
                $('#viewRecordDetailModal').modal('hide');
                // if(record.reccurs)record_recursion
            }
        }
    </script>

@endsection

