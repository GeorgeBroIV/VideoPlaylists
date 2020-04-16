<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoogleUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('google_users', function (Blueprint $table) {
            $table->id();
            $table->string('vpEmail')->unique;
            $table->string('token');
            $table->string('refreshToken');
            $table->string('expiresIn');
            $table->string('googleId');
            $table->string('nickname');
            $table->string('name');
            $table->string('email');
            $table->string('avatar');
            $table->string('userSub');
            $table->string('userName');
            $table->string('userGiven_name');
            $table->string('userFamily_name');
            $table->string('userPicture');
            $table->string('userEmail');
            $table->string('userEmail_verified');
            $table->string('userLocale');
            $table->string('userId');
            $table->string('userVerified_email');
            $table->string('userLink');
            $table->string('avatar_original');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('google_users');
    }
}
