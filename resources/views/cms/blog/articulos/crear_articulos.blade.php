@extends('cms')


@section('content')
<section class="seccion-crear-publicidad-cms">
	<div class="container-fluid">
		<h2 class="my-">
			Crear Articulo
		</h2>
		@if(session('message'))
		  <div class="alert alert-success" role="alert">
		    {{session('message')}}
		  </div>
		@endif
		<form action="/cms/blog/guardar/articulo" class="col-12" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="article_author" value="{{auth()->user()->id}}">
			<!-- SLUG DEL ARTICULO -->
			<input type="hidden" id="blog_slug" value="" name="slug">
			
			<div class="form-group">
				<h5>Titulo</h5>
				<input type="text" id="blog_title" name="articulo_title" maxlength="191" required placeholder="Titulo..." class="form-control">
			</div>
			<div class="form-group">
				<h5>Contenido</h5>
				<textarea class="ckeditor" id="content" required name="articulo_content"></textarea>
			</div>
			<div class="form-group">
				<h5>Keywords</h5>
				<input type="text" name="articulo_keywords" id="keywords_article" required maxlength="191" placeholder="Keywords..." class="form-control">
			</div>
			<div class="form-group">
				<h5>Fecha</h5>
				<input type="date" name="articulo_date" required placeholder="Fecha..." class="form-control">
			</div>
			<div class="form-group">
				<h5>Categoria</h5>
				<select class="form-control" required name="articulo_categoria">
					<option>Seleccion una categoria</option>
					@foreach($categorias as $categoria)
						<option value="{{$categoria->id}}">{{$categoria->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<h5>Imagen</h5>
				<input type="file" name="article_picture">
			</div>
			<input type="submit" class="btn btn-primary mb-4" value="Crear Articulo">
			
		</form>
	</div>
</section>

<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

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
		const tituloBlog = document.getElementById('blog_title')
		const keywords = document.getElementById('keywords_article')

		keywords.addEventListener('blur', () => {
			keywords.value = keywords.value.replace(/ /g, "").toLowerCase()
		})

		tituloBlog.addEventListener('keyup', () => {
			let titulo = string_to_slug(tituloBlog.value),
				slug = document.getElementById('blog_slug');

			slug.value = titulo;
		});
	}

	init();

</script>

@endsection