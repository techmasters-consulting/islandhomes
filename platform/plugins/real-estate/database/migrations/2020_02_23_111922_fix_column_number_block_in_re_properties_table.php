<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixColumnNumberBlockInRePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('re_projects', function (Blueprint $table) {
            $table->smallInteger('number_block')->unsigned()->nullable()->change();
        });

        Schema::table('re_properties', function (Blueprint $table) {
            $table->smallInteger('number_bedroom')->unsigned()->nullable()->change();
            $table->smallInteger('number_bathroom')->unsigned()->nullable()->change();
            $table->smallInteger('number_floor')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('re_projects', function (Blueprint $table) {
            $table->tinyInteger('number_block')->nullable()->change();
        });

        Schema::table('re_properties', function (Blueprint $table) {
            $table->tinyInteger('number_bedroom')->nullable()->change();
            $table->tinyInteger('number_bathroom')->nullable()->change();
            $table->tinyInteger('number_floor')->nullable()->change();
        });
    }
}
