@section('script')
<script>
    var ctx = document.getElementById('sevenGChart');
    var bespoke = document.getElementById('bespokeChart');
    var steps = {{ json_encode($steps) }}
    var backgrounds = <?php echo  json_encode($backgrounds) ?>;
   
    if(ctx){
        ctx.getContext('2d');
        var myRadarChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels: ["Grand", "Freedom", "Education", "Debt", "Credit", "Beta", "Alpha"],
                datasets: [{
                    label: "7G",
                    data: steps,
                    borderColor: backgrounds,
                    backgroundColor: backgrounds,
                }]
            },
            // Configuration options go here
            options:{
                legend: { display: false },
                onClick: graphClickEvent ,
                scales: {
                    xAxes:[{
                        display: true,
                        ticks: { beginAtZero: true,  min: 0, max: 100, stepSize: 25}
                    }]
                },
            },
        });
        // Chart.defaults.global.legend.onClick.call(this, evt, item)

        function graphClickEvent(event, activePoints) {
            if(activePoints[0]){
                var index = activePoints[0]["_index"];
                if(index == 0) $('#grandModal').modal('show');
                if(index == 1) $('#freedomModal').modal('show');
                if(index == 2) $('#educationModal').modal('show');
                if(index == 3) $('#deptModal').modal('show');
                if(index == 4) $('#creditModal').modal('show');
                if(index == 5) $('#betaModal').modal('show');
                if(index == 6) $('#alphaModal').modal('show');
            }
            var col;
            this.getElementsAtEventForMode(event, "y", 1).forEach(function(item) {col = +item._index  + 1});
            if (!col || activePoints[0] ) {
                return;
            } 
            if(col == 1) $('#grandExplain').modal('show');
            if(col == 2) $('#freedomExplain').modal('show');
            if(col == 3) $('#educationExplain').modal('show');
            if(col == 4) $('#deptExplain').modal('show');
            if(col == 5) $('#creditExplain').modal('show');
            if(col == 6) $('#betaExplain').modal('show');
            if(col == 7) $('#alphaExplain').modal('show');
        }

    }
    
    var bespoke_labels = <?php echo  json_encode($bespoke_labels) ?>;
    var bespoke_values = <?php echo  json_encode($bespoke_values) ?>;
    var bespoke_bg = <?php echo  json_encode($bespoke_bg) ?>;
    var user_bespokes = <?php echo  json_encode($user_bespokes) ?>;
    var index = 0;

    if(bespoke){
        bespoke.getContext('2d');
        var chart = new Chart(bespoke, {
            type: 'horizontalBar',
            data: {
                labels: bespoke_labels,
                datasets: [{
                    data: bespoke_values,
                    borderColor: bespoke_bg, 
                    backgroundColor: bespoke_bg, 
                }]
            },
            // Configuration options go here
            options:{
                legend: { display: false },
                onClick: bespokeClickEvent,
                scales: {
                    xAxes:[{
                        display: true,
                        ticks: { beginAtZero: true,  min: 0, max: 100, stepSize: 25}
                    }]
                },
            }
        });
        function bespokeClickEvent(event, activePoints){
            if(activePoints[0]){
                var index = activePoints[0]["_index"];
                if(index == 0) $('#firstBespokeModal').modal('show');
                if(index == 1) $('#secondBespokeModal').modal('show');
                if(index == 2) $('#thirdBespokeModal').modal('show');
                if(index == 3) $('#fourthBespokeModal').modal('show');
                if(index == 4) $('#fifthBespokeModal').modal('show');
                if(index == 5) $('#sixthBespokeModal').modal('show');
                if(index == 6) $('#sevenBespokeModal').modal('show');
            }
            var col;
            this.getElementsAtEventForMode(event, "y", 1).forEach(function(item) {col = +item._index  + 1});
            if (!col || activePoints[0] ) {
                return;
            } 
            if(col == 1) $('#firstBespokeExplain').modal('show');
            if(col == 2) $('#secondBespokeExplain').modal('show');
            if(col == 3) $('#thirdBespokeExplain').modal('show');
            if(col == 4) $('#fourthBespokeExplain').modal('show');
            if(col == 5) $('#fifthBespokeExplain').modal('show');
            if(col == 6) $('#sixthBespokeExplain').modal('show');
            if(col == 7) $('#seventhBespokeExplain').modal('show');
        }
    }        
</script>
 
@if(isset($user_bespokes[0]))
    <div class="modal fade" id="firstBespokeModal" tabindex="-1" role="dialog" aria-labelledby="bespokeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-header">
                    <h5 class="modal-title" id="bespokeLabel">{{$user_bespokes[0]->kpi_name}} ({{ str_limit($user_bespokes[0]->kpi_details, 35) }})</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div> 
                <div class="modal-body">
                    <div class="form-plain form-reg wd-f">
                        <h5 class="text-left txt-primary">{{$user_bespokes[0]->kpi_name}} - {{ $user_bespokes[0]->bespoke_type == 'saveup' ? 'Saving Up Target' : 'Debt Elimination Target' }}</h5>
                        <h5 class="text-center text-info" id="err_first"> </h5> 
                        
                        <form method="POST" onsubmit="return baseValidate()"  class="seveng" id="first"  action="{{ route('update.bespoke', $user_bespokes[0]->id) }}">
                            @csrf 
                            @if($user_bespokes[0]->account_header)  
                                <input type="hidden" name="biunxicmkxbjvnjncm" value="{{$user_bespokes[0]->account_header}}">
                            @endif
                            <ul class="lists py-2 mb-3">
                                @if($user_bespokes[0]->bespoke_type == 'dept') 
                                    <li class="row">
                                            <div class="col-md-6">
                                                <div class="text-right mt-3">
                                                    <label class="">Baseline (your origianl balance): </label>
                                                </div> 
                                            </div>
                                        <div class="col-md-6">
                                            <div class="price-wrap">
                                                <label for="" class="price-currency">{{  ($user_bespokes[0]->account_currency) ? explode(" ",$user_bespokes[0]->account_currency)[0] : $symbol }}</label>
                                                <input type="number"  value="{{$user_bespokes[0]->baseline}}" onfocus="focalPoint(this)" min="0" class="" name="baseline" id="first_baseline" required>
                                            </div> 
                                        </div>
                                    </li>
                                @endif
                                <li class="row">
                                    <div class="col-md-6">
                                        <div class="text-right mt-3">
                                            <label class="">Current (your balance today):</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="price-wrap">
                                        <label for="" class="price-currency">{{  ($user_bespokes[0]->account_currency) ? explode(" ",$user_bespokes[0]->account_currency)[0] : $symbol }}</label>
                                        <input type="number"  onfocus="focalPoint(this)" min="0"  class="" value="{{$user_bespokes[0]->current}}" name="current" id="first_current" required>
                                        </div> 
                                    </div>
                                </li>
                                @if($user_bespokes[0]->bespoke_type == 'saveup')
                                    <li class="row">
                                        <div class="col-md-6">
                                            <div class="text-right mt-3">
                                                <label class="">Target :</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="price-wrap">
                                                <label for="" class="price-currency">{{  ($user_bespokes[0]->account_currency) ? explode(" ",$user_bespokes[0]->account_currency)[0] : $symbol }}</label>
                                                <input type="number"  min="0" onfocus="focalPoint(this)" value="{{$user_bespokes[0]->target}}"  class="" name="target" id="target" required>
                                            </div> 
                                        </div>
                                    </li>
                                @endif
                                <span class="text-danger" id="first_error"></span>
                            </ul>
                            <br> 
                                <div class="my-2 text-center">
                                    <h3 style="color: {{  $bespoke_bg[0] }}">STATUS: {{ $bespoke_values[0] }}%</h3>
                                </div>
                                <div class="row my-3 justify-content-center">
                                    <div class="col-md-6 col-sm-12 mb-3"> 
                                        <h5 class="pl-3 bold">Personal Strategy</h5>
                                        <div class="plan-box elevate-3">
                                            <div class="form-group">
                                                <textarea  placeholder="Document your plan" name="strategy" id="" cols="30" rows="5" class="form-control">{{$user_bespokes[0]->extra}}</textarea>
                                            </div> 
                                            <div class="text-right"> 
                                                <button type="submit"  class="btn btn-sm btn-pry px-2">Update</button>
                                                <a href="" class="ml-2 mr-4">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            <div class="text-center mb-4">
                                <button class="btn btn-pry px-5" type="button">
                                    @if ($user_bespokes[0]->bespoke_type == 'saveup')
                                        <a href="{{route('360.cash', ['bes' => $user_bespokes[0]->kpi ])}}" class="card-link text-white">View More</a> 
                                    @else
                                        <a href="{{route('360.liabilities',['bes' => $user_bespokes[0]->kpi ])}}" class="card-link text-white">View More</a> 
                                    @endif 
                                </button>
                            </div>
                        </form>
                        <div class="text-center mb-4">
                            {{-- <button class="btn btn-pry px-2" type="submit">Enter</button> --}}
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    @if($user_bespokes[0]->bespoke_type == 'dept')
        <script>
            function baseValidate(){
                let baseline = document.getElementById('first_baseline').value,
                    current = document.getElementById('first_current').value,
                    error = document.getElementById('first_error');
                    error.textContent ="";
                if(+current > +baseline){
                    error.textContent = "The current balance can't be greater than baseline.";
                    return false;
                }  
            }
        </script>
    @endif
@endif

@if(isset($user_bespokes[1]))
    <div class="modal fade" id="secondBespokeModal" tabindex="-1" role="dialog" aria-labelledby="bespokeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-header">
                    <h5 class="modal-title" id="bespokeLabel">{{$user_bespokes[1]->kpi_name}} ({{ str_limit($user_bespokes[1]->kpi_details, 35) }})</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div> 
                <div class="modal-body">
                    <div class="form-plain form-reg wd-f">
                        <h5 class="text-left txt-primary">{{$user_bespokes[1]->kpi_name}} - {{ $user_bespokes[1]->bespoke_type == 'saveup' ? 'Saving Up Target' : 'Debt Elimination Target' }}</h5>
                        <h5 class="text-center text-info" id="err_two"> </h5> 
                        
                        <form method="POST" onsubmit="return baseValidate2()"  class="seveng" id="first"  action="{{ route('update.bespoke', $user_bespokes[1]->id) }}">
                            @csrf 
                            
                            @if($user_bespokes[1]->account_header) 
                                <input type="hidden" name="biunxicmkxbjvnjncm" value="{{$user_bespokes[1]->account_header}}">
                            @endif
                            <ul class="lists py-2 mb-3">
                                @if($user_bespokes[1]->bespoke_type == 'dept')
                                    <li class="row">
                                            <div class="col-md-6">
                                                <div class="text-right mt-3">
                                                    <label class="">Baseline (your origianl balance): </label>
                                                </div> 
                                            </div>
                                        <div class="col-md-6">
                                            <div class="price-wrap">
                                                <label for="" class="price-currency">{{  ($user_bespokes[1]->account_currency) ? explode(" ",$user_bespokes[1]->account_currency)[0] : $symbol }}</label>
                                                <input type="number"  value="{{$user_bespokes[1]->baseline}}" onfocus="focalPoint(this)" min="0" class="" name="baseline" id="two_baseline" required>
                                            </div> 
                                        </div>
                                    </li>
                                @endif
                                <li class="row">
                                    <div class="col-md-6">
                                        <div class="text-right mt-3">
                                            <label class="">Current (your balance today):</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="price-wrap">
                                        <label for="" class="price-currency">{{  ($user_bespokes[1]->account_currency) ? explode(" ",$user_bespokes[1]->account_currency)[0] : $symbol }}</label>
                                        <input type="number"  onfocus="focalPoint(this)" min="0"  class="" value="{{$user_bespokes[1]->current}}" name="current" id="two_current" required>
                                        </div> 
                                    </div>
                                </li>
                                @if($user_bespokes[1]->bespoke_type == 'saveup')
                                    <li class="row">
                                        <div class="col-md-6">
                                            <div class="text-right mt-3">
                                                <label class="">Target :</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="price-wrap">
                                                <label for="" class="price-currency">{{  ($user_bespokes[1]->account_currency) ? explode(" ",$user_bespokes[1]->account_currency)[0] : $symbol }}</label>
                                                <input type="number"  min="0" onfocus="focalPoint(this)" value="{{$user_bespokes[1]->target}}"  class="" name="target" id="target" required>
                                            </div> 
                                        </div>
                                    </li>
                                @endif
                                <span class="text-danger" id="two_error"></span>
                            </ul>
                            <br> 
                            
                                <div class="my-2 text-center">
                                    <h3 style="color: {{  $bespoke_bg[1] }}">STATUS: {{ $bespoke_values[1] }}%</h3>
                                </div>
                                <div class="row my-3 justify-content-center">
                                    <div class="col-md-6 col-sm-12 mb-3"> 
                                        <h5 class="pl-3 bold">Personal Strategy</h5>
                                        <div class="plan-box elevate-3">
                                            <div class="form-group">
                                                <textarea  placeholder="Document your plan" name="strategy" id="" cols="30" rows="5" class="form-control">{{$user_bespokes[1]->extra}}</textarea>
                                            </div> 
                                            <div class="text-right"> 
                                                <button type="submit"  class="btn btn-sm btn-pry px-2">Update</button>
                                                <a href="" class="ml-2 mr-4">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            
                            <div class="text-center mb-4">
                                <button class="btn btn-pry px-5" type="button">
                                    @if ($user_bespokes[1]->bespoke_type == 'saveup')
                                        <a href="{{route('360.cash', ['bes' => $user_bespokes[1]->kpi ])}}" class="card-link text-white">View More</a> 
                                    @else
                                        <a href="{{route('360.liabilities',['bes' => $user_bespokes[1]->kpi ])}}" class="card-link text-white">View More</a> 
                                    @endif
                                </button>
                            </div>
                        </form>
                        <div class="text-center mb-4">
                            {{-- <button class="btn btn-pry px-2" type="submit">Enter</button> --}}
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    @if($user_bespokes[1]->bespoke_type == 'dept')
        <script>
            function baseValidate2(){ 
                let baseline = document.getElementById('two_baseline').value,
                    current = document.getElementById('two_current').value,
                    error = document.getElementById('two_error');
                    error.textContent ="";
                if(+current > +baseline){
                    error.textContent = "The current balance can't be greater than baseline.";
                    return false;
                }  
            }
        </script> 
    @endif
@endif

@if(isset($user_bespokes[2]))
    <div class="modal fade" id="thirdBespokeModal" tabindex="-1" role="dialog" aria-labelledby="bespokeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-header">
                    <h5 class="modal-title" id="bespokeLabel">{{$user_bespokes[2]->kpi_name}} ({{ str_limit($user_bespokes[2]->kpi_details, 35) }})</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div> 
                <div class="modal-body">
                    <div class="form-plain form-reg wd-f">
                        <h5 class="text-left txt-primary">{{$user_bespokes[2]->kpi_name}} - {{ $user_bespokes[2]->bespoke_type == 'saveup' ? 'Saving Up Target' : 'Debt Elimination Target' }}</h5>
                        <h5 class="text-center text-info" id="err_dept"> </h5> 
                        <form method="POST" onsubmit="return baseValidate3()"  class="seveng" id="first"  action="{{ route('update.bespoke', $user_bespokes[2]->id) }}">
                            @csrf 
                                
                                @if($user_bespokes[2]->account_header) 
                                    <input type="hidden" name="biunxicmkxbjvnjncm" value="{{$user_bespokes[2]->account_header}}">
                                @endif
                                <ul class="lists py-2 mb-3">
                                    @if($user_bespokes[2]->bespoke_type == 'dept')
                                        <li class="row">
                                                <div class="col-md-6">
                                                    <div class="text-right mt-3">
                                                        <label class="">Baseline (your origianl balance): </label>
                                                    </div> 
                                                </div>
                                            <div class="col-md-6">
                                                <div class="price-wrap">
                                                    <label for="" class="price-currency">{{  ($user_bespokes[2]->account_currency) ? explode(" ",$user_bespokes[2]->account_currency)[0] : $symbol }}</label>
                                                    <input type="number"  value="{{$user_bespokes[2]->baseline}}" onfocus="focalPoint(this)" min="0" class="" name="baseline" id="three_baseline" required>
                                                </div> 
                                            </div>
                                        </li>
                                    @endif
                                    <li class="row">
                                        <div class="col-md-6">
                                            <div class="text-right mt-3">
                                                <label class="">Current (your balance today):</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="price-wrap">
                                            <label for="" class="price-currency">{{  ($user_bespokes[2]->account_currency) ? explode(" ",$user_bespokes[2]->account_currency)[0] : $symbol }}</label>
                                            <input type="number"  onfocus="focalPoint(this)" min="0"  class="" value="{{$user_bespokes[2]->current}}" name="current" id="three_current" required>
                                            </div> 
                                        </div>
                                    </li>
                                    @if($user_bespokes[2]->bespoke_type == 'saveup')
                                        <li class="row">
                                            <div class="col-md-6">
                                                <div class="text-right mt-3">
                                                    <label class="">Target :</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="price-wrap">
                                                    <label for="" class="price-currency">{{  ($user_bespokes[2]->account_currency) ? explode(" ",$user_bespokes[2]->account_currency)[0] : $symbol }}</label>
                                                    <input type="number"  min="0" onfocus="focalPoint(this)" value="{{$user_bespokes[2]->target}}"  class="" name="target" id="target" required>
                                                </div> 
                                            </div>
                                        </li>
                                    @endif
                                    <span class="text-danger" id="three_error"></span>
                                </ul>
                                <br> 
                                
                                    <div class="my-2 text-center">
                                        <h3 style="color: {{  $bespoke_bg[2] }}">STATUS: {{ $bespoke_values[2] }}%</h3>
                                    </div>
                                    <div class="row my-3 justify-content-center">
                                        <div class="col-md-6 col-sm-12 mb-3"> 
                                            <h5 class="pl-3 bold">Personal Strategy</h5>
                                            <div class="plan-box elevate-3">
                                                <div class="form-group">
                                                    <textarea  placeholder="Document your plan" name="strategy" id="" cols="30" rows="5" class="form-control">{{$user_bespokes[2]->extra}}</textarea>
                                                </div> 
                                                <div class="text-right"> 
                                                    <button type="submit"  class="btn btn-sm btn-pry px-2">Update</button>
                                                    <a href="" class="ml-2 mr-4">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    
                                <div class="text-center mb-4">
                                    <button class="btn btn-pry px-5" type="button">
                                        @if ($user_bespokes[2]->bespoke_type == 'saveup')
                                            <a href="{{route('360.cash', ['bes' => $user_bespokes[2]->kpi ])}}" class="card-link text-white">View More</a> 
                                        @else
                                            <a href="{{route('360.liabilities',['bes' => $user_bespokes[2]->kpi ])}}" class="card-link text-white">View More</a> 
                                        @endif
                                    </button>
                                </div>
                        </form>
                        <div class="text-center mb-4">
                            {{-- <button class="btn btn-pry px-2" type="submit">Enter</button> --}}
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    @if($user_bespokes[2]->bespoke_type == 'dept')
        <script>
            function baseValidate3(){ 
                let baseline = document.getElementById('three_baseline').value,
                    current = document.getElementById('three_current').value,
                    error = document.getElementById('three_error');
                    error.textContent ="";
                if(+current > +baseline){
                    error.textContent = "The current balance can't be greater than baseline.";
                    return false;
                }  
            }
        </script>
    @endif
@endif

@if(isset($user_bespokes[3]))
    <div class="modal fade" id="fourthBespokeModal" tabindex="-1" role="dialog" aria-labelledby="bespokeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-header">
                    <h5 class="modal-title" id="bespokeLabel">{{$user_bespokes[3]->kpi_name}} ({{ str_limit($user_bespokes[3]->kpi_details, 35) }})</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div> 
                <div class="modal-body">
                    <div class="form-plain form-reg wd-f">
                        <h5 class="text-left txt-primary">{{$user_bespokes[3]->kpi_name}} - {{ $user_bespokes[3]->bespoke_type == 'saveup' ? 'Saving Up Target' : 'Debt Elimination Target' }}</h5>
                        <h5 class="text-center text-info" id="err_dept"> </h5> 
                        
                        <form method="POST" onsubmit="return baseValidate4()"  class="seveng" id="first"  action="{{ route('update.bespoke', $user_bespokes[3]->id) }}">
                                    @csrf 
                                    
                            @if($user_bespokes[3]->account_header) 
                                <input type="hidden" name="biunxicmkxbjvnjncm" value="{{$user_bespokes[3]->account_header}}">
                            @endif
                                    <ul class="lists py-2 mb-3">
                                        @if($user_bespokes[3]->bespoke_type == 'dept')
                                            <li class="row">
                                                    <div class="col-md-6">
                                                        <div class="text-right mt-3">
                                                            <label class="">Baseline (your origianl balance): </label>
                                                        </div> 
                                                    </div>
                                                <div class="col-md-6">
                                                    <div class="price-wrap">
                                                        <label for="" class="price-currency">{{  ($user_bespokes[3]->account_currency) ? explode(" ",$user_bespokes[3]->account_currency)[0] : $symbol }}</label>
                                                        <input type="number"  value="{{$user_bespokes[3]->baseline}}" onfocus="focalPoint(this)" min="0" class="" name="baseline" id="four_baseline" required>
                                                    </div> 
                                                </div>
                                            </li>
                                        @endif
                                        <li class="row">
                                            <div class="col-md-6">
                                                <div class="text-right mt-3">
                                                    <label class="">Current (your balance today):</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="price-wrap">
                                                <label for="" class="price-currency">{{  ($user_bespokes[3]->account_currency) ? explode(" ",$user_bespokes[3]->account_currency)[0] : $symbol }}</label>
                                                <input type="number"  onfocus="focalPoint(this)" min="0"  class="" value="{{$user_bespokes[3]->current}}" name="current" id="four_current" required>
                                                </div> 
                                            </div>
                                        </li>
                                        @if($user_bespokes[3]->bespoke_type == 'saveup')
                                            <li class="row">
                                                <div class="col-md-6">
                                                    <div class="text-right mt-3">
                                                        <label class="">Target :</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="price-wrap">
                                                        <label for="" class="price-currency">{{  ($user_bespokes[3]->account_currency) ? explode(" ",$user_bespokes[3]->account_currency)[0] : $symbol }}</label>
                                                        <input type="number"  min="0" onfocus="focalPoint(this)" value="{{$user_bespokes[3]->target}}"  class="" name="target" id="target" required>
                                                    </div> 
                                                </div>
                                            </li>
                                        @endif
                                        <span class="text-danger" id="four_error"></span>
                                    </ul>
                                    <br> 
                                    
                                        <div class="my-2 text-center">
                                            <h3 style="color: {{  $bespoke_bg[3] }}">STATUS: {{ $bespoke_values[3] }}%</h3>
                                        </div>
                                        <div class="row my-3 justify-content-center">
                                            <div class="col-md-6 col-sm-12 mb-3"> 
                                                <h5 class="pl-3 bold">Personal Strategy</h5>
                                                <div class="plan-box elevate-3">
                                                    <div class="form-group">
                                                        <textarea  placeholder="Document your plan" name="strategy" id="" cols="30" rows="5" class="form-control">{{$user_bespokes[3]->extra}}</textarea>
                                                    </div> 
                                                    <div class="text-right"> 
                                                        <button type="submit"  class="btn btn-sm btn-pry px-2">Update</button>
                                                        <a href="" class="ml-2 mr-4">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    
                                    <div class="text-center mb-4">
    
                                <button class="btn btn-pry px-5" type="button">
                                    @if ($user_bespokes[3]->bespoke_type == 'saveup')
                                        <a href="{{route('360.cash', ['bes' => $user_bespokes[3]->kpi ])}}" class="card-link text-white">View More</a> 
                                    @else
                                        <a href="{{route('360.liabilities',['bes' => $user_bespokes[3]->kpi ])}}" class="card-link text-white">View More</a> 
                                    @endif
                                </button>
                                    </div>
                                </form>
                        <div class="text-center mb-4">
                            {{-- <button class="btn btn-pry px-2" type="submit">Enter</button> --}}
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    
    @if($user_bespokes[3]->bespoke_type == 'dept')
        <script>
            function baseValidate4(){ 
                let baseline = document.getElementById('four_baseline').value,
                    current = document.getElementById('four_current').value,
                    error = document.getElementById('four_error');
                    error.textContent ="";
                if(+current > +baseline){
                    error.textContent = "The current balance can't be greater than baseline.";
                    return false;
                }  
            }
        </script>
    @endif
@endif

@if(isset($user_bespokes[4]))
    <div class="modal fade" id="fifthBespokeModal" tabindex="-1" role="dialog" aria-labelledby="bespokeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-header">
                    <h5 class="modal-title" id="bespokeLabel">{{$user_bespokes[4]->kpi_name}} ({{ str_limit($user_bespokes[4]->kpi_details, 35) }})</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div> 
                <div class="modal-body">
                    <div class="form-plain form-reg wd-f">
                        <h5 class="text-left txt-primary">{{$user_bespokes[4]->kpi_name}} - {{ $user_bespokes[4]->bespoke_type == 'saveup' ? 'Saving Up Target' : 'Debt Elimination Target' }}</h5>
                        <h5 class="text-center text-info" id="err_dept"> </h5> 
                        
                        <form method="POST" onsubmit="return baseValidate5()"  class="seveng" id="first"  action="{{ route('update.bespoke', $user_bespokes[4]->id) }}">
                            @csrf 
                            
                            @if($user_bespokes[4]->account_header) 
                                <input type="hidden" name="biunxicmkxbjvnjncm" value="{{$user_bespokes[4]->account_header}}">
                            @endif
                            <ul class="lists py-2 mb-3">
                                @if($user_bespokes[4]->bespoke_type == 'dept')
                                    <li class="row">
                                            <div class="col-md-6">
                                                <div class="text-right mt-3">
                                                    <label class="">Baseline (your origianl balance): </label>
                                                </div> 
                                            </div>
                                        <div class="col-md-6">
                                            <div class="price-wrap">
                                                <label for="" class="price-currency">{{  ($user_bespokes[4]->account_currency) ? explode(" ",$user_bespokes[4]->account_currency)[0] : $symbol }}</label>
                                                <input type="number"  value="{{$user_bespokes[4]->baseline}}" onfocus="focalPoint(this)" min="0" class="" name="baseline" id="four_baseline" required>
                                            </div> 
                                        </div>
                                    </li>
                                @endif
                                <li class="row">
                                    <div class="col-md-6">
                                        <div class="text-right mt-3">
                                            <label class="">Current (your balance today):</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="price-wrap">
                                        <label for="" class="price-currency">{{  ($user_bespokes[4]->account_currency) ? explode(" ",$user_bespokes[4]->account_currency)[0] : $symbol }}</label>
                                        <input type="number"  onfocus="focalPoint(this)" min="0"  class="" value="{{$user_bespokes[4]->current}}" name="current" id="four_current" required>
                                        </div> 
                                    </div>
                                </li>
                                @if($user_bespokes[4]->bespoke_type == 'saveup')
                                    <li class="row">
                                        <div class="col-md-6">
                                            <div class="text-right mt-3">
                                                <label class="">Target :</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="price-wrap">
                                                <label for="" class="price-currency">{{  ($user_bespokes[4]->account_currency) ? explode(" ",$user_bespokes[4]->account_currency)[0] : $symbol }}</label>
                                                <input type="number"  min="0" onfocus="focalPoint(this)" value="{{$user_bespokes[4]->target}}"  class="" name="target" id="target" required>
                                            </div> 
                                        </div>
                                    </li>
                                @endif
                                <span class="text-danger" id="four_error"></span>
                            </ul>
                            <br> 
                            
                                <div class="my-2 text-center">
                                    <h3 style="color: {{  $bespoke_bg[4] }}">STATUS: {{ $bespoke_values[4] }}%</h3>
                                </div>
                                <div class="row my-3 justify-content-center">
                                    <div class="col-md-6 col-sm-12 mb-3"> 
                                        <h5 class="pl-3 bold">Personal Strategy</h5>
                                        <div class="plan-box elevate-3">
                                            <div class="form-group">
                                                <textarea  placeholder="Document your plan" name="strategy" id="" cols="30" rows="5" class="form-control">{{$user_bespokes[4]->extra}}</textarea>
                                            </div> 
                                            <div class="text-right"> 
                                                <button type="submit"  class="btn btn-sm btn-pry px-2">Update</button>
                                                <a href="" class="ml-2 mr-4">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            
                            <div class="text-center mb-4">
                                <button class="btn btn-pry px-5" type="button"> 
                                    @if ($user_bespokes[4]->bespoke_type == 'saveup')
                                        <a href="{{route('360.cash', ['bes' => $user_bespokes[4]->kpi ])}}" class="card-link text-white">View More</a> 
                                    @else
                                        <a href="{{route('360.liabilities',['bes' => $user_bespokes[4]->kpi ])}}" class="card-link text-white">View More</a> 
                                    @endif
                            </div>
                        </form>
                        <div class="text-center mb-4">
                            {{-- <button class="btn btn-pry px-2" type="submit">Enter</button> --}}
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    @if($user_bespokes[4]->bespoke_type == 'dept')
        <script>
            function baseValidate5(){ 
                let baseline = document.getElementById('four_baseline').value,
                    current = document.getElementById('four_current').value,
                    error = document.getElementById('four_error');
                    error.textContent ="";
                if(+current > +baseline){
                    error.textContent = "The current balance can't be greater than baseline.";
                    return false;
                }  
            }
        </script>
    @endif
@endif

@if(isset($user_bespokes[5]))
    <div class="modal fade" id="sixthBespokeModal" tabindex="-1" role="dialog" aria-labelledby="bespokeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-header">
                    <h5 class="modal-title" id="bespokeLabel">{{$user_bespokes[5]->kpi_name}} ({{ str_limit($user_bespokes[5]->kpi_details, 35) }})</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div> 
                <div class="modal-body">
                    <div class="form-plain form-reg wd-f">
                        <h5 class="text-left txt-primary">{{$user_bespokes[5]->kpi_name}} - {{ $user_bespokes[5]->bespoke_type == 'saveup' ? 'Saving Up Target' : 'Debt Elimination Target' }}</h5>
                        <h5 class="text-center text-info" id="err_dept"> </h5> 
                        
                        <form method="POST" onsubmit="return baseValidate6()"  class="seveng" id="first"  action="{{ route('update.bespoke', $user_bespokes[5]->id) }}">
                                    @csrf 
                                    
                            @if($user_bespokes[5]->account_header) 
                                <input type="hidden" name="biunxicmkxbjvnjncm" value="{{$user_bespokes[5]->account_header}}">
                            @endif
                                    <ul class="lists py-2 mb-3">
                                        @if($user_bespokes[5]->bespoke_type == 'dept')
                                            <li class="row">
                                                    <div class="col-md-6">
                                                        <div class="text-right mt-3">
                                                            <label class="">Baseline (your origianl balance): </label>
                                                        </div> 
                                                    </div>
                                                <div class="col-md-6">
                                                    <div class="price-wrap">
                                                        <label for="" class="price-currency">{{  ($user_bespokes[5]->account_currency) ? explode(" ",$user_bespokes[5]->account_currency)[0] : $symbol }}</label>
                                                        <input type="number"  value="{{$user_bespokes[5]->baseline}}" onfocus="focalPoint(this)" min="0" class="" name="baseline" id="six_baseline" required>
                                                    </div> 
                                                </div>
                                            </li>
                                        @endif
                                        <li class="row">
                                            <div class="col-md-6">
                                                <div class="text-right mt-3">
                                                    <label class="">Current (your balance today):</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="price-wrap">
                                                <label for="" class="price-currency">{{  ($user_bespokes[5]->account_currency) ? explode(" ",$user_bespokes[5]->account_currency)[0] : $symbol }}</label>
                                                <input type="number"  onfocus="focalPoint(this)" min="0"  class="" value="{{$user_bespokes[5]->current}}" name="current" id="six_current" required>
                                                </div> 
                                            </div>
                                        </li>
                                        @if($user_bespokes[5]->bespoke_type == 'saveup')
                                            <li class="row">
                                                <div class="col-md-6">
                                                    <div class="text-right mt-3">
                                                        <label class="">Target :</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="price-wrap">
                                                        <label for="" class="price-currency">{{  ($user_bespokes[5]->account_currency) ? explode(" ",$user_bespokes[5]->account_currency)[0] : $symbol }}</label>
                                                        <input type="number"  min="0" onfocus="focalPoint(this)" value="{{$user_bespokes[5]->target}}"  class="" name="target" id="target" required>
                                                    </div> 
                                                </div>
                                            </li>
                                        @endif
                                        <span class="text-danger" id="six_error"></span>
                                    </ul>
                                    <br> 
                                    
                                        <div class="my-2 text-center">
                                            <h3 style="color: {{  $bespoke_bg[5] }}">STATUS: {{ $bespoke_values[5] }}%</h3>
                                        </div>
                                        <div class="row my-3 justify-content-center">
                                            <div class="col-md-6 col-sm-12 mb-3"> 
                                                <h5 class="pl-3 bold">Personal Strategy</h5>
                                                <div class="plan-box elevate-3">
                                                    <div class="form-group">
                                                        <textarea  placeholder="Document your plan" name="strategy" id="" cols="30" rows="5" class="form-control">{{$user_bespokes[5]->extra}}</textarea>
                                                    </div> 
                                                    <div class="text-right"> 
                                                        <button type="submit"  class="btn btn-sm btn-pry px-2">Update</button>
                                                        <a href="" class="ml-2 mr-4">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    
                                    <div class="text-center mb-4">
    
                                <button class="btn btn-pry px-5" type="button">
                                    @if ($user_bespokes[5]->bespoke_type == 'saveup')
                                        <a href="{{route('360.cash', ['bes' => $user_bespokes[5]->kpi ])}}" class="card-link text-white">View More</a> 
                                    @else
                                        <a href="{{route('360.liabilities',['bes' => $user_bespokes[5]->kpi ])}}" class="card-link text-white">View More</a> 
                                    @endif
                                </button>
                                    </div>
                                </form>
                        <div class="text-center mb-4">
                            {{-- <button class="btn btn-pry px-2" type="submit">Enter</button> --}}
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
                    
    @if($user_bespokes[5]->bespoke_type == 'dept')
        <script>
            function baseValidate6(){ 
                let baseline = document.getElementById('six_baseline').value,
                    current = document.getElementById('six_current').value,
                    error = document.getElementById('six_error');
                    error.textContent ="";
                if(+current > +baseline){
                    error.textContent = "The current balance can't be greater than baseline.";
                    return false;
                }  
            }
        </script>
    @endif
@endif
 
@if(isset($user_bespokes[6]))
    <div class="modal fade" id="sevenBespokeModal" tabindex="-1" role="dialog" aria-labelledby="bespokeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content b-rad-20 wd-c"> 
            <div class="modal-header">
                    <h5 class="modal-title" id="bespokeLabel">{{$user_bespokes[6]->kpi_name}} ({{ str_limit($user_bespokes[6]->kpi_details, 35) }})</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div> 
                <div class="modal-body">
                    <div class="form-plain form-reg wd-f">
                        <h5 class="text-left txt-primary">{{$user_bespokes[6]->kpi_name}} - {{ $user_bespokes[6]->bespoke_type == 'saveup' ? 'Saving Up Target' : 'Debt Elimination Target' }}</h5>
                        <h5 class="text-center text-info" id="err_dept"> </h5> 
                        
                        <form method="POST" onsubmit="return baseValidate7()"  class="seveng" id="first"  action="{{ route('update.bespoke', $user_bespokes[6]->id) }}">
                                    @csrf 
                                    
                                @if($user_bespokes[6]->account_header) 
                                    <input type="hidden" name="biunxicmkxbjvnjncm" value="{{$user_bespokes[6]->account_header}}">
                                @endif
                                    <ul class="lists py-2 mb-3">
                                        @if($user_bespokes[6]->bespoke_type == 'dept')
                                            <li class="row">
                                                    <div class="col-md-6">
                                                        <div class="text-right mt-3">
                                                            <label class="">Baseline (your origianl balance): </label>
                                                        </div> 
                                                    </div>
                                                <div class="col-md-6">
                                                    <div class="price-wrap">
                                                        <label for="" class="price-currency">{{  ($user_bespokes[6]->account_currency) ? explode(" ",$user_bespokes[6]->account_currency)[0] : $symbol }}</label>
                                                        <input type="number"  value="{{$user_bespokes[6]->baseline}}" onfocus="focalPoint(this)" min="0" class="" name="baseline" id="seven_baseline" required>
                                                    </div> 
                                                </div>
                                            </li>
                                        @endif
                                        <li class="row">
                                            <div class="col-md-6">
                                                <div class="text-right mt-3">
                                                    <label class="">Current (your balance today):</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="price-wrap">
                                                <label for="" class="price-currency">{{  ($user_bespokes[6]->account_currency) ? explode(" ",$user_bespokes[6]->account_currency)[0] : $symbol }}</label>
                                                <input type="number"  onfocus="focalPoint(this)" min="0"  class="" value="{{$user_bespokes[6]->current}}" name="current" id="seven_current" required>
                                                </div> 
                                            </div>
                                        </li>
                                        @if($user_bespokes[6]->bespoke_type == 'saveup')
                                            <li class="row">
                                                <div class="col-md-6">
                                                    <div class="text-right mt-3">
                                                        <label class="">Target :</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="price-wrap">
                                                        <label for="" class="price-currency">{{  ($user_bespokes[6]->account_currency) ? explode(" ",$user_bespokes[6]->account_currency)[0] : $symbol }}</label>
                                                        <input type="number"  min="0" onfocus="focalPoint(this)" value="{{$user_bespokes[6]->target}}"  class="" name="target" id="target" required>
                                                    </div> 
                                                </div>
                                            </li>
                                        @endif
                                        <span class="text-danger" id="seven_error"></span>
                                    </ul>
                                    <br> 
                                    
                                        <div class="my-2 text-center">
                                            <h3 style="color: {{  $bespoke_bg[6] }}">STATUS: {{ $bespoke_values[6] }}%</h3>
                                        </div>
                                        <div class="row my-3 justify-content-center">
                                            <div class="col-md-6 col-sm-12 mb-3"> 
                                                <h5 class="pl-3 bold">Personal Strategy</h5>
                                                <div class="plan-box elevate-3">
                                                    <div class="form-group">
                                                        <textarea  placeholder="Document your plan" name="strategy" id="" cols="30" rows="5" class="form-control">{{$user_bespokes[6]->extra}}</textarea>
                                                    </div> 
                                                    <div class="text-right"> 
                                                        <button type="submit"  class="btn btn-sm btn-pry px-2">Update</button>
                                                        <a href="" class="ml-2 mr-4">Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    
                                    <div class="text-center mb-4">
    
                                <button class="btn btn-pry px-5" type="button">
                                    @if ($user_bespokes[6]->bespoke_type == 'saveup')
                                      <a href="{{route('360.cash', ['bes' => $user_bespokes[6]->kpi ])}}" class="card-link text-white">View More</a> 
                                    @else
                                        <a href="{{route('360.liabilities',['bes' => $user_bespokes[6]->kpi ])}}" class="card-link text-white">View More</a> 
                                    @endif
                                </button>
                                    </div>
                                </form>
                        <div class="text-center mb-4">
                            {{-- <button class="btn btn-pry px-2" type="submit">Enter</button> --}}
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
    @if($user_bespokes[6]->bespoke_type == 'dept')
        <script>
            function baseValidate7(){ 
                let baseline = document.getElementById('seven_baseline').value,
                    current = document.getElementById('seven_current').value,
                    error = document.getElementById('seven_error');
                    error.textContent ="";
                if(+current > +baseline){
                    error.textContent = "The current balance can't be greater than baseline.";
                    return false;
                }  
            }
        </script> 
    @endif
@endif

@endsection
