<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <!-- WebApp Logo - link to homepage -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

<!-- START - ADMIN Section -->
    <!-- TODO Add Nav Links - ADMIN -->
                            <!-- Sample -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('welcome') }}">
                                    {{ __('Welcome') }}
                                </a>
                            </li>
                            <!-- Sample -->
                            <li>
                                <a class="nav-link" href="{{ route('users.index') }}">
                                    {{ __('Users') }}
                                </a>
                            </li>
                            <!-- Sample -->
                            <li>
                                <a class="nav-link" href="{{ route('providers') }}">
                                    {{ __('Social Providers') }}
                                </a>
                            </li>
                            <!-- Sample -->
                            <li>
                                <a class="nav-link" href="{{ route('api') }}">
                                    {{ __('API\'s') }}
                                </a>
                            <!-- Sample -->
                            <li>
                                <a class="nav-link" href="{{ route('scopes') }}">
                                    {{ __('API Scopes') }}
                                </a>
                            </li>
<!-- END - ADMIN Section -->

<!-- START - AUTH USER Section -->
    <!-- TODO Nav Links - AUTH (include MVC for AUTH USER profile settings) -->
<!-- END - AUTH USER Section -->
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Guest Login / Register -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @endguest

                            <!-- Authenticated WebApp User - Social Login / WebApp Logout -->
                            @auth
                                <!-- Social Login -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('loginprovider') }}">{{ __('Social Login') }}</a>
                                </li>

                                <!-- WebApp Logout -->
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->firstname }} <span class="caret"></span>
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
                            @endauth
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>
