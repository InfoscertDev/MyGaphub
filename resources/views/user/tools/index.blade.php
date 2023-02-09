@extends('layouts.user')
@section('content')
    <div class="container-fluid">
        <div class="pt-3">
          <div class="gap-center">
             <div class="row">
               <div class="col-lg-10 col-sm-12">
                 <div class="row">
                   <div class="col-6">
                     <div class="tool-pane">
                       <div class="tool-logo">
                         <a href="{{ route('reminder.index') }} " class="card-link">
                           <img src="{{ asset('/assets/icon/bell.png') }}" alt="">
                         </a>
                       </div>
                       <div class="tool-title">
                         <h5>Reminder</h5>
                       </div>
                     </div>
                   </div>
                   <div class="col-6">
                     <div class="tool-pane">
                       <div class="tool-logo">
                        <a href="{{ route('exchange') }} " class="card-link">
                          <img src="{{ asset('/assets/icon/exchange.png') }}" alt="">
                        </a>
                       </div>
                       <div class="tool-title">
                         <h5>Currency Exchange</h5>
                       </div>
                     </div>
                    </div>
                    <div class="col-6">
                      <div class="tool-pane">
                        <div class="tool-logo">
                          <a href="{{ route('favourite') }} " class="card-link">
                          <img src="{{ asset('/assets/icon/favorite.png') }}" alt="">
                          </a>
                        </div>
                        <div class="tool-title"> 
                          <h5>Favourite</h5>
                        </div>
                      </div>
                     </div>
                    <div class="col-6">
                      <div class="tool-pane">
                        <div class="tool-logo">
                         <a href="{{ route('profile') }} " class="card-link">
                          <img src="{{ asset('/assets/icon/Settings_Icon.png') }}" alt="">
                         </a>
                        </div>
                        <div class="tool-title">
                          <h5>Settings</h5>
                        </div>
                      </div>
                     </div>
                     <div class="col-6">
                      <div class="tool-pane">
                        <div class="tool-logo">
                          <a href="{{ route('support') }} " class="card-link">
                          <img src="{{ asset('/assets/icon/support.png') }}" alt="">
                          </a>
                        </div>
                        <div class="tool-title">
                          <h5>Support</h5>
                        </div>
                      </div>
                     </div>
                    <div class="col-6">
                     <div class="tool-pane">
                       <div class="tool-logo">
                        <a href="{{ route('invite') }} " class="card-link">
                        <img src="{{ asset('/assets/icon/gift.png') }}" alt="">
                        </a>
                       </div>
                       <div class="tool-title">
                         <h5>Invite & Earn</h5> 
                       </div>
                     </div>
                    </div>
                     
                    <div class="col-6">
                      <div class="tool-pane">
                        <div class="tool-logo">
                          <a href="{{ route('feedback') }} " class="card-link">
                          <img src="{{ asset('/assets/icon/feedback.png') }}" alt="">
                          </a>
                        </div>
                        <div class="tool-title">
                          <h5>Feedback</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-6"></div>
                    <div class="mt-3 px-4 col-sm-6 col-xs-12">
                      <button type="button" class="btn btn-rounded btn-block bg-fb" >
                         <i class="mr-4 fa fa-facebook"></i> <a class="card-link text-white" href="{{ url('http://facebook.com') }}"> Like us on Facebook</a>
                      </button>
                    </div>
                    <div class="my-3 px-4 col-sm-6 col-xs-12">
                      <button type="button" class="btn btn-rounded btn-block bg-tweet" >
                         <i class="mr-4 fa fa-twitter"></i> <a class="card-link text-white" href="{{ url('http://twitter.com') }}">Follow us on Twitter</a>
                      </button>
                    </div>
                 </div>
               </div> 
             </div>
          </div>
        </div>
    </div>
@endsection