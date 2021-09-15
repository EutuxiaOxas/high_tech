
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
                <li><a href="" class="icon-facebook fs-20" rel="noreferrer" aria-label="ver el perfil de facebook"></a></li>
                <li><a href="" class="icon-instagram fs-20" rel="noreferrer" aria-label="ver el perfil de instagram"></a></li>
                <li><a href="" class="icon-twitter fs-20" rel="noreferrer" aria-label="ver el perfil de twitter"></a></li>
                <li><a href="" class="icon-linkedin fs-20" rel="noreferrer" aria-label="ver el perfil de linkedin"></a></li>
            </ul>
        </div>
    </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-4 text-center">
            <div class="mb-1">
            <img  style="max-height: 6rem;"  src="{{asset('svg/logo-light.svg')}}" alt="Logo" loading="lazy">
            </div>
            <span class="copyright-text">&copy; High Tech Bearings. 1976 - 2020<br>Todos los derechos reservados</span>
        </div>
        <div class="col col-lg-2">
            <ul class="list-group list-group-minimal">
                @foreach ($categories as $category)
                    <li class="list-group-item">
                        <a href="/categorias/{{ $category->slug }}" aria-label="ver los productos de la categoria {{ $category->category }}">
                            {{ $category->category }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col col-lg-2">
            <ul class="list-group list-group-minimal">
            <li class="list-group-item"><a href="{{ route('contacto') }}" aria-label="ir a la pagina de contacto">Contacto</a></li>
            <li class="list-group-item"><a href="{{ route('nosotros') }}" aria-label="ir a la pagina de nosotros">Nosotros</a></li>
            <li class="list-group-item"><a href="{{ route('main.blog.home') }}" aria-label="ir a la pagina de noticias">Noticias</a></li>
            <li class="list-group-item"><a href="{{ route('products') }}" aria-label="ir a la pagina de productos">Productos</a></li>
            <li class="list-group-item"><a href="">Politicas</a></li>
            </ul>
        </div>
        <div class="col-12 col-md-5 col-lg-4 text-center text-lg-right">
            <h5 class="font-bold">Atenci&oacute;n personalizada</h5>
            <h6 class="mb-0">M&oacute;vil & Whatsapp</h6>
            <a href="https://api.whatsapp.com/send/?phone=584244174759?texto=Buen%20dia,%20escribo%20del%20sitio%20web" class="" aria-label="ir al chat de whatsapp">+58 424 417 47 59</a> |
            <a href="https://api.whatsapp.com/send/?phone=584244064772?texto=Buen%20dia,%20escribo%20del%20sitio%20web" class="" aria-label="ir al chat de whatsapp">+58 424 406 47 72</a> 
            <br><br>
            <h6 class="mb-0">M&oacute;vil</h6> 
            <a href="#" class="" aria-label="ir al chat de whatsapp">+58 412 098 44 69</a> |
            <a href="#" class="" aria-label="ir al chat de whatsapp">+58 412 098 29 19</a> <br>
        </div>
    </div>
</div>
</footer>
<!-- / footer 4 -->
