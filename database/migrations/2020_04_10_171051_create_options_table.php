<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedTinyInteger('points')->nullable();
            $table->mediumText('title')->nullable();
            $table->string('label')->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->integer('percentage')->nullable();
        });

        Schema::table('Options', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('Questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Options');
    }
}
