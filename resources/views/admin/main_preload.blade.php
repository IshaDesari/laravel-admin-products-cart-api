<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>@yield('title', env('APP_NAME'))</title>
<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon-->
{{-- <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> --}}
<link rel="shortcut icon" type="image/png" href="{{ asset('dist/images/favicon.png') }}" />

<!-- project css file  -->
<link href="{{ asset('dist/css/vt_style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('dist/plugin/parsleyjs/css/parsley.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('dist/plugin/datatables/responsive.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('dist/plugin/datatables/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" type="text/css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" rel="stylesheet"
    type="text/css" />

<!-- Toastr -->
<link href="{{ asset('dist/plugin/toastr/toastr.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('dist/plugin/toastr/jquery.min.js') }}" lang="Javascript" type="text/javascript"></script>
<script src="{{ asset('dist/plugin/toastr/toastr.min.js') }}" lang="Javascript" type="text/javascript"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        // "newestOnTop": false,
        // "positionClass": "toast-bottom-center",
        // "preventDuplicates": false,
        // "onclick": null,
        // "showDuration": "300",
        // "hideDuration": "1000",
        // "timeOut": "5000",
        // "extendedTimeOut": "1000",
        // "showEasing": "swing",
        // "hideEasing": "linear",
        // "showMethod": "fadeIn",
        // "hideMethod": "fadeOut"
    }
</script>

{{-- <style>
    .no-js #loader {
        display: none;
    }

    .js #loader {
        display: block;
        position: absolute;
        left: 100px;
        top: 0;
    }

    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url(dist/images/preloader.gif) center no-repeat #fff;
    }
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
    //paste this code under head tag or in a seperate js file.
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
</script> --}}
