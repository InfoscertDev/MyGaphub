{{--  Asset --}}
<div class="modal fade" id="newPortfolioAssetModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-block wd-f ">
                    <!-- <img src="{{ asset('/assets/icon/plus.png') }}" style="height: 50px" class="img img-responsive" alt=""> -->

                    <div class="mx-5 mt-3">
                        <ul class="list-group list-group-flush cash-tiles portfolio-tiles">
                            <li class="list-group-item my-2 text-center" onclick="window.location ='<?php echo route('portfolio.asset_type',['type' => 'existing']) ?>'">
                                Existing Asset (Currently Owned)
                            </li>
                            <li class="list-group-item my-2 text-center" onclick="window.location ='<?php echo route('portfolio.asset_type',['type' => 'desired']) ?>'">
                                Desired Asset (Investment Goal)
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#addCredit').on('click', function (){
                $('#assignCreditModalAccount').modal('hide');
                $(`#liabilityModalAccount`).modal('show');
            });
        })
    </script>
</div>

