@extends('cms')


@section('content')
<section>

  @if(session('message'))
    <div class="alert alert-danger my-3" role="alert">
      {{session('message')}}
    </div>
  @endif

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Blog Articulos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a href="/cms/blog/crear/articulos" type="button" class="btn btn-sm btn-outline-secondary">Agregar Articulo</a>
      </div>
    </div>
  </div>


  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Titulo</th>
          <th>contenido</th>
          <th>Autor</th>
          <th>Fecha</th>
          <th>Categoria</th>
          <th>picture</th>
          <th>acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($articulos as $articulo)
          <tr>
            <td>{{$articulo->id}}</td>
            <td>{{$articulo->title}}</td>
            <td>{{$articulo->content}}</td>
            <td>{{$articulo->autor->name}}</td>
            <td>{{$articulo->date}}</td>
            <td>{{$articulo->categoria->name}}</td>
            <td>
              @if(substr($articulo->picture, 0, 4) === 'http')
                  <img src="{{ $articulo->picture }}" class="publicidades_card-img" alt="" style="width: 60px; height: 60px;">
              @elseif($articulo->picture)
                   <img src="{{ asset('blog_articulos_imagen/'. $articulo->picture) }}" alt="" style="width: 60px; height: 60px;">
              @endif
            </td>
            <td class="d-flex">
              <a href="/cms/blog/editar/articulo/{{$articulo->id}}"class="btn btn-sm btn-outline-secondary mr-2 editar">Editar</a>
              <form action="/cms/blog/eliminar/articulo/{{$articulo->id}}" method="POST">
                @csrf
                @method('DELETE')
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






