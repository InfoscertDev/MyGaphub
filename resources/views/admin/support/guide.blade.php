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
                        <picture  onclick=editQuickStart("{{ $support->id  }}")>
                            <source media="(max-width: 560px)" srcset="{{ 'https://i.ytimg.com/vi_webp/'. $support->video_id .'/mqdefault.webp' }}">
                            <img src="{{'https://i.ytimg.com/vi_webp/'. $support->video_id .'/mqdefault.webp' }}" alt=""
                               style="position: relative;
                                   width: 90%; height: 90%;
                                   top: 0px; left: 0px; cursor:  pointer;
                                   object-fit: cover;" >
                        </picture>
                        <div style="width: 90%;">
                           <span class="Text__Caption-sc-11x2ir8-16 PageCard__CardLabel-sc-1wdpqm4-3 cVNTwU">Video Tutorial
                            <button class="btn btn-sm bg-none px-2 pull-right" onclick='deleteQuickStart("{{$support->id}}")' >
                                    <i class="fa fa-trash" style="font-size:16px" ></i>
                                </button>
                           </span>
                           <h2 class="Text__Title1-sc-11x2ir8-9 jgnctv title">{{$support->title}} </h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="editSupportModal" tabindex="-1" role="dialog" aria-labelledby="editSupportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content b-rad-20 wd-c">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSupportModalLabel">Update GAPhub Support</h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="closePlayer()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="min-height: 150px;">
                    <form id="update_guide"  class="my-3" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="" class="bold">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required min="3" value="">
                        </div>

                        <div class="form-group">
                            <label for="" class="bold">Youtube Video</label>
                            <input type="text" class="form-control"  id="video_link" name="video_link" required value="">
                            <small class="text-info"> Choose a video link that is active</small>
                        </div>

                        <div class="form-group ">
                            <div class="float-right my-3">
                                <button type="submit" class="btn btn-pry px-3" >Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="quickStartModal" tabindex="-1" role="dialog" aria-labelledby="quickStartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialoged-center" role="document">
            <div class="modal-content wd-c sm-wd-c">
                <div class="modal-header">
                <h5 class="modal-title" id="quickStartModalLabel">Add New Quick Guide</h5>
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

     <!--  -->
    <div class="modal fade" id="confirmDeleteSupport" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirm Delete </h5>
                    <button type="button" class="close" onclick="$('#confirmDeleteSupport').modal('hide');"  aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center">Are you sure you want to delete this Quickstart guide?</h5>
                </div>

                <form id="delete_support" action="" method="post">
                    @csrf
                    @method('DELETE')

                    <div class="modal-footer justify-content-center">
                        <div class="text-left">
                            <button type="submit" id="confirmAccountRemove"  class="btn btn-pry px-3 mr-3">Yes</button>
                        </div>
                        <div class="text-right">
                            <button type="button" onclick="$('#confirmDeleteSupport').modal('hide');" class="btn btn-default px-3 mr-3">No</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function editQuickStart(id){
            // $('#gaph÷ubSupport').modal({ backdrop: 'static'},'show');
            var href = window.location.href+'/'+id;
            $.ajax({
                type: 'GET',
                url: href,
                success: function(data, status){
                    var asset = data.guide;
                    // console.log(asset);
                    if(asset){
                        $('#editSupportModal').modal('show');
                        $('#title').val(asset.title);
                        $('#video_link').val(asset.video_link);
                        // $('#status').prop('checked', asset.status);
                        $('#update_guide').attr('action',  href);
                    }
                }
            });
            // $('#ytplayer').attr('src', 'https://www.youtube.com/embed/'+youtubeId+'?autoplay=1');
        }

        function deleteQuickStart(id){
            $('#confirmDeleteSupport').modal('show');
            var href = window.location.href+'/'+id;
            $('#delete_support').attr('action',  href);
        }

        function closePlayer(){
            $("#gaphubSupport").modal().hide();
            $("#gaphubSupport iframe").attr("src", '');
        }

    </script>


 </div>
@endsection
