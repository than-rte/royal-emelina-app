<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoodsetsController extends Controller
{
    public function index()
    {
        return view('pages.foodsets.index');
    }

    public function show()
    {
        return view('pages.foodsets.show');
    }


    public function showSubset()
    {
        return view('pages.foodsets.show_subset');
    }
}
