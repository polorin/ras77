<?php

namespace App\Support;

class SiteSettings
{
    /**
     * Retrieve the site settings with defaults applied.
     */
    public static function get(): array
    {
        $defaults = self::getDefaults();
        $file = self::settingsFile();

        if (is_file($file)) {
            $data = json_decode(file_get_contents($file), true);
            if (is_array($data)) {
                return array_merge($defaults, $data);
            }
        }

        return $defaults;
    }

    /**
     * Persist the given settings to storage.
     */
    public static function save(array $settings): void
    {
        $merged = array_merge(self::getDefaults(), $settings);
        file_put_contents(self::settingsFile(), json_encode($merged, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    /**
     * Provide the absolute path to the settings file.
     */
    protected static function settingsFile(): string
    {
        return storage_path('app/site-settings.json');
    }

    /**
     * The default settings structure.
     */
    protected static function getDefaults(): array
    {
        return [
            'logo' => null,
            'favicon' => null,
            'slider_images' => [],
            'pragmatic_logo' => null,
            'main_bg_color' => '#111827',
            'header_bg_color' => '#1a1a1a',
            'bottom_nav_bg_color' => '#1a1a1a',
            'sidebar_bg_color' => '#0f0f0f',
            'sidebar_menu_bg_color' => '#d77f03',
            'sidebar_menu_bg_opacity' => 0.7,
            'game_menu_bg_color' => '#1a1a1a',
            'icon_beranda' => null,
            'icon_promosi' => null,
            'icon_masuk' => null,
            'icon_hubkami' => null,
            'icon_akun' => null,
            'icon_hot_games' => null,
            'icon_slots' => null,
            'icon_race' => null,
            'icon_togel' => null,
            'icon_olahraga' => null,
            'icon_crashgame' => null,
            'icon_arcade' => null,
            'icon_poker' => null,
            'icon_esports' => null,
            'icon_sabung_ayam' => null,
            'payment_methods' => [],
        ];
    }
}
