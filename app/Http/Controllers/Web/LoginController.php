<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
       
    }

    public function index() 
    {
        if(Auth::check()) return redirect()->route('admin');
        else return view('admin.login.index');
    }

    public function store(Request $req) 
    {
        $data = $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $token = Str::random(60);

        if(Auth::attempt($data)) 
        {
            $req->user()->forceFill([
                'api_token' => hash('sha256', $token)
            ])->save();
            
            return redirect()->route('admin');
        } 
        else
        {
            return redirect()->route('login');
        } 
    }
}