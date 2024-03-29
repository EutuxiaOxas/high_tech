@extends('layouts.app')
@php
    $headerLinks="light";
    $logoNav1="dark";
    $logoNav2="dark";
    $bg_navbar = '';
@endphp

@section('title')
    {{$producto->titulo}} | High Tech Bearings
@endsection

@section('head') 
    <link rel="canonical" href="https://www.hightechinternational.net/{{$producto->slug}}" />
    <meta name="robots" content="index,follow"/>

    <!-- Primary Meta Tags -->
    <meta name="title" content="{{$producto->titulo}} - High Tech Bearings">
    <meta name="description" content="{{$producto->titulo}} - High Tech Bearings">
    <meta name="keywords" content="{{$producto->titulo}}">

    <!-- Open Graph para Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$producto->titulo}} - High Tech Bearings" />
    <meta property="og:url" content="https://www.hightechinternational.net/{{$producto->slug}}" />
    <meta property="og:image" content="{{ asset( 'home.png' ) }}" />
    <meta property="og:description" content="{{$producto->titulo}} - High Tech Bearings" />
    <meta property="og:site_name" content="High Tech Bearings" />
@endsection

<style>
    .img_product_card{
        max-height: 65vh;
        max-width:100%;

        border-radius: 5px 5px 0 0;
        overflow: hidden;
    }
    .img_product{
        border-radius: 5px;
        min-height: auto;
        max-height: 100%;
        min-width: auto;
        max-width: 100%;
    }

</style>

@section('content')
<span id="product_id_detail" hidden>{{$producto->id}}</span>

<section class="container-fluid px-1 px-md-3">
    <div class="row mb-0">
        <!-- Product Detail Celulares -->
        <div class="col-12 mt-5 pt-1 pt-md-3 mb-2 d-md-none">
            <div class="row align-items-center">
                <div class="col-12" style="margin-bottom: 0.15rem;">
                    <a class="text-xs" href="/categorias/{{$producto->categoria->slug}}" style="color: #{{$producto->categoria->category_color}};">
                        {{$producto->categoria->category}}
                    </a>
                </div>
                <div class="col-12">
                    <h1 class="font-semibold text-base" id="title_product">{{ ucwords($producto->titulo) }}</h1>
                </div>
                <div class="col-12">
                    <div class="text-sm">
                        <span class="text-muted">
                            Código Universal:
                        </span>
                        <strong>
                                {{ $producto->codigo_universal }}
                        </strong>
                    </div>
                </div>

            </div>
        </div>
        {{-- Imagen del producto --}}
        <div class="col-12 col-md-6">
            <div class="row card_product align-items-center mb-0 justify-content-center">
                <div class="col-12 img_product_card mb-md-3 text-center">
                    <img class="img_product" src="{{ Storage::url($producto->imagen) }}" alt="{{ ucwords($producto->titulo) }} | High Tech Bearings" loading="lazy" id="image_product">
                </div>
            </div>
        </div>

        <!-- Product Detail Celulares -->
        <div class="col-12 d-md-none mb-2">
            <span class="text-4xl font-light">
                @php $price = number_format($producto->precio, 2, '.', ','); @endphp
                <span id="price_product">
                    {{ $price }}
                </span>
                 $USD
            </span>
            <span class="text-muted text-sm">{{$producto->quantity}} disponibles.</span>
        </div>
        <div class="col-12 d-md-none">
            @if ( $producto->quantity > 0 )
                <div class="row px-1">
                    <div class="col-5 px-0">
                        <select class="d-inline text-sm form-control-sm quantityProduct" name="quantity">
                            @for ($i = 1; $i <= $producto->quantity; $i++)
                                <option value="{{ $i }}">{{ $i }} {{  $i != 1 ? 'unidades' : 'unidad' }}</option>
                            @endfor
                        </select>
                    </div>
                    <button class="col-7 btn btn-primary btn-sm d-inline text-sm addProduct">Agregar al carrito</button>
                </div>
            @else
                <div class="row">
                    <span class="col-12 btn btn-secondary d-inline">Producto agotado</span>
                </div>
            @endif
        </div>

        <div class="col-12 col-md-6">

            <div class="row d-none d-md-block">
                <div class="col-12">
                    <h1 class="font-light text-3xl">{{$producto->titulo}}</h1>
                </div>
                <div class="col-12 mt-1">
                    <div class="row justify-content-between align-items-center">
                        <span class="col-auto">
                            Código Universal:
                            <strong>
                                 {{ $producto->codigo_universal }}
                            </strong>
                        </span>
                        <a class="col-auto rounded-full shadow-md py-1 px-3 text-white" href="/categorias/{{$producto->categoria->slug}}" style="background-color: #{{$producto->categoria->category_color}};">
                            {{$producto->categoria->category}}
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <span class="text-4xl font-light">
                        @php $price = number_format($producto->precio, 2, '.', ','); @endphp
                        {{ $price }} $USD
                    </span>
                    <small class="text-muted">{{$producto->quantity}} disponibles.</small>
                </div>
                <div class="col-12 mt-2">
                    @if ( $producto->quantity > 0 )
                        <div class="row">
                            <div class="col-4">
                                <select class="d-inline quantityProduct" name="quantity">
                                    @php $cont=0; @endphp
                                    @for ($i = 1; $i <= $producto->quantity; $i++)
                                        @if( $cont > 99 )
                                            @php break; @endphp
                                        @else
                                            @php $cont++; @endphp
                                            <option value="{{ $i }}">{{ $i }} {{  $i != 1 ? 'unidades' : 'unidad' }}</option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                            <button class="col-8 btn btn-primary d-inline addProduct">Agregar al carrito</button>
                        </div>
                    @else
                        <div class="row">
                            <span class="col-12 btn btn-secondary d-inline">Producto agotado</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-2xl mb-1">
                    Parámetros:
                </div>
                <div class="col-12">
                    <div class="row">
                        @if ( $producto->categoria->slug    == 'automotriz' )
                            <div class="col-6 mb-1">
                                <span class="font-semibold text-base">Posición de la rueda: </span> <br>
                                <span class="text-muted">{{ $producto->auto->posicion_rueda }}</span>
                            </div>
                            <div class="col-6 mb-1">
                                <span class="font-semibold text-base">Aplicación: </span> <br>
                                <span class="text-muted">{{ $producto->aplicacion }}</span>
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 font-semibold text-xl">
                                        Medidas: {{ $producto->auto->d_interno }}x{{ $producto->auto->d_externo }}x{{ $producto->auto->espesor }}mm
                                    </div>
                                    <div class="col-4">
                                        <span class="font-semibold text-base">Diametro interno: </span> <br>
                                        <span class="text-muted">{{ $producto->auto->d_interno }} mm</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="font-semibold text-base">Diametro externo: </span> <br>
                                        <span class="text-muted">{{ $producto->auto->d_externo }} mm</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="font-semibold text-base">Espesor: </span> <br>
                                        <span class="text-muted">{{ $producto->auto->espesor }} mm</span>
                                    </div>
                                </div>
                            </div>

                        @elseif( $producto->categoria->slug == 'chumacera' )

                            <div class="col-6 mb-1">
                                <span class="font-semibold text-lg">Diametro: </span> <br>
                                <span class="text-muted">{{ $producto->chumacera->diametro_chumacera }}</span>
                            </div>                            

                        @elseif( $producto->categoria->slug == 'cadenas' )

                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Aplicación: </span> <br>
                                <span class="text-muted">{{ $producto->aplicacion }}</span>
                            </div>
                            <div class="col-6 mb-1">
                                <span class="font-semibold text-lg">Pitch: </span> <br>
                                <span class="text-muted">{{ $producto->cadena->pitch }}</span>
                            </div>

                        @elseif( $producto->categoria->slug == 'industrial' ) 
                            <div class="col-6 mb-1">
                                <span class="font-semibold text-lg">Tipo de sello: </span> <br>
                                <span class="text-muted">{{ $producto->industrial->tipo_sello }}</span>
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Aplicación: </span> <br>
                                <span class="text-muted">{{ $producto->aplicacion }}</span>
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>
                        @elseif( $producto->categoria->slug == 'moto' )

                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Tipo de sello: </span> <br>
                                <span class="text-muted">{{ $producto->moto->tipo_sello }}</span>
                            </div>
                            <div class="col-12 col-md-6 mb-1">
                                <span class="font-semibold text-lg">Aplicación: </span> <br>
                                <span class="text-muted">{{ $producto->aplicacion }}</span>
                            </div>

                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 font-semibold text-xl">
                                        Medidas: {{ $producto->moto->d_interno }}x{{ $producto->moto->d_externo }}x{{ $producto->moto->espesor }}mm
                                    </div>
                                    <div class="col-4">
                                        <span class="font-semibold text-lg">Diametro interno: </span> <br>
                                        <span class="text-muted">{{ $producto->moto->d_interno }} mm</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="font-semibold text-lg">Diametro externo: </span> <br>
                                        <span class="text-muted">{{ $producto->moto->d_externo }} mm</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="font-semibold text-lg">Espesor: </span> <br>
                                        <span class="text-muted">{{ $producto->moto->espesor }} mm</span>
                                    </div>
                                </div>
                            </div>

                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row mb-1 mt-3">
        <div class="col-12 mb-1 mb-md-2">
            <h4 class="text-dark ">Descripcion del producto</h4>
        </div>
        <div class="col-12">
            <p class="text-muted">
                {!! $producto->descripcion !!}
            </p>
        </div>
    </div>

    @include('components.social_mobile')

</section>

{{-- Otor productos --}}
@include('components.other_products')
{{-- End Otros productos --}}

{{-- Social lateral --}}
@include('components.social_lateral')
{{-- End Social lateral --}}



<script>

    document.addEventListener("DOMContentLoaded", function() {

        // Agregar productos
        const addProduct = document.querySelectorAll('.addProduct');

        if( addProduct !== null ){

            addProduct.forEach(element => {


                element.addEventListener('click',event => {
                    const product_id = document.getElementById('product_id_detail').textContent.trim();
                    const title = document.getElementById('title_product').textContent.trim();
                    const price = document.getElementById('price_product').textContent.trim();
                    const image = document.getElementById('image_product').src
                    const rootContainer = element.parentElement;
                    const selectQuantity = rootContainer.querySelector('.quantityProduct');

                    const quantity = selectQuantity.value
                    const avalaible = selectQuantity.children.length

                    // console.log(quantity.value)
                    let productsInShoppingCar = localStorage.getItem('productsInShoppingCar');

                    let newProduct = {
                        id: product_id,
                        title: title,
                        quantity: quantity,
                        avalaible: avalaible,
                        price: price,
                        image: image
                    }

                    let array_products = new Array();

                    if( productsInShoppingCar !== null ){
                        let products = JSON.parse(productsInShoppingCar);

                        let product_in_local_storage = false;

                        products.forEach(product => {
                            if( product.id == product_id ){
                                product_in_local_storage = true;
                                product.quantity = quantity;
                            }
                        });

                        // verifico si se encontraba el producto en el LS
                        if(!product_in_local_storage){
                            products.push(newProduct);
                        }
                        array_products = products;

                    }else{
                        array_products.push(newProduct);
                    }

                    // // Almaceno el producto en el localStorage
                    localStorage.setItem('productsInShoppingCar', JSON.stringify(array_products));

                    // genero una notificacion de 'producto agregado al carrito'

                    updateBadgeProducts();

                    // notificacion visual de producto agregado al carrito
                    successProductAdd();

                })

            });
        }


        // actualizar la cantidad en la vista, al cargar la pagina
        const product_id_detail = document.getElementById('product_id_detail').textContent.trim()

        if( product_id_detail !== null ){
            let productsInShoppingCar = localStorage.getItem('productsInShoppingCar');

            const quantityProduct = document.querySelectorAll('.quantityProduct');

            if( productsInShoppingCar !== null ){

                let products = JSON.parse(productsInShoppingCar);

                products.forEach(product => {

                    if( product.id == product_id_detail ){

                        quantityProduct.forEach(element => {
                            element.value = product.quantity;

                        });

                    }

                });

            }

        }


    });

    
    // Funcion para notificacion de producto agregado exitosamente
    function successProductAdd(){
        let messageSuccess = document.getElementById("message_success");
        messageSuccess.innerHTML = '¡Agregado con éxito!'
        messageSuccess.style.visibility = "visible";
        messageSuccess.style.opacity = "1";
        messageSuccess.classList.add('transitionClean');
        setTimeout(hiddenMessageAddProduct,2250);
        function hiddenMessageAddProduct(){
            messageSuccess.style.opacity = "0";
            messageSuccess.style.visibility = "hidden";
            messageSuccess.classList.remove('transitionClean');
        }
    }
</script>


@endsection
