@extends('layouts.app')
@php
    $headerLinks="light";
    $logoNav1="dark";
    $logoNav2="dark";
    $bg_navbar = 'bg-white';
@endphp

@section('title')
	{{$post->title}}
@endsection

@section('head') 
    <link rel="canonical" href="https://www.hightechinternational.net/{{$post->slug}}" />
    <meta name="robots" content="index,follow"/>

    <!-- Primary Meta Tags -->
    <meta name="title" content="{{$post->title}} - High Tech Bearings">
    <meta name="description" content="{{$post->title}} - High Tech Bearings">
    <meta name="keywords" content="{{$post->title}}">

    <!-- Open Graph para Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$post->title}} - High Tech Bearings" />
    <meta property="og:url" content="https://www.hightechinternational.net/{{$post->slug}}" />
    <meta property="og:image" content="{{ asset( 'home.png' ) }}" />
    <meta property="og:description" content="{{$post->title}}" />
    <meta property="og:site_name" content="High Tech Bearings" />
@endsection

<style>
    .tag-cloud a:hover {
        background: #17a2b8!important;
        color: #fff;
    }
</style>

@section('content')

<!-- cover -->
<div id="texto_blog" style="position: absolute; visibility: hidden;">
  {{$post->title}}
  {!!$post->content!!}
</div>
<section class="p-0">
  <div class="swiper-container text-white"
    data-top-top="transform: translateY(0px);"
    data-top-bottom="transform: translateY(250px);">
    <div class="swiper-wrapper">
      <div class="swiper-slide vh-100">
        <div class="image image-overlay image-zoom" style="background-image:url({{ Storage::url($post->picture) }})"></div>
        <div class="caption">
          <div class="container">
            <div class="row align-items-center vh-100">
              <div class="col-md-8" data-swiper-parallax-y="-250%">
                <span class="eyebrow mb-2">{{$post->categoria->name}}</span>
                <h1 class="display-2">{{$post->title}}</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-footer mb-5">
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

<section>
  <div class="container">
    {{-- <div class="row justify-content-center">
      <button id="boton_reproducir" style="display: none;" class="btn btn-outline-info px-5">Reproducir post</button>
      <div id="reproductor_container" class="reproductor">
        <audio src=""  id="reproductor" controls="true" style="display: none;"></audio>
      </div>
    </div> --}}
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-10 text-lg">
        {!! $post->content !!}
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <div class="tag-cloud">
          @foreach($post->keywords as $keyword)
            <a href="{{route('main.blog.tag', $keyword->keyword)}}">{{$keyword->keyword}}</a>
          @endforeach
        </div>
      </div>
    </div>

    <style>
        .social_div {
            height: 50px!important;
            width: 50px;
            position: relative;
        }
    </style>

    @include('components.social_mobile')
  </div>

</section>

<!-- news -->
<section class="bg-light separator-top">
  <div class="container">
    <div class="row">
      <div class="col">
        <h2>Últimos artículos</h2>
      </div>
    </div>
    <div class="row gutter-2">
      @foreach($other_posts as $other_post)
        <div class="col-md-6 col-lg-4">
          <article class="tile">
            <div class="tile-image" style="background-image: url({{ Storage::url($other_post->picture) }})"></div>
            <a href="{{route('main.blog.show', $other_post->slug)}}" class="tile-content">
              <div class="tile-header">
                <span class="eyebrow mb-1">{{$other_post->categoria->name}}</span>
                <h3>{{$other_post->title}}</h3>
              </div>
              <div class="tile-footer">
                <button class="btn btn-ico btn-outline-white btn-rounded">
                  <i class="icon-arrow-right2 fs-20"></i>
                </button>
              </div>
            </a>
          </article>
        </div>
      @endforeach
    </div>
  </div>
</section>
<!-- / news -->

<script type="text/javascript">
  const reproductor = document.getElementById('reproductor')

  let botonReproducir


  document.addEventListener('DOMContentLoaded', () => {
    let texto = document.getElementById('texto_blog')
    botonReproducir = document.getElementById('boton_reproducir')
    botonReproducir.style.display = 'block'


    boton_reproducir.addEventListener('click', () => {
      let changeText = encodeURIComponent(texto.textContent)
        url = `https://audio1.spanishdict.com/audio?lang=es&text=${changeText}`

      botonReproducir.style.display = 'none'
      reproductor.style.display = 'block'

      reproductor.src = url
      reproductor.play()

    })
  })
</script>

<script type="text/javascript">
//-------- COMPARTIR CON REDES SOCIALES ------------
  const facebook = document.getElementById('facebook'),
      twitter = document.getElementById('twitter'),
      linkedin = document.getElementById('linkedin'),
      pinterest = document.getElementById('pinterest')

  let dir = window.location;
  let dir2 = encodeURIComponent(dir);
  let tit = window.document.title;
  let tit2 = encodeURIComponent(tit);

  facebook.addEventListener('click', (e) => {
    e.preventDefault()
    url = `http://www.facebook.com/share.php?u=${dir2}&t=${tit2}`
    window.open(url, '','width=600,height=400,left=50,top=50')
  })

  twitter.addEventListener('click', (e) => {
    url= `http://twitter.com/?status=${tit2}%20${dir}`
    window.open(url, '', 'width=600,height=400,left=50,top=50')
  })


  linkedin.addEventListener('click', (e) => {
    e.preventDefault();

    window.open(`http://www.linkedin.com/shareArticle?url='+${encodeURIComponent(window.location)}`, '', 'width=600,height=400,left=50,top=50')
  })


</script>

{{-- CallToAction --}}
@include('components.cta')
{{-- End CallToAction --}}

{{-- Social lateral --}}
@include('components.social_lateral')
{{-- End Social lateral --}}

@endsection
