@extends('cms')


@section('content')
<section class="publicidades">
	<div class="publicidades-tipo-1 mb-5">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h3 class="h2">Imagenes Slider</h3>
			<div class="btn-toolbar mb-2 mb-md-0">
			  <div class="btn-group mr-2">
			    <a href="/cms/crear/slider/image/1" type="button" class="btn btn-sm btn-outline-secondary">Agregar Imagen a slider</a>
			  </div>
			</div>	
		</div>
		@foreach($sliders->where('tipo', 1) as $slider)

			<div class="publicidades_card-main mb-5">
				@if(substr($slider->imagen, 0, 4) === 'http')
                    <img src="{{ $slider->imagen }}" class="publicidades_card-img" alt="">
                @elseif($slider->imagen)
                     <img src="{{ asset('sliders_imagen/'. $slider->imagen) }}" class="publicidades_card-img" alt="">
                @endif


				<div class="publicidades_card-body">

					
					<form action="" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<h5>Titulo</h5>
							<input type="text" name="slider_titulo" value="{{$slider->titulo}}" placeholder="Titulo..." class="form-control">
						</div>
						<div class="form-group">
							<h5>descripción</h5>
							<textarea class="form-control" name="slider_descripcion" >{{$slider->descripcion}}</textarea>
						</div>

						<div class="form-group">
							<h5>Cambiar Imagen</h5>
							<input type="file" class="file-input" name="slider_imagen">
						</div>

						<div class="form-group">
						<input type="submit" class="btn btn-primary btn-sm" value="Actualizar Slider">
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