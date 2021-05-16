 <!-- header -->
 <header class="header-sticky header-dark {{ $bg_navbar }}">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-{{$headerLinks}}">
        <a class="navbar-brand" href="{{route('home')}}">
          <img class="navbar-logo navbar-logo-light" src="{{asset('svg/logo-'. $logoNav1 .'.svg')}}" alt="Logo High Tech">
          <img class="navbar-logo navbar-logo-dark" src="{{asset('svg/logo-'. $logoNav2 .'.svg')}}" alt="Logo High Tech">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="burger"><span></span></span></button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav align-items-center mr-auto">

            <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}" role="button">
                Inicio
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('nosotros')}}" role="button">
                Nosotros
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('contacto')}}" role="button">
                Contactanos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('main.blog.home')}}" role="button">
                Blog
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Productos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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

          {{-- <ul class="navbar-nav align-items-center mr-0">
            <li class="nav-item">
                <a href="tel:+584244036917" class="phone bordered">+58 424 403 69 17</a>
            </li>
          </ul> --}}
        </div>
      </nav>
    </div>
  </header>
  <!-- header -->
