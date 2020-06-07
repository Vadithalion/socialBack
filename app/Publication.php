<?php

namespace App;

//use App\User;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable =[
        'text','file'
    ];
    /*
    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
    public function likes(){
        return $this->belongsToMany('App\User', 'likes', 'id_post', 'id_user');
    }
    public function comments(){
        return $this->hasMany('App\Comment','id_post');
    }*/
}