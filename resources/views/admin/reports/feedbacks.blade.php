@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="wd-f my-5">
        <h5 class="gap-title text-center pb-3">Feedbacks</h5>
        <div class="row">
            @foreach ($feedbacks as $feedback)
                <div class="col-md-6">
                    <div class="card bg-light elevation-3 my-2  pb-2" style="height: 320px;">
                        <div class="card-body">
                            <h5 class="card-title text-center">
                                <span class=" txt-primary bold">{{$feedback->user->surname}} {{$feedback->user->firstname}}</span>
                                <br><small class="">{{$feedback->user->email}}</small>
                            </h5>
                            <div class="mb-1">
                                <h5 class="bold mr-4">Subject:</h5>
                                <p class="ml-3">  {{$feedback->subject}}</p>
                            </div>
                            <div class="mb-1">
                                <h5 class="bold">Message</h5>
                               <p  class="ml-3">  {{$feedback->message}}</p>
                            </div>

                            <div class="mb-1">
                                <h5 class="bold">Response</h5>
                                @if($feedback->extra)
                                     <p  class="ml-3">  {{$feedback->extra}}</p>
                                @else
                                     <p class="ml-3">
                                        <a class="text-underline" onclick='replyFeedback("{{$feedback->id}}")'>Create response</a>
                                     </p>
                                @endif
                                <!-- <textarea name="" id="" cols="10" rows="3"></textarea> -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-2">
            <div class="mx-auto text-center">
            {{ $feedbacks->onEachSide(1)->links() }}
            </div>
        </div>

        <div class="modal fade" id="replyFeedbackModal" tabindex="-1" role="dialog" aria-labelledby="replyFeedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialoged-center" role="document">
                <div class="modal-content wd-c sm-wd-c">
                    <div class="modal-header">
                    <h5 class="modal-title" id="replyFeedbackModalLabel">Feedback Response</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form id="feedback_form" action="{{ route('gap.reply.feedback',[0]) }}"  class="my-3" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="" class="bold">Response</label>
                                <textarea class="form-control" id="reply" name="reply" id="" rows="4"> </textarea>
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

    <script>
        function replyFeedback(id){
            console.log(id)
            var href = window.location.href+'/'+id;
            $('#feedback_form').attr('action',  href);
            $('#replyFeedbackModal').modal('show')
        }
    </script>
</div>
@endsection
