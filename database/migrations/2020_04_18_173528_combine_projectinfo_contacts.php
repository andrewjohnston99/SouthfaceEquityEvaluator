<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CombineProjectinfoContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Contacts', function (Blueprint $table) {
            $table->unsignedInteger('acerage')->nullable();
            $table->unsignedInteger('greenspace')->nullable();
            $table->unsignedInteger('residential_units')->nullable();
            $table->unsignedInteger('multi_family_units')->nullable();
            $table->unsignedInteger('single_family_units')->nullable();
            $table->unsignedInteger('commercial_space')->nullable();
            $table->unsignedInteger('residential_space')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Contacts', function (Blueprint $table) {
            $table->dropColumn('acerage');
            $table->dropColumn('greenspace');
            $table->dropColumn('residential_units');
            $table->dropColumn('multi_family_units');
            $table->dropColumn('single_family_units');
            $table->dropColumn('commercial_space');
            $table->dropColumn('residential_space');
        });
    }
}
