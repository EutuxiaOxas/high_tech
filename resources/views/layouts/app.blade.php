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
    <link rel="stylesheet" href="/css/fuentes.css">

    <style>
        .navbar-logo{
            max-height: 140%!important;
        }
        .font-lg{
            font-size: 1.5rem;
        }
        .font-xl{
            font-size: 2rem;
        }
        /* .font_myriad{
            font-family: Myriadpro;
        } */
        .text_float{
            position: absolute;
            left:50%;
            text-align: center;
            top:50%;
            transform: translate(-50%, -50%);
            width: 100%;
            z-index: 10;
        }
        .button_whatsapp{
            position: fixed;
            bottom: 2.5rem;
            right: 1.5rem;
            width: 80px;
            z-index: 50;

        }
        .shadow_svg_whatsapp{
            box-shadow: 0px 2px 5px 0px rgba(0,0,0,1);
            -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,1);
            -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,1);
        }
    </style>
  </head>
  <body>

    {{-- header --}}
    @include('components.header')
    {{-- contenido --}}
    @yield('content')
    {{-- Whatasapp --}}
    @include('components.whatsapp')
    {{-- footer --}}
    @include('components.footer')

    {{-- global Js  --}}
    <script src="/go/app/assets/js/vendor.js"></script>
    <script src="/go/app/assets/js/app.js"></script>

  </body>
</html>
