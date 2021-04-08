@extends('cms')

@php
    $section = 'blog';
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
    <div class="alert alert-danger my-3" role="alert">
      {{session('message')}}
    </div>
  @endif

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Blog Articulos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a href="/cms/blog/crear/articulos" type="button" class="btn btn-sm btn-outline-primary px-5">Agregar Articulo</a>
      </div>
    </div>
  </div>


  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Imagen</th>
          <th>Titulo</th>
          <th>Autor</th>
          <th>Fecha</th>
          <th>Categoria</th>
          <th>acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($articulos as $articulo)
          <tr>
            <td>{{$articulo->id}}</td>
            <td>
                <div class="img_div_rounded" style="background-image: url('{{ asset('blog_articulos_imagen/'. $articulo->picture) }}');"></div>
            </td>
            <td>{{$articulo->title}}</td>
            <td>{{$articulo->autor->name}}</td>
            <td>{{$articulo->date}}</td>
            <td>{{$articulo->categoria->name}}</td>
            <td class="d-flex">
                <a href="/cms/blog/editar/articulo/{{$articulo->id}}">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.75 7.0025L10 3.2525L0.15 13.1025C0.0500001 13.2025 0 13.3225 0 13.4625V16.5025C0 16.7825 0.22 17.0025 0.5 17.0025H3.54C3.67 17.0025 3.8 16.9525 3.89 16.8525L13.75 7.0025ZM16.71 4.0425C17.1 3.6525 17.1 3.0225 16.71 2.6325L14.37 0.2925C13.98 -0.0975 13.35 -0.0975 12.96 0.2925L11 2.2525L14.75 6.0025L16.71 4.0425Z" fill="#226F87"/>
                    </svg>
                </a>
              <form action="/cms/blog/eliminar/articulo/{{$articulo->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn p-0 ml-3" value="Eliminar" type="submit">
                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V6C13 4.9 12.1 4 11 4H3C1.9 4 1 4.9 1 6V16ZM13 1H10.5L9.79 0.29C9.61 0.11 9.35 0 9.09 0H4.91C4.65 0 4.39 0.11 4.21 0.29L3.5 1H1C0.45 1 0 1.45 0 2C0 2.55 0.45 3 1 3H13C13.55 3 14 2.55 14 2C14 1.45 13.55 1 13 1Z" fill="#CE3F3D"/>
                    </svg>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>

@endsection






