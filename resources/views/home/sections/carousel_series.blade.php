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
            @foreach ($categories as $category)
              
              <figure class="user">
                <a href="{{ route('products.category', $category->slug) }}" class="user-photo" aria-label="ver todos los productos de la categoria {{$category->slug}}">
                  <img src="{{asset('/imagenes/productos_home/serie_'.$category->slug.'.jpg')}}" alt="{{$category->slug}}" loading="lazy">
                  <span class="text_float text-white font-xl">SERIE 
                    <strong> @php echo strtoupper($category->category); @endphp </strong>
                  </span>
                </a>
              </figure>

            @endforeach

          </div>
        </div>
      </div>
    </div>
  </section>
