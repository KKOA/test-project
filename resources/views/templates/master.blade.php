<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <title>{{ config('app.name', 'Laravel') }}
        @if(View::hasSection('title'))
            - @yield('title')
        @endif


    </title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    {{-- jQuery UI --}}
    {{-- <link rel="stylesheet" href="{{mix('css/jquery-ui.css')}}"> --}}
    @yield('style')
    @stack('style')


</head>
<body>
    <div id="app">
        {{-- @include('includes.nav') --}}
        <main class="py-4">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
    </div>


    <!-- Scripts -->
    <script src="{{mix('js/app.js')}}"></script>
    <!-- jQuery UI -->
    {{-- <script src="{{mix('js/jquery-ui.js')}}"></script> --}}

    @yield('script')
    @stack('script')

</body>
</html>
