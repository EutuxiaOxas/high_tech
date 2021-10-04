<!DOCTYPE html>
<!-- {{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}} -->
<html lang="es">
  <head>

    {{-- metas  --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('imagenes/favicon.png') }}">

    {{-- titulo  --}}
    <title>@yield('title')</title>

    {{-- global css  --}}
    <link rel="stylesheet" href="/go/app/assets/css/vendor.css" />
    <link rel="stylesheet" href="/go/app/assets/css/style.css" />
    <link rel="stylesheet" href="/css/estilos.css">
    @yield('header')
  </head>
  <body class="bg-light">

    {{-- contenido --}}
    @yield('content')

  </body>
</html>
