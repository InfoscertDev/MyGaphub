@extends('layouts.guest')
@section('content')
    <div class="container-fluid">
        <h3 class="display-4 text-center">Financial Download</h3>

       <p>Total Cost{{ $cost }}</p> <p>Total Savings{{ $saving }}</p> 
       {{-- <form method="POST" id="calc-form"  action="{{ route('finicial.complete') }}">
            {{ csrf_field() }} --}}

            <div class="tab-content">
                <div class="tap-pane">
                    <ul>
                        <li>
                            <input type="email"  min="0" value="" class="" placeholder="name@email.com"  name="sendmail" id="sendmail" required>
                        </li>
                        <li>
                            <button class="btn ">Send To Email</button>
                        </li>
                        <p>Or</p>
                        <a class="btn-save" href="{{ route('register') }}" type="submit">Continue</a>
                    </ul>
                </div>
            </div>
       {{-- </form> --}}
    </div>
@endsection

    