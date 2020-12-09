@extends('layouts.app')

@section('title')
 High Tech Bearings - Contacto
@endsection

@section('content')
    <!-- map -->
    <section class="hero hero-with-header text-white">
        <div class="map">
          <div class="container">
            <div class="row vh-50 align-items-end">
              <div class="col-md-10">
                <h1 class="mb-0">New York</h1>
                <p>USA, New York, 5th Avenue</p>
              </div>
            </div>
          </div>
          <div id="map" class="map-area"></div> 
        </div>
      </section>
      <!-- / map -->
  
  
      <section class="bg-light">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <span class="eyebrow mb-1 text-primary">Get in touch with us</span>
              <h2>We’ll get back to you as soon as possible.</h2>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <form>
                <div class="form-row mb-1">
                  <div class="col">
                    <input type="text" class="form-control form-control-minimal" placeholder="Name">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control form-control-minimal" placeholder="Mail">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control form-control-minimal" placeholder="Phone">
                  </div>
                </div>
                <div class="form-row mb-1">
                  <div class="col">
                    <textarea class="form-control form-control-minimal" id="exampleFormControlTextarea1" rows="3" placeholder="Your Message"></textarea>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="col">
                    <button class="btn btn-primary px-5">Send Mail</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

@endsection