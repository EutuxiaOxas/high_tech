@extends('layouts.admin')

@php
    $section = 'usuarios';
@endphp

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
              <span class="font-light text-lg">Usuarios suscritos al sitio</span>
              <a class="btn btn-success btn-sm ml-2" href="{{ route('cms.users.subscribers.download') }}">Descargar Suscriptores</a>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href=" {{ route('cms.index') }} ">Home</a></li>
                <li class="breadcrumb-item active">Subscriptores</li>
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
            <div class="card card-info">
                <div class="card-header row justify-content-between align-items-center mx-0">
                    <h3 class="card-title">Usuarios administrativos registrados</h3>
                    <div class="card-tools ml-auto">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 10%">#</th>
                            <th style="width: 55%">Correo</th>
                            <th style="width: 35%">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $cont=0; @endphp
                        @foreach ($subscribers as $subscriber)
                            @php $cont++; @endphp
                            <tr>
                                <td>{{ $cont }}</td>
                                <td>{{ $subscriber->email }}</td>
                                <td>
                                    <button type="button" id="{{ $subscriber->id }}" class="btn btn-sm btn-danger eliminar"
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

    <script type="text/javascript">

        //---------------BOTONES Y INPUTS------------

        let editarButtons = document.querySelectorAll('.editar');
        let passButtons = document.querySelectorAll('.change_pass');
        let eliminarButtons = document.querySelectorAll('.eliminar');

        let editarSubmit = document.getElementById('editar_submit');
        let passSubmit = document.getElementById('contraseña_submit');
        let deleteSubmit = document.getElementById('eliminar_submit');

        //--------------SUBMIT CREAR USUARIOS ------------

        let alert_passwords = document.getElementById('emailHelp');
        let submitUserCreate = document.getElementById('crear_user_submit');

        submitUserCreate.addEventListener('click', (e) => {
            e.preventDefault();

            let password = document.getElementById('contraseña')
            let password_confirm = document.getElementById('confirmar_contraseña')
            let name = document.getElementById('create_user_name')
            let email = document.getElementById('create_user_email')
            let rol = document.getElementById('create_rol')

            let form = document.getElementById('form_create_user');

            let container = document.getElementById('errors_container');
            let errors = [];
            console.log(container);
            container.style.display = 'none';
            container.lastElementChild.innerHTML = '';


            //----------VERIFICACION CAMPOS FORM--------------

            if(password.value != password_confirm.value)
            {
                errors.push('Las contraseñas no coinciden')
            }if(name.value == '') {
                errors.push('Debe agregar un nombre')
            }if(email.value == ''){
                errors.push('Debe agregar un email')
            }if(rol.selectedIndex === 0){
                errors.push('Debe ecoger un rol')
            }if(password.value == ''){
                errors.push('Debe agregar una contraseña')
            }

            if(errors.length === 0 )
            {
                form.submit();
            } else {
                let errors_main = document.createElement('ul');

                errors.forEach(error => {
                    errors_main.innerHTML += `
                        <li>${error}</li>
                    `;
                });

                container.lastElementChild.appendChild(errors_main);
                container.style.display = 'block'
            }

        });

        //--------------- SUBMIT MODAL ELIMINAR ------------
        deleteSubmit.addEventListener('click', (e) => {
            let form = document.getElementById('eliminar_form');
            form.submit();
        });

        //--------------- SUBMIT MODAL CAMBIAR CONTRASEÑA ------------

        passSubmit.addEventListener('click', (e) => {
            let form = document.getElementById('contraseña_form')
            let password_modal = document.getElementById('modal_password')
            let password_confirm_modal = document.getElementById('modal_password_confirm');
            let verify_modal_password = document.getElementById('modal_password_verify')

            if(password_modal.value === password_confirm_modal.value){
                form.submit();
            } else {
                verify_modal_password.style.display = 'block';
            }
        });

        //--------------- SUBMIT MODAL EDITAR ATOS USUARIO ------------

        editarSubmit.addEventListener('click', (e) => {
            let form = document.getElementById('editar_form')
            form.submit();
        });

        //--------------- BOTON LLAMADO AL MODAL DE EDITAR ------------

        if (editarButtons) {
            editarButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    let id = e.target.id;
                    getUser(id, 'editar');
                });
            });
        }

        //--------------- BOTON LLAMADO AL MODAL DE CAMBIAR CONTRASEÑA ------------

        if (passButtons) {
            passButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    let id = e.target.id
                    getUser(id, 'contraseña');
                })
            });
        }

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

        //--------------- FUCION PARA ACTUALIZAR FORM MODAL CAMBIAR CONTRASEÑA ------------

        function contraseñaModal(id) {
            let form = document.getElementById('contraseña_form')

            form.action = `/cms/password/user/${id}`;
        }

        //--------------- FUCION PARA ACTUALIZAR FORM MODAL EDITAR USUARIO ------------

        function editarModal(data) {
            let name = document.getElementById('editar_name');
            let email = document.getElementById('editar_email');
            let form = document.getElementById('editar_form');

            form.action = `/cms/update/user/${data.id}`
            name.value = data.name;
            email.value = data.email;
        }

    </script>


@endsection






