{{-- // Changing Page Title --}}
@extends("layouts.web.app", [
    'title' => 'Royal Emelina'
])

{{-- // Styles --}}
@section("styles")
    <style>
        .carousel {
        height: 700px !important;
    }
    </style>
@endsection

{{-- // Html body --}}
@section("content")
    <!-- Carousel -->
    <div class="carousel carousel-slider" data-indicators="true">
        <a class="carousel-item" href="#one!"><img src="./images/slider1.jpg"></a>
        <a class="carousel-item" href="#two!"><img src="./images/slider2.jpg"></a>
        <a class="carousel-item" href="#three!"><img src="./images/slider3.jpg"></a>
        <a class="carousel-item" href="#four!"><img src="./images/slider4.png"></a>
    </div>
@endsection

{{-- // Scripts --}}
@section("scripts")
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.carousel').carousel();

            // function for auto play carousel-slider

            setInterval(function(){
                $('.carousel').carousel('next');
            
            }, 2000);
        });
    </script>
@endsection