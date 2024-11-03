<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\BookLanguage; // Tambahkan ini
use App\Enums\BookStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_code');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('author');
            $table->unsignedInteger(column : 'publication_year');
            $table->string('isbn');
            $table->string('language')->default(value : BookLanguage::INDONESIA->value);
            $table->text(column : 'synopsis')->nullable();
            $table->unsignedInteger(column : 'number_of_page')->default(value : 0);
            $table->string('status')->default(value : BookStatus::AVAILABLE->value);
            $table->string('cover')->nullable();
            $table->unsignedInteger('price')->default(value : 0);
            $table->foreignId(column : 'category_id')->constrained(table: 'categories')->cascadeOnDelete();
            $table->foreignId(column : 'publisher_id')->constrained(table: 'publishers')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
