@extends('layouts.user')

@section('content')
<div class="m-3 ">
    <div class="action-overlay hg-f1 b-rad-20" >
        <div class="overlay-dark pb-4 hg-f1 b-rad-20">
            <div class="wel-profile mb-2 mr-4">
                <div class="wel-img mt-4">
                        @if (isset($profile->image))
                                <a href="{{ Route('profile') }}">
                                <img src="{{asset('/assets/'. str_replace('public', 'storage', $profile->image) ) }}"  class=" profile img img-responsive  rounded-circle"  data-toggle="tooltip" title="Click to Go to Settings">
                            </a> 
                            @if(auth()->user()->unseen_notifications) 
                                <a href="{{ route('notifications') }}"><span class="badge badge-gap2">{{auth()->user()->unseen_notifications}}</span> </a>
                            @endif
                        @else 
                            <a href="{{ Route('profile') }}">
                                <img src="{{asset('/assets/storage/avatar/default.png') }}"  class=" profile img img-responsive  rounded-circle"data-toggle="tooltip" title="Click to Go to Settings">
                            </a>
                        @endif
                    </a>
                </div>
            </div>
    
            <div class="gap-card gap-card-center b-rad-0">
                <div class="gap-card-header">
                    <div class="gap-card-title txt-primary py-1" >
                       Action Plan
                    </div> 
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="accord-header" id="headingOne">
                            <div class="wd-f py-1">
                                <span class="gap-card-title accord-title">Business Asset</span>
                                <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-chevron-down"></i>
                                </button> 
                            </div>
                        </div>
                    
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body pb-1">
                                <form method="POST" action="{{ route('store.assetaction') }}">
                                    @csrf
                                    <input type="hidden" name="action" value="vafgskgkzhskdfgzkgzkfgx">
                                    @include('user.actionplan.writenote.business')
                                </form>
    
                                @if (count($business))
                                    <div class="form-slate note">
                                        <h5>My Notes:</h5>
                                        <ul class="note-lists sm-no-pad">
                                            @foreach ($business as $asset)
                                                <li class="note-list-item sm-fs-12" onclick="showAsset()"> 
                                                    <span>{{$asset->date}} -</span>
                                                    <span> {{ str_limit($asset->note, 35, $end = '...')}}</span>
                                                </li>
                                            @endforeach 
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="accord-header" id="headingTwo">
                            <div class="wd-f py-1">
                                <span class="gap-card-title accord-title">Risk Asset</span>
                                <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <i class="fa fa-chevron-down"></i>
                                </button> 
                            </div>
                        </div>
                    
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body pb-1">
                                    <form method="POST" action="{{ route('store.assetaction') }}">
                                        @csrf
                                        <input type="hidden" name="action" value="apwgdhsvjxgsdgkgdxbgdcg">
                                        @include('user.actionplan.writenote.risk')
                                    </form> 
    
                                    @if (count($risk))
                                    <div class="form-slate note">
                                        <h5>My Notes:</h5>
                                        <ul class="note-lists sm-no-pad">
                                            @foreach ($risk as $asset)
                                                <li class="note-list-item sm-fs-12" onclick="showAsset()"> 
                                                    <span>{{$asset->date}} -</span>
                                                    <span> {{ str_limit($asset->note, 35, $end = '...')}}</span>
                                                </li>
                                            @endforeach 
                                        </ul>
                                    </div> 
                                @endif
                                </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="accord-header" id="headingThree">
                            <div class="wd-f py-1">
                                <span class="gap-card-title accord-title">Appreciating Asset</span>
                                <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                <i class="fa fa-chevron-down"></i>
                                </button> 
                            </div>
                        </div>
                    
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body pb-1">
                                    <form method="POST" action="{{ route('store.assetaction') }}" id="appform">
                                        @csrf
                                        <input type="hidden" name="action" value="ingtfsjvfejafdkshcvsxgcfsd">
                                        @include('user.actionplan.writenote.appreciating')
                                    </form>
    
                                    @if (count($appreciating))
                                    <div class="form-slate note">
                                        <h5>My Notes:</h5>
                                        <ul class="note-lists sm-no-pad">
                                            @foreach ($appreciating as $asset)
                                                <li class="note-list-item sm-fs-12" onclick="showAsset()"> 
                                                    <span>{{$asset->date}} -</span>
                                                    <span> {{ str_limit($asset->note, 35, $end = '...')}}</span>
                                                </li>
                                            @endforeach 
                                        </ul>
                                    </div>
                                @endif
                                </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="accord-header" id="headingFour">
                            <div class="wd-f py-1">
                                <span class="gap-card-title accord-title">Intellectual Asset</span>
                                <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                <i class="fa fa-chevron-down"></i>
                                </button> 
                            </div>
                        </div>
                    
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body pb-1">
                                    <form method="POST" action="{{ route('store.assetaction') }}">
                                        @csrf
                                        <input type="hidden" name="action" value="dehnspeabwrtindgozid">
                                        @include('user.actionplan.writenote.intellectual')
                                    </form>
    
                                    @if (count($intellectual))
                                    <div class="form-slate note">
                                        <h5>My Notes:</h5>
                                        <ul class="note-lists sm-no-pad">
                                            @foreach ($intellectual as $asset)
                                                <li class="note-list-item sm-fs-12" onclick="showAsset()"> 
                                                    <span>{{$asset->date}} -</span>
                                                    <span> {{ str_limit($asset->note, 35, $end = '...')}}</span>
                                                </li>
                                            @endforeach 
                                        </ul>
                                    </div>
                                @endif
                                </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="accord-header last" id="headingFive">
                            <div class="wd-f py-1"> 
                                <span class="gap-card-title accord-title">Depreciating Asset</span>
                                <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                <i class="fa fa-chevron-down"></i>
                                </button> 
                            </div>
                        </div>
                    
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                            <div class="card-body pb-1">
                                    <form method="POST" action="{{ route('store.assetaction') }}">
                                        @csrf
                                        <input type="hidden" name="action" value="asfshjsgvnbxsgbbsnndepljn">
                                        <div class="mt-4">
                                            @include('user.actionplan.writenote.depreciating')
                                        </div>
                                    </form>
    
                                    @if (count($depreciating))
                                    <div class="form-slate note">
                                        <h5>My Notes:</h5>
                                        <ul class="note-lists sm-no-pad">
                                            @foreach ($depreciating as $asset)
                                                <li class="note-list-item sm-fs-12" onclick="showAsset()"> 
                                                    <span>{{$asset->date}} -</span>
                                                    <span> {{ str_limit($asset->note, 40, $end = '...')}}</span>
                                                </li>
                                            @endforeach 
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        @include('user.actionplan.planednote')
    </div> 
</div>

<script>
function showAsset(){
    console.log('Done');

    $('noteModal').show();
}

$(function() {
    var link = window.location.href;
    if(link.match('business')){
        $('#collapseOne').addClass('show');
    }else if(link.match('risk')){
        $('#collapseTwo').addClass('show');
    }else if(link.match('appreciate')){
        $('#collapseThree').addClass('show');
    }else if(link.match('intellect')){
        $('#collapseFour').addClass('show');
    }else if(link.match('depreciate')){
        $('#collapseFive').addClass('show');
    }
    
    $('#toggleAccordions').on('click', function(e) {
        $('#accordion .collapse').removeAttr("data-parent");
        $('#accordion .collapse').collapse('show');
    })
    $('#toggleAccordions-hide').on('click', function(e) {
        $('#accordion .collapse').attr("data-parent","#accordion");
        $('#accordion .collapse').collapse('hide');
    });


}); 
</script>
@endsection
