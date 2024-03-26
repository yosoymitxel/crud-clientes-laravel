<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->string('street');
            $table->string('suite')->nullable();  // Allow null values for suite
            $table->string('city');
            $table->string('zipcode');
            // Add new columns for geo data:
            $table->decimal('lat', 10, 6)->nullable();  // Latitude with precision
            $table->decimal('lng', 10, 6)->nullable();  // Longitude with precision
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
