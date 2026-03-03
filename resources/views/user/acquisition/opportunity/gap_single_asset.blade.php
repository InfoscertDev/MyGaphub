@extends('layouts.user')

@section('header')
    <link rel="stylesheet" href="https://gappropertyhub.com/css/app.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://gappropertyhub.com/css/jquery-ui.min.css">
    <link href="{{ asset('assets/css/gap.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://gappropertyhub.com/css/lightbox.min.css">
    <link rel="stylesheet" href="https://gappropertyhub.com/css/flexslider.css">
    <link rel="stylesheet" href="https://gappropertyhub.com/css/flexslider-direction-nav.css">
    
    <script> 
        var share = "<?php echo $asset->share ?>";
        var image = "<?php echo url('https://gappropertyhub.com/storage/asset_images/'. $asset->asset_image->image1 ) ?>";
        var isTool = false;  
                
        function toggleShare(){
            $('#confirm_copy').hide();
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
                $('#confirm_copy').hide();
                $('#shareModal').modal('hide');
            },2000);
        } 
        function reserveAsset(){
            $('#reserveAssetForm').modal('show');
        }
    </script>
    <style>
        .modal-open {
            overflow-x: hidden;
            overflow-y: hidden !important;
        }
    </style>
@endsection

@section('secure_header')
    <link rel="stylesheet" href="https://gappropertyhub.com/css/app.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://gappropertyhub.com/css/jquery-ui.min.css">
    <link href="{{ asset('assets/css/gap.css') }}" rel="stylesheet">
    <!-- Styles --> 
    <link rel="stylesheet" href="https://gappropertyhub.com/css/lightbox.min.css">
    <link rel="stylesheet" href="https://gappropertyhub.com/css/flexslider.css">
    <link rel="stylesheet" href="https://gappropertyhub.com/css/flexslider-direction-nav.css">
    <script>
        var share = "<?php echo $asset->share ?>";
        var image = "<?php echo url('https://gappropertyhub.com/storage/asset_images/'. $asset->asset_image->image1 ) ?>";
        // var _0x1b76=["\x68\x69\x64\x65","\x23\x63\x6F\x6E\x66\x69\x72\x6D\x5F\x63\x6F\x70\x79","\x73\x68\x61\x72\x65","\x69\x6D\x61\x67\x65","\x76\x61\x6C","\x23\x73\x68\x61\x72\x65\x5F\x6C\x69\x6E\x6B","\x64\x61\x74\x61\x2D\x75\x72\x6C","\x61\x74\x74\x72","\x2E\x73\x68\x61\x72\x65\x6F\x6E","\x64\x61\x74\x61\x2D\x74\x69\x74\x6C\x65","\x2E\x73\x68\x61\x72\x65\x6F\x6E\x20\x2E\x77\x68\x61\x74\x73\x61\x70\x70","\x68\x72\x65\x66","\x6D\x61\x69\x6C\x74\x6F\x3A\x65\x78\x61\x6D\x70\x6C\x65\x40\x77\x65\x62\x73\x69\x74\x65\x2E\x63\x6F\x6D\x3F\x53\x75\x62\x6A\x65\x63\x74\x3D\x4D\x79\x47\x61\x70\x68\x75\x62\x20\x41\x73\x73\x65\x74\x26\x62\x6F\x64\x79\x3D","\x2E\x73\x68\x61\x72\x65\x6F\x6E\x20\x2E\x6D\x61\x69\x6C","\x2E\x73\x68\x61\x72\x65\x6F\x6E\x20\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B","\x2E\x73\x68\x61\x72\x65\x6F\x6E\x20\x2E\x6C\x69\x6E\x6B\x65\x64\x69\x6E","\x2E\x73\x68\x61\x72\x65\x6F\x6E\x20\x2E\x70\x69\x6E\x74\x65\x72\x65\x73\x74","\x64\x61\x74\x61\x2D\x6D\x65\x64\x69\x61","\x64\x61\x74\x61\x2D\x74\x65\x78\x74","\x2E\x73\x68\x61\x72\x65\x6F\x6E\x20\x2E\x74\x65\x6C\x65\x67\x72\x61\x6D","\x64\x61\x74\x61\x2D\x76\x69\x61","\x2E\x73\x68\x61\x72\x65\x6F\x6E\x20\x2E\x74\x77\x69\x74\x74\x65\x72","\x73\x68\x6F\x77","\x6D\x6F\x64\x61\x6C","\x23\x73\x68\x61\x72\x65\x4D\x6F\x64\x61\x6C","\x73\x65\x6C\x65\x63\x74","\x73\x68\x61\x72\x65\x5F\x6C\x69\x6E\x6B","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x63\x6F\x70\x79","\x65\x78\x65\x63\x43\x6F\x6D\x6D\x61\x6E\x64","\x66\x61\x64\x65\x49\x6E","\x23\x72\x65\x73\x65\x72\x76\x65\x41\x73\x73\x65\x74\x46\x6F\x72\x6D"];var isTool=false;function toggleShare(){$(_0x1b76[1])[_0x1b76[0]]();$(_0x1b76[5])[_0x1b76[4]](this[_0x1b76[2]],this[_0x1b76[3]]);$(_0x1b76[8])[_0x1b76[7]](_0x1b76[6],this[_0x1b76[2]]);$(_0x1b76[10])[_0x1b76[7]](_0x1b76[9],this[_0x1b76[2]]);$(_0x1b76[10])[_0x1b76[7]](_0x1b76[6],this[_0x1b76[2]]);$(_0x1b76[13])[_0x1b76[7]](_0x1b76[11],_0x1b76[12]+ this[_0x1b76[2]]);$(_0x1b76[14])[_0x1b76[7]](_0x1b76[9],this[_0x1b76[2]]);$(_0x1b76[15])[_0x1b76[7]](_0x1b76[6],this[_0x1b76[2]]);$(_0x1b76[16])[_0x1b76[7]](_0x1b76[6],this[_0x1b76[2]]);$(_0x1b76[16])[_0x1b76[7]](_0x1b76[17],this[_0x1b76[3]]);$(_0x1b76[19])[_0x1b76[7]](_0x1b76[18],this[_0x1b76[2]]);$(_0x1b76[19])[_0x1b76[7]](_0x1b76[6],this[_0x1b76[2]]);$(_0x1b76[21])[_0x1b76[7]](_0x1b76[20],this[_0x1b76[2]]);$(_0x1b76[21])[_0x1b76[7]](_0x1b76[6],this[_0x1b76[2]]);$(_0x1b76[24])[_0x1b76[23]](_0x1b76[22])}function copyLink(){document[_0x1b76[27]](_0x1b76[26])[_0x1b76[25]]();document[_0x1b76[29]](_0x1b76[28]);$(_0x1b76[1])[_0x1b76[30]]();setTimeout(()=>{$(_0x1b76[1])[_0x1b76[0]]();$(_0x1b76[24])[_0x1b76[23]](_0x1b76[0])},2000)}function reserveAsset(){$(_0x1b76[31])[_0x1b76[23]](_0x1b76[22])}    </script>
@endsection

@section('content') 
    <div class="wd-f bg-white py-3"> 
        <div>  
            <span class="mr-3 pb-2" id="goback">
                <a href="#" class="text-dark" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i> Back</a>
            </span>
        </div> 
        <div class="my-5">
            
            <div class="single-listings row mx-0">
                <article class="ml-3 md-no-ml span_9 marB60">
                    @if($asset->authorize == 0)
                        <div class="jumbotron full">
                            <p class="text-center"> This asset is under review by GAP Administrator and cannot be reserved yet.</p>
                        </div>
                    @elseif($asset->acquired_id > 0)
                        <div class="jumbotron full">
                            <p class="text-center"> This asset cannot be reserved.</p>
                        </div>
                    @else
                            <!-- Location --> 
                            <header class="listing-location mt-3">
                                    @if($asset->category != '')
                                        <div class="snipe-wrap">
                                                <h5 class="snipe" style="display: block;">
                                                    <span style="background:   {{$asset->category->region}} !important;">{{ $asset->category->name }}</span>
                                                </h5>
                                            <div class="clear"></div>
                                        </div>
                                    @endif
                
                                <h1 id="listing-title" class="marT24 marB0"> {{$asset->name}}</h1>
                                <p class="location marB0"><i class="country">{{ $asset->location->country }}, </i>  <i class="state">{{ $asset->location->city }}, </i>{{ $asset->location->street }}</p>
                            </header>
                            <!-- //Location -->
                            
                            <!-- Price -->
                            <h4 class="price marT0 marB0"><span class="listing-price-prefix"><!-- From --> </span><span class="listing-price"> {{$asset->currency}}{{ number_format($asset->investment->sale_price,2) }}</span><span class="listing-price-postfix"> <!-- /mo --></span></h4>
                            <!-- //Price -->
                            
                            <!-- Listing Info -->
                                <ul class="propinfo marB0">
                                    <li class="row beds"><span class="muted left">Bed</span><span class="right">{{ $asset->special_feature->spec_feature2 }}</span></li>
                                    <li class="row baths"><span class="muted left">Bath</span><span class="right">{{ $asset->special_feature->spec_feature3 }}</span></li>
                                    <li class="row baths"><span class="muted left">Rental Income</span><span class="right"> {{$asset->currency}}{{ $asset->investment->total_deduction }}</span></li>
                                    <li class="row sqft"><span class="muted left"> Sq Ft</span><span class="right">{{ $asset->special_feature->spec_feature4 }} 
                                        @if($asset->special_feature->spec_feature5)  
                                            -   {{$asset->special_feature->spec_feature5}}
                                        @endif</span>
                                    </li>
                                    {{-- <li class="row property-type"><span class="muted left">Property Type</span><span class="right">----</span></li> --}}
                                </ul>
                            <!-- //Listing Info -->
                
                            @include('inc.asset-gallery')
                
                            <div class="clear"></div>
                            <section id="asset">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                            Property Description </a>
                                        </h4>
                                        </div>
                                            <div id="collapse1" class="panel-collapse collapse show">
                                            <div class="panel-body">
                                                {{-- {{ html_entity_decode($asset->description) }} --}}
                                                {!! nl2br($asset->description) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Investment Numbers</a>
                                        </h4>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <table class="table table-bordered table-striped">
                                                <tfoot>
                                                <tr>
                                                    <th> <b>Rental Income:</b>   {{$asset->currency}}{{ $asset->investment->total_deduction }}
                                                        </th>
                                                    <th>
                                                        <b>Total Deductions:</b>   {{$asset->currency}}
                                                        {{-- {{ $deduct }}  --}}
                                                    </th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <tr>
                                                    <td> <b>Sale Price:</b>  {{$asset->currency}}{{ number_format($asset->investment->sale_price,2) }}</td>
                                                    <td> <b>Management Fee:</b>{{$asset->currency}}{{ number_format($asset->investment->management_fee,2)}} </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Rental Value:</b> {{$asset->currency}}{{ number_format($asset->investment->rental_price,2) }} </td>
                                                    <td> <b>Property Tax</b> {{$asset->currency}}{{ number_format($asset->investment->tax,2) }}</td>
                                                </tr> 
                                                <tr>
                                                    <td> <b>Gross ROI: </b> {{ $asset->investment->gross }} <b>%</b></td>
                                                    <td> <b>Misc & Assoc. Fee</b>  {{$asset->currency}}{{ number_format($asset->investment->associate_fee,2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Net Revenue </b>  {{$asset->currency}}{{number_format($asset->investment->net_revenue,2) }}</td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Special Features </a>
                                        </h4>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            @foreach($specials as $feature)
                                                @if($feature != '' || $feature != null)
                                                    @if($loop->iteration == 1) <p class="list-group-item">Property Type: {{ $feature }}  
                                                    @elseif($loop->iteration == 2) <p class="list-group-item">Bed : {{ $feature }}  
                                                    @elseif($loop->iteration == 3 ) <p class="list-group-item">Bath : {{ $feature }}  
                                                    @elseif($loop->iteration == 4) <p class="list-group-item">Square Feet: {{ $feature }} 
                                                        @elseif($loop->iteration == 5) - {{ $feature }} 
                                                    @else
                                                        <p class="list-group-item">{{ $feature }}</p>
                                                        {{-- @if($loop->iteration !== 1 || $loop->iteration != 2 || $loop->iteration != 3 || $loop->iteration != 4 || $loop->iteration != 5)
                                                            <p class="list-group-item">{{ $feature }}</p> @endif --}}
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                            Fact & Features</a>
                                            </h4>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                @if(count($features1) && count($features2))
                                                <span class="col-xs-6">
                                                    <ul class="list-group">
                                                        @foreach($features1 as $feature)
                                                            @if($feature != '' || $feature != null)
                                                                <li class="list-group-item xs-set">  {{ $feature }} </li> 
                                                                {{-- <i class="fa fa-check-square bg-lgrn"></i><i class="fa fa-check-square bg-lgrn"></i>--}}
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </span>
                                                <span class="col-xs-6">
                                                    <ul class="list-group">
                                                            @foreach($features2 as $feature)
                                                                @if($feature != '' || $feature != null)
                                                                    <li class="list-group-item xs-set"> {{ $feature }} </li>
                                                                @endif
                                                            @endforeach
                                                    </ul>
                                                </span>
                                                @else
                                                    <p> None </p>
                                                @endif
                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Neighbourhood Highlights</a>
                                            </h4>
                                        </div>
                                        <div id="collapse5" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                @if($asset->neighborhood == '')
                                                    <p>None</p>
                                                @else
                                                {!! nl2br($asset->neighborhood) !!}  
                                                @endif
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                                Intelligent Report</a>
                                            </h4>
                                        </div>
                                        <div id="collapse6" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                @if($asset->inteligent_report  == '')
                                                    <p>None</p>
                                                @else  
                                                    {!! nl2br($asset->inteligent_report) !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#reserveAsset">
                                                Investment Interest Area</a>
                                            </h4>
                                        </div>
                                        <div id="reserveAsset" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="col-md-12">
                                                    <div class="form-area">  
                                                        @include('inc.reserve_asset_form')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    @if(auth()->user())           
                                        <div class="mt-5">
                                            <button class="btn btn-pry btn-block"  onclick="reserveAsset()">Reserve this Asset</button>
                                            <!-- Reserve Asset Dialog --> 
                                            <div class="modal" id="reserveAssetForm" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">
                                                                Confirm Reserve Asset
                                                            </h5>
                                                            <button type="button" class="close pull-right" style="margin-top: -18px;"  
                                                                data-dismiss="modal"  aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button> 
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 class="text-center">Are you sure you want to reserve this asset?</h4>
                                                        </div> 
                                                        <div class="modal-footer mx-auto mb-4">  
                                                            <form action="{{ route('acqusition.reserve_reap', $asset->id) }}" method="POST" role="form" class="d-block" id="reserveForm">
                                                                @csrf
                                                                <div class="text-left">
                                                                    <button type="submit" id="confirmAccountRemove"  class="btn btn-pry px-3 mr-3">Yes</button>
                                                                </div>
                                                            </form>
                                                            <div class="text-right"> 
                                                                <button type="submit"  data-dismiss="modal" class="btn btn-default px-3 mr-3">No</button>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>   
                                <br>
                            </section>
                    @endif
                </article> 
                 
                <div class="ml-3 span_3">
                    @if (count($related))                        
                        <div class="card">
                            <div class="card-heading "><h4 class="card-title text-center"><b>Related Asset</b> </h4></div>
                            <ul class="list-group">
                                @foreach ($related as $asset)
                                    @if ($asset->id != $id) 
                                        <li class="list-group-item">
                                            <h4> <a href="{{ route('user.single_reap',$asset->id,['rs' => $asset->name]) }}">{{ $asset->name }}</a></h4> 
                                            <span><i class="country">{{ $asset->location->country }}, </i>  <i class="state">{{ $asset->location->city }}, </i>{{ $asset->location->street }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div> <br>
                    @endif
        
                    <div class="clear"></div>
            
                    <ul class=" p-0">
                        @foreach ($promotion as $asseted)
                        {{-- {{$asseted->promote->id}} --}}
                            @if($asseted->promote && $asseted->promote->id != $id)
                                <li class="listing" style="opacity: .88 :hover{ opacity: 1}">
                                    <figure> 
                                        @if($asseted->promote->category) <h6 class="snipe featured for-sale " style="display: block;"><span style=" background:  {{$asseted->promote->category->region}} !important;">  {{$asseted->promote->category->name}} </span></h6> @endif 
                                        <ul class="listing-actions">
                                                
                                        </ul> 
                                        <a href="{{ route('user.single_reap',[$asset->id,'rs' => $asset->name]) }}"><img src="{{url('https://gappropertyhub.com/storage/asset_images/' .$asseted->promote->asset_image->image1 ) }}" class="attachment-listings-featured-image size-listings-featured-image" alt=""></a>
                                    </figure>
                                    <div class="grid-listing-info">
                                        <header>
                                            <h5 class="marB0"><a href="{{ route('user.single_reap',[$asset->id,'rs' => $asset->name]) }}">{{ str_limit($asseted->promote->name, $limit = 35, $end = '...') }}</a></h5>
                                            <p class="location muted marB0">{{ $asseted->promote->location->country }}, {{ $asseted->promote->location->city }}, {{ $asseted->promote->location->street }}</p>
                                        </header>
                                        <p class="price marB0"><span class="listing-price"> {{$asseted->promote->currency}} {{ $asseted->promote->investment->sale_price }}</span></p>
                                        <div class="propinfo">
                                            <p>{{ str_limit($asseted->promote->description, $limit = 55, $end = '...') }}</p>
                                            <ul class="marB0 p-0">
                                                <li class="row beds"><span class="muted left">Bed</span><span class="right">{{ $asseted->promote->special_feature->spec_feature2 }}</span></li>
                                                <li class="row baths"><span class="muted left">Baths</span><span class="right">{{ $asseted->promote->special_feature->spec_feature3 }}</span></li>
                                                <li class="row sqft"><span class="muted left"> Rental Income</span><span class="right">{{$asseted->promote->currency}} {{ $asseted->promote->investment->total_deduction }}</span></li>
                                            </ul>
                                        </div>
                                    </div>      
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div> 
@endsection 

@section('script')
<!-- <script src="https://gappropertyhub.com/js/jquery.js"></script> --> 
<!-- <script src="https://gappropertyhub.com/js/jquery-ui.min.js"></script> -->
<script src="https://gappropertyhub.com/js/lightbox.min.js"></script>

<!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->
 <script src="https://gappropertyhub.com/js/jquery.flexslider-min.js?ver=5.0.1"></script>


<script type="text/javascript" charset="utf-8">
    $(window).on('load',function() {
        $('.flexslider').flexslider();
    });
</script> 
<script type="text/javascript">
    
    
    // Slider     
    jQuery('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animateHeight: true, 
        directionNav: true,
        animationLoop: false,
        slideshow: "true",
        slideshowSpeed: 7000,
        animationDuration: 600,
        itemWidth: 120,
        itemMargin: 0,
        asNavFor: '#slider'
    });

    jQuery('#slider').flexslider({
        animation: "fade",
        slideDirection: "horizontal",
        slideshow: "true",
        slideshowSpeed: 7000,
        animationDuration: 600,
        smoothHeight: true,
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel"
    });

    function popup(pageURL,title,w,h) {
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
    }
</script> 
@endsection

