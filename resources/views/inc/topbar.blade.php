<div id="topbar" class="py-2 bg-gray mb-3">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class=" {{($isAcquisiton || $isGanp) ? 'col-7': 'col-8' }}">
                <div class="row mx-0">
                    @if($goback)
                        <span class="col-1 text-left d-inline" id="goback">
                            <a href="#" class="text-dark bold tp-1" style="" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i></a>
                        </span>
                    @endif
                    <div class="col">
                        <h4 class="bold ff-rob text-center page-title"> 
                            <?php echo $page_title ?>
                            @if(isset($support) && ! route('support')) 
                                <span class="support info" style="font-size: 14px;" data-toggle="tooltip" 
                                    title="Click for support."> <i class="fa fa-play mx-2 "></i></span>
                            @endif
                        </h4>
                    </div>
                </div>
                @if ($isAcquisiton)  
                    <div class="opt-search" >
                        <div class="pl-10"> 
                            <form action="{{ route('user.search-reap',[$set]) }}" method="POST">
                                @csrf
                                <h5 class="bold sm-text-left text-capitalize">{{urldecode($prop)}}{{urldecode($reap_search['keyword'])}} Listings</h5>
                                <div class="" style="position: relative;margin-top: -10px;left: calc(4%);">
                                    <input type="text" id="cr_keyword" class="text-opportunity  sm-input-opt" name="cr_keyword" onfocus="searchItem" value="{{$reap_search['keyword']}}"  placeholder="Search">
                                    <button class="btn bg-none  reap_sub_opt" type="submit"><i class="fa fa-search" ></i> </button>
                                    {{-- <span id="more-search-options-toggle" class="btn"><i class="fa fa-plus-square-o"></i></span> --}}
                                    <div class="row" style="display: none" id="more-reap-search">
                                        {{-- <label for="ct_type">City</label> --}}
                                        <div class="col-4 mb-1"> 
                                            <input type="text" list="" value="{{$reap_search['country']}}"  placeholder="Country"  class="text-opportunity wd-f pl-1" name="ct_country" size="8 "style="display: inline-block;">
                                        </div>
                                        <div class="col-4 mb-1"> 
                                            <input type="text" list="" value="{{$reap_search['city']}}"  placeholder="City"  class="text-opportunity wd-f pl-1" name="ct_city" size="8 "style="display: inline-block;">
                                        </div>  
                                        
                                        <div class="col-4 mb-1">
                                            <input type="text" list="" value="{{$reap_search['property']}}"  placeholder="Property Type"  class="text-opportunity wd-f pl-1" name="ct_property" size="8 "style="display: inline-block;">
                                        </div>
                                        <div class="col-4 mb-1">
                                            <input type="text" list="ct_property" value="{{$reap_search['price_from']}}"  placeholder="Price From ($)"  class="text-opportunity wd-f pl-1" name="ct_price_from" size="8 "style="display: inline-block;">
                                        </div>
                                        <div class="col-4 mb-1">
                                            <input type="text" list="ct_property" value="{{$reap_search['price_to']}}"  placeholder="Price To ($)"  class="text-opportunity wd-f pl-1" name="ct_price_to" size="8 "style="display: inline-block;">
                                        </div>
                                        <div class="col-4 mb-1">
                                            <input id="submit" class="btn search-asset sdwn" type="submit" value="Search" style="display: inline-block;">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                @if ($isGanp)
                    <div class="opt-search" >
                        <div class="pl-9">
                            <form action="{{ route('user.search-ganp',[$asset]) }}" method="POST">
                                @csrf
                                <span></span>
                                <h5 class="bold sm-text-left text-capitalize">GANP @if ($gcountry->name) <span>{{$gcountry->name}}</span> @endif{{urldecode($ganp_search['g_keyword'])}} Listings</p>
                                <div class="" style="position: relative;margin-top: -10px;left: calc(4%);">
                                    <input type="text" id="cr_keyword" class="text-opportunity  sm-input-opt" name="cr_keyword" onfocus="searchItem" value="{{$ganp_search['g_keyword']}}"  placeholder="Search">
                                    <button class="btn bg-none  reap_sub_opt" type="submit"><i class="fa fa-search" ></i> </button>
                                    {{-- <span id="more-search-options-toggle" class="btn"><i class="fa fa-plus-square-o"></i></span> --}}
                                    <div class="row" style="display: none" id="more-reap-search">
                                    
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div> 
            <div class="{{($isAcquisiton || $isGanp) ? 'col-5': 'col-4' }} text-right">
                <div class="wel-profile {{ (isset($sort) && !isset($isSingleReap)  || $isAcquisiton || $isGanp ) ? 'sm-tp-n2': ''}} 
                            {{ ($isSingleReap || $isSingleGanp) ? 'd-flex' : ''}}">
                    @if ($isAcquisiton)
                        @include('inc.reap_acquisition_bar')
                    @elseif ($isGanp)
                        @include('inc.ganp_acquisition_bar')
                    @elseif ($isSingleReap || $isSingleGanp)
                        <div class="d-flex pl-10" style="">
                            <span class=" mr-4 sm-mr-1">
                                @if($isSingleReap)
                                    @if ($is_favourite)
                                        <a href="{{ route('user.favourite-asset', [$sasset, 'kajhhsvbncbx'=>'retyanshamdaahgs_rmzojishjbdx', 'sign' =>'sjh78wuhdf625765272nudihncuhjbcuhscb']) }}">
                                            <img src="{{ asset('/assets/icon/favourite-red.png') }}" class="profile-sm profile fav_img  img img-responsive" alt="">
                                        </a>
                                    @else
                                        <a href="{{ route('user.favourite-asset', [$sasset, 'kajhhsvbncbx'=>'retyanshamdhankdxmp_ashdhgagdhb', 'sign' =>'sjh78wuhdf625765272nudihncuhjbcuhscb']) }}">
                                            <img src="{{ asset('/assets/icon/favourite_icon.png') }}" class="profile-sm profile fav_img  img img-responsive" alt="">
                                        </a>
                                    @endif
                                @elseif($isSingleGanp)
                                    @if ($is_favourite)
                                        <a href="{{ route('user.favourite-asset', [$plant->id, 'kajhhsvbncbx'=>'gaoajkjxjnjzsbdaahgs_rmzojickjnsjz', 'sign' =>'sjh78wuhdf625765272nudihncuhjbcuhscb']) }}">
                                            <img src="{{ asset('/assets/icon/favourite-red.png') }}" class="profile-sm profile fav_img  img img-responsive" alt="">
                                        </a>
                                    @else
                                        <a href="{{ route('user.favourite-asset', [$plant->id, 'kajhhsvbncbx'=>'gaoajkjxjnjzsbdhankdxmp_ashdhshbsed', 'sign' =>'sjh78wuhdf625765272nudihncuhjbcuhscb']) }}">
                                            <img src="{{ asset('/assets/icon/favourite_icon.png') }}" class="profile-sm profile fav_img  img img-responsive" alt="">
                                        </a>
                                    @endif
                                @endif
                            </span> 
                            <span class=" mr-4 sm-mr-1">
                                <button class="bg-none br-none" style="position: relative; top: -4px;" onclick="toggleShare()" id="toggle_share">
                                    <img src="{{ asset('/assets/icon/social_share.png') }}" class="profile-sm profile img img-responsive" alt="">
                                </button>
                                @include('inc.tools')
                            </span> 
                        </div>
                    @elseif($isListAsset)
                        <!-- {{--<span class="mt-2 mr-4 sm-mr-1">
                            <img src="{{ asset('/assets/icon/alert_bell.png') }}" class="top-profile profile img img-responsive" alt="">
                            <span class="d-sm-none d-md-inline">Track</span>
                        </span> --}}  -->
                    @else  
                        <span class="mt-2 mr-4 sm-mr-1"> 
                            <a href="{{route('notifications')}}">
                                <img src="{{ asset('/assets/icon/alert_bell.png') }}" class="top-profile profile img img-responsive" alt="">
                               @if(auth()->user() &&auth()->user()->unseen_notifications) <span class="badge badge-gap">{{auth()->user()->unseen_notifications}}</span>@endif
                            </a>
                        </span> 
                    @endif
                    
                    <div style="{{ ($isAcquisiton || $isGanp) ? 'position: relative;left: 10px; top:8px;' : '' }}" 
                            class="wel-img {{ ($isAcquisiton || $isGanp) ? 'd-sm-none d-md-inline': '' }} 
                            {{ ($isSingleReap || $isAcquisiton || $isSingleGanp) ? 'wel-simg' : ''}}">
                        <a href="{{ route('profile') }}">
                            @if (isset(auth()->user()->profile) && auth()->user()->profile->image)
                                <?php $profile = auth()->user()->profile; ?>
                                <img src="{{asset('/assets/'. str_replace('public', 'storage', $profile->image) ) }}"  class="top-profile profile img img-responsive  rounded-circle" alt="" title="Click to Go to Settings">
                            @else
                                <img src="{{asset('/assets/storage/avatar/default.png') }}"  class="top-profile profile img img-responsive  rounded-circle" data-toggle="tooltip" title="Click to Go to Settings">
                            @endif
                        </a>
                    </div>  
                </div>    
            </div>
        </div>
    </div> 
</div>

@section('script')    
<script>
function sortAsset(e){
    var sort = document.getElementById('sort').value;
    // console.log(sort,href);return
    // var href = "<?php echo URL::current() ?>";
    if(sort && href){
        // href = href.replace('ganp', 'search');
        window.location = href+`&sort=${sort}`; 
    }
}

$('document').ready( function(){
    var isSort = false;
    $('#toggle_sort').on('click', function(e) {
        if(isSort){ }else{
            $('#sort_widget').fadeIn();
            $('#sort_widget').addClass('d-inline');
            $('#toggle_sort').hide();
        }
    });
    var search = false;
    var more = document.getElementById('more-search-options-toggle');
    if (more) {
        more.addEventListener('click', ()=> {
            if(!this.search){
                $('#more-reap-search').fadeIn(500);
                $('#reaplayer').addClass('htp-20');
                // $('#reaplayer').style("height", "200px");
                this.search = !this.search;
            }else{
                $('#more-reap-search').hide();
                $('#reaplayer').removeClass('htp-20');
                this.search = !this.search;
            }
        })
    } 

}); 
</script>


@endsection