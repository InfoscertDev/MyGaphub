@extends('layouts.user')
@section('content')
    <style>
        .support-tile{
            cursor: pointer;
        }

        .support-tile:hover{
            transform: scale(1.05);
            box-shadow: 0 5px 8px rgba(200,200,200,.12), 0 4px 8px rgba(200,200,200,.06);
        }
    </style>
    <div class="container-fluid">
        <div class="pt-3">
          <div class="gap-center">
             <div class="row">
               <div class="col-lg-10 col-sm-12">
                <h4 class="bold text-center"> Choose from any of our support services </h4>

                <div class="row ">
                    <div class="col-12 my-2">
                        <a  href="{{  route('support.guide') }}"
                            class="support-tile d-flex py-4 shadow-sm card-link" style="cursor: pointer; color: inherit">
                            <div class="mx-4 sm-mr-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm306.7 69.1L162.4 380.6c-19.4 7.5-38.5-11.6-31-31l55.5-144.3c3.3-8.5 9.9-15.1 18.4-18.4l144.3-55.5c19.4-7.5 38.5 11.6 31 31L325.1 306.7c-3.2 8.5-9.9 15.1-18.4 18.4zM288 256a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
                            </div>
                            <div class="py-2">
                                <h5 class="text-underline text-capitalize">Quick Start guide</h5>
                            </div>
                       </a>
                    </div>
                    <div class="col-12 my-2">
                        <div class="support-tile d-flex py-4 shadow-sm" style="cursor: pointer">
                            <div class="mx-4 sm-mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M88.2 309.1c9.8-18.3 6.8-40.8-7.5-55.8C59.4 230.9 48 204 48 176c0-63.5 63.8-128 160-128s160 64.5 160 128s-63.8 128-160 128c-13.1 0-25.8-1.3-37.8-3.6c-10.4-2-21.2-.6-30.7 4.2c-4.1 2.1-8.3 4.1-12.6 6c-16 7.2-32.9 13.5-49.9 18c2.8-4.6 5.4-9.1 7.9-13.6c1.1-1.9 2.2-3.9 3.2-5.9zM0 176c0 41.8 17.2 80.1 45.9 110.3c-.9 1.7-1.9 3.5-2.8 5.1c-10.3 18.4-22.3 36.5-36.6 52.1c-6.6 7-8.3 17.2-4.6 25.9C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.8-2.2 9.6-4.5 14.2-6.8c15.1 3 30.9 4.5 47.1 4.5c114.9 0 208-78.8 208-176S322.9 0 208 0S0 78.8 0 176zM432 480c16.2 0 31.9-1.6 47.1-4.5c4.6 2.3 9.4 4.6 14.2 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.8 2-19-4.6-25.9c-14.2-15.6-26.2-33.7-36.6-52.1c-.9-1.7-1.9-3.4-2.8-5.1C622.8 384.1 640 345.8 640 304c0-94.4-87.9-171.5-198.2-175.8c4.1 15.2 6.2 31.2 6.2 47.8l0 .6c87.2 6.7 144 67.5 144 127.4c0 28-11.4 54.9-32.7 77.2c-14.3 15-17.3 37.6-7.5 55.8c1.1 2 2.2 4 3.2 5.9c2.5 4.5 5.2 9 7.9 13.6c-17-4.5-33.9-10.7-49.9-18c-4.3-1.9-8.5-3.9-12.6-6c-9.5-4.8-20.3-6.2-30.7-4.2c-12.1 2.4-24.7 3.6-37.8 3.6c-61.7 0-110-26.5-136.8-62.3c-16 5.4-32.8 9.4-50 11.8C279 439.8 350 480 432 480z"/></svg>
                            </div>
                            <div class="py-2">
                                <h5 class="text-underline text-capitalize">Frequently Asked Questions</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <div class="support-tile d-flex py-4 shadow-sm" style="cursor: pointer">
                            <div class="mx-4 sm-mr-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z"/></svg>
                            </div>
                            <div class="py-2">
                                <h5 class="text-underline text-capitalize">Ask a Question</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 my-2">
                        <div class="support-tile d-flex py-4 shadow-sm" style="cursor: pointer">
                            <div class="mx-4 sm-mr-2">
                                 <svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M280 64h40c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128C0 92.7 28.7 64 64 64h40 9.6C121 27.5 153.3 0 192 0s71 27.5 78.4 64H280zM64 112c-8.8 0-16 7.2-16 16V448c0 8.8 7.2 16 16 16H320c8.8 0 16-7.2 16-16V128c0-8.8-7.2-16-16-16H304v24c0 13.3-10.7 24-24 24H192 104c-13.3 0-24-10.7-24-24V112H64zm128-8a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg>
                            </div>
                            <div class="py-2">
                                <h5 class="text-underline text-capitalize">Terms & Conditions</h5>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 px-4 col-sm-6 col-xs-12">
                        <button type="button" class="btn btn-rounded btn-block bg-fb" >
                            <i class="mr-4 fa fa-facebook"></i> <a class="card-link text-white" href="{{ url('http://facebook.com') }}"> Like us on Facebook</a>
                        </button>
                    </div>
                    <div class="my-3 px-4 col-sm-6 col-xs-12">
                        <button type="button" class="btn btn-rounded btn-block bg-tweet" >
                            <i class="mr-4 fa fa-twitter"></i> <a class="card-link text-white" href="{{ url('http://twitter.com') }}">Follow us on Twitter</a>
                        </button>
                    </div>
                 </div>
               </div>
             </div>
          </div>
        </div>
    </div>
@endsection
