

<div class="row mt-3 mx-0"  > 
    <span class="mr-3 pb-2" id="goback">
        <a href="#" class="text-dark bold" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i> Back</a>
    </span>
    <div class="b-rad-20 mt-1 cal-head hd-ganp" id="authhead">
        <div class="b-rad-20 overlay2 pt-4" id="reaplayer">
            <div class="disclaim text-center">
                <h2 class="list-explore sm-fs-16 sm-bold">Green Asset National Product (GANP)</h2> 
                <div class="disclaim text-center"> 
                    <form action="{{ route('user.search-ganp',[$asset]) }}" method="POST">
                        @csrf  
                        <button class="btn bg-none  reap_sub" type="submit"><i class="fa fa-search" ></i> </button>
                        <input type="text" id="cr_keyword" min="3" class="text-opportunity" name="cr_keyword" placeholder="Available Cultivation(s)">
                        @if ($country)
                            <input type="hidden" name="gt_country" value="{{ $country }}">
                        @endif
                        <span id="more-search-options-toggle" class="btn right"><i class="fa fa-plus-square-o"></i></span>
                        <div class="row justify-content-center" style="display: none" id="more-ganp-search">
                            <div class="col-5 mb-1"> 
                                <input type="number" value="" min="0" max="100"  placeholder="From ROI(%)"  class="text-opportunity wd-f pl-1" name="gt_roi_from" size="8 "style="display: inline-block;">
                              
                            </div> 
                            <div class="col-5 mb-1"> 
                                <input type="number" value="" min="0" max="100"  placeholder="To ROI(%)"  class="text-opportunity wd-f pl-1" name="gt_roi_to" size="8 "style="display: inline-block;">
                            </div> 
                            <div class="col-5 mb-1">
                                <select id="gt_country" name="gt_country" class="wd-f select-opportunity sdwn" style="">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option> 
                                    @endforeach
                                </select> 
                            </div>
                            <div class="col-5 mb-1">
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
            $('#more-ganp-search').fadeIn(500);
            $('#reaplayer').addClass('htp-20');
        }else{
            $('#more-ganp-search').hide();
            $('#reaplayer').removeClass('htp-20');
        }
        this.search = !this.search;
    })
});
</script>
  {{-- --}}