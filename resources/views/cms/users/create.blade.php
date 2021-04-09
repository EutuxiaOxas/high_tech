@extends('cms')

@php
    $section = 'usuarios';
@endphp

@section('content')
<section class="seccion-crear-publicidad-cms">
	<div class="container-fluid">
		<h3 class="my-3 mt-4">
			Crear Usuario
		</h3>
		@if(session('message'))
		  <div class="alert alert-success alert-dismissible" role="alert">
		    {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
		  </div>
		@endif
		<form action="{{ route('cms.users.store') }}" class="col-12" method="POST" enctype="multipart/form-data">
			@csrf
            <div class="row">
                <div class="col-12 col-md-4 form-group">
                    <h5>Nombre</h5>
                    <input type="text" name="name" placeholder="Nombre del usuario" class="form-control" required>
                </div>
                <div class="col-12 col-md-4 form-group">
                    <h5>Correo</h5>
                    <input type="text" name="email" placeholder="Correo del usuario" class="form-control" required>                </div>
                <div class="col-12 col-md-4">
                    <label for="">Rol del usuario</label>
                    <select class="form-control" name="roles" required>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-6 form-group">
                    <h5>Password</h5>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="col-12 col-md-6 form-group">
                    <h5>Confirmar Password</h5>
                    <input type="password" class="form-control" required>
                </div>
            </div>
			<input type="submit" class="btn btn-primary my-4 " value="Crear Usurario">
		</form>
	</div>
</section>

@endsection
