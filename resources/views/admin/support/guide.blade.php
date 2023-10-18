@extends('layouts.admin')
@section('content')

<div class="container-fluid">

    <div class="" style="min-height: 500px;">
        <div class="col-12 my-4">
            <span class="mr-3 pb-2" id="goback">
                <a href="#" class="text-dark bold" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i>  Back</a>
            </span>

            <button class="btn btn-pry px-2 pull-right mr-5" data-toggle="modal" data-target="#quickStartModal">New</button>
        </div>
        <div class="row m-2">
            @foreach($guides as $support)
                <div class="col-md-4 col-sm-12">
                    <div class="mb-5 mx-2">
                        <picture>
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
                    <button type="button" class="close" data-dismiss="modal" onclick="closePlayer()" aria-label="Close">
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
            $('#gaphubSupport').modal({ backdrop: 'static'},'show');
            $('#ytplayer').attr('src', 'https://www.youtube.com/embed/'+youtubeId+'?autoplay=1');
        }

        function closePlayer(){
            $("#gaphubSupport").modal().hide();
            $("#gaphubSupport iframe").attr("src", '');
        }

    </script>

    <div class="modal fade" id="quickStartModal" tabindex="-1" role="dialog" aria-labelledby="quickStartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialoged-center" role="document">
            <div class="modal-content wd-c sm-wd-c">
                <div class="modal-header">
                <h5 class="modal-title" id="quickStartModalLabel">Create Quick guide</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="{{ route('gap.store.guide') }}" class="my-3" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="" class="bold">Title</label>
                        <input type="text" class="form-control" name="title" required min="3" value="">
                    </div>

                    <div class="form-group">
                        <label for="" class="bold">Youtube Video</label>
                        <input type="text" class="form-control" name="video_link" required value="">
                        <small class="text-info"> Choose a video link that is active</small>
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
@endsection