<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProjectInfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedInteger('acerage')->nullable();
            $table->unsignedInteger('greenspace')->nullable();
            $table->unsignedInteger('residential_units')->nullable();
            $table->unsignedInteger('multi_family_units')->nullable();
            $table->unsignedInteger('single_family_units')->nullable();
            $table->unsignedInteger('commercial_space')->nullable();
            $table->unsignedInteger('residential_space')->nullable();
        });

        Schema::table('ProjectInfo', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('Projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ProjectInfo');
    }
}
