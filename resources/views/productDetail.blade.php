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

</style>
@section('content')

<section class="container-fluid px-3">
    <div class="row">
        <!-- Product Detail -->
        <div class="col-9">
            <div class="row card_product align-items-center mb-0">
                <div class="col-12 img_product_card mb-3">
                        <img class="img_product" src="/productos_imagen/{{$producto->imagen}}" alt="">
                </div>
                <div class="col-12">
                    <h1 class="">{{$producto->titulo}}</h1>
                </div>
                <div class="col-12 px-4">
                    <div class="row mb-1">
                        <p class="">
                            {{$producto->descripcion}}
                        </p>
                    </div>
                    <div class="row mb-1">
                        <span class=""><a href="/categorias/{{$producto->categoria->slug}}">{{$producto->categoria->category}}</a></span>
                    </div>
                </div>
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
