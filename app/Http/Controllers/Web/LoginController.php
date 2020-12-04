<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() 
    {
        return view('admin.login.index');
    }

    public function store(request $req) 
    {
        $data = [
            'username' => $req->username,
            'password' => $req->password
        ];

        $token = Str::random(60);

        Auth::attempt($data);
       
        $req->user()->forceFill([
            'api_token' => hash('sha256', $token)
        ])->save();
        
        return redirect()->route('dashboard');
    }
}