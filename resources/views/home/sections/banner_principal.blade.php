<!-- cover -->
<style>
    .img_banner{
        width: 50%;
        max-width: 100%;
    }


  @media (max-width: 768px) {
    .img_banner{
      width: 100%;
      max-width: 100%;
    }
  }
</style>
<section class="p-0">
    <div class="swiper-container"
      data-top-top="transform: translateY(0px);"
      data-top-bottom="transform: translateY(250px);">
      <div class="swiper-wrapper">
        <div class="swiper-slide vh-100">
          <div class="image image-overlay image-zoom" style="background-image:url(/imagenes/banner_principal/banner.webp)"></div>
          <div class="caption">
            <div class="container-fluid px-5">
              <div class="row justify-content-between vh-100 align-items-center">
                <div class="col-lg-8 align-md-self-end text-white text-shadow text-center text-md-left" data-swiper-parallax="-100%">
                  <img class="img_banner" src="/svg/logo-light.svg" alt="Imagen Logo de High Tech Bearings" width="50%" loading="lazy">
                  <a class="btn btn-white btn-rounded px-5 d-md-none mt-4" href="{{ route('products') }}" aria-label="ver todos los productos">Ver Productos</a>
                </div>
                <div class="col-12 align-self-end d-none d-md-block">
                  <div class="row gutter-1">
                      <div class="col text-center">
                        <a href="{{ route('products.category', 'automotriz') }}" aria-label="ver los productos de la categoria automotriz">
                            <img class="mb-1" src="/imagenes/banner_principal/01.webp" alt="imagen de la categoria automotriz | High Tech Bearings" width="100%" loading="lazy">
                            <div class="text-white font-lg ">SERIE <strong class="font_myriad">AUTOMOTRIZ</strong> </div>
                            <small class="text-white"> <strong class="font_myriad">LINEA NARANJA - AUTOMOTRIZ</strong></small>
                        </a>
                      </div>
                      <div class="col text-center">
                        <a href="{{ route('products.category', 'industrial') }}" aria-label="ver los productos de la categoria industrial">
                            <img class="mb-1" src="/imagenes/banner_principal/02.webp" alt="imagen de la categoria industrial | High Tech Bearings" width="100%" loading="lazy">
                            <div class="text-white font-lg">SERIE <strong class="font_myriad">INDUSTRIAL</strong> </div>
                            <small class="text-white"> <strong class="font_myriad">LINEA VERDE - INDUSTRIAL</strong></small>
                        </a>
                      </div>
                      <div class="col text-center">
                        <a href="{{ route('products.category', 'cadenas') }}" aria-label="ver los productos de la categoria cadenas">
                            <img class="mb-1" src="/imagenes/banner_principal/03.webp" alt="imagen de la categoria cadenas | High Tech Bearings" width="100%" loading="lazy">
                            <div class="text-white font-lg">SERIE <strong class="font_myriad">CADENAS</strong> </div>
                            <small class="text-white"> <strong class="font_myriad">LINEA AMARILLA - CADENAS</strong></small>
                        </a>
                      </div>
                      <div class="col text-center">
                        <a href="{{ route('products.category', 'chumacera') }}" aria-label="ver los productos de la categoria chumacera">
                            <img class="mb-1" src="/imagenes/banner_principal/04.webp" alt="imagen de la categoria chumaceras | High Tech Bearings" width="100%" loading="lazy">
                            <div class="text-white font-lg">SERIE <strong class="font_myriad">CHUMACERA</strong> </div>
                            <small class="text-white"> <strong class="font_myriad">LINEA AZUL - CHUMACERAS</strong> </small>
                        </a>
                      </div>
                      <div class="col text-center">
                        <a href="{{ route('products.category', 'moto') }}" aria-label="ver los productos de la categoria moto">
                            <img class="mb-1" src="/imagenes/banner_principal/05.webp" alt="imagen de la categoria motos | High Tech Bearings" width="100%" loading="lazy">
                            <div class="text-white font-lg">SERIE <strong class="font_myriad">MOTO</strong> </div>
                            <small class="text-white"> <strong class="font_myriad">LINEA ROJA - MOTOCICLETAS</strong></small>
                        </a>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-footer text-white">
          <div class="container-fluid">
            <div class="row">
              <div class="col text-center">
                <div class="mouse"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / cover -->

