<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllowOptionsPointsNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Options', function (Blueprint $table) {
            $table->unsignedInteger('points')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Options', function (Blueprint $table) {
            $table->unsignedInteger('points')->nullable(false)->change();
        });
    }
}
