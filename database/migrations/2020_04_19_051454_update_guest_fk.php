<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateGuestFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Guests', function (Blueprint $table) {
            $table->foreign('station_id')->references('id')->on('MartaStations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Guests', function (Blueprint $table) {
            $table->dropForeign(['station_id']);
        });
    }
}
