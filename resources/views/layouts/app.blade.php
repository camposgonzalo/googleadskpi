<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from mannatthemes.com/crovex/crovex_live/dashboard/analytics-index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Aug 2020 23:25:48 GMT -->

<head>
    <meta charset="utf-8" />
    <title>Crovex - Admin & Dashboard Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://mannatthemes.com/crovex/crovex_live/assets/images/favicon.ico" />
    <!-- jvectormap -->
    <link href="{{ asset('crovex/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!-- App css -->
    <link href="{{ asset('crovex/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('crovex/assets/css/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('crovex/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('crovex/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('crovex/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
    <!-- Top Bar Start -->
    @include('layouts.partials.header')
    <!-- Top Bar End -->
    <!-- Left Sidenav -->
    @include('layouts.partials.sidebar')

    <!-- end left-sidenav-->
    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid" id="main-wrapper" style="margin-top: 0.5%;">
                @yield('content')
            </div>
            <!-- container -->
            @include('layouts.partials.footer')
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->
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
<!-- Mirrored from mannatthemes.com/crovex/crovex_live/dashboard/analytics-index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Aug 2020 23:25:49 GMT -->

</html>
