<section class="bg-dark">
    <div class="container">
    <div class="row text-white justify-content-between align-items-center">
        <div class="col-md-4">
        <h2 class="text-muted"><span class="text-white">+200</span> productos</h2>
        </div>
        <div class="col-md-7">

            <!-- Search Input -->
            <form class="input-group rounded" action="{{route('products.search')}}">
            <input type="search" class="form-control" name="search" placeholder="Buscar productos..." aria-label="Buscar productos">
                <div class="input-group-append">
                <input type="submit" class="btn btn-secondary text-dark" value="Buscar">
            </div>
        </form>

        </div>
    </div>
    <div class="row text-white" data-aos="fade-left">
        <div class="col">
        <div class="owl-carousel owl-carousel-library visible" data-loop="true" data-items="[3,2,1]" data-margin="30" data-nav="true">
            @foreach ( $products as $product )
                @include('components.card_product')
            @endforeach
        </div>
        </div>
    </div>
    </div>
</section>
