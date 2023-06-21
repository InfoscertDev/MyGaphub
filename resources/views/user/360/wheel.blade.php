@section('header')
<style>
   #wheel {
    overflow: hidden;
    min-width: 480px;
    transform: scale(0.65);
    top: -100px;
    position: relative;
    left: -32px;
    width: 120%;
  }
  .circle, .circle:before, .circle:after { border-radius: 50%; }
  .menunav {
    position: absolute;
    display: block;
    margin: 0px auto;
    min-width: 10em;
    width: 480px;
    max-width: 30em;
    border-radius: 50%;
  }
  .menunav ul {
    position: relative;
    padding: 50%;
    max-width: 0;
    max-height: 0;
    list-style: none;
    /* border: 5px solid #222; */
  }
  .menunav li {
    position: absolute;
  }
  .slice {
    /* overflow: hidden; */
    /* position: absolute; */
    top: 53px;
    left: 13px;
    width: 45%;
    height: 48%;
    transform-origin: 104% 138%;
  }
  /* Cell orientation */
  /* .wheel12 { transform: rotate(13deg) skewX(30deg); } */
  .wheel1 {transform: rotate(60deg) skewX(30deg);}
  .wheel2 {transform: rotate(90deg) skewX(30deg);}
  .wheel3 {transform: rotate(120deg) skewX(30deg);}
  .wheel4 {transform: rotate(150deg) skewX(30deg);}
  .wheel5 {transform: rotate(180deg) skewX(30deg);}
  .wheel6 {transform: rotate(210deg) skewX(30deg);}
  .wheel7 {transform: rotate(240deg) skewX(30deg);}
  .wheel8 {transform: rotate(270deg) skewX(30deg);}
  .wheel9 {transform: rotate(300deg) skewX(30deg);}
  .wheel10 {transform: rotate(330deg) skewX(30deg);}
  .wheel11 {transform: rotate(360deg) skewX(30deg);}
  .wheel12 {transform: rotate(30deg) skewX(30deg);}
  .menunav label .over, .menunav label.lane {
    /* cursor: pointer;  */
  }
  .menunav label div{
    position: relative;
    /* height: 100px; */
    cursor: pointer;
    top: 20px;
  }
  .slice label {
    display: block;
    width: 210%;
    height: 260%;
    transform: skew(-30deg) rotate(-30deg);
    line-height: 3;
    /* text-align: center; */
  }
  .slice label span {
    display: block;
  }
  .slice label:hover {
    color: white;
    transition: all 0.5s ease;
  }
  .circle .menuname:hover {
    color: white;
    transition: color 0.5s ease;
  }
  .menudesc {
    width: 280px;
  }
  .slice p{
    width: 100px;
    margin-left: 185px;
  }
  .unsel {
    z-index: 2;
    top: 61%;
    left: 35%;
    width: 32%;
    height: 35%;
    text-align: center;
    /* background-color: wheat; */
  }
  .unsel label{
    display: block;
    /* width: 100%; */
    /* height: 100%; */
    /* line-height: 9; */
  }
  .menunav{
    position: relative !important;
    /* left: 50%; */
  }
  .
  .circle label  img{
    width: 65px;
    height: 78px;
    left: 216px;
    top: 33px;
  }
  .slice .line {
    width: 6px;
    height: 30px;
    display: inline-block;
    background-color: black;
    position: relative;
    top: -34px;
    right: -25px;
    transform: rotate(150deg);
}
  .circle_360{
    border: 5px solid #222;
    width: 680px;
    height: 680px;
    border-radius: 50%;
    /* left: -29px; */
    /* position: relative; */
  }
  .main-circle{
    /* border: 5px solid #222;  */
  }
  .main-circle div{
    position: relative;
    top: -32px;
  }
  #tab_1 img {transform: rotate(-30deg);}
  #tab_2 img {transform: rotate(-60deg);}
  #tab_3 img {transform: rotate(-90deg);}
  #tab_4 img {transform: rotate(-120deg);}
  #tab_5 img {transform: rotate(-150deg);}
  #tab_6 img {transform: rotate(-180deg);}
  #tab_7 img {transform: rotate(150deg);}
  #tab_8 img {transform: rotate(120deg);}
  #tab_9 img {transform: rotate(90deg);}
  #tab_10 img {transform: rotate(60deg);}
  #tab_11 img {transform: rotate(30deg);}
  #tab_12 img {transform: rotate(0deg);}
  .tab-content>.tab-pane.show{
    display: block !important;
  }
  .wheel-title{
    margin: 0% auto;     left: -75px; position: relative;
  }
  .lenty{
    margin-top: -90px;
  }
  .md-ml-n2{
    margin-left: -50px;
  }
  @media screen and (max-width: 1024px) and (min-width: 801px){

  }
  @media (max-width: 768px) {
    .sm-order-2{
      order: 2;
    }
    .visible{
      margin: 50px 0 0 30px;
    }
    .pt-5{
      padding-top: 10px !important;
    }
    .sm-mx-auto{
      width: 100%;
      margin: 0 auto;
    }
    .tab-content{
      left: 100px;
      position: relative;
    }
    .wheel-title{
      left: 0px !important;
    }
    #wheel{
      transform: scale(0.52) !important;
      left: -145px;
      width: 175%;
      position: relative;
    }
    .lenty{
      margin-top: -85px;
    }
  }
</style>
@endsection

@if (!$isValid)
    <div class="modal show" id="validSevengMode" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content modal-content-centre b-rad-20">
                <div class="modal-body">
                    <div class="py-5">
                        <h5 class="py-1 text-center">Kindly validate all your 7G assumption in order to view your 360<sup>o</sup> .</h5>
                        <h5 class="py-1 text-center"><a href="{{ route('7g')}}" class="text-dark text-underline card-link"> Navigate to Analytics page now </a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {  $('#validSevengMode').modal('show'); })
    </script>
@endif

<div id="wheel">
  <div style="left: 0px; position: relative;">
    <div class="circle_360">
      <div class="menunav pt-4 pb-3 main-circle">
        <div class="">
          <ul class='circle nav'  id="wheelTab" role="tablist">
            <li class='wheel1 slice'>
              <!-- <a href="#home"></a>
                style="height: 21px;right: 240px;"-->
                <label for='' class='circle lanex' id="tab_1" style="z-index: 10;">
                  <div class="lan" >
                    <span class="line"  style="top: -25px;"></span>
                    <a target="" href="{{ route('360.net') }}">
                        <img src="https://www.mygaphub.com/360/img/Networth.jpg" alt="" style="" class="img overton {{ Request::is('home/360/net') ? 'current_wheel' : '' }} "  id="lab_1">
                    </a>
                  </div>
                </label>
            </li>
            <li class='wheel2 slice' >
              <label for='' class='circle lanex' id="tab_2">
                <div class="lan"  id="">
                  <span class="line"></span>
                  <a target="" href="{{ route('360.liability') }}">
                    <img src="https://www.mygaphub.com/360/img/Liabilities.jpg" alt="" class="img overton {{ Request::is('home/360/liability') ? 'current_wheel' : '' }} " id="lab_2">
                  </a>
                </div>
              </label>
            </li>
            <li class='wheel3 slice' >
              <!-- <a href="#expenditure"> </a> -->
              <label for='oorange' class='circle ' id="tab_3">
                <div class="lan"  id="">
                  <span class="line"></span>
                  <a target="" href="{{ route('360.expenditure') }}">
                    <img src="https://www.mygaphub.com/360/img/Expend.jpg" alt="" class="img overton {{ Request::is('home/360/expenditure') ? 'current_wheel' : '' }}" id="lab_3">
                  </a>
                </div>
              </label>
            </li>
            <li class='wheel4 slice' >
              <label for='' class="circle " id="tab_4">
                <div class="lan"  id="">
                  <span class="line" style="height: 34px"></span>
                  <a target="" href="{{ route('360.protection') }}">
                    <img src="https://www.mygaphub.com/360/img/Protection.jpg" alt="" class="img overton {{ Request::is('home/360/protection') ? 'current_wheel' : '' }}" id="lab_4">
                  </a>
                </div>
              </label>
            </li>
            <li class='wheel5 slice' >
              <label for='' class="circle" id="tab_5">
                <div class="lan"  id="">
                  <span class="line" style="height: 34px"></span>
                  <a target="" href="{{ route('360.retirement') }}">
                      <img src="https://www.mygaphub.com/360/img/Retirement.jpg" alt="" class="img overton {{ Request::is('home/360/retirement') ? 'current_wheel' : '' }}" id="lab_5">
                  </a>
                </div>
              </label>
            </li>
            <li class='wheel6 slice' >
              <label for='' class="circle " id="tab_6">
                <div class="lan"  id="">
                  <span class="line"></span>
                  <a target="" href="{{ route('360.investment') }}">
                    <img src="https://www.mygaphub.com/360/img/Investment.jpg" alt="" class="img overton {{ Request::is('home/360/investment') ? 'current_wheel' : '' }} " id="lab_6">
                  </a>
                </div>
              </label>
            </li>
            <li class='wheel7 slice' >
              <label for='' class="circle " id="tab_7">
                <div class="lan"  id="">
                  <span class="line"></span>
                  <a target="" href="{{ route('360.cash') }}">
                    <img src="https://www.mygaphub.com/360/img/Cash.jpg" alt="" class="img overton {{ Request::is('home/360/cash') ? 'current_wheel' : '' }} "  id="lab_7">
                  </a>
                </div>
              </label>
            </li>
            <li class='wheel8 slice' >
              <label for='' class="circle " id="tab_8">
                <div class="lan"  id="">
                  <span class="line"></span>
                  <a target="" href="{{ route('360.mortgage') }}">
                    <img src="https://www.mygaphub.com/360/img/Mortgage.jpg" alt="" class="img overton {{ Request::is('home/360/mortgage') ? 'current_wheel' : '' }} " id="lab_8">
                  </a>
                </div>
              </label>
            </li>
            <li class='wheel9 slice' >
              <label for='' class="circle " id="tab_9">
                <div class="lan"  id="">
                  <span class="line"></span>
                  <a target="" href="{{ route('360.philanthropy') }}">
                    <img src="https://www.mygaphub.com/360/img/Philantropy.jpg" alt="" class="img overton {{ Request::is('home/360/philantrophy') ? 'current_wheel' : '' }} " id="lab_9">
                  </a>
                </div>
              </label>
            </li>
            <li class='wheel10 slice' >
              <label for='' class="circle " id="tab_10">
                <div class="lan"  id="">
                  <span class="line" style="height: 34px"></span>
                  <a target="" href="{{ route('user.actionplan') }}">
                    <img src="https://www.mygaphub.com/360/img/Action_Plan.jpg" alt="" class="img overton {{ Request::is('home/360/action') ? 'current_wheel' : '' }} " id="lab_10">
                  </a>
                </div>
              </label>
            </li>
            <li class='wheel11 slice' style="left: 32px;width: 90px; top: 110px;">
              <label for='' class="circle " id="tab_11">
                <div class="lan"  id="" style="width: 75px; height: 0px;">
                  <span class="line" style=""></span>
                  <a target="" href="{{ route('360.income') }}">
                    <img src="https://www.mygaphub.com/360/img/Income.jpg" alt="" class="img overton {{ Request::is('home/360/list/income') ? 'current_wheel' : '' }} " id="lab_11">
                  </a>
                </div>
              </label>
            </li>
            <li class='wheel12 slice' style="width: 40px !important;">
              <label for='' class="circle " id="tab_12">
                <div class="lan"  id="">
                  <span class="line" style="top: -30px;"></span>
                  <a target="" href="{{ route('360.asset') }}">
                    <img src="https://www.mygaphub.com/360/img/Asset.jpg" alt="" class="img overton {{ Request::is('home/360/asset') ? 'current_wheel' : '' }}" id="lab_12">
                  </a>
                </div>
              </label>
            </li>
              <a target="" href="{{ route('360.ilab') }}">
              <li class='unsel circle'>
                  <img src="https://www.mygaphub.com/360/img/360.png" alt="" class="img overton" id="tab_14" >
                  <!-- <label for='unsel' class="menuname"></label>   -->
              </li>
            </a>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="wheel_account">
  @php
    $base = last(request()->segments())
  @endphp
    @if ($base == '360')
      <button class="btn btn-pry px-2" id="wheel_btn" data-toggle="modal" data-target="#addWheelActModal"> Add Account </button>
    @else
      <button class="btn btn-pry px-2" id="wheel_btn" data-toggle="modal" data-target="#{{$base}}ModalAccount"> Add Account </button>
    @endif
</div>
@include('user.360.modals.wheel-modals')


