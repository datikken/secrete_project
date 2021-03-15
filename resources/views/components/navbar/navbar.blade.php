<div class="navbar uk-shadow">
    <div class="uk-navbar uk-container">
        <div class="uk-navbar-left">
            <a class="navbar-link uk-flex-inline" href="{{ url('/') }}" data-turbolinks="false">
                <h3 class="navbar_logo">JSUX</h3>
            </a>
        </div>
        <div class="uk-navbar-right">

            <ul class="uk-navbar-nav uk-visible@m">
                @auth
                    <li class="navbar_list_item uk-flex">
                        <a href="{{ url('/dashboard') }}" data-turbolinks="true"
                           class="navbar_link">Dashboard
                        </a>
                    </li>
                    <li class="navbar_list_item uk-flex">
                        <a class="navbar_link" data-logout data-href="{{ route('logout') }}">
                            {{ __('Log out') }}
                        </a>
                    </li>
                @else
                    <li class="uk-flex">
                        <a href="{{ route('login') }}" data-turbolinks="true" class="text-sm text-gray-700 underline navbar_link">Login</a>
                    </li>

                    @if (Route::has('register'))
                        <li class="uk-flex">
                            <a href="{{ route('register') }}" data-turbolinks="true"
                               class="uk-button uk-button-default ml-4 text-sm text-gray-700 underline">Register</a>
                        </li>
                    @endif
                @endauth
            </ul>

            <div id="offcanvas-nav-primary" uk-offcanvas="overlay: true">
                <div class="uk-offcanvas-bar uk-flex uk-flex-column">
                    <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
                        <li class="uk-active"><a href="#">Active</a></li>
                        <li class="uk-parent">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>
                        <li class="uk-nav-header">Header</li>
                        <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Item</a></li>
                        <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Item</a>
                        </li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Item</a></li>
                    </ul>

                </div>
            </div>

            <div id="offcanvas-nav" uk-offcanvas="overlay: true">
                <div class="uk-offcanvas-bar">

                    <ul class="uk-nav uk-nav-default">
                        <li class="uk-active"><a href="#">Active</a></li>
                        <li class="uk-parent">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>
                        <li class="uk-nav-header">Header</li>
                        <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: table"></span> Item</a></li>
                        <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: thumbnails"></span> Item</a>
                        </li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Item</a></li>
                    </ul>

                </div>
            </div>

            {{--            @else--}}
            {{--            @endguest--}}
        </div>
    </div>
</div>

{{--<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">--}}
{{--    <div class="container-fluid d-flex justify-space-between">--}}

{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"--}}
{{--                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">--}}
{{--            <div class="d-flex justify-content-between align-items-lg-center flex-column flex-lg-row">--}}
{{--                <form class="d-flex mb-2 mb-lg-0">--}}
{{--                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                    <button class="btn btn-outline-success" type="submit">Search</button>--}}
{{--                </form>--}}

{{--                <ul class="navbar-nav mb-lg-0 ms-lg-3 mb-1">--}}
{{--                    @guest--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="btn btn-light nav-item" href="{{ route('login') }}">--}}
{{--                                {{ __('Login') }}--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="btn btn-light nav-item ms-lg-1" href="{{ route('register') }}">--}}
{{--                                {{ __('Register') }}--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @else--}}
{{--                        <li class="nav-item">--}}
{{--                            <div class="dropdown">--}}
{{--                                <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton"--}}
{{--                                        data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                    {{ Auth::user()->name }}--}}
{{--                                </button>--}}
{{--                                <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton">--}}
{{--                                    <li>--}}
{{--                                        <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                           onclick="event.preventDefault();--}}
{{--                                           document.getElementById('logout-form').submit();">--}}
{{--                                            {{ __('Logout') }}--}}
{{--                                        </a>--}}
{{--                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                        </form>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endguest--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}
