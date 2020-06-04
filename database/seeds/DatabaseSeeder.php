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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        Publication::truncate();
        DB::table('follows')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        factory(User::class, 10)->create();
        factory(Publication::class, 10)->create();

        for($i=0;$i<10;$i++){
        DB::table('follows')->insert([
            'follower_id' => random_int(1,10),
            'followed_id' => random_int(1,10),
        ]);
        }

    }
}
