<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Title -->
        <title>@yield('title', config('app.name') )</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel='stylesheet'>
        
    </head>
    
    <body>
        <div id="app">
        </div>

        <script src="{{ url('js/app.js') }}"></script>
    </body>
</html>
