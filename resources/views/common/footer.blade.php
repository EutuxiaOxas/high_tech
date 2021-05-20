
<!-- footer 4 -->
<footer class="bg-dark text-white">
<div class="separator-bottom py-5">
    <div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
        <p class="lead">Gran trayectoria en el sector Industrial-Empresarial <br>desde <b>1976</b></p>
        </div>
        <div class="col-md-6 text-md-right">
        <ul class="socials">
            <li><a href="" class="icon-facebook fs-20"></a></li>
            <li><a href="" class="icon-instagram fs-20"></a></li>
            <li><a href="" class="icon-twitter fs-20"></a></li>
            <li><a href="" class="icon-linkedin fs-20"></a></li>
        </ul>
        </div>
    </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-4 text-center">
            <div class="mb-1">
            <img  style="max-height: 6rem;"  src="{{asset('svg/logo-light.svg')}}" alt="Logo">
            </div>
            <span class="copyright-text">&copy; High Tech Bearings. 1976 - 2020<br>Todos los derechos reservados</span>
        </div>
        <div class="col col-lg-2">
            <ul class="list-group list-group-minimal">
                @foreach ($categories as $category)
                    <li class="list-group-item">
                        <a href="/categorias/{{ $category->slug }}">
                            {{ $category->category }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col col-lg-2">
            <ul class="list-group list-group-minimal">
            <li class="list-group-item"><a href="{{ route('contacto') }}">Contacto</a></li>
            <li class="list-group-item"><a href="{{ route('nosotros') }}">Nosotros</a></li>
            <li class="list-group-item"><a href="{{ route('main.blog.home') }}">Noticias</a></li>
            <li class="list-group-item"><a href="{{ route('products') }}">Productos</a></li>
            <li class="list-group-item"><a href="">Politicas</a></li>
            </ul>
        </div>
        <div class="col-12 col-md-5 col-lg-4 text-center text-lg-right">
            <a href="tel:02418327147" class="phone_footer bordered">(0241) 8327147</a>
        </div>
    </div>
</div>
</footer>
<!-- / footer 4 -->
