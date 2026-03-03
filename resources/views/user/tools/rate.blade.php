<div class="row mb-2">
    @php 
        $rates = json_decode($manual_currencies->currencies);
        $bcurrency = explode(" ",$currency)[1]; 
        // if($bcurrency == $manual_currencies->base){
        //     $base = 1;
        // }else{
        //     $base = $rates->EUR /  $rates->$bcurrency;
        // }  
    @endphp  
    @foreach ($currencies as $key => $info)
        @if ($info['currency'] != $currency)
            @php
                $flag = $info['flag'].'.png';
                $current = explode(" ",$info['currency'])[1]; 
                $rate = number_format(($rates->$current), 4); 
            @endphp 
            <div class="col-md-4 col-sm-6" style="max-width: 30%;  margin-bottom:10px;">
                <div class="card b-rad-20"  data-toggle="modal" data-target="#{{$info['flag']}}Currency" style="height:150px; max-width: 200px;  cursor: pointer;">
                    <img src='{{ asset("/assets/flags/$flag") }}' style="width: 50px;margin: 18px;"/>
                    <div class="ml-3">
                        <h5 class="">{{str_limit($rate,8)}} = {{explode(" ",$currency)[0]}}1.00 </h5>
                        <h5 class="">{{$info['country']}}</h5>
                    </div> 
                </div>
            </div>
            <div class="modal fade" id="{{$info['flag']}}Currency" tabindex="-1" role="dialog" aria-labelledby="{{$info['flag']}}CurrencyLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content b-rad-20"> 
                        <div class="">
                            <div class="text-center"><img src='{{ asset("/assets/flags/$flag") }}' style="width: 50px;margin: 18px;"/></div>
                        </div>
                        <div class="modal-body">
                            <div class="mx-4 mx-auto">
                                <form action="{{ route('update.exchange')}}" method="POST" class="mb-3">
                                    @csrf
                                    <div class="form-group">  
                                        <label for="" class="bold">How much {{$info['country']}} to 1 {{explode(" ",$currency)[1]}}</label>
                                        <input type="hidden" value="{{$current}}" id="abhjabgukahjbukahjbuahjbauzjhbz" name="currency">
                                        <input type="number" name="rate" value="{{$rates->$current}}" step="any" min="0" required class="form-control b-rad-10">
                                    </div>
                                    <div class="form-group text-center">
                                          <button type="submit" class="btn btn-sm btn-pry px-4">Submit</button>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
   {{-- <div class="col-md-4 col-sm-6" style="max-width: 30%;  margin-bottom:10px;">
        <div class="card b-rad-20" style="height:150px; max-width: 200px; cursor:hand;">
            <img src="{{ asset('/assets/flags/nigeria.png') }}" style="width: 50px;margin: 18px;"/>
             <div class="ml-3">
                <h5 class="">600 = £1</h5>
                <h5 class=""> Nigerian Naira</h5>
             </div>
        </div>
    </div> --}}
</div>