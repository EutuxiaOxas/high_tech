@extends('layouts.admin')

@php
$section = 'productos';
@endphp
@section('title')Crear Productos - High Tech Bearings @endsection
<style>
  .pointer {
    cursor: pointer;
  }
</style>
@section('content')
<section>
  <div class="py-1"></div>

  <section class="content-header px-0">
    <div class="container-fluid px-0">
      <div class="row mb-2 px-0">
        <div class="col-sm-6">
          <span class="font-light text-lg">Crear Producto</span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=" {{ route('cms.index') }} ">Home</a></li>
            <li class="breadcrumb-item active"><a href=" {{ route('cms.products.show') }} ">Productos</a></li>
            <li class="breadcrumb-item active">Crear Producto</li>
          </ol>
        </div>
      </div>
    </div>
  </section>


  <div class="">
    @if(session('message'))
      <div class="alert alert-success" role="alert">
        {{session('message')}}
      </div>
    @endif
    <form action="/cms/guardar/producto" method="POST" enctype="multipart/form-data" id="formSubmit">
      @csrf
      <input type="hidden" id="producto_slug" value="" name="slug">
      <div class="row">
        <div class="col-12 col-md-6 mb-4">
          <h5>Titulo</h5>
          <input class="form-control" id="titulo_producto" type="text" maxlength="191" required name="titulo_producto" placeholder="Titulo">
        </div>
        <div class="col-12 col-md-3 mb-4">
          <h5>Precio - <b>$USD</b> </h5>
          <input class="form-control" type="number" required name="precio_producto" placeholder="Precio" maxlength="191" min="0.01" step="0.01">
        </div>
        <div class="col-12 col-md-3 mb-4">
          <h5>Cantidad </h5>
          <input class="form-control" type="number" required name="cantidad_producto" placeholder="Existencia" min="1" step="1">
        </div>
        <div class="col-12 col-md-6 mb-4">
          <h5>Código Universal</h5>
          <input class="form-control" type="text" required name="codigo_producto" placeholder="Código Universal" maxlength="191">
        </div>
        <div class="col-12 col-md-6 mb-4">
          <h5>Imagen del producto</h5>
          Selecciona la nueva imagen <label class="text-primary pointer" for="imagen"> Aquí</label>
          <input type="file" hidden name="imagen_producto" id="imagen" required>
          <div> <strong id="spanImagen"></strong> </div>
        </div>
        <div class="col-12 mb-4">
          <h5>Descripción</h5>
          <textarea class="form-control" required name="descripcion_producto"></textarea>
        </div>

        <div class="col-12 mb-4">
          <h5>Aplicación</h5>
          <textarea class="form-control auto" name="aplicacion" required></textarea>
        </div>

        <div class="col-12 mb-4">
          <h5>Categoría</h5>
          <select name="categoria_producto" class="form-control form-control" id="categoria_select" required>
            <option>Selecciona una Categoría</option>
            @foreach($categorias as $categoria)
              <option value="{{$categoria->id}}">{{$categoria->category}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <hr>

      <!-- Auto formulario -->
      <div class="params-forms" id="auto" style="display: none;">
        <input type="hidden" class="input-hidden" name="auto_info" value="" id="auto_inputs">
        <div class="row">
          <h3 class="col-12 mb-4">Serie Automotriz - Parametros</h3>
          
          <div class="col-12 col-md-6 mb-4">
            <h5>Posicion de la rueda</h5>
            <input class="form-control auto element-required" type="text" maxlength="191" name="posicion_rueda" placeholder="Posición de la rueda">
          </div>

          <div class="col-12 col-md-6 mb-4">
            <h5>Diametro interno (mm)</h5>
            <input class="form-control auto element-required" type="number" name="d_interno_auto" step="0.001">
          </div>

          <div class="col-12 col-md-6 mb-4">
            <h5>Diametro externo (mm)</h5>
            <input class="form-control auto element-required" type="number" name="d_externo_auto" step="0.001">
          </div>

          <div class="col-12 col-md-6 mb-4">
            <h5>Espesor (mm)</h5>
            <input class="form-control auto element-required" type="number" name="espesor_auto" step="0.001">
          </div>
        </div>
      </div>

      <!-- Serie6000-Industrial Formulario -->
      <div class="params-forms" id="serie6000" style="display: none;">
        <input type="hidden" class="input-hidden" name="serie6000_info" value="" id="serie6000_inputs">
        <div class="row">
          <h3 class="col-12 mb-4">Serie Industrial - Parametros</h3>

          <div class="col-12 col-md-6 mb-4">
            <h5>Tipo de Sello</h5>
            <input class="form-control serie6000 element-required" type="text" name="tipo_sello_6000" maxlength="191"  placeholder="Tipo de sello">
          </div>

          <div class="col-12 col-md-6 mb-4">
            <h5>Diametro interno (mm)</h5>
            <input class="form-control serie6000 element-required" type="number" name="d_interno_serie6000" step="0.001">
          </div>

          <div class="col-12 col-md-6 mb-4">
            <h5>Diametro externo (mm)</h5>
            <input class="form-control serie6000 element-required" type="number" name="d_externo_serie6000" step="0.001">
          </div>

          <div class="col-12 col-md-6 mb-4">
            <h5>Espesor (mm)</h5>
            <input class="form-control serie6000 element-required" type="number" name="espesor_serie6000" step="0.001">
          </div>
        </div>
      </div>

      <!-- Moto Formulario -->
      <div class="params-forms" id="moto" style="display: none;">
        <input type="hidden" class="input-hidden" name="moto_info" value="" id="moto_inputs">
        <div class="row">
          <h3 class="col-12 mb-4">Serie Moto - Parametros</h3>

          <div class="col-12 col-md-6 mb-4">
            <h5>Tipo de Sello</h5>
            <input class="form-control moto element-required" type="text" name="tipo_sello_moto" maxlength="191"  placeholder="Tipo de sello">
          </div>

          <div class="col-12 col-md-6 mb-4">
            <h5>Diametro interno (mm)</h5>
            <input class="form-control moto element-required" type="number" name="d_interno_moto" step="0.001">
          </div>

          <div class="col-12 col-md-6 mb-4">
            <h5>Diametro externo (mm)</h5>
            <input class="form-control moto element-required" type="number" name="d_externo_moto" step="0.001">
          </div>

          <div class="col-12 col-md-6 mb-4">
            <h5>Espesor (mm)</h5>
            <input class="form-control moto element-required" type="number" name="espesor_moto" step="0.001">
          </div>
        </div>
      </div>

      <!-- Chumacera Formulario -->
      <div class="params-forms" id="chumacera" style="display: none;">
        <input type="hidden" class="input-hidden" name="chumacera_info" value="" id="chumacera_inputs">
        <div class="row">
          <h3 class="col-12 mb-4">Chumacera - Parametros</h3>
          <div class="col-12 col-md-6 mb-4">
            <h5>Diametro de chumacera</h5>
            <input class="form-control chumacera element-required" type="text" name="diametro_chumacera" maxlength="191"  placeholder="Diametro de Chumacera">
          </div>
        </div>
      </div>

      <!-- Cadena Formulario -->
      <div class="params-forms" id="cadena" style="display: none;">
        <input type="hidden" class="input-hidden" name="cadena_info" value="" id="cadena_inputs">
        <div class="row">
          <h3 class="col-12 mb-4">Serie Cadena - Parametros</h3>
          <div class="col-12 mb-4">
            <h5>pitch</h5>
            <input class="form-control cadena element-required" type="text" name="pitch_cadena">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 mb-5">
          <span class="loader align-middle" id="load"></span>
          @can('cms.products.store')
          <input type="submit" class="btn btn-primary px-5" value="Crear producto" id="buttonAction">
          @endcan
          <a class="btn btn-danger px-5" href="/cms/productos">Cancelar</a>
        </div>
      </div>

    </form>
  </div>
</section>

<script type="text/javascript">
  // Imagen input
  const imagenFile = document.getElementById('imagen');
  imagenFile.onchange = function() {
    const spanImagen = document.getElementById('spanImagen');
    const nameImagen = imagenFile.files[0].name;
    spanImagen.innerHTML = nameImagen;
  }
</script>

<script type="text/javascript">
  const catSelect = document.getElementById('categoria_select');
  let formularios = document.querySelectorAll('.params-forms');



  //evento cambio select
  catSelect.addEventListener('change', (e) => {
    let opcion = e.target.options[catSelect.selectedIndex]
    activeForms(opcion)
  });
  
  
  //funcion para activar los formularios
  function activeForms(target) {
    
    offForms()
    console.log(target.text)

    if (target.text === "Automotriz") {

      let form = document.querySelector('#auto')
      let inputHidden = document.querySelector('#auto_inputs');
      let formularios = document.querySelectorAll('.auto');
      inputHidden.value = 'active'
      form.style.display = 'flex';

      formularios.forEach(formulario => {
        formulario.setAttribute('required', true)
      })

    } else if (target.text === "Industrial") {

      let form = document.querySelector('#serie6000')
      let inputHidden = document.querySelector('#serie6000_inputs');
      let formularios = document.querySelectorAll('.serie6000');
      inputHidden.value = 'active'
      form.style.display = 'flex';

      formularios.forEach(formulario => {
        formulario.setAttribute('required', true)
      })

    } else if (target.text === "Moto") {

      let form = document.querySelector('#moto')
      let inputHidden = document.querySelector('#moto_inputs');
      let formularios = document.querySelectorAll('.moto');
      inputHidden.value = 'active'
      form.style.display = 'flex';

      formularios.forEach(formulario => {
        formulario.setAttribute('required', true)
      })

    } else if (target.text === "Cadenas") {

      let form = document.querySelector('#cadena')
      let inputHidden = document.querySelector('#cadena_inputs');
      let formularios = document.querySelectorAll('.cadena');
      inputHidden.value = 'active'
      form.style.display = 'flex';

      formularios.forEach(formulario => {
        formulario.setAttribute('required', true)
      })

    } else if (target.text === "Chumacera") {
      let form = document.querySelector('#chumacera')
      let inputHidden = document.querySelector('#chumacera_inputs');
      let formularios = document.querySelectorAll('.chumacera')
      inputHidden.value = 'active'
      form.style.display = 'flex';

      formularios.forEach(formulario => {
        formulario.setAttribute('required', true)
      })
    }
  }


  //resetea los formularios
  function offForms() {
    let inputsHiddens = document.querySelectorAll('.input-hidden');
    let formulariosRequired = document.querySelectorAll('.element-required');


    formulariosRequired.forEach(element => {
      element.removeAttribute('required')
    })

    formularios.forEach(form => {
      form.style.display = 'none';
    });

    inputsHiddens.forEach(input => {
      input.value = '';
    });
  }
</script>

<script type="text/javascript">
  function string_to_slug(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();

    // remove accents, swap ñ for n, etc
    var from = "àáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to = "aaaaaeeeeiiiioooouuuunc------";

    for (var i = 0, l = from.length; i < l; i++) {
      str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
      .replace(/\s+/g, '-') // collapse whitespace and replace by -
      .replace(/-+/g, '-'); // collapse dashes

    return str;
  }




  function init() {
    const tituloBlog = document.getElementById('titulo_producto')

    tituloBlog.addEventListener('keyup', () => {
      let titulo = string_to_slug(tituloBlog.value),
        slug = document.getElementById('producto_slug');

      slug.value = titulo;
    });
  }

  init();
</script>

@endsection