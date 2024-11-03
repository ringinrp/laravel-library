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
        Schema::create('return_book_checks', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'return_book_id')->constrained(table: 'returnbooks')->cascadeOnDelete();
            $table-> string('condition')->nullable();
            $table->text(column: 'notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_book_checks');
    }
};