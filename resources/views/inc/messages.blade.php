
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <p class="alert alert-danger ">
            {{$error}}
        </p>
    @endforeach
@endif

@if(session('success'))
    <p id="msg"  class="alert alert-success">
        {{session('success')}}
    </p>
@endif

@if(session('error'))
    <p id="msg" class="alert alert-danger">
        {{session('error')}}
    </p>
@endif
<script>
    var errors = document.querySelectorAll('.alert');
    if(errors.length){
        setTimeout(() => {
            $('#msg').hide();
            errors.forEach(error => {
                error.classList.add("d-none"); 
            });
        }, 5 * 1000)
    }
 </script>
