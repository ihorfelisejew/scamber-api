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
        Schema::create('showrooms', function (Blueprint $table) {
            $table->bigIncrements('showroom_id');
            $table->string('showroom_name');
            $table->string('phone_number');
            $table->integer('house_number');
            $table->string('street_name');
            $table->foreignId('city_id');
            $table->foreign('city_id')->references('city_id')->on('cities')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showrooms');
    }
};
