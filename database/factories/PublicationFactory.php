<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Publication;
use Faker\Generator as Faker;

$factory->define(Publication::class, function (Faker $faker) {
    return [
        'text'=>$faker->paragraph,
        'file'=>$faker->imageUrl,
        'created_at'=>$faker->time
    ];
});
