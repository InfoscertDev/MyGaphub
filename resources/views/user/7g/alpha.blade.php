
<div class="">
    <div class="form-plain form-reg wd-f">
        <h5 class="text-left txt-primary">Rainy Day Fund</h5>
        
        <h5 class="text-center text-info" id="err_alpha"> </h5> 
        <form id="alpha" class="seveng" onsubmit="return rainyDay()" method="POST" action="{{ route('save.seveng') }}">
            @csrf 
            <input type="hidden" name="seveng" value="ahqghjhwtbv73jh2vxbmgsvbxcsz">
            <ul class="lists py-2 mb-3">
                <li class="row">
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Current (rainy day savings today):</label>
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="price-wrap">
                            <label for="" class="price-currency">{{ $symbol }}</label>
                            @if($alpha->main)
                                <input type="number" id="alpha_current" disabled  min="0" onfocus="focalPoint(this)"  class="" value="{{$alpha->current}}" name="current" id="current" required>
                            @else
                                <input type="number" id="alpha_current"  min="0" onfocus="focalPoint(this)"  class="" value="{{$alpha->current ?? 0}}" name="current" id="current" required>
                            @endif
                        </div> 
                    </div>
                </li>
                <li class="row">
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Target (usually 6-12 months cost of living):</label>
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="price-wrap">
                            <label for="" class="price-currency">{{ $symbol }}</label>
                            <input type="number"  min="0" {{ ($alpha->main) ? 'disabled': '' }} onfocus="focalPoint(this)" value="{{$alpha->target ?? 0}}"  class="" name="target" id="target" required>
                        </div> 
                    </div>
                </li>
            </ul> 
            @if ($alpha->main)
                
                <div class="my-2 text-center">
                    <h3 style="color: {{  $backgrounds[6] }}">STATUS: {{ $steps[6] }}%</h3>
                </div>
                <div class="row my-3">
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="card sug-pal p-2">
                            {{-- <div class="card-body"> --}}
                                <h5>Comments / Suggestions  :</h5>
                                <p>  
                                    @if ( $steps[6] >= 0 && $steps[6] <= 25 )
                                        {{ $comments[0]['1']  }}
                                    @elseif ( $steps[6] >= 26 && $steps[6] <= 50 )
                                        {{ $comments[0]['26']  }}

                                    @elseif ( $steps[6] >= 51 && $steps[6] <= 75 )
                                        {{ $comments[0]['51']  }}
                                    @elseif ( $steps[6] >= 76 && $steps[6] <= 99 )
                                        {{ $comments[0]['76']  }}

                                    @elseif ( $steps[6] == 100 )
                                        {{ $comments[0]['100']  }}
                                    @endif
                                </p>
                                {{-- <ul class="list-decimal">
                                    <li>Open a dedicated bank account today and name it "Rainy Day Fund" </li>
                                    <li>Set aside an amount to save in account</li>
                                    <li>Have a quaterly review</li>
                                </ul> --}}
                            {{-- </div> --}}
                        </div>
                    </div> 
                    <div class="col-md-6 col-sm-12 mb-3"> 
                        <h5 class="pl-3 bold">Personal Strategy</h5>
                        <div class="plan-box elevate-3">
                            @if ($alpha->main)
                                <input type="hidden" name="personal_val" value="iauhuiahjnjaknijaiiunaiujs">
                            @endif
                            <div class="form-group">
                                <textarea  placeholder="Document your plan" name="strategy" id="" cols="30" rows="5" class="form-control">{{$alpha->strategy}}</textarea>
                            </div> 
                            <div class="text-right"> 
                                <button type="button" id="continue_alpha" class="btn btn-sm btn-pry px-2">Continue</button>
                                <a href="" class="ml-2 mr-4">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="text-center mb-4">  
                @if ($alpha->main)
                    <button class="btn btn-pry px-5" type="button"> <a href="{{route('360.cash',['kpi' =>'alpha'])}}" class="card-link text-white">View More</a> </button>
                @else
                    <button class="btn btn-pry px-5" type="submit">Save</button>
                @endif
            </div> 
            {{-- @if (!$alpha->main) @endif --}}
                <div class="modal fade" id="confirmAlpha" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Confirm Rainy Day Savings</h5>
                        <button type="button" class="close" onclick="$('#confirmAlpha').modal('hide');"  aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="text-center">The new value you provided is different from the value provided earlier {{ $symbol }}<span class="" id="">{{$alpha->current}}</span>.  </h5>
                            <h5 class="text-center">Are you sure you want to proceed with this new value {{ $symbol }}<span class="" id="newrainy"></span> ?</h5>
                        </div>

                        <div class="modal-footer mx-auto">
                            <div class="text-left">
                                <button type="submit" onclick="confirm = true"  class="btn btn-pry px-3 mr-3">Yes</button>
                            </div>
                            <div class="text-right">
                                <button type="button" onclick="$('#confirmAlpha').modal('hide');" class="btn btn-default px-3 mr-3">No</button>
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
    var main = "<?php echo $alpha->main ?>";
    var confirm = false;
    var alpha_oldcurrent = "<?php echo $alpha->current ?>";
    function rainyDay(){ 
        var alpha_current = document.getElementById('alpha_current');
        $('#newrainy').text(alpha_current.value.toLocaleString());
        if(+alpha_oldcurrent != +alpha_current.value && !confirm){
            $('#confirmAlpha').modal('show');
            return false; 
        } 
    }

    $(function() {
        $('#continue_alpha').on('click', function(e){
            var fd = new FormData($('#alpha')[0]);
            $.ajax({ 
                type: 'POST',
                // url:  'http://infoscert.net/mygaphub/releaseb/home/7g/store',
                url:  "<?php echo route('save.seveng') ?>",
                data: fd,
                processData: false,
                contentType: false,
                success: function(data, status){
                    $('#err_alpha').text('Succesfully Saved').fadeIn(400);
                    setTimeout(() => {$('#collapseSeven').collapse('hide');  }, 1500);
                    setTimeout(() => { $('#err_alpha').hide();  }, 900);
                }, 
                error: function(data, status){
                    $('#err_alpha').text('Error'); 
                    setTimeout(() => {$('#collapseSeven').collapse('hide');  }, 1500);
                    setTimeout(() => { $('#err_alpha').hide();  }, 900);
                }
            });
        })
    });
</script>