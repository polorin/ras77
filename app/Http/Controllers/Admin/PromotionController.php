<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::orderByDesc('created_at')->paginate(20);

        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        $types = Promotion::typeOptions();
        $categories = Promotion::categoryOptions();

        return view('admin.promotions.create', compact('types', 'categories'));
    }

    public function store(Request $request)
    {
        $types = array_keys(Promotion::typeOptions());
        $categories = array_keys(Promotion::categoryOptions());

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:' . implode(',', $types),
            'category' => 'required|in:' . implode(',', $categories),
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'is_active' => 'required|boolean',
        ]);

        $slug = $this->generateUniqueSlug($validated['title']);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $slug . '-' . time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('promotions', $image, $imageName);
            $imagePath = $imageName;
        }

        Promotion::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'type' => $validated['type'],
            'category' => $validated['category'],
            'description' => $validated['description'] ?? null,
            'image' => $imagePath,
            'is_active' => (bool) $validated['is_active'],
        ]);

        return redirect()->route('admin.promosi.index')->with('success', 'Promosi berhasil dibuat.');
    }

    public function edit(Promotion $promosi)
    {
        $types = Promotion::typeOptions();
        $categories = Promotion::categoryOptions();

        return view('admin.promotions.edit', [
            'promotion' => $promosi,
            'types' => $types,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Promotion $promosi)
    {
        $types = array_keys(Promotion::typeOptions());
        $categories = array_keys(Promotion::categoryOptions());

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:' . implode(',', $types),
            'category' => 'required|in:' . implode(',', $categories),
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'is_active' => 'required|boolean',
        ]);

        $slug = $promosi->slug;
        if ($promosi->title !== $validated['title']) {
            $slug = $this->generateUniqueSlug($validated['title'], $promosi->id);
        }

        $imagePath = $promosi->image;
        if ($request->hasFile('image')) {
            if ($imagePath && Storage::disk('public')->exists('promotions/' . $imagePath)) {
                Storage::disk('public')->delete('promotions/' . $imagePath);
            }

            $image = $request->file('image');
            $imageName = $slug . '-' . time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('promotions', $image, $imageName);
            $imagePath = $imageName;
        }

        $promosi->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'type' => $validated['type'],
            'category' => $validated['category'],
            'description' => $validated['description'] ?? null,
            'image' => $imagePath,
            'is_active' => (bool) $validated['is_active'],
        ]);

        return redirect()->route('admin.promosi.index')->with('success', 'Promosi berhasil diperbarui.');
    }

    public function destroy(Promotion $promosi)
    {
        if ($promosi->image && Storage::disk('public')->exists('promotions/' . $promosi->image)) {
            Storage::disk('public')->delete('promotions/' . $promosi->image);
        }

        $promosi->delete();

        return redirect()->route('admin.promosi.index')->with('success', 'Promosi berhasil dihapus.');
    }

    protected function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($title);
        if (empty($baseSlug)) {
            $baseSlug = Str::random(8);
        }

        $slug = $baseSlug;
        $counter = 1;

        while ($this->slugExists($slug, $ignoreId)) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    protected function slugExists(string $slug, ?int $ignoreId = null): bool
    {
        $query = Promotion::where('slug', $slug);

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        return $query->exists();
    }
}
