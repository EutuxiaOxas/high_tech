@extends('cms')


@section('content')
<section>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Crear Servicios</h1>
  </div>


  <div class="">
      @if(session('message'))
        <div class="alert alert-success" role="alert">
          {{session('message')}}
        </div>
      @endif
      <form action="/cms/guardar/producto" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="producto_slug" value="" name="slug">
        <div class="row">
          <div class="col-12 col-md-6 mb-4">
            <h5>Titulo</h5>
            <input class="form-control" id="titulo_producto" type="text" maxlength="191" required name="titulo_producto" value="" placeholder="Titulo">
          </div>
          <div class="col-12 col-md-6 mb-4">
            <h5>Precio</h5>
            <input class="form-control" type="number" required name="precio_producto" value="" placeholder="Precio">
          </div>
          <div class="col-12 col-md-6 mb-4">
            <h5>Código Universal</h5>
            <input class="form-control" type="text" required name="codigo_producto" value="" placeholder="Código Universal">
          </div>
          <div class="col-12 col-md-6 mb-4">
              <h5 style="display: block">Imagen</h5>
              <input type="file" required name="imagen_producto">
            </div>
            <div class="col-12 mb-4">
              <h5>Descripción</h5>
              <textarea class="form-control" required name="descripcion_producto"></textarea>
            </div>
            <div class="col-12 mb-4">
              <h5>Categoría</h5>
              <select name="categoria_producto" class="form-control form-control" id="categoria_select">
                <option>Selecciona una Categoría</option>
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->category}}</option>
                @endforeach
              </select>
            </div>
          </div>


          <!-- Chumacera formulario -->
          <div class="params-forms" id="chumacera" style="display: none;">
            <input type="hidden" class="input-hidden" name="chumacera_info" value="" id="chumacera_inputs">
            <div class="row">
              <h3 class="col-12 mb-4">Parametros Chumacera</h3>
              <div class="col-12 col-md-6">

                <h5>Diametro chumacera</h5>
                <select class="form-control mb-4 chumacera element-required" name="diametro_chumacera">
                  @foreach($diametros_chum as $diametro)
                    <option value="{{$diametro->id}}">{{$diametro->valor}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6">
                <h5>Tipo chumacera</h5>
                <select class="form-control mb-4 chumacera element-required" name="tipo_chumacera">
                  @foreach($tipos_chum as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->tipo_chum}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6">
                <h5>Forma chumacera</h5>
                <select class="form-control mb-4 chumacera element-required" name="forma_chumacera">
                  @foreach($formas_chum as $forma)
                    <option value="{{$forma->id}}">{{$forma->forma_chum}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6">
                <h5>No Huecos</h5>
                <input class="form-control chumacera element-required" type="number" name="huecos_chumacera">
              </div>
            </div>
          </div>


          <!-- Cadena formulario -->


          <div class="params-forms" id="cadena" style="display: none;">
            <input type="hidden" class="input-hidden" name="cadena_info" value="" id="cadena_inputs">
            <div class="row">
              <h3 class="col-12 mb-4">Parametros Cadena</h3>
              <div class="col-12 mb-4">
                <h5>pitch</h5>
                <input class="form-control cadena element-required" type="number" name="pitch_cadena">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Tipo Cadena</h5>
                <select class="form-control mb-4 cadena element-required" name="tipo_cadena">
                  @foreach($tipos_cadenas as $tipo_cadena)
                    <option value="{{$tipo_cadena->id}}">{{$tipo_cadena->tipo_cadena_texto}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Empate Cadena</h5>
                <select class="form-control cadena element-required" name="empate_cadena">
                  @foreach($tipos_empates as $tipo_empate)
                    <option value="{{$tipo_empate->id}}">{{$tipo_empate->tipo_empate}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>


          <!-- Moto  formulario -->


          <div class="params-forms" id="moto" style="display: none;">
            <input type="hidden" class="input-hidden" name="moto_info" value="" id="moto_inputs">
            <div class="row">
              <h3 class="col-12 mb-4">Parametros Moto</h3>
              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro interno</h5>
                <input class="form-control moto element-required" type="number" name="d_interno_moto">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro externo</h5>
                <input class="form-control moto element-required" type="number" name="d_externo_moto">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Espesor</h5>
                <input class="form-control moto element-required" type="number" name="espesor_moto">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Tipo de Sello</h5>
                <select class="form-control moto element-required" name="sello_moto">
                  @foreach($tipo_sellos as $tipo_sello)
                    <option value="{{$tipo_sello->id}}">{{$tipo_sello->tipo_sello}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>


          <!-- Serie6000  formulario -->

          <div class="params-forms" id="serie6000" style="display: none;">
            <input type="hidden" class="input-hidden" name="serie6000_info" value="" id="serie6000_inputs">
            <div class="row">
              <h3 class="col-12 mb-4">Serie6000 Parametros</h3>
              <div class="col-12 mb-4">
                <h5>Rodamiento</h5>
                <input class="form-control serie6000 element-required" type="number" name="rodamiento_serie6000">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Tipo de Sello</h5>
                <select class="form-control serie6000 element-required" name="sello_serie6000">
                  @foreach($tipo_sellos as $tipo_sello)
                    <option value="{{$tipo_sello->id}}">{{$tipo_sello->tipo_sello}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro interno</h5>
                <input class="form-control serie6000 element-required" type="number" name="d_interno_serie6000">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro externo</h5>
                <input class="form-control serie6000 element-required" type="number" name="d_externo_serie6000">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Espesor</h5>
                <input class="form-control serie6000 element-required" type="number" name="espesor_serie6000">
              </div>
            </div>
          </div>


          <!-- Auto  formulario -->

          <div class="params-forms" id="auto" style="display: none;">
            <input type="hidden" class="input-hidden" name="auto_info" value="" id="auto_inputs">
            <div class="row">
              <h3 class="col-12 mb-4">Auto Parametros</h3>
              <div class="col-12  mb-4">
                <h5>Articulo</h5>
                <input class="form-control auto element-required" type="text" name="articulo_auto">
              </div>

              <div class="col-12  mb-4">
                <h5>Aplicacion</h5>
                <textarea class="form-control auto element-required" name="aplicacion_auto"></textarea>
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Posicion</h5>
                <select class="form-control auto element-required" name="posicion_auto">
                  @foreach($posiciones as $posicion)
                    <option value="{{$posicion->id}}">{{$posicion->posicion}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro interno</h5>
                <input class="form-control auto element-required" type="number" name="d_interno_auto">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro externo</h5>
                <input class="form-control auto element-required" type="number" name="d_externo_auto">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Espesor</h5>
                <input class="form-control auto element-required" type="number" name="espesor_auto">
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-12 mb-5">
              <input type="submit" class="btn btn-primary" value="Crear">
            </div>
          </div>
        
      </form>
  </div>
</section>

<script type="text/javascript">
  const catSelect = document.getElementById('categoria_select');
  let formularios = document.querySelectorAll('.params-forms');
  


//evento cambio select
  catSelect.addEventListener('change', (e) => {
    let opcion = e.target.options[catSelect.selectedIndex]
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
      })

    } else if(target.text === "Serie Moto") {

      let form = document.querySelector('#moto')
      let inputHidden = document.querySelector('#moto_inputs');
      let formularios = document.querySelectorAll('.moto');
      inputHidden.value = 'active'
      form.style.display = 'flex';

      formularios.forEach(formulario => {
        formulario.setAttribute('required', true)
      })

    } else if(target.text === "Serie cadenas") {

      let form = document.querySelector('#cadena')
      let inputHidden = document.querySelector('#cadena_inputs');
      let formularios = document.querySelectorAll('.cadena');
      inputHidden.value = 'active'
      form.style.display = 'flex';

      formularios.forEach(formulario => {
        formulario.setAttribute('required', true)
      })

    } else if(target.text === "Chumaceras") {
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