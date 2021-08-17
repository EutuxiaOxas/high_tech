@extends('layouts.app')
@php
    $headerLinks="light";
    $logoNav1="dark";
    $logoNav2="dark";
    $bg_navbar = '';
@endphp

@section('title')
 Productos agregados al carrito de High Tech Bearings
@endsection

@section('content')

<section class="container-fluid px-1 px-md-3">
    <div class="row mb-0">
        <div class="col-7">
            <h2>Listado de productos</h2>
            <div class="row" id="containerProducts">


            </div>
            <div class="hidden" id="example">
                <div class="col-12">
                    <img src="" alt="" class="imgProduct" width="150px" height="150px">
                    <span class="titleProduct"></span>
                    <span class="priceProduct"></span>
                    <strong class="quantityProduct"></strong>
                </div>
            </div>

        </div>
        <div class="col-5">

        </div>

    </div>
</section>

{{-- Otor productos --}}
@include('components.other_products')
{{-- End Otros productos --}}


<script>
    // console.log(quantity.value)
    let productsInShoppingCar = localStorage.getItem('productsInShoppingCar');
    if( productsInShoppingCar !== null ){
        let products = JSON.parse(productsInShoppingCar);

        const containerProducts = document.getElementById('containerProducts');
        const example = document.getElementById('example')

        products.forEach(element => {
            let cardProduct = example.firstElementChild.cloneNode(true);
            let imgProduct = cardProduct.querySelector('.imgProduct')
            let titleProduct = cardProduct.querySelector('.titleProduct')
            let priceProduct = cardProduct.querySelector('.priceProduct')
            let quantityProduct = cardProduct.querySelector('.quantityProduct')

            imgProduct.src = element.image
            titleProduct.textContent = element.title
            quantityProduct.textContent = element.quantity
            priceProduct.textContent = element.price

            containerProducts.appendChild(cardProduct);
        });



    }
</script>


@endsection
