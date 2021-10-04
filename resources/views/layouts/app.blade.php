<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
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
    <link rel="stylesheet" href="/css/fuentes.css">
    <link rel="stylesheet" href="/css/estilos.css">

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> -->
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

  </head>
  <body>

    {{-- header --}}
    @include('common.header')
    {{-- contenido --}}
    @yield('content')
    {{-- Whatasapp --}}
    @include('common.whatsapp')
    {{-- footer --}}
    @include('common.footer')
    {{-- footer --}}
    @include('common.modal_shopping_car')

    {{-- global Js  --}}
    <script src="/go/app/assets/js/vendor.js"></script>
    <script src="/go/app/assets/js/app.js"></script>

    <script src="{{ asset('js/shoppingCar.js') }}"></script>

    <style>
        .badge_shopping_car{
            position: absolute;
            bottom: 5px;
            right: 0px;
            background-color: #a2bd30;
            color: #fff;
            padding: 3px 6.5px;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-content: center;
            align-items: center;
        }
        @media (max-width: 768px) {
          .badge_shopping_car{
            bottom: 10px !important;
            right: -10px;
          }
        }
        .selecselect_modal{
            width: 75px;
            border-radius: 2px;
            border: solid 1px #555;
            font-size: 1rem;
            font-weight: 500;
        }
        .shadow-md{
          box-shadow: 0px 2px 7px 0px rgba(135,135,135,0.75);
          -webkit-box-shadow: 0px 2px 7px 0px rgba(135,135,135,0.75);
          -moz-box-shadow: 0px 2px 7px 0px rgba(135,135,135,0.75);
        }
    </style>

  </body>
</html>
