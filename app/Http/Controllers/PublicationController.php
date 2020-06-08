<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use Illuminate\Support\Facades\Auth;

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
        $body['user_id'] = Auth::id();
        return Publication::create($body);
    }
/*
    public function getPublication(){
        $publications = Publication::all();
        return $publications;
    }
*/
    public function getPublication(){
        $publications = Publication::with('likes')->get();
        return $publications;
    }
}
