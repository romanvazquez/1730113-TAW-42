
    <nav class="navbar bg-white shadow-sm">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link {{ setActive('home') }}" href="/">Home</a></li>
            <li class="nav-item"><a class="nav-link {{ setActive('departamentos') }}" href="/departamentos">Departamentos</a></li>
            <li class="nav-item"><a class="nav-link {{ setActive('empleados') }}" href="/empleados">Empleados</a></li>
            <li class="nav-item"><a class="nav-link {{ setActive('about') }}" href="/about">About</a></li>
            <li class="nav-item"><a class="nav-link {{ setActive('contact') }}" href="/contact">Contact</a></li>
        </ul>
    </nav>