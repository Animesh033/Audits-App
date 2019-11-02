<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateCityRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_city_regions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('state_city_region_id');
            $table->integer('state_city_regionable_id');
            $table->string('state_city_regionable_type'); //laravel 5.7
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
        Schema::dropIfExists('state_city_regions');
    }
}
