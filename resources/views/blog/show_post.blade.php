@extends('layouts.app')

@section('title')
	{{$post->title}}
@endsection



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
        <div class="image image-overlay image-zoom" style="background-image:url(/blog_articulos_imagen/{{$post->picture}})"></div>
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
    <button id="boton_reproducir" style="display: none;" class="btn btn-outline-primary">Reproducir post</button>
    <div id="reproductor_container" class="reproductor align-items-center">
      <audio src=""  id="reproductor" controls="true" style="display: none;"></audio>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        {!! $post->content !!}
      </div>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="owl-carousel owl-carousel-single" data-dots="true" data-nav="true" data-autoplay="true">
          <figure class="photo">
            <img src="/go/app/assets/images/demo/coworking/coworking-1.jpg" alt="Image">
          </figure>
          <figure class="photo">
            <img src="/go/app/assets/images/demo/coworking/coworking-2.jpg" alt="Image">
          </figure>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae vero molestias odit voluptatem eum sit, laboriosam tempora officiis, ullam eaque modi beatae voluptate incidunt consequatur assumenda perferendis unde natus hic!</p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8">
        <div class="tag-cloud">
          <a href="">Design</a>
          <a href="">Development</a>
          <a href="">Travel</a>
          <a href="">Web Design</a>
          <a href="">Marketing</a>
          <a href="">Research</a>
          <a href="">Managment</a>
        </div>
      </div>
    </div>
  </div>
  <div class="my-3">
    <h3>Compartir en redes sociales</h3>
    <div class="d-flex">
      <a href="#" id="facebook">
        <img src="/icons/facebook.svg" style="width: 50px;height: 50px; cursor: pointer;">
      </a>
      <a href="#" id="twitter">
        <img src="/icons/twitter.svg" style="width: 50px;height: 50px; cursor: pointer;">
      </a>
      <a href="#" id="linkedin">
        <img src="/icons/linkedin.svg" style="width: 50px;height: 50px; cursor: pointer;">
      </a>
      <a href="#" id="pinterest">
        <img src="/icons/pinterest.svg" style="width: 50px;height: 50px; cursor: pointer;">
      </a>
    </div>
  </div>
</section>



<!-- news -->
<section class="bg-light separator-top">
  <div class="container">
    <div class="row">
      <div class="col">
        <h2>Latest News</h2>
      </div>
    </div>
    <div class="row gutter-2">
      <div class="col-md-6 col-lg-4">
        <article class="tile">
          <div class="tile-image" style="background-image: url(/go/app/assets/images/demo/image-square-1.jpg)"></div>
          <a href="" class="tile-content">
            <div class="tile-header">
              <span class="eyebrow mb-1">Design</span>
              <h3>Quick guide on traveling with friends.</h3>
            </div>
            <div class="tile-footer">
              <button class="btn btn-ico btn-outline-white btn-rounded">
                <i class="icon-arrow-right2 fs-20"></i>
              </button>
            </div>
          </a>
        </article>
      </div>
      <div class="col-md-6 col-lg-4">
        <article class="tile">
          <div class="tile-image" style="background-image: url(/go/app/assets/images/demo/image-square-2.jpg)"></div>
          <a href="" class="tile-content">
            <div class="tile-header">
              <span class="eyebrow mb-1">Design</span>
              <h3>Quick guide on traveling with friends.</h3>
            </div>
            <div class="tile-footer">
              <button class="btn btn-ico btn-outline-white btn-rounded">
                <i class="icon-arrow-right2 fs-20"></i>
              </button>
            </div>
          </a>
        </article>
      </div>
      <div class="col-md-6 col-lg-4">
        <article class="tile">
          <div class="tile-image" style="background-image: url(/go/app/assets/images/demo/image-square-3.jpg)"></div>
          <a href="" class="tile-content">
            <div class="tile-header">
              <span class="eyebrow mb-1">Design</span>
              <h3>Quick guide on traveling with friends.</h3>
            </div>
            <div class="tile-footer">
              <button class="btn btn-ico btn-outline-white btn-rounded">
                <i class="icon-arrow-right2 fs-20"></i>
              </button>
            </div>
          </a>
        </article>
      </div>
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

@endsection