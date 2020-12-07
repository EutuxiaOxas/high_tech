<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="/go/app/assets/css/vendor.css" />
    <link rel="stylesheet" href="/go/app/assets/css/style.css" />
  </head>
  <body>

    <!-- header -->
    <header class="header-sticky header-dark">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="../../index.html">
            <img class="navbar-logo navbar-logo-light" src="/go/app/assets/images/demo/logo/logo-light.svg" alt="Logo">
            <img class="navbar-logo navbar-logo-dark" src="/go/app/assets/images/demo/logo/logo-dark.svg" alt="Logo">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="burger"><span></span></span></button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-center mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="../../index.html" role="button">
                  Home
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Pages
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="../../landing-pages.html">
                    <span>Landing Pages</span>
                    <p>Start with one of pre-made templates.</p>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../../inner-pages.html">
                    <span>Inner Pages</span>
                    <p>Extend your website with these pages.</p>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../../app-pages.html">
                    <span>App Pages</span>
                    <p>Add functionality to your website.</p>
                  </a>
                </div>
              </li>
              <li class="nav-item dropdown dropdown-mega">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Components
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown-1">
                  <div class="row">
                    <div class="col">
                      <ul class="mega-list">
                        <li><a href="../../components/index.html" class="highlight">Getting Started</a></li>
                        <li><a href="../../components/accordions.html">Accordions</a></li>
                        <li><a href="../../components/backgrounds.html">Backgrounds</a></li>
                        <li><a href="../../components/blog.html">Blog</a></li>
                        <li><a href="../../components/boxes.html">Boxes</a></li>
                        <li><a href="../../components/buttons.html">Buttons</a></li>
                        <li><a href="../../components/cards.html">Cards</a></li>
                        <li><a href="../../components/carousels.html">Carousels</a></li>
                        <li><a href="../../components/cta.html">CTA</a></li>
                        <li><a href="../../components/features.html">Features</a></li>
                      </ul>
                    </div>
                    <div class="col">
                      <ul class="mega-list">
                        <li><a href="../../components/footers.html">Footers</a></li>
                        <li><a href="../../components/forms.html">Forms</a></li>
                        <li><a href="../../components/gallery.html">Gallery</a></li>
                        <li><a href="../../components/lightbox.html">Lightbox</a></li>
                        <li><a href="../../components/maps.html">Maps</a></li>
                        <li><a href="../../components/masonry.html">Masonry</a></li>
                        <li><a href="../../components/modals.html">Modals</a></li>
                        <li><a href="../../components/partners.html">Partners</a></li>
                        <li><a href="../../components/presentation.html">Presentations</a></li>
                        <li><a href="../../components/pricing.html">Pricing</a></li>
                      </ul>
                    </div>
                    <div class="col">
                      <ul class="mega-list">
                        <li><a href="../../components/progress.html">Progress</a></li>
                        <li><a href="../../components/sliders.html">Sliders</a></li>
                        <li><a href="../../components/steps.html">Steps</a></li>
                        <li><a href="../../components/tables.html">Tables</a></li>
                        <li><a href="../../components/tabs.html">Tabs</a></li>
                        <li><a href="../../components/testimonials.html">Testimonials</a></li>
                        <li><a href="../../components/typed.html">Typed</a></li>
                        <li><a href="../../components/typography.html">Typography</a></li>
                        <li><a href="../../components/users.html">Users</a></li>
                        <li><a href="../../components/utility.html">Utility</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </li>
            </ul>

            <ul class="navbar-nav align-items-center mr-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Michael Doe
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="../app/profile.html">Public Profile</a>
                  <a class="dropdown-item" href="../app/connections.html">Connections</a>
                  <a class="dropdown-item" href="../app/groups.html">Groups</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../app/settings.html">Settings</a>
                  <a class="dropdown-item" href="../app/payments.html">Payments</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- header -->


    @yield('content')


    <!-- footer -->
    <footer class="bg-dark text-white">
      <div class="container py-5">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-5 text-center text-md-left">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Contacts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Legal Information</a>
              </li>
            </ul>
          </div>
          <div class="col-md-2 text-center">
            <img class="logo-sm" src="/go/app/assets/images/demo/logo/logo-light.svg" alt="Logo">
          </div>
          <div class="col-md-5 text-center text-md-right">
            <ul class="socials">
              <li><a href="" class="icon-facebook fs-20"></a></li>
              <li><a href="" class="icon-instagram fs-20"></a></li>
              <li><a href="" class="icon-twitter fs-20"></a></li>
              <li><a href="" class="icon-linkedin fs-20"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- / footer -->



    <script src="/go/app/assets/js/vendor.js"></script>
    <script src="/go/app/assets/js/app.js"></script>

  </body>
</html>


    
        <!--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     Left Side Of Navbar 
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    Right Side Of Navbar 
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links 
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>-->