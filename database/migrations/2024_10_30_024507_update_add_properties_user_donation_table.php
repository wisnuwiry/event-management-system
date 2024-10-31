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
        Schema::table('donations', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->default(3);
            $table->enum('status', ['pending', 'complete', 'invalid'])->default('pending');
            $table->text('rejection_reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('status');
            $table->dropColumn('rejection_reason');
        });
    }
};
