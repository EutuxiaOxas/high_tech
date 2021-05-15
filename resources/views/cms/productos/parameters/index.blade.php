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

    @if(session('info'))
        <div class="alert alert-success alert-dismissible my-3" role="alert">
            <strong>{{session('info')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('message'))
        <div class="alert alert-danger alert-dismissible my-3" role="alert">
            <strong>{{session('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Parametros de las categorias de productos</h1>
  </div>

    {{-- Serie automotriz --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="h4">Serie Automotriz</h4>
            </div>
            <div class="col ml-auto text-right">
                <form action="/cms/parameters/crear/auto">
                    <button type="submit" class="btn btn-primary btn-sm">Agregar parametro</button>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th>#</th>
                <th>Posicion de la rueda</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posiciones as $posicion)
                <tr>
                    <td>{{$posicion->id}}</td>
                    <td>{{$posicion->posicion}}</td>
                    <td class="text-right">
                        @can('cms.products.parameters.edit')
                            <a href="/cms/parameters/editar/{{$posicion->id}}/auto"class="btn btn-sm btn-outline-primary mr-2 editar">Editar</a>
                        @endcan
                        @can('cms.products.parameters.destroy')
                        <form class="d-inline" action=" {{ route('cms.products.parameters.destroy', $posicion->id) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger mr-2" type="submit">Eliminar</button>
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


    {{-- Serie Chumacera --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="h4 ">Serie Chumacera</h4>
            </div>
            <div class="col ml-auto text-right">
                <form action="/cms/parameters/crear/chumacera">
                    <button type="submit" class="btn btn-primary btn-sm">Agregar parametro</button>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th>#</th>
                <th>Tipo brida</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bridas as $brida)
                <tr>
                    <td>{{$brida->id}}</td>
                    <td>{{$brida->tipo_chum}}</td>
                    <td class="text-right">
                        @can('cms.products.parameters.edit')
                        <a href="/cms/parameters/editar/{{$brida->id}}/chumacera"class="btn btn-sm btn-outline-primary mr-2 editar">Editar</a>
                        @endcan
                        @can('cms.products.parameters.destroy')
                        <form class="d-inline" action=" {{ route('cms.products.parameters.destroy', $brida->id) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger mr-2" type="submit">Eliminar</button>
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

    {{-- Serie Cadenas --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="h4 ">Serie Cadenas</h4>
            </div>
            <div class="col ml-auto text-right">
                <form action="/cms/parameters/crear/cadena">
                    <button type="submit" class="btn btn-primary btn-sm">Agregar parametro</button>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th>#</th>
                <th>Tipo de cadena</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cadenas as $cadena)
                    <tr>
                        <td>{{$cadena->id}}</td>
                        <td>{{$cadena->tipo_cadena_texto}}</td>
                        <td class="text-right">
                            @can('cms.products.parameters.edit')
                            <a href="/cms/parameters/editar/{{$cadena->id}}/cadena"class="btn btn-sm btn-outline-primary mr-2 editar">Editar</a>
                            @endcan
                            @can('cms.products.parameters.destroy')
                            <form class="d-inline" action=" {{ route('cms.products.parameters.destroy', $cadena->id) }} " method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger mr-2" type="submit">Eliminar</button>
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


    {{-- Serie Moto y 6000 --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4 class="h4 ">Serie 6000 y Serie Moto</h4>
            </div>
            <div class="col ml-auto text-right">
                <form action="/cms/parameters/crear/6000">
                    <button type="submit" class="btn btn-primary btn-sm">Agregar parametro</button>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th>#</th>
                <th>Tipo de sellos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sellos as $sello)
                <tr>
                    <td>{{$sello->id}}</td>
                    <td>{{$sello->tipo_sello}}</td>
                    <td class="text-right">
                        @can('cms.products.parameters.edit')
                        <a href="/cms/parameters/editar/{{$sello->id}}/sello"class="btn btn-sm btn-outline-primary mr-2 editar">Editar</a>
                        @endcan
                        @can('cms.products.parameters.destroy')
                        <form class="d-inline" action=" {{ route('cms.products.parameters.destroy', $sello->id) }} " method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger mr-2" type="submit">Eliminar</button>
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
</section>

@endsection




