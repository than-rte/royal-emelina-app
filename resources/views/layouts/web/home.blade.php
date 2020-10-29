@extends("app")

@section("layout")
    <div class="flex-col">
        <div class="row">
            @include("partials.navbar")
        </div>
        <div class="row">
            <main>
                @yield("content")
            </main>
        </div>
    </div>
@endsection