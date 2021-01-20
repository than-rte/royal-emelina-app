{{-- // Changing Page Title --}}
@extends("layouts.web.app", [
    'title' => 'Royal Emelina | Admin Login'
])


{{-- // Html body --}}
@section("content")
    
    <!-- Navbar -->
    <nav class="nav-wrapper px-2 grey darken-4" id="home">
        <a href="/" class="brand-logo">Royale Emelina</a>
        <!-- <a href="#" class="contacts right hide-on-med-and-down">Call Us (054)811.8303</a> -->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="blur"><a href="/venues">Venues</a></li>
            <li><a href="/events">Events</a></li>
            <li><a href="/foodsets">Food Packages</a></li>
            <li><a href="/enquiries" class="waves-effect waves-light btn black-text orange accent-1">Reservation Form</a></li>
        </ul>
    </nav> 
   
    <main class="panel">
      <div class="card  orange lighten-5 w-256">
        <div class="card-content black-text">
            <span class="card-title text-bold">Admin Login</span>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class='row'>
                    <div class='input-field col s12'>
                        <input type='text' name='username'/>
                        <label for='username'>Enter your username</label>
                    </div>
                </div>
                <div class='row'>
                    <div class='input-field col s12'>
                        <input  type='password' name='password'/>
                        <label for='password'>Enter your password</label>
                    </div>
                    <label style='float: right;'>
                        <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
                    </label>
                </div>
                <div class='row'>
                    <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
                </div>
            </form>
      </div>
    </main>

    <!-- Footer -->
    <footer class="section orange accent-2 white-text center">
      <p class="flow-text">Royale Emelina &copy; 2020</p>
    </footer>
@endsection

