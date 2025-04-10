<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrations_pregnancies', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->index();
            $table->timestamp('last_period_menstruation');
            $table->string('period_pregnancy')->nullable();
            $table->timestamp('estimated_date_of_delivery')->nullable();
            $table->string('history')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations_pregnancies');
    }
};
