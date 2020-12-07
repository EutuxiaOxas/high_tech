@extends('cms')


@section('content')
<section>

  @if(session('message'))
    <div class="alert alert-danger my-3" role="alert">
      {{session('message')}}
    </div>
  @endif

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Blog Categorias</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a href="/cms/blog/crear/categoria" type="button" class="btn btn-sm btn-outline-secondary">Agregar Categoria</a>
      </div>
    </div>
  </div>


  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>nombre</th>
          <th>descripcion</th>
          <th>picture</th>
          <th>acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categorias as $categoria)
          <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->name}}</td>
            <td>{{$categoria->description}}</td>
            <td>
              @if(substr($categoria->picture, 0, 4) === 'http')
                  <img src="{{ $categoria->picture }}" class="publicidades_card-img" alt="" style="width: 60px; height: 60px;">
              @elseif($categoria->picture)
                   <img src="{{ asset('blog_categorias_imagen/'. $categoria->picture) }}" alt="" style="width: 60px; height: 60px;">
              @endif
            </td>
            <td class="d-flex">
              <a href="/cms/blog/editar/categoria/{{$categoria->id}}"class="btn btn-sm btn-outline-secondary mr-2 editar">Editar</a>
              <form action="/cms/blog/eliminar/categoria/{{$categoria->id}}" method="POST">
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






