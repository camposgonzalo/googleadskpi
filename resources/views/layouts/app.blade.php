<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>Crovex - Admin & Dashboard Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <meta content="Google Ads kpi" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="img/ads.png" />
    <!-- jvectormap -->
    <link href="{{ asset('crovex/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- App css -->
    <link href="{{ asset('crovex/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('crovex/assets/css/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('crovex/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('crovex/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('crovex/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="{{ Auth::user() ? '' : "account-body accountbg" }}">
    @if(Auth::user())
    <!-- Top Bar Start -->
    @include('layouts.partials.header')
    <!-- Top Bar End -->
    <!-- Left Sidenav -->
    @include('layouts.partials.sidebar')

    <!-- end left-sidenav-->
    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid pt-4" id="main-wrapper">
                @yield('content')
            </div>
            <!-- container -->
            @include('layouts.partials.footer')
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
    @else
        @yield('content')
    @endif
    <!-- jQuery  -->
    <script src="{{ asset('crovex/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('crovex/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('crovex/assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('crovex/assets/js/waves.js') }}"></script>
    <script src="{{ asset('crovex/assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('crovex/assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('crovex/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('crovex/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('crovex/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('crovex/assets/js/app.js') }}"></script>
    <script defer src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>

</body>

</html>
