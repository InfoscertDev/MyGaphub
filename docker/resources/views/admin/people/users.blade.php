@extends('layouts.admin')

@section('content')
    <div class="wd-f my-5">
        <div class="card">
            <div class="card-header">
                <h4>Users</h4>
            </div> 
            <div class="card-body">
              @if (count($users)) 
                <table class="table table-striped">
                  <thead class="thead-light">
                    <tr>
                      <th></th>
                      <th scope="col">Firstname</th>
                      <th scope="col">Surname</th>
                      <th scope="col">Email</th>
                      <th scope="col">Group</th> 
                      <th scope="col">Status</th>
                      <th scope="col">Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users  as $user)
                      @php
                          $profile = $user->profile;
                      @endphp
                      <tr>  
                        <th> 
                          {{-- <img src="{{asset('/assets/images/profile.png') }}" width="50"  class="profile img img-responsive  rounded-circle" alt=""> --}}
                          @if (isset($profile->image))
                            <img src="{{asset('/assets/'. str_replace('public', 'storage', $profile->image) ) }}" style=" width: 60px; height: 60px;" class=" profile img img-responsive  rounded-circle" alt="">
                          @else
                            <img src="{{asset('/assets/storage/avatar/default.png') }}" style=" width: 60px; height: 60px;"  class=" profile img img-responsive  rounded-circle">
                          @endif
                        </th>
                        <th scope="row">{{ $user->firstname }}</th>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->email }}</td> 
                        <td>{{ ($user->email_verified_at) ? 'Verified': 'Unverified' }}</td>
                        <td></td>
                        <td>
                          {{-- <button class="btn btn-sm btn-outline-primary">View</button> --}}
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="row mt-2">
                  <div class="mx-auto text-center">
                    {{ $users->onEachSide(1)->links() }}
                  </div>
                </div>   
              @else
                  <div class="jumbotron text-center">
                    <h5 class="mt-4"> No User(s)</h5>
                  </div>
              @endif
            </div>
        </div>
    </div>
@endsection