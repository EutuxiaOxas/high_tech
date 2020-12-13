@extends('layouts.app')
@php 
    $headerLinks="dark";
    $logoNav1="light";
    $logoNav2="dark";
@endphp

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
                <h1 class="mb-0">Valencia, Venezuela.</h1>
                <br><br>
                <!--p-- class="text-white" style="font-size:1.25rem;"> <strong>Av. Este Oeste 4 Galpón 138 Urbanización Zona Industrial Municipal Norte</strong> </!--p-->
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
              <span class="eyebrow mb-1 text-primary">Ponte en contacto con nosotros</span>
              <h2>Estamos atentos a responderte cualquier duda que tengas.</h2>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <form>
                <div class="form-row mb-1">
                  <div class="col">
                    <input type="text" class="form-control form-control-minimal" placeholder="Nombre*" required>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control form-control-minimal" placeholder="Correo*" required>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control form-control-minimal" placeholder="Teléfono de Contacto*" required>
                  </div>
                </div>
                <div class="form-row mb-1">
                  <div class="col">
                    <textarea class="form-control form-control-minimal" id="exampleFormControlTextarea1" rows="3" placeholder="Tu Mensaje*" required></textarea>
                  </div>
                </div>
                <div class="form-row mt-3">
                  <div class="col">
                    <button class="btn btn-primary px-5">Enviar</button>
                  </div>
                </div>
                <div>
                  <small class="text-muted mt-4">* Obligatorio</small>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>



      <!-- Mapa -->
      <script>
        function initMap() {
         // Styles a map in night mode.
         var map = new google.maps.Map(document.getElementById('map'), {
           center: {lat: 10.1760277, lng: -67.9518831},
           zoom: 15,
           disableDefaultUI: true,
           styles: [
             {
               "elementType": "geometry",
               "stylers": [
                 {
                   "color": "#212121"
                 }
               ]
             },
             {
               "elementType": "labels.icon",
               "stylers": [
                 {
                   "visibility": "off"
                 }
               ]
             },
             {
               "elementType": "labels.text.fill",
               "stylers": [
                 {
                   "color": "#757575"
                 }
               ]
             },
             {
               "elementType": "labels.text.stroke",
               "stylers": [
                 {
                   "color": "#212121"
                 }
               ]
             },
             {
               "featureType": "administrative",
               "elementType": "geometry",
               "stylers": [
                 {
                   "color": "#757575"
                 }
               ]
             },
             {
               "featureType": "administrative.country",
               "elementType": "labels.text.fill",
               "stylers": [
                 {
                   "color": "#9e9e9e"
                 }
               ]
             },
             {
               "featureType": "administrative.land_parcel",
               "stylers": [
                 {
                   "visibility": "off"
                 }
               ]
             },
             {
               "featureType": "administrative.locality",
               "elementType": "labels.text.fill",
               "stylers": [
                 {
                   "color": "#bdbdbd"
                 }
               ]
             },
             {
               "featureType": "poi",
               "elementType": "labels.text.fill",
               "stylers": [
                 {
                   "color": "#757575"
                 }
               ]
             },
             {
               "featureType": "poi.park",
               "elementType": "geometry",
               "stylers": [
                 {
                   "color": "#181818"
                 }
               ]
             },
             {
               "featureType": "poi.park",
               "elementType": "labels.text.fill",
               "stylers": [
                 {
                   "color": "#616161"
                 }
               ]
             },
             {
               "featureType": "poi.park",
               "elementType": "labels.text.stroke",
               "stylers": [
                 {
                   "color": "#1b1b1b"
                 }
               ]
             },
             {
               "featureType": "road",
               "elementType": "geometry.fill",
               "stylers": [
                 {
                   "color": "#2c2c2c"
                 }
               ]
             },
             {
               "featureType": "road",
               "elementType": "labels.text.fill",
               "stylers": [
                 {
                   "color": "#8a8a8a"
                 }
               ]
             },
             {
               "featureType": "road.arterial",
               "elementType": "geometry",
               "stylers": [
                 {
                   "color": "#373737"
                 }
               ]
             },
             {
               "featureType": "road.highway",
               "elementType": "geometry",
               "stylers": [
                 {
                   "color": "#3c3c3c"
                 }
               ]
             },
             {
               "featureType": "road.highway.controlled_access",
               "elementType": "geometry",
               "stylers": [
                 {
                   "color": "#4e4e4e"
                 }
               ]
             },
             {
               "featureType": "road.local",
               "elementType": "labels.text.fill",
               "stylers": [
                 {
                   "color": "#616161"
                 },
                 {
                   "visibility": "off"
                 }
               ]
             },
             {
               "featureType": "transit",
               "elementType": "labels.text.fill",
               "stylers": [
                 {
                   "color": "#757575"
                 }
               ]
             },
             {
               "featureType": "water",
               "elementType": "geometry",
               "stylers": [
                 {
                   "color": "#000000"
                 }
               ]
             },
             {
               "featureType": "water",
               "elementType": "labels.text.fill",
               "stylers": [
                 {
                   "color": "#3d3d3d"
                 }
               ]
             }
           ]
         });
 
         var pin ='/go/app/assets/images/pin.svg';
 
         var marker = {
             url: pin,
             //state your size parameters in terms of pixels
             size: new google.maps.Size(70, 60),
             scaledSize: new google.maps.Size(70, 60),
             origin: new google.maps.Point(0,0)
         }
 
         var marker = new google.maps.Marker({
           position: map.getCenter(),
           icon: pin,
           map: map
         });
       }
     </script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAME5wJgLdn1aQSxC7-iWxJ3isuveK9Rv4&callback=initMap"
     async defer></script>

@endsection