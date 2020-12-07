@extends('cms')


@section('content')
<section>

  @if(session('message'))
    <div class="alert alert-danger" role="alert">
      {{session('message')}}
    </div>
  @endif

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Cursos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a href="/cms/crear/curso" type="button" class="btn btn-sm btn-outline-secondary">Agregar Curso</a>
      </div>
    </div>
  </div>


  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Titulo</th>
          <th>Descripción</th>
          <th>Imagen</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cursos as $curso)
          <tr>
            <td>{{$curso->id}}</td>
            <td>{{$curso->titulo}}</td>
            <td>{{$curso->descripcion}}</td>
            <td>
              @if(substr($curso->imagen, 0, 4) === 'http')
                  <img src="{{ $curso->imagen }}" class="publicidades_card-img" alt="" style="width: 60px; height: 60px;">
              @elseif($curso->imagen)
                   <img src="{{ asset('cursos_imagen/'. $curso->imagen) }}" alt="" style="width: 60px; height: 60px;">
              @endif
            </td>
            <td class="d-flex">
              <a href="/cms/editar/curso/{{$curso->id}}"class="btn btn-sm btn-outline-secondary mr-2 editar">Editar</a>
              <form action="/cms/eliminar/curso/{{$curso->id}}" method="POST">
                @csrf
                <input type="submit" value="Eliminar" type="button" class="btn btn-sm btn-outline-secondary">
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>

@endsection