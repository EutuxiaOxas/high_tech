@extends('cms')

@php
    $section = 'roles';
@endphp
<style>
    .pointer{
        cursor: pointer;
    }
    .check{
        padding: 1rem;
        width: 16px;
        height: 16px;
        cursor: pointer;
    }
</style>

@section('content')
<div class="container pt-4">
    <div class="row">
        <div class="col-6">
            Crear Rol
        </div>
    </div>
    <div class="row">
        <form action="{{ route('cms.role.store') }}" method="POST">
            @csrf
            <label for="name">Nombre del rol</label>
            <input type="text" name="name" id="name">
            <hr>
            <button class="btn btn-primary" type="submit">Crear</button>
        </form>
    </div>
</div>

@endsection
