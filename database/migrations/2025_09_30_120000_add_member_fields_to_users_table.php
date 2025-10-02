<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->nullable()->after('email');
            $table->string('whatsapp')->nullable()->after('username');
            $table->string('payment_method')->nullable()->after('whatsapp');
            $table->string('payment_provider')->nullable()->after('payment_method');
            $table->string('account_number')->nullable()->after('payment_provider');
            $table->string('account_holder_name')->nullable()->after('account_number');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'whatsapp',
                'payment_method',
                'payment_provider',
                'account_number',
                'account_holder_name',
            ]);
        });
    }
};
