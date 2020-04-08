<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('project_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('station_id');
            $table->json('project_metadata');
            $table->binary('project_xls')->nullable();
            $table->json('project_json')->nullable();
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('projects');
    }
}
