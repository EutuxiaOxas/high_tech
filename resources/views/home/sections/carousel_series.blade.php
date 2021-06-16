<section class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h2><b>HIGH TECH</b><br>BEARINGS</h2>
        </div>
        <div class="col-lg-6">
          <p>
            {{-- Un producto de innovación y calidad, con el respaldo de una experiencia en el ramo de rodamientos con más de 20 años en el mercado nacional e internacional. --}}
            HIGH TECH BEARINGS, sinónimo de tecnología y seguridad, somos una marca con el respaldo de más de 30 años de experiencias en el sector de rodamientos industriales y automotrices.
            <br>
            Nuestra variedad de rodamientos clasificados según el sector industrial nos permite abarcar un rubro considerable capaz de satisfacer las demandas del mercado. Por otra parte, están fabricados para brindar seguridad con garantías en un producto de tecnología.
            <br>
            Siempre estamos innovando y ocupándonos de crear líneas de productos que nos permitan llegar a todo tipo de industria.

          </p>
        </div>
      </div>
      <div class="row" data-aos="fade-left">
        <div class="col">
          <div class="owl-carousel visible" data-items="[3]" data-nav="true" data-margin="10">

            <figure class="user">
              <a href="{{ route('products.category', 'serie-automotriz') }}" class="user-photo">
                <img src="{{asset('/imagenes/productos_home/serie_auto.jpg')}}" alt="promo-1">
                <span class="text_float text-white font-xl">SERIE <strong>AUTOMOTRIZ</strong></span>
              </a>
            </figure>
            <figure class="user">
              <a href="{{ route('products.category', 'serie-cadenas') }}" class="user-photo">
                <img src="{{asset('/imagenes/productos_home/serie_cadenas.jpg')}}" alt="promo-2">
                <span class="text_float text-white font-xl">SERIE <strong>CADENAS</strong></span>
              </a>
            </figure>
            <figure class="user">
              <a href="{{ route('products.category', 'serie-6000') }}" class="user-photo">
                <img src="{{asset('/imagenes/productos_home/serie_6000.jpg')}}" alt="promo-5">
                <span class="text_float text-white font-xl">SERIE <strong>6000</strong></span>
              </a>
            </figure>
            <figure class="user">
              <a href="{{ route('products.category', 'serie-chumacera') }}" class="user-photo">
                <img src="{{asset('/imagenes/productos_home/serie_chumacera.jpg')}}" alt="promo-3">
                <span class="text_float text-white font-xl">SERIE <strong>CHUMACERA</strong></span>
              </a>
            </figure>
            <figure class="user">
              <a href="{{ route('products.category', 'serie-moto') }}" class="user-photo">
                <img src="{{asset('/imagenes/productos_home/serie_moto.jpg')}}" alt="promo-4">
                <span class="text_float text-white font-xl">SERIE <strong>MOTO</strong></span>
              </a>
            </figure>


          </div>
        </div>
      </div>
    </div>
  </section>
