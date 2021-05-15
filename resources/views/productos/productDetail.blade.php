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

<style>
    .img_product_card{
        display: flex;
        flex-direction:row;
	    justify-content: center;
	    align-items: center;
        max-height: 65vh;
        min-height: 65vh;
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
    .rounded-full{
        border-radius: 50%;
    }
    .shadow-md{
        box-shadow:0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .text-sm{
        font-size: 0.875rem;
line-height: 1.25rem;
    }
    .text-lg{
        font-size: 1.125rem;
line-height: 1.75rem;
    }
    .text-xl{
        font-size: 1.25rem;
line-height: 1.75rem;
    }
    .text-2xl{
        font-size: 1.5rem;
line-height: 2rem;
    }
    .text-3xl{
        font-size: 1.875rem;
line-height: 2.25rem;
    }
    .text-4xl{
        font-size: 2.25rem;
line-height: 2.5rem;
    }
    .font-light{
        font-weight: 300;
    }
    .font-semibold{
        font-weight: 500;
    }
</style>
@section('content')

<section class="container-fluid px-3">
    <div class="row mb-0">
        <!-- Product Detail -->
        <div class="col-6">
            <div class="row card_product align-items-center mb-0">
                <div class="col-12 img_product_card mb-3">
                    <img class="img_product" src="{{ Storage::url($producto->imagen) }}" alt="">
                </div>

            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <h1 class="font-light">{{$producto->titulo}}</h1>
                </div>
                <div class="col-6 mt-1">
                    Código Universal:
                    <strong>
                         {{ $producto->codigo_universal }}
                    </strong>
                </div>
                <div class="col-6 text-right px-4 mt-1">
                    <small class="rounded-full shadow-md py-1 px-3" style="background-color: #{{$producto->categoria->category_color}};">
                        <a class="text-white" href="/categorias/{{$producto->categoria->slug}}">{{$producto->categoria->category}}</a>
                    </small>
                </div>
                <div class="col-12">
                    <span class="text-4xl font-light">
                        {{ $producto->precio }} $USD
                    </span>
                </div>

                <div class="col-12"></div>

            </div>
            <div class="row">
                <div class="col-12 text-2xl">
                    Parámetros:
                </div>
                <div class="col-12">
                    <div class="row">
                        @if ( $producto->categoria->category == 'Serie Automotriz' )
                            <div class="col-6 mb-1">
                                <span class="font-semibold text-lg">Articulo: </span> <br>
                                <span class="text-muted">{{ $producto->auto->articulo }}</span>
                            </div>
                            <div class="col-6 mb-1">
                                <span class="font-semibold text-lg">Posición de la rueda: </span> <br>
                                <span class="text-muted">{{ $producto->auto->posicion->posicion }}</span>
                            </div>
                            <div class="col-12">
                                <span class="font-semibold text-lg">Aplicación: </span> <br>
                                <span class="text-muted">{{ $producto->auto->aplicacion }}</span>
                            </div>
                            <div class="col-12">

                                <hr>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 font-semibold text-xl">
                                        Medidas: {{ $producto->auto->d_interno }}x{{ $producto->auto->d_externo }}x{{ $producto->auto->espesor }}mm
                                    </div>
                                    <div class="col-4">
                                        <span class="font-semibold text-lg">Diametro interno: </span> <br>
                                        <span class="text-muted">{{ $producto->auto->d_interno }} mm</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="font-semibold text-lg">Diametro externo: </span> <br>
                                        <span class="text-muted">{{ $producto->auto->d_externo }} mm</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="font-semibold text-lg">Espesor: </span> <br>
                                        <span class="text-muted">{{ $producto->auto->espesor }} mm</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6"></div>

                        @elseif( $producto->categoria->category == 'Serie Chumacera' )
                        {{ $producto->chumacera() }}
                        @elseif( $producto->categoria->category == 'Serie cadenas' )
                        {{ $producto->cadena() }}
                        @elseif( $producto->categoria->category == 'Serie 6000' )
                        {{ $producto->serie6000() }}
                        @else
                        {{ $producto->moto() }}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row mb-1">
        <div class="col-12">
            <h4 class="text-dark mb-2">Descripcion del producto</h4>
        </div>
        <div class="col-12">
            <p class="text-muted">
                {{$producto->descripcion}}
            </p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-10">

        </div>
    </div>
</section>




@endsection
