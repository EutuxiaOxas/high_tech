<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('imagenes/favicon.png') }}">
  <title>Administración</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/AdminLTE/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.min.css') }}">

  <!--datables CSS básico-->
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatables/datatables.min.css') }}" />
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet" type="text/css"
      href="{{ asset('vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}">

  <!-- Axios -->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
  <style>
  .loader {
    border: 6px solid #f3f3f3; /* Light grey */
    border-top: 6px solid rgb(69, 124, 158);
    border-bottom: 6px solid rgb(69, 124, 158);
    border-radius: 50%;
    width: 35px;
    height: 35px;
    animation: spin 2s linear infinite;
    display: none;
    }

    @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<!-- IDENTIFICADOR SECCIÓN -->
<input type="hidden" id="seccion_name" value="">

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand  
    @role('buyer')
      navbar-light
    @else
      navbar-dark navbar-lightblue
    @endrole
    ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Inicio</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item d-none d-sm-inline-block">
        <form action="/logout" id="logout_form" method="POST">
          @csrf
          <a href="#" onclick="document.getElementById('logout_form').submit()" class="nav-link">Cerrar Sesión</a>
        </form>
      </li>
      <!--li-- class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </!--li-->
    </ul>
  </nav>

  <aside class="main-sidebar elevation-4 @role('buyer') sidebar-light-primary  @else sidebar-dark-primary @endrole ">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link text-center">
      <span class="brand-text font-weight-light">
        @role('buyer') 
          <img class="navbar-logo navbar-logo-dark" src="{{asset('svg/logo-dark.svg')}}" alt="Logo High Tech" loading="lazy" width="40%">
        @else
          <img class="navbar-logo navbar-logo-dark" src="{{asset('svg/logo-light.svg')}}" alt="Logo High Tech" loading="lazy" width="40%">
        @endrole
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a class="nav-link @if ($section == 'dashboard') active @endif" href="{{ route('cms.index') }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Mi Perfil
              </p>
            </a>
          </li>

          @can('cms.users.show')

            <li class="nav-item">
              <a class="nav-link @if ($section == 'usuarios') active @endif" href="{{ route('cms.users.show') }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Usuarios
                </p>
              </a>
            </li>

          @endcan

          {{-- @can('cms.users.show') --}}

            <!-- <li class="nav-item">
              <a class="nav-link @if ($section == 'roles') active @endif" href="{{ route('cms.role.index') }}">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Roles
                </p>
              </a>
            </li> -->

          {{-- @endcan --}}

          @can('cms.products.show')

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link secciones tienda @if ($section == 'productos') active @endif">
                <i class="nav-icon fas fa-store"></i>
                <p>
                  Productos
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                  @can('cms.products.categories.show')
                  <li class="nav-item">
                      <a href="/cms/productos/categorias" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Categorías Productos</p>
                      </a>
                  </li>
                  @endcan
                  @can('cms.products.parameters.show')
                  <!-- <li class="nav-item">
                    <a href=" {{ route('cms.products.parameters.show') }} " class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Parametros Generales</p>
                    </a>
                  </li> -->
                  @endcan
                  @can('cms.products.show')
                  <li class="nav-item">
                    <a href="{{ route('cms.products.show') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Productos</p>
                    </a>
                  </li>
                  @endcan

              </ul>
            </li>

          @endcan

          @can('cms.orders.show')

            <li class="nav-item has-treeview">
              <a href="{{ route('cms.orders.show') }}" class="nav-link secciones tienda @if ($section == 'orders') active @endif">
                <i class="nav-icon fas fa-tag"></i>
                <p>
                  Ventas
                </p>
              </a>
            </li>

          @endcan

          @can('cms.blog.show')
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link secciones tienda @if ($section == 'blog') active @endif">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p>
                  Blog
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                  @can('cms.blog.categories.show')
                  <li class="nav-item">
                    <a href="/cms/blog/categorias" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Categorias Blog</p>
                    </a>
                  </li>
                  @endcan
                  @can('cms.blog.show')
                  <li class="nav-item">
                      <a href="/cms/blog/articulos" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Articulos Blog</p>
                      </a>
                  </li>
                  @endcan
              </ul>
            </li>
          @endcan

          @can('cms.purchases.show')

            <li class="nav-item has-treeview">
              <a href="{{ route('cms.purchases.show') }}" class="nav-link secciones tienda @if ($section == 'orders') active @endif">
                <i class="nav-icon fas fa-store"></i>
                <p>
                  Mis Compras
                </p>
              </a>
            </li>

          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
  </div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>


<!-- Bootstrap -->
<script src="/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/AdminLTE/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="/AdminLTE/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="/AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/AdminLTE/plugins/raphael/raphael.min.js"></script>
<script src="/AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="/AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js"></script>


<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
        let name = document.getElementById('seccion_name'),
            enlaces =document.querySelectorAll('.secciones');

        changeColor(name.value, enlaces)

    });

    function changeColor(name, enlaces)
    {
        enlaces.forEach(enlace => {
            if(enlace.classList.contains(name))
            {
                enlace.classList.add('active');
            }
        });
    }
</script>

<script>
    const load = document.getElementById('load');
    const formSubmit = document.getElementById('formSubmit');
    const buttonAction = document.getElementById('buttonAction');

    formSubmit.addEventListener("submit", function(){
        buttonAction.disabled = true;
        load.style.display = 'inline-block';
    });


</script>

</body>
</html>
