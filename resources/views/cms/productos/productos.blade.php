@extends('cms')


@section('content')
<section>

  @if(session('message'))
    <div class="alert alert-danger" role="alert">
      {{session('message')}}
    </div>
  @endif

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Productos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a href="/cms/crear/productos" type="button" class="btn btn-sm btn-outline-secondary">Agregar Producto</a>
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
          <th>Categoría</th>
          <th>precio</th>
          <th>codigo universal</th>
          <th>Imagen</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($productos as $producto)
          <tr>
            <td>{{$producto->id}}</td>
            <td>{{$producto->titulo}}</td>
            <td>{{$producto->descripcion}}</td>
            <td>{{$producto->categoria->category}}</td>
            <td>{{$producto->precio }}</td>
            <td>{{$producto->codigo_universal }}</td>
            <td>
              @if(substr($producto->imagen, 0, 4) === 'http')
                  <img src="{{ $producto->imagen }}" class="publicidades_card-img" alt="" style="width: 60px; height: 60px;">
              @elseif($producto->imagen)
                   <img src="{{ asset('productos_imagen/'. $producto->imagen) }}" alt="" style="width: 60px; height: 60px;">
              @endif
            </td>
            <td class="d-flex">
              <a href="/cms/editar/producto/{{$producto->id}}"class="btn btn-sm btn-outline-secondary mr-2 editar">Editar</a>
              <form action="/cms/eliminar/producto/{{$producto->id}}" method="POST">
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






