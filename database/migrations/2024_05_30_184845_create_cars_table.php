<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('car_id');
            $table->foreignId('manufacturer_id');
            $table->string('model');
            $table->integer('year_of_manufacture');
            $table->integer('price');
            $table->integer('car_mileage');
            $table->string('body_type');
            $table->string('engine_type');
            $table->float('engine_capacity');
            $table->string('gearbox_type');
            $table->string('drive_type');
            $table->float('fuel_consumption');
            $table->string('VIN_code');
            $table->string('color');
            $table->string('other_desc');
            $table->foreignId('client_id')->nullable();
            $table->integer('offered_for_sale');

            $table->foreign('manufacturer_id')->references('manufacturer_id')->on('manufacturers')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
