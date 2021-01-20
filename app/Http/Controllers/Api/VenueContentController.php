<?php

namespace App\Http\Controllers\Api;

use App\Model\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenueContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //Auth only store, edit, delete
    }

    public function storeUpdate(Request $req)
    {
        $venue = Venue::findOrFail($req->id);

        $req->validate([
            'id' => 'required',
            'user_id' => 'required',
            'content' => 'required'
        ]);

        $content = $req->input('content');

        $venue->update(['content' => $content]);
    }
}
