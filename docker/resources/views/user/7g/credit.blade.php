{{-- @extends('layouts.user') --}}

{{-- @section('content') --}}
<div class="">
    <div class="form-plain form-reg wd-f">
        <h5 class="text-left txt-primary">Credit and Loan</h5>
        <h5 class="text-center text-info" id="err_credit"> </h5> 
        <form method="POST" onsubmit="return crdValidate()" class="seveng" id="credit"  action="{{ route('save.seveng') }}">
            @csrf 
            <input type="hidden" name="seveng" value="vacxjhshdjshjkshgksghjgfsfdh">
            <ul class="lists py-2 mb-3">
                <li class="row"> 
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Baseline (your original balance): </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="price-wrap">
                            <label for="" class="price-currency">{{ $symbol }}</label>
                            <input type="number" value="{{$credit->baseline ?? 0}}" min="0" {{ ($credit->main) ? 'disabled': '' }} onfocus="focalPoint(this)" class="" name="baseline" id="crd_baseline" required>
                        </div> 
                    </div>
                </li>
                <li class="row">
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Current (your balance today):</label>
                        </div> 
                    </div>
                    <div class="col-md-6"> 
                        <div class="price-wrap">
                            <label for="" class="price-currency">{{ $symbol }}</label>
                            <input type="number"  value="{{$credit->current ?? 0}}"  min="0" {{ ($credit->main) ? 'disabled': '' }} onfocus="focalPoint(this)" class="" name="current" id="crd_current" required>
                        </div>  
                    </div>
                </li>
                
                @if (!$credit->main)
                    <li class="row text-center">
                        <div class="col-10"> 
                            <label for="">I have zero unsecured debt
                                <input type="checkbox" class="ml-3 form-check-input bs-none" name="unsecured" id="unsecured" style="margin-top: -7px;">
                            </label>
                        </div>
                    </li> 
                @endif
                <span class="text-danger" id="cred_error"></span>
            </ul>
            
            @if ($credit->main)
                <div class="my-2 text-center">
                    <h3 style="color: {{  $backgrounds[4] }}">STATUS: {{ $steps[4] }}%</h3>
                </div>
                <br>
                <div class="row my-3">
                    <div class="col-md-6 col-sm-12  mb-3">
                        <div class="card sug-pal p-2">
                            {{-- <div class="card-body"> --}}
                                <h5>Comments / Suggestions  :</h5>
                                <p>   
                                        @if ( $steps[4] >= 0 && $steps[4] <= 25 )
                                            {{ $comments[2]['1']  }}
                                        @elseif ( $steps[4] >= 26 && $steps[4] <= 50 )
                                            {{ $comments[2]['26']  }}

                                        @elseif ( $steps[4] >= 51 && $steps[4] <= 75 )
                                            {{ $comments[2]['51']  }}
                                        @elseif ( $steps[4] >= 76 && $steps[4] <= 99 )
                                            {{ $comments[2]['76']  }}

                                        @elseif ( $steps[4] == 100 )
                                            {{ $comments[2]['100']  }}
                                        @endif
                                </p>
                            {{-- </div> --}}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12  mb-3"> 
                        <h5 class="pl-3 bold">Personal Strategy</h5>
                        <div class="plan-box elevate-3">
                            @if ($credit->main)
                                <input type="hidden" name="personal_val" value="iauhuiahjnjaknijaiiunaiujs">
                            @endif
                            <div class="form-group">
                                <textarea  placeholder="Document your plan" name="strategy" id="" cols="30" rows="5" class="form-control">{{$credit->strategy}}</textarea>
                            </div> 
                            <div class="text-right"> 
                                <button type="button" id="continue_credit" class="btn btn-sm btn-pry px-2">Continue</button>
                                <a href="" class="ml-2 mr-4">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
             
            <div class="text-center mb-4">
                @if ($credit->main)
                    <button class="btn btn-pry px-5" type="button"> <a href="{{route('360.liability',['kpi' =>'credit'])}}" class="card-link text-white">View More</a> </button>
                @else
                    <button class="btn btn-pry px-5" type="submit">Save</button>
                @endif
            </div>
        </form>
    </div>
    <script>
        function crdValidate(){
            let baseline = document.getElementById('crd_baseline').value,
                current = document.getElementById('crd_current').value,
                error = document.getElementById('cred_error');
                error.textContent ="";
            if(+current > +baseline){
                error.textContent = "The current balance can't be greater than baseline.";
                return false;
            } 
        }

        $(function() {

            $('#unsecured').on('input', function(e){
                var is_unsecured = $('#unsecured').is(':checked');
                if(is_unsecured){
                    $('#crd_current').prop('disabled', true);
                    $('#crd_baseline').prop('disabled', true);
                }else{
                    $('#crd_current').prop('disabled', false);
                    $('#crd_baseline').prop('disabled', false);   
                }  
            }); 

            $('#continue_credit').on('click', function(e){
                var fd = new FormData($('#credit')[0]);
                $.ajax({ 
                    type: 'POST',
                    url:  "<?php echo route('save.seveng') ?>",
                    // url:  'http://infoscert.net/mygaphub/releaseb/home/7g/store',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(data, status){
                        $('#err_credit').text('Succesfully Saved').fadeIn(400);
                        setTimeout(() => {$('#collapseFive').collapse('hide');  }, 1500);
                        setTimeout(() => { $('#err_credit').hide();  }, 900);
                    }, 
                    error: function(data, status){
                        $('#err_credit').text('Error'); 
                        setTimeout(() => {$('#collapseFive').collapse('hide');  }, 1500);
                        setTimeout(() => { $('#err_credit').hide();  }, 900);
                    }
                });
            })
        });


    </script>
</div> 

{{-- @endsection --}}
