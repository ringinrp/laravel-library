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
        Schema::create('fine_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(column: 'late_fee_per_day')->default(value: 7000);
            $table->unsignedInteger(column: 'damage_fee_percentage')->default(value: 50);
            $table->unsignedInteger(column: 'lost_fee_percentage')->default(value: 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fine_settings');
    }
};
