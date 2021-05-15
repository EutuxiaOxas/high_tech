<div class="row shadow-md align-items-center mb-2 py-1">
    <div class="col-2 ">
        <a class="img_product_card" href="{{route('product', $producto->slug)}}">
            <img class="img_product" src="{{ Storage::url($producto->imagen) }}" alt="">
        </a>
    </div>
    <div class="col-8 col-lg-9">
        <div class="row mb-0">
            <h5><a class="text-dark" href="{{route('product', $producto->slug)}}">{{$producto->titulo}}</a></h5>
        </div>
        <div class="row mb-1">
            <small class="">Código Universal: <strong class="text-muted">{{$producto->codigo_universal}}</strong></small>
        </div>
    </div>
    <div class="col-2 col-lg-1 text-center">
        <span style="font-size:2rem;font-weight: 500;">{{$producto->precio}}</span> $USD
    </div>
</div>
