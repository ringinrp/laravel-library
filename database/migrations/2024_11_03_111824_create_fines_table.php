<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\FinePaymentStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fines', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'return_book_id')->constrained(table: 'return_books')->cascadeOnDelete();
            $table->foreignId(column: 'user_id')->constrained(table: 'users')->cascadeOnDelete();
            $table->decimal(column: 'late_fee', total: 8, places: 2)->default(value:0); //total dan places adalah default
            $table->decimal(column: 'other_fee', total:8, places: 2)->default(value:0);
            $table->decimal(column: 'total_fee')->computed();
            $table->date(column: 'fine_date');
            $table->string('payment_status')->default(value: FinePaymentStatus::PENDING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fines');
    }
};
