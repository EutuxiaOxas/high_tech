@extends('cms')
@php
    $section = 'productos';
@endphp

<style>
    .img_div_rounded{
        background-repeat: no-repeat;
        background-size:cover;
        background-position: center;
        height: 100px;
        width: auto;
        overflow: hidden;
        border-radius: 10px;
    }
    .pointer{
        cursor: pointer;
    }
</style>

@section('content')
<section>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Producto</h1>
  </div>


  <div class="">
      @if(session('message'))
        <div class="alert alert-success" role="alert">
          {{session('message')}}
        </div>
      @endif
      <form action="/cms/actualizar/producto/{{$producto->id}}" method="POST" enctype="multipart/form-data" id="formSubmit">
        @csrf
        <input type="hidden" id="producto_slug" value="{{$producto->slug}}" name="slug">
        <div class="row">
          <div class="col-12 col-md-6 mb-4">
            <h5>Titulo</h5>
            <input class="form-control"  id="titulo_producto" type="text" require name="titulo_producto" value="{{$producto->titulo}}" placeholder="Titulo" maxlength="191">
          </div>
          <div class="col-12 col-md-6 mb-4">
            <h5>Precio</h5>
            <input class="form-control" type="number" require name="precio_producto" value="{{$producto->precio}}" placeholder="Precio" maxlength="191">
          </div>
          <div class="col-12 col-md-6 mb-4">
            <h5>Código Universal</h5>
            <input class="form-control" type="text" require name="codigo_producto" value="{{$producto->codigo_universal}}" placeholder="Código Universal" maxlength="191">
          </div>
          <div class="col-12 col-md-6 mb-4">
            <div class="row">
                <div class="col-12 col-md-4 mb-3">
                    <div class="img_div_rounded" style="background-image: url('{{ Storage::url($producto->imagen) }}');"></div>
                </div>
                <div class="col-12 col-md-8">
                    Selecciona la nueva imagen <label class="text-primary pointer" for="imagen"> Aquí</label>
                    <input type="file" hidden name="imagen_producto" id="imagen">
                    <div> <strong id="spanImagen"></strong> </div>
                </div>
            </div>
          </div>
            <div class="col-12 mb-4">
              <h5>Descripción</h5>
              <textarea class="form-control" require name="descripcion_producto">{{$producto->descripcion}}</textarea>
            </div>
            <div class="col-12 mb-4">
                <h5>Vehiculo / Aplicación</h5>
                <textarea class="form-control auto element-required" name="aplicacion"></textarea>
            </div>
            <div class="col-12 mb-4">
              <h5>Categoría</h5>
              <select name="categoria_producto" require class="form-control form-control" id="categoria_select">
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}" <?php if($categoria->id === $producto->categoria->id) echo 'selected' ?> >{{$categoria->category}}</option>
                @endforeach
              </select>
            </div>
          </div>


          <!-- Chumacera formulario -->
          <div class="params-forms" id="chumacera" style="display: none;">
            <input type="hidden" class="input-hidden" name="chumacera_info" value="" id="chumacera_inputs">
            <input type="hidden" name="chumacera_info_id" <?php if(isset($producto->chumacera->id)) echo "value=" . '"' . $producto->chumacera->id . '"'?> >
            <div class="row">
              <h3 class="col-12 mb-4">Parametros Chumacera</h3>
              <div class="col-12 col-md-6">

                <h5>Diametro chumacera</h5>
                <select class="form-control mb-4 chumacera element-required" name="diametro_chumacera">
                  @foreach($diametros_chum as $diametro)
                    <option value="{{$diametro->id}}" <?php if(isset($producto->chumacera->id)) if($diametro->id === $producto->chumacera->diametro_chum_id) echo 'selected' ?> >{{$diametro->valor}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6">
                <h5>Tipo chumacera</h5>
                <select class="form-control mb-4 chumacera element-required" name="tipo_chumacera">
                  @foreach($tipos_chum as $tipo)
                    <option value="{{$tipo->id}}" <?php if(isset($producto->chumacera->id)) if($tipo->id === $producto->chumacera->tipo_chum_id) echo 'selected' ?>>{{$tipo->tipo_chum}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6">
                <h5>Forma chumacera</h5>
                <select class="form-control mb-4 chumacera element-required" name="forma_chumacera">
                  @foreach($formas_chum as $forma)
                    <option value="{{$forma->id}}" <?php if(isset($producto->chumacera->id)) if($forma->id === $producto->chumacera->forma_chum_id) echo 'selected' ?>>{{$forma->forma_chum}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6">
                <h5>No Huecos</h5>
                <input class="form-control chumacera element-required" type="number" <?php if(isset($producto->chumacera->id)) echo "value=" . '"' . $producto->chumacera->No_huecos . '"'?> name="huecos_chumacera">
              </div>
            </div>
          </div>


          <!-- Cadena formulario -->
          <div class="params-forms" id="cadena" style="display: none;">
            <input type="hidden" name="cadena_info_id" <?php if(isset($producto->cadena->id)) echo "value=" . '"' . $producto->cadena->id . '"'?> >
            <input type="hidden" class="input-hidden" name="cadena_info" value="" id="cadena_inputs">
            <div class="row">
              <h3 class="col-12 mb-4">Parametros Cadena</h3>
              <div class="col-12 mb-4">
                <h5>pitch</h5>
                <input class="form-control cadena element-required" type="text" <?php if(isset($producto->cadena->id)) echo "value=" . '"' . $producto->cadena->pitch . '"'?> name="pitch_cadena">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Tipo Cadena</h5>
                <select class="form-control mb-4 cadena element-required" name="tipo_cadena">
                  @foreach($tipos_cadenas as $tipo_cadena)
                    <option value="{{$tipo_cadena->id}}" <?php if(isset($producto->cadena->id)) if($tipo_cadena->id === $producto->cadena->tipo_cadena_id) echo 'selected'  ?>>{{$tipo_cadena->tipo_cadena_texto}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Empate Cadena</h5>
                <select class="form-control cadena element-required" name="empate_cadena">
                  @foreach($tipos_empates as $tipo_empate)
                    <option value="{{$tipo_empate->id}}" <?php if(isset($producto->cadena->id)) if($tipo_empate->id === $producto->cadena->empate_id) echo 'selected' ?> >{{$tipo_empate->tipo_empate}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>


          <!-- Moto  formulario -->

          <div class="params-forms" id="moto" style="display: none;">
            <input type="hidden" name="moto_info_id" <?php if(isset($producto->moto->id)) echo "value=" . '"' . $producto->moto->id . '"'?> >
            <input type="hidden" class="input-hidden" name="moto_info" value="" id="moto_inputs">
            <div class="row">
              <h3 class="col-12 mb-4">Parametros Moto</h3>
              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro interno</h5>
                <input class="form-control moto element-required" type="number" <?php if(isset($producto->moto->id)) echo "value=" . '"' . $producto->moto->d_interno . '"'?> name="d_interno_moto" step="0.001">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro externo</h5>
                <input class="form-control moto element-required" type="number" <?php if(isset($producto->moto->id)) echo "value=" . '"' . $producto->moto->d_externo . '"'?> name="d_externo_moto" step="0.001">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Espesor</h5>
                <input class="form-control moto element-required" type="number" <?php if(isset($producto->moto->id)) echo "value=" . '"' . $producto->moto->espesor . '"'?> name="espesor_moto" step="0.001">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Tipo de Sello</h5>
                <select class="form-control moto element-required" name="sello_moto">
                  @foreach($tipo_sellos as $tipo_sello)
                    <option value="{{$tipo_sello->id}}" <?php if(isset($producto->moto->id)) if($tipo_sello->id === $producto->moto->tipo_sello_id) echo 'selected'  ?>>{{$tipo_sello->tipo_sello}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>


          <!-- Serie6000  formulario -->

          <div class="params-forms" id="serie6000" style="display: none;">
            <input type="hidden" name="serie6000_info_id" <?php if(isset($producto->serie6000->id)) echo "value=" . '"' . $producto->serie6000->id . '"'?> >
            <input type="hidden" class="input-hidden" name="serie6000_info" value="" id="serie6000_inputs">
            <div class="row">
              <h3 class="col-12 mb-4">Serie6000 Parametros</h3>
              <div class="col-12 mb-4">
                <h5>Rodamiento</h5>
                <input class="form-control serie6000 element-required" type="number" <?php if(isset($producto->serie6000->id)) echo "value=" . '"' . $producto->serie6000->rodamiento . '"'?> name="rodamiento_serie6000">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Tipo de Sello</h5>
                <select class="form-control serie6000 element-required" name="sello_serie6000">
                  @foreach($tipo_sellos as $tipo_sello)
                    <option value="{{$tipo_sello->id}}" <?php if(isset($producto->serie6000->id)) if($tipo_sello->id === $producto->serie6000->tipo_sello_id) echo 'selected'  ?>>{{$tipo_sello->tipo_sello}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro interno</h5>
                <input class="form-control serie6000 element-required" <?php if(isset($producto->serie6000->id)) echo "value=" . '"' . $producto->serie6000->d_interno . '"'?> type="number" name="d_interno_serie6000" step="0.001">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro externo</h5>
                <input class="form-control serie6000 element-required" <?php if(isset($producto->serie6000->id)) echo "value=" . '"' . $producto->serie6000->d_externo . '"'?> type="number" name="d_externo_serie6000" step="0.001">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Espesor</h5>
                <input class="form-control serie6000 element-required" type="number" <?php if(isset($producto->serie6000->id)) echo "value=" . '"' . $producto->serie6000->espesor . '"'?> name="espesor_serie6000" step="0.001">
              </div>
            </div>
          </div>


          <!-- Auto  formulario -->

          <div class="params-forms" id="auto" style="display: none;">
            <input type="hidden" name="auto_info_id" <?php if(isset($producto->auto->id)) echo "value=" . '"' . $producto->auto->id . '"'?>>
            <input type="hidden" class="input-hidden" name="auto_info" value="" id="auto_inputs">
            <div class="row">
              <h3 class="col-12 mb-4">Auto Parametros</h3>
              <div class="col-12  mb-4">
                <h5>Articulo</h5>
                <input class="form-control auto element-required" type="text" <?php if(isset($producto->auto->id)) echo "value=" . '"' . $producto->auto->articulo . '"'?> name="articulo_auto">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Posicion</h5>
                <select class="form-control auto element-required" name="posicion_auto">
                  @foreach($posiciones as $posicion)
                    <option value="{{$posicion->id}}" <?php if(isset($producto->auto->id)) if($posicion->id === $producto->auto->posicion_id) echo 'selected'  ?>>{{$posicion->posicion}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro interno</h5>
                <input class="form-contro auto element-required" type="number" <?php if(isset($producto->auto->id)) echo "value=" . '"' . $producto->auto->d_interno . '"'?> name="d_interno_auto" step="0.001">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro externo</h5>
                <input class="form-control auto element-required" type="number" <?php if(isset($producto->auto->id)) echo "value=" . '"' . $producto->auto->d_externo . '"'?> name="d_externo_auto" step="0.001">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Espesor</h5>
                <input class="form-control auto element-required" type="number" <?php if(isset($producto->auto->id)) echo "value=" . '"' . $producto->auto->espesor . '"'?> name="espesor_auto" step="0.001">
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-12 mb-5">
                <span class="loader align-middle" id="load"></span>
                @can('cms.products.update')
                <input type="submit" class="btn btn-primary px-5" value="Actualizar producto" id="buttonAction">
                @endcan
                <a class="btn btn-danger px-5" href="{{ route('cms.products.show') }}">Cancelar</a>
            </div>
          </div>

      </form>
  </div>
</section>


<script type="text/javascript">
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

  document.addEventListener('DOMContentLoaded', () => {
    const catSelect = document.getElementById('categoria_select');
    let opcion = catSelect.options[catSelect.selectedIndex]
    activeForms(opcion)
  });


//funcion para activar los formularios
  function activeForms(target){

    offForms()

    if (target.text === "Serie Automotriz") {

      let form = document.querySelector('#auto')
      let inputHidden = document.querySelector('#auto_inputs');
      let formularios = document.querySelectorAll('.auto');
      inputHidden.value = 'active'
      form.style.display = 'flex';

      formularios.forEach(formulario => {
        formulario.setAttribute('required', true)
      })

    } else if(target.text === "Serie 6000") {

      let form = document.querySelector('#serie6000')
      let inputHidden = document.querySelector('#serie6000_inputs');
      let formularios = document.querySelectorAll('.serie6000');
      inputHidden.value = 'active'
      form.style.display = 'flex';

      formularios.forEach(formulario => {
        formulario.setAttribute('required', true)
      });

    } else if(target.text === "Serie Moto") {

      let form = document.querySelector('#moto')
      let inputHidden = document.querySelector('#moto_inputs');
      let formularios = document.querySelectorAll('.moto');
      inputHidden.value = 'active'
      form.style.display = 'flex';

      formularios.forEach(formulario => {
        formulario.setAttribute('required', true)
      })

    } else if(target.text === "Serie Cadenas") {

      let form = document.querySelector('#cadena')
      let inputHidden = document.querySelector('#cadena_inputs');
      let formularios = document.querySelectorAll('.cadena');
      inputHidden.value = 'active'
      form.style.display = 'flex';

      formularios.forEach(formulario => {
        formulario.setAttribute('required', true)
      })

    } else if(target.text === "Serie Chumacera") {
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
  function offForms(){
    let inputsHiddens = document.querySelectorAll('.input-hidden');
    let formulariosRequired = document.querySelectorAll('.element-required');


    formulariosRequired.forEach(element => {
      element.removeAttribute('required')
    })


    formularios.forEach( form => {
      form.style.display = 'none';
    });

    inputsHiddens.forEach( input => {
      input.value = '';
    });
  }
</script>

<script type="text/javascript">
  function string_to_slug (str) {
      str = str.replace(/^\s+|\s+$/g, ''); // trim
      str = str.toLowerCase();

      // remove accents, swap ñ for n, etc
      var from = "àáãäâèéëêìíïîòóöôùúüûñç·/_,:;";
      var to   = "aaaaaeeeeiiiioooouuuunc------";

      for (var i=0, l=from.length ; i<l ; i++) {
          str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
      }

      str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
          .replace(/\s+/g, '-') // collapse whitespace and replace by -
          .replace(/-+/g, '-'); // collapse dashes

      return str;
  }




  function init(){
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
