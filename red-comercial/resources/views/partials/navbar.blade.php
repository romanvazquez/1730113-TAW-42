        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top shadow-sm">
            <div class="container">
                <div class="logo float-left">
                    <h1 class="text-light"><a href="{{ route('inicio') }}"><span>{{ config('app.name') }}</span></a></h1>
                </div>
            

                <nav class="nav-menu float-right d-none d-lg-block">
                    <!-- Right Side Of Navbar -->
                    <ul>
                        <!-- Authentication Links -->
                        @guest

                        <li class="active"><a href="{{ route('inicio') }}">Inicio</a></li>
                        <li class="nav-item"><a href="#">Acerca de nosotros</a></li>
                        <li class="nav-item"><a href="{{ route('afiliate') }}">Afíliate</a></li>
                        <li class="nav-item"><a href="#">FAQ</a></li>
                        <li class="nav-item"><a href="#">Contacto</a></li>
                        <li class="drop-down"><a href="">Drop Down</a>
                            <ul>
                                <li class="nav-item"><a href="#">Drop Down 1</a></li>
                                <li class="drop-down"><a href="#">Drop Down 2</a>
                                    <ul>
                                        <li class="nav-item"><a href="#">Deep Drop Down 1</a></li>
                                        <li class="nav-item"><a href="#">Deep Drop Down 2</a></li>
                                        <li class="nav-item"><a href="#">Deep Drop Down 3</a></li>
                                        <li class="nav-item"><a href="#">Deep Drop Down 4</a></li>
                                        <li class="nav-item"><a href="#">Deep Drop Down 5</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="#">Drop Down 3</a></li>
                                <li class="nav-item"><a href="#">Drop Down 4</a></li>
                                <li class="nav-item"><a href="#">Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Inicia sesión') }}</a>
                        </li>
                        @if (Route::has('register'))
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                        </li>
                        @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nombres }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                    </ul>
                </nav>
            </div>
        </header>