@extends('layouts.admin')
@php
    $section = 'dashboard';
@endphp

@section('title') Mi Perfil - High Tech Bearings @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <span class="font-light text-xl">
                @role('buyer')
                    Mi perfil en High Tech Bearings
                @else
                    Administrador del sitio web
                @endrole
            </span>
        </div>
        <div class="col-12">
            <p class="text-muted" style="font-size:1.25rem;">
                {{ auth()->user()->name }} - {{ auth()->user()->email }} 
            </p>
        </div>
    </div>

    <div class="row px-3 mt-3">
        @if (session('info'))
            <div class="card border-success mb-3 col mr-4" style="max-width: 18rem;">
                <div class="card-header">Gracias!</div>
                <div class="card-body text-success">
                    <h5 class="card-title">{{ session('info') }}</h5>
                    <a class="btn btn-success px-5" href="{{ route('cms.purchases.show') }}">Ver mi compra</a>
                </div>
            </div>

            <script>
                // Elimino la compra del local storage porq ya se creo
                localStorage.removeItem('productsInShoppingCar');
            </script>
        @endif
        <div class="card border-primary mb-3 col" style="max-width: 18rem;">
            <div class="card-header">¡Bienvenido {{ auth()->user()->name }}!</div>
            <div class="card-body text-primary">
                <h5 class="card-title">Nos encanta tenerte aqui</h5>
                <p class="card-text">Puedes comunicarte con nosotros cuando lo desees. Estamos atentos en ayudarte</p>
            </div>
        </div>
        
    </div>



@endsection
