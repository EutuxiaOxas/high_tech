@extends('layouts.admin')

@php $section = 'config'; @endphp

@section('title') Configuración - High Tech Bearings @endsection

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
              <span class="font-light text-lg">Configuración</span>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href=" {{ route('cms.index') }} ">Home</a></li>
                <li class="breadcrumb-item active">Configuración</li>
              </ol>
            </div>
          </div>
        </div>
    </section>

    <div class="row">
        <div class="col">
            <div class="card card-warning" id="errors_container" style="display: none;">
                <div class="card-header row justify-content-between align-items-center mx-0 py-2 px-3">
                  <h3 class="card-title">Hey!</h3>
                  <div class="card-tools ml-auto">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body p-2">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid">

    {{-- Lista de usuario creados --}}
    <div class="row">
        <div class="col-lg-6 px-0 px-lg-2">
            <div class="card">
                <div class="card-header row justify-content-between align-items-center mx-0">
                    <h3 class="card-title">Tus datos</h3>
                    <div class="card-tools ml-auto">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive p-4">
                    <h4>{{ $user->name }}</h4>
                    <p class="text-muted">{{ $user->email }}</p>
                    <p class="text-info">{{ $user->phone }}</p>
                    <div class="text-right">
                        <!-- <button type="button" id="contraseña_submit" class="btn btn-info">Actualizar info</button> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 px-0 px-lg-2">
            <div class="card">
                <div class="card-header row justify-content-between align-items-center mx-0">
                <h3 class="card-title">Actualizar contraseña</h3>
                <div class="card-tools ml-auto">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
                </div>
                <div class="card-body table-responsive p-3">
                    <form action="{{ route('cms.config.pasword.update') }}" method="POST" id="formPasswordUpdate">
                        @csrf
                        <div class="form-group">
                            <h6 class="lead">Nueva Contraseña</h6>
                            <input class="form-control" id="contraseña" type="password" name="password">
                            <a href="#"><small class="inactive modal_change_input">Ver contraseña</small></a>
                        </div>
                        <div class="form-group">
                            <h6 class="lead">Confirmar Contraseña</h6>
                            <input class="form-control" id="confirmar_contraseña" type="password" name="corfirm_password">
                            <a href="#"><small class="inactive modal_change_input">Ver contraseña</small></a>
                        </div>
                        <small id="modal_password_verify" style="display: none;" class="form-text text-danger col-12 px-1">Las contraseñas no coinciden.</small>
                        <div class="pt-2 text-right">
                            <button type="submit" class="btn btn-success">Actualizar Contraseña</button>
                        </div>
                    </form>
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

        let formPasswordUpdate = document.getElementById('formPasswordUpdate');

        //--------------SUBMIT CREAR USUARIOS ------------

        let alert_passwords = document.getElementById('emailHelp');
        let submitUserCreate = document.getElementById('crear_user_submit');

        formPasswordUpdate.addEventListener('submit', (e) => {
            e.preventDefault();
            let password = document.getElementById('contraseña')
            let password_confirm = document.getElementById('confirmar_contraseña')

            let container = document.getElementById('errors_container');
            let errors = [];
            container.style.display = 'none';
            container.lastElementChild.innerHTML = '';

            //----------VERIFICACION CAMPOS FORM--------------
            if(password.value != password_confirm.value){
                errors.push('Las contraseñas no coinciden')
            }
            if(password.value == ''){
                errors.push('Debe agregar una contraseña')
            }

            if(errors.length === 0 )
            {
                formPasswordUpdate.submit();
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






