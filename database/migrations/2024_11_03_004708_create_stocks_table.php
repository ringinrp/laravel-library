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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'book_id')->constrained('books')->cascadeOnDelete();
            $table->unsignedInteger(column: 'total')->default(value: 0);
            $table->unsignedInteger(column: 'available')->default(value: 0);
            $table->unsignedInteger(column: 'loan')->default(value: 0);
            $table->unsignedInteger(column: 'lost')->default(value: 0);
            $table->unsignedInteger(column: 'damaged')->default(value: 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
