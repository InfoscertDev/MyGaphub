<div class="">
    <div class="wel-profile my-3">
        <div class="wel-img">
            <?php $profile = auth()->user()->profile; ?> 
            <a href="{{ route('profile') }}">
                {{-- <img src="{{ asset('/assets/images/profile.png') }}"  class="img img-responsive img-rounded" alt=""> --}}
                @if ($profile->image)
                    <img src="{{asset('/assets/'. str_replace('public', 'storage', $profile->image) ) }}"  class=" profile img img-responsive  rounded-circle" alt="" title="Click to Go to Settings">
                @else
                <img src="{{asset('/assets/storage/avatar/default.png') }}"  class=" profile img img-responsive  rounded-circle"data-toggle="tooltip" title="Click to Go to Settings">
                @endif
            </a>
        </div> 
    </div>    
</div>