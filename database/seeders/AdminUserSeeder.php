<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'username' => 'admin',
                'name' => 'Administrator',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
                'whatsapp' => '620000000000',
                'payment_method' => null,
                'payment_provider' => null,
                'account_number' => null,
                'account_holder_name' => null,
            ]
        );
    }
}
