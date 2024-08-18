<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name2') }} | @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="https://via.placeholder.com/600x300?text=Logo+1">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('modernize2/authform/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('modernize2/authform/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('modernize2/authform/css/styles.css') }}"> --}}
</head>

<body>
    @yield('content')

    @includeIf('auth.partials.footer')
</body>

</html>
