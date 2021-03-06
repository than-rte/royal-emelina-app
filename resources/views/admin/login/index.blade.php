@extends("layouts.web.app", [
    'title' => 'Royal Emelina'
])

@section("content")
    <div class="section"></div>
    <main>
        <center>
            <h5 class="indigo-text">Please, login into your account</h5>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <div class="section"></div>

            <div class="container">
                <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                    <form class="col s12" action="{{ route('login') }}" method="post">
                         @csrf
                        <div class='row'>
                            <div class='col s12'>
                            </div>
                        </div>
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
                        <br/>
                        <center>
                            <div class='row'>
                                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </center>
        <div class="section"></div>
        <div class="section"></div>
    </main>
@endsection

{{-- @section('head_scripts')
<script>
let tok =document.querySelector('meta[name="csrf-token"]').getAttribute('content');
console.log(tok)
let key = prompt("password");

fetch('http://royalelemina.test/before-login', {
    method: "POST",
    headers: {
        'Accept' : 'application/json',
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': tok
    },
    body: JSON.stringify({key})
})
  .then(response => response.json())
  .then(json => console.log(json))
  .catch(err => console.log('aksdjhaskjdh'))
</script>
@endsection --}}