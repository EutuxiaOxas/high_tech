<style>
    .card_product:hover{
        box-shadow: 0 0.3rem 1.525rem -0.375rem rgba(0,0,0,0.1);
    }
    .img_product_card{
        display: flex;
        flex-direction:row;
	    justify-content: center;
	    align-items: center;
        max-height: 20vh;
        min-height: 20vh;
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

<div class="row card_product align-items-center mb-0">
    <div class="col-2 img_product_card">
        <a href="">
            <img class="img_product" src="/imagenes_pagina/04.jpg" alt="">
        </a>        
    </div>
    <div class="col-10">
        <div class="row mb-1">
            <h5 class=""><a href="">Planning amazing weddings that you won’t forget.</a></h5>
        </div>
        <div class="row mb-1">
            <span class="">Lorem ipsum dolor sit amet consectetur adipisicing elit..</span>
        </div>
        <div class="row mb-1">
            <span class=""><a href="">Categoria</a></span>
        </div>
    </div>
</div>