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
          <h3 class="card-title">Éxito!</h3>
          <div class="card-tools ml-auto">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            {{ session('message') }}
        </div>
      </div>
    @endif

    @if (session('info'))
        <div class="card card-info">
            <div class="card-header row align-items-center justify-content-between mx-0">
            <h3 class="card-title">Ops!</h3>
            <div class="card-tools ml-auto">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
            </div>
            <div class="card-body">
                {{ session('info') }}
            </div>
        </div>
    @endif

    <section class="content-header px-0">
        <div class="container-fluid px-0">
          <div class="row mb-2 px-0">
            <div class="col-sm-6">
              <span class="font-light text-lg">Parametros por categorías (series)</span>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href=" {{ route('cms.index') }} ">Home</a></li>
                <li class="breadcrumb-item active">Parámetros</li>
              </ol>
            </div>
          </div>
        </div>
    </section>


    {{-- Serie Automotriz --}}
    <div class="row">
        <div class="col px-0">
            <div class="card">
                <div class="card-header row justify-content-between align-items-center mx-0">
                    <h3 class="card-title col col-md-2">Serie Automoriz</h3>
                    <a class="btn btn-primary btn-sm ml-2" href="/cms/parameters/crear/auto">Agregar parametro</a>
                    <div class="card-tools ml-auto">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 10%">Id</th>
                                <th style="width: 65%">Posición de la rueda</th>
                                <th style="width: 25%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posiciones as $posicion)
                            <tr>
                                <td>{{$posicion->id}}</td>
                                <td>{{ $posicion->posicion }}</td>
                                <td>
                                    @can('cms.products.parameters.edit')
                                        <a href="/cms/parameters/editar/{{$posicion->id}}/auto"class="btn btn-sm btn-primary mr-2 editar">Editar</a>
                                    @endcan
                                    @can('cms.products.parameters.destroy')
                                        <form class="d-inline" action=" {{ route('cms.products.parameters.destroy', $posicion->id) }} " method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger mr-2" type="submit">Eliminar</button>
                                            <input type="hidden" name="serie" value="auto" hidden>
                                            <input type="hidden" name="id" value="{{$posicion->id}}" hidden>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Serie Chumacera --}}
    <div class="row">
        <div class="col px-0">
            <div class="card">
                <div class="card-header row justify-content-between align-items-center mx-0">
                    <h3 class="card-title col col-md-2">Serie Chumacera</h3>
                    <a class="btn btn-primary btn-sm ml-2" href="/cms/parameters/crear/chumacera">Agregar parametro</a>
                    <div class="card-tools ml-auto">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 10%">Id</th>
                                <th style="width: 65%">Tipo brida</th>
                                <th style="width: 25%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bridas as $brida)
                            <tr>
                                <td>{{$brida->id}}</td>
                                <td>{{$brida->tipo_chum}}</td>
                                <td>
                                    @can('cms.products.parameters.edit')
                                    <a href="/cms/parameters/editar/{{$brida->id}}/chumacera"class="btn btn-sm btn-primary mr-2 editar">Editar</a>
                                    @endcan
                                    @can('cms.products.parameters.destroy')
                                    <form class="d-inline" action=" {{ route('cms.products.parameters.destroy', $brida->id) }} " method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger mr-2" type="submit">Eliminar</button>
                                        <input type="hidden" name="serie" value="chumacera" hidden>
                                        <input type="hidden" name="id" value="{{$brida->id}}" hidden>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- Serie Cadenas --}}
    <div class="row">
        <div class="col px-0">
            <div class="card">
                <div class="card-header row justify-content-between align-items-center mx-0">
                    <h3 class="card-title col col-md-2">Serie Cadenas</h3>
                    <a class="btn btn-primary btn-sm ml-2" href="/cms/parameters/crear/cadena">Agregar parametro</a>
                    <div class="card-tools ml-auto">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 10%">Id</th>
                                <th style="width: 65%">Tipo brida</th>
                                <th style="width: 25%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cadenas as $cadena)
                            <tr>
                                <td>{{$cadena->id}}</td>
                                <td>{{$cadena->tipo_cadena_texto}}</td>
                                <td>
                                    @can('cms.products.parameters.edit')
                                    <a href="/cms/parameters/editar/{{$cadena->id}}/cadena"class="btn btn-sm btn-primary mr-2 editar">Editar</a>
                                    @endcan
                                    @can('cms.products.parameters.destroy')
                                    <form class="d-inline" action=" {{ route('cms.products.parameters.destroy', $cadena->id) }} " method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger mr-2" type="submit">Eliminar</button>
                                        <input type="hidden" name="serie" value="cadena" hidden>
                                        <input type="hidden" name="id" value="{{$cadena->id}}" hidden>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- Serie Cadenas --}}
    <div class="row">
        <div class="col px-0">
            <div class="card">
                <div class="card-header row justify-content-between align-items-center mx-0">
                    <h3 class="card-title col col-md-2">Serie 6000 y Serie Moto</h3>
                    <a class="btn btn-primary btn-sm ml-2" href="/cms/parameters/crear/6000">Agregar parametro</a>
                    <div class="card-tools ml-auto">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 10%">Id</th>
                                <th style="width: 65%">Tipo de sellos</th>
                                <th style="width: 25%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sellos as $sello)
                            <tr>
                                <td>{{$sello->id}}</td>
                                <td>{{$sello->tipo_sello}}</td>
                                <td>
                                    @can('cms.products.parameters.edit')
                                    <a href="/cms/parameters/editar/{{$sello->id}}/sello"class="btn btn-sm btn-primary mr-2 editar">Editar</a>
                                    @endcan
                                    @can('cms.products.parameters.destroy')
                                    <form class="d-inline" action=" {{ route('cms.products.parameters.destroy', $sello->id) }} " method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger mr-2" type="submit">Eliminar</button>
                                        <input type="hidden" name="serie" value="sello" hidden>
                                        <input type="hidden" name="id" value="{{$sello->id}}" hidden>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection




