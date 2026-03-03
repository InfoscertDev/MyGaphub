@extends('layouts.user')
@section('content')

<div class="wrap">
    <?php $profile = auth()->user()->profile; ?> 
    <div class="wel-profile mb-2 mr-4">
        <div class="wel-img mt-4">
                <a href="{{ Route('profile') }}">
                    @if ($profile->image)
                    <img src="{{asset('/assets/'. str_replace('public', 'storage', $profile->image) ) }}"  class="brad-wht profile img img-responsive  rounded-circle" alt="" title="Click to Go to Settings">
                @else 
                <img src="{{asset('/assets/storage/avatar/default.png') }}"  class=" profile img img-responsive  rounded-circle"data-toggle="tooltip" title="Click to Go to Settings">
                @endif
            </a>
        </div>
    </div>
     <div class="cs-wrap">
        <h1>Coming Soon</h1> 
    </div>
  </div>
@endsection