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
        Schema::create('workers', function (Blueprint $table) {
            $table->bigIncrements('worker_id');
            $table->string('name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email');
            $table->date('date_of_birth')->nullable();
            $table->date('appointment_date')->nullable();
            $table->foreignId('position_id');
            $table->foreign('position_id')->references('position_id')->on('positions')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreignId('showroom_id');
            $table->foreign('showroom_id')->references('showroom_id')->on('showrooms')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('login')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};
