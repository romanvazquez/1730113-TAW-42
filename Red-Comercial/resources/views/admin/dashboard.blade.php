<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>@yield('title', config('app.name') )</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <style>
            .back-to-top {
                position: fixed;
                display: none;
                width: 40px;
                height: 40px;
                border-radius: 4px;
                right: 15px;
                bottom: 15px;
                background: #ececec;
                border: solid #ccc 0.24px;
                transition: display 0.5s ease-in-out;
                z-index: 99999;
            }
            .back-to-top:hover {
                color: #fff;
                background: #ccc;
                transition: background 0.2s ease-in-out;
            }
        </style>

        <script>
            const ADMIN_ROUTE = "{{ config('adlara.admin_route') }}";
            const ADMIN_APP_ROUTE = "{{ config('adlara.admin_route') . '/app' }}";
            const ADMIN_API_ROUTE = "{{ config('adlara.admin_route') . '/api' }}";
        </script>

    </head>
    <body>
        <div id="dApp"></div>
        
        <a href="#" class="back-to-top arrow"><img src="{{ url('images/Antu_arrow-up.svg') }}" class="filter-arrow"></a>

        <script src="{{ url('js/vApp.js') }}"></script>

        <!-- Jquery -->
        <script src="{{ url('js/jquery.min.js') }}"></script>
        
        <!-- Jquery page effects -->
        <script src="{{ url('js/jquery.easing.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
        
        <!-- Custom script -->
        <script src="{{ url('js/script.js') }}"></script>
    </body>
</html>