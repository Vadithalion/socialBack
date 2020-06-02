<?php

use App\Publication;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Publication::truncate();


        factory(User::class, 10)->create();
        factory(Publication::class, 10)->create();
    }
}
