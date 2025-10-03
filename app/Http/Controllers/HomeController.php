<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;
use App\Models\Promotion;
use App\Support\SiteSettings;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('member.home');
        }

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
        $promotions = Promotion::active()
            ->ofType(Promotion::TYPE_PROMOTION)
            ->orderByDesc('created_at')
            ->get();

        $events = Promotion::active()
            ->ofType(Promotion::TYPE_EVENT)
            ->orderByDesc('created_at')
            ->get();

        $categories = Promotion::categoryOptions();

        return view('promosi', compact('settings', 'promotions', 'events', 'categories'));
    }
    
    /**
     * Display the login page.
     */
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('member.home');
        }

        $settings = $this->getSettings();
        return view('auth.login', compact('settings'));
    }
    
    /**
     * Display the register page.
     */
    public function register()
    {
        if (Auth::check()) {
            return redirect()->route('member.home');
        }

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
     * Display the deposit page.
     */
    public function deposit()
    {
        $settings = $this->getSettings();
        return view('deposit', compact('settings'));
    }

    /**
     * Display the change password page.
     */
    public function ubahKataSandi()
    {
        $settings = $this->getSettings();
        return view('ubah-kata-sandi', compact('settings'));
    }

    /**
     * Display member home page after login.
     */
    public function memberHome()
    {
        $settings = $this->getSettings();
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

        return view('member.home', compact('settings', 'popularGames'));
    }
    
    /**
     * Get site settings from storage
     */
    private function getSettings()
    {
        return SiteSettings::get();
    }
}