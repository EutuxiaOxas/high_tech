@extends('cms')
@php
    $section = 'productos';
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
<section>

  @if(session('message'))
    <div class="alert alert-danger" role="alert">
      {{session('message')}}
    </div>
  @endif

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categorías de productos</h1>
    {{-- <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a href="/cms/crear/productos" type="button" class="btn btn-sm btn-primary px-5">Agregar Producto</a>
      </div>
    </div> --}}
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Categoría</th>
          <th>Descripción</th>
          <th>Catálogo Pdf</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categorias as $category)
          <tr>
            <td>
                <div class="img_div_rounded" style="background-image: url('{{ asset('imagenes/series_logos/'. $category->imagen) }}');"></div>
            </td>
            <td>{{$category->category}}</td>
            <td>{{$category->description}}</td>
            <td>
                @isset($category->pdf)
                    <a class="text-primary" target="_blank" href="{{ asset('pdfs/'. $category->pdf) }}">{{$category->pdf}}</a>
                @endisset
            </td>
            <td class="d-flex">
              <a href="/cms/editar/producto/category/{{$category->id}}"class="btn btn-sm btn-outline-primary mr-2 editar">Editar</a>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>

@endsection
