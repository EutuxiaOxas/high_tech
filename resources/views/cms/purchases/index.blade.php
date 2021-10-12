@extends('layouts.admin')
@php
    $section = 'orders';
    $meses = ['','Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
@endphp

@section('title') Mis Compras - High Tech Bearings @endsection
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
              <span class="font-light text-lg">Mis Compras</span>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href=" {{ route('cms.index') }} ">Home</a></li>
                <li class="breadcrumb-item active">Mis Compras</li>
              </ol>
            </div>
          </div>
        </div>
    </section>

    <div class="row">
        <div class="col px-0">
            @php $cont=0; @endphp
            @foreach ($purchases as $purchase)
                @php $cont++; @endphp
                <div class="card">
                    <div class="card-header">
                      <div class="row">
                        <div class="col">
                          <h5>
                            Compra realizada el  {{ $purchase->created_at->day }} de {{ $meses[$purchase->created_at->month] }} del {{ $purchase->created_at->year }}  
                          </h5>
                        </div>
                        <div class="col-auto my-auto ml-auto">
                          @if( $purchase->status == 'active' )
                              <span class="badge bg-primary px-3 py-2">Activa</span>
                          @elseif( $purchase->status == 'complete' )
                              <span class="badge bg-success px-3 py-2">Completada</span>
                          @else
                              <span class="badge bg-danger px-3 py-2">Cancelada</span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title font-bold">
                            Monto total:
                            @php $price = number_format($purchase->amount, 2, '.', ','); @endphp
                            {{ $price }} $USD
                        </h5>
                        <p class="card-text">Escribenos a nuestro Whatsapp para concretar tu compra.</p>
                        <a href="{{ route('cms.purchases.edit', $purchase) }}" class="btn btn-primary px-5">Ver detalles</a>
                        <a href="https://api.whatsapp.com/send/?phone=584244174759?texto=Buen%20dia,%20escribo%20del%20sitio%20web%20acabo%20de%20realizar%20una%20compra" class="btn btn-success px-5">Whatsapp</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection






