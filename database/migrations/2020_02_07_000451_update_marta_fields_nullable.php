<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMartaFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('MartaStations', function (Blueprint $table) {
            $table->string('abbrev')->nullable()->change();
            $table->string('name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('MartaStations', function (Blueprint $table) {
            $table->string('abbrev')->nullable(false)->change();
            $table->string('name')->nullable(false)->change();
        });
    }
}
