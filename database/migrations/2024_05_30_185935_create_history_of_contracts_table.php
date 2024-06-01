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
        Schema::create('history_of_contracts', function (Blueprint $table) {
            $table->bigIncrements('contract_id');
            $table->date('date_of_purchase')->useCurrent();
            $table->foreignId('car_id');
            $table->foreignId('showroom_id');
            $table->foreignId('client_id');
            $table->foreignId('manager_id');
            $table->string('type_of_contract');
            $table->string('contract_url')->nullable();

            $table->foreign('car_id')->references('car_id')->on('cars')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('showroom_id')->references('showroom_id')->on('showrooms')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('client_id')->references('client_id')->on('clients')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('manager_id')->references('worker_id')->on('workers')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_of_contracts');
    }
};
