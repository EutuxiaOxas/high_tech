@extends('layouts.app')
@php
    $headerLinks="light";
    $logoNav1="dark";
    $logoNav2="dark";
    $bg_navbar = '';
@endphp

@section('title')
 High Tech Bearings - Nosotros
@endsection

@section('head') 
    <link rel="canonical" href="https://www.hightechinternational.net/nosotros" />
    <meta name="robots" content="index,follow"/>

    <!-- Primary Meta Tags -->
    <meta name="title" content="High Tech Bearings - Nosotros">
    <meta name="description" content="Rodamientos en Valencia, más sobre nosotros - High Tech Bearings">
    <meta name="keywords" content="rodamientos en valencia">

    <!-- Open Graph para Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="High Tech Bearings - Nosotros" />
    <meta property="og:url" content="https://www.hightechinternational.net/nosotros" />
    <meta property="og:image" content="{{ asset( 'home.png' ) }}" />
    <meta property="og:description" content="Rodamientos en Valencia, más sobre nosotros - High Tech Bearings" />
    <meta property="og:site_name" content="High Tech Bearings" />
@endsection

@section('content')

{{-- Blog --}}
@include('nosotros.sections.hero')
{{-- End Blog --}}

{{-- Caracteristicas --}}
@include('nosotros.sections.features')
{{-- End Caracteristicas --}}

{{-- galeria --}}
@include('nosotros.sections.galeria')
{{-- End galeria --}}

{{-- CallToAction --}}
@include('components.cta')
{{-- End CallToAction --}}

@endsection
