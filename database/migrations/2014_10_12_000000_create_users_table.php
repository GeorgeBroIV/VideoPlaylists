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
            $table->string('firstname');
	        $table->string('lastname');
	        $table->string('userid')->unique();
            $table->string('email')->unique();
            $table->string('password');
	
	        $table->string('avatar')->nullable();
	        $table->string('provider', 20)->nullable();
	        $table->string('provider_id')->nullable();
	        $table->string('access_token')->nullable();
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
