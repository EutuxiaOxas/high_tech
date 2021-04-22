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
                <input type="submit" class="btn btn-primary text-white" value="Buscar">
            </div>
        </form>

        </div>
    </div>
    <div class="row text-white" data-aos="fade-left">
        <div class="col">
        <div class="owl-carousel owl-carousel-library visible" data-loop="true" data-items="[3,2,1]" data-margin="30" data-nav="true">
            <article class="tile tile-long">
            <div class="tile-image" style="background-image: url(/imagenes/moto.jpg)"></div>
            <div>
                <div class="tile-header on-hover text-right">
                <button class="btn btn-sm btn-outline-info text-dark">Ver más</button>
                </div>
                <div class="tile-footer">
                <span class="eyebrow text-dark">Development</span>
                <h3 class="text-dark">Developing Wordpress Theme from Scratch</h3>
                </div>
            </div>
            </article>
            <article class="tile tile-long">
            <div class="tile-image" style="background-image: url(/imagenes/auto.jpg)"></div>
            <div>
                <div class="tile-header on-hover text-right">
                <button class="btn btn-sm btn-outline-info text-dark">Ver más</button>
                </div>
                <div class="tile-footer">
                <span class="eyebrow text-dark">Development</span>
                <h3 class="text-dark">Developing Wordpress Theme from Scratch</h3>
                </div>
            </div>
            </article>
            <article class="tile tile-long">
            <div class="tile-image" style="background-image: url(/imagenes/6000.jpg)"></div>
            <div>
                <div class="tile-header on-hover text-right">
                <button class="btn btn-sm btn-outline-info text-dark">Ver más</button>
                </div>
                <div class="tile-footer">
                <span class="eyebrow text-dark">Development</span>
                <h3 class="text-dark">Developing Wordpress Theme from Scratch</h3>
                </div>
            </div>
            </article>
            <article class="tile tile-long">
            <div class="tile-image" style="background-image: url(/imagenes/pillow.jpg)"></div>
            <div>
                <div class="tile-header on-hover text-right">
                <button class="btn btn-sm btn-outline-info text-dark">Ver más</button>
                </div>
                <div class="tile-footer">
                <span class="eyebrow text-dark">Development</span>
                <h3 class="text-dark">Developing Wordpress Theme from Scratch</h3>
                </div>
            </div>
            </article>
        </div>
        </div>
    </div>
    </div>
</section>
