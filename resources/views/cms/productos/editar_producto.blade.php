@extends('cms')


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
      <form action="/cms/actualizar/producto/{{$producto->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-12 col-md-6 mb-4">
            <h5>Titulo</h5>
            <input class="form-control" type="text" name="titulo_producto" value="{{$producto->titulo}}" placeholder="Titulo">
          </div>
          <div class="col-12 col-md-6 mb-4">
            <h5>Precio</h5>
            <input class="form-control" type="number" name="precio_producto" value="{{$producto->precio}}" placeholder="Precio">
          </div>
          <div class="col-12 col-md-6 mb-4">
            <h5>Código Universal</h5>
            <input class="form-control" type="text" name="codigo_producto" value="{{$producto->codigo_universal}}" placeholder="Código Universal">
          </div>
          <div class="col-12 col-md-6 mb-4">
              <h5 style="display: block">Imagen</h5>
              <input type="file" name="imagen_producto">
            </div>
            <div class="col-12 mb-4">
              <h5>Descripción</h5>
              <textarea class="form-control" name="descripcion_producto">{{$producto->descripcion}}</textarea>
            </div>
            <div class="col-12 mb-4">
              <h5>Categoría</h5>
              <select name="categoria_producto" class="form-control form-control" id="categoria_select">
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
                <select class="form-control mb-4" name="diametro_chumacera">
                  @foreach($diametros_chum as $diametro)
                    <option value="{{$diametro->id}}" <?php if(isset($producto->chumacera->id)) if($diametro->id === $producto->chumacera->diametro_chum_id) echo 'selected' ?> >{{$diametro->valor}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6">
                <h5>Tipo chumacera</h5>
                <select class="form-control mb-4" name="tipo_chumacera">
                  @foreach($tipos_chum as $tipo)
                    <option value="{{$tipo->id}}" <?php if(isset($producto->chumacera->id)) if($tipo->id === $producto->chumacera->tipo_chum_id) echo 'selected' ?>>{{$tipo->tipo_chum}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6">
                <h5>Forma chumacera</h5>
                <select class="form-control mb-4" name="forma_chumacera">
                  @foreach($formas_chum as $forma)
                    <option value="{{$forma->id}}" <?php if(isset($producto->chumacera->id)) if($forma->id === $producto->chumacera->forma_chum_id) echo 'selected' ?>>{{$forma->forma_chum}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6">
                <h5>No Huecos</h5>
                <input class="form-control" type="number" <?php if(isset($producto->chumacera->id)) echo "value=" . '"' . $producto->chumacera->No_huecos . '"'?> name="huecos_chumacera">
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
                <input class="form-control" type="number" <?php if(isset($producto->cadena->id)) echo "value=" . '"' . $producto->cadena->pitch . '"'?> name="pitch_cadena">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Tipo Cadena</h5>
                <select class="form-control mb-4" name="tipo_cadena">
                  @foreach($tipos_cadenas as $tipo_cadena)
                    <option value="{{$tipo_cadena->id}}" <?php if(isset($producto->cadena->id)) if($tipo_cadena->id === $producto->cadena->tipo_cadena_id) echo 'selected'  ?>>{{$tipo_cadena->tipo_cadena_texto}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Empate Cadena</h5>
                <select class="form-control" name="empate_cadena">
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
                <input class="form-control" type="number" <?php if(isset($producto->moto->id)) echo "value=" . '"' . $producto->moto->d_interno . '"'?> name="d_interno_moto">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro externo</h5>
                <input class="form-control" type="number" <?php if(isset($producto->moto->id)) echo "value=" . '"' . $producto->moto->d_externo . '"'?> name="d_externo_moto">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Espesor</h5>
                <input class="form-control" type="number" <?php if(isset($producto->moto->id)) echo "value=" . '"' . $producto->moto->espesor . '"'?> name="espesor_moto">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Tipo de Sello</h5>
                <select class="form-control" name="sello_moto">
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
                <input class="form-control" type="number" <?php if(isset($producto->serie6000->id)) echo "value=" . '"' . $producto->serie6000->rodamiento . '"'?> name="rodamiento_serie6000">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Tipo de Sello</h5>
                <select class="form-control" name="sello_serie6000">
                  @foreach($tipo_sellos as $tipo_sello)
                    <option value="{{$tipo_sello->id}}" <?php if(isset($producto->serie6000->id)) if($tipo_sello->id === $producto->serie6000->tipo_sello_id) echo 'selected'  ?>>{{$tipo_sello->tipo_sello}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro interno</h5>
                <input class="form-control" <?php if(isset($producto->serie6000->id)) echo "value=" . '"' . $producto->serie6000->d_interno . '"'?> type="number" name="d_interno_serie6000">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro externo</h5>
                <input class="form-control" <?php if(isset($producto->serie6000->id)) echo "value=" . '"' . $producto->serie6000->d_externo . '"'?> type="number" name="d_externo_serie6000">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Espesor</h5>
                <input class="form-control" type="number" <?php if(isset($producto->serie6000->id)) echo "value=" . '"' . $producto->serie6000->espesor . '"'?> name="espesor_serie6000">
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
                <input class="form-control" type="text" <?php if(isset($producto->auto->id)) echo "value=" . '"' . $producto->auto->articulo . '"'?> name="articulo_auto">
              </div>

              <div class="col-12  mb-4">
                <h5>Aplicacion</h5>
                <textarea class="form-control" name="aplicacion_auto"><?php if(isset($producto->auto->id)) echo $producto->auto->aplicacion?></textarea>
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Posicion</h5>
                <select class="form-control" name="posicion_auto">
                  @foreach($posiciones as $posicion)
                    <option value="{{$posicion->id}}" <?php if(isset($producto->auto->id)) if($posicion->id === $producto->auto->posicion_id) echo 'selected'  ?>>{{$posicion->posicion}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro interno</h5>
                <input class="form-control" type="number" <?php if(isset($producto->auto->id)) echo "value=" . '"' . $producto->auto->d_interno . '"'?> name="d_interno_auto">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Diametro externo</h5>
                <input class="form-control" type="number" <?php if(isset($producto->auto->id)) echo "value=" . '"' . $producto->auto->d_externo . '"'?> name="d_externo_auto">
              </div>

              <div class="col-12 col-md-6 mb-4">
                <h5>Espesor</h5>
                <input class="form-control" type="number" <?php if(isset($producto->auto->id)) echo "value=" . '"' . $producto->auto->espesor . '"'?> name="espesor_auto">
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-12 mb-5">
              <input type="submit" class="btn btn-primary" value="Actualizar">
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
      inputHidden.value = 'active'
      form.style.display = 'flex';

    } else if(target.text === "Serie 6000") {
      
      let form = document.querySelector('#serie6000')
      let inputHidden = document.querySelector('#serie6000_inputs');
      inputHidden.value = 'active'
      form.style.display = 'flex';

    } else if(target.text === "Serie Moto") {

      let form = document.querySelector('#moto')
      let inputHidden = document.querySelector('#moto_inputs');
      inputHidden.value = 'active'
      form.style.display = 'flex';

    } else if(target.text === "Serie cadenas") {

      let form = document.querySelector('#cadena')
      let inputHidden = document.querySelector('#cadena_inputs');
      inputHidden.value = 'active'
      form.style.display = 'flex';

    } else if(target.text === "Chumaceras") {
      let form = document.querySelector('#chumacera')
      let inputHidden = document.querySelector('#chumacera_inputs');
      inputHidden.value = 'active'
      form.style.display = 'flex';
    }
  }


//resetea los formularios
  function offForms(){
    let inputsHiddens = document.querySelectorAll('.input-hidden');



    formularios.forEach( form => {
      form.style.display = 'none';
    });

    inputsHiddens.forEach( input => {
      input.value = '';
    });
  }
</script>

@endsection