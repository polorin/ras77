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
        Schema::create('admin_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name'); // e.g., "Bank Central Asia (BCA)"
            $table->string('account_number');
            $table->string('account_holder_name');
            $table->text('bank_logo_url')->nullable(); // URL to bank logo
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0); // For ordering
            $table->timestamps();
            
            // Index for active accounts
            $table->index('is_active');
            $table->index('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_bank_accounts');
    }
};
