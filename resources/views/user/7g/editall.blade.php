@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <div class="gap-card">
        <div class="gap-card-header">
            @if ($isValid)
                <div class="gap-card-title txt-primary bold">Key Performance Indicator Details</div>
            @else
                <div class="gap-card-title txt-primary">
                    <i class="fa fa-edit mr-1"></i> Edit All
                </div>
            @endif
        </div>
 
        <div id="accordion">
            <div class="card">
                <div class="accord-header" id="headingOne">
                    <div class="wd-f mb-0">
                        <span class="gap-card-title accord-title">Grand</span>
                        <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="fa fa-chevron-down"></i>
                        </button> 
                    </div>
                </div>
            
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body pb-1">
                            @include('user.7g.grand')
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="accord-header" id="headingTwo">
                    <div class="wd-f mb-0">
                        <span class="gap-card-title accord-title">Freedom</span>
                        <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fa fa-chevron-down"></i>
                        </button> 
                    </div>
                </div>
            
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body pb-1">
                        @include('user.7g.freedom')
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="accord-header" id="headingThree">
                    <div class="wd-f mb-0">
                        <span class="gap-card-title accord-title">Education</span>
                        <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        <i class="fa fa-chevron-down"></i>
                        </button> 
                    </div>
                </div>
            
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body pb-1">
                            @include('user.7g.education')
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="accord-header" id="headingFour">
                    <div class="wd-f mb-0">
                        <span class="gap-card-title accord-title">Debt</span>
                        <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                            <i class="fa fa-chevron-down"></i>
                        </button> 
                    </div>
                </div>
            
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                    <div class="card-body pb-1">
                        @include('user.7g.dept')
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="accord-header" id="headingFive">
                    <div class="wd-f mb-0">
                        <span class="gap-card-title accord-title">Credit</span>
                        <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                        <i class="fa fa-chevron-down"></i>
                        </button> 
                    </div>
                </div>
            
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                    <div class="card-body pb-1">
                        @include('user.7g.credit')
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="accord-header" id="headingSix">
                    <div class="wd-f mb-0">
                        <span class="gap-card-title accord-title">Beta</span>
                        <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                            <i class="fa fa-chevron-down"></i>
                        </button> 
                    </div>
                </div>
            
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                    <div class="card-body pb-1">
                        @include('user.7g.beta')
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="accord-header last" id="headingSeven">
                <div class="wd-f mb-0">
                    <span class="gap-card-title accord-title">Alpha</span>
                    <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                        <i class="fa fa-chevron-down"></i>
                    </button> 
                </div>
                </div>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
                    <div class="card-body pb-1">
                        @include('user.7g.alpha')
                    </div>
                </div>
            </div>
        </div> 

        <div class="gap-center mb-4">
            <div class="text-right mt-5"> 
                
                @if ($isValid)
                    <button id="toggleAccordions" class="btn btn-pry px-3 mr-2 mb-2" type="button">View All</button>
                @else
                    <a type="button" id="toggleAccordions" class="trans txt-primary px-3 mr-2 mb-2"> Edit All </a>
                    <button type="button" class="btn btn-pry px-3 mr-2 mb-2" id="updateAll"> Update All </button>
                @endif
                <button type="button" class="btn btn-pry px-3 mr-2 mb-2"> <a href="{{ route('7g') }}" class="card-link text-white"> View Chart</a> </button>
            </div>
        </div>
    </div> 
    
    <div class="modal fade" id="confirmKpi" tabindex="-1" role="dialog" aria-labelledby="confirmKpi" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Confirm 7G KPI</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5 class="text-center">Please Confirm your <span class="bold">7G KPI</span> values. </h5>
              <!-- <h5 class="text-center">Please Confirm</h5> -->
            </div>
            <div class="modal-footer mx-auto">
                <div class="text-left">
                    <button type="button" id="confirmSubmit" class="btn btn-pry px-3 mr-3">Yes</button>
                </div>
                <div class="text-right">
                    <button type="button" data-dismiss="modal" class="btn btn-default px-3 mr-3">No</button>
                </div>
            </div>
          </div>
        </div>
    </div>
<script>

$(function() {
    console.log("<?php echo route('save.seveng') ?>"); 
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
    });
    $('#updateAll').on('click', function(e){  
        var forms = document.querySelectorAll('.seveng');
        var current = [],  target = [];
        $(forms).each(function(){
            var fd = new FormData($(this)[0]);
            if(fd.get('current')) current.push(parseInt(fd.get('current')))
            if(fd.get('target')) target.push(parseInt(fd.get('target')))
            if(fd.get('baseline')) target.push(parseInt(fd.get('baseline')))
        });
        var total_current  = current.reduce((a, b) => a + b, 0), 
            total_target = target.reduce((a, b) => a + b, 0);
        // total_current > 0 && total_target > 0 && --------> 7G KPI
        if(false){
            $(forms).each(function(){
                var fd = new FormData($(this)[0]);
                $.ajax({
                    type: 'POST',
                    // url:  {{ route('save.seveng') }},http://infoscert.net/releasea/gap/
                    url:  "<?php echo route('save.seveng') ?>",
                    // url:  'http://infoscert.net/mygaphub/releaseb/home/7g/store',
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
                // window.location.href = 'http://infoscert.net/mygaphub/releaseb/home/7g';
                window.location.href =  "<?php echo route('7g') ?>";
            }, 4000);
        }else{
            $('#confirmKpi').modal('show'); 
        }
    
    });
    $('#confirmSubmit').on('click', function(e){  
        var forms = document.querySelectorAll('.seveng');
        $(forms).each(function(){
                var fd = new FormData($(this)[0]);
                $.ajax({
                    type: 'POST',
                    // url:  {{ route('save.seveng') }},http://infoscert.net/releasea/gap/
                    url:  "<?php echo route('save.seveng') ?>",
                    // url:  'http://infoscert.net/mygaphub/releaseb/home/7g/store',
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
                // window.location.href = 'http://infoscert.net/mygaphub/releaseb/home/7g';
                window.location.href =  "<?php echo route('7g') ?>";
            }, 4000);
    });
});
function submitAll(){}
</script>
@endsection
 