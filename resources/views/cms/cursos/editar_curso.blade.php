@extends('cms')


@section('content')
<section>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Curso</h1>
  </div>


  <div class="">
      @if(session('message'))
        <div class="alert alert-success" role="alert">
          {{session('message')}}
        </div>
      @endif

      <form action="/cms/actualizar/imagen/curso/{{$curso->id}}" method="POST" class="mb-5" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <h5>Cambiar Imagen</h5>
          <input type="file" name="imagen_curso">
        </div>
        <input type="submit" class="btn btn-primary btn-sm" value="Guardar Imagen">

      </form>


      <form action="/cms/actualizar/curso/{{$curso->id}}" method="POST" >
        @csrf
        <div class="row">
          <div class="col-12 mb-4">
            <label>Titulo</label>
            <input class="form-control" type="text" name="titulo_curso" value="{{$curso->titulo}}" placeholder="Titulo">
          </div>
          <div class="col-12 mb-4">
            <label>Descripción</label>
            <input class="form-control" type="text" name="descripcion_curso" value="{{$curso->descripcion}}"  placeholder="Descripción">
          </div>
          
          <div class="col-12 mb-5">
            <input type="submit" class="btn btn-primary" value="Guardar">
          </div>
        </div>
      </form>


  </div>
</section>

@endsection