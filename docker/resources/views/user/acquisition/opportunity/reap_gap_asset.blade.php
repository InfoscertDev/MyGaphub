@extends('layouts.user')
@section('content')
    <div class="wd-f bg-white py-3">
        <div id="reap_banner" style="display: none">
            @include('inc.reap-banner') 
        </div>
        <br>
        <div class="d-flex mt-2 mx-3">
            @include('user.acquisition.opportunity.gap_reap_assets')
        </div>
    </div> 
@endsection 