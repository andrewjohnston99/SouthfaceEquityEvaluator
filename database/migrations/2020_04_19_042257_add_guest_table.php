<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Guests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('station_id');
            $table->string('title');
            $table->json('project_metadata');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Guests');
    }
}
