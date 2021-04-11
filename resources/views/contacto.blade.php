@extends('layouts.app')
@php
    $headerLinks="light";
    $logoNav1="dark";
    $logoNav2="dark";
    $bg_navbar = 'bg-white';
@endphp


@section('title')
 High Tech Bearings - Contacto
@endsection
<style>
    .container_iframe {
        position: relative;
        width: 100%;
        height: 100vh;
    }
    .iframe_revista {
        width: 100%;
        height: 100%;
    }
    .hidden1 {
        position: absolute;
        width: 98.6%;
        height: 8.5%;
        top: 0;
        background-color: #fff;
        z-index: 2;
        background-color: rgba(0,0,0,0.5);
    }
    .hidden2 {
        position: absolute;
        bottom: 0;
        left: 10%;
        z-index: 2;
        font-weight: bold;
    }
</style>

@section('content')
    <div class="container_iframe">
        <h1 class="hidden2">Valencia, Venezuela</h1>
        <iframe class="iframe_revista" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3927.05589626468!2d-67.94929743639743!3d10.176112153299782!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e8069feabcdab49%3A0x76227f404956a580!2sRolitec!5e0!3m2!1ses!2sve!4v1607953479169!5m2!1ses!2sve" width="100%" height="" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0">
        </iframe>
    </div>

    <section class="bg-light">
    <div class="container">
        <div class="row">
        <div class="col-md-6">
            <span class="eyebrow mb-1 text-primary">Ponte en contacto con nosotros</span>
            <h2>Estamos atentos a responderte cualquier duda que tengas.</h2>
        </div>
        </div>
        <div class="row">
        <div class="col">
            <form>
            <div class="form-row mb-1">
                <div class="col">
                <input type="text" class="form-control form-control-minimal" placeholder="Nombre*" required>
                </div>
                <div class="col">
                <input type="text" class="form-control form-control-minimal" placeholder="Correo*" required>
                </div>
                <div class="col">
                <input type="text" class="form-control form-control-minimal" placeholder="Teléfono de Contacto*" required>
                </div>
            </div>
            <div class="form-row mb-1">
                <div class="col">
                <textarea class="form-control form-control-minimal" id="exampleFormControlTextarea1" rows="3" placeholder="Tu Mensaje*" required></textarea>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="col">
                <button class="btn btn-primary px-5">Enviar</button>
                </div>
            </div>
            <div>
                <small class="text-muted mt-4">* Obligatorio</small>
            </div>
            </form>
        </div>
        </div>
    </div>
    </section>

@endsection
