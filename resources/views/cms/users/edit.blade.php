@extends('layouts.admin')

@php
    $section = 'usuarios';
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
<div class="py-1"></div>
<section class="seccion-crear-publicidad-cms">
	<div class="container-fluid">
		<h3 class="my-3 mt-4">
			Editar Usuario - <span class="text-muted"> {{ $user->name }}</span>
		</h3>
		<form action="{{ route('cms.users.update', $user->id ) }}" class="col-12" method="POST" enctype="multipart/form-data">
			@csrf
            <div class="row">
                <div class="col-12 col-md-4 form-group">
                    <h5>Nombre</h5>
                    <input type="text" name="name" value="{{$user->name}}" placeholder="Nombre del usuario" class="form-control">
                </div>
                <div class="col-12 col-md-4 form-group">
                    <h5>Correo</h5>
                    <input type="text" name="email" value="{{$user->email}}" placeholder="Correo del usuario" class="form-control">
                </div>
                <div class="col-12 col-md-4">
                    <label for="">Rol del usuario</label>
                    @php
                        $rol_user = $user->getRoleNames();
                    @endphp
                    <select class="form-control" name="roles">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" @if ($rol_user[0] == $role->name) selected @endif >{{ $role->name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-6 form-group">
                    <h5>Password</h5>
                    <input type="password" name="password" class="form-control" id="password" required disabled>
                </div>
                <div class="col-12 col-md-6 form-group">
                    <h5>Confirmar Password</h5>
                    <input type="password" class="form-control" id="password_validate" required disabled>
                </div>
                <div class="col-12 form-group">
                    <input class="check" type="checkbox" id="check" onclick="checkPassword()" name="passwordCheck">
                    <label>Editar password</label>
                </div>
            </div>
			<input type="submit" class="btn btn-primary my-4 px-5" value="Actualizar Usurario">
            <a class="btn btn-danger px-5" href="{{ route('cms.users.show') }}">Cancelar</a>
		</form>
	</div>
</section>

<script>
    const inputCheck = document.getElementById('check');
    const password = document.getElementById('password');
    const password_validate = document.getElementById('password_validate');

    function checkPassword(){
        if(inputCheck.checked == true){
            password.disabled = false;
            password_validate.disabled = false;
        }else{
            password.disabled = true;
            password_validate.disabled = true;
        }

    }

</script>


@endsection
