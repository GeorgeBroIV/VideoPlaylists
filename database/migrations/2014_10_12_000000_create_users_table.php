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
            // This information is only for the WebApp user info
            // Social OAuth info are in other tables
            $table->id();
            $table->string('username')->unique();
            $table->string('firstname');
	        $table->string('lastname');
            $table->string('displayname')->nullable();
            $table->string('role')->default('Guest');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('password');
            $table->boolean('visible')->default(1)->nullable();
            $table->boolean('active')->default(1);
            $table->text('notes')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreignId('updated_by')->nullable();
            $table->softDeletes();
            $table->foreignId('deleted_by')->nullable();
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
