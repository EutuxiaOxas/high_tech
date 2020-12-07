@extends('cms')


@section('content')
<section class="seccion-crear-publicidad-cms">
	<div class="container-fluid">
		<h2 class="my-3">
			Crear Categoria
		</h2>
		@if(session('message'))
		  <div class="alert alert-success" role="alert">
		    {{session('message')}}
		  </div>
		@endif
		<form action="/cms/blog/actualizar/categoria/{{$categoria->id}}" class="col-12" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<h5>Titulo</h5>
				<input type="text" name="categoria_titulo" value="{{$categoria->name}}" placeholder="Titulo..." class="form-control">
			</div>
			<div class="form-group">
				<h5>descripción</h5>
				<textarea class="form-control" name="categoria_descripcion">{{$categoria->description}}</textarea>
			</div>
			<div class="form-group">
				<h5>Imagen</h5>
				<input type="file" name="categoria_imagen">
			</div>
			<input type="submit" class="btn btn-primary " value="Crear Categoria">
		</form>
	</div>
</section>


@endsection