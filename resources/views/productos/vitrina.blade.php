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

    .img_product_card{
        max-height: 20vh;
        min-height: 20vh;
        max-width:100%;

        border-radius: 5px 5px 0 0;
        overflow: hidden;
    }
    .img_product{
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        overflow: hidden;

        min-height: 20vh;
        max-height: 20vh;
        min-width: auto;
        max-width: 100%;
    }

</style>
    <section class="container-fluid px-1 px-md-2">
        {{-- Filtro --}}
        <div class="row mb-1">
            <div class="col-12 mb-0 mt-7 mt-md-0">
                {{-- Navbar Left --}}
                @include('productos.sections.breadcrumbs')
                {{-- End Navbar Left --}}
            </div>
            <div class="col-12 mt-2">
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
            <div class="col-md-8 col-lg-7 px-0 px-md-1">
                {{-- Cantidad de productos encontrados --}}
                <div class="mb-1 px-1">
                    <span>
                        <strong>({{ $total_products }})</strong>
                        Productos encontrados
                    </span>
                    @isset ($search)
                        <span>
                            para la busqueda &nbsp
                            <span class="text-muted"> {{ $search }} </span>
                        </span>
                    @endisset
                </div>
                <!-- Listado de Productos -->
                <div class="container-fluid">
                    <div class="row justify-content-center">

                        @if ( $total_products > 0)
                            @foreach($productos as $producto)
                                @include('common.card_product')
                            @endforeach
                        @else
                            <div class="text-center text-danger mt-4">
                                No hay productos para esta busqueda.
                            </div>
                        @endif
                    </div>

                </div>
                <div class="row justify-content-center">
                    @if( $total_products > 0 )
                        {{ $productos->appends(request()->input())->links() }}
                    @endif
                </div>
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
