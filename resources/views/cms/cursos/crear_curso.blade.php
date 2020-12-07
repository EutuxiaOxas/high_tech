@extends('cms')


@section('content')
<section>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Crear Curso</h1>
  </div>


  <div class="">
      @if(session('message'))
        <div class="alert alert-success" role="alert">
          {{session('message')}}
        </div>
      @endif
      <form action="/cms/guardar/curso" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-12 mb-4">
            <label>Titulo</label>
            <input class="form-control" type="text" name="titulo_curso" value="" placeholder="Titulo">
          </div>
          <div class="col-12 mb-4">
            <label>Descripción</label>
            <input class="form-control" type="text" name="descripcion_curso" value="" placeholder="Descripción">
          </div>
          <div class="col-12 mb-4">
            <label style="display: block">Imagen</label>
            <input type="file" name="imagen_curso">
          </div>

          <div class="col-12 mb-5">
            <input type="submit" class="btn btn-primary" value="Crear">
          </div>
        </div>
      </form>
  </div>
</section>

@endsection