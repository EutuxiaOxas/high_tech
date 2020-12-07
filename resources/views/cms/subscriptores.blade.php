@extends('cms')


@section('content')
<section>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Subscriptores</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">Agregar Subscriptor</button>
      </div>
    </div>
  </div>


  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Empresa</th>
          <th>País</th>
        </tr>
      </thead>
      <tbody>
        @foreach( as )
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="modalSubscriptor" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSubscriptor">Agregar subscriptor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Subscriptor email">
          </div>
          <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Subscriptor Nombre">
          </div>
          <div class="form-group">
            <input class="form-control" type="text" name="pais" placeholder="Subscriptor País">
          </div>
          <div class="form-group">
            <input class="form-control" type="text" name="empresa" placeholder="Subscriptor Empresa">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Agregar Subscriptor</button>
      </div>
    </div>
  </div>
</div>
@endsection
