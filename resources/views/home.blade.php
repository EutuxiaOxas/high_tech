@extends('layouts.app')

@section('title')
 High Tech Bearings
@endsection

@section('content')
<!-- cover -->
<section class="p-0">
  <div class="swiper-container"
    data-top-top="transform: translateY(0px);" 
    data-top-bottom="transform: translateY(250px);">
    <div class="swiper-wrapper">
      <div class="swiper-slide vh-100">
        <div class="image image-overlay image-zoom" style="background-image:url(/go/app/assets/images/demo/event/event-1.jpg)"></div>
        <div class="caption">
          <div class="container">
            <div class="row justify-content-between vh-100">
              <div class="col-lg-8 align-self-center text-white text-shadow" data-swiper-parallax="-100%">
                <span class="eyebrow text-white mb-1">Design Rethinked</span>
                <h1 class="display-2">Visual Design Conference</h1>
                <a href="" class="btn btn-white btn-rounded px-5">Register</a>
              </div>
              <div class="col-lg-4 align-self-end">
                <div class="row gutter-1">
                  <div class="col-6">
                    <div class="equal">
                      <div class="boxed">
                        <div class="equal-header">
                          <h4>Dec 18, 2018</h4>
                        </div>
                        <div class="equal-footer">
                          <span class="text-muted">when</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 text-white">
                    <div class="equal">
                      <div class="bordered">
                        <div class="equal-header">
                          <h4>San Francisco</h4>
                        </div>
                        <div class="equal-footer">
                          <span class="text-muted">where</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 text-white">
                    <div class="equal">
                      <div class="bordered">
                        <div class="equal-header">
                          <h4>120 Speakers</h4>
                        </div>
                        <div class="equal-footer">
                          <span class="text-muted">who</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-footer text-white">
        <div class="container-fluid">
          <div class="row">
            <div class="col text-center">
              <div class="mouse"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / cover -->





    <!-- presentation -->
    <section class="section-lg">
      <div class="container">
        <div class="row text-center text-lg-left">
          <div class="col-12 col-lg-9">
            <div class="row">
              <div class="col-lg-8">
                <h2>A good place <br>to build your startup.</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>
            <div class="row gutter-0">
              <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
                <div class="bordered rising p-3">
                  <i class="icon-maximize text-green fs-40 mb-3"></i>
                  <h4 class="mb-0">1000 ft<sup>2</sup></h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-delay="150">
                <div class="bordered rising p-3">
                  <i class="icon-users2 text-green fs-40 mb-3"></i>
                  <h4 class="mb-0">80 members</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom" data-aos-delay="300">
                <div class="bordered rising p-3">
                  <i class="icon-wifi2 text-green fs-40 mb-3"></i>
                  <h4 class="mb-0">100 mb/s</h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-3 presentation presentation-responsive">
            <img class="left-25 vertical-align" src="../../assets/images/demo/stock/plant.png" alt="Image">
          </div>
        </div>
      </div>
    </section>
    <!-- / presentation -->

<!-- user carousel -->
<section class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <h2>Our Speakers</h2>
      </div>
      <div class="col-lg-6">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae esse rem nesciunt quos, porro ratione reprehenderit unde fuga commodi incidunt fugiat iure omnis eaque autem animi nemo explicabo cum earum.</p>
      </div>
    </div>
    <div class="row" data-aos="fade-left">
      <div class="col">
        <div class="owl-carousel visible" data-items="[3]" data-nav="true" data-margin="10">
          <figure class="user">
            <a href="" class="user-photo">
              <img src="/go/app/assets/images/demo/user-1.jpg" alt="Avatar">
            </a>
            <figcaption class="user-caption">
              <h4>Nicole Doe</h4>
              <span>Head of Experience Design</span>
              <ul class="socials bordered">
                <li><a href="" class="icon-facebook fs-20"></a></li>
                <li><a href="" class="icon-instagram fs-20"></a></li>
                <li><a href="" class="icon-twitter fs-20"></a></li>
                <li><a href="" class="icon-linkedin fs-20"></a></li>
              </ul>
            </figcaption>
          </figure>

          <figure class="user">
            <a href="" class="user-photo">
              <img src="/go/app/assets/images/demo/user-2.jpg" alt="Avatar">
            </a>
            <figcaption class="user-caption">
              <h4>Valerie Doe</h4>
              <span>Head of Experience Design</span>
              <ul class="socials bordered">
                <li><a href="" class="icon-facebook fs-20"></a></li>
                <li><a href="" class="icon-instagram fs-20"></a></li>
                <li><a href="" class="icon-twitter fs-20"></a></li>
                <li><a href="" class="icon-linkedin fs-20"></a></li>
              </ul>
            </figcaption>
          </figure>

          <figure class="user">
            <a href="" class="user-photo">
              <img src="/go/app/assets/images/demo/user-3.jpg" alt="Avatar">
            </a>
            <figcaption class="user-caption">
              <h4>Michael Doe</h4>
              <span>Head of Experience Design</span>
              <ul class="socials bordered">
                <li><a href="" class="icon-facebook fs-20"></a></li>
                <li><a href="" class="icon-instagram fs-20"></a></li>
                <li><a href="" class="icon-twitter fs-20"></a></li>
                <li><a href="" class="icon-linkedin fs-20"></a></li>
              </ul>
            </figcaption>
          </figure>

          <figure class="user">
            <a href="" class="user-photo">
              <img src="/go/app/assets/images/demo/user-4.jpg" alt="Avatar">
            </a>
            <figcaption class="user-caption">
              <h4>John Doe</h4>
              <span>Head of Experience Design</span>
              <ul class="socials bordered">
                <li><a href="" class="icon-facebook fs-20"></a></li>
                <li><a href="" class="icon-instagram fs-20"></a></li>
                <li><a href="" class="icon-twitter fs-20"></a></li>
                <li><a href="" class="icon-linkedin fs-20"></a></li>
              </ul>
            </figcaption>
          </figure>

          <figure class="user">
            <a href="" class="user-photo">
              <img src="/go/app/assets/images/demo/user-5.jpg" alt="Avatar">
            </a>
            <figcaption class="user-caption">
              <h4>Valerie Doe</h4>
              <span>Head of Experience Design</span>
              <ul class="socials bordered">
                <li><a href="" class="icon-facebook fs-20"></a></li>
                <li><a href="" class="icon-instagram fs-20"></a></li>
                <li><a href="" class="icon-twitter fs-20"></a></li>
                <li><a href="" class="icon-linkedin fs-20"></a></li>
              </ul>
            </figcaption>
          </figure>

          <figure class="user">
            <a href="" class="user-photo">
              <img src="/go/app/assets/images/demo/user-6.jpg" alt="Avatar">
            </a>
            <figcaption class="user-caption">
              <h4>Ariana Doe</h4>
              <span>Head of Experience Design</span>
              <ul class="socials bordered">
                <li><a href="" class="icon-facebook fs-20"></a></li>
                <li><a href="" class="icon-instagram fs-20"></a></li>
                <li><a href="" class="icon-twitter fs-20"></a></li>
                <li><a href="" class="icon-linkedin fs-20"></a></li>
              </ul>
            </figcaption>
          </figure>

          <figure class="user">
            <a href="" class="user-photo">
              <img src="/go/app/assets/images/demo/user-7.jpg" alt="Avatar">
            </a>
            <figcaption class="user-caption">
              <h4>Josh Doe</h4>
              <span>Head of Experience Design</span>
              <ul class="socials bordered">
                <li><a href="" class="icon-facebook fs-20"></a></li>
                <li><a href="" class="icon-instagram fs-20"></a></li>
                <li><a href="" class="icon-twitter fs-20"></a></li>
                <li><a href="" class="icon-linkedin fs-20"></a></li>
              </ul>
            </figcaption>
          </figure>

          <figure class="user">
            <a href="" class="user-photo">
              <img src="/go/app/assets/images/demo/user-8.jpg" alt="Avatar">
            </a>
            <figcaption class="user-caption">
              <h4>Richard Doe</h4>
              <span>Head of Experience Design</span>
              <ul class="socials bordered">
                <li><a href="" class="icon-facebook fs-20"></a></li>
                <li><a href="" class="icon-instagram fs-20"></a></li>
                <li><a href="" class="icon-twitter fs-20"></a></li>
                <li><a href="" class="icon-linkedin fs-20"></a></li>
              </ul>
            </figcaption>
          </figure>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- / user carousel -->


    <!-- lessons -->
    <section class="bg-dark">
      <div class="container">
        <div class="row text-white justify-content-between align-items-center">
          <div class="col-md-4">
            <h2 class="text-muted"><span class="text-white">120</span> lessons</h2>
          </div>
          <div class="col-md-7">
            <div class="input-group rounded">
              <input type="text" class="form-control px-3" placeholder="Search lessons ..." aria-label="Search lessons">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">Search</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-white" data-aos="fade-left">
          <div class="col">
            <div class="owl-carousel owl-carousel-library visible" data-loop="true" data-items="[3,2,1]" data-margin="30" data-nav="true">
              <article class="tile tile-long">
                <div class="tile-image" style="background-image: url(../../assets/images/demo/learning/learning-4.jpg)"></div>
                <div>
                  <div class="tile-header on-hover text-right">
                    <button class="btn btn-sm btn-outline-white">Watch Now</button>
                  </div>
                  <div class="tile-footer">
                    <span class="eyebrow">Development</span>
                    <h3>Developing Wordpress Theme from Scratch</h3>
                  </div>
                </div>
              </article>
              <article class="tile tile-long">
                <div class="tile-image" style="background-image: url(../../assets/images/demo/learning/learning-5.jpg)"></div>
                <div>
                  <div class="tile-header on-hover text-right">
                    <button class="btn btn-sm btn-outline-white">Watch Now</button>
                  </div>
                  <div class="tile-footer">
                    <span class="eyebrow">Photography</span>
                    <h3>Finding the Right Exposure in Low Light</h3>
                  </div>
                </div>
              </article>
              <article class="tile tile-long">
                <div class="tile-image" style="background-image: url(../../assets/images/demo/learning/learning-6.jpg)"></div>
                <div>
                  <div class="tile-header on-hover text-right">
                    <button class="btn btn-sm btn-outline-white">Watch Now</button>
                  </div>
                  <div class="tile-footer">
                    <span class="eyebrow">Design</span>
                    <h3>Unleash Your Hand Drawing Skills</h3>
                  </div>
                </div>
              </article>
              <article class="tile tile-long">
                <div class="tile-image" style="background-image: url(../../assets/images/demo/learning/learning-7.jpg)"></div>
                <div>
                  <div class="tile-header on-hover text-right">
                    <button class="btn btn-sm btn-outline-white">Watch Now</button>
                  </div>
                  <div class="tile-footer">
                    <span class="eyebrow">Dance</span>
                    <h3>Modern Dancing</h3>
                  </div>
                </div>
              </article>
              <article class="tile tile-long">
                <div class="tile-image" style="background-image: url(../../assets/images/demo/learning/learning-8.jpg)"></div>
                <div>
                  <div class="tile-header on-hover text-right">
                    <button class="btn btn-sm btn-outline-white">Watch Now</button>
                  </div>
                  <div class="tile-footer">
                    <span class="eyebrow">5 Day City Tour</span>
                    <h3>New York</h3>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- / lessons -->

<!-- presentation -->
<section>
  <div class="container-fluid">
    <div class="row align-items-center justify-content-center justify-content-lg-between">
      <div class="col-lg-7">
        <div class="owl-carousel owl-carousel-single pr-0" data-dots="true" data-autoheight="true">
          <img src="/go/app/assets/images/demo/event/event-3.jpg" alt="Image">
          <img src="/go/app/assets/images/demo/event/event-4.jpg" alt="Image">
        </div>
      </div>
      <div class="col-md-8 col-lg-5 pl-lg-4">
        <span class="eyebrow text-primary mb-2">Special for you</span>
        <h2>We're in business <br>since 2015</h2>
        <hr class="w-25 ml-0">
        <div class="row gutter-3">
          <div class="col-12 col-lg-6" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
            <div class="media">
              <i class="icon-check-circle2 fs-24 mr-2 text-primary"></i>
              <div class="media-body">
                <h4 class="eyebrow font-weight-bold">Verified Speakers</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
            <div class="media">
              <i class="icon-camera2 fs-24 mr-2 text-primary"></i>
              <div class="media-body">
                <h4 class="eyebrow font-weight-bold">Photo Gallery</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6" data-aos="fade-up" data-aos-anchor-placement="bottom-bottom">
            <div class="media">
              <i class="icon-camera2 fs-24 mr-2 text-primary"></i>
              <div class="media-body">
                <h4 class="eyebrow font-weight-bold">Photo Gallery</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / presentation -->

<!-- faq -->
<section class="bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-6 text-md-center">
        <h2>Still have some <i class="font-weight-bold">questions</i>?</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint maiores, consequuntur tempore, odio voluptatem</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="accordion-group accordion-group-minimal" data-accordion-group>
          <div class="accordion" data-accordion data-aos="fade-up">
            <div class="accordion-control" data-control>
              <h5>What type of ticket should I choose ?</h5>
            </div>
            <div class="accordion-content" data-content>
              <div class="accordion-content-wrapper">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quam odit voluptatum, rem libero modi labore porro commodi inventore architecto explicabo reiciendis, perspiciatis voluptatibus odio, sequi nobis? Optio, aperiam, tenetur!</p>
              </div>
            </div>
          </div>
          <div class="accordion" data-accordion data-aos="fade-up">
            <div class="accordion-control" data-control>
              <h5>Is there a Money Back option ?</h5>
            </div>
            <div class="accordion-content" data-content>
              <div class="accordion-content-wrapper">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quam odit voluptatum, rem libero modi labore porro commodi inventore architecto explicabo reiciendis, perspiciatis voluptatibus odio, sequi nobis? Optio, aperiam, tenetur!</p>
              </div>
            </div>
          </div>
          <div class="accordion" data-accordion data-aos="fade-up">
            <div class="accordion-control" data-control>
              <h5>Is there a Money Back option ?</h5>
            </div>
            <div class="accordion-content" data-content>
              <div class="accordion-content-wrapper">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quam odit voluptatum, rem libero modi labore porro commodi inventore architecto explicabo reiciendis, perspiciatis voluptatibus odio, sequi nobis? Optio, aperiam, tenetur!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="accordion-group accordion-group-minimal" data-accordion-group>
          <div class="accordion" data-accordion data-aos="fade-up">
            <div class="accordion-control" data-control>
              <h5>Can I buy a ticket right at the venue ?</h5>
            </div>
            <div class="accordion-content" data-content>
              <div class="accordion-content-wrapper">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quam odit voluptatum, rem libero modi labore porro commodi inventore architecto explicabo reiciendis, perspiciatis voluptatibus odio, sequi nobis? Optio, aperiam, tenetur!</p>
              </div>
            </div>
          </div>
          <div class="accordion" data-accordion data-aos="fade-up">
            <div class="accordion-control" data-control>
              <h5>What hotel should I choose ?</h5>
            </div>
            <div class="accordion-content" data-content>
              <div class="accordion-content-wrapper">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quam odit voluptatum, rem libero modi labore porro commodi inventore architecto explicabo reiciendis, perspiciatis voluptatibus odio, sequi nobis? Optio, aperiam, tenetur!</p>
              </div>
            </div>
          </div>
          <div class="accordion" data-accordion data-aos="fade-up">
            <div class="accordion-control" data-control>
              <h5>What hotel should I choose ?</h5>
            </div>
            <div class="accordion-content" data-content>
              <div class="accordion-content-wrapper">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quam odit voluptatum, rem libero modi labore porro commodi inventore architecto explicabo reiciendis, perspiciatis voluptatibus odio, sequi nobis? Optio, aperiam, tenetur!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / faq -->

<!-- blog -->
<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8 text-center">
        <h2>From the <b>blog.</b></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-lg-4">
        <div class="card card-minimal">
          <a href="" class="card-img-container">
            <img class="card-img" src="/go/app/assets/images/demo/image-2.jpg" alt="Card image cap">
          </a>
          <div class="card-body">
            <h5 class="card-title"><a href="">Planning amazing weddings that you won’t forget.</a></h5>
            <span class="card-meta">Posted in Travel by <a href="">Mike Ross</a></span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="card card-minimal">
          <a href="" class="card-img-container">
            <img class="card-img" src="/go/app/assets/images/demo/image-square-1.jpg" alt="Card image cap">
          </a>
          <div class="card-body">
            <h5 class="card-title"><a href="">Planning amazing weddings that you won’t forget.</a></h5>
            <span class="card-meta">Posted in Travel by <a href="">Mike Ross</a></span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="card card-minimal">
          <a href="" class="card-img-container">
            <img class="card-img" src="/go/app/assets/images/demo/image-5.jpg" alt="Card image cap">
          </a>
          <div class="card-body">
            <h5 class="card-title"><a href="">Planning amazing weddings that you won’t forget.</a></h5>
            <span class="card-meta">Posted in Travel by <a href="">Mike Ross</a></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / blog -->


@endsection
