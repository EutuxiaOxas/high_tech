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

{{-- galeria --}}
@include('contacto.sections.mapa')
{{-- End galeria --}}

{{-- CallToAction --}}
@include('contacto.sections.formulario')
{{-- End CallToAction --}}

@endsection
