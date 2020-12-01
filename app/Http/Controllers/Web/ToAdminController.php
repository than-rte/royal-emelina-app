<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Model\AdminLoginToken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ToAdminController extends Controller
{
    public function login($secret) {
        $tokens = AdminLoginToken::all();

        foreach ($tokens as $token) {
            if(Hash::check($secret, $token->token)) {

                session(['token' => $token->token]);

                return redirect('login');
            }
        }
        return redirect('/');
    }
}
