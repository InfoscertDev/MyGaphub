

<div class=" {{ ($sasset)  ? '' : '' }}"  > 
    <span class="mr-3 pb-2" id="goback">
        <a href="#" class="text-dark bold" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i> Back</a>
    </span>
    <div class="b-rad-20 mt-1 cal-head hd-reap" id="authhead">
        <div class="b-rad-20 overlay2 pt-4" id="reaplayer">
            <div class="disclaim text-center">
                <h2 class="list-explore">Real Estate Asset Program (REAP)</h2> 
                <div class="disclaim text-center"> 
                    <form action="{{ route('user.search-reap',['asset' => $set]) }}" method="POST">
                        @csrf  
                        {{-- <input type="hidden" name="sort" > --}}
                        <button class="btn bg-none  reap_sub" type="submit"><i class="fa fa-search" ></i> </button>
                        <input type="text" id="cr_keyword" class="text-opportunity" name="cr_keyword" onfocus="searchItem" value="{{$reap_search['keyword']}}"  placeholder="Search">
                        {{-- <span id="search"><i class="fa fa-search" ></i> Search</span> --}}
                        <span id="more-search-options-toggle" class="btn"><i class="fa fa-plus-square-o"></i></span>
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
                    </form>
                </div>
            </div>
        </div>
    </div> 
</div> 
<script>
$('document').ready( function(){
    var search = false;
    var more = document.getElementById('more-search-options-toggle');
        
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
});
</script>