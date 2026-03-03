@extends('layouts.user')
@section('content')
 
@include('inc.settings_menu')
<div class="">
    <div class="gap-card" style="height: 300px;">
        <div class="gap-header d-flex text-left" style="">
            <h4 class="gt"> <span class="pl-1">Compliance</span> 
                <span class="line-step mt-2" style="width: 20%"></span>
            </h4>
        </div> 
        <div class="mx-3">
            <ul class="list-group list-group-flush cash-tiles">
                <li class="list-group-item my-2">
                    <a href="https://www.mygaphub.com/index.php/privacy-policy/" target="_blank" class="card-link text-white">
                        <span><i class="fa fa-info mr-3"></i></span>
                        <span class="mx-3  text-capitalize"> Privacy Policy  </span> 
                        <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                    </a> 
                </li>  
                <li class="list-group-item my-2">
                    <a href="https://www.mygaphub.com/index.php/terms-conditions/" target="_blank" class="card-link text-white">
                        <span><i class="fa fa-info mr-3"></i></span>
                        <span class="mx-3  text-capitalize"> Terms & Conditions  </span> 
                        <span class="pull-right"><i class="fa fa-chevron-right"></i> </span>
                    </a> 
                </li>   
    
            </ul>
        </div>
    </div>
</div>
@endsection