
@if(isset($asset))
    <form action="{{ route('acqusition.invest_reap', $asset->id) }}" method="POST" role="form" class="contact" id="reserveForm">
        @csrf
        @if(!auth()->user())
            <div class="form-group"> 
                <input type="text" class="form-control reserve-form" id="your_name" name="name" autocomplete="off" placeholder="Name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control reserve-form" id="email" name="email" autocomplete="off" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="number" class="form-control reserve-form" id="mobile" name="mobile" autocomplete="off" placeholder="Mobile Number" required>
            </div>
        @endif 
        @if(auth()->user())
            @if(!auth()->user()->profile->phone)
                <div class="form-group">
                    <input type="number" class="form-control reserve-form" id="mobile" name="mobile" placeholder="Mobile Number" required>
                </div>
            @endif
        @endif
        <div class="form-group">
            <input type="text" class="form-control reserve-form" id="subject" name="subject" placeholder="Subject" required>
        </div>
        <div class="form-group">
            <textarea class="form-control reserve-form" type="textarea" id="message" name="message" placeholder="Message" maxlength="254" rows="4"></textarea>
            <!-- <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                     -->
        </div>
        <div class="d-flex justify-content-center my-2">
            <button type="submit" id="reserveAssetBtn"  class=" btn btn-pry px-3 pull-right">Send Enquiry</button>
        </div>
            
        <script>
            $(function(){  
                $('.reserveAssetBtn').on('click', function(e){
                    e.preventDefault();
                    var isValid = true;
                    $('.reserve-form').each(function() {
                        if ( $(this).val() === '' ){
                            isValid = false;
                        }
                    });
                    if(isValid){  
                        $('#submitAssetReservation').modal('toggle');
                    }else{
                        swal("", "All fields are mandatory", "error");
                    }
                });
            });
        </script>
    </form>
@endif