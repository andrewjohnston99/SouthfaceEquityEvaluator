<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->string('email')->nullable();
            $table->string('community_name')->nullable();
            $table->string('community_address')->nullable();
            $table->string('community_gps')->nullable();
            $table->string('developer_phone')->nullable();
            $table->string('developer_email')->nullable();
            $table->string('developer_address')->nullable();
            $table->unsignedInteger('acerage')->nullable();
            $table->unsignedInteger('greenspace')->nullable();
            $table->unsignedInteger('residential_units')->nullable();
            $table->unsignedInteger('multi_family_units')->nullable();
            $table->unsignedInteger('single_family_units')->nullable();
            $table->unsignedInteger('commercial_space')->nullable();
            $table->unsignedInteger('residential_space')->nullable();
        });

        Schema::table('Contacts', function (Blueprint $table) {
            $table->foreign('project_id')->references('id')->on('Projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Contacts');
    }
}
