@extends('cms')
@php
    $section = 'blog';
@endphp


@section('content')
<section class="seccion-crear-publicidad-cms">
	<div class="container-fluid">
		<h2 class="my-3">
			Editar Categoria
		</h2>
		@if(session('message'))
		  <div class="alert alert-success" role="alert">
		    {{session('message')}}
		  </div>
		@endif
		<form action="/cms/blog/actualizar/categoria/{{$categoria->id}}" class="col-12" method="POST" enctype="multipart/form-data" id="formSubmit">
			@csrf
			<input type="hidden" id="blog_slug"  value="{{$categoria->slug}}" name="slug">
			<div class="form-group">
				<h5>Titulo</h5>
				<input type="text" name="categoria_titulo" value="{{$categoria->name}}" required id="blog_cat_title" placeholder="Titulo..." class="form-control">
			</div>
			<div class="form-group">
				<h5>descripción</h5>
				<textarea class="form-control" required name="categoria_descripcion">{{$categoria->description}}</textarea>
			</div>
			<div class="form-group">
				<h5>Imagen</h5>
				<input type="file" name="categoria_imagen">
			</div>
            <span class="loader align-middle" id="load"></span>
            @can('cms.blog.categories.update')
			<input type="submit" class="btn btn-primary px-5" value="Actualizar categoria" id="buttonAction">
            @endcan
            <a class="btn btn-danger px-5" href="{{ route('cms.blog.categories.show') }}">Cancelar</a>
		</form>
	</div>
</section>

<script type="text/javascript">
	function string_to_slug (str) {
	    str = str.replace(/^\s+|\s+$/g, ''); // trim
	    str = str.toLowerCase();

	    // remove accents, swap ñ for n, etc
	    var from = "àáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
	    var to   = "aaaaaeeeeiiiioooouuuunc------";

	    for (var i=0, l=from.length ; i<l ; i++) {
	        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
	    }

	    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
	        .replace(/\s+/g, '-') // collapse whitespace and replace by -
	        .replace(/-+/g, '-'); // collapse dashes

	    return str;
	}




	function init(){
		const tituloBlog = document.getElementById('blog_cat_title')

		tituloBlog.addEventListener('keyup', () => {
			let titulo = string_to_slug(tituloBlog.value),
				slug = document.getElementById('blog_slug');

			slug.value = titulo;
		});
	}

	init();

</script>

@endsection
