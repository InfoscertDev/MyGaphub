<span class="mt-2 mr-3 sm-mr-1"> 
    <span class="d-sm-none d-md-inline mr-1 bold" style="position: relative; top: 3px">Sort:</span>
    <div class="{{ isset($sort) ? 'd-inline': 'd-inline'}}" style="display: block;"  id="sort_widget">
        <div class="form-inline d-inline"> <span class="d-sm-none">:</span>
            @php
               $sort_var = ['low_price' => 'Low to High Price', 'high_price' => 'High to Low Price',
               'newest' => 'Newest Listings', 'oldest' => 'Oldest Listings', '1' => 'Default'];
            @endphp
            <select name="sort" id="sort" onchange="sortAsset(this)" id="" style="" class="px-0 bg-none br-none form-control">
                {{-- <option value=""></option> --}}
                 {{-- <option value="" selected>Default</option> --}}
                @foreach ($sort_var as $key => $st ) 
                    @if ($key == $sort)
                        <option value="{{$key}}" selected>{{$st}}</option>
                    @else 
                        <option value="{{$key}}">{{$st}}</option>
                    @endif
                @endforeach
               
            </select>
        </div>
    </div>
</span> 
<span class="mr-2 d-sm-none">|</span>
<span class="mt-3 mr-4 sm-mr-1" style="position: relative; top: 2px">
    <button class="btn bg-none bs-none"   type="button" id="dropdownAlert" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class=" d-md-inline mr-1 bold mt-2">Create Alert</span>
        <img src="{{ asset('/assets/icon/create_alert.png') }}" style="" class="gap-alert top-profile sm-img-tiny profile img img-responsive" alt="">
    </button>
    <div class="dropdown-menu p-0" style="width: 200px;" aria-labelledby="dropdownAlert">
        <div class="card">
            <div class="card-header bg-pry">
                Notify Me about:
            </div>
            <div class="card-body">
                <div class="py-0">
                    <p class="bold sm-text-left text-capitalize">All GANP @if ($gcountry->name) <span>{{$gcountry->name}}</span> @endif{{urldecode($ganp_search['g_keyword'])}} Listings</p>
                    <div class="text-center mt-2">
                        <button class="btn btn-default btn-pry px-2" onclick="createAlertNow()">Create Alert</button>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="alertCreated" tabindex="-1" role="dialog" aria-labelledby="alertCreated" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Alert Created</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5 class="text-center">Alert for <span class="text-capitalize">GANP @if ($gcountry->name) <span>{{$gcountry->name}}</span> @endif{{urldecode($ganp_search['g_keyword'])}}</span> Listings created successfully.</h5>
            </div>
            <div class="modal-footer mx-auto">
              <button type="button" data-dismiss="modal" class="btn btn-pry px-5">OK</button>
            </div>
          </div>
        </div>
    </div>
</span>