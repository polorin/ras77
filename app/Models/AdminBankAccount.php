<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminBankAccount extends Model
{
    protected $fillable = [
        'bank_name',
        'account_number',
        'account_holder_name',
        'bank_logo_url',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Scope to get only active accounts
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by sort_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'asc');
    }
}
