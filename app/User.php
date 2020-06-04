<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
