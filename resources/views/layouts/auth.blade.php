<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body class="auth-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <main class="p-5">
                    @include('admin.layouts._alerts')
                    @yield('auth_header')
                    @yield('content')
                    @yield('auth_footer')
                </main>
            </div>
            <!-- /.col-lg-5 -->
            <div class="col-xl-8 col-lg-7 vh-100 d-none d-lg-flex bg-success">
                <div class="p-5">
                    @yield('content_2')
                </div>
            </div>
            <!-- /.col-lg-7 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</body>

</html>
