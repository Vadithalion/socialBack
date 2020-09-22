<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;
use App\User;
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

    public function getPubliById($id)
    {
        $user = Publication::find($id)->load('user');
        return $user;
    }


    public function newPublication(Request $request){
        $body= $request->all();
        $body['user_id'] = Auth::id();
        return Publication::create($body);
    }

    public function destroy($id){
        $post = Publication::find($id);
        if (Auth::id() !== $post->user_id){
            return response([
                'message' => 'Wrong Credentials'
            ], 400);
        }
        $post->delete();
        return response([
            'message' => 'Borrado correctamente'
        ], 200);
    }

    public function getPublication(){
        $publications = Publication::with('likes')->get();
        return $publications;
    }

    public function orderPostDesc()
    {           
        $filter = Publication::orderBy('id', 'DESC')->get();                                      
        return $filter;
    }

    public function getPubliByUser($id){
        $posts = Publication::where('user_id', $id)->get();

        return response()->json([
            'status' => 'success',
            'posts' => $posts
        ], 200);
    }
}
