@extends('layouts.app')
@php
    $headerLinks="dark";
    $logoNav1="light";
    $logoNav2="dark";
    $bg_navbar = '';
@endphp

@section('title')
 High Tech Bearings
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

@endsection
