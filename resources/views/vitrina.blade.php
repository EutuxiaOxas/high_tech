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
    <section class="container-fluid px-3">
        {{-- Filtro --}}
        <div class="row mb-1">
            <div class="col-12">
                <span>
                    <a href="{{route('products')}}">
                        Productos
                    </a>
                    @if (isset($slug))
                    ->
                        @switch($slug)
                            @case('serie-automotriz')
                            <a href="/categorias/serie-automotriz">
                                Serie Automotriz
                            </a>
                                @break
                            @case('serie-6000')
                            <a href="/categorias/serie-6000">
                                Serie 6000
                            </a>
                                @break
                            @case('serie-moto')
                            <a href="/categorias/serie-moto">
                                Serie Moto
                            </a>
                                @break
                            @case('chumaceras')
                            <a href="/categorias/chumaceras">
                                Chumaceras
                            </a>
                                @break
                            @case('serie-cadenas')
                                <a href="/categorias/serie-cadenas">
                                    Serie Cadenas
                                </a>
                                @break
                            @default

                        @endswitch

                    @else

                    @endif
                </span>
            </div>
            <div class="col-12 mt-3">
                <!-- Search Input -->
                <form action="{{route('products.search.filter')}}">
                    <div class="row mb-1">

                        <div class="col-7">
                            <div class="input-group">
                                <input type="search" class="form-control" name="search" placeholder="Buscar productos" aria-label="Buscar productos" aria-describedby="basic-addon2">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                @if(isset($slug))
                                    @if ($slug == 'serie-automotriz')
                                        <select class="form-control" name="rueda">
                                            @foreach ($posicion_rueda as $posicion)
                                                <option value="{{ $posicion->id }}">{{ $posicion->posicion }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="auto" value="auto">
                                        <input type="hidden" name="category_id" value="1">
                                    @elseif($slug == 'serie-6000')
                                        <select class="form-control" name="tipo_sello">
                                            @foreach ($tipo_sello as $sello)
                                                <option value="{{ $sello->id }}">{{ $sello->tipo_sello }} </option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="6000" value="6000">
                                        <input type="hidden" name="category_id" value="2">
                                    @elseif($slug == 'serie-moto')
                                        <select class="form-control" name="tipo_sello">
                                            @foreach ($tipo_sello as $sello)
                                                <option value="{{ $sello->id }}">{{ $sello->tipo_sello }} </option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="moto" value="moto">
                                        <input type="hidden" name="category_id" value="3">
                                    @elseif($slug == 'chumaceras')
                                        <select class="form-control" name="tipo_brida">
                                            @foreach ($tipo_chum as $chum)
                                                <option value="{{ $chum->id }}">{{ $chum->tipo_chum }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="chumaceras" value="chumaceras">
                                        <input type="hidden" name="category_id" value="4">
                                    @elseif($slug == 'serie-cadenas')
                                        <select class="form-control" name="tipo_cadena">
                                            @foreach ($tipo_cadena as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->tipo_cadena_texto }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="cadenas" value="cadenas">
                                        <input type="hidden" name="category_id" value="5">
                                    @endif
                                @else
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="no_slug" value="1">
                                @endif

                            </div>
                        </div>
                        <div class="col-2">
                            <input type="submit" class="input-group-text bg-info text-white px-5" id="basic-addon2" value="Buscar">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Main --}}
        <main class="row">
            <!-- Otras Categorias -->
            <div class="col-md-2">
                @foreach ($categories as $category)
                    <div class="card card-minimal mb-2">
                        <a href="/categorias/{{ $category->slug }}" class="card-img-container">
                            <img class="card-img" src="{{ Storage::url($category->imagen) }}" alt="{{ $category->category }}">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-md-7">
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
            <div class="col-md-3">
                @include('common.navbar_rigth_product')
            </div>
        </main>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <!-- CTA -->
                <div class="boxed bg-info p-2 p-lg-5">
                    <div class="row justify-content-between align-items-center text-center text-md-left">
                    <div class="col-md-3">
                        <h3 class="text-white">CTA.</h3>
                    </div>
                    <div class="col-md-6">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="col-md-3 text-lg-right">
                        <a href="" class="btn btn-dark btn-rounded px-5">Write Us</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
