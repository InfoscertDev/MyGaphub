@extends('layouts.user')
@section('content')

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="http://gappropertyhub.com/css/jquery-ui.min.css">
    <link rel="stylesheet" href="http://gappropertyhub.com/css/app.css">
    <link href="{{ asset('assets/css/gap.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="http://gappropertyhub.com/css/styles.css"> --}}
     <!-- Styles -->
     <link rel="stylesheet" href="http://gappropertyhub.com/css/lightbox.min.css">
     <link rel="stylesheet" href="http://gappropertyhub.com/css/js_composer.min.css">
     <link rel="stylesheet" href="http://gappropertyhub.com/css/flexslider.css">
     <link rel="stylesheet" href="http://gappropertyhub.com/css/flexslider-direction-nav.css">
     <link rel="stylesheet" href="http://gappropertyhub.com/css/social-btn.css">
    
    
    <div class="wd-f bg-white py-3">
        <div class="gap-center-bg"> 
            <div class="b-rad-20 mt-1 cal-head hd-reap" id="authhead">
                <div class="b-rad-20 overlay2">
                    <div class="disclaim text-center">
                        <h2 class="list-explore">Real Estate Asset Program (REAP)</h2>  
                        <select name="" id="" class="mt-2">
                            <option value="">Appreciating Asset</option>
                        </select>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row mt-3 mx-2">
            <article class="col span_10 marB60">
                <!-- Location -->
                <header class="listing-location mt-3">
                        @if($asset->category != '')
                            <div class="snipe-wrap">
                            <h5 class="snipe" style="display: block;">
                                    <span style="background:   {{$asset->category->region}} !important;">{{ $asset->category->name }}</span></h5>
                            <div class="clear"></div>
                        </div>
                        @endif
    
                    <h1 id="listing-title" class="marT24 marB0"> {{$asset->name}}</h1>
                    <p class="location marB0"><i class="country">{{ $asset->location->country }}, </i>  <i class="state">{{ $asset->location->city }}, </i>{{ $asset->location->street }}</p>
                </header>
    <!-- //Location -->
    
    <!-- Price -->
    <h4 class="price marT0 marB0"><span class="listing-price-prefix"><!-- From --> </span><span class="listing-price"> {{$asset->currency}}{{ $asset->investment->sale_price }}</span><span class="listing-price-postfix"> <!-- /mo --></span></h4>
    <!-- //Price -->
    
    <!-- Listing Info -->
        <ul class="propinfo marB0">
            <li class="row beds"><span class="muted left">Bed</span><span class="right">{{ $asset->special_feature->spec_feature2 }}</span></li>
            <li class="row baths"><span class="muted left">Bath</span><span class="right">{{ $asset->special_feature->spec_feature3 }}</span></li>
            <li class="row baths"><span class="muted left">Monthly Income</span><span class="right"> {{$asset->currency}}{{ $asset->investment->total_deduction }}</span></li>
            <li class="row sqft"><span class="muted left"> Sq Ft</span><span class="right">{{ $asset->special_feature->spec_feature4 }} 
                                    @if($asset->special_feature->spec_feature5)  
                                        -   {{$asset->special_feature->spec_feature5}}
                                    @endif</span></li>
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
                                <div id="collapse1" class="panel-collapse collapse">
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
                                        <th> <b>Monthly Income:</b>   {{$asset->currency}}{{ $asset->investment->total_deduction }}
                                            </th>
                                        <th>
                                            <b>Total Deductions:</b>   {{$asset->currency}}
                                            {{-- {{ $deduct }}  --}}
                                        </th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr>
                                        <td> <b>Sale Price:</b>  {{$asset->currency}}{{ $asset->investment->sale_price }}</td>
                                        <td> <b>Management Fee:</b>{{$asset->currency}}{{ $asset->investment->management_fee}} </td>
                                    </tr>
                                    <tr>
                                        <td><b>Rental Value:</b> {{$asset->currency}}{{ $asset->investment->rental_price }} </td>
                                        <td> <b>Property Tax</b> {{$asset->currency}}{{ $asset->investment->tax }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Gross ROI: </b> {{ $asset->investment->gross }} <b>%</b></td>
                                        <td> <b>Misc & Assoc. Fee</b>  {{$asset->currency}}{{ $asset->investment->associate_fee }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Net Revenue </b>  {{$asset->currency}}{{ $asset->investment->net_revenue }}</td>
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
                        
                        <form action="" method="POST" role="form" class="contact" id="reserveForm">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control reserve-form" id="subject" name="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control reserve-form" type="textarea" id="message" name="message" placeholder="Message" maxlength="254" rows="4"></textarea>
                                <!-- <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                     -->
                            </div>
                            <div class="my-4 text-center">
                                <button type="button" id="reserveAssetBtn"  class="btn btn-pry px-3">Reserve Asset</button>
                            </div>
                                
                            <!-- Reserve Asset Dialog --> 
                            <div class="modal fade" id="submitAssetReservation" tabindex="-1" role="dialog" aria-hidden="true">
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

                                        <div class="modal-footer mx-auto"> 
                                            <div class="text-left">
                                                <form action="{{ route('acqusition.reserve_reap', $asset->id) }}" method="POST" role="form" class="contact" id="reserveForm">
                                                    @csrf
                                                    <button type="submit" id="confirmAccountRemove"  class="btn btn-pry px-3 mr-3">Yes</button>
                                                </form>
                                            </div>
                                            <div class="text-right"> 
                                                <button type="submit"  data-dismiss="modal" class="btn btn-default px-3 mr-3">No</button>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            @section('script')
                                <script>
                                    $(function(){ 
                                        $('#reserveAssetBtn').on('click', function(e){
                                            e.preventDefault();
                                            var isValid = true;
                                            $('.reserve-form').each(function() {
                                                if ( $(this).val() === '' ){
                                                    isValid = false;
                                                }
                                            });
                                            
                                            if(isValid){  
                                                $('#submitAssetReservation').modal('toggle');
                                            }else{
                                                swal("", "All fields are mandatory", "error");
                                            }
                                        });
                                    });
                                </script>
                            @endsection

                            @section('secure_script')
                                <script>
                                    var _0xd914=["\x63\x6C\x69\x63\x6B","\x70\x72\x65\x76\x65\x6E\x74\x44\x65\x66\x61\x75\x6C\x74","\x76\x61\x6C","","\x65\x61\x63\x68","\x2E\x72\x65\x73\x65\x72\x76\x65\x2D\x66\x6F\x72\x6D","\x74\x6F\x67\x67\x6C\x65","\x6D\x6F\x64\x61\x6C","\x23\x73\x75\x62\x6D\x69\x74\x41\x73\x73\x65\x74\x52\x65\x73\x65\x72\x76\x61\x74\x69\x6F\x6E","\x41\x6C\x6C\x20\x66\x69\x65\x6C\x64\x73\x20\x61\x72\x65\x20\x6D\x61\x6E\x64\x61\x74\x6F\x72\x79","\x65\x72\x72\x6F\x72","\x6F\x6E","\x23\x72\x65\x73\x65\x72\x76\x65\x41\x73\x73\x65\x74\x42\x74\x6E"];$(function(){$(_0xd914[12])[_0xd914[11]](_0xd914[0],function(_0xa676x1){_0xa676x1[_0xd914[1]]();var _0xa676x2=true;$(_0xd914[5])[_0xd914[4]](function(){if($(this)[_0xd914[2]]()=== _0xd914[3]){_0xa676x2= false}});if(_0xa676x2){$(_0xd914[8])[_0xd914[7]](_0xd914[6])}else {swal(_0xd914[3],_0xd914[9],_0xd914[10])}})})
                                </script>
                            @endsection
                        </form>
                    </div>  
                    <br>
                </section>
            </article> 
        </div>
    </div> 

    
    <script src="http://gappropertyhub.com/js/jquery.js"></script>
    <script src="http://gappropertyhub.com/js/app.js"></script>
    <script src="http://gappropertyhub.com/js/jquery-ui.min.js"></script>
    <script src="http://gappropertyhub.com/js/lightbox.min.js"></script>
    
    <script src="http://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="http://gappropertyhub.com/js/script.js"></script> 
    <script src="http://gappropertyhub.com/js/mescript.js"></script> 
    <script src="http://gappropertyhub.com/js/jquery.flexslider-min.js?ver=5.0.1"></script>
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

    // Slider for Testimonails      
    jQuery('.flexslider').flexslider({
        animation: "fade",
        slideDirection: "horizontal",
        slideshow: "true",
        slideshowSpeed: 7000,
        animationDuration: 600,
        controlNav: false,
        directionNav: true,
        keyboardNav: true,
        randomize: false,
        pauseOnAction: true,
        pauseOnHover: false,
        animationLoop: true
    });``

    function popup(pageURL,title,w,h) {
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
    }
</script> 
<div id="lightboxOverlay" class="lightboxOverlay" style="display: none;"></div><div id="lightbox" class="lightbox" style="display: none;"><div class="lb-outerContainer"><div class="lb-container"><img class="lb-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="><div class="lb-nav"><a class="lb-prev" href=""></a><a class="lb-next" href=""></a></div><div class="lb-loader"><a class="lb-cancel"></a></div></div></div><div class="lb-dataContainer"><div class="lb-data"><div class="lb-details"><span class="lb-caption"></span><span class="lb-number"></span></div><div class="lb-closeContainer"><a class="lb-close"></a></div></div></div></div>
@endsection 