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
        Schema::create('cars_in_parking_lots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id');
            $table->foreignId('parking_id');

            $table->foreign('car_id')->references('car_id')->on('cars')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('parking_id')->references('parking_id')->on('parking_lots')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars_in_parking_lots');
    }
};
