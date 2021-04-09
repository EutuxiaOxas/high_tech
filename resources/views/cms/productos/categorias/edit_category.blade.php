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
    <h1 class="h2">Editar Categoría</h1>
  </div>


  <div class="">
      @if(session('message'))
        <div class="alert alert-success" role="alert">
          {{session('message')}}
        </div>
      @endif
      <form action="/cms/actualizar/product/category/{{$category->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <h5>Categoría</h5>
                <input class="form-control"  type="text" require name="category" value="{{$category->category}}" placeholder="Titulo" disabled>
            </div>
            <div class="col-12 col-md-6 mb-4">
                <h5 style="display: block">Catálogo PDF</h5>
                Selecciona el catálogo <label class="text-primary pointer" for="catalogo_pdf"> Aquí</label>
                <input type="file" name="catalogo_pdf" id="catalogo_pdf" hidden>
                <div> <strong id="spanPdf"></strong> </div>
            </div>
            <div class="col-12 mb-4">
                <div class="row">
                    <div class="col-12 col-md-4 mb-3">
                        <div class="img_div_rounded" style="background-image: url('{{ asset('imagenes/series_logos/'. $category->imagen) }}');"></div>
                    </div>
                    <div class="col-12 col-md-8">
                        Selecciona la nueva imagen <label class="text-primary pointer" for="imagen"> Aquí</label>
                        <input type="file" hidden name="imagen" id="imagen">
                        <div> <strong id="spanImagen"></strong> </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
              <h5>Descripción</h5>
              <textarea class="form-control" require name="description">{{$category->description}}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-5">
                @can('cms.products.categories.update')
                <input type="submit" class="btn btn-primary" value="Actualizar">
                @endcan
            </div>
        </div>

      </form>
  </div>
</section>

<script type="text/javascript">
    const imagenFile = document.getElementById('imagen');
    const pdfFile = document.getElementById('catalogo_pdf');


    imagenFile.onchange = function() {
        const spanImagen = document.getElementById('spanImagen');
        const nameImagen = imagenFile.files[0].name;
        spanImagen.innerHTML = nameImagen;
    }

    pdfFile.onchange = function() {
        const spanPdf = document.getElementById('spanPdf');
        const namePdf = pdfFile.files[0].name;
        spanPdf.innerHTML = namePdf;
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
