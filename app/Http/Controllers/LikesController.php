<?php

namespace App\Http\Controllers;

use App\User;
use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
     
    public function getLikesAll(){ 
        $likes = Publication::with('user', 'post')->get();
        return $likes;
    }

    public function insertLike(Request $request){
        $body = $request->all();
        $body['user_id'] = Auth::id();
        $like = Publication::create($body);
        return response($like, 201);
    }
    
    public function dislike($id){
        // if/mensaje   
        $like = Publication::where('post_id', $id)
        ->where('user_id', Auth::id());
        $like->delete();
        return response([
            'message' => 'Borrado correctamente'
        ], 200);
    }
}
