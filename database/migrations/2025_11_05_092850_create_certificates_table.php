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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->string('unique_code')->unique();
            $table->timestamp('issued_at')->useCurrent();
            $table->decimal('final_score', 5, 2)->nullable(); // Final score (0-100)
            $table->string('pdf_url')->nullable();
            $table->boolean('is_valid')->default(true);
            $table->timestamps();

            // Indexes
            $table->unique(['user_id', 'course_id']);
            $table->index('unique_code');
            $table->index('issued_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
