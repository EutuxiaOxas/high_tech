@extends('layouts.admin')
@php
    $section = 'orders';
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
              <span class="font-light text-lg">Ventas</span>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href=" {{ route('cms.index') }} ">Home</a></li>
                <li class="breadcrumb-item active">Ventas</li>
              </ol>
            </div>
          </div>
        </div>
    </section>

    <div class="row">
        <div class="col px-0">
            <div class="card">
                <div class="card-header row justify-content-between align-items-center mx-0">
                    <h3 class="card-title col">Historial de ventas</h3>
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
                                <th>Comprador</th>
                                <th>Correo</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $cont=0; @endphp
                            @foreach ($orders as $order)
                                @php $cont++; @endphp
                                <tr>
                                    <td>{{$cont}}</td>
                                    <td> {{ $order->buyer->name }} </td> 
                                    <td> {{ $order->buyer->email }} </td> 
                                    <td> 
                                        @php $amount = number_format($order->amount, 2, '.', ','); @endphp
                                        {{ $amount }} <strong>$USD</strong>
                                    </td> 
                                    <td> {{ $order->created_at }} </td> 
                                    <td class="align-middle"> 
                                        @if( $order->status == 'active' )
                                            <span class="badge rounded-pill bg-primary px-3">activa</span>
                                        @elseif( $order->status == 'complete' )
                                            <span class="badge rounded-pill bg-success px-3">completada</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger px-3">cancelada</span>
                                        @endif
                                    </td> 
                                    <td>
                                        <a class="btn btn-success btn-sm px-2" href="{{ route('cms.orders.edit', $order ) }}">Ver detalles</a>                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection






