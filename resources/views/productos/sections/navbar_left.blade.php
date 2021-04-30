<div class="row">
@foreach ($categories as $category)
    <div class="card card-minimal col-4 col-lg-12 mb-2 px-0 px-md-1 px-lg-auto">
        <a href="/categorias/{{ $category->slug }}" class="card-img-container">
            <img class="card-img" src="{{ Storage::url($category->imagen) }}" alt="{{ $category->category }}">
        </a>
    </div>
@endforeach
</div>
