@extends('layouts.admin')

@section('content')
    <div class="wd-f my-5">
        <div class="card">
            <div class="card-header">
                <h4>Failed Login Attempt</h4>
            </div> 
            <div class="card-body">
              @if (count($logins)) 
                <table class="table table-striped">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">User</th>
                      <th scope="col">Email</th>
                      <th scope="col">Total Attempts</th>
                      <th scope="col">Attempt Series</th>
                      <th scope="col">Platform Access</th>
                      <th scope="col">Access Device</th>
                      <th scope="col">IP Address</th> 
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($logins  as $login)
                    @php
                        $device = explode(" ",$login->device);
                    @endphp
                      <tr>  
                        <th scope="row">{{ ($login->user->firstname)}} {{ ($login->user->surname)}}  </th>
                        <th>{{ ($login->user->email)}}  </th>
                        <td>{{ $login->total_attempt }}</td>
                        <td>{{ $login->attempt_series }}</td> 
                        <td>{{ $login->access_type }}</td>
                        <td>{{ $device[count($device) - 2] }}</td>
                        <td> {{ $login->ip }}  </td>
                        <td> {{ $login->period }}  </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="row mt-2">
                  <div class="mx-auto text-center">
                    {{ $logins->onEachSide(1)->links() }}
                  </div>
                </div>   
              @else
                  <div class="jumbotron text-center">
                    {{-- <h5 class="mt-4"> No User(s)</h5> --}}
                  </div>
              @endif
            </div>
        </div>
    </div>
@endsection