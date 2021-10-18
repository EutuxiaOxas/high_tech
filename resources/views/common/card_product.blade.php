<div class="col-6 col-sm-6 col-md-6 col-lg-4 px-1 mb-2 pb-0">
    <div class="card shadow-md" style="border: 0px;">
        <div class="img_product_card">
            <a href="{{route('product', $producto->slug)}}" itemprop="url" aria-label="ver el producto {{$producto->titulo}}">
                <div class="img_product" style="background-image: url('{{ Storage::url($producto->imagen) }}')"></div>
            </a>
        </div>
        <div class="card-body" style="padding: 0.6rem 0.8rem 0 0.8rem;">
            <div class="row px-1">
                <div class="col-12 px-0">
                    <a class="text-dark" href="{{route('product', $producto->slug)}}" itemprop="url" aria-label="ver el producto {{$producto->titulo}}">
                        <span itemprop="name">{{$producto->titulo}}</span>
                    </a>
                </div>
                <div class="col-12 px-0 mt-0 pt-0">
                    <a class="text-sm" style="color: #838383;" href="{{ route('products.category', $producto->categoria->slug )}}" aria-label="ver los productos de la categoria {{ $producto->categoria->category }}">
                        <span itemprop="category">
                            {{ $producto->categoria->category }}
                        </span>
                    </a>
                </div>
                <div class="col-12 px-0 mb-2" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                    <span class="price_card_product">
                        <span itemprop="priceCurrency" content="USD">$</span>
                        <span itemprop="price" content="{{number_format($producto->precio, 2)}}">
                            {{ number_format( $producto->precio, 2) }}
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
