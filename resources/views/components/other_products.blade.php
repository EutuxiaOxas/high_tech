<section class="bg-white pt-0">
    <div class="container">
    <div class="row text-white justify-content-between align-items-center">
        <div class="col-12">
            <h2 class="text-dark">También te pueden interesar</h2>
        </div>
    </div>
    <div class="row text-white" data-aos="fade-left">
        <div class="col">
        <div class="owl-carousel owl-carousel-library visible" data-loop="true" data-items="[3,2,1]" data-margin="30" data-nav="true">
            @foreach ($products as $product)
                @include('components.card_product')
            @endforeach
        </div>
        </div>
    </div>
    </div>
</section>
