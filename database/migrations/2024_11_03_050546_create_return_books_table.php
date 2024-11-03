<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\ReturnBookStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('return_books', function (Blueprint $table) {
            $table->id();
            $table->string('return_book_code')->unique();
            $table->foreignId(column: 'loan_id')->constrained(table: 'loans')->cascadeOnDelete();
            $table->foreignId(column: 'user_id')->constrained(table: 'users')->cascadeOnDelete();
            $table->foreignId(column: 'book_id')->constrained(table: 'books')->cascadeOnDelete();
            $table->date(column: 'return_date');
            $table->string('status')->default(value: ReturnBookStatus::CHECKED->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_books');
    }
};
