@extends('layouts.app')

@php
    $headerLinks="light";
    $logoNav1="dark";
    $logoNav2="dark";
    $bg_navbar = '';
@endphp

@section('title')
 High Tech Blog
@endsection

<style>
    .tag-cloud a:hover {
        background: #17a2b8!important;
        color: #fff;
    }
</style>

@section('content')
<!-- hero -->
<section class="hero hero-with-header bg-light separator-bottom">
  <div class="container">
    <div class="row justify-content-center">
    <div class="col text-center">
        <h1>Blog de noticias y actualidad</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-custom">
            <li class="breadcrumb-item"><a href="{{route('home')}}" aria-label="Ir al inicio del sitio">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
      <aside class="col-md-4 order-last order-md-first pl-lg-5">
        <div class="widget">
          <span class="widget-title">Categorías</span>
          <div class="list-group list-group-categories">
            @foreach($categorias as $categoria)
	            <a href="{{route('main.blog.categorie', $categoria->slug)}}" class="list-group-item d-flex justify-content-between align-items-center text-dark" aria-label="ir a la categoria {{$categoria->name}}">
	              {{$categoria->name}}
	              <span class="badge">{{$categoria->articles->count()}}</span>
	            </a>
	        @endforeach
          </div>
        </div>
        <div class="widget">
          <span class="widget-title">Últimas noticias</span>
          <ul class="feed">
            @foreach($latest_posts as $latest_post)
              <li>
                <a href="{{route('main.blog.show', $latest_post->slug)}}" class="feed-item" aria-label="ir al articulo {{$latest_post->title}}">
                  <img src="{{ Storage::url($latest_post->picture) }}" alt="{{$latest_post->title}} | High Tech Bearings" loading="lazy">
                  <div class="feed-item-content">
                    <h3 class="text-dark">{{$latest_post->title}}</h3>
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
              <a href="{{route('main.blog.tag', $tag->keyword)}}" aria-label="ir al tag {{$tag->keyword}}">{{$tag->keyword}}</a>
            @endforeach
          </div>
        </div>
      </aside>
      <div class="col-md-8 order-first order-md-last">
        <ul class="masonry row gutter-3">
          @foreach($posts as $post)
            <li class="col-md-6">
              <article class="card card-minimal">
                <a href="{{route('main.blog.show', $post->slug)}}" class="card-img-container" aria-label="ver el post {{$post->title}}">
                  <img class="card-img" src="{{ Storage::url($post->picture) }}" alt="{{$post->title}} | High Tech Bearings" loading="lazy">
                </a>
                <div class="card-body">
                  <h5 class="card-title text-dark"><a href="{{route('main.blog.show', $post->slug)}}" aria-label="ver el post {{$post->title}}">{{$post->title}}</a></h5>
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
