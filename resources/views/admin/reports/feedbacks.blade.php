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
                            <p class="mb-1">
                                <span class="bold mr-4">Subject:</span>
                                <span class="h5">  {{$feedback->subject}}</span>
                            </p>
                            <p class="mb-1">
                                <span class="bold">Message</span> <br>
                                {{$feedback->message}}
                            </p> 
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
    </div>
</div> 
@endsection