
@extends('layouts.user')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 my-4">
            <div class="d-flex">  
                <span class="mr-3 pb-2" id="goback">
                    <a href="#" class="text-dark" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i> Back</a>
                </span>
                <span class="mx-auto text-center">
                    {{ date('F')}} {{ date('Y')}}
                </span>
            </div>
            <div class="summary-card">
                <div class="summary-header bg-gray">
                    <div class="summary-card-header seed-{{$seed}}">
                        <h4 class="summary-card-title">{{$seed}} Allocation Summary</h4>
                    </div>
                </div>
                <div class="summary-card-body">
                    <div class="list-group">
                        @foreach($allocations as $allocation)
                            <div class="list-group-item">
                                <div class="d-flex mt-2 mb-1">
                                    <span class="box-identify box-{{$seed}}"></span>
                                    <h5>{{ $allocation->label }}</h5>
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
            </div>
        </div>
    </div>

    <script>
          function handleAllocationEdit(e){
            console.log(e);
            let id = e.value;

            var url = `{{ route('seed.store.allocation')  }}`
            console.log( url+'/'+id)
            $.ajax({
                type: 'GET',
                url: '/home/seed/allocate/'+id,
                success: function(data, status){
                    let allocation = data.data;
                    if(allocation){
                        $('#edit_allocation').attr('action', url+'/'+id)
                        $('span.seed_category').html(allocation.seed_category);
                        $('#edit_label').val(allocation.label)
                        $('#edit_amount').val(allocation.amount)
                        $('#edit_note').val(allocation.note)
                        $('#editAssetAllocationModal').modal('show');
                    }
                },
                error: function (request, status, error) {
                    // console.log(status, error)
                    // alert(request.responseText);
                }
            });
        }
    </script>

@endsection

