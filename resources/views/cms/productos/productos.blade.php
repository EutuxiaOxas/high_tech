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
    <div class="py-1"></div>

    @if (session('message'))
      <div class="card card-success">
        <div class="card-header row align-items-center justify-content-between mx-0">
          <h3 class="card-title">{{ session('message') }}</h3>
          <div class="card-tools ml-auto">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
        </div>
      </div>
    @endif

    @if (session('info'))
        <div class="card card-info">
            <div class="card-header row align-items-center justify-content-between mx-0">
            <h3 class="card-title">{{ session('info') }}</h3>
            <div class="card-tools ml-auto">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
            </div>
        </div>
    @endif

    <section class="content-header px-0">
        <div class="container-fluid px-0">
          <div class="row mb-2 px-0">
            <div class="col-sm-6">
              <span class="font-light text-lg">Productos</span>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href=" {{ route('cms.index') }} ">Home</a></li>
                <li class="breadcrumb-item active">Productos</li>
              </ol>
            </div>
          </div>
        </div>
    </section>

    <div class="row">
        <div class="col px-0">
            <div class="card">
                <div class="card-header row justify-content-between align-items-center mx-0">
                    <h3 class="card-title col">Productos creados</h3>
                    <a class="btn btn-primary btn-sm ml-2 text-white" href="/cms/crear/productos">Agregar producto</a>
                    <div class="card-tools ml-auto">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Imagen</th>
                                <th>Titulo</th>
                                <th>Categoría</th>
                                <th>Precio $</th>
                                <th>codigo universal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                            <tr>
                                <td>{{$producto->id}}</td>
                                <td>
                                    <div class="img_div_rounded" style="background-image: url('{{ Storage::url($producto->imagen) }}');"></div>
                                </td>
                                <td> <a class="text-primary" target="_blank" href="{{route('product', $producto->slug)}}">{{$producto->titulo}}</a></td>
                                <td>{{$producto->categoria->category}}</td>
                                <td class="text-center">
                                    <strong>
                                        @php $price = number_format($producto->precio, 2, '.', ','); @endphp
                                        {{ $price }}
                                    </strong>
                                </td>
                                <td class="text-center">{{$producto->codigo_universal }}</td>
                                <td>
                                    @can('cms.products.edit')
                                    <a href="/cms/editar/producto/{{$producto->id}}">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.75 7.0025L10 3.2525L0.15 13.1025C0.0500001 13.2025 0 13.3225 0 13.4625V16.5025C0 16.7825 0.22 17.0025 0.5 17.0025H3.54C3.67 17.0025 3.8 16.9525 3.89 16.8525L13.75 7.0025ZM16.71 4.0425C17.1 3.6525 17.1 3.0225 16.71 2.6325L14.37 0.2925C13.98 -0.0975 13.35 -0.0975 12.96 0.2925L11 2.2525L14.75 6.0025L16.71 4.0425Z" fill="#226F87"/>
                                        </svg>
                                    </a>
                                    @endcan
                                    @can('cms.products.destroy')
                                    <button class="btn p-0 ml-3" value="Eliminar" data-toggle="modal" data-target='#modalDelete{{$producto->id}}'>
                                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V6C13 4.9 12.1 4 11 4H3C1.9 4 1 4.9 1 6V16ZM13 1H10.5L9.79 0.29C9.61 0.11 9.35 0 9.09 0H4.91C4.65 0 4.39 0.11 4.21 0.29L3.5 1H1C0.45 1 0 1.45 0 2C0 2.55 0.45 3 1 3H13C13.55 3 14 2.55 14 2C14 1.45 13.55 1 13 1Z" fill="#CE3F3D"/>
                                        </svg>
                                    </button>
                                    
                                    @endcan
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id='modalDelete{{$producto->id}}' data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Eliminar <strong>{{$producto->titulo}}</strong></h5>
                                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">x</button>
                                    </div>
                                    <form action="/cms/eliminar/producto/{{$producto->id}}" method="POST">
                                        <div class="modal-body">
                                            @csrf
                                            @method('DELETE')
                                            <span>¿Esta seguro que desea elimnar este producto?</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-sm btn-danger px-5">Eliminar</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->




@endsection






