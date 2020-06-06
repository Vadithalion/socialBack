<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'surname'=>$faker->name,
        'nick'=>$faker->name,
        'email'=>$faker->email,
        'password'=>$faker->password,
        'role'=>$faker->word,
        'status'=>$faker->word,
        'image' =>$faker->imageUrl
        ];
});
