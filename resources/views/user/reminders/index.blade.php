@extends('layouts.user')
@section('content')
    <div class="container-fluid">
      @if (count($reminders))
        <div class="gap-card pb-0">
            <div class="gap-card-header">
                <div class="gap-card-title txt-primary">
                  {{ ($archive) ? 'Archived Reminders'  :  'Reminders'}}
                  <span class="pull-right" style="">
                    @if ($archive)
                      <a class="mr-3" href="{{ route('reminder.index') }}" data-toggle="tooltip" title="Click to view Reminder(s)"><i class="fa fa-sticky-note"></i></a>
                    @else
                      <a class="mr-3" href="{{ route('reminder.index', ['archive' => 'all']) }}" data-toggle="tooltip" title="Click to view Archived Reminder(s)"><i class="fa fa-archive"></i></a>
                    @endif
                    <a href="{{ route('new.reminder') }}" class="card-link"> <img src="{{ asset('/assets/images/add.png') }}" width="18px" alt=""> </a>
                  </span>
                </div>
            </div>
              <div id="accordion">
                @foreach ($reminders as $key => $reminder)
                  @include('user.reminders.reminder')
                @endforeach
              </div>
        </div>
      @else
        <div class="py-5">
          <div class="gap-center text-center">
              <div class="mt-5">
                <div class="center-img">
                  <img class="img img-responsive" class="mb-1" style="height:275px;" src="{{ asset('/assets/images/gagffgsfgzfszxas.png') }}" alt="">
                </div>
                <div class="mt-2 text-center">
                    <h4> You have no reminder!</h4>
                    <a class="btn btn-pry px-3 py-1 my-2 text-white" href="{{ route('new.reminder') }}">Set a Reminder</a><br>
                    @if ($isreminder)
                        <a class="btn btn-pry px-3 py-1 my-2 text-white" href="{{ route('reminder.index', ['archive' => 'all']) }}">View Archived Reminder</a>
                    @endif
                </div>
                <div class="" style="margin-top: 30px">
                  <h5 class="mt-4 text-center">Financial Impact Reminder is a great way to make sure you never face embarrassment again
                    or lose out financially through penalties.</h5>
                </div>
              </div>
          </div>
        </div>
      @endif
    </div>
@endsection
