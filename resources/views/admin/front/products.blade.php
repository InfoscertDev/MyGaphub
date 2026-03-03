@extends('layouts.admin')

@section('content')
    <div class="wd-f my-5">
        <div class="elevation-3 mx-auto b-rad-20 wd-8">
            <div class="gap-header">
                <h4 class="gap-title">Acquisition Opportunities</h4>
                <h6 class="gap-subtitle fs-14">Double click image to update  </h6>
            </div>
            <div class="gap-lists ml-0"> 
                <form method="POST"  action="{{ route('gap.store.products', $acquisition[0]['category']) }}" enctype="multipart/form-data">
                    <div class="asset-list asset-opt">
                        @csrf 
                        <div class="list-img img-right img-opt">
                            <img src="{{ $acquisition[0]['photo'] }}" alt=" " class="img img-responsive"
                                id="reap_asset"  ondblclick=" return document.getElementById('upload_reap_asset').click();" />
                            <input type="file" name="photo" id="upload_reap_asset" onchange="prepareFile(event)" accept="image/jpeg,image/png,image/webp" class="none">
                            <script> 
                                function prepareFile(e) {
                                    var reap_asset = document.getElementById('reap_asset');
                                    reap_asset.src = window.URL.createObjectURL(e.target.files[0]);
                                }
                            </script>
                        </div>
                        <div class="list-body"> 
                   
                            <div class="form-inline my-2 ">
                                <label for="" class="bold wd-3 mr-3 text-left">Category</label>
                                <input type="text" class="form-control wd-8" name="fullname" value="{{$acquisition[0]['fullname']}}" />
                            </div>
                            <div class="form-inline my-2 ">
                                <label for="" class="bold wd-3 mr-3 text-left">Country</label>
                                <input type="text" class="form-control wd-8 " name="country" value="{{$acquisition[0]['country']}}" />
                            </div>
                            <div class="form-inline my-2 ">
                                <label for="" class="bold wd-3 mr-3 text-left">Minimum Capital</label>
                                <input type="text" class="form-control wd-7 " name="capital" value="{{$acquisition[0]['capital']}}" />
                            </div>
                            <div class="form-inline my-2 ">
                                <label for="" class="bold wd-3 mr-3 text-left">ROI</label>
                                <input type="text" class="form-control wd-7 " name="roi" value="{{$acquisition[0]['roi']}}" />
                            </div>
                            <div class="text-right mt-2">
                               <a class="card-link text-white"><button class="btn btn-pry px-4"> Save</button></a>
                           </div>
                        </div>
                    </div> 
                </form>
                
                <form method="POST"  action="{{ route('gap.store.products', $acquisition[1]['category']) }}" enctype="multipart/form-data">
                    <div class="asset-list asset-opt">
                        @csrf
                       
                        <div class="list-img img-right img-opt"> 
                            <img src="{{ $acquisition[1]['photo'] }}" alt=" " class="img img-responsive"
                                id="ganp_asset"  ondblclick=" return document.getElementById('upload_ganp_asset').click();" />
                            <input type="file" name="photo" id="upload_ganp_asset" onchange="prepareFileGanp(event)" accept="image/jpeg,image/png,image/webp" class="none">
                            <script> 
                                function prepareFileGanp(e) {
                                    var ganp_asset = document.getElementById('ganp_asset');
                                    ganp_asset.src = window.URL.createObjectURL(e.target.files[0]);
                                }
                            </script>
                        </div> 
                        <div class="list-body"> 
                   
                            <div class="form-inline my-2 ">
                                <label for="" class="bold wd-3 mr-3 text-left">Category</label>
                                <input type="text" class="form-control wd-8" name="fullname" value="{{$acquisition[1]['fullname']}}" />
                            </div>
                            <div class="form-inline my-2 ">
                                <label for="" class="bold wd-3 mr-3 text-left">Country</label>
                                <input type="text" class="form-control wd-8 " name="country" value="{{$acquisition[1]['country']}}" />
                            </div>
                            <div class="form-inline my-2 ">
                                <label for="" class="bold wd-3 mr-3 text-left">Minimum Capital</label>
                                <input type="text" class="form-control wd-7 " name="capital" value="{{$acquisition[1]['capital']}}" />
                            </div>
                            <div class="form-inline my-2 ">
                                <label for="" class="bold wd-3 mr-3 text-left">ROI</label>
                                <input type="text" class="form-control wd-7 " name="roi" value="{{$acquisition[1]['roi']}}" />
                            </div>
                            <div class="text-right mt-2">
                               <a class="card-link text-white"><button class="btn btn-pry px-4"> Save</button></a>
                           </div>
                        </div>
                    </div> 
                </form>
            
            </div>
        </div>
        
    </div>
@endsection 