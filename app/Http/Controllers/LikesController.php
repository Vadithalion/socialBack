<?php

namespace App\Http\Controllers;

use App\Like;
use App\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
     
    public function getLikesAll(){ 
        $likes = Like::with('user', 'post')->get();
        return $likes;
    }

    public function addLike(Request $request){
        $body = $request->all();
        $body['user_id'] = Auth::id();
        $like = Like::create($body);
        return response($like, 201);
    }
    
    public function subtractLike($id){
        $like = Like::where('publication_id', $id)
        ->where('user_id', Auth::id())->delete();
        return response([
            'message' => 'Borrado correctamente'
        ], 200);
    }
}
