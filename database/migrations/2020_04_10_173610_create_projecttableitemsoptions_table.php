<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjecttableitemsoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProjectTableItemsOptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('option_id');
            $table->unsignedBigInteger('table_id');
        });

        Schema::table('ProjectTableItemsOptions', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('Projects')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('Items')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('Options')->onDelete('cascade');
            $table->foreign('table_id')->references('id')->on('ProjectTables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ProjectTableItemsOptions');
    }
}
