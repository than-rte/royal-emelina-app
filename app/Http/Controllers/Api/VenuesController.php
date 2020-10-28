<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Venue;

class VenuesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        //Auth only store, edit, delete
    }

    public function index() {
        //Fetch all Details

    }

    public function show(Request $req) {
        //Get request
        $params = $req->venue;

        //Check Request if exist in the database
        $venue = Venue::findOrFail($params);
            //Pass
            //Fetch Single Venue
            return $venue;

            //Fail
            //Return Error Response
    }

    public function store(Request $req) {
        dd($req);
        //Get Request inputs and Validate
        $res_data = $req->validate([
            'name' => 'required',
            'description' => 'required',
            'min_people' => 'required',
            'max_people' => 'required'
        ]);

        //Add new Venue
        Venue::create($res_data);
    }

    public function update(Request $req) {
        //Get Request params 
        $venue = Venue::findOrFail($req->venue);

        //Validate Request
        $res_data = $req->validate([
            'name' => 'required',
            'description' => 'required',
            'min_people' => 'required',
            'max_people' => 'required'
        ]);
        
        //Update Venue
        $venue->update($res_data);

    }

    public function edit() {
        //Get Resquest

        //Validate Request

        //Get AuthID and TRY Save Request
            //Pass - Save

            // Fail - Return Error Response 

        
    }

    public function destroy(Request $req) {
        //Get request
        $params = $req->venue;

        //Check Request if exist in the database
        $venue = Venue::findOrFail($params);

        $venue->delete();
    }
}
