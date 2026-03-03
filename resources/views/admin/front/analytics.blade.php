@extends('layouts.admin')

@section('content')
    <div class="wd-f my-5">
        <div class="gap-card">
            <div class="gap-header">
                <h4 class="gap-title">Asset Acquisition</h4>
                <h6 class="gap-subtitle fs-14">Double click image to update  </h6>
            </div>
            <div id="accordion"> 
                <div class="card bg-light">
                    <div class="gap-card-header" id="headingOne">
                        <div class="wd-f mb-0">
                            <span class="gap-card-title accord-title">Business Asset </span>
                            <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-chevron-down"></i>
                            </button>  
                        </div>
                    </div> 
                
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body pb-1">
                        <div class="px-3 wd-8">
                                <form method="POST" action="{{ route('gap.store.acqusition', $acquisition[0]['name']) }}" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="form-group">
                                        <img src="{{$acquisition[0]['photo']}}" class="img img-responsive acquisition_image"
                                            id="business_asset"  ondblclick=" return document.getElementById('upload_business_asset').click();" />
                                        <input type="file" name="photo" id="upload_business_asset" onchange="prepareFile(event)" accept="image/jpeg,image/png,image/webp" class="none">
                                        <script> 
                                            function prepareFile(e) {
                                                var business_asset = document.getElementById('business_asset');
                                                business_asset.src = window.URL.createObjectURL(e.target.files[0]);
                                            }
                                        </script>
                                    </div>
                                    <div class="form-group">
                                         <label for="" class="bold">Acquisition Name</label>
                                         <input type="text" class="form-control" name="fullname" value="{{ $acquisition[0]['fullname'] }}">
                                    </div>
                                    <div class="form-group">
                                         <label for="" class="bold">Acquisition Description</label>
                                         <textarea class="form-control" name="description" id="" rows="4">{{ $acquisition[0]['description'] }} </textarea>
                                    </div>
                                    <div class="form-group ">
                                        <div class="float-right my-3">
                                            <button type="submit" class="btn btn-pry px-3" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-light">
                    <div class="accord-header " id="headingRisk">
                        <div class="wd-f mb-0">
                            <span class="gap-card-title accord-title">Risk Asset</span>
                            <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseRate" aria-expanded="true" aria-controls="collapseRate">
                                 <i class="fa fa-chevron-down"></i>
                            </button> 
                        </div>
                    </div>
                
                    <div id="collapseRate" class="collapse " aria-labelledby="headingRisk" data-parent="#accordion">
                        <div class="card-body accordion-body">
                            <div class="px-3 wd-8">
                                <form method="POST" action="{{ route('gap.store.acqusition', $acquisition[1]['name']) }}" enctype="multipart/form-data">    
                                    @csrf 
                                    <div class="form-group">
                                        <img src="{{$acquisition[1]['photo']}}" class="img img-responsive acquisition_image"
                                            id="risk_asset"  ondblclick=" return document.getElementById('upload_risk_asset').click();" />
                                        <input type="file" name="photo" id="upload_risk_asset" onchange="prepareFileRisk(event)" accept="image/jpeg,image/png,image/webp" class="none">
                                        <script> 
                                            function prepareFileRisk(e) {
                                                var risk_asset = document.getElementById('risk_asset');
                                                risk_asset.src = window.URL.createObjectURL(e.target.files[0]);
                                            }
                                        </script>
                                    </div>
                                    <div class="form-group">
                                         <label for="" class="bold">Acquisition Name</label>
                                         <input type="text" class="form-control" name="fullname" value="{{ $acquisition[1]['fullname'] }}">
                                    </div>
                                    <div class="form-group">
                                         <label for="" class="bold">Acquisition Description</label>
                                         <textarea class="form-control" name="description" id="" rows="4">{{ $acquisition[1]['description'] }} </textarea>
                                    </div>
                                    <div class="form-group ">
                                        <div class="float-right my-3">
                                            <button type="submit" class="btn btn-pry px-3" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-light">
                    <div class="accord-header" id="headingMarket">
                        <div class="wd-f mb-0">
                            <span class="gap-card-title accord-title">Appreciating Asset</span>
                            <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseMarket" aria-expanded="true" aria-controls="collapseMarket">
                            <i class="fa fa-chevron-down"></i>
                            </button> 
                        </div>
                    </div>
                
                    <div id="collapseMarket" class="collapse" aria-labelledby="headingMarket" data-parent="#accordion">
                        <div class="card-body pb-1">
                        <div class="px-3 wd-8">
                                <form method="POST" action="{{ route('gap.store.acqusition', $acquisition[2]['name']) }}" enctype="multipart/form-data">    
                                    @csrf 
                                    <div class="form-group">
                                        <img src="{{$acquisition[2]['photo']}}" class="img img-responsive acquisition_image"
                                            id="app_asset"  ondblclick=" return document.getElementById('upload_app_asset').click();" />
                                        <input type="file" name="photo" id="upload_app_asset" onchange="prepareFileApp(event)" accept="image/jpeg,image/png,image/webp" class="none">
                                        <script> 
                                            function prepareFileApp(e) {
                                                var app_asset = document.getElementById('app_asset');
                                                app_asset.src = window.URL.createObjectURL(e.target.files[0]);
                                            }
                                        </script>
                                    </div>
                                    <div class="form-group">
                                         <label for="" class="bold">Acquisition Name</label>
                                         <input type="text" class="form-control" name="fullname" value="{{ $acquisition[2]['fullname'] }}">
                                    </div>
                                    <div class="form-group">
                                         <label for="" class="bold">Acquisition Description</label>
                                         <textarea class="form-control" name="description" id="" rows="4">{{ $acquisition[2]['description'] }} </textarea>
                                    </div>
                                    <div class="form-group ">
                                        <div class="float-right my-3">
                                            <button type="submit" class="btn btn-pry px-3" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-light">
                    <div class="accord-header last" id="headingContact">
                        <div class="wd-f mb-0">
                            <span class="gap-card-title accord-title">Intellectual Asset</span>
                            <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseIntellectual" aria-expanded="true" aria-controls="collapseIntellectual">
                            <i class="fa fa-chevron-down"></i>
                            </button> 
                        </div>
                    </div>
                
                    <div id="collapseIntellectual" class="collapse" aria-labelledby="headingContact" data-parent="#accordion">
                        <div class="card-body">
                            <div class="px-3 wd-8">
                                <form method="POST" action="{{ route('gap.store.acqusition', $acquisition[3]['name']) }}" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="form-group">
                                        <img src="{{$acquisition[3]['photo']}}" class="img img-responsive acquisition_image"
                                            id="intellect_asset"  ondblclick=" return document.getElementById('upload_intellect_asset').click();" />
                                        <input type="file" name="photo" id="upload_intellect_asset" onchange="prepareFileIntel(event)" accept="image/jpeg,image/png,image/webp" class="none">
                                        <script> 
                                            function prepareFileIntel(e) {
                                                var intellect_asset = document.getElementById('intellect_asset');
                                                intellect_asset.src = window.URL.createObjectURL((e.target.files[0]));
                                            }
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="bold">Acquisition Name</label>
                                        <input type="text" class="form-control" name="fullname" value="{{ $acquisition[3]['fullname'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="bold">Acquisition Description</label>
                                        <textarea class="form-control" name="description" id="" rows="4">{{ $acquisition[3]['description'] }} </textarea>
                                    </div>
                                    <div class="form-group ">
                                        <div class="float-right my-3">
                                            <button type="submit" class="btn btn-pry px-3" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-light">
                    <div class="accord-header last" id="headingDepreciating">
                        <div class="wd-f mb-0">
                            <span class="gap-card-title accord-title">Depreciating Asset</span>
                            <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseContact" aria-expanded="true" aria-controls="collapseContact">
                            <i class="fa fa-chevron-down"></i>
                            </button> 
                        </div>
                    </div>
                
                    <div id="collapseContact" class="collapse" aria-labelledby="headingDepreciating" data-parent="#accordion">
                        <div class="card-body">
                        <div class="px-3 wd-8">
                                <form method="POST" action="{{ route('gap.store.acqusition', $acquisition[4]['name']) }}" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="form-group">
                                        <img src="{{$acquisition[4]['photo']}}" class="img img-responsive acquisition_image"
                                            id="deprec_asset"  ondblclick=" return document.getElementById('upload_deprec_asset').click();" />
                                        <input type="file" name="photo" id="upload_deprec_asset" onchange="prepareFileDep(event)" accept="image/jpeg,image/png,image/webp" class="none">
                                        <script> 
                                            function prepareFileDep(e) {
                                                var deprec_asset = document.getElementById('deprec_asset');
                                                deprec_asset.src = window.URL.createObjectURL(e.target.files[0]);
                                            }
                                        </script>
                                    </div>
                                    <div class="form-group">
                                         <label for="" class="bold">Acquisition Name</label>
                                         <input type="text" class="form-control" name="fullname" value="{{ $acquisition[4]['fullname'] }}">
                                    </div>
                                    <div class="form-group">
                                         <label for="" class="bold">Acquisition Description</label>
                                         <textarea class="form-control" name="description" id="" rows="4">{{ $acquisition[4]['description'] }} </textarea>
                                    </div>
                                    <div class="form-group ">
                                        <div class="float-right my-3">
                                            <button type="submit" class="btn btn-pry px-3" >Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection 