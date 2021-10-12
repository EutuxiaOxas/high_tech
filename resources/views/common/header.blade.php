 <!-- header -->
 <header class="header-sticky header-dark {{ $bg_navbar }}">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-{{$headerLinks}}">
        <a class="navbar-brand" href="{{route('home')}}" aria-label="ir a la pagina de inicio del sitio web">
          <img class="navbar-logo navbar-logo-light" src="{{asset('svg/logo-'. $logoNav1 .'.svg')}}" alt="Logo High Tech" loading="lazy" width="100px" height="75px">
          <img class="navbar-logo navbar-logo-dark" src="{{asset('svg/logo-'. $logoNav2 .'.svg')}}" alt="Logo High Tech" loading="lazy" width="100px" height="75px">
        </a>
        <div class="navbar d-md-none">
            <button class="btn px-2 open_modal_shopping_car" data-toggle="modal" data-target="#modal_shopping_car" style="position:relative;" aria-label="ir al carrito de compras">
                <svg class="navbar-logo-dark" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000"><path d="M0 0h24v24H0z" fill="none"/><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
                <span class="badge_shopping_car text-xs badge_products" style="display: none;"></span>
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="burger"><span></span></span></button>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav align-items-center mr-auto">

            <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}" role="button" aria-label="ir a la pagina de inicio">
                Inicio
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('nosotros')}}" role="button" aria-label="ir a la pagina de nosotros">
                Nosotros
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('contacto')}}" role="button" aria-label="ir a la pagina de contacto">
                Contactanos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('main.blog.home')}}" role="button" aria-label="ir a la pagina del blog de noticias">
                Blog
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Productos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
                    @foreach ($categories as $category)
                        <a class="dropdown-item" href="/categorias/{{ $category->slug }}">
                            <span>{{ $category->category }}</span>
                            <p>{{ $category->description }}</p>
                        </a>
                        <div class="dropdown-divider"></div>
                    @endforeach
                </div>
            </li>

          </ul>

          @if ( !isset($page) )
          <ul class="navbar-nav align-items-center mr-0">
            <li class="nav-item">
                @auth
                    <a class="nav-link" href="{{ route('cms.index') }}" aria-label="ir al formulario de inicio de sesion">Mi Perfil</a>
                @else
                    <a class="nav-link" href="{{ route('login') }}" aria-label="ir al formulario de inicio de sesion">Entrar</a>
                @endauth
            </li>
            <li class="ml-2">
                    <a class="nav-link open_modal_shopping_car" style="position:relative;" href="#" aria-label="ir al carrito de compras" data-toggle="modal" data-target="#modal_shopping_car" aria-label="ir al carrito de compras">
                        @if ($headerLinks == 'light')
                            <svg class="navbar-logo-dark" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000"><path d="M0 0h24v24H0z" fill="none"/><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
                        @else
                            <svg class="navbar-logo-light" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#fff"><path d="M0 0h24v24H0z" fill="none"/><path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
                        @endif
                        <span class="badge_shopping_car text-xs badge_products" style="display: none;"></span>
                    </a>
                </li>
            </ul>
            @endif 
        </div>
      </nav>
    </div>
  </header>
  <!-- header -->
