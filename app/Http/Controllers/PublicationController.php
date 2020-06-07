<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
//use App\User
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\DB;



class PublicationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            return Publication::all();
        }
    }


    public function newPublication(Request $request){
        $body= $request->all();
        return Publication::create($body);
    }
}
