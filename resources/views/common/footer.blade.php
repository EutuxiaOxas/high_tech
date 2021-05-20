<style>
    .phone_footer{
        border-color: rgba(255, 255, 255, 0.2);
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
        transition: all 0.2s;
        -webkit-transition-delay: 0s;
        -moz-transition-delay: 0s;
        transition-delay: 0s;
        position: relative;
        display: inline-block;
        padding: 1rem 1rem 1rem 5rem;
        color: #000;
        letter-spacing: 0.05em;
    }
    .phone_footer::before {
        -webkit-transition: all 0.2s;
        -moz-transition: all 0.2s;
        transition: all 0.2s;
        -webkit-transition-delay: 0s;
        -moz-transition-delay: 0s;
        transition-delay: 0s;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 3.625rem;
        content: "\ec73";
        text-align: center;
        line-height: 3.625rem;
        font-family: "icomoon";
        font-size: 20px;
        background: rgba(255, 255, 255, 0.2);
    }
    .phone_footer:hover::before {
        background: #17a2b8;
    }
    .phone_footer:hover{
        border-color: #17a2b8 !important;
        border-radius: 0.25rem;

    }
</style>
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
