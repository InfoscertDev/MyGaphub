{{-- @extends('layouts.user') --}}

{{-- @section('content') --}}
<div class="">
    <div class="form-plain form-reg wd-f">
        <h5 class="text-left txt-primary">Mortgage Debt</h5>
        <h5 class="text-center text-info" id="err_dept"> </h5> 
        
        <form method="POST" onsubmit="return debtValidate()"  class="seveng" id="dept"  action="{{ route('save.seveng') }}">
            @csrf  
            <input type="hidden" name="seveng" value="danbxnjhbxxvnsvauiw7wxdgbxzd">
            <ul class="lists py-2 mb-3">
                <li class="row">
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Baseline (the amount you borrowed to buy your house): </label>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="price-wrap">
                            <label for="" class="price-currency">{{ $symbol }}</label>
                            <input type="number"  value="{{$dept->baseline ?? 0}}" {{ ($dept->main) ? 'disabled': '' }}  onfocus="focalPoint(this)" min="0" class="" name="baseline" id="dept_baseline" required>
                        </div> 
                    </div>
                </li>
                <li class="row">
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Current (your mortgage balance today):</label>
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="price-wrap">
                            <label for="" class="price-currency">{{ $symbol }}</label>
                            <input type="number"  {{ ($dept->main) ? 'disabled': '' }}  onfocus="focalPoint(this)" min="0"  class="" value="{{$dept->current ?? 0}}" name="current" id="dept_current" required>
                        </div> 
                    </div>
                </li>
                {{-- <li class="row">
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Target (usually zero):</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="price-wrap">
                        <label for="" class="price-currency">{{ $symbol }}</label>
                        <input type="number" disabled {{ ($dept->main) ? 'disabled': '' }}  onfocus="focalPoint(this)" min="0" value="{{$dept->target}}"  class="" name="target" id="target" required>
                        </div> 
                    </div>
                </li> --}}
                <span class="text-danger" id="dept_error"></span>
            </ul>
            <br> 
            @if ($dept->main)
                <div class="my-2 text-center">
                    <h3 style="color: {{  $backgrounds[3] }}">STATUS: {{ $steps[3] }}%</h3>
                </div>
                <div class="row my-3">
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="card sug-pal p-2">
                            {{-- <div class="card-body"> --}}
                                <h5>Comments / Suggestions  :</h5>
                                <p> 
                                    @if ( $steps[3] >= 0 && $steps[3] <= 25 )
                                        {{ $comments[3]['1']  }}
                                    @elseif ( $steps[3] >= 26 && $steps[3] <= 50 )
                                        {{ $comments[3]['26']  }}

                                    @elseif ( $steps[3] >= 51 && $steps[3] <= 75 )
                                        {{ $comments[3]['51']  }}
                                    @elseif ( $steps[3] >= 76 && $steps[3] <= 99 )
                                        {{ $comments[3]['76']  }}

                                    @elseif ( $steps[3] == 100 )
                                        {{ $comments[3]['100']  }}
                                    @endif
                                </p>
                            {{-- </div> --}}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3"> 
                        <h5 class="pl-3 bold">Personal Strategy</h5>
                        <div class="plan-box elevate-3">
                            @if ($dept->main)
                                <input type="hidden" name="personal_val" value="iauhuiahjnjaknijaiiunaiujs">
                            @endif 
                            <div class="form-group">
                                <textarea  placeholder="Document your plan" name="strategy" id="" cols="30" rows="5" class="form-control">{{$dept->strategy}}</textarea>
                            </div> 
                            <div class="text-right"> 
                                <button type="button" id="continue_dept" class="btn btn-sm btn-pry px-2">Continue</button>
                                <a href="" class="ml-2 mr-4">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif 
            <div class="text-center mb-4">
                @if ($dept->main)
                <button class="btn btn-pry px-5" type="button"> <a href="{{route('360.mortgage',['kpi' =>'debt'])}}" class="card-link text-white">View More</a> </button>
                @else
                    <button class="btn btn-pry px-5" type="submit">Save</button>
                @endif
            </div>
        </form>
        <div class="text-center mb-4">
            {{-- <button class="btn btn-pry px-2" type="submit">Enter</button> --}}
        </div>
    </div>
    <script>
        function debtValidate(){ 
            let baseline = document.getElementById('dept_baseline').value,
                current = document.getElementById('dept_current').value,
                error = document.getElementById('dept_error');
                error.textContent ="";
            if(+current > +baseline){
                error.textContent = "The current balance can't be greater than baseline.";
                return false;
            }  
        }

        $(function() {
            $('#continue_dept').on('click', function(e){
                var fd = new FormData($('#dept')[0]);

                $.ajax({ 
                    type: 'POST',
                    url:  "<?php echo route('save.seveng') ?>",
                    // url:  'http://infoscert.net/mygaphub/releaseb/home/7g/store',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(data, status){
                        $('#err_dept').text('Succesfully Saved').fadeIn(400);
                        setTimeout(() => {$('#collapseFour').collapse('hide');  }, 1500);
                        setTimeout(() => { $('#err_dept').hide();  }, 900);
                    }, 
                    error: function(data, status){
                        $('#err_dept').text('Error'); 
                        setTimeout(() => {$('#collapseFour').collapse('hide');  }, 1500);
                        setTimeout(() => { $('#err_dept').hide();  }, 900);
                    }
                });
            })
        });
    </script>
</div> 
{{-- @endsection --}}
