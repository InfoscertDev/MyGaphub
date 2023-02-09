{{-- @extends('layouts.user') --}}

{{-- @section('content') --}}
<div class=""> 
    <div class="form-plain form-reg wd-f">
        <h5 class="text-left txt-primary">Path To Freedom</h5>
        <h5 class="text-center text-info" id="err_free"> </h5>
          
        <form method="POST"  onsubmit="return confirmPortfolio()" class="seveng" id="freedom"  action="{{ route('save.seveng') }}">
            @csrf 
            <input type="hidden" name="seveng" value="aqwsbxbx32shzjmazajxbvvsuw3vx">
            <ul class="lists py-2 mb-3">
                <li class="row"> 
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Current (your monthly asset portfolio income):</label>
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="price-wrap">
                            <label for="" class="price-currency">{{ $symbol }}</label>
                            @if ($freedom->main)
                                <input type="number" id="freedom_current" min="0" onfocus="focalPoint(this)" disabled  class="" value="{{$freedom->current}}" name="current" id="current" required>
                            @else
                                <input type="number"  id="freedom_current" min="0" onfocus="focalPoint(this)"   class="" value="{{$freedom->current ?? 0}}" name="current" id="current" required>
                            @endif 
                        </div> 
                    </div>
                </li>
                <li class="row">
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Target (your monthly cost of living):</label>
                        </div>
                    </div> 
                    <div class="col-md-6"> 
                        <div class="price-wrap">
                            <label for="" class="price-currency">{{ $symbol }}</label> 
                            <input type="number"  min="0" onfocus="focalPoint(this)" disabled value="{{$freedom->target}}"  class="" name="target" id="target" required>
                            <input type="hidden" name="target" value="{{$freedom->target}}">
                        </div> 
                    </div>
                </li>
            </ul>
            @if ($freedom->main)
                
                <div class="my-2 text-center">
                    <h3 style="color: {{  $backgrounds[1] }}">STATUS: {{ $steps[1] }}%</h3>
                </div>
                <br>
                <div class="row my-3">
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="card sug-pal p-2"> 
                            {{-- <div class="card-body"> --}}
                                <h5>Comments / Suggestions  :</h5>
                                <p>  
                                    @if ( $steps[1] >= 0 && $steps[1] <= 25 )
                                        {{ $comments[1]['1']  }}
                                    @elseif ( $steps[1] >= 26 && $steps[1] <= 50 )
                                        {{ $comments[1]['26']  }}

                                    @elseif ( $steps[1] >= 51 && $steps[1] <= 75 )
                                        {{ $comments[1]['51']  }}
                                    @elseif ( $steps[1] >= 76 && $steps[1] <= 99 )
                                        {{ $comments[1]['76']  }}

                                    @elseif ( $steps[1] == 100 )
                                        {{ $comments[1]['100']  }}
                                    @endif
                                </p>
                            {{-- </div> --}}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3"> 
                        <h5 class="pl-3 bold">Personal Strategy</h5>
                        <div class="plan-box elevate-3">
                            <div class="form-group">
                                <textarea  placeholder="Document your plan" name="strategy" id="" cols="30" rows="5" class="form-control">{{$freedom->strategy}}</textarea>
                            </div> 
                            <div class="text-right"> 
                                @if ($freedom->main)
                                    <input type="hidden" name="personal_val" value="iauhuiahjnjaknijaiiunaiujs">
                                @endif
                                <button type="button" id="continue_free" class="btn btn-sm btn-pry px-2">Continue</button>
                                <a href="" class="ml-2 mr-4">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="text-center mb-4">
                @if ($freedom->main)  
                    <button class="btn btn-pry px-5" type="button"> <a href="{{route('360.retirement')}}" class="card-link text-white">View More</a> </button>
                @else
                    <button class="btn btn-pry px-5" type="submit">Save</button>
                @endif
            </div> 
            {{-- @if (!$freedom->main) @endif --}}
            <div class="modal fade" id="confirmfreedom" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Confirm Asset Portfolio Income</h5>
                            <button type="button" class="close" onclick="$('#confirmfreedom').modal('hide')"  aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">The new value you provided is different from the value provided earlier {{ $symbol }}<span class="" id="">{{$freedom->current}}</span>.  </h5>
                            <h5 class="text-center">Are you sure you want to proceed with this new value {{ $symbol }}<span class="" id="newportfolio">0</span>?</h5>
                        </div>
                        <div class="modal-footer mx-auto"> 
                            <div class="text-left">
                                <button type="submit" onclick="confirm = true"  class="btn btn-pry px-3 mr-3">Yes</button>
                            </div>
                            <div class="text-right">  
                                <button type="button" onclick="$('#confirmfreedom').modal('hide')"  class="btn btn-default px-3 mr-3">No</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div> 
</div> 
{{-- @endsection --}}   
<script>
    var main = "<?php echo $freedom->main ?>";
    var confirm = false;
    var freedom_oldcurrent = "<?php echo $freedom->current ?>";
    function close(){
        $('#confirmfreedom').modal('hide');
    }
    function confirmPortfolio(){
        // if(!main){ } 
        var freedom_current = document.getElementById('freedom_current');
        $('#newportfolio').text(freedom_current.value.toLocaleString());
        if(+freedom_oldcurrent != +freedom_current.value && !confirm){
            $('#confirmfreedom').modal('show');
            return false; 
        }
    }
    $(function() {
        $('#continue_free').on('click', function(e){
            var fd = new FormData($('#freedom')[0]);
            $.ajax({ 
                    type: 'POST',
                    url:  "<?php echo route('save.seveng') ?>",
                    // url:  'http://infoscert.net/mygaphub/releaseb/home/7g/store',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(data, status){
                        $('#err_free').text('Succesfully Saved').fadeIn(400);
                        setTimeout(() => {$('#collapseTwo').collapse('hide');  }, 1500);
                        setTimeout(() => { $('#err_free').hide();  }, 900);
                    },
                    error: function(data, status){
                        $('#err_free').text('Error'); 
                        setTimeout(() => {$('#collapseTwo').collapse('hide');  }, 1500);
                        setTimeout(() => { $('#err_free').hide();  }, 900);
                    }
                });
        })
    });
</script>