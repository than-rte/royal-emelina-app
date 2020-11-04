@extends("layouts.web.app", [
    'title' => 'Royal Emelina'
])

@section("content")
    <h1 class="btn">
        This is index page
        <div class="btn-primary"></div>
    </h1>
    <a href="/venues">Venues</a> <br>
    <a href="/venues/{{123}}">Venue Show</a> <br>
    <a href="/events">Events</a> <br>
    <a href="/events/{{123}}">Event Show</a> <br>
    <a href="/events">Events</a> <br>
    <a href="/events/{{123}}">Event Show</a> <br>
    <a href="/enquiries/search">Show available venues</a> <br>
    <a href="/foodsets">Food Sets</a> <br>
    <a href="/foodsets/{{"for-kids"}}">Food Set Show</a> <br>
    <a href="/foodsets/{{"for-kids"}}/{{1234}}">Food Subset Show</a> <br>
    <a href="/about">About</a> <br>
    <a href="/contacts">Contacts</a> <br>

    <img src="{{ asset('images/default.png') }}" alt="" srcset="">
    <!-- Header Panel -->
    <!-- Carousel -->
    <!-- Page Introduction Text -->
    <!-- Customer Reservation Form -->
    <!-- Events Panel -->
    <!-- Venue Panel -->
    <!-- Footer Panel -->
@endsection