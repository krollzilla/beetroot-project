<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_weather', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->bigInteger('temperature');
            $table->bigInteger('humidity');
            $table->bigInteger('pressure');
            $table->bigInteger('wind_speed');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_weather');
    }
}
