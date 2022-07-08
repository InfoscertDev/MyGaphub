@extends('layouts.adminapp') 
@section('content')
<div class="wd-f admin-login">
    <div class="py-4">
        <div class="gap-center-sm">
          <div class="form-log form-reg card">
              <div class="text-center">
                <div class="logo">
                    <div class="wrapper">
                        <img class="img img-responsive" src="{{ asset('assets/images/logo.png') }}" alt="">
                    </div> 
                </div>
              </div>
                <div class="gap-header my-2">
                    <h3 class="text-center"><b>Admin Login</b></h3>
                    <span class="line-step mx-auto" style="width: 30%"></span>
                    {{-- <span class="line-step2"></span> --}}
                </div> 
                <div class="gap-body px-2">
                    <form method="POST" action="{{ route('admin.siginin') }}">
                        @csrf
 
                        <div class="form-group">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                            <div class="">
                                <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <div class="text-center">
                                <button type="submit" class="btn btn-block-sm btn-pry">Login </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
