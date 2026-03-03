<div class="card">
  <div class="accord-header reminder d-flex px-1" id="{{$key+1}}">
    <div class="wd-f">
        <span class="col-3 gap-card-title accord-title">
          <span class="">{{$key+1}}.</span>
          <span class="">{{$reminder->name}}</span>
        </span>  
        <span class="col-3 gap-card-title accord-title">{{$reminder->date}}</span>
        <span class="col-3 gap-card-title accord-title sm-fs-12">   
          @if (!$archive)
            @if($reminder->dueday > -1 &&  $reminder->date >= date('Y-m-d') && $reminder->due >= $reminder->dueday )
              {{-- @if($reminder->dueday <= 3 && $reminder->dueday > -1) @endif --}}
                <span class="mr-1 fa fa-exclamation-triangle txt-primary" > </span>   
                @if ($reminder->dueday == 0 )
                    Today is <span class="sm-d-non"> the Due Date</span> 
                @else
                  {{ $reminder->dueday}} {{ ($reminder->dueday > 1 ) ? ' days' : ' day' }} 
                  <span class="sm-d-non"> to Due Date</span> 
                @endif
            @elseif(date('Y-m-d') > $reminder->date )
                <span class="sm-d-non">  
                  <img src="{{ asset('/assets/icon/reminder-info.png')}}" class="img im-responsive" width="21" alt="">
                  This event has passed</span>
            @endif 
          @endif
        </span>
        <span class="col-3 pull-right sm-no-float"> 
          <span class="reminder-price sm-px-1"> {{$currency}} {{$reminder->amount}}</span>
          <button class="btn btn-accord collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">
            <i class="fa fa-chevron-down"></i>
          </button>  
        </span>
    </div>
  </div>

<div id="collapse{{$key+1}}" class="collapse" aria-labelledby="{{$key+1}}" data-parent="#accordion">
  <div class="card-body pb-1">
    <div class="row mx-0 sm-no-pad px-5 pt-2 pb-4">
      <div class="mx-4 col-12 d-flex">
          <div class="col-5">
            <h6>Amount</h6>
            <h2 class="sm-fs-14">{{$currency}}{{$reminder->amount}}</h2>
          </div>
          <div class="col-7">
            <h6>Date</h6>
            <h2 class="sm-fs-14">{{$reminder->date}}</h2>
          </div>
      </div>
      <div class="col-12 mt-2">
        <h6 class="ml-4">Note</h6>
        <textarea disabled class="form-control" cols="30" rows="3">{{$reminder->note}}</textarea>
      </div>
      @if (!$archive)
        <div class="col-12 mt-3 text-right">
            <span class="mr-3"><a href="{{ route('reminder.edit', $reminder->id) }}">Edit</a></span>
            <form class="" style="display: inline" method="POST" action="{{ route('reminder.update', $reminder->id) }}">
              @csrf
              @method('PUT')
              <input type="hidden" name="mark" value="sygzjsxgvcxbsbdvbvxgvxnbcncff">
              <button class="btn btn-pry">
                  <i class="fa fa-mark mr-2"></i> Mark as complete
              </button>
            </form>
        </div>
      @endif
    </div>
  </div>
</div>
</div>