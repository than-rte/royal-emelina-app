<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VenuesController extends Controller
{
    public function index() {
        return view('pages.venues.index');
    }

    public function show(Request $req) {
        return view('pages.venues.show');
    }
}
