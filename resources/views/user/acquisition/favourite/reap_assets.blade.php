@extends('layouts.user')
@section('content')

@include('inc.tools')
<link href="{{ asset('assets/css/gap.css') }}" rel="stylesheet">

<div class="wd-f bg-white py-3">
    <div class="elevation-3 b-rad-20 hg-f">
        <div class="mb-5">
            @include('user.acquisition.favourite.banner') 
        </div> 
        
        <div class="d-flex m-3" style="flex-direction: column;"> 
            <div class="listing-search-results col-sm-12">
                @if (count($assets))
                <!-- <div class="row"></div> -->
                    @foreach($assets as $asset)
                        <li class="listing col span_6 px-0 standard">
                            <figure>
                                <h6 class="snipe featured for-sale " style="display: block;"><span style=" background: {{$asset->category->region}} !important;" class="text-center"> {{$asset->category->name}} </span></h6> 
                                <a href="{{ route('user.single_reap',$asset->id,['rs' => $asset->name]) }}"><img src="{{ url('https://gappropertyhub.com/storage/asset_images/'. $asset->asset_image->image1 )}}" class="attachment-listings-featured-image size-listings-featured-image" alt=""></a>
                                <ul class="listing-actions">
                                    <a class="prop-type-icon mr-3" onclick="reserveAsset()"><i class="fa fa-ticket" style="font-size: 22px;"></i></a>
                                    <!-- <span class="prop-type-icon "><i class="text-red fa fa-love"></i></span> -->
                                </ul>
                            </figure>
                            <div class="grid-listing-info"> 
                                <header>
                                    <h5 class="marB0"><a href="{{ route('user.single_reap',$asset->id,['rs' => $asset->name]) }}">{{ str_limit($asset->name, $limit = 35, $end = '...') }}</a></h5>
                                    <p class="location muted marB0">{{ $asset->location->country }}, {{ $asset->location->city }},{{ str_limit($asset->location->street, $limit = 10, $end = '...') }} </p>
                                </header>
                                <p class="price marB0"><span class="listing-price">{{$asset->currency}} {{ $asset->investment->sale_price }}</span></p>
                                <div class="propinfo main">
                                    <p>{{ str_limit($asset->description, $limit = 85, $end = '...') }}</p>
                                    <ul class="marB0">
                                        <li class="row beds"><span class="muted left">Bed</span><span class="text-right right">{{ $asset->special_feature->spec_feature2 }}</span></li>
                                        <li class="row baths"><span class="muted left">Baths</span><span class="text-right right">{{ $asset->special_feature->spec_feature3 }}</span></li>
                                        <li class="row sqft"><span class="muted left"> Rental Income</span><span class="text-right right">{{$asset->currency}}{{ $asset->investment->total_deduction }}</span></li>
                                    </ul>
                                </div> 
                                <div class="brokerage asset_footer" >
                                    <div class="d-flex">
                                        <div class="col p-2">
                                            <span class="mr-2 sm-mr-1">
                                                <button class="bg-none br-none" style="    position: relative; top: -2px;" onclick="toggleShare()" id="toggle_share">
                                                    <img src="{{ asset('/assets/icon/social_share.png') }}" class="profile-sm profile img img-responsive pr-2"
                                                        style="position: relative; top: -4px;" alt="">
                                                    <span>Share</span>
                                                </button>
                                                <div class="share_tools hand" style="">
                                                    
                                                </div>
                                                <script> 
                                                    var isTool = false;  
                                                    var share = "<?php echo $asset->share ?>";
                                                    var image = "<?php echo url('https://gappropertyhub.com/storage/asset_images/'. $asset->asset_image->image1 ) ?>";
                                                    var reserve_asset = "<?php echo route('acqusition.reserve_reap', $asset->id) ?>";

                                                    function reserveAsset(){
                                                        // console.log(this.reserve_asset);
                                                        $('#reserveForm').attr('action', this.reserve_asset);
                                                        $('#reserveAsset').modal('show');
                                                    }

                                                    function toggleShare(){
                                                        // console.log(this.share);  
                                                        $('#share_link').val(this.share, this.image);
                                                        $('.shareon').attr('data-url', this.share);
                                                        $('.shareon .whatsapp').attr('data-title', this.share);
                                                        $('.shareon .whatsapp').attr('data-url', this.share);
                                                        $('.shareon .mail').attr('href', 'mailto:example@website.com?Subject=MyGaphub Asset&body='+this.share);
                                                        $('.shareon .facebook').attr('data-title', this.share);
                                                        $('.shareon .linkedin').attr('data-url', this.share); 
                                                        $('.shareon .pinterest').attr('data-url', this.share); 
                                                        $('.shareon .pinterest').attr('data-media', this.image);
                                                        $('.shareon .telegram').attr('data-text', this.share);
                                                        $('.shareon .telegram').attr('data-url', this.share);
                                                        $('.shareon .twitter').attr('data-via', this.share);
                                                        $('.shareon .twitter').attr('data-url', this.share);
                                                        $('#shareModal').modal('show');
                                                    }

                                                    function copyLink(){
                                                        document.getElementById('share_link').select();
                                                        document.execCommand('copy');
                                                        $('#confirm_copy').fadeIn();
                                                        setTimeout(() => { 
                                                            $('#shareModal').modal('hide');
                                                        },2000);
                                                    }
                                                </script>
                                            </span>
                                        </div> 
                                        <div class="col p-2">
                                            <span class="mr-2 sm-mr-1"> 
                                                <a class="bg-none br-none card-link hand text-dark" onclick="reserveAsset()" style=" position: relative; top: -2px;">
                                                    <i class="fa fa-ticket pr-2" style="font-size:18px"></i>
                                                    <span>Reserve</span> 
                                                </a>
                                            </span> 
                                        </div>
                                        <div class="col p-2">
                                            <span class="mr-2 sm-mr-1"> 
                                                <a class="bg-none br-none hand text-dark" style=" position: relative; top: -2px;"
                                                    href="{{ route('user.favourite-asset', [$asset->id, 'kajhhsvbncbx'=>'retyanshamdaahgs_rmzojishjbdx', 'sign' =>'sjh78wuhdf625765272nudihncuhjbcuhscb']) }}" >
                                                    <i class="fa fa-trash pr-2" style="font-size:18px"></i>
                                                    <span>Remove</span> 
                                                </a>
                                            </span> 
                                        </div>
                                    </div>
                                </div> 
                            </div>    
                        </li>
                    @endforeach
                @else
                    <div class=" text-center p-5"> 
                        <p class="nomatches p-5">
                            <strong>No Favourite properties yet.</strong>
                        </p>
                    </div> 
                @endif
            </div> 
            
            <div class="d-block">
                @if ( isset($favourite_meta['current_page']) ) 
                    <div class="pull-right">
                        <ul class="pagination mr-5">
                            @if ( ($favourite_meta['current_page']) - 1 && ($favourite_meta['current_page'])  <=  $favourite_meta['last_page'])
                                <li class="page-item"> 
                                    <a class="page-link" href="{{ route('favourite', ['page' => $favourite_meta['current_page'] - 1]) }}">Previous</a>
                                </li>
                            @endif
                            @if ( ($favourite_meta['current_page']) + 1  <=  $favourite_meta['last_page'])
                                <li class="page-item active">
                                    <a class="page-link " href="{{ route('favourite', ['page' => $favourite_meta['current_page'] + 1]) }}">Next</a>
                                </li>
                            @endif  
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="reserveAsset" tabindex="-1" role="dialog" aria-labelledby="reserveAssetLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">  
                <div class="modal-header">
                    <h5 class="modal-title" id="reserveAssetLabel">Reserve Asset</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>  
                <div class="modal-body" style="min-height: 150px;">
                    <div class="mt-3 mb-4">
                        @include('inc.reserve_asset_form')
                    </div>
                </div> 
            </div>
        </div>
    </div> 
</div> 

@endsection 