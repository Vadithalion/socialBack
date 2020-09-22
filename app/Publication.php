<?php

namespace App;

//use App\User;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $guarded =[];

    public function user()
    {
       return $this->belongsTo('\App\User');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes');
    }
}