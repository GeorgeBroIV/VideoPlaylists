<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('provider')->unique();
            $table->string('providerfriendly');
            $table->string('api');
            $table->boolean('scopes')->default(0);
            $table->boolean('active')->default(1);
            $table->text('notes');
            $table->timestamps();

//  TODO providers migration under development
	        $table->string('avatar')->nullable();
	        $table->string('provider', 20)->nullable();
	        $table->string('provider_id')->nullable();
	        $table->string('access_token')->nullable();
	        $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
