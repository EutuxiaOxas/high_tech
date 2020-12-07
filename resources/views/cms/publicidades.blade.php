@extends('cms')


@section('content')
<section class="publicidades">
	<!-- <div class="publicidades-tipo-1 mb-5">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h3 class="h2">Publicidades Principales</h3>
			<div class="btn-toolbar mb-2 mb-md-0">
			  <div class="btn-group mr-2">
			    <a href="/cms/crear/publicidad/principal" type="button" class="btn btn-sm btn-outline-secondary">Agregar Publicidad Princinpal</a>
			  </div>
			</div>	
		</div>
		@foreach($publicidades->where('tipo', 1) as $publicidad)

			<div class="publicidades_card-main mb-5">
				@if(substr($publicidad->imagen, 0, 4) === 'http')
                    <img src="{{ $publicidad->imagen }}" class="publicidades_card-img" alt="">
                @elseif($publicidad->imagen)
                     <img src="{{ asset('publicidades_imagen/'. $publicidad->imagen) }}" class="publicidades_card-img" alt="">
                @endif


				<div class="publicidades_card-body">

					
					<form action="/cms/actualizar/publicidad/{{$publicidad->id}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<h5>Titulo</h5>
							<input type="text" name="publicidad_titulo" value="{{$publicidad->titulo}}" placeholder="Titulo..." class="form-control">
						</div>
						<div class="form-group">
							<h5>descripción</h5>
							<textarea class="form-control" name="publicidad_descripcion" >{{$publicidad->descripcion}}</textarea>
						</div>

						<div class="form-group">
							<h5>Cambiar Imagen</h5>
							<input type="file" class="file-input" name="publicidad_imagen">
						</div>

						<div class="form-group">
						<input type="submit" class="btn btn-primary btn-sm" value="Actualizar publicidad">
					</form>
				</div>
			</div>
		@endforeach
	</div> -->
	<div class="publicidades-tipo-2">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h3 class="h2">Publicidades</h3>
			<div class="btn-toolbar mb-2 mb-md-0">
			  <div class="btn-group mr-2">
			    <a href="/cms/crear/publicidad/secundaria" type="button" class="btn btn-sm btn-outline-secondary">Agregar Publicidad</a>
			  </div>
			</div>	
		</div>
		@foreach($publicidades->where('tipo', 2) as $publicidad)
			<div class="publicidades_card-main mb-5">
				@if(substr($publicidad->imagen, 0, 4) === 'http')
                    <img src="{{ $publicidad->imagen }}" class="publicidades_card-img" alt="">
                @elseif($publicidad->imagen)
                     <img src="{{ asset('publicidades_imagen/'. $publicidad->imagen) }}" class="publicidades_card-img" alt="">
                @endif
				<div class="publicidades_card-body">
					<form action="/cms/actualizar/publicidad/{{$publicidad->id}}" method="POST">
						@csrf
						<div class="form-group">
							<h5>Titulo</h5>
							<input type="text" name="publicidad_titulo" value="{{$publicidad->titulo}}" placeholder="Titulo..." class="form-control">
						</div>
						<div class="form-group">
							<h5>descripción</h5>
							<input type="text" name="publicidad_descripcion" value="{{$publicidad->descripcion}}" placeholder="Descripcion..." class="form-control">
						</div>
						<div class="form-group">
							<h5>Cambiar Imagen</h5>
							<input type="file" class="file-input" name="publicidad_imagen">
						</div>
						<input type="submit" class="btn btn-primary btn-sm" value="Actualizar Publicidad">
					</form>
				</div>
			</div>
		@endforeach
	</div>
</section>
<script type="text/javascript">
	let publicidad_inputs = document.querySelectorAll('.file-input');
	console.log(publicidad_inputs);

	publicidad_inputs.forEach(input => {
		input.onchange = function (e){
			let padre = e.target.parentNode.parentNode.parentNode.parentNode
			let imgContainer = padre.children[0];


			let reader = new FileReader();
			reader.readAsDataURL(e.target.files[0]);

			reader.onload = function (){
				imgContainer.src = reader.result;
			}

			

		}
	});
</script>
@endsection