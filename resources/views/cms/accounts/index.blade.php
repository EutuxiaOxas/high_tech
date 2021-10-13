@extends('layouts.admin')

@php $section = 'accounts'; @endphp
@section('title') Cuentas bancarias - High Tech Bearings @endsection

<style>
    .img_div_rounded{
        background-repeat: no-repeat;
        background-size:cover;
        background-position: center;
        height: 50px;
        width: auto;
        overflow: hidden;
        border-radius: 10px;
    }
</style>

@section('content')
<div class="pt-2"></div>
<section>

    @if (session('message'))
      <div class="card card-success">
        <div class="card-header row align-items-center justify-content-between mx-0">
          <h3 class="card-title">Éxito!</h3>
          <div class="card-tools ml-auto">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            {{ session('message') }}
        </div>
      </div>
    @endif

    @if (session('info'))
        <div class="card card-info">
            <div class="card-header row align-items-center justify-content-between mx-0">
            <h3 class="card-title">Ops!</h3>
            <div class="card-tools ml-auto">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
            </div>
            <div class="card-body">
                {{ session('info') }}
            </div>
        </div>
    @endif

    <section class="content-header px-0">
        <div class="container-fluid px-0">
          <div class="row mb-2 px-0">
            <div class="col-sm-6">
              <span class="font-light text-lg">Cuentas Bancarias</span>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href=" {{ route('cms.index') }} ">Home</a></li>
                <li class="breadcrumb-item active">Cuentas bancarias</li>
              </ol>
            </div>
          </div>
        </div>
    </section>

    <div class="row">
        <div class="col">
            <div class="card card-warning" id="errors_container" style="display: none;">
                <div class="card-header row justify-content-between align-items-center mx-0">
                  <h3 class="card-title">Hey!</h3>
                  <div class="card-tools ml-auto">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid">
    {{-- Crear usuarios --}}
    <div class="row">
      <div class="col-12 px-0">
        <div class="card card-primary collapsed-card">
          <div class="card-header row justify-content-between align-items-center mx-0">
                <h3 class="card-title">Crear Cuenta Bancaria</h3>
                <div class="card-tools ml-auto">
                    <button type="button" class="btn btn-tool " data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
          </div>
          <div class="card-body">
            <form class="mb-0" action="{{ route('cms.accounts.create') }}" id="form_create_user" method="POST" autocomplete="off">
                @csrf
              <div class="row">
                  <div class="col-12 col-md-4 px-1">
                    <div class="form-group">
                        <label for="inputName">Cuenta</label>
                        <input type="text" class="form-control" id="create_user_name" name="account" placeholder="Cuenta" autocomplete="off" required>
                      </div>
                  </div>
                  <div class="col-12 col-md-4 px-1">
                    <div class="form-group">
                        <label for="inputDescription">Correo</label>
                        <input class="form-control" id="create_user_email" type="email" name="account_mail" placeholder="Correo" autocomplete="off">
                    </div>
                  </div>
                  <div class="col-12 col-md-4 px-1">
                    <div class="form-group">
                        <label for="inputDescription">Numero de Cuenta</label>
                        <input class="form-control" id="create_user_email" type="text" name="account_number" placeholder="Numero de Cuenta" autocomplete="off">
                    </div>
                  </div>
                  <div class="col-12 col-md-4 px-1">
                    <div class="form-group">
                        <label for="inputDescription">Titular</label>
                        <input class="form-control" id="create_user_email" type="text" name="account_titular" placeholder="Titular" autocomplete="off">
                    </div>
                  </div>
                  <div class="col-12 col-md-8 px-1">
                    <div class="form-group">
                        <label for="inputDescription">Descripción corta</label>
                        <input class="form-control" id="create_user_email" type="text" name="account_description" placeholder="Descripción corta" autocomplete="off">
                    </div>
                  </div>
              </div>
              <div id="errors_container">
              </div>
              <div class="row">
                  <div class="col">
                    <div class="form-group mb-0">
                        <input type="submit" class="btn btn-sm btn-primary px-5" value="Crear Cuenta">
                        <small id="emailHelp" style="display: none;" class="form-text text-danger col-12 px-1">Las contraseñas no coinciden.</small>
                    </div>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    {{-- Lista de usuario creados --}}
    <div class="row">
        <div class="col px-0">
            <div class="card">
                <div class="card-header row justify-content-between align-items-center mx-0">
                <h3 class="card-title">Cuentas bancarias registrados</h3>
                <div class="card-tools ml-auto">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
                </div>
                <div class="card-body table-responsive p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 15%">Cuenta</th>
                            <th style="width: 12%">Correo</th>
                            <th style="width: 13%">Numero de Cuenta</th>
                            <th style="width: 10%">Titular</th>
                            <th style="width: 35%">Descripcion</th>
                            <th style="width: 10%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $account)
                                <tr>
                                    <td>{{ $account->account }}</td>
                                    <td>{{ $account->account_mail }}</td>
                                    <td>{{ $account->account_number }}</td>
                                    <td>{{ $account->account_titular }}</td>
                                    <td>{{ $account->account_description }}</td>
                                    <td>
                                        <button type="button" id="{{ $account->id }}" class="btn btn-sm btn-link editar"
                                            data-toggle="modal" data-target="#modalEditar{{ $account->id }}">
                                            <i class="nav-icon fas fa-edit"></i>
                                        </button>
                                        <button type="button" id="{{ $account->id }}" class="btn btn-sm btn-link eliminar text-danger"
                                            data-toggle="modal" data-target="#modalEliminar{{ $account->id }}">
                                            <i class="nav-icon fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                {{-- Modal editar cuenta --}}
                                <div class="modal fade" id="modalEditar{{ $account->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar cuenta</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('cms.accounts.update' ) }}" method="POST">
                                                @csrf
                                                <div class="modal-body px-1">
                                                    <input hidden type="text" name="account_id" value="{{ $account->id }}">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="inputName">Cuenta</label>
                                                            <input type="text" class="form-control" id="create_user_name" name="account" placeholder="Cuenta" autocomplete="off" required value="{{ $account->account }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="inputDescription">Correo</label>
                                                            <input class="form-control"  type="email" name="account_mail" placeholder="Correo" autocomplete="off" value="{{ $account->account_mail }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="inputDescription">Numero de Cuenta</label>
                                                            <input class="form-control" type="text" name="account_number" placeholder="Numero de Cuenta" autocomplete="off" value="{{ $account->account_number }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="inputDescription">Titular</label>
                                                            <input class="form-control" type="text" name="account_titular" placeholder="Titular" autocomplete="off" value="{{ $account->account_titular }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="inputDescription">Descripción corta</label>
                                                            <input class="form-control" type="text" name="account_description" placeholder="Descripción corta" autocomplete="off" value="{{ $account->account_description }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" id="editar_submit" class="btn btn-primary">Actualizar Cuenta</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal eliminar cuenta --}}
                                <div class="modal fade" id="modalEliminar{{ $account->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Eliminar cuenta</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('cms.accounts.remove', $account->id ) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <strong>{{ $account->account }}</strong> <br>
                                                    <span class="mt-2">{{ $account->account_mail }}</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger">Eliminar Cuenta</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    

    <script type="text/javascript">
        //---------------Permitir mostrar la contraseña escrita------------
        let passChange = document.querySelectorAll('.pass_watcher');

        let modalPassChange = document.querySelectorAll('.modal_change_input');
        //---------------Funcion permitir mostrar la contraseña escrita del modal cambio de contraseña------------
        modalPassChange.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();

                let inputPass = e.target.parentNode.parentNode.children[1];
                let accion = e.target;

                if(accion.classList.contains('inactive'))
                {
                    inputPass.type = "text"
                    accion.classList.remove('inactive')
                    accion.classList.add('active')

                    accion.textContent = 'Ocultar contraseña';
                } else if(accion.classList.contains('active')) {
                    inputPass.type = "password"
                    accion.classList.remove('active')
                    accion.classList.add('inactive')

                    accion.textContent = 'Ver contraseña';
                }
            });
        });

        //---------------Funcion para permitir mostrar la contraseña escrita------------
        passChange.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                let inputPass = e.target.parentNode.parentNode.querySelector('input');
                let accion = e.target;

                if(accion.classList.contains('inactive'))
                {
                    inputPass.type = "text"
                    accion.classList.remove('inactive')
                    accion.classList.add('active')

                    accion.textContent = 'Ocultar contraseña';
                } else if(accion.classList.contains('active')) {
                    inputPass.type = "password"
                    accion.classList.remove('active')
                    accion.classList.add('inactive')

                    accion.textContent = 'Ver contraseña';
                }
            });
        });
    </script>

@endsection






