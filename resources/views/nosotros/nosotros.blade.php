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
@include('nosotros.sections.cta')
{{-- End CallToAction --}}

@endsection
