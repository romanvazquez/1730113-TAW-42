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

        <script>
            const ADMIN_ROUTE = "{{ config('adlara.admin_route') }}";
            const ADMIN_APP_ROUTE = "{{ config('adlara.admin_route') . '/app' }}";
            const ADMIN_API_ROUTE = "{{ config('adlara.admin_route') . '/api' }}";
        </script>

    </head>
    <body>
        <div id="dApp"></div>

        <script src="{{ url('js/vApp.js') }}"></script>

    </body>
</html>