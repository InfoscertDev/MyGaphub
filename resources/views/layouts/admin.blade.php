<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyGaphub') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    {{-- <link href="{{ asset('assets/css/Chart.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/mygap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('assets/css/mygap.css') }}" rel="stylesheet"> -->

    <!-- Scripts -->
    <script src="https://cdn.tiny.cloud/1/z7j9iodr3oi5a4ak7jzwq3ptqrn7tbeykucsy8hzxi635rvb/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.js') }}"></script>

</head>

<body>
    <div id="app">
        <main class="row m-0 bg-white">
            <div class="col-md-2 side bg-white  hg-f1 gap-col-side"  style="">
                <div class="col-inner ">
                    <div class="logo">
                        <div class="wrapper">
                            <img class="img img-responsive" src="{{ asset('assets/images/logo.png') }}" alt="">
                        </div>
                    </div>
                    @include('inc.adminsidemenu')
                </div>
            </div>
            <div class="col-md-10 gap-col-main" style="">
                @include('inc.messages')
                @yield('content')
            </div>
        </main>
    </div>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @yield('script')
    {{-- <script src="{{ asset('assets/js/script.js') }}"></script> --}}
    <script>
        // Initialize TinyMCE
        tinymce.init({
            selector: '.rich-editor',
            height: 400,
            plugins: 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            branding: false,
            menubar: false
        });

        // Image preview functionality
        function previewImage(input, previewId) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(previewId).src = e.target.result;
                    document.getElementById(previewId).style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Auto-generate slug from title
        function generateSlug(title) {
            return title.toLowerCase()
                       .replace(/[^a-z0-9 -]/g, '')
                       .replace(/\s+/g, '-')
                       .replace(/-+/g, '-');
        }

        // Confirm delete
        function confirmDelete(form) {
            if (confirm('Are you sure you want to delete this item? This action cannot be undone.')) {
                form.submit();
            }
        }
    </script>

</body>
</html>
