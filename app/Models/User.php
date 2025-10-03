<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'is_admin',
        'last_login_at',
        'last_login_ip',
        'whatsapp',
        'payment_method',
        'payment_provider',
        'account_number',
        'account_holder_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'last_login_at' => 'datetime',
        ];
    }

    /**
     * Check if user is admin
     */
    public function isAdmin()
    {
        return $this->is_admin;
    }

    /**
     * Update last login information
     */
    public function updateLastLogin($ip = null)
    {
        $this->update([
            'last_login_at' => now(),
            'last_login_ip' => $ip ?? request()->ip(),
        ]);
    }

    /**
     * Get the user's bank accounts.
     */
    public function bankAccounts()
    {
        return $this->hasMany(UserBankAccount::class);
    }

    /**
     * Get the user's active bank accounts.
     */
    public function activeBankAccounts()
    {
        return $this->hasMany(UserBankAccount::class)->where('is_active', true);
    }

    /**
     * Get the user's primary bank account.
     */
    public function primaryBankAccount()
    {
        return $this->hasOne(UserBankAccount::class)->where('is_primary', true);
    }
}
