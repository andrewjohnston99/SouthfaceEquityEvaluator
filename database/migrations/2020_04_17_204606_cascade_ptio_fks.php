<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CascadePtioFks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ProjectTableItemsOptions', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropForeign(['item_id']);
            $table->dropForeign(['option_id']);
            $table->dropForeign(['table_id']);

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
        Schema::table('ProjectTableItemsOptions', function (Blueprint $table) {
            //
        });
    }
}
