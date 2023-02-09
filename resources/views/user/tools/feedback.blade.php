@extends('layouts.user')

@section('content')

<div class="my-5">
    <div class="gap-center gap-card bg-light elevation-3"> 
          <h4 class="pt-3 text-center bold">Feedback</h4>
          <p class="text-center pb-2 px-5 sm-px-2">Please select from the feedback categories below in order to pick a feedback subject.
              Our team will like to hear what you think about GAPhub. 
          </p> 
          <div class="card-body">
            <form action="{{ route('send.feedback') }}" method="POST">
                @csrf
                <div class="my-2"> 
                  @php
                    $subjects = ["Dashboard", "Seed", "Action Plan", "Acquisition", "Portfolio",  
                                  "Analytics", "Reminder", "Suggestions"];
                  @endphp
                  <div class="form-group"> 
                    <label for="" class="gap-card-title txt-pry">Subject</label>
                    <select name="subject" id="" class="form-control b-rad-10">
                        @foreach($subjects as $subject)
                          <option value="{{$subject}}">{{$subject}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="" class="gap-card-title txt-pry">Message</label>
                    <textarea name="message" class="form-control b-rad-10" id="" placeholder="Type your message" cols="30" rows="7" minlength="10" maxlength="512"></textarea>
                  </div> 
                  <div class="text-center my-2"> 
                      <button type="submit" class="btn btn-pry px-4">Submit</button>
                  </div> 
                </div>
            </form>
          </div>
    </div>
 </div>
@endsection