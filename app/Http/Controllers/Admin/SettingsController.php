<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Support\SiteSettings;

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
            'favicon' => 'nullable|file|mimes:png,jpg,jpeg,svg,webp,ico|max:512',
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
            'sidebar_bg_color' => 'nullable|string|regex:/^#[0-9A-Fa-f]{6}$/',
            'sidebar_menu_bg_color' => 'nullable|string|regex:/^#[0-9A-Fa-f]{6}$/',
            'sidebar_menu_bg_opacity' => 'nullable|numeric|min:0|max:1',
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

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            if (isset($settings['favicon']) && $settings['favicon'] && Storage::exists('public/favicons/' . $settings['favicon'])) {
                Storage::delete('public/favicons/' . $settings['favicon']);
            }

            $faviconPath = $request->file('favicon')->store('favicons', 'public');
            $settings['favicon'] = basename($faviconPath);
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
        if ($request->filled('sidebar_bg_color')) {
            $settings['sidebar_bg_color'] = $request->sidebar_bg_color;
        }
        if ($request->filled('sidebar_menu_bg_color')) {
            $settings['sidebar_menu_bg_color'] = $request->sidebar_menu_bg_color;
        }
        if (!is_null($request->sidebar_menu_bg_opacity)) {
            $settings['sidebar_menu_bg_opacity'] = max(0, min(1, (float) $request->sidebar_menu_bg_opacity));
        }

        // Save settings (for now using file storage, later can be moved to database)
        $this->saveSettings($settings);

        return redirect()->route('admin.settings.tampilan')
                        ->with('success', 'Pengaturan tampilan berhasil diperbarui!');
    }

    /**
     * Show the general settings page.
     */
    public function umum()
    {
        $settings = $this->getSettings();
        $paymentMethods = $settings['payment_methods'] ?? [];

        return view('admin.settings.umum', compact('settings', 'paymentMethods'));
    }

    /**
     * Update the general settings configuration.
     */
    public function updateUmum(Request $request)
    {
        $request->validate([
            'payment_methods' => 'nullable|array',
            'payment_methods.*.status' => 'required|in:online,offline',
            'payment_methods.*.existing_image' => 'nullable|string',
            'payment_methods.*.image' => 'nullable|file|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'payment_methods_removed' => 'nullable|array',
            'payment_methods_removed.*' => 'nullable|string',
            // Hubungi page validation
            'hubungi_main_image' => 'nullable|file|mimes:jpg,jpeg,png,svg,webp|max:5120',
            'hubungi_telegram_image' => 'nullable|file|mimes:jpg,jpeg,png,svg,webp|max:5120',
            'hubungi_telegram_url' => 'nullable|url',
            'hubungi_whatsapp_image' => 'nullable|file|mimes:jpg,jpeg,png,svg,webp|max:5120',
            'hubungi_whatsapp_url' => 'nullable|url',
        ]);

        $settings = $this->getSettings();
        $paymentMethods = [];

        // Remove deleted payment method images
        if ($request->filled('payment_methods_removed')) {
            foreach ($request->input('payment_methods_removed', []) as $removedImage) {
                if ($removedImage && Storage::exists('public/payment-methods/' . $removedImage)) {
                    Storage::delete('public/payment-methods/' . $removedImage);
                }
            }
        }

        $requestedMethods = $request->input('payment_methods', []);

        foreach ($requestedMethods as $index => $methodData) {
            $status = ($methodData['status'] ?? 'offline') === 'online' ? 'online' : 'offline';
            $existingImage = $methodData['existing_image'] ?? null;
            $imageName = $existingImage;

            if ($request->hasFile("payment_methods.$index.image")) {
                if ($existingImage && Storage::exists('public/payment-methods/' . $existingImage)) {
                    Storage::delete('public/payment-methods/' . $existingImage);
                }

                $storedPath = $request->file("payment_methods.$index.image")->store('payment-methods', 'public');
                $imageName = basename($storedPath);
            }

            if (!$imageName) {
                continue;
            }

            $paymentMethods[] = [
                'image' => $imageName,
                'status' => $status,
            ];
        }

        $settings['payment_methods'] = $paymentMethods;

        // Handle Hubungi page uploads
        if ($request->hasFile('hubungi_main_image')) {
            // Delete old main image if exists
            if (isset($settings['hubungi_main_image']) && $settings['hubungi_main_image'] && Storage::exists('public/hubungi/' . $settings['hubungi_main_image'])) {
                Storage::delete('public/hubungi/' . $settings['hubungi_main_image']);
            }

            $mainImagePath = $request->file('hubungi_main_image')->store('hubungi', 'public');
            $settings['hubungi_main_image'] = basename($mainImagePath);
        }

        if ($request->hasFile('hubungi_telegram_image')) {
            // Delete old telegram image if exists
            if (isset($settings['hubungi_telegram_image']) && $settings['hubungi_telegram_image'] && Storage::exists('public/hubungi/' . $settings['hubungi_telegram_image'])) {
                Storage::delete('public/hubungi/' . $settings['hubungi_telegram_image']);
            }

            $telegramImagePath = $request->file('hubungi_telegram_image')->store('hubungi', 'public');
            $settings['hubungi_telegram_image'] = basename($telegramImagePath);
        }

        if ($request->hasFile('hubungi_whatsapp_image')) {
            // Delete old whatsapp image if exists
            if (isset($settings['hubungi_whatsapp_image']) && $settings['hubungi_whatsapp_image'] && Storage::exists('public/hubungi/' . $settings['hubungi_whatsapp_image'])) {
                Storage::delete('public/hubungi/' . $settings['hubungi_whatsapp_image']);
            }

            $whatsappImagePath = $request->file('hubungi_whatsapp_image')->store('hubungi', 'public');
            $settings['hubungi_whatsapp_image'] = basename($whatsappImagePath);
        }

        // Save URLs
        if ($request->filled('hubungi_telegram_url')) {
            $settings['hubungi_telegram_url'] = $request->hubungi_telegram_url;
        }

        if ($request->filled('hubungi_whatsapp_url')) {
            $settings['hubungi_whatsapp_url'] = $request->hubungi_whatsapp_url;
        }

        $this->saveSettings($settings);

        return redirect()->route('admin.settings.umum')
            ->with('success', 'Pengaturan umum berhasil diperbarui!');
    }

    /**
     * Get settings from storage
     */
    private function getSettings()
    {
        return SiteSettings::get();
    }

    /**
     * Save settings to storage
     */
    private function saveSettings($settings)
    {
        SiteSettings::save($settings);
    }
}
