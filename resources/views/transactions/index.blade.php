@extends('layouts.app')
@php
    $page='transaction';
    $headerLinks="light";
    $logoNav1="dark";
    $logoNav2="light";
    $bg_navbar = '';
@endphp

@section('title')
        Registra tu pago | High Tech Bearings
@endsection

@section('content')
<section class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7 mt-5 mt-md-0 px-lg-0">
                @if (session('info'))
                    <span class="eyebrow mb-1 text-dark">Gracias por comprar con nosotros!</span> <br>
                    <h2 class="text-info">{{ session('info') }}</h2>
                @else
                    <span class="eyebrow mb-1 text-dark">Estaremos confirmando tu pago lo antes posible.</span> <br>
                    <h2>Registra tu pago</h2>
                @endif
            </div>
            <div class="col-md-5 mt-5 mt-md-0 text-right">
                <h4>Monto de la compra: {{ $order->amount }} $USD</h4>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="col-lg-7 pr-5 pl-0">
                <h4 class="font-bold">Cuentas bancarias</h4>

                <div class="accordion" id="accordionExample">
                    @php $cont = 0; @endphp
                    @foreach( $accounts as $account )
                        @php $cont++; @endphp
                        <div class="card">
                            <div class="card-header p-0" id="heading{{$cont}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$cont}}" aria-expanded="true" aria-controls="collapse{{$cont}}">
                                        {{ $account->account }}
                                    </button>
                                </h2>
                                </div>

                                <div id="collapse{{$cont}}" class="collapse" aria-labelledby="heading{{$cont}}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="text-gray-800"> <strong>correo:</strong> {{ $account->account_mail }}</p>
                                    <p class="text-gray-800"> <strong>número de cuenta: </strong> {{ $account->account_number }}</p>
                                    <p class="text-gray-800"> <strong>titular: </strong> {{ $account->account_titular }}</p>
                                    <p class="text-gray-800"> <strong>descripción: </strong> {{ $account->account_description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <p class="mt-5 text-gray-800">
                    Realiza tu pago a una de nuestras cuentas bancarias y registra tu pago. <br>
                    Estaremos confirmando tu pago y comunicandonos contigo para entregarte los rodamientos.
                </p>

            </div>
            <div class="col-lg-5">
                <div class="row px-2">
                    <div class="col-12 mb-3 px-0">
                        <h2 class="lead" style="font-size:1.5rem">Registra tu pago</h2>
                    </div>
                    <div class="col-12 px-0">
                        <form action="{{ route('account.store.transaction') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="inputName">Cuenta a la cual pagaste</label>
                                <select class="" name="accounts_id">
                                    @foreach($accounts as $account)
                                        <option class="bg-white" value="{{ $account->id }}">{{ $account->account }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="col-12 px-0">
                                <div class="form-group">
                                    <label for="inputDescription">Monto</label>
                                    <input class="form-control" type="number" name="amount" autocomplete="off" step="0.01">
                                </div>
                            </div>
                            <div class="col-12 px-0">
                                <div class="form-group">
                                    <label for="inputDescription">Referencia</label>
                                    <input class="form-control" type="text" name="referencia" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 px-0">
                                <div class="form-group">
                                    <label for="inputDescription">Observación</label>
                                    <input class="form-control" type="text" name="observation" placeholder="Comentarios" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 px-0">
                                <div class="form-group">
                                    <label>Capture [.jpg, .png]</label> <br>
                                    <label class="text-blue-700 cursor-pointer" for="capture">Cargar capture</label>
                                    <input type="file" name="capture" id="capture" >
                                </div>
                            </div>
                            <input type="text" hidden name="order_id" value="{{ $order->id }}">
                            <button type="submit" class="col-12 btn btn-success">Confirmar</button>
                        </form>
                    </div>

            </div>
        </div>
    </div>
</section>

@endsection

