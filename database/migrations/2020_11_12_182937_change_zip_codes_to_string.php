<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeZipCodesToString extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('postal_code')->change();
        });

        Schema::table('delivery_zones', function (Blueprint $table) {
            $table->string('postal_code')->change();
        });

        Schema::table('restaurants', function (Blueprint $table) {
            $table->string('postal_code')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('string', function (Blueprint $table) {
            $table->integer('postal_code')->change();
        });

        Schema::table('delivery_zones', function (Blueprint $table) {
            $table->integer('postal_code')->change();
        });

        Schema::table('restaurants', function (Blueprint $table) {
            $table->integer('postal_code')->change();
        });
    }
}
