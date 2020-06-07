<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\User
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;



class PublicationController extends Controller
{
    public function newPublication(Request $request){
        $body= $request->all();
        return Publication::create($body);
    }
}
