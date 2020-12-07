@extends('cms')


@section('content')
<section>
  @if(session('message') === 'Categoría guardada correctamente' || session('message') === 'Categoria eliminada con éxito' || session('message') === 'Categoria actualizada con éxito')
        <div class="alert alert-success my-3" role="alert">
          {{session('message')}}
        </div>
  @endif

  @if(session('message') === 'No se pudo eliminar la categoría')
        <div class="alert alert-danger my-3" role="alert">
          {{session('message')}}
        </div>
  @endif
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categorias</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modalCategoria">Agregar Categoria</button>
      </div>
    </div>
  </div>


  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Imagen</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categorias as $categoria)
          <tr>
            <td>{{$categoria->id}}</td>
            <td>{{$categoria->name}}</td>
            <td>{{$categoria->descripcion}}</td>
            <td>
              @if(substr($categoria->imagen, 0, 4) === 'http')
                  <img src="{{ $categoria->imagen }}" class="publicidades_card-img" alt="" style="width: 60px; height: 60px;">
              @elseif($categoria->imagen)
                   <img src="{{ asset('categorias_imagen/'. $categoria->imagen) }}" alt="" style="width: 60px; height: 60px;">
              @endif
            </td>
            <td class="d-flex ">
              <button type="button" id="{{ $categoria->id }}" class="btn btn-sm btn-outline-secondary mr-2 editar"  data-toggle="modal" data-target="#modalCategoriaEditar">Editar</button>
              <form action="/cms/categoria/delete/{{$categoria->id}}" method="POST">
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

<!-- Modal Crear categorias -->
<div class="modal fade" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="modalSubscriptor" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSubscriptor">Agregar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/cms/categoria/create" method="POST" id="form_create_category" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <h5>Nombre</h5>
            <input class="form-control" type="text" name="category_name" placeholder="Nombre Categoria">
          </div>
          <div class="form-group">
            <h5>Descripción</h5>
            <textarea class="form-control" name="category_description"></textarea>
          </div>
          <div class="form-group">
            <h5>Imagen</h5>
            <input type="file" name="category_image">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="agregarCategoria">Crear Categoria</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal editar categorias -->
<div class="modal fade" id="modalCategoriaEditar" tabindex="-1" role="dialog" aria-labelledby="modalCategoriaEditar" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCategoriaEditar">Editar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/cms/categoria/edit" method="POST" id="form_edit_category" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <input class="form-control" type="text" name="category_name" id="categoria_nombre" placeholder="Nombre Categoria">
          </div>
          <div class="form-group">
            <textarea class="form-control" id="categoria_descripcion" name="category_description"></textarea>
          </div>
          <div class="form-group">
            <input type="file" name="category_image">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="editarCategoria">Editar Categoria</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  let formulario = document.getElementById('form_create_category');
  let botonesEditar = document.querySelectorAll('.editar');
  let formEdit = document.getElementById('form_edit_category');

  document.getElementById('agregarCategoria').addEventListener('click', () => {
    formulario.submit();
  });

  document.getElementById('editarCategoria').addEventListener('click', () => {
    formEdit.submit();
  });

  botonesEditar.forEach(boton => {
    boton.addEventListener('click', (e) =>{
      let categoriaNombre = document.getElementById('categoria_nombre');
      let categoriaDescripcion = document.getElementById('categoria_descripcion');

      formEdit.action =  `/cms/categoria/edit/${e.target.id}` 

      axios.get(`/cms/categoria/${e.target.id}`)
        .then(response => {
          categoriaNombre.value = response.data.name;
          categoriaDescripcion.value = response.data.descripcion;
        })
    })
  });

</script>
@endsection
