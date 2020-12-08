<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="es">
  <head>

    {{-- metas  --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- titulo  --}}
    <title>@yield('title')</title>

    {{-- global css  --}}
    <link rel="stylesheet" href="/go/app/assets/css/vendor.css" />
    <link rel="stylesheet" href="/go/app/assets/css/style.css" />
  </head>
  <body>

    {{-- header --}}
    @include('components.header')
    {{-- contenido --}}
    @yield('content')
    {{-- footer --}}
    @include('components.footer')

    {{-- global Js  --}}
    <script src="/go/app/assets/js/vendor.js"></script>
    <script src="/go/app/assets/js/app.js"></script>

  </body>
</html>