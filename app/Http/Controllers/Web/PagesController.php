<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        session()->pull('token');
        return view('pages.index');
    }

    public function about()
    {
        return view('pages.about.index');
    }

    public function contacts()
    {
        return view('pages.contacts.index');
    }

    public function loginRedirect()
    {
        if (Auth::check()) return redirect()->route('admin');
        else return redirect()->route('admin/login');
    }

    public function loginAdmin()
    {
        return view('pages.admin.index');
    }
}
