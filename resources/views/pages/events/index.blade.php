@extends('layouts.web.events', [
    'title' => 'Royal Emelina | Events'
])

@section("styles")
    <style>
        nav {
            position: fixed;
            background: rgba(0,0,0,0.2);
            padding: 0px 20px;
        }
        section {
            background-image: url(slider7.png);
            background-size: cover;
            width: 100%;
            height: 700px;
        }
    </style>
@endsection

@section('content')
    <!-- Navbar -->
    <nav>
        <div class="nav-wrapper">
            <a href="/pages" class="brand-logo">Royale Emelina</a>
        </div>
    </nav>
    <section>
    
    </section>
@endsection