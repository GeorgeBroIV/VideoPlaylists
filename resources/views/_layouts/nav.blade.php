<div class="container">

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <!-- WebApp Logo - link to homepage -->
        <a class="navbar-brand" href="{{ url('/welcome') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon">
            </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <!-- Home -->
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            {{ __('Home') }}
                        </a>
                    </li>
                @endauth

                <!-- START - ADMIN Section -->
                @isAdmin
                    <!-- Users -->
                    <li>
                        <a class="nav-link" href="{{ route('users.index') }}">
                            {{ __('Users') }}
                        </a>
                    </li>
                    <!-- END Users -->
                @endisAdmin
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
                        <a class="nav-link" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </li>
                    @endif
                @endguest
                <!-- Authenticated WebApp User - Social Login / WebApp Logout -->
                @auth
                    <!-- User Settings -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if (auth()->user()->avatar)
                                <img src="{{ asset('storage/'.auth()->user()->avatar) }}" style="width: 40px; height: 40px; border-radius: 50%;">
                            @else
                            <span class="caret">
                                {{ Auth::user()->firstname }}
                            </span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</div>
