<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'image_type',
        'category',
        'is_popular',
        'is_active',
        'sort_order',
        'provider',
        'game_url'
    ];

    protected $casts = [
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    // Scope untuk game populer
    public function scopePopular($query)
    {
        return $query->where('is_popular', true);
    }

    // Scope untuk game aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Accessor untuk image URL
    public function getImageUrlAttribute()
    {
        if ($this->image_type === 'url') {
            return $this->image;
        }
        
        return asset('storage/games/' . $this->image);
    }

    // Scope untuk ordering
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc');
    }
}
