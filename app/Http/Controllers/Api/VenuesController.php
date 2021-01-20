<?php

namespace App\Http\Controllers\Api;

use App\Model\User;
use App\Model\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Venue as VenueResource;
use Symfony\Component\HttpFoundation\Response;

class VenuesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        //Auth only store, edit, delete
    }

    public function index(Request $req)
    {
        //Fetch all Details
        // $id = Auth::id();
        // $data = Venue::allOfUser($id)->get();
        // return response()->json([
        //     'data' => $data
        // ], Response::HTTP_OK);

        $params = [
            'page' => $req->page,
            'sort' => $req->sort,
            'order' => $req->order,
            'paginate' => $req->paginate
        ];

        $id = Auth::id();
        $total = Venue::allOfUser($id)->count();
        $data = Venue::allOfUser($id)->orderBy($params['sort'], $params['order'])->paginate($params['paginate']);
        return response()->json([
            'params' => $params,
            'total_length' => $total,
            'data' => $data
        ], Response::HTTP_OK);
    }

    public function show(Request $req)
    {
        //Get request
        $id = $req->venue;

        $venue = Venue::findOrFail($id);

        return new VenueResource($venue);
    }


    public function store(Request $req)
    {
        //Get Request inputs and Validate
        $res_data = $this->validateDetails($req);

        //Add new Venue
        $venue = Venue::create($res_data);
        $venue = Venue::findOrFail($venue->id);
        return (new VenueResource($venue))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(Request $req)
    {
        //Get Request params 
        $venue = Venue::findOrFail($req->venue);

        //Validate Request
        $res_data = $req->validate([
            'name' => 'required',
            'content' => 'required',
            'min_people' => 'required',
            'max_people' => 'required',
        ]);

        //Update Venue
        return (new VenueResource($venue))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }


    public function destroy(Request $req)
    {
        //Get Request params 
        $venue = Venue::findOrFail($req->venue);

        //Update Venue
        $venue->update(['available' => 0]);

        return response([], Response::HTTP_NO_CONTENT);
    }

    public function add_front_image()
    {
    }

    private function validateDetails(Request $req)
    {
        return $req->validate([
            'name' => 'required|unique:venues',
            'min_people' => 'required',
            'max_people' => 'required',
            'user_id' => 'required'
        ]);
    }
}
