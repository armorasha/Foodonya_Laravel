@extends('layouts.layout')


@section('content')


<!-- Main image with Buttons -->
<div class="container-fluid no-padding front-pizza">

    @if(Session::has('message'))
    <p class="my-0 alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif

    <div id="myCarousel" class="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="/img/front_pizza_crop.jpg" alt="Our delicious pizza photo">
                <div class="carousel-caption">
                    <h1 class="display-2">Order Now</h1>
                    <h2>We deliver hot pizzas under 30 mins. That's quick.</h2>
                    <button type="button" class="btn btn-primary btn-lg" id="orderOnline"
                        onclick="location.href='/menu'">ORDER ONLINE</button>
                    <button type="button" class="btn btn-success btn-lg disabled">Call us&emsp;<i
                            class="fa fa-phone fa-1x" aria-hidden="true"></i></button>
                    <h4>*Try placing an order. This is a demo web app. Check out the T&C.</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tech Showcase -->
<div class="container-fluid tech-showcase">
    <h2 class="display-4 text-center">Tech Stack</h2>
    <div class="row text-center">
        <div class="no-padding col-md col-sm-2 col-3">
            <i class="fas fa-cloud fa-3x"></i>
            <h3>Azure</h3>
        </div>
        <div class="no-padding col-md col-sm-2 col-3">
            <i class="fab fa-php fa-3x"></i>
            <h3>PHP</h3>
        </div>
        <div class="no-padding col-md col-sm-2 col-3">
            <i class="fas fa-database fa-3x"></i>
            <h3>MySQL</h3>
        </div>
        <div class="no-padding col-md col-sm-2 col-3">
            <i class="fas fa-vector-square fa-3x"></i>
            <h3>APIs</h3>
        </div>
        <div class="no-padding col-md col-sm-2 col-3">
            <i class="fab fa-js-square fa-3x"></i>
            <h3>JS</h3>
        </div>
        <div class="no-padding col-md col-sm-2 col-3">
            <i class="fas fa-code fa-3x"></i>
            <h3>AJAX</h3>
        </div>
        <div class="no-padding col-md col-sm-2 col-3">
            <i class="fas fa-bold fa-3x"></i>
            <h3>Bootstrap</h3>
        </div>
        <div class="no-padding col-md col-sm-2 col-3">
            <i class="fab fa-github fa-3x"></i>
            <h3>Git</h3>
        </div>
        <div class="no-padding col-md col-sm-2 col-3">
            <i class="fab fa-python fa-3x"></i>
            <h3>Python</h3>
        </div>
        <div class="no-padding col-md col-sm-2 col-3">
            <i class="fas fa-tasks fa-3x"></i>
            <h3>PHPUnit</h3>
        </div>
        <div class="no-padding col-md col-sm-2 col-3">
            <i class="fas fa-cube fa-3x"></i>
            <h3>Selenium</h3>
        </div>
    </div>
</div>


<!-- Address and Maps grid -->
<div class="container-fluid front-info">
    <div class="row text-center">
        <div class="col-sm-6">
            <hr class="light-50">
            <h4>Address</h4>
            <hr class="light-50">
            <p>100 Main Beach Rd<br>Monet SA 5800</p>
            <p><b>T:</b> 08-8888 8888
                <br><b>E:</b> pizza@foodonya.com</p>
            <br>

            <hr class="light-50">
            <h4>Opening Hours</h4>
            <hr class="light-50">
            <p>Mon &emsp; 4pm - 10pm<br>Tue &emsp; 4pm - 10pm<br>Wed &emsp; 4pm - 10pm<br>Thu &emsp; 4pm - 11pm<br>
                Fri &emsp; 4pm - 11pm<br>Sat &emsp; 4pm - 11pm<br>Sun &emsp; 4pm - 11pm<br></p><br>
        </div>


        <div class="col-sm-6">
            <hr class="light-50">
            <h4>Locate Us</h4>

            <!--Google Maps API starts here----------------------------------------------------->
            <!--  Styling Wizard: Google Maps APIs    
                    https://mapstyle.withgoogle.com/ -->

            <!--Google Maps API - LEAVE <STYLE><SCRIPT><SCRIPT> ALL IN HERE, 
                    DONT PUT THEM IN SEPARATE FILES. Google Maps API  USES "ASYNC" LOADING.-->

            <!--Always set the map height explicitly to define the size of the div
                    element that contains the map.-->
           
           <!-- Maps code start here-->
           <!--
           <style>
                #map {
                    height: 370px;
                    /* The height is 370 pixels */
                    width: 100%;
                }
            </style>


            <div id="map"></div>

            <script>
                var map; // Google map object (global variable)
                function initMap() {
                    var location = {
                        lat: -35.196564,
                        lng: 138.474381
                    };

                    // Styles a map in night mode.
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: location,
                        zoom: 13,
                        styles: [{
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#f5f5f5"
                                }]
                            },
                            {
                                "elementType": "labels.icon",
                                "stylers": [{
                                    "visibility": "off"
                                }]
                            },
                            {
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#616161"
                                }]
                            },
                            {
                                "elementType": "labels.text.stroke",
                                "stylers": [{
                                    "color": "#f5f5f5"
                                }]
                            },
                            {
                                "featureType": "administrative.land_parcel",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#bdbdbd"
                                }]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#eeeeee"
                                }]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#757575"
                                }]
                            },
                            {
                                "featureType": "poi.park",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#e5e5e5"
                                }]
                            },
                            {
                                "featureType": "poi.park",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#9e9e9e"
                                }]
                            },
                            {
                                "featureType": "road",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#ffffff"
                                }]
                            },
                            {
                                "featureType": "road.arterial",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#757575"
                                }]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#dadada"
                                }]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#616161"
                                }]
                            },
                            {
                                "featureType": "road.local",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#9e9e9e"
                                }]
                            },
                            {
                                "featureType": "transit.line",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#e5e5e5"
                                }]
                            },
                            {
                                "featureType": "transit.station",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#eeeeee"
                                }]
                            },
                            {
                                "featureType": "water",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#c9c9c9"
                                }]
                            },
                            {
                                "featureType": "water",
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "color": "#9e9e9e"
                                }]
                            }
                        ]
                    });

                    var marker = new google.maps.Marker({
                        position: location,
                        map: map
                    });
                }
            </script>

            <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKTvR3q2rKMSU8c6DgH_xhL4KTdTW7Wfw&callback=initMap"
                async defer></script>
            -->
            <!-- Maps code ends here -->
            <!--Google Maps API ends here----------------------------------------------------->

            <!--      <i><p><u>DEV NOTES</u></p>
        
            <p>Refer here</p>-->
            <!--<p>1. After payment processing integration, 
        save order info in db.</p>
        <p>3. Google Analytics or it's alternative.</p>
        <p>6. Use phpcreditcard.php from session 09 to validate credit cards.</p>
        <p>8. AJAX to fill most pop-in info.</p>
        <p>16.Info to save in client side as cookies and use it.</p>

        </i> -->
            <br>
        </div>
    </div>
</div>



@endsection
