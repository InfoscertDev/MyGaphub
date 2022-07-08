@extends('layouts.user')
@section('content')

<div class="">
    <div class="gap-car " style="min-height: 500px;">
        <div class="row mx-4">
             @foreach($gap_supports as $support)
                 <div class="col-md-6 col-12-sm-12">
                     <div class="mb-5 mx-2">
                         <picture onclick="playSupport(`{{$support['id']}}`)">
                             <source media="(max-width: 560px)" srcset="{{ 'https://i.ytimg.com/vi_webp/'. $support['id'] .'/mqdefault.webp' }}">
                             <img src="{{'https://i.ytimg.com/vi_webp/'. $support['id'].'/mqdefault.webp' }}" alt=""
                                style="position: relative;
                                    width: 90%; height: 90%;
                                    top: 0px; left: 0px; cursor:  pointer;
                                    object-fit: cover;" > 
                         </picture>
                         <div>
                             <!-- YgmIl8fF-tw
                             https://i.ytimg.com/an_webp/F09LFhTcXTM/mqdefault_6s.webp?du=3000&sqp=CJnm5I4G&rs=AOn4CLBcJQcgLTLUIrxO4OgJIlZ-Q73d0g
                            https://i.ytimg.com/an_webp/YgmIl8fF-tw/mqdefault_6s.webp?du=3000&sqp=CMC94I4G&rs=AOn4CLDgttL8v2toeb2V_uvkx2WU4Uwouw
                            -->
                            <span class="Text__Caption-sc-11x2ir8-16 PageCard__CardLabel-sc-1wdpqm4-3 cVNTwU">Video Tutorial</span>
                            <h2 class="Text__Title1-sc-11x2ir8-9 jgnctv title">{{$support['title']}} </h2>
                            <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, architecto.</p> -->
                         </div>
                     </div>
                 </div> 
             @endforeach
        </div>
    </div>

    <div class="modal fade" id="gaphubSupport" tabindex="-1" role="dialog" aria-labelledby="gaphubSupportLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content b-rad-20 wd-c">  
                <div class="modal-header">
                    <h5 class="modal-title" id="gaphubSupportLabel">GAPhub Support</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>  
                <div class="modal-body" style="min-height: 150px;">
                    <div class="mt-2 mb-4">
                        <iframe class="sm-wdf" width="560" height="315" id="ytplayer" src="" title="GAPhub support" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
    <script>
        function playSupport(youtubeId){
            $('#gaphubSupport').modal('show');
            $('#ytplayer').attr('src', 'https://www.youtube.com/embed/'+youtubeId+'?autoplay=1');
        }
    </script>
 </div>
@endsection 