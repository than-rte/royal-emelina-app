<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() {
        return view('pages.menu.index');
    }

    public function showMenu() {
        return view('pages.menu.showmenu');
    }

    
    public function showMenuSet() {
        return view('pages.menu.showmenuset');
    }
    
}
