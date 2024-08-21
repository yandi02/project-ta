<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('img/icon-manifest.jpeg') }}">
    <!-- Include SweetAlert2 from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <title>{{ config('app.name2') }} | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('modernize2/css/styles.css') }}" />
    @stack('css')

    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/views/themes/toko-online/assets/css/main.css', 'resources/views/themes/toko-online/assets/plugins/jqueryui/jquery-ui.css', 'resources/views/themes/toko-online/assets/js/main.js', 'resources/views/themes/toko-online/assets/plugins/jqueryui/jquery-ui.min.js'])
</head>

<body>
    @include('themes.toko-online.shared.header')

    <section class="content">
        <section class="breadcrumb-section pb-4 pb-md-4 main-product">
            <div class="container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @section('breadcrumb')
                            <li class="breadcrumb-item"><a href="{{ route('toko') }}">Home</a></li>
                        @show
                    </ol>
                </nav>
            </div>
        </section>
        @yield('content')
    </section>

    @include('themes.toko-online.shared.footer')

    {{-- <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script> --}}
    <script src="{{ asset('modernize2/js/jquery-3.5.1.js') }}"></script>
    @stack('scripts')
</body>

</html>
