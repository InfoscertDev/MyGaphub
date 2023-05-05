{{--  Asset --}}
<div class="modal fade" id="newPortfolioAssetModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <h3 class="text-center mb-4">Provide your asset details </h3>
                    <div class="mx-5 mt-3">
                        <ul class="list-group list-group-flush cash-tiles portfolio-tiles">
                            <li class="list-group-item my-2 text-center" id="addAsset">Manually </li>
                            <li class="btn list-group-item my-2 text-center disabled" >
                              Automatic(Coming Soon)
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#addAsset').on('click', function (e){
                $('#asset_class').text(asset_cat);
                $('#ioaosjws9jdixnisjkxnnisjxbn').val(asset_cat);
                var portfolio_type = document.getElementById('portfolio_type');
                if(asset_cat){
                    var assets_types = window[`${asset_cat}`];
                    $('#newPortfolioAssetModal').modal('hide');
                    $(`#portfolioAssetFormModal`).modal('show');
                    $('#portfolio_type').empty();
                    assets_types.forEach(element => {
                        $('#portfolio_type').append($(`<option value="${element.id}">${element.name}</option>`));
                        // portfolio_type.appendChild(`<option value="${element.id}">${element.name}</option>`);
                    });
                    // $(`#confirmAssetCreationModal`).modal('show');
                }
            });
        })
    </script>
</div>

<div class="modal fade" id="portfolioAssetFormModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wd-cf b-rad-20 bg-portfolio">
            <div class="modal-header br-none">
                <h5 class="fs-sm-13 wd-f mt-1 text-center bold">
                    Provide answers to the following questions for your <span id="asset_class"></span>  asset
                    <button type="button" class="close text-right txt-primary"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <span class="primary-hr mt-3 mx-auto"></span>
                </h5>
            </div>
            <div class="modal-body px-0 mx-0 pb-0">
                @php
                    $asset_types = ["Rental Property", "Landed Property", "Crop Farm Production", "Animal Farm Production", "Franchise", "Cash", "Partnership", "Haulage", "Transport Operations", "Others"];
                @endphp
                <form name="manualRateForm"  id="manualRateForm" class="mb-0">   @csrf</form>

                <form action="#" id="submitAsset" method="POST">
                    @csrf
                    <div class="row mx-2">
                        <input type="hidden" name="ahbjjshbjsnmbnmsbxdnvsxbv" value="{{$type}}">
                        <input type="hidden" name="ajnsjxnjsnxbjnbajknsjnds" id="ioaosjws9jdixnisjkxnnisjxbn">
                        <div class="col-md-3 col-sm-6 col-xs-12 px-1 portfolio-lane">
                            <select name="currency" required id="" class="px-0  bg-gray form-control">
                                <option value="">What currency is your asset held in   </option>
                                @foreach ($currencies as $current)
                                    <option value="{{ $current }}">{{ $current }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 portfolio-lane" >
                             <div class="row mx-0">
                                <div class="col-md-12 col-sm-12 px-1">
                                    @include('widgets.account_conversion')
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p id="rate_lane" style="display:none">
                                        <span class="d-block"> 1 {{explode(" ", $gap_currencies['user_currency'])[1]}} = <span id="sel_rate"></span> <span id="sel_currency1"></span></span>
                                    </p>
                                    <div id="update_exchange" style="display:none">
                                        <div class="form-inline">
                                            <label>Enter rate below: 1 {{explode(" ", $gap_currencies['user_currency'])[1]}} = <span id="sel_currency"></span> </label>
                                            <input type="hidden" form="manualRateForm" value="" id="abhjabgukahjbukahjbuahjbauzjhbz" name="currency">
                                            <input type="number" form="manualRateForm" name="rate" id="yuabvghbbnbhnghbvhmbvghb" step="any" min="0" style="width:120px;" required class="form-control b-rad-10">
                                            <button type="button" form="manualRateForm" id="submitRateBtn" class="btn btn-sm btn ml-2 px-1 fa fa-save"></button>
                                        </div>

                                    </div>
                                </div>
                             </div>
                            <p id="error" class="text-danger"></p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 px-1 portfolio-lane">
                            <select name="portfolio_type" required id="portfolio_type" class="px-0  bg-gray form-control">
                                <option value="">Asset Type  </option>
                                <!-- @foreach ($asset_types as $current)
                                    <option value="{{ $current }}">{{ $current }}</option>
                                @endforeach   -->
                            </select>
                        </div>

                    </div>
                    <div class="row mx-1">
                         <div class="col-md-4 col-sm-6 col-xs-4 px-1">
                             <div class="mb-4 plan-box elevation-2 bg-gray-4 pb-3">
                                 <label for="" class="label">Give a name to your asset</label>
                                 <textarea name="asset_name" required  placeholder="Answer(e.g. property address or a fancy name of your choice)" id="" maxlength="50" class="form-control b-rad-10 gap-center-bl px-2" cols="30" rows="4"></textarea>
                             </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-xs-4 px-1">
                             <div class="mb-4 plan-box elevation-2 bg-gray-4 pb-3">
                                 <label for="" class="label">Describe your asset   </label>
                                 <textarea name="description"  placeholder="Answer" id="" class="form-control b-rad-10 gap-center-bl px-2" cols="30" rows="4"></textarea>
                             </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-xs-4 px-1">
                             <div class="mb-4 plan-box elevation-2 bg-gray-4 pb-3">
                                 <label for="" class="label">What is your asset worth today?                             </label>
                                 <input name="asset_value" required type="number"  placeholder="Answer" id="" step="0.01"  maxlength="12"  class="form-control b-rad-10 gap-center-bl px-2">
                             </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-xs-4 px-1">
                             <div class="mb-4 plan-box elevation-2 bg-gray-4 pb-3">
                                 <label for="" class="label">How much do you currently earn from this asset monthly?</label>
                                 {{-- <textarea name="" required id="" placeholder="Answer" class="form-control b-rad-10 gap-center-bl px-2" cols="30" rows="4"></textarea> --}}
                                 <input name="monthly_roi" required type="number"  placeholder="Answer" id="" step="0.01"  maxlength="12"  class="form-control b-rad-10 gap-center-bl px-2">
                             </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-xs-4 px-1">
                             <div class="mb-4 plan-box elevation-2 bg-gray-4 pb-3">
                                 <label for="" class="label">How much is the debt secured against this asset?                                </label>
                                 {{-- <textarea name="" required  placeholder="Answer" id="" class="form-control b-rad-10 gap-center-bl px-2" cols="30" rows="4"></textarea> --}}
                                 <input name="credit_value" required type="number"  placeholder="Answer" id="" step="0.01"  maxlength="12"  class="form-control b-rad-10 gap-center-bl px-2">
                             </div>
                         </div>
                         <div class="col-md-4 col-sm-6 col-xs-4 px-1">
                             <div class="mb-4 plan-box elevation-2 bg-gray-4 pb-3">
                                 <label for="" class="label">What was the total cost of acquiring this asset?                        </label>
                                 {{-- <textarea name="" required  placeholder="Answer" id="" class="form-control b-rad-10 gap-center-bl px-2" cols="30" rows="4"></textarea> --}}
                                 <input name="projected_value" required type="number"  placeholder="Answer" id="" step="0.01"  maxlength="12"  class="form-control b-rad-10 gap-center-bl px-2">
                             </div>
                         </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" id="submitBtn" class="btn btn-bottom-rounded px-3 btn-pry btn-block">Add Asset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmAssetCreationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content wd-cf b-rad-20">
            <div class="modal-body px-0 mx-0 pb-0">
                <div class="my-3">
                    <div class="">
                        <div class="confirm mb-2 bg-portfolio">
                            <i class="fa fa-check confirm-asset"></i>
                        </div>
                    </div>
                    <div class=" d-block mx-auto">
                        <div class="gap-header text-center">
                            <h3 class="bold mx-2 text-success"><b>Success</b></h3>
                        </div>
                        <div class="mx-auto text-center">
                            <h4 class="px-3">Well done! You have added an asset to your Global <br> Asset Portfolio (GAP)!</h4>
                            <div class="mt-2">
                                <h5>Add another asset?</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer mx-auto">
                <div class="text-left">
                    <button type="button" id="addNew" class="btn btn-pry px-3 mr-3">Yes</button>
                </div>
                <div class="text-right">
                    <button type="button" onclick="window.location = '<?php echo route('portfolio') ?>'" class="btn btn-default px-3 mr-3">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
     $(function() {
        $('#addNew').on('click', function (e){
            window.location = "<?php echo route('portfolio', ['new' => '1',]) ?>";
            // $('#asset_class').text(asset_cat);
            // $('#ioaosjws9jdixnisjkxnnisjxbn').val(asset_cat);
            // if(asset_cat){
            //     $('#confirmAssetCreationModal').modal('hide');
            //     $(`#portfolioAssetFormModal`).modal('show');
            // }
        });
         $('#submitAsset').on('submit', function (e){
            // console.log('Submit');
            e.preventDefault();
            $('#submitBtn').attr("disabled", true);
            var form = document.getElementById('submitAsset');

            var fd = new FormData(form);

            $.ajax({
                type: 'POST',
                url: "<?php echo route('portfolio.new_asset') ?>",
                data: fd,
                processData: false,
                contentType: false,
                success: function(data, status){
                    // console.log("Done", status, data);
                    if(data.success){
                        $(`#portfolioAssetFormModal`).modal('hide');
                        $(`#confirmAssetCreationModal`).modal('show');
                    }
                },
                error: function(data, status){
                    $('#error').text(data.responseJSON.errors[0])
                }
            })
         });

    })
</script>
