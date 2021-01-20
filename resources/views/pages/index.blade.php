{{-- // Changing Page Title --}}
@extends("layouts.web.app", [
    'title' => 'Royal Emelina'
])

{{-- // Styles --}}
@section("styles")
    <style>
        .slider {
            height: 700px !important;
            top: 0;
            position: absolute;
        }
        nav {
            position: absolute;
            background: rgba(0, 0, 0, 0.2);
            padding: 0px 30px;
            top: 0;
            width: 100%;
            z-index: 999;
        }
        #slider-img {
            filter: brightness(50%);
            border-style: none;
        }
        .introduction {
            margin-top: 500px;
            padding: 20px;
            text-align: center;
        }
        .card-title {
            font-family: helvetica;
            font-weight: 900;
            font-size: 2.5 rem;
            color: #fbfbfb;
            text-transform: uppercase;
            text-align: center;            
        }
        .row {
            padding-top: 10px;
            padding-left: 200px;
            padding-right: 200px;
        }
        .btn-form {
            margin-left: 50px;
        }
        h6 {
            font-weight: 600;
            text-align: center;
        }
        .caption {
            font-family: helvetica;
            font-weight: 700;
            font-size: 40px;
            letter-spacing: 0.1em;
        }
        .carousel {
            background: #f5f5f5;
            height: 450px;
        }
        .carousel .carousel-item {
            width: 25% !important;
        }
        .carousel-item h5 {
            text-align: center;
            color: #ef6c00 !important;
            font-weight: 600;
        }
        .carousel .indicators {
            background: #bdbdbd;
        }
        .carousel .indicators .indicator-item {
            margin: 10px 8px;
            background-color: #e65100;
        }
        .container {
            width: 100%;
            background: #f5f5f5;
        }
        .card .card-action a:not(.btn):not(.btn-small):not(.btn-large):not(.btn-large):not(.btn-floating) {
            color: #000000;
            text-transform: lowercase;
            font-weight: 500;
        }
        .card-image {
            background-color: #000000;
        }
        .card-image span {
            color: #ffd180 !important;
            
            font-weight: 600 !important;
            font-size: 30px !important;
        }
        #events-img {
            opacity: 0.5;
            transition: opacity .3s ease;
        }
        #events-img:hover {
            opacity: 1;
        }
        .wrapper-venues {
            background-color: #ffffff;
        }
        .row-venues {
            height: 85vh !important;
            padding-left: 100px;
            padding-right: 100px;
        }
        #menu {
            background-color: black;
        }
        #menu-img {
            opacity: 0.5;
            transition: opacity .3s ease;
        }
        #menu-img:hover {
            opacity: 1;
        }
    </style>
@endsection

{{-- // Html body --}}
@section("content")
    
    <!-- Navbar -->
    <nav>
      <div class="nav-wrapper" id="home">
        <a href="/" class="brand-logo">Royale Emelina</a>
        <!-- <a href="#" class="contacts right hide-on-med-and-down">Call Us (054)811.8303</a> -->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li class="blur"><a href="/venues">Venues</a></li>
          <li><a href="/events">Events</a></li>
          <li><a href="/foodsets">Food Packages</a></li>
          <li><a href="/enquiries" class="waves-effect waves-light btn black-text orange accent-1">Reservation Form</a></li>
        </ul>
      </div>
    </nav> 
    
    <!-- Slider -->
    <section class="slider">
    <ul class="slides">
      <li>
        <img id="slider-img" src="./images/slider1.jpg"> 
        <div class="caption center-align">
          <h3></h3>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only"></h5>
        </div>
      </li>
      <li>
        <img id="slider-img" src="./images/slider2.jpg"> 
        <div class="caption left-align">
          <h3></h3>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only"></h5>
        </div>
      </li>
      <li>
        <img id="slider-img" src="./images/slider3.jpg"> 
        <div class="caption right-align">
          <h3></h3>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only"></h5>
        </div>
      </li>
      <li>
        <img id="slider-img" src="./images/slider4.png">
        <div class="caption center-align">
          <h3></h3>
          <h5 class="light grey-text text-lighten-3 hide-on-small-only"></h5>
        </div>
      </li>
    </ul>
    </section>

    <!-- Page Introduction Text -->
    <div class="wrapper grey darken-4">
      <div class="introduction white-text orange accent-2">
        <h6>If there's one venue with a flair for classic elegance and taste, it can only be Royale Emelina.
      </div>
    </div> 

    <!-- Events Panel --> 
    <div class="container scrollspy" id="events">
      <div class="row">
        <h4 class="caption center">
          <span class="black-text">Different Events</h4>
        <div class="col s6">
          <div class="card z-depth-5">
            <div class="card-image">
              <a href="/events"><img id="events-img" src="/images/wedding.jpg"></a>
              <span class="card-title">wedding</span>
            </div>
            <div class="card-action">
              <a href="/events">more info</a>
            </div>
          </div>
        </div>
        <div class="col s6">
          <div class="card z-depth-5">
            <div class="card-image">
              <img id="events-img" src="/images/seminars.jpg">
              <span class="card-title">seminars</span>
            </div>
            <div class="card-action">
              <a href="/events">more info</a>
            </div>
          </div>
        </div>
        <div class="col s6">
          <div class="card z-depth-5">
            <div class="card-image">
              <img id="events-img" src="/images/debut.jpg">
              <span class="card-title">debut</span>
            </div>
            <div class="card-action">
              <a href="/events">more info</a>
            </div>
          </div>
        </div>
        <div class="col s6">
          <div class="card z-depth-5">
            <div class="card-image">
              <img id="events-img" src="/images/inauguration.jpg">
              <span class="card-title">inauguration</span>
            </div>
            <div class="card-action">
              <a href="/events">more info</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page Introduction Text 
    <section class="section section-about orange accent-1 white-text center">
    <div class="container orange accent-1 white-text center">
      <div class="row">
        <div class="col s4">
          <h4>Company Profile</h4>
          <p>Royale Emelina, formerly Starmark Royale, is a favorite venue for gatherings and 
          celebrations in a dynamic city that is also known as the heart of Bicol. </p>
        </div>
        <div class="col s4">
          <h4>Stragetically Located</h4>
          <p>Royale Emelina is located at the J. Miranda Avenue, right in the Magsaysay area — 
          well-known to many as Naga’s entertainment and dining strip, often compared to the Malate 
          district in Metro Manila.</p>
        </div>
        <div class="col s4">
          <h4>A Sterling Record</h4>
          <p>Established in 2004, Royale Emelinacontinues to excel in ensuring worry-free events, 
          providing hosting services to numerous activities of different types and sizes.</p>
        </div>
      </div>
    </div>
    </section> -->
    
    <!-- Venues Panel -->
    <div class="wrapper-venues scrollspy" id="venues">
      <div class="row-venues">
        <h4 class="caption center">
        <span class="black-text">The Venues</h4>
        <div class="carousel z-depth-1">  
          <div class="carousel-item z-depth-5"><a href="/venues"><img src="/images/venues/venue1.jpg"></a>
            <h5 class="black-text">Emelina I</h5>
          </div>
          <div class="carousel-item z-depth-5"><a href="/venues"><img src="/images/venues/venue2.jpg"></a>
            <h5 class="black-text">Emelina II</h5>
          </div>
          <div class="carousel-item z-depth-5"><a href="/venues"><img src="/images/venues/venue3.jpg"></a>
            <h5 class="black-text">Tent Reception</h5>
          </div>
          <div class="carousel-item z-depth-5"><a href="/venues"><img src="/images/venues/venue4.png"></a>
            <h5 class="black-text">Garden Venue</h5>
          </div>
          <div class="carousel-item z-depth-5"><a href="/venues"><img src="/images/venues/venue5.jpg"></a>
            <h5 class="black-text">Thomas Hall</h5>
          </div>    
        </div>
      </div>  
    </div> 

    <!-- Food Packages -->
    <div class="container grey darken-4 scrollspy" id="menu">
      <div class="row">
        <h4 class="caption center">
          <span class="white-text">Menu</h4>
        <div class="col s6">
          <div class="card z-depth-5">
            <div class="card-image">
              <img id="menu-img" src="/images/wedding.jpg">
              <span class="card-title">cocktail</span>
            </div>
            <div class="card-action">
              <a href="#">more details</a>
            </div>
          </div>
        </div>
        <div class="col s6">
          <div class="card z-depth-5">
            <div class="card-image">
              <img id="menu-img" src="/images/seminars.jpg">
              <span class="card-title">amenities</span>
            </div>
            <div class="card-action">
              <a href="#">more details</a>
            </div>
          </div>
        </div>
        <div class="col s6">
          <div class="card z-depth-5">
            <div class="card-image">
              <img id="menu-img" src="/images/debut.jpg">
              <span class="card-title">kids party package</span>
            </div>
            <div class="card-action">
              <a href="#">more details</a>
            </div>
          </div>
        </div>
        <div class="col s6">
          <div class="card z-depth-5">
            <div class="card-image">
              <img id="menu-img" src="/images/inauguration.jpg">
              <span class="card-title">menu set package</span>
            </div>
            <div class="card-action">
              <a href="#">more details</a>
            </div>
          </div>
        </div>
      </div>
    </div> 
    
    <!-- Footer -->
    <footer class="section orange accent-2 white-text center">
      <p class="flow-text">Royale Emelina &copy; 2020</p>
    </footer>
@endsection

{{-- //  Scripts --}}
@section("scripts")
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <script>

        // Slider
        $(document).ready(function(){
            $('.slider').slider({
                indicators: false,
                height: 500,
                transition: 500,
                interval: 6000
            });
        });

        // Carousel (Venues)
        $(document).ready(function(){
            $('.carousel').carousel({
                duration: 200,
                dist: 0,
                shift: 50,
                padding: 1,
                numVisible: 3,
                fullWidth: false,
                indicators: true,
                noWrap: false
            });
          });

          // Form (Select Venue)
          $(document).ready(function(){
            $('select').formSelect({
              classes: '',
              dropdownOptions: {}
            });
          });

          // Form (Date Start/End)
          $(document).ready(function(){
            $('.datepicker').datepicker({
              autoClose: true,
              format: 'mmm dd, yyyy'
            });
          });

          // Scrollspy
          $(document).ready(function(){
    $('.scrollspy').scrollSpy();
  });
      

    </script>

@endsection
