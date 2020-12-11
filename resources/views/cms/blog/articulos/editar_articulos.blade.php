@extends('cms')


@section('content')
<section class="seccion-crear-publicidad-cms">
	<div class="container-fluid">
		<h2 class="my-3">
			Crear Articulo
		</h2>
		@if(session('message'))
		  <div class="alert alert-success" role="alert">
		    {{session('message')}}
		  </div>
		@endif
		<form action="/cms/blog/actualizar/articulo/{{$articulo->id}}" class="col-12" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<h5>Titulo</h5>
				<input type="text" name="articulo_title" value="{{$articulo->title}}" placeholder="Titulo..." class="form-control">
			</div>
			<div class="form-group">
				<h5>Contenido</h5>
				<textarea class="ckeditor" id="content" required name="articulo_content">{{$articulo->content}}</textarea>
			</div>
			<div class="form-group">
				<h5>Keywords</h5>
				<input type="text" name="articulo_keywords" value="{{$articulo->keywords}}" placeholder="Keywords..." class="form-control">
			</div>
			<div class="form-group">
				<h5>Fecha</h5>
				<input type="date" name="articulo_date" value="{{$articulo->date}}" placeholder="Fecha..." class="form-control">
			</div>
			<div class="form-group">
				<h5>Categoria</h5>
				<select class="form-control" name="articulo_categoria">
					<option>Seleccion una categoria</option>
					@foreach($categorias as $categoria)
						<option value="{{$categoria->id}}" <?php if($categoria->id == $articulo->categoria->id) echo 'selected' ?> >{{$categoria->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<h5>Imagen</h5>
				<input type="file" name="article_picture">
			</div>
			<input type="submit" class="btn btn-primary mb-4" value="Actualizar Articulo">
		</form>
	</div>
</section>

<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

@endsection