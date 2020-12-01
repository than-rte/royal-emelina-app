<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function logout(Request $req)
    {    
        $req->user()->forceFill([
            'api_token' => ' '
        ])->save();

        Auth::logout();

        return redirect('/');
    }
}
