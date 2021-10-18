@extends('layouts.app')
@php
    $headerLinks="dark";
    $logoNav1="light";
    $logoNav2="dark";
    $bg_navbar = '';
@endphp

@section('title') High Tech Bearings @endsection
@section('head') 
    <link rel="canonical" href="https://www.hightechinternational.net/" />
    <meta name="robots" content="index,follow"/>

    <!-- Primary Meta Tags -->
    <meta name="title" content="High Tech Bearings">
    <meta name="description" content="Rodamientos en Valencia - High Tech Bearings">
    <meta name="keywords" content="Rodamientos en venezuela">

    <!-- Open Graph para Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="High Tech Bearings" />
    <meta property="og:url" content="https://www.hightechinternational.net/" />
    <meta property="og:image" content="{{ asset( 'home.png' ) }}" />
    <meta property="og:description" content="Rodamientos en Valencia - High Tech Bearings" />
    <meta property="og:site_name" content="High Tech Bearings" />
@endsection

@section('content')

{{-- Banner Principal--}}
@include('home.sections.banner_principal')
{{-- End Banner Principal --}}

{{-- Carousel Series --}}
@include('home.sections.carousel_series')
{{-- End Carousel Series --}}

{{-- Products --}}
@include('home.sections.products')
{{-- End Products --}}

{{-- Informacion General --}}
@include('home.sections.general_info')
{{-- End Informacion General --}}

{{-- Prugeuntas Frecunetes --}}
@include('home.sections.faq')
{{-- End Preguntas Frecuentes --}}

{{-- Blog --}}
@include('home.sections.blog')
{{-- End Blog --}}

{{-- Social lateral --}}
{{-- @include('components.social_lateral') --}}
{{-- End Social lateral --}}

@endsection
