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
        Schema::create('user_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('provider'); // Bank name (e.g., BCA, Mandiri, BNI)
            $table->string('account_number');
            $table->string('account_holder_name');
            $table->boolean('is_primary')->default(false); // Primary account flag
            $table->boolean('is_active')->default(true); // Active status
            $table->timestamps();

            // Index for faster queries
            $table->index('user_id');
            $table->index(['user_id', 'is_primary']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_bank_accounts');
    }
};
