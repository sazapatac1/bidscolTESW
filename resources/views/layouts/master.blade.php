<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title','BidsCol')</title>
    <!-- Styles -->
    <link href="{{ asset('css/customStyle.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet"/>
</head>
<body>
    <div id="app">
    <!-- Nav bar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                @lang('navbar.title')
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <!-- Future Left Side Links --> 
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Future authentication Links -->           
                <ul class="navbar-nav ml-auto">
                    <!-- Future Left Side Links --> 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('item.index', ['option' => 'all', 'id' => 0]) }}">@lang('navbar.items')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">@lang('navbar.about')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">@lang('navbar.contact')</a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->              
                <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('user.profile') }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
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
            </div>
        </div>
    </nav>
    <!-- End Nav bar -->
    <div class="container">
    <main class="py-4">
        @yield('content')
    </main>
    </div>
    @include('layouts.footer')
</body>

<!-- Scripts -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>