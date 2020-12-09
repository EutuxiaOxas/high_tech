@extends('layouts.app')

@section('title')
 High Tech Blog
@endsection




@section('content')
<!-- hero -->
<section class="hero hero-with-header bg-light separator-bottom">
  <div class="container">
    <div class="row justify-content-center">
    <div class="col text-center">
        <h1>Latest Blog Posts</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/inner-pages.html">Inner Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Default</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4">
        @foreach($posts as $post)
        	<div class="card card-minimal">
        	  <a href="{{route('main.blog.show', $post->slug)}}" class="card-img-container">
        	    <img class="card-img" src="/blog_articulos_imagen/{{$post->picture}}" alt="Card image cap">
        	  </a>
        	  <div class="card-body">
        	    <h5 class="card-title"><a href="">{{$post->title}}</a></h5>
        	    <span class="card-meta">Posted in Travel by <a href="">Mike Ross</a></span>
        	  </div>
        	</div>
        @endforeach
      </div>
    </div>
  </div>    
</section>
<!-- / hero -->


<!-- left sidebar -->
<section>
  <div class="container-fluid">
    <div class="row">
      <aside class="col-md-4 pl-lg-5">
        <div class="widget">
          <span class="widget-title">Categoria</span>
          <div class="list-group list-group-categories">
            @foreach($categorias as $categoria)
	            <a href="{{route('main.blog.categorie', $categoria->slug)}}" class="list-group-item d-flex justify-content-between align-items-center">
	              {{$categoria->name}}
	              <span class="badge">{{$categoria->articles->count()}}</span>
	            </a>
	        @endforeach
          </div>
        </div>
        <div class="widget">
          <span class="widget-title">Latest News</span>
          <ul class="feed">
            <li>
              <a href="" class="feed-item">
                <img src="../../assets/images/demo/image-1.jpg" alt="Image">
                <div class="feed-item-content">
                  <h3>Top 10 most beautifull beaches of mediteranian sea</h3>
                </div>
              </a>
            </li>
            <li>
              <a href="" class="feed-item">
                <img src="../../assets/images/demo/image-2.jpg" alt="Image">
                <div class="feed-item-content">
                  <h3>Amazing views of Paradise Bay</h3>
                </div>
              </a>
            </li>
            <li>
              <a href="" class="feed-item">
                <img src="../../assets/images/demo/image-3.jpg" alt="Image">
                <div class="feed-item-content">
                  <h3>Amazing views of Paradise Bay</h3>
                </div>
              </a>
            </li>
            <li>
              <a href="" class="feed-item">
                <img src="../../assets/images/demo/image-4.jpg" alt="Image">
                <div class="feed-item-content">
                  <h3>Amazing views of Paradise Bay</h3>
                </div>
              </a>
            </li>
          </ul>
        </div>
        <div class="widget">
          <span class="widget-title">Tags</span>
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
      </aside>
      <div class="col-md-8">
        <ul class="masonry row gutter-3">
          <li class="col-md-6">
            <article class="card card-minimal">
              <a href="" class="card-img-container">
                <img class="card-img" src="../../assets/images/demo/image-1.jpg" alt="Card image cap">
              </a>
              <div class="card-body">
                <h5 class="card-title"><a href="">Planning amazing weddings that you won’t forget.</a></h5>
                <span class="card-meta">Posted in Travel by <a href="">Mike Ross</a></span>
              </div>
            </article>
          </li>
          <li class="col-md-6">
            <article class="card card-minimal">
              <a href="" class="card-img-container">
                <img class="card-img" src="../../assets/images/demo/image-3.jpg" alt="Card image cap">
              </a>
              <div class="card-body">
                <h5 class="card-title"><a href="">Planning amazing weddings that you won’t forget.</a></h5>
                <span class="card-meta">Posted in Travel by <a href="">Mike Ross</a></span>
              </div>
            </article>
          </li>
          <li class="col-md-6">
            <article class="card card-minimal">
              <a href="" class="card-img-container">
                <img class="card-img" src="../../assets/images/demo/image-2.jpg" alt="Card image cap">
              </a>
              <div class="card-body">
                <h5 class="card-title"><a href="">Planning amazing weddings that you won’t forget.</a></h5>
                <span class="card-meta">Posted in Travel by <a href="">Mike Ross</a></span>
              </div>
            </article>
          </li>
          <li class="col-md-6">
            <article class="card card-minimal">
              <a href="" class="card-img-container">
                <img class="card-img" src="../../assets/images/demo/image-4.jpg" alt="Card image cap">
              </a>
              <div class="card-body">
                <h5 class="card-title"><a href="">Planning amazing weddings that you won’t forget.</a></h5>
                <span class="card-meta">Posted in Travel by <a href="">Mike Ross</a></span>
              </div>
            </article>
          </li>
          <li class="col-md-6">
            <article class="card card-minimal">
              <a href="" class="card-img-container">
                <img class="card-img" src="../../assets/images/demo/image-5.jpg" alt="Card image cap">
              </a>
              <div class="card-body">
                <h5 class="card-title"><a href="">Planning amazing weddings that you won’t forget.</a></h5>
                <span class="card-meta">Posted in Travel by <a href="">Mike Ross</a></span>
              </div>
            </article>
          </li>
        </ul>
      </div> 
    </div>
  </div>
</section>
<!-- / right sidebar -->


@endsection