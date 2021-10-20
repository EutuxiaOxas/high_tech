@extends('layouts.admin')

@php
    $section = 'usuarios';
@endphp

@section('title') Compradores - High Tech Bearings @endsection

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
              <span class="font-light text-lg">Usuarios compradores</span>
              <a class="btn btn-success btn-sm ml-2" href="{{ route('cms.users.buyers.download') }}">Descargar Compradores</a>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href=" {{ route('cms.index') }} ">Home</a></li>
                <li class="breadcrumb-item active">Compradores [buyers]</li>
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

    {{-- Lista de usuario creados --}}
    <div class="row">
        <div class="col px-0">
            <div class="card card card-primary">
                <div class="card-header row justify-content-between align-items-center mx-0">
                <h3 class="card-title">Compradores registrados</h3>
                <div class="card-tools ml-auto">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
                </div>
                <div class="card-body table-responsive p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 25%">Nombre</th>
                            <th style="width: 25%">Correo</th>
                            <th style="width: 35%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buyers as $buyer)
                            <tr>
                                <td>{{ $buyer->name }}</td>
                                <td>{{ $buyer->email }}</td>
                                <td>
                                    <button type="button" id="{{ $buyer->id }}" class="btn btn-sm btn-danger eliminar"
                                        data-toggle="modal" data-target="#modalEliminar">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal eliminar usuario --}}
    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <div id="eliminar_user">
                    </div>
                    <form action="" id="eliminar_form" method="POST">
                        @csrf
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="eliminar_submit" class="btn btn-danger">Eliminar Usuario</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        //---------------BOTONES Y INPUTS------------

        let eliminarButtons = document.querySelectorAll('.eliminar');

        let deleteSubmit = document.getElementById('eliminar_submit');

        //--------------- SUBMIT MODAL ELIMINAR ------------
        deleteSubmit.addEventListener('click', (e) => {
            let form = document.getElementById('eliminar_form');
            form.submit();
        });

        //--------------- SUBMIT MODAL EDITAR ATOS USUARIO ------------

        editarSubmit.addEventListener('click', (e) => {
            let form = document.getElementById('editar_form')
            form.submit();
        });

        //--------------- BOTON LLAMADO AL MODAL DE ELIMINAR USUARIO ------------

        if (eliminarButtons) {
            eliminarButtons.forEach(buttons => {
                buttons.addEventListener('click', (e) => {

                    let eliminar_user = document.getElementById('eliminar_user');
                    let user_info = e.target.parentNode.parentNode.children[1].textContent

                    eliminar_user.innerHTML = `
                        El usuario <strong>${user_info}</strong> sera eliminado. <br>
                        ¿Esta seguro que desea eliminarlo?
                    `

                    let id = e.target.id
                    getUser(id, 'eliminar');
                });
            });
        }
        //--------------- FUCIONES DE LOS MODALES ------------


        //--------------- FUNCION PARA OBTENER DATOS DEL USUARIO ------------
        function getUser(id, accion) {
            axios.get(`/cms/get/user/${id}`)
                .then(response => {
                    if (accion == 'editar') {
                        editarModal(response.data);
                    } else if (accion == 'contraseña') {
                        contraseñaModal(id);
                    } else if (accion == 'eliminar') {
                        eliminarModal(id);
                    }
                });
        }

        //--------------- FUCION PARA ACTUALIZAR FORM MODAL ELIMINAR USUARIO ------------

        function eliminarModal(id) {
            let form = document.getElementById('eliminar_form')

            form.action = `/cms/eliminar/user/${id}`;
        }

    </script>


@endsection






