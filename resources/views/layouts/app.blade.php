<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.js') }}"></script>

    <!-- Fonts -->
{{--     <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/login_footer.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">


</head>
<body>

    <header class="img">

            <center>

                <img src=" {{ asset('/imagenes/logo_cantvnew.png')}}" style="width:90%; height: 60px;">

            </center>

    </header>

    <div class="login">
        
        <main class="py-4">
            @yield('content')
        </main>

    </div>

<footer>
{{--     <div> --}}
        {{-- <div class="container-fluid"> --}}
            <div class="shadow-lg p-0 mb-0 bg-white rounded">
            <center>

                <div class="p-1 mb-0 bg-danger text-white">
                        Cantv 2020 - RIF:J-00124134-5 | GGSI | GSOS | Coinse - Todos los derechos reservados - 2020©
                </div>

            </center>
            </div>
        {{-- </div> --}}
{{--     </div> --}}
</footer>

</body>
</html>

