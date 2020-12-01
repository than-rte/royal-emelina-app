<?php

namespace App\Http\Controllers\Api;

use App\Model\VenueImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenueImagesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        //Auth only store, edit, delete
    }

    public function index()
    {
        $data = VenueImage::all();

        if($data->isEmpty())
        {
            return response()->json([
                'message' => 'no records'
            ]);
        }

        return response()->json($data);
    }

    public function store()
    {  
        $venue_image = VenueImage::create($this->validateRequest());

        $this->storeImage($venue_image);

        return response()->json($venue_image);
    }

    private function storeImage($venue_image)
    {  
        if (request()->has('image_url'))
        {
            $venue_image->update([
                'image_url' => request()->image_url->store('uploads', 'public')
            ]);
        }
    }

    private function validateRequest()
    {
        return request()->validate([
            'image_url' => 'file|image|max:5000',
            'venue_id' => 'required'
        ]);
    }
}
