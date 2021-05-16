<article class="tile tile-long">
    <div class="tile-image" style="background-image: url( {{ Storage::url($product->imagen) }} )"></div>
    <div>
        <div class="tile-header on-hover text-right">
        <a class="btn btn-sm btn-info text-dark" href="{{ route('product', $product->slug) }}">Ver producto</a>
        </div>
        <div class="tile-footer" style="background-color: rgba(255,255,255,0.5);">
            <strong class="eyebrow text-dark" style="opacity:1;">{{$product->categoria->category}}</strong>
            <h3 class="text-dark">{{ $product->titulo }}</h3>
        </div>
    </div>
</article>
