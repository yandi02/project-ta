<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('modernize/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('modernize/assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('modernize/assets/css/dataTables.bootstrap4.min.css') }}">
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="mini-sidebar"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @includeIf('tes.layouts.sidebar')
        <!--  Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @includeIf('tes.layouts.header')
            <!--  Header End -->

            <div class="container-fluid">
                <!--  Row 1 -->
                @yield('content')

                @includeIf('tes.layouts.footer')
            </div>
        </div>
    </div>
    <script src="{{ asset('modernize/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('modernize/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('modernize/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('modernize/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('modernize/assets/libs/apexcharts/dist/apexcharts.min.js') }} "></script>
    <script src="{{ asset('modernize/assets/libs/simplebar/dist/simplebar.js') }} "></script>
    <script src="{{ asset('modernize/assets/js/dashboard.js') }} "></script>
    <script src="{{ asset('adminlte3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('modernize/assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/validator.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
