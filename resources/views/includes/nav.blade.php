<nav class="navbar navbar-expand navbar-light navbar-laravel-light">
    <div class="container">

        <h1>
            <a class="navbar-brand" href="{{route('root')}}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </h1>

        <div class="attr-nav">
        @guest
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-secondary" id='nav-login' href="{{ route('login') }}">{{ __('Login') }}</a>
            {{-- <a href="{{ route('login') . '?previous=' . Request::fullUrl() }}">
                    Login
            </a> --}}
                </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link btn btn-secondary" id='nav-register' href="{{ route('register') }}">
                        {{-- {{ __('Register') }} --}}Sign Up
                    </a>
                </li>
            @endif
            </ul>
        @else
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span id="accountName">{{ Auth::user()->name }}</span>
                        <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">
                            Account
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                        >
                        {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class=".d-none">
                            @csrf
                            {{--  --}}
                            {{-- Pass current url  --}}
                                <input type="hidden" name="previous" value="{{ URL::full() }}">
                            {{--  --}}
                        </form>
                    </div>
                </li>
            </ul>
        @endguest
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-sm navbar-dark navbar-laravel-dark">
    <div class="container">
        <hr>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            {{-- <ul class="navbar-nav mr-auto"> --}}
            {{-- <ul class="navbar-nav ml-auto"> --}}
            <ul class="navbar-nav nav-fill ml-auto mr-auto" style="width: 100%!important;">
                {{-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li> --}}

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{route('about')}}" id="aboutDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        About
                    </a>
                    <div class="dropdown-menu" aria-labelledby="aboutDropdown">
                        <a class="dropdown-item" href="{{route('about')}}">
                            <i class="fas fa-info"></i> About topics
                        </a>
                        <a class="dropdown-item" href="{{route('about.history')}}">
                            <i class="fas fa-history"></i> History
                        </a>
                        <a class="dropdown-item" href="{{route('about.team')}}">
                            <i class="fas fa-users"></i> Team
                        </a>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('restaurants.index')}}" >
                        Restaurants
                    </a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="{{route('support')}}" id="supportDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Support
                    </a>
                    <div class="dropdown-menu" aria-labelledby="supportDropdown">
                        <a class="dropdown-item" href="{{route('support')}}">
                            <i class="fas fa-life-ring"></i> Support topics
                        </a>
                        <a class="dropdown-item" href="{{route('support.contact')}}">
                            <i class="fas fa-envelope"></i> Contact
                        </a>
                        <a class="dropdown-item" href="{{route('support.faqs')}}">
                            <i class="fas fa-question"></i> FAQs
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="{{route('legal')}}" id="legalDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Legal
                    </a>
                    <div class="dropdown-menu" aria-labelledby="legalDropdown">
                        <a class="dropdown-item" href="{{route('legal')}}">
                            <i class="fas fa-handshake"></i> Legal topics
                        </a>
                        <a class="dropdown-item" href="{{route('legal.terms')}}">
                            <i class="fas fa-file-contract"></i> T&Cs
                        </a>
                        <a class="dropdown-item " href="{{route('legal.privacy')}}">
                            <i class="fas fa-lock"></i> Privacy Policy
                        </a>
                        <a class="dropdown-item" href="{{route('legal.cookie')}}">
                            <i class="fas fa-cookie"></i> Cookie Policy
                        </a>
                    </div>
                </li>
                {{-- <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Search
                        </a>
                    <div class="dropdown-menu" aria-labelledby="searchDropdown">
                        <div class="container">
                            @include('includes.searchForm')
                        </div>
                    </div>
                </li> --}}
            </ul>

        </div>
        <div class='d-sm-none'>
                @include('includes.searchForm')
        </div>


    </div>
</nav>
