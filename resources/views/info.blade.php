@extends('layouts.app')
@php
    $page='info';
    $headerLinks="light";
    $logoNav1="dark";
    $logoNav2="light";
    $bg_navbar = '';
    $productsInShoppingCar = session('shoppingCar');
    $productsInShoppingCar = json_decode($productsInShoppingCar);
    $amount=0;
    foreach ($productsInShoppingCar as $product) {
        $amount += ($product->quantity * $product->price);
    }
@endphp

@section('title')
        Finaliza tu compra | High Tech Bearings
@endsection

@section('content')
<section class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mt-5 mt-md-0">
                @auth
                    <span class="eyebrow mb-1 text-dark">¡Excelente! Ya puedes finalizar tu compra</span> <br>
                    <h2>Bienvenido {{ auth()->user()->name }}</h2>
                @else
                    <span class="eyebrow mb-1 text-dark">Registrarte con nosotros para concretar tu compra</span> <br>
                    <h2>Bienvenido</h2>
                @endauth
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-lg-7 pr-5 pl-3">

                <div class="row shadow-md p-4" style="background-color: #f2f2f2;border-radius:7px;">
                    <div class="col-12 text-center mb-4">
                        <img src="{{asset('svg/logo-'. $logoNav1 .'.svg')}}" alt="">
                    </div>
                    @auth
                        <div class="col-12 text-center mb-3" style="font-size: 1.2rem;">
                            Listo! Ahora puedes concretar tu compra
                        </div>
                        <a class="btn btn-primary col-sm-12" href="{{ route('order.create') }}">Finalizar compra</a>
                    @else
                        <div class="col-12 text-center mb-3" style="font-size: 1.2rem;">
                            Para continuar debes iniciar sesión
                        </div>
                        <a class="btn btn-link col-sm-6" href="{{ route('register') }}">Crear cuenta</a>
                        <a class="btn btn-primary col-sm-6" href="{{ route('login') }}">Iniciar sesión</a>
                    @endauth
                </div>

            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h3><strong>Resumen de tu compra</strong></h3>
                    </div>
                    <div class="col-12 px-3">
                        <div class="row justify-content-between text-muted mb-1">
                            <div class="col-auto">Subtotal</div>
                            <div class="col-auto">{{ $amount * 0.84 }} $USD</div>
                        </div>
                        <div class="row justify-content-between text-muted mb-1">
                            <div class="col-auto">IVA</div>
                            <div class="col-auto">{{ $amount * 0.16 }} $USD</div>
                        </div>
                        <div class="row justify-content-between mb-1" style="font-size: 1.25rem;">
                            <div class="col-auto">TOTAL</div>
                            <div class="col-auto text-lg">{{ $amount }} $USD</div>
                        </div>
                        <!-- <div class="row justify-content-between mb-1" style="font-size: 1.25rem;">
                            <div class="col-auto">Subtotal</div>
                            <div class="col-auto text-lg">{{ $amount }} $USD</div>
                        </div> -->
                        <div class="row py-1 justify-content-between shadow-md mt-2" style="background-color: #a2bd30;border-radius:5px;">
                            <div class="col-auto text-lg font-bold">{{ $amount }} $USD</div>
                            <div class="col-auto font-bold">Carrito de compras</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- <script>
    document.addEventListener("DOMContentLoaded", (event) => {
        
    });
</script> -->

@endsection
