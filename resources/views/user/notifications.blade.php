@extends('layouts.user')
@section('content')


<div class="">
    <div class="gap-card pb-3" style="min-height: 300px;">
        <div class="gap-header d-flex text-left" style="">
            <h4 class="pl-3 gt"> 
                Notifications
                <span class="ml-1">
                    <i class="fa fa-bell ml-2" data-toggle="tooltip" title="Catch up with all your notfication(s) here" data-original-title=""></i>
                </span> 
                <span class="line-step mt-2" style="width: 25%"></span>
            </h4>
        </div> 
        <div class="mx-2">
            <div class="">
                @if(count($notifications))
                    @foreach($notifications as $notification)
                        <div class="notice_board sm-wdf sm-px-2">
                            <a href="{{$notification->action}}" class="text-dark card-link row mx-0">
                                <div class="col-2">
                                    @if($notification->category == 'reminder')
                                        <img src="{{ asset('/assets/icon/bell.png') }}" alt="" style="width: 50px;" class="mt-2">
                                    @elseif($notification->category == 'acquisition')
                                         <img src="{{ asset('/assets/icon/Acquisition.png') }}" alt="" style="width: 50px;" class="mt-2">
                                    @endif
                                </div>
                                <div class="col-9"> 
                                    <h5 class="txt-primary"> {{$notification->title}}  </h5>
                                    <p> {{$notification->message}}  </p>
                                </div>
                            </a>
                            <span class="float-right footer small italic">{{date("d M y",strtotime($notification->created_at))}}</span>    
                        </div>
                    @endforeach
                    
                    <div class="text-center my-2" style="width: 50%; margin:0 auto">
                        @if($notifications->nextPageUrl())
                            <p><a class="page-link brad txt-primary" href="{{ $notifications->nextPageUrl() }}">Load More</a></p>
                        @endif
                    </div>
                @else
                    <div class="jumbotron bg-light shadow-sm mx-3">
                        <div class="py-4">
                            <h4 class="text-center">No Notifications</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection