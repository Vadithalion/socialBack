<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('surname', 128)->nullable();
            $table->string('nick', 128)->nullable();
            $table->string('email', 128);
            $table->string('password');
            $table->string('role', 128)->default('user');
            //$table->string('status', 128)->nullable();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('follows', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('follower_id');
            $table->unsignedBigInteger('followed_id');
            $table->timestamps();

            $table->foreign('follower_id')->references('id')->on('users');
            $table->foreign('followed_id')->references('id')->on('users');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
