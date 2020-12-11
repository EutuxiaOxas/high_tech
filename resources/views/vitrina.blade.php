@extends('layouts.app')

@section('title')
 Productos de High Tech Bearings
@endsection


@section('content')
    <section class="container-fluid px-3">
        <div class="row">
            <!-- Otras Categorias -->
            <div class="col-2">
                <div class="card card-minimal mb-2">
                    <a href="" class="card-img-container">
                        <img class="card-img" src="/imagenes_pagina/01.jpg" alt="Card image cap">
                    </a>
                </div>
                <div class="card card-minimal mb-2">
                    <a href="" class="card-img-container">
                      <img class="card-img" src="/imagenes_pagina/02.jpg" alt="Card image cap">
                    </a>
                </div>
                <div class="card card-minimal mb-2">
                    <a href="" class="card-img-container">
                        <img class="card-img" src="/imagenes_pagina/03.jpg" alt="Card image cap">
                    </a>
                </div>
            </div>
            <div class="col-7">
                <!-- Search Input -->
                <form action="{{route('vitrina')}}">
                    <div class="row mb-1">
                        <div class="input-group mb-3">
                            <input type="search" class="form-control" name="search" placeholder="Buscar productos" aria-label="Buscar productos" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                              <input type="submit" class="input-group-text bg-primary text-white" id="basic-addon2" value="Buscar">
                            </div>
                        </div>    
                    </div>
                </form>                
                <!-- Filtros -->
                <div class="row mb-1">

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
            <div class="col-3">
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