<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::ordered()->paginate(20);
        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        $categories = [
            'hot_games' => 'Hot Games',
            'slots' => 'Slots',
            'race' => 'Race',
            'togel' => 'Togel',
            'olahraga' => 'Olahraga',
            'crashgame' => 'Crash Game',
            'arcade' => 'Arcade',
            'poker' => 'Poker',
            'esports' => 'Esports',
            'sabung_ayam' => 'Sabung Ayam'
        ];
        
        return view('admin.games.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_type' => 'required|in:upload,url',
            'image' => 'required_if:image_type,upload|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_url' => 'required_if:image_type,url|url',
            'category' => 'nullable|string',
            'is_popular' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
            'provider' => 'nullable|string|max:255',
            'game_url' => 'nullable|url'
        ]);

        $gameData = $request->only([
            'name', 'description', 'category', 'is_popular', 
            'is_active', 'sort_order', 'provider', 'game_url'
        ]);

        $gameData['image_type'] = $request->image_type;

        if ($request->image_type === 'upload' && $request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/games', $imageName);
            $gameData['image'] = $imageName;
        } else {
            $gameData['image'] = $request->image_url;
        }

        Game::create($gameData);

        return redirect()->route('admin.games.index')
                        ->with('success', 'Game berhasil ditambahkan!');
    }

    public function show(Game $game)
    {
        return view('admin.games.show', compact('game'));
    }

    public function edit(Game $game)
    {
        $categories = [
            'hot_games' => 'Hot Games',
            'slots' => 'Slots',
            'race' => 'Race',
            'togel' => 'Togel',
            'olahraga' => 'Olahraga',
            'crashgame' => 'Crash Game',
            'arcade' => 'Arcade',
            'poker' => 'Poker',
            'esports' => 'Esports',
            'sabung_ayam' => 'Sabung Ayam'
        ];
        
        return view('admin.games.edit', compact('game', 'categories'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_type' => 'required|in:upload,url',
            'image' => 'required_if:image_type,upload|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_url' => 'required_if:image_type,url|url',
            'category' => 'nullable|string',
            'is_popular' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
            'provider' => 'nullable|string|max:255',
            'game_url' => 'nullable|url'
        ]);

        $gameData = $request->only([
            'name', 'description', 'category', 'is_popular', 
            'is_active', 'sort_order', 'provider', 'game_url'
        ]);

        $gameData['image_type'] = $request->image_type;

        if ($request->image_type === 'upload' && $request->hasFile('image')) {
            // Delete old image if exists and was uploaded
            if ($game->image_type === 'upload' && Storage::exists('public/games/' . $game->image)) {
                Storage::delete('public/games/' . $game->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/games', $imageName);
            $gameData['image'] = $imageName;
        } else {
            $gameData['image'] = $request->image_url;
        }

        $game->update($gameData);

        return redirect()->route('admin.games.index')
                        ->with('success', 'Game berhasil diperbarui!');
    }

    public function destroy(Game $game)
    {
        // Delete image if uploaded
        if ($game->image_type === 'upload' && Storage::exists('public/games/' . $game->image)) {
            Storage::delete('public/games/' . $game->image);
        }

        $game->delete();

        return redirect()->route('admin.games.index')
                        ->with('success', 'Game berhasil dihapus!');
    }

    public function togglePopular(Game $game)
    {
        $game->update(['is_popular' => !$game->is_popular]);
        
        $status = $game->is_popular ? 'ditandai sebagai populer' : 'dihapus dari populer';
        
        return redirect()->back()
                        ->with('success', "Game {$game->name} berhasil {$status}!");
    }

    public function toggleActive(Game $game)
    {
        $game->update(['is_active' => !$game->is_active]);
        
        $status = $game->is_active ? 'diaktifkan' : 'dinonaktifkan';
        
        return redirect()->back()
                        ->with('success', "Game {$game->name} berhasil {$status}!");
    }

    public function bulkStore(Request $request)
    {
        $request->validate([
            'games' => 'required|string',
            'category' => 'nullable|string',
            'provider' => 'nullable|string'
        ]);

        $gamesText = $request->games;
        $lines = explode("\n", $gamesText);
        $created = 0;

        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) continue;

            // Parse format: "Game Name|Image URL|Game URL" atau "Game Name|Image URL"
            $parts = explode('|', $line);
            
            if (count($parts) >= 2) {
                $name = trim($parts[0]);
                $imageUrl = trim($parts[1]);
                $gameUrl = isset($parts[2]) ? trim($parts[2]) : null;

                // Check if game already exists
                if (!Game::where('name', $name)->exists()) {
                    Game::create([
                        'name' => $name,
                        'image' => $imageUrl,
                        'image_type' => 'url',
                        'category' => $request->category,
                        'provider' => $request->provider,
                        'game_url' => $gameUrl,
                        'is_active' => true,
                        'is_popular' => false,
                        'sort_order' => $created
                    ]);
                    $created++;
                }
            }
        }

        return redirect()->route('admin.games.index')
                        ->with('success', "{$created} game berhasil ditambahkan secara bulk!");
    }
}
