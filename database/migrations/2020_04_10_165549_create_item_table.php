<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('table_id');
            $table->string('name');
            $table->boolean('required');
            $table->mediumText('instructions')->nullable();
            $table->unsignedInteger('order')->nullable();
        });

        Schema::table('Items', function (Blueprint $table) {
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
        Schema::dropIfExists('Items');
    }
}
