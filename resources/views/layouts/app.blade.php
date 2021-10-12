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

  <style>
    .badge_shopping_car {
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
      .badge_shopping_car {
        bottom: 10px !important;
        right: -10px;
      }
    }

    .selecselect_modal {
      width: 75px;
      border-radius: 2px;
      border: solid 1px #555;
      font-size: 1rem;
      font-weight: 500;
    }

    .shadow-md {
      box-shadow: 0px 2px 7px 0px rgba(135, 135, 135, 0.75);
      -webkit-box-shadow: 0px 2px 7px 0px rgba(135, 135, 135, 0.75);
      -moz-box-shadow: 0px 2px 7px 0px rgba(135, 135, 135, 0.75);
    }

    #message_success {
      position: fixed;
      bottom: 25px;
      left: -55px;
      background-color: #222;
      font-size: 1rem;
      width: 220px;
      padding: 0.75rem 1.25rem;
      border-radius: 7px;
      z-index: 1750;
      color: #fff;
      text-align: center;
      -webkit-box-shadow: 0px 3px 8px 1px rgba(0, 0, 0, 0.29);
      box-shadow: 0px 3px 8px 1px rgba(0, 0, 0, 0.29);
      visibility: hidden;
      opacity: 0.5;
    }

    .transitionClean {
      left: 7.5vw !important;
      transition: all 1s !important;
    }
    .text-second{
      color: #000;
    }
  </style>
  @yield('head')
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

  <!-- Producto Agregado al carrito -->
  <div id="message_success"></div>

  {{-- global Js  --}}
  <script src="/go/app/assets/js/vendor.js"></script>
  <script src="/go/app/assets/js/app.js"></script>

  <script src="{{ asset('js/shoppingCar.js') }}"></script>

  <!-- Script para guardar nuevo suscriptor -->
  <script>
    const buttonSubmitSubscriber = document.getElementById('buttonSubmitSubscriber')

    if(buttonSubmitSubscriber){
      buttonSubmitSubscriber.addEventListener('click', function() {
        let messageSuccess = document.getElementById('message_success')
        const inputSubscriber = document.getElementById('inputSubscriber').value;
        
        if(inputSubscriber != ''){
          axios({
            method: 'GET',
            url: '/subscriber/' + inputSubscriber,
            headers: {
              'content-type': 'application/json'
            }
          })
          .then((res) => {
            console.log(res)
            console.log(res.data)
            messageSuccess.innerHTML = res.data;
            messageSuccess.style.visibility = "visible";
            messageSuccess.style.opacity = "1";
            messageSuccess.classList.add('transitionClean');
            setTimeout(hiddenMessageAddProduct,3000);
            function hiddenMessageAddProduct(){
                messageSuccess.style.opacity = "0";
                messageSuccess.style.visibility = "hidden";
                messageSuccess.classList.remove('transitionClean');
            }
          })
          .catch((err) => {
            console.log(err)
          });
        }
      })
    }

  </script>

</body>

</html>