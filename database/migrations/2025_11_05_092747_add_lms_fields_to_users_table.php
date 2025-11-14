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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('center_id')->nullable()->after('profile_photo_path')->constrained('centers')->onDelete('set null');
            $table->integer('total_points')->default(0)->after('center_id');
            $table->integer('current_level')->default(1)->after('total_points');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['center_id']);
            $table->dropColumn(['center_id', 'total_points', 'current_level']);
        });
    }
};
