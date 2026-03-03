@if(isset($user_bespokes[0]))
    <div class="card"> 
        <div class="accord-header" id="headingOne">
            <div class="wd-f mb-0">
                <span class="gap-card-title accord-title">{{$user_bespokes[0]->kpi_name}} </span>
                <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa fa-chevron-down"></i>
                </button> 
            </div>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body pb-1">
                <div class="form-plain form-reg wd-f">
                    <h5 class="text-left txt-primary">{{$user_bespokes[0]->kpi_name}} - {{ $user_bespokes[0]->bespoke_type == 'saveup' ? 'Saving Up Target' : 'Debt Elimination Target' }}</h5>
                    <h5 class="text-center text-info" id="err_dept"> </h5> 
                    
                    <form method="POST" onsubmit="return baseValidate1()"  class="seveng" id="first"  action="{{ route('update.bespoke', $user_bespokes[0]->id) }}">
                        @csrf 
                        <input type="hidden" name="basement" value="zmbjxnjknsjknjxknxmncjnd">
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

        @if($user_bespokes[0]->bespoke_type == 'dept')
            <script>
                function baseValidate1(){ 
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
    </div> 
@endif

@if(isset($user_bespokes[1]))
    <div class="card">
        <div class="accord-header" id="headingTwo">
            <div class="wd-f mb-0">
                <span class="gap-card-title accord-title">{{$user_bespokes[1]->kpi_name}} </span>
                <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa fa-chevron-down"></i>
                </button> 
            </div>
        </div>
    
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body pb-1">
                <div class="form-plain form-reg wd-f">
                    <h5 class="text-left txt-primary">{{$user_bespokes[1]->kpi_name}} - {{ $user_bespokes[1]->bespoke_type == 'saveup' ? 'Saving Up Target' : 'Debt Elimination Target' }}</h5>
                    <h5 class="text-center text-info" id="err_two"> </h5> 
                    
                    <form method="POST" onsubmit="return baseValidate2()"  class="seveng" id="first"  action="{{ route('update.bespoke', $user_bespokes[1]->id) }}">
                        @csrf 
                        <input type="hidden" name="basement" value="zmbjxnjknsjknjxknxmncjnd">
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
    </div>
@endif

@if(isset($user_bespokes[2]))
    <div class="card">
        <div class="accord-header" id="headingThree">
            <div class="wd-f mb-0">
                <span class="gap-card-title accord-title">{{$user_bespokes[2]->kpi_name}} </span>
                <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                <i class="fa fa-chevron-down"></i>
                </button> 
            </div>
        </div>
    
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body pb-1">
                <div class="form-plain form-reg wd-f">
                    <h5 class="text-left txt-primary">{{$user_bespokes[2]->kpi_name}} - {{ $user_bespokes[2]->bespoke_type == 'saveup' ? 'Saving Up Target' : 'Debt Elimination Target' }}</h5>
                    <h5 class="text-center text-info" id="err_three"> </h5> 
                    
                    <form method="POST" onsubmit="return baseValidate3()"  class="seveng" id="first"  action="{{ route('update.bespoke', $user_bespokes[2]->id) }}">
                        @csrf 
                        <input type="hidden" name="basement" value="zmbjxnjknsjknjxknxmncjnd">
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
    </div>
@endif

@if(isset($user_bespokes[3]))
    <div class="card">
        <div class="accord-header" id="headingFour">
            <div class="wd-f mb-0">
                <span class="gap-card-title accord-title">{{$user_bespokes[3]->kpi_name}} </span>
                <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="fa fa-chevron-down"></i>
                </button> 
            </div>
        </div>
    
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
            <div class="card-body pb-1">
                <div class="form-plain form-reg wd-f">
                    <h5 class="text-left txt-primary">{{$user_bespokes[3]->kpi_name}} - {{ $user_bespokes[3]->bespoke_type == 'saveup' ? 'Saving Up Target' : 'Debt Elimination Target' }}</h5>
                    <h5 class="text-center text-info" id="err_four"> </h5> 
                    
                    <form method="POST" onsubmit="return baseValidate4()"  class="seveng" id="first"  action="{{ route('update.bespoke', $user_bespokes[3]->id) }}">
                        @csrf 
                        <input type="hidden" name="basement" value="zmbjxnjknsjknjxknxmncjnd">
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
    </div>
@endif

@if(isset($user_bespokes[4]))
    <div class="card">
        <div class="accord-header" id="headingFive">
            <div class="wd-f mb-0">
                <span class="gap-card-title accord-title">{{$user_bespokes[4]->kpi_name}} </span>
                <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                <i class="fa fa-chevron-down"></i>
                </button> 
            </div>
        </div>
    
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
            <div class="card-body pb-1">
                <div class="form-plain form-reg wd-f">
                    <h5 class="text-left txt-primary">{{$user_bespokes[4]->kpi_name}} - {{ $user_bespokes[4]->bespoke_type == 'saveup' ? 'Saving Up Target' : 'Debt Elimination Target' }}</h5>
                    <h5 class="text-center text-info" id="err_four"> </h5> 
                    
                    <form method="POST" onsubmit="return baseValidate5()"  class="seveng" id="first"  action="{{ route('update.bespoke', $user_bespokes[4]->id) }}">
                        @csrf 
                        <input type="hidden" name="basement" value="zmbjxnjknsjknjxknxmncjnd">
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
                            </button>
                        </div>
                    </form>
                    <div class="text-center mb-4">
                        {{-- <button class="btn btn-pry px-2" type="submit">Enter</button> --}}
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
    </div>
@endif

@if(isset($user_bespokes[5]))
    <div class="card"> 
        <div class="accord-header" id="headingSix">
            <div class="wd-f mb-0">
                <span class="gap-card-title accord-title">{{$user_bespokes[5]->kpi_name}} </span>
                <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                <i class="fa fa-chevron-down"></i>
                </button> 
            </div>
        </div>
    
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
            <div class="card-body pb-1">
                <div class="form-plain form-reg wd-f">
                    <h5 class="text-left txt-primary">{{$user_bespokes[5]->kpi_name}} - {{ $user_bespokes[5]->bespoke_type == 'saveup' ? 'Saving Up Target' : 'Debt Elimination Target' }}</h5>
                    <h5 class="text-center text-info" id="err_six"> </h5> 
                    
                    <form method="POST" onsubmit="return baseValidate6()"  class="seveng" id="first"  action="{{ route('update.bespoke', $user_bespokes[5]->id) }}">
                        @csrf 
                        <input type="hidden" name="basement" value="zmbjxnjknsjknjxknxmncjnd">
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
    </div>
@endif

@if(isset($user_bespokes[6]))
    <div class="card">
        <div class="accord-header last" id="headingSeven">
        <div class="wd-f mb-0"> 
            <span class="gap-card-title accord-title">{{$user_bespokes[6]->kpi_name }}</span>
            <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                <i class="fa fa-chevron-down"></i>
            </button> 
        </div>
        </div>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
            <div class="card-body pb-1">
                <div class="form-plain form-reg wd-f">
                    <h5 class="text-left txt-primary">{{$user_bespokes[6]->kpi_name}} - {{ $user_bespokes[6]->bespoke_type == 'saveup' ? 'Saving Up Target' : 'Debt Elimination Target' }}</h5>
                    <h5 class="text-center text-info" id="err_seven"> </h5> 
                    
                    <form method="POST" onsubmit="return baseValidate7()"  class="seveng" id="first"  action="{{ route('update.bespoke', $user_bespokes[6]->id) }}">
                        @csrf 
                        <input type="hidden" name="basement" value="zmbjxnjknsjknjxknxmncjnd">
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
    </div>
@endif