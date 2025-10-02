<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Promotion extends Model
{
    public const TYPE_PROMOTION = 'promotion';
    public const TYPE_EVENT = 'event';

    public const CATEGORIES = [
        'member-baru' => 'Member Baru',
        'special' => 'Special',
        'olahraga' => 'Olahraga',
        'live-casino' => 'Live Casino',
        'slots' => 'Slots',
        'poker' => 'Poker',
        'sabung-ayam' => 'Sabung Ayam',
        'event' => 'Event',
    ];

    protected $fillable = [
        'title',
        'slug',
        'type',
        'category',
        'image',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOfCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return null;
        }

        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }

        $path = ltrim($this->image, '/');

        if (Str::startsWith($path, 'public/')) {
            $path = Str::replaceFirst('public/', '', $path);
        }

        if (Str::startsWith($path, 'storage/')) {
            $path = Str::replaceFirst('storage/', '', $path);
        }

        if (!Str::startsWith($path, 'promotions/')) {
            $path = 'promotions/' . $path;
        }

        if (!Storage::disk('public')->exists($path)) {
            return null;
        }

        return Storage::disk('public')->url($path);
    }

    public static function typeOptions(): array
    {
        return [
            self::TYPE_PROMOTION => 'Promosi',
            self::TYPE_EVENT => 'Event Provider',
        ];
    }

    public static function categoryOptions(): array
    {
        return self::CATEGORIES;
    }
}
