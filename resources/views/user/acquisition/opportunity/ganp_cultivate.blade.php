@extends('layouts.user')

@section('header')
<!-- Local Enviroment Script  -->
    <script>
        function chooseUnit(){
            let units = document.getElementById('units').value,
                months = document.getElementById('months').value,
                rate =  document.getElementById('rate').value,
                pay = document.getElementById('pay').value,
                amount = document.getElementById('amount').value;
            $('#gap_units').val(units);

            let subunit = document.querySelectorAll('#subunit'),
                tamount = document.querySelectorAll('#tamount'),
                profit = document.querySelectorAll('#profit'),
                month = document.querySelectorAll('#month_profit'),
                returns = document.querySelectorAll('#return');

            let profit_pay = document.querySelectorAll('#profit_pay'),
                per_pay = document.querySelectorAll('#per_pay');

            var pro = (+units * +amount  * +rate) / 100 ;


            subunit.forEach((sub) => {
                sub.textContent = (+units) ;
            })

            tamount.forEach((pr) => {
                pr.textContent = (units * amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'); ;
            });

            // returns.textContent = (pro + +units * +amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'); ;
            returns.forEach((pr) => {
                pr.textContent = (pro + +units * +amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'); ;
            })

            // month.textContent = ((pro) / months ).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'); ;
            month.forEach((pr) => {
                pr.textContent = ((pro) / months ).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'); ;
            })

            profit.forEach((pr) => {
                pr.textContent = pro.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'); ;
            })

            profit_pay.forEach((pr) => {
                pr.textContent = (pro / pay).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'); ;
            })

            per_pay.forEach((pr) => {
                pr.textContent = (100 / pay).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'); ;
            })
        }

        function refreshReport() {
            chooseUnit();
        }

        $(function() {
        refreshReport();
        });
    </script>

    <script>
        var share = "<?php echo $plant->share ?>";
        var image = "<?php echo url('http://www.gapassethub.com/public/'. str_replace('public', 'storage', $plant->image1 )) ?>";
        var isTool = false;
        function toggleShare(){
            $('#confirm_copy').hide();
            $('#share_link').val(this.share, this.image);
            $('.shareon').attr('data-url', this.share);
            $('.shareon .whatsapp').attr('data-title', this.share);
            $('.shareon .whatsapp').attr('data-url', this.share);
            $('.shareon .mail').attr('href', 'mailto:example@website.com?Subject=MyGaphub Asset&body='+this.share);
            $('.shareon .facebook').attr('data-title', this.share);
            $('.shareon .linkedin').attr('data-url', this.share);
            $('.shareon .pinterest').attr('data-url', this.share);
            $('.shareon .pinterest').attr('data-media', this.image);
            $('.shareon .telegram').attr('data-text', this.share);
            $('.shareon .telegram').attr('data-url', this.share);
            $('.shareon .twitter').attr('data-via', this.share);
            $('.shareon .twitter').attr('data-url', this.share);
            $('#shareModal').modal('show');
        }

        function copyLink(){
            document.getElementById('share_link').select();
            document.execCommand('copy');
            $('#confirm_copy').fadeIn();
            setTimeout(() => {
                $('#shareModal').modal('hide');
                $('#confirm_copy').hide();
            },2500);
        }
        $(function() {
            $('#ganpInvest').on('submit', function (e){
                e.preventDefault();
                var form = document.getElementById('ganpInvest');
                var fd = new FormData(form);
                console.log(fd)
                $.ajax({
                    type: 'POST',
                    url: "<?php echo route('acqusition.reserve_ganp', $plant->id) ?>",
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function (data, status){
                        console.log(data);
                        if(data.success){
                            $('#detail').hide();
                            $('#congrats').fadeIn();
                        }
                    },
                    error: function (data, status){
                        $('#error').text(data.responseJSON.errors[0])
                    }
                })


            });
        });
    </script>
@endsection

@section('secure_header')
<!-- Production Enviroment Script  -->
<script>
    var _0x8688=["\x76\x61\x6C\x75\x65","\x75\x6E\x69\x74\x73","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x6D\x6F\x6E\x74\x68\x73","\x72\x61\x74\x65","\x70\x61\x79","\x61\x6D\x6F\x75\x6E\x74","\x76\x61\x6C","\x23\x67\x61\x70\x5F\x75\x6E\x69\x74\x73","\x23\x73\x75\x62\x75\x6E\x69\x74","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72\x41\x6C\x6C","\x23\x74\x61\x6D\x6F\x75\x6E\x74","\x23\x70\x72\x6F\x66\x69\x74","\x23\x6D\x6F\x6E\x74\x68\x5F\x70\x72\x6F\x66\x69\x74","\x23\x72\x65\x74\x75\x72\x6E","\x23\x70\x72\x6F\x66\x69\x74\x5F\x70\x61\x79","\x23\x70\x65\x72\x5F\x70\x61\x79","\x74\x65\x78\x74\x43\x6F\x6E\x74\x65\x6E\x74","\x66\x6F\x72\x45\x61\x63\x68","\x24\x26\x2C","\x72\x65\x70\x6C\x61\x63\x65","\x74\x6F\x46\x69\x78\x65\x64"];function chooseUnit(){let _0xb774x2=document[_0x8688[2]](_0x8688[1])[_0x8688[0]],_0xb774x3=document[_0x8688[2]](_0x8688[3])[_0x8688[0]],_0xb774x4=document[_0x8688[2]](_0x8688[4])[_0x8688[0]],_0xb774x5=document[_0x8688[2]](_0x8688[5])[_0x8688[0]],_0xb774x6=document[_0x8688[2]](_0x8688[6])[_0x8688[0]];$(_0x8688[8])[_0x8688[7]](_0xb774x2);let _0xb774x7=document[_0x8688[10]](_0x8688[9]),_0xb774x8=document[_0x8688[10]](_0x8688[11]),_0xb774x9=document[_0x8688[10]](_0x8688[12]),_0xb774xa=document[_0x8688[10]](_0x8688[13]),_0xb774xb=document[_0x8688[10]](_0x8688[14]);let _0xb774xc=document[_0x8688[10]](_0x8688[15]),_0xb774xd=document[_0x8688[10]](_0x8688[16]);var _0xb774xe=(+_0xb774x2*  +_0xb774x6 *  +_0xb774x4) / 100;_0xb774x7[_0x8688[18]]((_0xb774xf)=>{_0xb774xf[_0x8688[17]]= (+_0xb774x2)});_0xb774x8[_0x8688[18]]((_0xb774x10)=>{_0xb774x10[_0x8688[17]]= (_0xb774x2* _0xb774x6)[_0x8688[21]](2)[_0x8688[20]](/\d(?=(\d{3})+\.)/g,_0x8688[19]);;});_0xb774xb[_0x8688[18]]((_0xb774x10)=>{_0xb774x10[_0x8688[17]]= (_0xb774xe+ +_0xb774x2*  +_0xb774x6)[_0x8688[21]](2)[_0x8688[20]](/\d(?=(\d{3})+\.)/g,_0x8688[19]);;});_0xb774xa[_0x8688[18]]((_0xb774x10)=>{_0xb774x10[_0x8688[17]]= ((_0xb774xe)/ _0xb774x3)[_0x8688[21]](2)[_0x8688[20]](/\d(?=(\d{3})+\.)/g,_0x8688[19]);;});_0xb774x9[_0x8688[18]]((_0xb774x10)=>{_0xb774x10[_0x8688[17]]= _0xb774xe[_0x8688[21]](2)[_0x8688[20]](/\d(?=(\d{3})+\.)/g,_0x8688[19]);;});_0xb774xc[_0x8688[18]]((_0xb774x10)=>{_0xb774x10[_0x8688[17]]= (_0xb774xe/ _0xb774x5)[_0x8688[21]](2)[_0x8688[20]](/\d(?=(\d{3})+\.)/g,_0x8688[19]);;});_0xb774xd[_0x8688[18]]((_0xb774x10)=>{_0xb774x10[_0x8688[17]]= (100/ _0xb774x5)[_0x8688[21]](2)[_0x8688[20]](/\d(?=(\d{3})+\.)/g,_0x8688[19]);;})}function refreshReport(){chooseUnit()}$(function(){refreshReport()})

    var share = "<?php echo $plant->share ?>";
    var image = "<?php echo url('http://www.gapassethub.com/public/'. str_replace('public', 'storage', $plant->image1 )) ?>";

    var _0x1ef9=["\x68\x69\x64\x65","\x23\x63\x6F\x6E\x66\x69\x72\x6D\x5F\x63\x6F\x70\x79","\x73\x68\x61\x72\x65","\x69\x6D\x61\x67\x65","\x76\x61\x6C","\x23\x73\x68\x61\x72\x65\x5F\x6C\x69\x6E\x6B","\x64\x61\x74\x61\x2D\x75\x72\x6C","\x61\x74\x74\x72","\x2E\x73\x68\x61\x72\x65\x6F\x6E","\x64\x61\x74\x61\x2D\x74\x69\x74\x6C\x65","\x2E\x73\x68\x61\x72\x65\x6F\x6E\x20\x2E\x77\x68\x61\x74\x73\x61\x70\x70","\x68\x72\x65\x66","\x6D\x61\x69\x6C\x74\x6F\x3A\x65\x78\x61\x6D\x70\x6C\x65\x40\x77\x65\x62\x73\x69\x74\x65\x2E\x63\x6F\x6D\x3F\x53\x75\x62\x6A\x65\x63\x74\x3D\x4D\x79\x47\x61\x70\x68\x75\x62\x20\x41\x73\x73\x65\x74\x26\x62\x6F\x64\x79\x3D","\x2E\x73\x68\x61\x72\x65\x6F\x6E\x20\x2E\x6D\x61\x69\x6C","\x2E\x73\x68\x61\x72\x65\x6F\x6E\x20\x2E\x66\x61\x63\x65\x62\x6F\x6F\x6B","\x2E\x73\x68\x61\x72\x65\x6F\x6E\x20\x2E\x6C\x69\x6E\x6B\x65\x64\x69\x6E","\x2E\x73\x68\x61\x72\x65\x6F\x6E\x20\x2E\x70\x69\x6E\x74\x65\x72\x65\x73\x74","\x64\x61\x74\x61\x2D\x6D\x65\x64\x69\x61","\x64\x61\x74\x61\x2D\x74\x65\x78\x74","\x2E\x73\x68\x61\x72\x65\x6F\x6E\x20\x2E\x74\x65\x6C\x65\x67\x72\x61\x6D","\x64\x61\x74\x61\x2D\x76\x69\x61","\x2E\x73\x68\x61\x72\x65\x6F\x6E\x20\x2E\x74\x77\x69\x74\x74\x65\x72","\x73\x68\x6F\x77","\x6D\x6F\x64\x61\x6C","\x23\x73\x68\x61\x72\x65\x4D\x6F\x64\x61\x6C","\x73\x65\x6C\x65\x63\x74","\x73\x68\x61\x72\x65\x5F\x6C\x69\x6E\x6B","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x63\x6F\x70\x79","\x65\x78\x65\x63\x43\x6F\x6D\x6D\x61\x6E\x64","\x66\x61\x64\x65\x49\x6E","\x73\x75\x62\x6D\x69\x74","\x70\x72\x65\x76\x65\x6E\x74\x44\x65\x66\x61\x75\x6C\x74","\x67\x61\x6E\x70\x49\x6E\x76\x65\x73\x74","\x6C\x6F\x67","\x50\x4F\x53\x54","\x3C\x3F\x70\x68\x70\x20\x65\x63\x68\x6F\x20\x72\x6F\x75\x74\x65\x28\x27\x61\x63\x71\x75\x73\x69\x74\x69\x6F\x6E\x2E\x72\x65\x73\x65\x72\x76\x65\x5F\x67\x61\x6E\x70\x27\x2C\x20\x24\x70\x6C\x61\x6E\x74\x2D\x3E\x69\x64\x29\x20\x3F\x3E","\x73\x75\x63\x63\x65\x73\x73","\x23\x64\x65\x74\x61\x69\x6C","\x23\x63\x6F\x6E\x67\x72\x61\x74\x73","\x65\x72\x72\x6F\x72\x73","\x72\x65\x73\x70\x6F\x6E\x73\x65\x4A\x53\x4F\x4E","\x74\x65\x78\x74","\x23\x65\x72\x72\x6F\x72","\x61\x6A\x61\x78","\x6F\x6E","\x23\x67\x61\x6E\x70\x49\x6E\x76\x65\x73\x74"];var isTool=false;function toggleShare(){$(_0x1ef9[1])[_0x1ef9[0]]();$(_0x1ef9[5])[_0x1ef9[4]](this[_0x1ef9[2]],this[_0x1ef9[3]]);$(_0x1ef9[8])[_0x1ef9[7]](_0x1ef9[6],this[_0x1ef9[2]]);$(_0x1ef9[10])[_0x1ef9[7]](_0x1ef9[9],this[_0x1ef9[2]]);$(_0x1ef9[10])[_0x1ef9[7]](_0x1ef9[6],this[_0x1ef9[2]]);$(_0x1ef9[13])[_0x1ef9[7]](_0x1ef9[11],_0x1ef9[12]+ this[_0x1ef9[2]]);$(_0x1ef9[14])[_0x1ef9[7]](_0x1ef9[9],this[_0x1ef9[2]]);$(_0x1ef9[15])[_0x1ef9[7]](_0x1ef9[6],this[_0x1ef9[2]]);$(_0x1ef9[16])[_0x1ef9[7]](_0x1ef9[6],this[_0x1ef9[2]]);$(_0x1ef9[16])[_0x1ef9[7]](_0x1ef9[17],this[_0x1ef9[3]]);$(_0x1ef9[19])[_0x1ef9[7]](_0x1ef9[18],this[_0x1ef9[2]]);$(_0x1ef9[19])[_0x1ef9[7]](_0x1ef9[6],this[_0x1ef9[2]]);$(_0x1ef9[21])[_0x1ef9[7]](_0x1ef9[20],this[_0x1ef9[2]]);$(_0x1ef9[21])[_0x1ef9[7]](_0x1ef9[6],this[_0x1ef9[2]]);$(_0x1ef9[24])[_0x1ef9[23]](_0x1ef9[22])}function copyLink(){document[_0x1ef9[27]](_0x1ef9[26])[_0x1ef9[25]]();document[_0x1ef9[29]](_0x1ef9[28]);$(_0x1ef9[1])[_0x1ef9[30]]();setTimeout(()=>{$(_0x1ef9[24])[_0x1ef9[23]](_0x1ef9[0]);$(_0x1ef9[1])[_0x1ef9[0]]()},2500)}$(function(){$(_0x1ef9[46])[_0x1ef9[45]](_0x1ef9[31],function(_0xfd31x4){_0xfd31x4[_0x1ef9[32]]();var _0xfd31x5=document[_0x1ef9[27]](_0x1ef9[33]);var _0xfd31x6= new FormData(_0xfd31x5);console[_0x1ef9[34]](_0xfd31x6);$[_0x1ef9[44]]({type:_0x1ef9[35],url:_0x1ef9[36],data:_0xfd31x6,processData:false,contentType:false,success:function(_0xfd31x7,_0xfd31x8){console[_0x1ef9[34]](_0xfd31x7);if(_0xfd31x7[_0x1ef9[37]]){$(_0x1ef9[38])[_0x1ef9[0]]();$(_0x1ef9[39])[_0x1ef9[30]]()}},error:function(_0xfd31x7,_0xfd31x8){$(_0x1ef9[43])[_0x1ef9[42]](_0xfd31x7[_0x1ef9[41]][_0x1ef9[40]][0])}})})})
</script>

@endsection

@section('content')
    <style>
    </style>
    <div class="wd-f bg-white py-3">
        <div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content wd-c">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="">
                            <form action="#" id="ganpInvest" method="POST">
                                @csrf
                                <input type="hidden" id="gap_units" name="units">
                                <div class="card-img px-5 wd-8 mx-auto text-center sm-wdf sm-no-pad">
                                    <img src="{{ url('http://www.gapassethub.com/public/'. str_replace('public', 'storage', $plant->image3 )) }}" alt=" " style="height: 300px" class="wd-f py-3 px-2 mb-3">
                                    <h2 class="display bold">{{ $plant->name }}</h2>
                                    <p> {{$plant->rate}}% Return • {{$plant->months}} Months</p>
                                    <h5> Your Subscriptions Amount </h5>
                                    <h4 class="bold"> {{explode(' ', $plant->currency)[0] }}<span id="tamount"></span>  </h4>

                                    <div class="" id="detail">
                                        <a class="bold" href="#"> Equivalent value in your currency </a>

                                        <div class="bg-gray row my-2 p-3">
                                            <p class=""> Representative Example (Variable): In the {{$plant->months / $plant->max_pay}}th month you will receive {{explode(' ', $plant->currency)[0] }}<span id="profit_pay"></span>
                                                (<span id="per_pay"></span>% of your returns)
                                                @if ($plant->max_pay > 1)
                                                    and by the {{$plant->months}}th month, you will receive the balance of {{explode(' ', $plant->currency)[0] }}<span id="profit_pay"></span>
                                                @endif
                                            </p>
                                            <p>As well as your capital of {{explode(' ', $plant->currency)[0] }}<span id="tamount"></span>. Total amount returned wiil be {{explode(' ', $plant->currency)[0] }}<span id="return"></span> </p>
                                        </div>
                                        <div class="text-left">
                                            <h6 class="bold">Disclaimer:</h6>
                                            <p>MyGAPhub does not guarantee or control neither your
                                                capital nor your returns. You will enter into an
                                                independent contract with the local vendor which will
                                                be responsible for managing your asset.
                                            </p>
                                        </div>

                                        <div class="my-2 mx-auro">
                                            @if(auth()->user())
                                                <p>
                                                    <input required type="checkbox" name="confirm" class="form-control mr-2" style="height: 20px;display: inline;width: 20px;" id="">
                                                        I agree with all the terms & conditions.
                                                </p>
                                                <button type="submit" class="btn btn-pry btn-sm py-2 px-4" >Subscribe with Vendor</button>
                                            @else
                                                <a type="button" class="btn btn-pry btn-sm px-3" href="{{route('login')}}">Login to Subscribe</a>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="my-3" style="display: none;" id="congrats">
                                        <h5 class="py-2">CONGRATULATIONS!</h5>
                                        <p class="text-center">
                                            Your subscription has been successfully <br>
                                            submitted. A representative of the <br>
                                            vendor will contact you shortly
                                        </p>
                                        <button type="button" class="btn btn-pry btn-sm my-3 py-2 px-4" onclick="window.location.reload()">Close</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mx-5">
            <span class="mr-3 pb-2" id="goback">
                <a href="#" class="text-dark bold" onclick="window.history.go(-1); return false;" ><i class="fa fa-chevron-left mr-1"></i> Back</a>
            </span>
        </div>


        <div class="row mt-3 ">
            <div class="col-12">
                <div class="reap-asset elevation-3">
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="card-img">
                                <img src="{{ url('http://www.gapassethub.com/public/'. str_replace('public', 'storage', $plant->image2 )) }}" alt=" " style="height: 300px" class="wd-f py-3 px-2">
                            </div>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <div class="card-body">
                               <div class="row">
                                   <div class="col-12 mb-2">
                                       <h1 class="display sm-fs-18 sm-bold">{{ $plant->name }} Illustration and Intelligence Report</h1>
                                       <div class="wd-7 mb-2">
                                           <input type="hidden" name="amount" id="amount" value="{{$plant->amount}}">
                                           <input type="hidden" name="months" id="months" value="{{$plant->months}}">
                                           <input type="hidden" name="rate" id="rate" value="{{$plant->rate}}">
                                           <input type="hidden" name="pay" id="pay" value="{{$plant->max_pay}}">
                                            <select name="units" id="units" class="form-control wd-7" onchange="chooseUnit()">
                                                <option value="1">Select your subscription units</option>
                                                @for ($i = 1; $i <= 50; $i++)
                                                     <!-- {{ ($i > 1) ? 'units' : 'unit'}} -->
                                                    <option value="{{$i}}">{{$i}} </option>
                                                @endfor
                                            </select>
                                       </div>
                                   </div>
                                   <div class="col">
                                       <div class="text-cult mb-3">
                                           <h6 class="bold">Subscription Units</h6>
                                           <h4 id="subunit"></h4>
                                       </div>
                                       <div class="text-cult mb-3">
                                           <h6 class="bold">Returns</h6>
                                           <h4 class="sm-fs-16">{{explode(' ', $plant->currency)[0] }} <span id="return"></span>
                                            {{-- {{ number_format((($plant->amount * $plant->rate) / 100) + $plant->amount, 2) }} --}}
                                        </h4>
                                       </div>
                                       <div class="text-cult mb-3">
                                           <h6 class="bold">Payment Frequency</h6>
                                           <h4 class="sm-fs-16">{{ $plant->max_pay }}</h4>
                                       </div>
                                       <button type="button" class="btn btn-pry btn-sm py-2 px-4" data-toggle="modal" data-target="#subscribeModal">Subscribe</button>
                                   </div>
                                   <div class="col">
                                       <div class="text-cult mb-3">
                                           <h6 class="bold">Amount</h6>
                                           <h4 class="sm-fs-16"> {{explode(' ', $plant->currency)[0] }} <span id="tamount"></span> </h4>
                                       </div>
                                       <div class="text-cult mb-3">
                                           <h6 class="bold">Total Profits</h6>
                                           <h4 class="sm-fs-16">  {{explode(' ', $plant->currency)[0] }}<span id="profit"></span>
                                            {{-- {{  number_format(($plant->amount * $plant->rate) / 100, 2) }}  --}}
                                         </h4>
                                       </div>
                                       <div class="text-cult mb-3">
                                           <h6 class="bold">Equivalent Monthly Profit</h6>
                                           <h4 class="sm-fs-16">  {{explode(' ', $plant->currency)[0] }}<span id="month_profit"></span>  </h4>
                                       </div>
                                   </div>
                                   {{-- <div class="col d-none d-md-block"></div> --}}
                                   <div class="col goffset-sm-6">
                                       <div class="text-cult sm-mt1 mb-3 sm-mr-8">
                                           <h6 class="bold">Term</h6>
                                           <h4 class="sm-fs-16">{{ $plant->months }} Months</h4>
                                       </div>
                                       <div class="text-cult mb-3">
                                           <h6 class="bold">Rate</h6>
                                           <h4 class="sm-fs-16">{{ $plant->rate }}%</h4>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12  my-3">
                    <div class=" m-5">
                        <h4 for="" class="text-center">Units Remaining: {{ number_format($plant->total_units - $plant->invested_units) }} </h4>
                        {{-- <input type="range" min="1" max="100" value="1" class="slider form-control" id="unitRange">  --}}
                        <div class="range mt-3">
                            <input  type="range" min="1" step="1" id="ganp_investment" max="{{$plant->total_units}}" disabled value="{{($plant->total_units- $plant->invested_units)}}">
                        </div>
                      </div>
                </div>

                <div class="col-12 ">
                    <div id="accordion">
                        <div class="card">
                            <div class="accord-header bg-dark mb-0 py-2" id="headingOne">
                                <div class="wd-f">
                                    <a href="#" class="text-white"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Summary</a>
                                    <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-chevron-down text-white"></i>
                                    </button>
                                </div>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body pb-1">
                                    <div class="card-body pb-1">
                                        <p> {{ $plant->summary }}  </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card my-3">
                            <div class="accord-header bg-dark mb-0 py-2" id="headingTwo">
                                <div class="wd-f">
                                    <a href="#" class="text-white"  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Intelligence Report</a>
                                    <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        <i class="fa fa-chevron-down text-white"></i>
                                    </button>
                                </div>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body pb-1">
                                    <div class="card-body pb-1">
                                        @if ($plant->report)
                                            <p> {{ $plant->report }}  </p>
                                        @else
                                            <p>Available On Request </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="card mt-5 mb-3">
                        <div class="card-header bg-dark">
                            <div class="card-title"> <h4 class=" pl-5 text-white">Summary</h4></div>
                        </div>
                        <div class="card-body bg-gray">
                            <p>{{ $plant->summary }}</p>
                            <div class=" text-right my-3">
                                <button type="button" class="btn btn-dark btn-sm py-2 px-4">Intelligence Report</button>
                                <button type="button" class="btn btn-pry btn-sm py-2 px-4" data-toggle="modal" data-target="#subscribeModal">Subscribe</button>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="mx-auto text-center my-3">
                    <button type="button" class="btn btn-pry btn-sm py-2 btn-block-sm" data-toggle="modal" data-target="#subscribeModal">Subscribe</button>
                </div>
            </div>


        </div>
    </div>
@endsection
