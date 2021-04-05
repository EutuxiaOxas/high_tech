@extends('layouts.app')
@php
    $headerLinks="light";
    $logoNav1="dark";
    $logoNav2="dark";
@endphp

@section('title')
 Productos de High Tech Bearings
@endsection


@section('content')
    <section class="container-fluid px-3">
        <div class="row mb-1">
            <div class="col-12">
                <!-- Search Input -->
                <form action="{{route('vitrina')}}">
                    <div class="row mb-1">

                        <div class="col-7">
                            <div class="input-group">
                                <input type="search" class="form-control" name="search" placeholder="Buscar productos" aria-label="Buscar productos" aria-describedby="basic-addon2">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                @if ($slug == 'serie-automotriz')
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Rueda Delantera</option>
                                        <option>Rueda Delantera Interna</option>
                                        <option>Rueda Delantera Externa</option>
                                        <option>Rueda Trasera</option>
                                        <option>Rueda Trasera Interna</option>
                                        <option>Rueda Trasera Externa</option>
                                    </select>
                                @elseif($slug == 'serie-6000')
                                @elseif($slug == 'serie-moto')
                                @elseif($slug == 'chumaceras')
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Tipo Brida</option>
                                        <option>Tipo Puente</option>
                                        <option>Tipo Tensora</option>
                                    </select>
                                @elseif($slug == 'serie-cadenas')
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Cadena Simple</option>
                                        <option>Cadena Doble</option>
                                        <option>Cadena Triple</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div class="col-2">
                            <input type="submit" class="input-group-text bg-primary text-white px-5" id="basic-addon2" value="Buscar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <!-- Otras Categorias -->
            <div class="col-md-2">
                <div class="card card-minimal mb-2">
                    <a href="/categorias/serie-automotriz" class="card-img-container">
                        <img class="card-img" src="/imagenes/series_logos/automotriz.png" alt="Card image cap">
                    </a>
                </div>
                <div class="card card-minimal mb-2">
                    <a href="/categorias/serie-6000" class="card-img-container">
                        <img class="card-img" src="/imagenes/series_logos/6000.png" alt="Card image cap">
                    </a>
                </div>
                <div class="card card-minimal mb-2">
                    <a href="/categorias/serie-moto" class="card-img-container">
                        <img class="card-img" src="/imagenes/series_logos/moto.png" alt="Card image cap">
                    </a>
                </div>
                <div class="card card-minimal mb-2">
                    <a href="/categorias/chumaceras" class="card-img-container">
                        <img class="card-img" src="/imagenes/series_logos/chumacera.png" alt="Card image cap">
                    </a>
                </div>
                <div class="card card-minimal mb-2">
                    <a href="/categorias/serie-cadenas" class="card-img-container">
                        <img class="card-img" src="/imagenes/series_logos/cadenas.png" alt="Card image cap">
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                {{-- Cantidad de productos encontrados --}}
                <div class="row mb-1">
                    <strong>( 34 )</strong> Productos encontrados
                </div>
                <!-- Listado de Productos -->
                <div class="row">
                    @foreach($productos as $producto)
                        @include('common.card_product')
                    @endforeach
                </div>
                {{$productos->appends(request()->input())->links()}}
                <!-- Productos relacionados -->
                <div class="row">
                    <h5>Productos Realcionados</h5>
                    @foreach($other_products as $producto)
                        @include('common.card_product')
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
                @include('common.navbar_rigth_product')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <!-- CTA -->
                <div class="boxed bg-primary p-5">
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
