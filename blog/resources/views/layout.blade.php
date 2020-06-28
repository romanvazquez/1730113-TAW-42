<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title','Práctica Laravel')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        
        </style>

    </head>
    <body>

        @include('partials/navbar')


        @yield('content')

        <div>
            @if (Route::has('login'))

                <div>
                    @auth

                        <a href="{{ url('/home') }}">Home</a>
                    @else

                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))

                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth

                </div>
            @endif

        </div>
    </body>
</html>
