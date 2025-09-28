<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $settings = $this->getSettings();
        // Ambil game populer yang aktif dan sudah diurutkan
        $popularGames = Game::query()
            ->active()
            ->popular()
            ->ordered()
            ->get(['id','name','image','image_type','game_url'])
            ->map(function ($game) {
                return [
                    'id' => $game->id,
                    'name' => $game->name,
                    'image' => $game->image,
                    'image_type' => $game->image_type,
                    'url' => $game->game_url,
                ];
            })->toArray();

        return view('home', compact('settings', 'popularGames'));
    }
    
    /**
     * Display the promosi page.
     */
    public function promosi()
    {
        $settings = $this->getSettings();
        return view('promosi', compact('settings'));
    }
    
    /**
     * Display the login page.
     */
    public function login()
    {
        $settings = $this->getSettings();
        return view('auth.login', compact('settings'));
    }
    
    /**
     * Display the register page.
     */
    public function register()
    {
        $settings = $this->getSettings();
        return view('auth.register', compact('settings'));
    }
    
    /**
     * Display the contact page.
     */
    public function hubungi()
    {
        $settings = $this->getSettings();
        return view('hubungi', compact('settings'));
    }
    
    /**
     * Display the account page.
     */
    public function akun()
    {
        $settings = $this->getSettings();
        return view('akun', compact('settings'));
    }
    
    /**
     * Get site settings from storage
     */
    private function getSettings()
    {
        $settingsFile = storage_path('app/site-settings.json');
        
        if (file_exists($settingsFile)) {
            return json_decode(file_get_contents($settingsFile), true);
        }
        
        // Default settings
        return [
            'logo' => null,
            'header_bg_color' => '#1a1a1a',
            'bottom_nav_bg_color' => '#1a1a1a',
            'icon_beranda' => null,
            'icon_promosi' => null,
            'icon_masuk' => null,
            'icon_hubkami' => null,
            'icon_akun' => null,
        ];
    }
}