@extends('layouts.admin')
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
    <h1 class="h2">Editar Categoría</h1>
  </div>


  <div class="">
      <form action="/cms/parameters/actualizar/{{$parametro->id}}" method="POST" enctype="multipart/form-data" id="formSubmit">
        @csrf
        <input type="hidden" value="{{ $serie }}" name="serie">
        <input type="hidden" value="{{$parametro->id}}" name="id">
        <div class="row">

            <div class="col-12 col-md-6 mb-4">
                <h5>Nombre del parametro</h5>
                @if ( $serie == 'auto' )
                @php
                    $parameter = $parametro->posicion;
                @endphp
                @elseif( $serie == 'chumacera' )
                @php
                    $parameter = $parametro->tipo_chum;
                @endphp
                @elseif( $serie == 'cadena' )
                @php
                    $parameter = $parametro->tipo_cadena_texto;
                @endphp
                @else
                @php
                    $parameter = $parametro->tipo_sello;
                @endphp
                @endif
                <input class="form-control" id="titulo_producto" type="text" maxlength="191" required name="parameter" value="{{ $parameter }}">
            </div>

        </div>

        <div class="row">
            <div class="col-12 mb-5">
                <span class="loader align-middle" id="load"></span>
                @can('cms.products.parameters.update')
                <input type="submit" class="btn btn-primary px-5" value="Actualizar">
                @endcan
                <a class="btn btn-danger px-5" href="{{ route('cms.products.parameters.show') }}">Cancelar</a>
            </div>
        </div>

      </form>
  </div>
</section>

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
