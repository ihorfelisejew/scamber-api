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
        Schema::create('cars_orders', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('phone_number');
            $table->foreignId('car_id');
            $table->dateTime('date_of_event');
            $table->foreign('car_id')->references('car_id')->on('cars')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars_orders');
    }
};
