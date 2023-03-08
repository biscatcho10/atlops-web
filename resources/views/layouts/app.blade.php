<!doctype html>
<html lang="ar">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('layouts.head')
    @yield('head_script')

    @livewireStyles
</head>

<body>

    @include('layouts.upperNavbar')

    @yield('content')
    @yield('categories')

    @include('layouts.lowerNavbar')

    @include('layouts.scripts')

    @yield('scripts')

    @livewireScripts
</body>

</html>
