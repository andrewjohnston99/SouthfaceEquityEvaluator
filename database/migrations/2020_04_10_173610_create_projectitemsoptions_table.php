<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectitemsoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProjectItemsOptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('option_id');
        });

        Schema::table('ProjectItemsOptions', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('Projects');
            $table->foreign('item_id')->references('id')->on('Items');
            $table->foreign('option_id')->references('id')->on('Options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ProjectItemsOptions');
    }
}
