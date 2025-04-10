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

        Schema::create('schedules_users', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id')->index();
            $table->timestamp('date');
            $table->string('status');
            $table->string('note')->nullable();
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules_users');
    }
};
