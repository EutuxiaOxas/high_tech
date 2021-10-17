@extends('layouts.admin')
@php
$section = 'orders';
@endphp

<style>
    .img_product_card {
        max-height: 25vh;
        max-width: 100%;

        border-radius: 5px 5px 0 0;
        overflow: hidden;
    }

    .img_product {
        border-radius: 5px;
        min-height: auto;
        max-height: 100%;
        min-width: auto;
        max-width: 100%;
    }

    .bg-rounded-md {
        border-radius: 7.5px;
    }

    .shadow-md {
        -webkit-box-shadow: 0px 2px 7px 0px rgba(138, 138, 138, 0.5);
        -moz-box-shadow: 0px 2px 7px 0px rgba(138, 138, 138, 0.5);
        box-shadow: 0px 2px 7px 0px rgba(138, 138, 138, 0.5);
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
                    <span class="font-light text-lg">Detalles de la orden</span>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href=" {{ route('cms.index') }} ">Home</a></li>
                        <li class="breadcrumb-item"><a href=" {{ route('cms.orders.show') }} ">Ventas</a></li>
                        <li class="breadcrumb-item active">Ver Detalles</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Productos -->
    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col px-0">
                        <span class="lead" style="font-size:1.75rem">{{ $order->buyer->name }}</span> -
                        @if( $order->status == 'active' )
                            <span class="badge rounded-pill bg-primary px-3 py-1">activa</span>
                        @elseif( $order->status == 'complete' )
                            <span class="badge rounded-pill bg-success px-3">completada</span>
                        @else
                            <span class="badge rounded-pill bg-danger px-3">cancelada</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <h5 class="font-bold">{{ $order->buyer->email }}</h5>
                    <h6 class="font-bold">{{ $order->buyer->phone }}</h6>
                </div>
            </div>
            <div class="col-lg-auto ml-auto">
                <div class="row mb-2">
                    Orden creada: {{ $order->created_at }}
                </div>
                <div class="row">
                    @if( $order->status == 'active' )
                    <button class="btn btn-success px-3 mr-3" data-toggle="modal" data-target="#modalCompleteOrder">Completar</button>
                    <button class="btn btn-danger px-2" data-toggle="modal" data-target="#modalCanceledOrder">Cancelar</button>
                    @endif
                </div>
            </div>
        </div>

        <div class="row my-4">
            <h3 class="font-bold">
                Total productos comprados
            </h3>
        </div>
        @foreach ($order->products_purchase as $product )
            <div class="row mb-2">
                <div class="col-2 d-none d-lg-block img_product_card mb-md-3 text-center">
                    <img class="img_product" src="{{ Storage::url($product->product->imagen) }}" alt="{{ ucwords($product->titulo) }} | High Tech Bearings" loading="lazy">
                </div>
                <div class="col-10">
                    <div class="row">
                        <a href="{{ route('product',$product->product->slug) }}" target="_blank">{{ ucwords($product->product->titulo) }}</a>
                    </div>
                    <div class="row">
                        <strong>
                            {{ $product->quantity }} x {{ number_format($product->price, 2, '.', ',') }} $USD
                        </strong>
                    </div>
                    <div class="row">
                        <strong class="lead" style="font-size:1.25rem">
                            TOTAL: {{ number_format( $product->quantity * $product->price , 2, '.', ',') }} $USD
                        </strong>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row font-bold" style="font-size:1.5rem">
            MONTO TOTAL: {{ $order->amount }} $USD
        </div>
    </section>

    <!-- Transacciones -->
    <section class="container-fluid mt-5">
        <div class="row">
            <h4 class="text-primary">
                Pagos registrados
            </h4>
        </div>
        @if ( count( $order->transactions ) > 0 )
            @foreach ($order->transactions as $trasaction )
                <div class="row my-2 bg-white bg-rounded-md shadow-md p-3">
                    <div class="col-12">
                        <div class="row">
                            <span class="col-7 text-info" style="font-size:1.1rem;">{{ $trasaction->account->account }}</span>
                            <span class="col-auto ml-auto font-bold" style="font-size:1.4rem;">{{ number_format( $trasaction->amount, 2, '.', ',') }}</span>
                        </div>
                        <div class="row mt-2">
                            <div class="col-7">
                                <div class="row">
                                    <div class="col">
                                        <strong>Referencia:</strong> {{ $trasaction->referencia }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <strong>Comentario:</strong> {{ $trasaction->observation }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto ml-auto mt-3">
                                <button class="btn btn-sm btn-info px-4" data-toggle="modal" data-target="#modalCapture{{ $trasaction->id }}">Ver capture</button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Capture Transaccion-->
                    <div class="modal fade" id="modalCapture{{ $trasaction->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $trasaction->account->account }} - {{ number_format( $trasaction->amount, 2, '.', ',') }}</h5>
                                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">x</button>
                                </div>
                                <div class="modal-body">
                                    <img width="100%" src="{{ Storage::url($trasaction->capture) }}" loading="lazy">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Listo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        <div class="row">
            <div class="col">
                <p>No se han registrados pagos para esta compra.</p>
            </div>
        </div>
        @endif

    </section>

    <!-- Modal Cancelar Orden-->
    <div class="modal fade" id="modalCanceledOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cancelar Orden</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <form action="{{ route('cms.orders.update') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="modal-body">
                        <input type="text" hidden name="status" value="canceled">
                        <input type="text" hidden name="order_id" value="{{ $order->id }}">
                        ¿Estas seguro de cancelar esta orden?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-danger px-5" type="submit">Continuar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Completar Orden-->
    <div class="modal fade" id="modalCompleteOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cancelar Orden</h5>
                    <button type="button" class="btn" data-dismiss="modal" aria-label="Close">x</button>
                </div>
                <form action="{{ route('cms.orders.update') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="modal-body">
                        <input type="text" hidden name="status" value="complete">
                        <input type="text" hidden name="order_id" value="{{ $order->id }}">
                        ¿Estas seguro de completar esta orden?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button class="btn btn-success px-5" type="submit">Completar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @endsection