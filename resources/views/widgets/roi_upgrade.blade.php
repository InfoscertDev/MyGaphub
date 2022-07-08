<div class="mx-auto">
    @if($roi_detail['time_finiancial'] > 0)
        <div>
            <div class="form-sheet sheet-plain">
                <ul class="lists">
                    <li class="details bs-none">
                        <div class="detail-left pr-2">
                            <h4 class="detail-title text-capitalize mt-3">Time to Financial Independence</h4>
                        </div>
                        <div class="detail-right px-0">
                            <div class="d-flex">
                                <h5 class="col-total simp-box wd-7 mr-3 py-2 px-4 bold">{{number_format($roi_detail['time_finiancial'], 0) }}</h5> 
                                <h4 class="mt-2 mr-3" style="font"> {{ ($roi_detail['time_finiancial'] > 1 ) ? 'Years' : 'Year'}} </h4>
                            </div>
                            {{-- <div class="col-total"> {{$current}}{{ number_format($invest)}} </div> --}}
                            <div class="text-right">
                                <a  data-target="#roiDetailModal" data-toggle="modal" onclick="refreshJouney()"  class="text-dark text-underline small">View Details </a>
                                @include('widgets.roi_details')
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="">atart
            <div class="form-sheet sheet-plain">
                <h4 class="text-center mb-1 bold">Thinking of Investing more with higher ROI% </h4>
                <h6 class="text-center">Use the +/- buttons below</h6>
                <form action="{{ route('360.store.roi') }}" method="post">
                    @csrf
                    <ul class="lists">
                        <li class="row mx-0">
                            <div class="col-md-8">
                                <label for="">Monthly Asset Portfolio Income (APi) needed</label>
                            </div>
                            <div class="col-md-4">
                                <div class="price-wrap">
                                    <label for="" class="price-currency mt-2">{{ $currency }}</label>
                                    <input type="text" disabled value="{{ number_format($improve_status['monthly_asset']) }}" class="" name="cost" id="cost" required>
                                </div> 
                            </div>
                        </li>
                        <li class="text-center"> 
                            <h6 class="lift-top small">How much can you set aside monthly for investment?</h6>
                            <div class="justify-content-center d-flex">
                                <span class=""> <button type="button" class="btn btn-sm btn-round btn-primary" id="reduce_investment"><i class="fa fa-minus"></i></button></span>  
                                <h5 class="mx-3">{{ $currency }} <input type="number" step="any" required class="text-primary px-0 fs-18 bold bg-none bs-none br-none disabled"  style="width:95px;" value="{{$improve_status['investment']}}" name="investment" id="improve_investment"></h5>
                                <span class=""> <button type="button" class="btn btn-sm btn-round btn-primary" id="increase_investment"><i class="fa fa-plus"></i></button></span>  
                            </div>
                        </li>
                        <li class="text-center">
                            <h6 class="lift-top small">What is your expected Return on Capital Employed (ROCE)?</h6>
                            <div class="justify-content-center d-flex">
                                <span class=""> <button type="button" class="btn btn-sm btn-round btn-primary" id="reduce_roce"><i class="fa fa-minus"></i></button></span>  
                                <h5 class="mx-4"> <input type="number" required class="text-primary px-0 fs-18 bold bg-none bs-none br-none disabled"  style="width:75px" value="{{$improve_status['roce']}}" name="roce" id="improve_roce">%</h5>
                                <span class=""> <button type="button" class="btn btn-sm btn-round btn-primary" id="increase_roce"><i class="fa fa-plus"></i></button></span>  
                            </div> 
                        </li>
                    </ul>
                    <div class="text-center">
                        <button type="submit" class="btn btn-pry px-2">Update Result</button>
                    </div>
                </form>
            </div>
        </div> 
    @else
        <div class="text-center my-5">
            <div class="rounded-1p bg-primary p-2 mx-auto brad" style="width: 80%;">  
               <h5 class=""> Congratulations! You are Financially Independent!! </h5>
            </div>
            <p class="text-center py-3">
                <a href="{{ route('user.opportunity', 'appreciating')}}" class="text-dark">
                    <i class="text-underline"> Now, concentrate on expanding your wealth for posterity!</i> <br>
                    <i class="text-underline"> Acquire more assets for your portfolio</i>
                </a>
            </p>
        </div>
    @endif
</div>  
<script> 
        $(function() {
            var investment = document.getElementById('improve_investment');
            var   roce = document.getElementById('improve_roce');
            $('#reduce_investment').on('click', function(e){
               if(investment.value > 0){
                    // investment.setAttribute('value', +investment.value - 10);
                    investment.value = +investment.value - 10;
               }else{
                    reduce_investment.disabled = true;
               } 
            });
            $('#increase_investment').on('click', function(e){
                investment.value = +investment.value + 10;
                if(investment.value > 0) reduce_investment.disabled = false;
            });
            $('#increase_investment').on('mousedown', function(e){
                setTimeout(function() {
                    investment.value = +investment.value + 10;
                    if(investment.value > 0) reduce_investment.disabled = false;
                }, 500);
            });
            $('#reduce_roce').on('click', function(e){
               if(roce.value > 0){
                    // roce.setAttribute('value', +roce.value - 10);
                    roce.value = +roce.value - 1;
               }else{
                    reduce_roce.disabled = true;
               } 
            });
            $('#increase_roce').on('click', function(e){ 
                if(roce.value <= 100) roce.value = +roce.value + 1;
                if(roce.value > 0) reduce_roce.disabled = false;
            });
        });
</script>