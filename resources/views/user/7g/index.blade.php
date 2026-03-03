@extends('layouts.user')

@include('user.7g.bespoke')

@section('header')
<script>
     /* SimplePageLoader */
    
    // Interpreter first checks loading state
    var isLoading = true,
        overlay = document.createElement("div");
     
    // A little bit of styling
    overlay.id = "before-content-overlay";
    overlay.style.background = "#ffffff";
    overlay.style.display = "block";
    overlay.style.position = "absolute";
    overlay.style.top = "0";
    overlay.style.bottom = "0";
    overlay.style.right = "0";
    overlay.style.left = "0";
    
    // SVG Spinner 
    overlay.innerHTML = "<svg class=\"lds-spinner\" width=\"64px height=\"64pxxmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" viewBox=\"0 0 100 100\" preserveAspectRatio=\"xMidYMid\" style=\"background: none;\"><g transform=\"rotate(0 50 50)\"><rect x=\"47\" y=\"24\" rx=\"9.4\" ry=\"4.8\" width=\"6\" height=\"12\" fill=\"#000000\"><animate attributeName=\"opacity\" values=\"1;0\" times=\"0;1\" dur=\"1s\" begin=\"-0.9166666666666666s\" repeatCount=\"indefinite\"></animate></rect></g><g transform=\"rotate(30 50 50)\"><rect x=\"47\" y=\"24\" rx=\"9.4\" ry=\"4.8\" width=\"6\" height=\"12\" fill=\"#000000\"><animate attributeName=\"opacity\" values=\"1;0\" times=\"0;1\" dur=\"1s\" begin=\"-0.8333333333333334s\" repeatCount=\"indefinite\"></animate></rect></g><g transform=\"rotate(60 50 50)\"><rect x=\"47\" y=\"24\" rx=\"9.4\" ry=\"4.8\" width=\"6\" height=\"12\" fill=\"#000000\"><animate attributeName=\"opacity\" values=\"1;0\" times=\"0;1\" dur=\"1s\" begin=\"-0.75s\" repeatCount=\"indefinite\"></animate></rect></g><g transform=\"rotate(90 50 50)\"><rect x=\"47\" y=\"24\" rx=\"9.4\" ry=\"4.8\" width=\"6\" height=\"12\" fill=\"#000000\"><animate attributeName=\"opacity\" values=\"1;0\" times=\"0;1\" dur=\"1s\" begin=\"-0.6666666666666666s\" repeatCount=\"indefinite\"></animate></rect></g><g transform=\"rotate(120 50 50)\"><rect x=\"47\" y=\"24\" rx=\"9.4\" ry=\"4.8\" width=\"6\" height=\"12\" fill=\"#000000\"><animate attributeName=\"opacity\" values=\"1;0\" times=\"0;1\" dur=\"1s\" begin=\"-0.5833333333333334s\" repeatCount=\"indefinite\"></animate></rect></g><g transform=\"rotate(150 50 50)\"><rect x=\"47\" y=\"24\" rx=\"9.4\" ry=\"4.8\" width=\"6\" height=\"12\" fill=\"#000000\"><animate attributeName=\"opacity\" values=\"1;0\" times=\"0;1\" dur=\"1s\" begin=\"-0.5s\" repeatCount=\"indefinite\"></animate></rect></g><g transform=\"rotate(180 50 50)\"><rect x=\"47\" y=\"24\" rx=\"9.4\" ry=\"4.8\" width=\"6\" height=\"12\" fill=\"#000000\"><animate attributeName=\"opacity\" values=\"1;0\" times=\"0;1\" dur=\"1s\" begin=\"-0.4166666666666667s\" repeatCount=\"indefinite\"></animate></rect></g><g transform=\"rotate(210 50 50)\"><rect x=\"47\" y=\"24\" rx=\"9.4\" ry=\"4.8\" width=\"6\" height=\"12\" fill=\"#000000\"><animate attributeName=\"opacity\" values=\"1;0\" times=\"0;1\" dur=\"1s\" begin=\"-0.3333333333333333s\" repeatCount=\"indefinite\"></animate></rect></g><g transform=\"rotate(240 50 50)\"><rect x=\"47\" y=\"24\" rx=\"9.4\" ry=\"4.8\" width=\"6\" height=\"12\" fill=\"#000000\"><animate attributeName=\"opacity\" values=\"1;0\" times=\"0;1\" dur=\"1s\" begin=\"-0.25s\" repeatCount=\"indefinite\"></animate></rect></g><g transform=\"rotate(270 50 50)\"><rect x=\"47\" y=\"24\" rx=\"9.4\" ry=\"4.8\" width=\"6\" height=\"12\" fill=\"#000000\"><animate attributeName=\"opacity\" values=\"1;0\" times=\"0;1\" dur=\"1s\" begin=\"-0.16666666666666666s\" repeatCount=\"indefinite\"></animate></rect></g><g transform=\"rotate(300 50 50)\"><rect x=\"47\" y=\"24\" rx=\"9.4\" ry=\"4.8\" width=\"6\" height=\"12\" fill=\"#000000\"><animate attributeName=\"opacity\" values=\"1;0\" times=\"0;1\" dur=\"1s\" begin=\"-0.08333333333333333s\" repeatCount=\"indefinite\"></animate></rect></g><g transform=\"rotate(330 50 50)\"><rect x=\"47\" y=\"24\" rx=\"9.4\" ry=\"4.8\" width=\"6\" height=\"12\" fill=\"#000000\"><animate attributeName=\"opacity\" values=\"1;0\" times=\"0;1\" dur=\"1s\" begin=\"0s\" repeatCount=\"indefinite\"></animate></rect></g></svg>";
    
    var spinner = overlay.childNodes[0];
    
    spinner.style.width = "64px";
    spinner.style.height = "64px";
    spinner.style.position = "absolute";
    spinner.style.left = spinner.style.top = "calc(50% - 32px)";
   
    // Once loaded
    window.onload = function() {
    	// isLoading = false;
    	// Uncomment to test and comment/remove above statement
      setTimeout(function() { isLoading = false }, 800);
    };
    
    setInterval(function() {
      if (isLoading && !document.body.contains(overlay)) {
        document.body.appendChild(overlay);
      } else if (!isLoading && document.body.contains(overlay)) {
        // If loaded, overlay should disappear
        overlay.parentNode.removeChild(overlay);
      }
    }, 100);

    $(document).on('click', '#ueberTab a', function(e) {
        otherTabs = $(this).attr('data-secondary').split(',');
        for(i= 0; i<otherTabs.length;i++) {
            nav = $('<ul class="nav d-none" id="tmpNav"></ul>');
            nav.append('<li class="nav-item"><a href="#" data-toggle="tab" data-target="' + otherTabs[i] + '">nav</a></li>"');
            nav.find('a').tab('show');
        }
    });  
    
    $(function () { 
        var link = window.location.href;
        if(link.match('bespoke')){
            var bespoke =  $('#ueberTab a[data-target="#bespoke"]');
            bespoke.tab('show'); 
            otherTabs = bespoke.attr('data-secondary').split(',');
            for(i= 0; i < otherTabs.length;i++) {
                nav = $('<ul class="nav d-none" id="tmpNav"></ul>');
                nav.append('<li class="nav-item"><a href="#" data-toggle="tab" data-target="' + otherTabs[i] + '">nav</a></li>"');
                nav.find('a').tab('show');
            }
        }
    });
</script>   
@endsection

@section('content')
 
    <div class="bg-white py-4" id=""> 
        <div class="container">
            <div class="card">
                <div class="gap-center">
                    @if (!$isValid)
                        <p class="">Your multiple-choice answers have provided an assumption.</p>
                        <p>Click or tap any of the following bars to validate these assumptions</p>
                    
                    @endif
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="seveng" role="tabpanel">
                        @if ($isValid)
                            <div class="mt-3 ml-5">
                                @php
                                    $average_svg = ( $steps[0] + $steps[1] + $steps[2] + $steps[3] + $steps[4] + $steps[5] + $steps[6]) /7
                                @endphp
                                <h5 class="text-muted">Average Performance:</h5>
                                <h5 class="bold">{{ number_format($average_svg) }}%</h5>
                            </div>
                        @endif
                        <div class="chart-legend"> 
                            <canvas id="sevenGChart" style="width: 700px;height: 280px;" ></canvas>
                        
                            <div class="row mr-0 ml-65">
                                <span class="col-3 legend-b" style="background: red;"></span>
                                <span class="col-3 legend-b" style="background: #ffc200;"></span>
                                <span class="col-3 legend-b" style="background: #00ff00;"></span>
                                <span class="col-3 legend-b" style="background: #65B8E8;"></span>
                            </div>
                        </div>
                      
                    </div>
                    @if ($isValid)
                        <div class="tab-pane fade " id="bespoke" role="tabpanel">
                            @if (!$total_bespoke)
                                <div class="new-bespoke">
                                    <button class="btn mt-3 btn-pry" data-toggle="modal" data-target="#choiceBespokeModal"> Create Your First Bespoke KPI</button>
                                </div>
                            @endif 
                            @if ($isValid)
                                @if ($total_bespoke)
                                    <div class="mt-3 ml-5">
                                        @php
                                            $average_bespoke = ( $bespoke_values[0] + $bespoke_values[1] + $bespoke_values[2] + $bespoke_values[3] 
                                            + $bespoke_values[4] + $bespoke_values[5] + $bespoke_values[6]) / $total_bespoke
                                        @endphp
                                        <h5 class="text-muted">Average Performance:  </h5>
                                        <h5 class="bold">{{ number_format($average_bespoke) }}%</h5>
                                    </div>
                                @endif
                            @endif
                            <div class="chart-legend"> 
                                <canvas id="bespokeChart" style="width: 700px;height: 280px;" ></canvas>
                                <div class="row mr-0 ml-65">
                                    <span class="col-3 legend-b" style="background: red;"></span>
                                    <span class="col-3 legend-b" style="background: #ffc200;"></span>
                                    <span class="col-3 legend-b" style="background: #00ff00;"></span>
                                    <span class="col-3 legend-b" style="background: #65B8E8;"></span>
                                </div>
                            </div>
                        </div>
                        @include('user.7g.bespoke-modals')
                    @endif
                </div>
            </div>  
            <div class="text-center mt-5"> 
                @if (!$isValid)
                    <p>Click any of the KPI names (Alpha, Beta, Credit e.t.c.) to learn more </p>
                    <p class="text-center"> 
                        <span class="mr-4">
                            <span class="legend-g" style="background: red;"></span>
                            <span class="legend-g" style="background: #ffc200"></span>
                            <span class="legend-g" style="background: #00ff00"></span>
                            <span class="legend-g" style="background: #65B8E8"></span>
                            Validated KPI's
                        </span> 
                        <span class="mr-2"> 
                            <span class="legend-g" style="background: #494949"></span>
                            Unvalidated KPI's
                        </span>  
                    </p>
                    <button class="btn mt-3 btn-outline-danger ">
                        <a href="{{route('7g.editall')}}" class="hov-white card-link txt-primary"><i class="fa fa-edit"></i> Edit All</a>
                    </button> 
                @else 
                    <ul id="ueberTab" class="nav nav-tabs full-tab analytics-tab br-none">
                        <li class="nav-item">
                            <a class="nav-link active show" data-toggle="tab"  role="tab"  data-target="#seveng" data-secondary="#seveng_bot,#seveng_cont" href="#seveng">7G KPI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" role="tab" data-target="#bespoke" data-secondary="#bespoke_bot" href="#bespoke">Bespoke KPI</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active"  id="seveng_bot">
                            <p class="svg_text">Click any of the KPI names (Alpha, Beta, Credit e.t.c.) to learn more </p>
                            <button class="btn mt-3 btn-pry ">
                                <a href="{{route('7g.editall')}}" class="card-link text-white"><i class="fa fa-eye"></i> View All</a>
                            </button> 
                        </div>         
                        <div class="tab-pane fade"  id="bespoke_bot"> 
                            @if ($total_bespoke && $total_bespoke < 7)
                                <button class="btn mt-3 btn-pry" data-toggle="modal" data-target="#choiceBespokeModal"> Add New KPI</button>
                            @elseif ($total_bespoke && $total_bespoke == 7)
                                <button class="btn mt-3 btn-pry" >
                                    <a href="{{route('bespoke.editall')}}" class="card-link text-white"><i class="fa fa-eye"></i> View All</a>
                                </button>
                            @endif 
                        </div>       
                    </div>
                @endif 
            </div> 

            @include('user.7g.modals') 
            
        </div>
    </div> 
    @include('user.7g.bespoke.explain-modal')
@endsection
 
 