<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationsTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('StationsTables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('station_id');
            $table->unsignedBigInteger('table_id');
        });

        Schema::table('StationsTables', function(Blueprint $table){
            $table->foreign('station_id')->references('id')->on('MartaStations');
            $table->foreign('table_id')->references('id')->on('Tables');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('StationsTables');
    }
}
