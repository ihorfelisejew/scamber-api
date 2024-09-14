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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->string('client_name');
            $table->string('client_last_name');
            $table->string('phone_number');
            $table->string('email');
            $table->foreignId('manufacturer_id');
            $table->foreign('manufacturer_id')->references('manufacturer_id')->on('manufacturers')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('car_model');
            $table->integer('low_price');
            $table->integer('high_price');
            $table->integer('min_year');
            $table->integer('max_year');
            $table->string('order_details')->nullable();
            $table->integer('acceptance_status')->default(0);
            $table->integer('execution_status')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
