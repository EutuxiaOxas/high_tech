@extends('layouts.app')
@php
    $headerLinks="dark";
    $logoNav1="light";
    $logoNav2="dark";
@endphp

@section('title')
 High Tech Bearings
@endsection

@section('content')
<!-- cover -->
<section class="p-0">
  <div class="swiper-container"
    data-top-top="transform: translateY(0px);"
    data-top-bottom="transform: translateY(250px);">
    <div class="swiper-wrapper">
      <div class="swiper-slide vh-100">
        <div class="image image-overlay image-zoom" style="background-image:url(/imagenes/banner.jpg)"></div>
        <div class="caption">
          <div class="container">
            <div class="row justify-content-between vh-100">
              <div class="col-lg-8 align-self-center text-white text-shadow" data-swiper-parallax="-100%">
                <span class="eyebrow text-white mb-1">Rodamientos</span>
                <h1 class="display-2"><b>HIGH TECH</b><br>BEARINGS</h1>
                <a href="{{route('products')}}" class="btn btn-white btn-rounded px-5">Ver Productos</a>
              </div>
              <div class="col-lg-4 align-self-end">
                <div class="row gutter-1">
                  <div class="col-6">
                    <div class="equal">
                      <div class="boxed">
                        <div class="equal-header">
                          <h4>Valencia, VE</h4>
                        </div>
                        <div class="equal-footer">
                          <span class="text-muted">Ubicación</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 text-white">
                    <div class="equal">
                      <div class="bordered">
                        <div class="equal-header">
                          <h4>+25 Años</h4>
                        </div>
                        <div class="equal-footer">
                          <span class="text-muted">Experiencia</span>
                        </div>
                      </div>
                    </div>
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





    <!-- presentation -->
    <!--section-- class="section-lg">
      <div class="container">
        <div class="row text-center text-lg-left">
          <div class="col-12 col-lg-9">
            <div class="row">
              <div class="col-lg-8">
                <h2>A good place <br>to build your startup.</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
            <div class="row gutter-0">
              <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                <div class="bordered rising p-3">
                  <i class="icon-maximize text-green fs-40 mb-3"></i>
                  <h4 class="mb-0">1000 ft<sup>2</sup></h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-delay="150">
                <div class="bordered rising p-3">
                  <i class="icon-users2 text-green fs-40 mb-3"></i>
                  <h4 class="mb-0">80 members</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-delay="300">
                <div class="bordered rising p-3">
                  <i class="icon-wifi2 text-green fs-40 mb-3"></i>
                  <h4 class="mb-0">100 mb/s</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-3 presentation presentation-responsive">
            <img class="left-25 vertical-align" src="../../assets/images/demo/stock/plant.png" alt="Image">
          </div>
        </div>
      </div>
    </!--section-->
    <!-- / presentation -->

<!-- Categorias d-->
<section class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <h2><b>HIGH TECH</b><br>BEARINGS</h2>
      </div>
      <div class="col-lg-6">
        <p>
          Un producto de innovación y calidad, con el respaldo de una experiencia en el ramo de rodamientos con más de 20 años en el mercado nacional e internacional.
        </p>
      </div>
    </div>
    <div class="row" data-aos="fade-left">
      <div class="col">
        <div class="owl-carousel visible" data-items="[3]" data-nav="true" data-margin="10">

          <figure class="user">
            <a href="" class="user-photo">
              <img src="{{asset('/imagenes/imagen_home/segundos-iconos-01.jpg')}}" alt="promo-1">
            </a>
          </figure>
          <figure class="user">
            <a href="" class="user-photo">
              <img src="{{asset('/imagenes/imagen_home/segundos-iconos-02.jpg')}}" alt="promo-2">
            </a>
          </figure>
          <figure class="user">
            <a href="" class="user-photo">
              <img src="{{asset('/imagenes/imagen_home/segundos-iconos-03.jpg')}}" alt="promo-3">
            </a>
          </figure>
          <figure class="user">
            <a href="" class="user-photo">
              <img src="{{asset('/imagenes/imagen_home/segundos-iconos-04.jpg')}}" alt="promo-4">
            </a>
          </figure>
          <figure class="user">
            <a href="" class="user-photo">
              <img src="{{asset('/imagenes/imagen_home/segundos-iconos-05.jpg')}}" alt="promo-5">
            </a>
          </figure>
          <figure class="user">
            <a href="" class="user-photo">
              <img src="{{asset('/imagenes/imagen_home/segundos-iconos-06.jpg')}}" alt="promo-6">
            </a>
          </figure>


        </div>
      </div>
    </div>
  </div>
</section>
<!-- / user carousel -->


    <!-- productos -->
    <section class="bg-dark">
      <div class="container">
        <div class="row text-white justify-content-between align-items-center">
          <div class="col-md-4">
            <h2 class="text-muted"><span class="text-white">+200</span> productos</h2>
          </div>
          <div class="col-md-7">
            <div class="input-group rounded">
              <input type="text" class="form-control px-3" placeholder="Buscar producto ..." aria-label="Search lessons">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">Buscar</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-white" data-aos="fade-left">
          <div class="col">
            <div class="owl-carousel owl-carousel-library visible" data-loop="true" data-items="[3,2,1]" data-margin="30" data-nav="true">
              <article class="tile tile-long">
                <div class="tile-image" style="background-image: url(/imagenes/moto.jpg)"></div>
                <div>
                  <div class="tile-header on-hover text-right">
                    <button class="btn btn-sm btn-outline-info text-dark">Watch Now</button>
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
                    <button class="btn btn-sm btn-outline-info text-dark">Watch Now</button>
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
                    <button class="btn btn-sm btn-outline-info text-dark">Watch Now</button>
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
                    <button class="btn btn-sm btn-outline-info text-dark">Watch Now</button>
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
    <!-- / productos -->

<!-- presentation -->
<section>
  <div class="container-fluid">
    <div class="row align-items-center justify-content-center justify-content-lg-between">
      <div class="col-lg-7">
        <div class="owl-carousel owl-carousel-single pr-0" data-dots="true" data-autoheight="true">
          <img src="{{asset('imagenes/imagen_home/quienes-somos.jpg')}}" alt="Image">
          <img src="{{asset('imagenes/imagenes_pagina/high.jpg')}}" alt="Image">
        </div>
      </div>
      <div class="col-md-8 col-lg-5 pl-lg-4">
        <span class="eyebrow text-primary mb-2"></span>
        <h2>Sabemos lo que <br><b>NECESITAS</b></h2>
        <hr class="w-25 ml-0">
        <div class="row gutter-3">
          <div class="col-12" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
            <h4  class="eyebrow font-weight-bold">HIGH TECH</h4>
            <p>
              Es una marca que viene a posicionarse en el mercado con la versatilidad y calidad que necesita un producto para satisfacer las demandas de un sector tan amplio y exigente como lo es el  INDUSTRIAL - AUTOMOTRIZ.
            </p>
          </div>


        </div>
      </div>
    </div>
  </div>
</section>
<!-- / presentation -->

<!-- faq -->
<section class="bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-6 text-md-center">
        <h2>¿Quieres <i class="font-weight-bold">Conocernos</i>?</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint maiores, consequuntur tempore, odio voluptatem</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="accordion-group accordion-group-minimal" data-accordion-group>
          <div class="accordion" data-accordion data-aos="fade-up">
            <div class="accordion-control" data-control>
              <h5>¿Quienes somos?</h5>
            </div>
            <div class="accordion-content" data-content>
              <div class="accordion-content-wrapper">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quam odit voluptatum, rem libero modi labore porro commodi inventore architecto explicabo reiciendis, perspiciatis voluptatibus odio, sequi nobis? Optio, aperiam, tenetur!</p>
              </div>
            </div>
          </div>
          <div class="accordion" data-accordion data-aos="fade-up">
            <div class="accordion-control" data-control>
              <h5>¿Comó me convierto en DISTRIBUIDOR AUTORIZADO HIGH TECH ?</h5>
            </div>
            <div class="accordion-content" data-content>
              <div class="accordion-content-wrapper">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quam odit voluptatum, rem libero modi labore porro commodi inventore architecto explicabo reiciendis, perspiciatis voluptatibus odio, sequi nobis? Optio, aperiam, tenetur!</p>
              </div>
            </div>
          </div>
          <div class="accordion" data-accordion data-aos="fade-up">
            <div class="accordion-control" data-control>
              <h5>¿Cuales son nuestros puntos de contacto ?</h5>
            </div>
            <div class="accordion-content" data-content>
              <div class="accordion-content-wrapper">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quam odit voluptatum, rem libero modi labore porro commodi inventore architecto explicabo reiciendis, perspiciatis voluptatibus odio, sequi nobis? Optio, aperiam, tenetur!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="accordion-group accordion-group-minimal" data-accordion-group>
          <div class="accordion" data-accordion data-aos="fade-up">
            <div class="accordion-control" data-control>
              <h5>¿Cuantos años en el Mercado ?</h5>
            </div>
            <div class="accordion-content" data-content>
              <div class="accordion-content-wrapper">
                <p>Una marca con el respaldo de ROLITEC más de 25 años en el mercado de rodamientos técnicos </p>
              </div>
            </div>
          </div>
          <div class="accordion" data-accordion data-aos="fade-up">
            <div class="accordion-control" data-control>
              <h5>¿Como contactarnos?</h5>
            </div>
            <div class="accordion-content" data-content>
              <div class="accordion-content-wrapper">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quam odit voluptatum, rem libero modi labore porro commodi inventore architecto explicabo reiciendis, perspiciatis voluptatibus odio, sequi nobis? Optio, aperiam, tenetur!</p>
              </div>
            </div>
          </div>
          <div class="accordion" data-accordion data-aos="fade-up">
            <div class="accordion-control" data-control>
              <h5>¿Donde descargar catalogo de productos?</h5>
            </div>
            <div class="accordion-content" data-content>
              <div class="accordion-content-wrapper">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quam odit voluptatum, rem libero modi labore porro commodi inventore architecto explicabo reiciendis, perspiciatis voluptatibus odio, sequi nobis? Optio, aperiam, tenetur!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / faq -->

<!-- blog -->
<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8 text-center">
        <h2>Artículos de <b>interés.</b></h2>
      </div>
    </div>
    <div class="row">
          @foreach($posts as $post)
            <div class="col-md-6 col-lg-4">
              <article class="card card-minimal">
                <a href="{{route('main.blog.show', $post->slug)}}" class="card-img-container">
                  <img class="card-img" src="/blog_articulos_imagen/{{$post->picture}}" alt="Card image cap">
                </a>
                <div class="card-body">
                  <h5 class="card-title"><a class="text-primary" href="">{{$post->title}}</a></h5>
                  <span class="card-meta">
                    @php
                      $valueaux = substr("$post->content",0,150);
                      echo $valueaux."[...]";
                    @endphp
                   </span>
                </div>
              </article>
            </div>
          @endforeach
    </div>
  </div>
</section>
<!-- / blog -->


@endsection
