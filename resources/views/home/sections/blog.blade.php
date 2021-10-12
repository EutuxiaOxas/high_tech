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
            <a href="{{route('main.blog.show', $post->slug)}}" class="card-img-container" aria-label="ver el articulo">
                <img class="card-img" src="{{ Storage::url($post->picture) }}" alt="{{ ucfirst(strtolower($post->title)) }} | High Tech" loading="lazy" width="100px" height="100px">
            </a>
            <div class="card-body">
                <h5 class="card-title">
                <a class="text-dark" href="{{route('main.blog.show', $post->slug)}}" aria-label="ver el articulo">
                    {{ ucfirst(strtolower($post->title)) }}
                </a>
            </h5>
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
