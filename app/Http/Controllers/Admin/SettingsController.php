<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * Show the form for editing the site appearance settings.
     */
    public function tampilan()
    {
        // Get settings from database or config
        // For now using default values or stored in session/file
        $settings = $this->getSettings();
        
        return view('admin.settings.tampilan', compact('settings'));
    }
    
    /**
     * Update the site appearance settings.
     */
    public function updateTampilan(Request $request)
    {
        // More flexible validation for images - remove MIME type validation temporarily for testing
        $request->validate([
            'logo' => 'nullable|file|max:2048',
            'pragmatic_logo' => 'nullable|file|max:1024',
            'slider_images.*' => 'nullable|file|max:2048',
            'icon_beranda' => 'nullable|file|max:500',
            'icon_promosi' => 'nullable|file|max:500',
            'icon_masuk' => 'nullable|file|max:500',
            'icon_hubkami' => 'nullable|file|max:500',
            'icon_akun' => 'nullable|file|max:500',
            'main_bg_color' => 'nullable|string|regex:/^#[0-9A-Fa-f]{6}$/',
            'header_bg_color' => 'required|string',
            'bottom_nav_bg_color' => 'required|string',
            'game_menu_bg_color' => 'nullable|string|regex:/^#[0-9A-Fa-f]{6}$/',
            // Game category icons
            'icon_hot_games' => 'nullable|file|max:500',
            'icon_slots' => 'nullable|file|max:500',
            'icon_race' => 'nullable|file|max:500',
            'icon_togel' => 'nullable|file|max:500',
            'icon_olahraga' => 'nullable|file|max:500',
            'icon_crashgame' => 'nullable|file|max:500',
            'icon_arcade' => 'nullable|file|max:500',
            'icon_poker' => 'nullable|file|max:500',
            'icon_esports' => 'nullable|file|max:500',
            'icon_sabung_ayam' => 'nullable|file|max:500',
        ]);
        
        $settings = $this->getSettings();
        
        
        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if (isset($settings['logo']) && $settings['logo'] && Storage::exists('public/logos/' . $settings['logo'])) {
                Storage::delete('public/logos/' . $settings['logo']);
            }
            
            $logoPath = $request->file('logo')->store('logos', 'public');
            $settings['logo'] = basename($logoPath);
        }

        // Handle Pragmatic Play logo upload
        if ($request->hasFile('pragmatic_logo')) {
            // Delete old pragmatic logo if exists
            if (isset($settings['pragmatic_logo']) && $settings['pragmatic_logo'] && Storage::exists('public/logos/' . $settings['pragmatic_logo'])) {
                Storage::delete('public/logos/' . $settings['pragmatic_logo']);
            }
            
            $pragmaticLogoPath = $request->file('pragmatic_logo')->store('logos', 'public');
            $settings['pragmatic_logo'] = basename($pragmaticLogoPath);
        }

        // Handle slider images upload
        if ($request->hasFile('slider_images')) {
            $currentSliderImages = $settings['slider_images'] ?? [];
            
            foreach ($request->file('slider_images') as $sliderImage) {
                $sliderPath = $sliderImage->store('sliders', 'public');
                $currentSliderImages[] = basename($sliderPath);
            }
            
            $settings['slider_images'] = $currentSliderImages;
        }

        // Handle slider images removal
        if ($request->remove_slider_images) {
            $imagesToRemove = explode(',', $request->remove_slider_images);
            $currentSliderImages = $settings['slider_images'] ?? [];
            
            foreach ($imagesToRemove as $imageToRemove) {
                $imageToRemove = trim($imageToRemove);
                if (in_array($imageToRemove, $currentSliderImages)) {
                    // Delete file from storage
                    if (Storage::exists('public/sliders/' . $imageToRemove)) {
                        Storage::delete('public/sliders/' . $imageToRemove);
                    }
                    
                    // Remove from array
                    $currentSliderImages = array_filter($currentSliderImages, function($img) use ($imageToRemove) {
                        return $img !== $imageToRemove;
                    });
                }
            }
            
            $settings['slider_images'] = array_values($currentSliderImages);
        }
        
        // Handle icon uploads
        $iconFields = ['icon_beranda', 'icon_promosi', 'icon_masuk', 'icon_hubkami', 'icon_akun'];
        foreach ($iconFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old icon if exists
                if (isset($settings[$field]) && $settings[$field] && Storage::exists('public/icons/' . $settings[$field])) {
                    Storage::delete('public/icons/' . $settings[$field]);
                }
                
                $iconPath = $request->file($field)->store('icons', 'public');
                $settings[$field] = basename($iconPath);
            }
        }
        
        // Handle game category icon uploads
        $gameIconFields = ['icon_hot_games', 'icon_slots', 'icon_race', 'icon_togel', 'icon_olahraga',
                           'icon_crashgame', 'icon_arcade', 'icon_poker', 'icon_esports', 'icon_sabung_ayam'];
        foreach ($gameIconFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old game icon if exists
                if (isset($settings[$field]) && $settings[$field] && Storage::exists('public/game-icons/' . $settings[$field])) {
                    Storage::delete('public/game-icons/' . $settings[$field]);
                }
                
                $gameIconPath = $request->file($field)->store('game-icons', 'public');
                $settings[$field] = basename($gameIconPath);
            }
        }
        
        // Update colors
        if ($request->filled('main_bg_color')) {
            $settings['main_bg_color'] = $request->main_bg_color;
        }
        $settings['header_bg_color'] = $request->header_bg_color;
        $settings['bottom_nav_bg_color'] = $request->bottom_nav_bg_color;
        
        // Save settings (for now using file storage, later can be moved to database)
        $this->saveSettings($settings);
        
        return redirect()->route('admin.settings.tampilan')
                        ->with('success', 'Pengaturan tampilan berhasil diperbarui!');
    }
    
    /**
     * Get settings from storage
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
            'slider_images' => [],
            'pragmatic_logo' => null,
            'main_bg_color' => '#111827',
            'header_bg_color' => '#1a1a1a',
            'bottom_nav_bg_color' => '#1a1a1a',
            'game_menu_bg_color' => '#1a1a1a',
            'icon_beranda' => null,
            'icon_promosi' => null,
            'icon_masuk' => null,
            'icon_hubkami' => null,
            'icon_akun' => null,
            // Game category icons
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
        ];
    }
    
    /**
     * Save settings to storage
     */
    private function saveSettings($settings)
    {
        $settingsFile = storage_path('app/site-settings.json');
        file_put_contents($settingsFile, json_encode($settings, JSON_PRETTY_PRINT));
    }
}