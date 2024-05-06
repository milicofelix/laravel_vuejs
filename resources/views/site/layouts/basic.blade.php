<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('title')</title>
        <meta charset="utf-8">
        <link rel="stylesheet" tuype="text/css" href="{{asset('css/basic.css')}}" />
    </head>

    <body>
    @include('site.layouts.partials._top')
    @yield('content')
    </body>
</html>