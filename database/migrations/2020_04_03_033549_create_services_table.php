<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
	        $table->string('provider')->unique();
	        $table->boolean('display');
	        $table->string('configValue')->unique();
	        $table->string('key1');
	        $table->string('value1');
	        $table->string('key2');
	        $table->string('value2');
	        $table->string('key3');
	        $table->string('value3');
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
        Schema::dropIfExists('services');
    }
}
