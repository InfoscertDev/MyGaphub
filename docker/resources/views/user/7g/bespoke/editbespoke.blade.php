@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="gap-card">
        <div class="gap-card-header">  Bespoke KPI </div>
 
        <div id="accordion">
            @include('user.7g.bespoke.bespoke_list')
        </div> 

        <div class="gap-center mb-4">
            <div class="text-right mt-5"> 
                
                <button id="toggleAccordions" class="btn btn-pry px-3 mr-2 mb-2" type="button">View All</button>
               
                <button type="button" class="btn btn-pry px-3 mr-2 mb-2"> <a href="{{ route('7g', ['bespoke'=> 'kpi']) }}" class="card-link text-white"> View Chart</a> </button>
            </div>
        </div>
    </div> 
<script>

$(function() {
    $('#toggleAccordions').on('click', function(e) {
        if($('#accordion .collapse').attr("data-parent")){
            $('#accordion .collapse').removeAttr("data-parent");
            $('#accordion .collapse').collapse('show');
            $('#toggleAccordions').text("Close All");
        }else{
            $('#accordion .collapse').attr("data-parent","#accordion");
            $('#accordion .collapse').collapse('hide');
            $('#toggleAccordions').text('View All');
        }
    })
    $('#updateAll').on('click', function(e){
        var forms = document.querySelectorAll('.seveng');
        $(forms).each(function(){
            // console.log("Loading")
            var fd = new FormData($(this)[0]);
            $.ajax({
                type: 'POST',
                // url:  {{ route('save.seveng') }},http://infoscert.net/releasea/gap/
                // url:  'http://localhost:2000/home/7g/store',
                url:  'http://infoscert.net/mygaphub/releaseb/home/7g/store',
                data: fd,
                processData: false,
                contentType: false,
                success: function(data, status){
                    // console.log("Done", status)
                },
                error: function(data, status){
                    // console.log("Error", status)
                }
            });
        });
        setTimeout(()=> {
            // window.location.href = window.location.host +'/home/7g';
            window.location.href = 'http://infoscert.net/mygaphub/releaseb/home/7g';
        }, 4000);
        // for (let i = 0; i < forms.length; i++) {
            // var formData = new FormData();
            // for (let i = 0; i < element.length; i++) {
            //     formData.append(element[i].name, element[i].value);
            // }

            // var xmlHttp = new XMLHttpRequest();
            // xmlHttp.onreadystatechange =  function(){
            //     if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
            //         console.log("Done", i )
            //     }
            // }
            // // {{ route('save.seveng') }}
            // xmlHttp.open("post", 'http://localhost:2000/home/7g/store' );
            // xmlHttp.send(formData);
        // }
    })
});

</script>
@endsection
 