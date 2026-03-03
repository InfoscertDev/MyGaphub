{{-- @extends('layouts.user') --}}

{{-- @section('content') --}}
<div class="">
    <div class="form-plain form-reg wd-f">
        <h5 class="text-left txt-primary">Kids Education</h5>
        <h5 class="text-center text-info" id="err_edu"> </h5> 
        <form method="POST"  class="seveng" id="education"  action="{{ route('save.seveng') }}">
            @csrf 
            <input type="hidden" name="seveng" value="suwjssjnzbaajdzkshnshbbjbd">
            <ul class="lists py-2 mb-3">
                <li class="row">
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Current (your savings balance today):</label>
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="price-wrap">
                        <label for="" class="price-currency">{{ $symbol }}</label>
                        <input type="number"  min="0" {{ ($education->main) ? 'disabled': '' }} onfocus="focalPoint(this)" class="" value="{{$education->current ?? 0}}" name="current" id="current" required>
                        </div> 
                    </div>
                </li>
                <li class="row">
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Target (the projected amount required):</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="price-wrap">
                        <label for="" class="price-currency">{{ $symbol }}</label>
                        <input type="number"  min="0" {{ ($education->main) ? 'disabled': '' }} onfocus="focalPoint(this)" value="{{$education->target ?? 0}}"  class="" name="target" id="target" required>
                        </div> 
                    </div>
                </li>
            </ul>
            @if ($education->main)
                <div class="my-2 text-center">
                    <h3 style="color: {{  $backgrounds[2] }}">STATUS: {{ $steps[2] }}%</h3>
                </div>
                <br>
                <div class="row my-3">
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="card sug-pal p-2">
                            {{-- <div class="card-body"> --}}
                                <h5>Comments / Suggestions  :</h5>
                                <p>  
                                    @if ( $steps[2] >= 0 && $steps[2] <= 25 )
                                        {{ $comments[4]['1']  }}
                                    @elseif ( $steps[2] >= 26 && $steps[2] <= 50 )
                                        {{ $comments[4]['26']  }}

                                    @elseif ( $steps[2] >= 51 && $steps[2] <= 75 )
                                        {{ $comments[4]['51']  }}
                                    @elseif ( $steps[2] >= 76 && $steps[2] <= 99 )
                                        {{ $comments[4]['76']  }}

                                    @elseif ( $steps[2] == 100 )
                                        {{ $comments[4]['100']  }}
                                    @endif
                                </p>
                            {{-- </div> --}}
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-12 mb-3"> 
                        <h5 class="pl-3 bold">Personal Strategy</h5>
                        <div class="plan-box elevate-3">
                            @if ($education->main)
                                    <input type="hidden" name="personal_val" value="iauhuiahjnjaknijaiiunaiujs">
                            @endif
                            <div class="form-group">
                                <textarea  placeholder="Document your plan" name="strategy" id="" cols="30" rows="5" class="form-control">{{$education->strategy}}</textarea>
                            </div> 
                            <div class="text-right"> 
                                <button type="button" id="continue_edu" class="btn btn-sm btn-pry px-2">Continue</button>
                                <a href="" class="ml-2 mr-4">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
             
            <div class="text-center mb-4">
                @if ($education->main)
                <button class="btn btn-pry px-5" type="button"> <a href="{{route('360.cash',['kpi' =>'education'])}}" class="card-link text-white">View More</a> </button>
                @else
                    <button class="btn btn-pry px-5" type="submit">Save</button>
                @endif
            </div>
        </form>
        <div class="text-center mb-4">
            {{-- <button class="btn btn-pry px-2" type="submit">Enter</button> --}}
        </div>
    </div>
</div> 
{{-- @endsection --}}

<script>
    $(function() {
        $('#continue_edu').on('click', function(e){
            var fd = new FormData($('#education')[0]);
            $.ajax({ 
                type: 'POST',
                url:  "<?php echo route('save.seveng') ?>",
                // url:  'http://infoscert.net/mygaphub/releaseb/home/7g/store',
                data: fd,
                processData: false,
                contentType: false,
                success: function(data, status){
                    $('#err_edu').text('Succesfully Saved').fadeIn(400);
                    setTimeout(() => {$('#collapseThree').collapse('hide');  }, 1500);
                    setTimeout(() => { $('#err_edu').hide();  }, 900);
                }, 
                error: function(data, status){
                    $('#err_edu').text('Error'); 
                    setTimeout(() => {$('#collapseThree').collapse('hide');  }, 1500);
                    setTimeout(() => { $('#err_edu').hide();  }, 900);
                }
            });
        })
    });
</script>