{{--  Asset --}}
<div class="modal fade" id="assetModalAccount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h2 class="text-center ff-rob">Add Account: Asset         
                        <button type="button" class="btn btn-sm btn-close  text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-white">X</span>
                        </button>
                    </h2>
                </div>
                <div class="my-5">
                    <div class="wd-7 mx-auto">
                    <a href="{{ route('portfolio', ['new' => 1]) }}" class="card-link"><button  type="button" class="btn btn-block py-2 btn-md my-3 brad elevation-1 btn-pry"> Add An Investment </button></a>
                         <button type="button" class="btn btn-block py-2 btn-md my-3 brad elevation-1 btn-pry" id="addEquity">Add Home Equity</button>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@include('user.360.modals.equity')

 
<script>
    $(function() {
        $('#addEquity').on('click', function (){
            $('#assetModalAccount').modal('hide');
            $(`#equityModalAccount`).modal('show');
        });
    })
</script>