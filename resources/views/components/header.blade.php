 <!-- header -->
 <header class="header-sticky header-dark">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{route('home')}}">
          <img class="navbar-logo navbar-logo-light" src="/go/app/assets/images/demo/logo/logo-light.svg" alt="Logo">
          <img class="navbar-logo navbar-logo-dark" src="/go/app/assets/images/demo/logo/logo-dark.svg" alt="Logo">
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
                <a class="nav-link" href="../../index.html" role="button">
                  Blog
                </a>
              </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Productos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../../landing-pages.html">
                  <span>Serie Automotriz</span>
                  <p>Rodamientos  especializados en las aplicaciones automotrices.</p>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../inner-pages.html">
                  <span>Serie 6000</span>
                  <p>Rodamientos rígidos de bolas.</p>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../app-pages.html">
                  <span>Serie Moto</span>
                  <p>Línea de productos especialmente para motocicletas.</p>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../app-pages.html">
                  <span>Chumaceras</span>
                  <p>Chumaceras tipo puente y tipo brida</p>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../app-pages.html">
                  <span>Serie Cadenas</span>
                  <p>Cadenas de excelente calidad.</p>
                </a>
              </div>
            </li>
           
          </ul>

          <ul class="navbar-nav align-items-center mr-0">
            <li class="nav-item">
                <a href="tel:372-567-89-89" class="phone bordered">+372 567 89 89</a>
              </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <!-- header -->
