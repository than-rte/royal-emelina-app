<?php

namespace App\Http\Controllers\Web;

use App\Model\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $req)
    {
        User::create([
            'username' => $req->username,
            'password' => Hash::make($req->password),
            'api_token' => Str::random(32),
        ]);
    }
}
