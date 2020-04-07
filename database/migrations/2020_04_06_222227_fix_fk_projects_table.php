<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixFkProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->change();
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->bigInteger('user_id')->change();
        });
    }
}
