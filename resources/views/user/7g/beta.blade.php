{{-- @extends('layouts.user') --}}

{{-- @section('content') --}}
<div class="">
    <div class="form-plain form-reg wd-f">
        <h5 class="text-left txt-primary">House Deposit</h5>
        <h5 class="text-center text-info" id="err_beta"> </h5> 
        <form method="POST"   class="seveng" id="beta"  action="{{ route('save.seveng') }}">
            @csrf 
            <input type="hidden" name="seveng" value="bjhz9qnbxb6zdjh2uxajhhvsb">
            <ul class="lists py-2 mb-3">
                {{-- <li class="row">
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Baseline (your original balance): </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="price-wrap">
                            <label for="" class="price-currency">{{ $symbol }}</label>
                            <input type="number" disabled value="{{($beta->baseline) ? $beta->baseline : 0}}" min="0"class="" name="baseline" id="baseline" required>
                        </div> 
                    </div>
                </li> --}}
                <li class="row">
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Current (house purchase savings today):</label>
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="price-wrap">
                        <label for="" class="price-currency">{{ $symbol }}</label>
                        <input type="number"  min="0" onfocus="focalPoint(this)" {{ ($beta->main) ? 'disabled': '' }}  class="" value="{{($beta->current) ? $beta->current : 0}}" name="current" id="beta_current" required>
                        </div> 
                    </div>
                </li>
                <li class="row">
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Target (house purchase deposit and other costs):</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="price-wrap">
                            <label for="" class="price-currency">{{ $symbol }}</label>
                            <input type="number"  min="0" onfocus="focalPoint(this)" {{ ($beta->main) ? 'disabled': '' }} value="{{($beta->target) ? $beta->target : 0 }}"  class="" name="target" id="beta_target" required>
                        </div> 
                    </div>
                </li>
                @if (!$beta->main)
                    <li class="row text-center">
                        <div class="col-10"> 
                            <label for="">I already bought my home
                                <input type="checkbox" class="ml-3 form-check-input bs-none" name="purchase" id="purchase" style="margin-top: -7px;">
                            </label>
                        </div>
                    </li>
                @endif
            </ul>

            @if ($beta->main)
                <div class="my-2 text-center">
                    <h3 style="color: {{  $backgrounds[5] }}">STATUS: {{ $steps[5] }}%</h3>
                </div>
                <br>
                <div class="row my-3">
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="card sug-pal p-2">
                            {{-- <div class="card-body"> --}}
                                <h5>Comments / Suggestions  :</h5>
                                <p>
                                    @if ( $steps[5] >= 0 && $steps[5] <= 25 )
                                        {{ $comments[1]['1']  }}
                                    @elseif ( $steps[5] >= 26 && $steps[5] <= 50 )
                                        {{ $comments[1]['26']  }}

                                    @elseif ( $steps[5] >= 51 && $steps[5] <= 75 )
                                        {{ $comments[1]['51']  }}
                                    @elseif ( $steps[5] >= 76 && $steps[5] <= 99 )
                                        {{ $comments[1]['76']  }}

                                    @elseif ( $steps[5] == 100 )
                                        {{ $comments[1]['100']  }}
                                    @endif
                                </p>
                                {{-- <p> You will need to acquire asset to the value of  with returns at  to generate a monthly income of 
                                    Take a look at some of the asset acquisition opportunities listed by our verified providers. Account
                                </p> --}}
                            {{-- </div> --}} 
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3"> 
                        <h5 class="pl-3 bold">Personal Strategy</h5>
                        <div class="plan-box elevate-3">
                            @if ($beta->main)
                                <input type="hidden" name="personal_val" value="iauhuiahjnjaknijaiiunaiujs">
                            @endif
                            <div class="form-group">
                                <textarea  placeholder="Document your plan" name="strategy" id="" cols="30" rows="5" class="form-control">{{$beta->strategy}}</textarea>
                            </div> 
                            <div class="text-right"> 
                                <button type="button" id="continue_beta" class="btn btn-sm btn-pry px-2">Continue</button>
                                <a href="" class="ml-2 mr-4">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
            <div class="text-center mb-4">
               
                @if ($beta->main)
                    <button class="btn btn-pry px-5" type="button"> <a href="{{route('360.cash',['kpi' =>'beta'])}}" class="card-link text-white">View More</a> </button>
                @else
                    <button class="btn btn-pry px-5" type="submit">Save</button>
                @endif
            </div>
        </form>
    </div>
</div> 
{{-- @endsection --}}
 <script>
    $(function() {
        $('#purchase').on('input', function(e){
            var is_purchase = $('#purchase').is(':checked');
            if(is_purchase){
                $('#beta_current').prop('disabled', true);
                $('#beta_target').prop('disabled', true);
            }else{
                $('#beta_current').prop('disabled', false);
                $('#beta_target').prop('disabled', false);   
            } 
        });
        $('#continue_beta').on('click', function(e){
            var fd = new FormData($('#beta')[0]);
            $.ajax({ 
                type: 'POST',
                // url:  'http://infoscert.net/mygaphub/releaseb/home/7g/store',
                url:  "<?php echo route('save.seveng') ?>",
                data: fd,
                processData: false,
                contentType: false,
                success: function(data, status){
                    $('#err_beta').text('Succesfully Saved').fadeIn(400);
                    setTimeout(() => {$('#collapseSix').collapse('hide');  }, 1500);
                    setTimeout(() => { $('#err_beta').hide();  }, 900);
                }, 
                error: function(data, status){
                    $('#err_beta').text('Error'); 
                    setTimeout(() => {$('#collapseSix').collapse('hide');  }, 1500);
                    setTimeout(() => { $('#err_beta').hide();  }, 900);
                }
            });
        })
    });
</script>
