<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Model\VenueImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

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
        
        // $data = $this->validateRequest();

        // $venue_image = VenueImage::create($data);

        // $this->storeImage($venue_image);

        $images = Collection::wrap(request()->file('image_url'));
        dd($images);
        // return response()->json($venue_image);
    }

    private function storeImage($venue_image)
    {  
        if (request()->hasFile('image_url'))
        {   
            //Get File name with extension
            // dd(request()->file('image_url')->getClientOriginalName());

            //Get file name only
            // dd(pathinfo(request()->file('image_url')->getClientOriginalName(), PATHINFO_FILENAME));

            //Get file name extension
            // dd(request()->file('image_url')->getClientOriginalExtension());

            // $fullfilename = request()->file('image_url')->getClientOriginalName();

            $timestamp = Carbon::now()->timestamp;

            // $filename = pathinfo(request()->file('image_url')->getClientOriginalName(), PATHINFO_FILENAME);
            // dd($timestamp);
            $keyname = VenueImage::findOrFail($venue_image->id)->venue->name;
            // dd($keyname);
            $filename = md5($keyname);
            // dd($filename);
            $extension = request()->file('image_url')->getClientOriginalExtension();

            $fileToStore = $filename . '_' . $timestamp . 'n.' . $extension;

            $venue_image->update([
                'image_url' => request()->image_url->storeAs('public/uploads', $fileToStore)
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

    private function convertToJpeg($originalImage, $outputImage, $quality = 100)
    {
        $ext = $originalImage->getClientOriginalExtension();

        if (preg_match('/jpg|jpeg/i',$ext))
            $imageTmp=imagecreatefromjpeg($originalImage);
        else if (preg_match('/png/i',$ext))
            $imageTmp=imagecreatefrompng($originalImage);
        else if (preg_match('/gif/i',$ext))
            $imageTmp=imagecreatefromgif($originalImage);
        else if (preg_match('/bmp/i',$ext))
            $imageTmp=imagecreatefrombmp($originalImage);
        else
            return 0;

        imagejpeg($imageTmp);
        imagedestroy($imageTmp);

        return 1;
    }
}
