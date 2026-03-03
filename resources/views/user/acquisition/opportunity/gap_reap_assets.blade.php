<link href="{{ asset('assets/css/gap.css') }}" rel="stylesheet">


<section id="search" class="wd-f">
    <!-- {{-- <p class="p-2 bg-gray text-center mx-5 "> {{ $total }} Listing Found</p> --}} -->
    @if($assets) 
        <div>  
            <span class="ml-4 pb-2" id="goback">
                <a href="#" class="text-dark" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i> Back</a>
            </span>
        </div>
        <div class="d-flex m-3" style="flex-direction: column;"> 
            <div class="d-flex" style="height: 60px">
                @if(isset($assets->current_page))  
                    @php
                        if ($reap_search['keyword'] || $reap_search['country'] || $reap_search['city'] || $reap_search['property']
                                || $reap_search['price_from'] || $reap_search['price_to'] ){
                            $href = route('user.reap-search',[0,'keyword'=> $reap_search['keyword'], 'country'=> $reap_search['country'], 'pagers' => $assets->current_page - 1,
                                        'city'=> $reap_search['city'],  'property'=> $reap_search['property'],'pfrom'=> $reap_search['price_from'], 'pto'=> $reap_search['price_to']  ]) ;
                        }else{
                            $href =  route('user.reap-opportunity',[0,'property'=> $prop,  'pagers' => $assets->current_page + 1 ]) ;
                        }
                    @endphp  
                    <script> 
                        var href =  "{{ print($href) }}"
                    </script> 
                    <span>Showing page {{$assets->current_page}} of {{$assets->last_page}} </span> 
                @endif
                <!-- <div class="col-6 col-xs-6">
                    <div class="pull-right">
                        @if ($reap_search['keyword'] || $reap_search['country'] || $reap_search['city'] || $reap_search['property']
                                || $reap_search['price_from'] || $reap_search['price_to'] )
                            <ul class="pagination">
                                @if ( $assets->current_page - 1 && $assets->current_page  <=  $assets->last_page)
                                    <li class="page-item"> 
                                        <a class="page-link" href="{{ route('user.reap-search',[0,'keyword'=> $reap_search['keyword'], 'country'=> $reap_search['country'], 'page' => $assets->current_page - 1,
                                                'city'=> $reap_search['city'], 'sort' => $reap_search['sort'] , 'property'=> $reap_search['property'],'pfrom'=> $reap_search['price_from'], 'pto'=> $reap_search['price_to']  ]) }}">Previous</a>
                                    </li>
                                @endif
                                @if ( $assets->current_page + 1  <=  $assets->last_page)
                                    <li class="page-item active">
                                        <a class="page-link " href="{{ route('user.reap-search',[0,'keyword'=> $reap_search['keyword'], 'country'=> $reap_search['country'], 'page' => $assets->current_page + 1,
                                            'city'=> $reap_search['city'], 'sort' => $reap_search['sort'] , 'property'=> $reap_search['property'],'pfrom'=> $reap_search['price_from'], 'pto'=> $reap_search['price_to']  ]) }}">Next</a>
                                    </li>
                                @endif  
                            </ul> 
                        @elseif(isset($assets->current_page))
                            <ul class="pagination">
                                @if ( $assets->current_page - 1 && $assets->current_page  <=  $assets->last_page)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ route('user.reap-opportunity',[0,'property'=> $prop, 'sort'=> $sort, 'page' => $assets->current_page - 1 ]) }}">Previous</a>
                                    </li>
                                @endif
                                @if ( $assets->current_page + 1  <=  $assets->last_page) 
                                    <li class="page-item active">
                                        <a class="page-link " href="{{ route('user.reap-opportunity',[0,'property'=> $prop, 'sort'=> $sort, 'page' => $assets->current_page + 1 ]) }}">Next</a>
                                    </li>
                                @endif
                            </ul>   
                        @endif
                    </div>
                </div> -->
            </div>
            <div class="listing-search-results col-sm-12">
                @if (count($assets->data))
                    @foreach($assets->data as $asset)
                        <li class="listing col span_6 standard">
                            <figure>
                                <h6 class="snipe featured for-sale " style="display: block;"><span style="background: {{$asset->category->region}} !important;" class="text-center"> {{$asset->category->name}} </span></h6> 
                                {{-- <span class="prop-type-icon"><i class="fa fa-home"></i></span> --}}
                                <ul class="listing-actions">
                                    {{-- {{ $asset->id }} --}}
                                </ul>
                                <a href="{{ route('user.single_reap',$asset->id,['rs' => $asset->name]) }}"><img src="{{ url('https://gappropertyhub.com/storage/asset_images/'. $asset->asset_image->image1 )}}" class="attachment-listings-featured-image size-listings-featured-image" alt=""></a>
                            </figure>
                            <div class="grid-listing-info"> 
                                <header>
                                    <h5 class="marB0"><a href="{{ route('user.single_reap',$asset->id,['rs' => $asset->name]) }}">{{ str_limit($asset->name, $limit = 35, $end = '...') }}</a></h5>
                                    <p class="location muted marB0">{{ $asset->location->country }}, {{ $asset->location->city }},{{ str_limit($asset->location->street, $limit = 10, $end = '...') }} </p>
                                </header>
                                <p class="price marB0"><span class="listing-price">{{$asset->currency}} {{ $asset->investment->sale_price }}</span></p>
                                <div class="propinfo main">
                                    <p>{{ str_limit($asset->description, $limit = 85, $end = '...') }}</p>
                                    <ul class="marB0">
                                        <li class="row beds"><span class="muted left">Bed</span><span class="text-right right">{{ $asset->special_feature->spec_feature2 }}</span></li>
                                        <li class="row baths"><span class="muted left">Baths</span><span class="text-right right">{{ $asset->special_feature->spec_feature3 }}</span></li>
                                        <li class="row sqft"><span class="muted left"> Rental Income</span><span class="text-right right">{{$asset->currency}}{{ $asset->investment->total_deduction }}</span></li>
                                    </ul>
                                </div>
                                
                                {{-- <div class="brokerage">
                                    <p class="muted marB0"><small></small></p> 
                                    <p class="marB0"><a href="{{ url('/search?ct_property_type='.$asset->category->name.'&search-listings=true') }}">view all</a></p>
                                </div> --}}
                            </div>    
                        </li>
                    @endforeach
                @else
                    <div class=" text-center p-5"> 
                        <p class="nomatches p-5">
                            <strong>No properties yet.</strong>
                        </p>
                    </div> 
                @endif
            </div> 
            
            <div class="d-block" style="height: 60px">
                <div class="pull-right">
                    @if ($reap_search['keyword'] || $reap_search['country'] || $reap_search['city'] || $reap_search['property']
                                || $reap_search['price_from'] || $reap_search['price_to'] )
                            <ul class="pagination">
                                @if ( $assets->current_page - 1 && $assets->current_page  <=  $assets->last_page)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ route('user.reap-search',[0,'keyword'=> $reap_search['keyword'], 'country'=> $reap_search['country'], 'page' => $assets->current_page - 1,
                                                'city'=> $reap_search['city'], 'sort' => $reap_search['sort'] , 'property'=> $reap_search['property'],'pfrom'=> $reap_search['price_from'], 'pto'=> $reap_search['price_to']  ]) }}">Previous</a>
                                    </li>
                                @endif
                                @if ( $assets->current_page + 1  <=  $assets->last_page)
                                    <li class="page-item active">
                                        <a class="page-link " href="{{ route('user.reap-search',[0,'keyword'=> $reap_search['keyword'], 'country'=> $reap_search['country'], 'page' => $assets->current_page + 1,
                                            'city'=> $reap_search['city'], 'sort' => $reap_search['sort'] , 'property'=> $reap_search['property'],'pfrom'=> $reap_search['price_from'], 'pto'=> $reap_search['price_to']  ]) }}">Next</a>
                                    </li>
                                @endif  
                            </ul>
                    @elseif(isset($assets->current_page))
                        <ul class="pagination">
                            @if ( $assets->current_page - 1 && $assets->current_page  <=  $assets->last_page)
                                <li class="page-item">
                                    <a class="page-link" href="{{ route('user.reap-opportunity',[0,'property'=> $prop, 'sort'=> $sort, 'page' => $assets->current_page - 1 ]) }}">Previous</a>
                                </li>
                            @endif
                            @if ( $assets->current_page + 1  <=  $assets->last_page)
                                <li class="page-item active">
                                    <a class="page-link " href="{{ route('user.reap-opportunity',[0,'property'=> $prop, 'sort'=> $sort, 'page' => $assets->current_page + 1 ]) }}">Next</a>
                                </li>
                            @endif 
                        </ul>    
                    @endif
                </div>
            </div>
        </div>
    @else  
        <div class=" text-center p-5"> 
            <p class="nomatches p-5">
                <strong>No properties yet.</strong>
            </p>
        </div>  
    @endif
</section>
