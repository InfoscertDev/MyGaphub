
<form action="{{ route('edit.profile') }}" method="POST">
    @csrf
    <span class="form-reg">
        <li class="reg-list">
            <span class="label">Name</span>
            <input type="text" name="firstname" id="" value="{{$user->firstname}}" class="form-control">
        </li>
        <li class="reg-list"> 
            <span class="label">Surname</span>
            <input type="text" name="surname" id="" value="{{$user->surname}}" class="form-control">
        </li>
        <li class="reg-list"> 
            <span class="label">Phone Number</span>
            <input type="phone" name="phone" id="" value="{{$profile->phone}}" class="form-control">
        </li>
        @if($profile->dob_count <= 1)
            <li class="reg-list"> 
                <span class="label">Date of Birth</span>
                <input type="date" name="date" id="" value="{{$profile->date_of_birth}}" class="form-control">
            </li>
        @endif
        <li class="reg-list"> 
            <span class="label">Country of Ancestry</span>
            <span class="detail bg-none py-2">
                <select name="ancesry" class="form-control gt" id="">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country) 
                        @if ($profile->ancesry == $country)
                            <option value="{{ $country }}" selected>{{ $country }}</option>
                        @else
                            <option value="{{ $country }}">{{ $country }}</option>
                        @endif
                    @endforeach     
                </select>    
            </span> 
        </li>
        <li class="reg-list"> 
            <span class="label">Country of Residence</span>
            <span class="detail bg-none py-2">
                <select name="residence"  class="form-control gt" id="">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country) 
                        @if ($profile->country == $country)
                            <option value="{{ $country }}" selected>{{ $country }}</option>
                        @else
                            <option value="{{ $country }}">{{ $country }}</option>
                        @endif
                    @endforeach    
                </select>    
            </span> 
        </li>
        <li class="reg-list  "> 
            <span class="label  mt-2">Residential Address</span>
            <textarea name="address" class="mt-2 form-control" cols="30" rows="2">{{ $profile->address }}</textarea>
        </li>
        <div class="mt-3  mb-0"> 
            <div class=" text-center mt-1">
                <button type="submit" class="btn px-4 btn-pry "> Save </button>
            </div>
        </div>
    </span>
</form>