<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnquiriesController extends Controller
{
    public function searchAvailableVenues()
    {
        return view('pages.enquiries.search');
    }
}
