@extends('cms')


@section('content')
<section>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Miembros del club</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modalMiembro">Agregar miembro</button>
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
          <th>Status</th>
          <th>País</th>
          <th>Empresa</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name }}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->status}}</td>
            <td>{{$user->pais}}</td>
            <td>{{$user->empresa}}</td>
            <td>
            	@if($user->status === 'activo')
                <form action="/club/user/pause/{{$user->id}}" method="POST">
                  @csrf
                  <input type="submit" value="Pausar" class="btn btn-sm btn-outline-secondary">
                </form>
              @else
                <form action="/club/user/active/{{$user->id}}" method="POST">
                  @csrf
                  <input type="submit" value="Activar" class="btn btn-sm btn-outline-secondary">
                </form>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>

<div class="modal fade" id="modalMiembro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar miembro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
          	<input class="form-control" type="text" name="name" placeholder="Subscriptor Nombre">
          </div>
          <div class="form-group">
          	<input class="form-control" type="email" name="email" placeholder="Subscriptor email">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>
@endsection