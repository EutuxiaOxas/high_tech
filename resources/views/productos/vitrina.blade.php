@extends('layouts.app')
@php
    $headerLinks="light";
    $logoNav1="dark";
    $logoNav2="dark";
    $bg_navbar = '';
@endphp

@section('title')
 Productos de High Tech Bearings
@endsection


@section('content')
<style>
    .shadow-md{
        box-shadow:0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .img_product_card{
        max-height: 20vh;
        min-height: 20vh;
        max-width:100%;

        border-radius: 5px 5px 0 0;
        overflow: hidden;
    }
    .img_product{
        border-radius: 5px;
        min-height: auto;
        max-height: 100%;
        min-width: auto;
        max-width: 100%;
    }

</style>
    <section class="container-fluid px-3">
        {{-- Filtro --}}
        <div class="row mb-1">
            <div class="col-12 mb-0 mt-7 mt-md-0">
                {{-- Navbar Left --}}
                @include('productos.sections.breadcrumbs')
                {{-- End Navbar Left --}}
            </div>
            <div class="col-12 mt-3">
                {{-- Navbar Left --}}
                @include('productos.sections.search')
                {{-- End Navbar Left --}}
            </div>
        </div>

        {{-- Main --}}
        <main class="row">
            <!-- Otras Categorias -->
            <div class="col-md-2 d-none d-lg-block">
                {{-- Navbar Left --}}
                @include('productos.sections.navbar_left')
                {{-- End Navbar Left --}}
            </div>
            <div class="col-md-8 col-lg-7">
                {{-- Cantidad de productos encontrados --}}
                <div class="row mb-1">
                    <strong>( {{ $total_products }} )</strong> Productos encontrados
                    @isset ($search)
                        para la busqueda <span>{{ $search }}</span>
                    @endisset
                </div>
                <!-- Listado de Productos -->
                <div class="row px-2">
                    @foreach($productos as $producto)
                        @include('common.card_product')
                    @endforeach
                </div>
                {{$productos->appends(request()->input())->links()}}
                <!-- Productos relacionados -->
                {{-- <div class="row">
                    <h5>Productos Realcionados</h5>
                    @foreach($other_products as $producto)
                        @include('common.card_product')
                    @endforeach
                </div> --}}
            </div>
            <div class="col-md-4 col-lg-3">
                @include('common.navbar_rigth_product')
            </div>
        </main>

        {{-- Navbar Left --}}
        @include('productos.sections.cta')
        {{-- End Navbar Left --}}

    </section>

@endsection
