<!-- List Detail SP Gallery -->

<!-- First Image -->
<figure id="first-image-for-print-only">
   <img src="https://contempothemes.com/wp-real-estate-7/multi-demo/wp-content/uploads/2016/04/lead-image-2.jpg" class="attachment-listings-featured-image size-listings-featured-image wp-post-image" alt="">
</figure>
<!-- //First Image -->
 
<figure id="lead-media">
  <div id="slider" class="flexslider" style="height: 526px;">
     {{-- <span class="prop-type-icon"><i class="fa fa-home"></i></span> --}}
     <ul class="listing-actions">
        {{-- <li><span class="listing-views" data-tooltip="25 Photos"><i class="fa fa-image"></i></span></li>
        <li><span class="save-this" data-tooltip="Favorite"><span class="wpfp-span"><a class="wpfp-link" href="?wpfpaction=add&amp;postid=1792" title="<i class=&quot;fa fa-heart-o&quot;></i>" rel="nofollow"><i class="fa fa-heart-o"></i></a></span></span></li>
        <li><span class="compare-this" data-tooltip="Compare"><a href="#" class="alike-button alike-button-style" data-post-id="1792" data-post-title="969 Market St" data-post-thumb="https://contempothemes.com/wp-real-estate-7/multi-demo/wp-content/uploads/2016/04/lead-image-2.jpg" data-post-link="https://contempothemes.com/wp-real-estate-7/multi-demo/listings/escada-apartments/" title="Add To Compare"><i class="fa fa-plus-square-o"></i></a></span></li>
        <li><span class="listing-views" data-tooltip="18803 Views"><i class="fa fa-bar-chart"></i></span></li> --}}
     </ul>

     <ul class="slides">
         @foreach($images as $image) 
            @if($image && $image != '' || $image != null)
               <li class="flex-active-slide" style="">
                  <a href="{{ url('https://gappropertyhub.com/storage/asset_images/' .$image ) }}" data-lightbox="showcase">
                        <img src="{{ url('https://gappropertyhub.com/storage/asset_images/' .$image ) }}" class="attachment-listings-slider-image size-listings-slider-image" alt="" draggable="false">	                
                     </a>
               </li>
            @endif
         @endforeach
     </ul>
     <ul class="flex-direction-nav">
        <li><a class="flex-prev flex-disabled" href="#" tabindex="-1">Previous</a></li>
        <li><a class="flex-next" href="#">Next</a></li>
     </ul> 
  </div>

  <div id="carousel" class="flexslider">
     <div class="flex-viewport" style="overflow: hidden; position: relative;">
        <ul class="slides" style="width: 2000%; transition-duration: 0s; transform: translate3d(-402px, 0px, 0px);">
         @foreach($images as $image)
            @if($image != '' || $image != null)
               <li data-thumb="{{ url('https://gappropertyhub.com/storage/asset_images/' .$image ) }}" class="flex-active-slide" style="">
                  <img src="{{ url('https://gappropertyhub.com/storage/asset_images/' .$image ) }}" class="attachment-listings-featured-image size-listings-featured-image" alt="" draggable="false">				
               </li>
               @endif
         @endforeach
        </ul>
     </div>
     <ul class="flex-direction-nav">
        <li><a class="flex-prev" href="#" tabindex="-1">Previous</a></li>
        <li><a class="flex-next flex-disabled" href="#" tabindex="-1">Next</a></li>
     </ul>
  </div>
</figure>
<!-- //List Detail SP Gallery--> 