@extends('cms')


@section('content')
<section class="seccion-informacion-cms">
	<div class="container-fluid">
		@if(session('message'))
		  <div class="alert alert-success" role="alert">
		    {{session('message')}}
		  </div>
		@endif
		<h2>Información</h2>
		<form action="/cms/guardar/informacion" method="POST">
			@csrf
			<div class="row col-md-6">
				<div class="col-12 mb-4">
					<label>Telefono 1</label>
					<input class="form-control" type="text" name="telefono_uno" value="{{$telefono1->valor}}" placeholder="Telefono1">
				</div>
				<div class="col-12 mb-4">
					<label>Telefono 2</label>
					<input class="form-control"  type="text" name="telefono_dos" value="{{$telefono2->valor}}" placeholder="Telefono 2">
				</div>
				<div class="col-12 mb-4">
					<label>Email</label>
					<input class="form-control"  type="text" name="email" value="{{$email->valor}}" placeholder="Email">
				</div>
				<div class="col-12 mb-4">
					<label>Twitter</label>
					<input class="form-control"  type="text" name="twitter" value="{{$twitter->valor}}" placeholder="Twiter">
				</div>
				<div class="col-12 mb-4">
					<label>Facebook</label>
					<input class="form-control"  type="text" name="facebook" value="{{$facebook->valor}}" placeholder="Facebook">
				</div>
				<div class="col-12 mb-4">
					<label>linkedin</label>
					<input class="form-control"  type="text" name="linkedin" value="{{$linkedin->valor}}" placeholder="linkedin">
				</div>
				<div class="col-12 mb-4">
					<label>Instagram</label>
					<input class="form-control"  type="text" name="instagram" value="{{$instagram->valor}}" placeholder="Instagram">
				</div>
				<div class="col-12 mb-5">
					<input type="submit" class="btn btn-primary" value="Guardar informacion">
				</div>
			</div>
			
		</form>
	</div>
</section>


@endsection