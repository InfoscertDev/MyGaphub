@extends('layouts.user')

@section('script')
    <script>
        var business = <?php echo json_encode($business) ?>;
        var risk = <?php echo json_encode($risk) ?>;
        var appreciating = <?php echo json_encode($appreciating) ?>;
        var intellectual = <?php echo json_encode($intellectual) ?>;
        var depreciating = <?php echo json_encode($depreciating) ?>;

    </script>
@endsection

@section('content')
    @include('user.portfolio.modals.new_portfolio_asset')
    <div class="wd-f bg-white">
        <div class="m-2">
            <div class="gap-lists portfolio-lists ml-0 mx-4 sm-mx-0">
                <span class="mx-3 pb-2" id="goback">
                    <a href="#" class="text-dark bold" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i> Back</a>
                </span>
                <div class="pl-2 mb-2 gap-center">
                    <h4 class="bold text-underline">ASSET CLASSEM </h4>
                    <h6 class="">Select which Class you will like to add this asset to:</h6>
                </div>
                <div class="asset-list b-rad-20 hand elevation-1 mb-2"  onclick="newPortfolio(this, 'business')">
                    <div class="list-img img-right">
                        <img src="{{ asset('/assets/images/wuuquywhqe-12835412.png') }}" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body mt-3">
                        <h4 class="list-title txt-primary">Business Asset</h4>
                        <p class="list-intro pr-2">Established profitable business operations that you have 100% control over. </p>
                    </div>
                </div>
                <div class="asset-list b-rad-20 hand elevation-1 mb-2"  onclick="newPortfolio(this, 'risk')">
                    <div class="list-img img-right">
                        <img src="{{ asset('/assets/images/hq7uswer52.png') }}" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body mt-3">
                        <h4 class="list-title txt-primary">Risk Asset</h4>
                        <p class="list-intro pr-2">These are equities, stocks & share which you have little or no control over.</p>
                    </div>
                </div>
                <div class="asset-list b-rad-20 hand elevation-1 mb-2"  onclick="newPortfolio(this, 'appreciating')">
                    <div class="list-img img-right">
                        <img src="{{ asset('/assets/images/7w22164504.png') }}" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body mt-3">
                            <h4 class="list-title txt-primary">Appreciating Asset</h4>
                        <p class="list-intro pr-2">They are in limited supply with growing demand. Typically investments real estate or agriculture.</p>
                    </div>
                </div>
                <div class="asset-list b-rad-20 hand elevation-1 mb-2"  onclick="newPortfolio(this, 'intellectual')">
                    <div class="list-img img-right">
                        <img src="{{ asset('/assets/images/uhafhgwhe-19677.png') }}" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body mt-3">
                        <h4 class="list-title txt-primary">Intellectual Asset</h4>
                        <p class="list-intro pr-2">Not too common but still lucrative. Examples are books, software, songs e.t.c.</p>
                    </div>
                </div>
                <div class="asset-list b-rad-20 hand elevation-1 mb-2"  onclick="newPortfolio(this, 'depreciating')">
                    <div class="list-img img-right">
                        <img src="{{ asset('/assets/images/ghabsnnd-157520.png') }}" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body mt-3">
                        <h4 class="list-title txt-primary">Depreciating Asset</h4>
                        <p class="list-intro pr-2">This is mostly your cash and bond or any other type that loses intrinsic value over time.                         </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var asset_cat = null;
        function newPortfolio(e, asset){
            this.asset_cat = asset;
            $('#newPortfolioAssetModal').modal('show');
        }
    </script>
@endsection
