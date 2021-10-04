@extends('layouts.admin')

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
                Listado de Roles
            </div>
            <div class="col-6">
                <a class="btn btn-primary btn-sm" href="{{ route('cms.role.create') }}">_Nuevo</a>
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table tavle-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Role</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $rol)
                <tr>
                    <td>{{ $rol->id }}</td>
                    <td>{{ $rol->name }}</td>
                    <td width="20px">
                        <a class="btn btn-primary btn-sm" href="{{ route('cms.role.edit', $rol) }}">Editar</a>
                    </td>
                    <td width="20px">
                        <form action="{{ route('cms.role.destroy', $rol) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>

@endsection
