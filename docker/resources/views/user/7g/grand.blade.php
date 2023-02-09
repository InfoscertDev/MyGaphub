
<div class="">
    <div class="form-plain form-reg wd-f">
        <h5 class="text-left txt-primary">Grand </h5>
        <h5 class="text-center text-info" id="errgrand"> </h5>
        <form id="grand"  class="seveng" method="POST"  action="{{ route('save.seveng') }}">
            @csrf 
            <input type="hidden" name="seveng" value="jagxgxbajxbxjzgzxhsgzah22wexs">
            <ul class="lists py-2 mb-3">
                <li class="row">
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Current (average monthly amount you give to others and charity):</label>
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="price-wrap"> 
                            <label for="" class="price-currency">{{ $symbol }}</label>
                            <input type="number"  min="0" {{ ($grand->main) ? 'disabled': '' }} onfocus="focalPoint(this)" class="" value="{{$grand->current ?? 0}}" name="current" id="current" required>
                        </div> 
                    </div>
                </li>
                <li class="row">
                    <div class="col-md-6">
                        <div class="text-right mt-3">
                            <label class="">Target (intended amount to give to others and charity):</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="price-wrap">
                            <label for="" class="price-currency">{{ $symbol }}</label>
                            <input type="number"  min="0" {{ ($grand->main) ? 'disabled': '' }} onfocus="focalPoint(this)" value="{{$grand->target}}"  class="" name="target" id="target" required>
                        </div> 
                    </div>
                </li>
            </ul>

            @if ($grand->main)
                <div class="my-2 text-center">
                    <h3 style="color: {{  $backgrounds[0] }}">STATUS: {{ $steps[0] }}%</h3>
                </div>
                <br>
                <div class="row my-3">
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="card sug-pal p-2">
                            {{-- <div class="card-body"> --}}
                                <h5>Comments / Suggestions  :</h5>
                                <p>  
                                    @if ( $steps[0] >= 0 && $steps[0] <= 25 )
                                        {{ $comments[0]['1']  }}
                                    @elseif ( $steps[0] >= 26 && $steps[0] <= 50 )
                                        {{ $comments[0]['26']  }}

                                    @elseif ( $steps[0] >= 51 && $steps[0] <= 75 )
                                        {{ $comments[0]['51']  }}
                                    @elseif ( $steps[0] >= 76 && $steps[0] <= 99 )
                                        {{ $comments[0]['76']  }}

                                    @elseif ( $steps[0] == 100 )
                                        {{ $comments[0]['100']  }}
                                    @endif
                                </p>
                            {{-- </div> --}}
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3"> 
                        <h5 class="pl-3 bold">Personal Strategy</h5>
                        <div class="plan-box elevate-3">
                            <div class="form-group">
                                @if ($grand->main)
                                    <input type="hidden" name="personal_val" value="iauhuiahjnjaknijaiiunaiujs">
                                @endif
                                <textarea  placeholder="Document your plan" name="strategy" id="" cols="30" rows="5" class="form-control">{{$grand->strategy}}</textarea>
                            </div> 
                            <div class="text-right">  
                                <button type="button" id="continue" class="btn btn-sm btn-pry px-2">Continue</button>
                                <a href="" class="ml-2 mr-4">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="text-center mb-4"> 
                @if ($grand->main)
                    <button class="btn btn-pry px-5" type="button"> <a href="{{route('360.philantrophy')}}" class="card-link text-white">View More</a> </button>
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

<script>
    $(function() {
        $('#continue').on('click', function(e){
            var fd = new FormData($('#grand')[0]);
            $.ajax({ 
                    type: 'POST',
                    url:  "<?php echo route('save.seveng') ?>",
                    // url:  'http://infoscert.net/mygaphub/releaseb/home/7g/store',
                    data: fd,
                    processData: false, 
                    contentType: false,
                    success: function(data, status){
                        $('#errgrand').text('Succesfully Saved').fadeIn(400);
                        setTimeout(() => {$('#collapseOne').collapse('hide');  }, 1500);
                        setTimeout(() => { $('#errgrand').hide();  }, 900);
                    },
                    error: function(data, status){
                        $('#errgrand').text('Error'); 
                        setTimeout(() => {$('#collapseOne').collapse('hide');  }, 1500);
                        setTimeout(() => { $('#errgrand').hide();  }, 900);
                        // console.log("Error", status)
                    }
                });
        })
    });
</script>