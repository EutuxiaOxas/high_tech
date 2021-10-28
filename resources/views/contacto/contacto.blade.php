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

@section('head') 
    <link rel="canonical" href="https://www.hightechinternational.net/contacto" />
    <meta name="robots" content="index,follow"/>

    <!-- Primary Meta Tags -->
    <meta name="title" content="High Tech Bearings - Contacto">
    <meta name="description" content="Rodamientos en Valencia, contáctanos - High Tech Bearings">
    <meta name="keywords" content="rodamientos industriales en valencia">

    <!-- Open Graph para Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="High Tech Bearings - Contacto" />
    <meta property="og:url" content="https://www.hightechinternational.net/contacto" />
    <meta property="og:image" content="{{ asset( 'home.png' ) }}" />
    <meta property="og:description" content="Rodamientos en Valencia, contáctanos - High Tech Bearings" />
    <meta property="og:site_name" content="High Tech Bearings" />
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
    @if (session('info'))
        <div class="alert alert-dark alert-dismissible fade show py-2 mb-0" role="alert" style="position: fixed; top: 100px; right: 10%;z-index:1000;background:#222;">
            <span class="text-white">{{ session('info') }}</strspanong>
            <button type="button" class="close text-white py-2" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

{{-- galeria --}}
@include('contacto.sections.mapa')
{{-- End galeria --}}

{{-- CallToAction --}}
@include('contacto.sections.formulario')
{{-- End CallToAction --}}

@endsection
