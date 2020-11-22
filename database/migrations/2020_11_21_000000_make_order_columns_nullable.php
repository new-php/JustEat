<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeOrderColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('address_id')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('delivery_mode')->nullable()->change();
            $table->decimal('shipping', 8, 2)->nullable()->change();
            $table->foreignId('rider_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('address_id')->nullable(false)->change();
            $table->string('status')->nullable(false)->change();
            $table->string('delivery_mode')->nullable(false)->change();
            $table->decimal('shipping', 8, 2)->nullable(false)->change();
            $table->foreignId('rider_id')->nullable(false)->change();
        });
    }
}
