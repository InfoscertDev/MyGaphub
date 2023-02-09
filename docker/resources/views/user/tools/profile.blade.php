@extends('layouts.user')
@section('content')
    <div class="container-fluid">
        <div class="py-5">
          @include('inc.settings_menu')
          <div class="gap-center">
            <div class="pro-img my-2">
                {{-- public/user/8dedd17780b05f70dd6a2055a87733bf84a9445b685453.jpg  --}}
                @if ($profile->image)
                  <img src="{{asset('/assets/'. str_replace('public', 'storage', $profile->image) ) }}"  class=" profile img img-responsive  rounded-circle" alt="">
                @else
                  <img src="{{asset('/assets/storage/avatar/default.png') }}"  class=" profile img img-responsive  rounded-circle" data-toggle="tooltip" title="Click to Go to Settings">
                @endif
                <label for="">
                  <button class="btn bg-none elevation-3upload fa fa-camera fa-md" type="button" 
                        data-toggle="modal" data-target="#defaultModal">  </button>
                </label>

                <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="def" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content"> 
                        <div class="modal-header">
                            <h5 class="modal-title" id="deptModalLabel">Select from the available Avatars or choose your preferred profile picture</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                          <div class="modal-body">
                            <div class="row mx-0">
                              <div class="col-6"> 
                                <form  id="picture" action="{{ route('picture')}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <input type="file" name="photo" id="upload_profile" onchange="prepareFile(event)" accept="image/jpeg,image/png,image/webp" class="none">
                                  <button class="btn bg-none btn elevation-3 my-2 txt-primary select-file" data-dismiss="modal" onclick="upload()" type="button">
                                      {{-- <i class="fa fa-image" style="font-size: 110px" upoad-photo.png></i> --}}
                                      <img src="{{asset('/assets/storage/avatar/upoad-photo.png') }}" class="profile img img-responsive" alt="">
                                      <p class="text-center"><span class="ff-rob bold sm-fs-12">Select your own photo</span></p>
                                  </button> 
                                  <div class="none" id="btn_upload">
                                    <button class="btn btn-sm btn-pry fa fa-save" type="submit"></button>
                                  </div>
                                </form>
                              </div>
                              <div class="col-6"> 
                                  <form  id="picture" action="{{ route('default.picture')}}" method="post">
                                    @csrf
                                  <button class="bg-none btn elevation-3 my-2" type="submit" name="avatar" value="default_nabjna">
                                    <img src="{{asset('/assets/storage/avatar/default.png') }}"  class="profile img img-responsive" alt="">
                                  </button>
                                </form>
                              </div>
                              <form class="row mx-0" id="picture" action="{{ route('default.picture')}}" method="post">
                                @csrf
                                  <div class="col-6">
                                    <button class="bg-none btn elevation-3 my-2" type="submit" name="avatar" value="avamale1_ienbabdhbs">
                                      <img src="{{asset('/assets/storage/avatar/Avatar_Male 1.png') }}"  class="profile img img-responsive" alt="">
                                    </button>
                                  </div>
                                  <div class="col-6">
                                    <button class="bg-none btn elevation-3 my-2" type="submit" name="avatar" value="avafemale1_ienbabdhbs">
                                      <img src="{{asset('/assets/storage/avatar/Avatar_Female 1.png') }}"  class="profile img img-responsive" alt="">
                                    </button>
                                  </div>
                                
                                  <div class="col-6">
                                    <button class="bg-none btn elevation-3 my-2" type="submit" name="avatar" value="avamale2_ienbabdhbs">
                                      <img src="{{asset('/assets/storage/avatar/Avatar_Male 2.png') }}"  class="profile img img-responsive" alt="">
                                    </button>
                                  </div>
                                  
                                  <div class="col-6">
                                    <button class="bg-none btn elevation-3 my-2" type="submit" name="avatar" value="avafemale5_ienbabdhbs">
                                      <img src="{{asset('/assets/storage/avatar/Avatar_Female 5.png') }}"  class="profile img img-responsive" alt="">
                                    </button>
                                  </div> 
                                  {{-- Avater 3 --}}
                                  <div class="col-6">
                                    <button class="bg-none btn elevation-3 my-2" type="submit" name="avatar" value="avamale3_ienbabdhbs">
                                      <img src="{{asset('/assets/storage/avatar/Avatar_Male 3.png') }}"  class="profile img img-responsive" alt="">
                                    </button>
                                  </div>
                                  <div class="col-6">
                                    <button class="bg-none btn elevation-3 my-2" type="submit" name="avatar" value="avafemale3_ienbabdhbs">
                                      <img src="{{asset('/assets/storage/avatar/Avatar_Female 3.png') }}"  class="profile img img-responsive" alt="">
                                    </button>
                                  </div>
    
                                  <div class="col-6">
                                    <button class="bg-none btn elevation-3 my-2" type="submit" name="avatar" value="avamale4_ienbabdhbs">
                                      <img src="{{asset('/assets/storage/avatar/Avatar_Male 4.png') }}"  class="profile img img-responsive" alt="">
                                    </button>
                                  </div>
                                  <div class="col-6">
                                    <button class="bg-none btn elevation-3 my-2" type="submit" name="avatar" value="avafemale4_ienbabdhbs">
                                      <img src="{{asset('/assets/storage/avatar/Avatar_Female 4.png') }}"  class="profile img img-responsive" alt="">
                                    </button>
                                  </div>
                                  <div class="col-6">
                                    <button class="bg-none btn elevation-3 my-2" type="submit" name="avatar" value="avamale5_ienbabdhbs">
                                      <img src="{{asset('/assets/storage/avatar/Avatar_Male 5.png') }}"  class="profile img img-responsive" alt="">
                                    </button>
                                  </div>
                                  
                                  <div class="col-6">
                                    <button class="bg-none btn elevation-3 my-2" type="submit" name="avatar" value="avafemale2_ienbabdhbs">
                                      <img src="{{asset('/assets/storage/avatar/Avatar_Female 2.png') }}"  class="profile img img-responsive" alt="">
                                    </button>
                                  </div>
                                  
                              </form>
                            </div> 
                          </div>
                      </div> 
                </div> 
              </div>
              <div class="gap-card">
                <ul class="pro-lists mt-3">
                  <div class="gap-header d-flex text-left" style="">
                    <h5 class="gt"> <span>Personal Information</span> 
                      <span class="line-step mt-2" style="width: 27%"></span>
                    </h5>
                    <span class="pull-right">
                      <button class="btn btn-pry fa fa-edit btn-sm" onclick="toggleProfile()"></button>
                    </span>
                  </div> 
                  <span id="profile">
                    <li>
                      <span class="label">Name</span>
                      <span class="detail text-left">{{ $user->firstname }}</span>
                    </li>
                    <li> 
                      <span class="label">Surname</span>
                      <span class="detail text-left">{{ $user->surname }}</span> 
                    </li>
                    <li> 
                      <span class="label">Email Address</span>
                      <span class="detail text-left">{{ $user->email }}</span> 
                    </li>
                    <li> 
                      <span class="label">Phone Number</span>
                      <span class="detail text-left">{{ $profile->phone }}</span> 
                    </li>
                    <li> 
                      <span class="label">Date of Birth</span>
                      <span class="detail text-left"> {{ ($profile->date_of_birth) ? date("F j, Y", strtotime($profile->date_of_birth)) : '' }}</span> 
                    </li>
                    <li>  
                      <span class="label">Country of Ancestry</span>
                      <span class="detail text-left text-capitalise">{{ $profile->ancesry }}</span> 
                    </li>
                    <li> 
                      <span class="label">Country of Residence</span>
                      <span class="detail text-left text-capitalise">{{ $profile->country }}</span> 
                    </li>
                    <li> 
                      <span class="label">Residential Address</span>
                      <span class="detail text-left">{{ $profile->address }}</span> 
                    </li>
                  </span>
                  <span class="none" id="editprofile">
                    @include('user.tools.edit-profile')
                  </span>
                </ul>
                 <ul class="pro-lists mt-2">
                  <div class="gap-header  text-left">
                    <h5>Registration</h5>
                    <span class="line-step" style="width: 15%"></span>
                  </div> 
                  <li> 
                    <span class="label">Date</span>
                    <span class="detail text-left">{{ date("F j, Y", strtotime($user->created_at)) }}</span>
                  </li> 
                  <li> 
                    <span class="label">Type</span>
                    <span class="detail text-left">{{ $profile->type }}</span> 
                  </li>
                 </ul>
              </div> 
          </div>
        </div>
    </div>
    
  <script>
    var edit = true;
    var photo = null;
    function upload(){
      return document.getElementById('upload_profile').click();
    }

    function prepareFile(e){
      let file = e.target.file;
      this.photo = true;
      var btn_upload = document.getElementById('btn_upload');
      // $("#btn_upload").fadeIn(400);
      document.getElementById('picture').submit();
    } 

    function toggleProfile(){
      if(this.edit){
        $('#profile').hide()
        $('#editprofile').removeClass('none');
        $('#editprofile').fadeIn(600);
        this.edit = !this.edit;
      }else{
        $('#editprofile').hide()
        $('#profile').removeClass('none');
        $('#profile').fadeIn(600);
        this.edit = !this.edit;
      }
    }
  </script>
@endsection 