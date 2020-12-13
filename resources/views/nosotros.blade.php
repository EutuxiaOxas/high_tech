@extends('layouts.app')
@php 
    $headerLinks="light";
    $logoNav1="dark";
    $logoNav2="dark";
@endphp

@section('title')
 High Tech Bearings - Nosotros
@endsection

@section('content')

  
      <!-- hero -->
      <section class="hero hero-with-header">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <h1 class="text-decorated">High Tech  <b>Bearings</b></h1>
              <p>Rodamientos para la Industria y el sector automotriz. <br>
                Tecnología, seguridad e innovación para cada aplicación.
                </p>
            </div>
          </div>
        </div>    
      </section>
      <!-- / hero -->
  
  
      <!-- carousel -->
      <section class="pt-0">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="owl-carousel visible gallery" data-items="[2]" data-autoplay="true" data-loop="true" data-dots="true" data-margin="20">
                <figure class="photo">
                  <img src="/imagenes/imagenes_pagina/high1.jpg" alt="Image">
                </figure>
                
                <figure class="photo">
                  <img src="/imagenes/imagenes_pagina/high2.jpg" alt="Image">
                </figure>

                <figure class="photo">
                  <img src="/imagenes/imagenes_pagina/serie1.jpg" alt="Image">
                </figure>

                <figure class="photo">
                  <img src="/imagenes/imagenes_pagina/high3.jpg" alt="Image">
                </figure>
  
                <figure class="photo">
                  <img src="/imagenes/imagenes_pagina/serie2.jpg" alt="Image">
                </figure>

                <figure class="photo">
                  <img src="/imagenes/imagenes_pagina/serie4.jpg" alt="Image">
                </figure>

                <figure class="photo">
                  <img src="/imagenes/imagenes_pagina/high3.jpg" alt="Image">
                </figure>

                <figure class="photo">
                  <img src="/imagenes/imagenes_pagina/serie3.jpg" alt="Image">
                </figure>
  
                <figure class="photo">
                  <img src="/imagenes/imagenes_pagina/high4.jpg" alt="Image">
                </figure>

                <figure class="photo">
                  <img src="/imagenes/imagenes_pagina/serie5.jpg" alt="Image">
                </figure>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- / carousel -->
  
  
      <!-- features -->
      <section class="bg-light separator-top separator-bottom">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2>Somos <b>Expertos</b></h2>
            </div>
          </div>
          <div class="row gutter-2 gutter-lg-4">
            <div class="col-md-6 col-lg-4">
              <div class="media align-items-center mb-2">
                <i class="svg-icon fs-50 text-primary mr-3">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                  <path fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" d="M32,1c14.359,0,27,12.641,27,27S46.359,55,32,55
                    c-10,0-13-4-13-4"/>
                  <circle fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" cx="32" cy="28" r="20"/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="32" y1="54" x2="32" y2="64"/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="22" y1="63" x2="42" y2="63"/>
                  </svg>
                </i>
                <div class="media-body">
                  <h5 class="fs-20 font-weight-normal">Presencia internacional</h5>
                </div>
              </div>
              <p>Estamos ubicados sedes en Venezuela y Estados Unidos</p>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="media align-items-center mb-2">
                <i class="svg-icon fs-50 text-primary mr-3">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                  <polyline fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" points="32,12 32,32 41,41 "/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="4" y1="32" x2="8" y2="32"/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="56" y1="32" x2="60" y2="32"/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="32" y1="60" x2="32" y2="56"/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="32" y1="8" x2="32" y2="4"/>
                  <path fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" d="M32,63C14.879,63,1,49.121,1,32S14.879,1,32,1"/>
                  <path fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" d="M32,63c17.121,0,31-13.879,31-31
                    c0-6.713-2.134-12.926-5.759-18l-5.62-5.621"/>
                  <polyline fill="none" stroke="#000000" stroke-width="2" stroke-linejoin="bevel" stroke-miterlimit="10" points="51,19 51,8 62,8 
                    "/>
                  </svg>
                </i>
                <div class="media-body">
                  <h5 class="fs-20 font-weight-normal">Atención al cliente a toda hora</h5>
                </div>
              </div>
              <p>Nuestro equipo de atención al cliente y soporte esta siempre dispuesto a ayudarte</p>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="media align-items-center mb-2">
                <i class="svg-icon fs-50 text-primary mr-3">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                  <rect x="1" y="1" fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" width="46" height="62"/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="9" y1="63" x2="9" y2="2"/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="14" y1="15" x2="42" y2="15"/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="14" y1="21" x2="42" y2="21"/>
                  <polygon fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" points="55,1 55,54 59,62 63,54 63,1 "/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="55" y1="11" x2="63" y2="11"/>
                  </svg>
                </i>
                <div class="media-body">
                  <h5 class="fs-20 font-weight-normal">Experiencia</h5>
                </div>
              </div>
              <p>Tenemos más de 20 años de experiencia en el mercado nacional e internacional.</p>
            </div>
          </div>
          <div class="row gutter-2 gutter-lg-4 justify-content-around">
            <div class="col-md-6 col-lg-4">
              <div class="media align-items-center mb-2">
                <i class="svg-icon fs-50 text-primary mr-3">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                  <g>
                    <rect x="1" y="1" fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" width="62" height="62"/>
                  </g>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="18" y1="8" x2="18" y2="28"/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="28" y1="18" x2="8" y2="18"/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="56" y1="18" x2="36" y2="18"/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="10" y1="54" x2="26" y2="38"/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="10" y1="38" x2="26" y2="54"/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="36" y1="43" x2="56" y2="43"/>
                  <line fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" x1="36" y1="49" x2="56" y2="49"/>
                  </svg>
                </i>
                <div class="media-body">
                  <h5 class="fs-20 font-weight-normal">Todas las medidas que buscas</h5>
                </div>
              </div>
              <p>Todos lo rodamientos que buscabas, sin buscar en otro lugar.</p>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="media align-items-center mb-2">
                <i class="svg-icon fs-50 text-primary mr-3">
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     width="64px" height="64px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve">
                  <polygon fill="none" stroke="#000000" stroke-width="2" stroke-miterlimit="10" points="63,18 63,54 1,54 1,10 22,10 30,18 "/>
                  </svg>
                </i>
                <div class="media-body">
                  <h5 class="fs-20 font-weight-normal">Cotálogos disponibles</h5>
                </div>
              </div>
              <p>Puedes descargar todos nuestros productosen formato pdf para revisarlos en cualquier momento</p>
            </div>
          </div>
        </div>
      </section>
      <!-- / features -->
  
  
    <!-- gallery -->
    <section class="bg-light separator-top separator-bottom">
      <div>
        <div class="container">
          <div class="row justify-content-between">

            <div class="col-12 col-lg-4 align-self-center text-center text-md-left">
              <h2 class="h1">Nuestra <b>Visión</b></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet placeat velit provident blanditiis, dolore nobis cum voluptates</p>
            </div>

            <div class="col-12 col-lg-7 scrolling-gallery" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
              <div data-bottom-top="transform: translateY(0px);" data-top-bottom="transform: translateY(-1000px);">
                <ul class="masonry gallery gutter-1 gutter-md-2">
                  <li class="col-6">
                    <figure class="photo">
                      <a href="/imagenes/imagen_home/segundos-iconos-03.jpg">
                        <img src="/imagenes/imagen_home/segundos-iconos-03.jpg" alt="Image">
                      </a>
                    </figure>
                  </li>
                  <li class="col-6 mt-10">
                    <figure class="photo">
                      <a href="/imagenes/imagen_home/segundos-iconos-06.jpg">
                        <img src="/imagenes/imagen_home/segundos-iconos-06.jpg" alt="Image">
                      </a>
                    </figure>
                  </li>
                  <li class="col-6">
                    <figure class="photo">
                      <a href="/imagenes/imagen_home/segundos-iconos-05.jpg">
                        <img src="/imagenes/imagen_home/segundos-iconos-05.jpg" alt="Image">
                      </a>
                    </figure>
                  </li>
                  <li class="col-6">
                    <figure class="photo">
                      <a href="/imagenes/imagen_home/segundos-iconos-04.jpg">
                        <img src="/imagenes/imagen_home/segundos-iconos-04.jpg" alt="Image">
                      </a>
                    </figure>
                  </li>
                  <li class="col-6">
                    <figure class="photo">
                      <a href="/imagenes/imagen_home/segundos-iconos-01.jpg">
                        <img src="/imagenes/imagen_home/segundos-iconos-01.jpg" alt="Image">
                      </a>
                    </figure>
                  </li>
                  <li class="col-6">
                    <figure class="photo">
                      <a href="/imagenes/imagen_home/segundos-iconos-02.jpg">
                        <img src="/imagenes/imagen_home/segundos-iconos-02.jpg" alt="Image">
                      </a>
                    </figure>
                  </li>

                </ul>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- / gallery -->
  
  
  
      <!-- cta -->
      <section class="bg-primary text-white">
        <div class="container">
          <div class="row justify-content-between align-items-center">
            <div class="col-md-6 text-center text-md-left">
              <h2 class="h3">Únete a nosotros, y disfurta de nuestras promociones.</h2>
            </div>
            <div class="col-md-6 text-center text-md-right">
              <form class="row" action="">
                  <input type="email" class="form-control col-9" id="exampleFormControlInput1" placeholder="nombre@ejemplo.com">                  <button class="btn btn-dark btn-sm col-3" style="width:100%;">Suscribirme</button>
              </form>              
            </div>
          </div>
        </div>
      </section>
      <!-- / cta -->
@endsection