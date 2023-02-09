@extends('layouts.admin')

@section('content')
    <div class="wd-f my-5">
        <div class="container-fluid">
          <div class="">  
            <ul class="nav nav-tabs full-tab">
              <li class="nav-item">
                  <a class="nav-link active" href="{{ route('gap.emails') }}">Improve Status</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('gap.emails.recommendation') }}">Financial Indpendence & Recommendatation</a>
                </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('gap.emails.welcome') }}">Welcome</a>
              </li>
            </ul>
          </div>
          <div class="card my-3"> 
              <div class="card-header">
                Email Template
              </div>
              <div class="card-body">
                <form action="{{ route('store.emails') }}" method="POST">
                  @csrf
                  <input type="hidden" name="section" value="zikmhsjiknsi883wibszjxm93jwihknsjhdsddx">
                  <div class="form-group">
                    <label for="">Subject</label>
                    <input type="text" name="subject" value="{{ $mail->subject }}"  id="" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="">Message</label>
                    <textarea placeholder=""  minlength="10" name="message" id="" cols="30" rows="12" class="form-control pl-2 bg-white">{{ $mail->message }}</textarea>
                  </div> 
                  <div class="form-group my-4">
                    <div class="text-center">
                      <button type="submit" class="btn btn-block-md btn-pry">Save </button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
    </div>
@endsection 