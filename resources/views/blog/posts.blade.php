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
            @foreach($latest_posts as $latest_post)
              <li>
                <a href="{{route('main.blog.show', $latest_post->slug)}}" class="feed-item">
                  <img src="/blog_articulos_imagen/{{$latest_post->picture}}" alt="Image">
                  <div class="feed-item-content">
                    <h3>{{$latest_post->title}}</h3>
                  </div>
                </a>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="widget">
          <span class="widget-title">Tags</span>
          <div class="tag-cloud">
            @foreach($tags as $tag)
              <a href="{{route('main.blog.tag', $tag->keyword)}}">{{$tag->keyword}}</a>
            @endforeach
          </div>
        </div>
      </aside>
      <div class="col-md-8">
        <ul class="masonry row gutter-3">
          @foreach($posts as $post)
            <li class="col-md-6">
              <article class="card card-minimal">
                <a href="{{route('main.blog.show', $post->slug)}}" class="card-img-container">
                  <img class="card-img" src="/blog_articulos_imagen/{{$post->picture}}" alt="Card image cap">
                </a>
                <div class="card-body">
                  <h5 class="card-title"><a href="">{{$post->title}}</a></h5>
                  
                </div>
              </article>
            </li>
          @endforeach
        </ul>
        {{$posts->links()}}
      </div> 
    </div>
  </div>
</section>
<!-- / right sidebar -->


@endsection