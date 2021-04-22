@extends('layouts.app')
@php
    $headerLinks="dark";
    $logoNav1="light";
    $logoNav2="dark";
    $bg_navbar = '';
@endphp

@section('title')
 High Tech Bearings
@endsection

@section('content')


{{-- Banner Principal s--}}
@include('home.sections.banner_principal')
{{-- End Banner Principal --}}

{{-- Carousel Series --}}
@include('home.sections.carousel_series')
{{-- End Carousel Series --}}

{{-- Products --}}
@include('home.sections.products')
{{-- End Products --}}

{{-- Informacion General --}}
@include('home.sections.general_info')
{{-- End Informacion General --}}

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
                  <img class="card-img" src="{{ Storage::url($post->picture) }}" alt="Card image cap">
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
