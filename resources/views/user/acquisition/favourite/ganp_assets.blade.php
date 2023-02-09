@extends('layouts.user')
@section('content')
@include('inc.tools')
<div class="wd-f bg-white py-3">
    <div class="elevation-3 b-rad-20">
        <div class="mb-2">
            @include('user.acquisition.favourite.banner')
        </div>

        <div class="m-3">
            <div class="row mt-1 mx-4">
                @if (count($cultivations))
                    @foreach ($cultivations as $plant)
                        <div class="col-md-6 col-xs-12">
                            <div class="reap-asset mx-2 elevation-3">
                                <div class="list-img">
                                    <a href="{{ route('user.single_ganp',[$plant->id, 'tresh' => rand(1000,9999) ]) }}" class="card-link text-white">
                                        <img src="{{ url('http://www.gapassethub.com/public/'. str_replace('public', 'storage', $plant->image1)) }}" alt=" " class="img img-responsive">
                                    </a>
                                </div>
                                <div class="list-body">
                                <div class="px-3 wd-f">
                                    <h4> {{ $plant->name}} </h4>
                                    <h6>  {{ $plant->agency->name}} </h6>
                                    <h6 class="d-block sm-fs-12">
                                        <span class="mr-1"> {{ $plant->rate}}% Return </span> <span> •  {{ $plant->months}} months</span>
                                            <span class="float-right px-3 py-1 bg-dark text-white sm-px-1">{{explode(' ', $plant->currency)[0] }}{{ number_format($plant->amount,2)}} per unit</span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="text-center my-3">
                                    <div class="brokerage asset_footer mt-2" >
                                        <div class="d-flex">
                                            <div class="col p-2">
                                                <span class="mr-2 sm-mr-1">
                                                    <button class="bg-none br-none" style="position: relative; top: -2px;" onclick="toggleShare()" id="toggle_share">
                                                        <img src="{{ asset('/assets/icon/social_share.png') }}" class="profile-sm profile img img-responsive pr-2"
                                                            style="position: relative; top: -4px;" alt="">
                                                        <span>Share</span>
                                                    </button>
                                                    <script>
                                                        var isTool = false;
                                                        var share = "<?php echo $plant->share ?>";
                                                        var image = "<?php echo url('http://www.gapassethub.com/public/'. str_replace('public', 'storage', $plant->image1 )) ?>";
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
                                                    </script>
                                                </span>
                                            </div>
                                            <div class="col p-2">
                                                <span class="mr-2 sm-mr-1">
                                                    <a class="bg-none br-none hand text-dark" style=" position: relative; top: -2px;"
                                                        href="{{ route('user.favourite-asset', [$plant->id, 'kajhhsvbncbx'=>'gaoajkjxjnjzsbdaahgs_rmzojickjnsjz', 'sign' =>'sjh78wuhdf625765272nudihncuhjbcuhscb']) }}" >
                                                        <i class="fa fa-trash pr-2" style="font-size:18px"></i>
                                                        <span>Remove</span>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="mx-auto text-center p-5">
                        <h4 class="nomatches p-5">
                            <strong >No Favourite GANP Asset.</strong>
                        </h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<style>
</style>
@endsection
