@php
    $isEdit = isset($promotion);
    $selectedType = old('type', $isEdit ? $promotion->type : App\Models\Promotion::TYPE_PROMOTION);
    $selectedCategory = old('category', $isEdit ? $promotion->category : array_key_first($categories));
    $isActiveValue = old('is_active', $isEdit ? (int) $promotion->is_active : 1);
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Judul Promosi</label>
        <input type="text" name="title" value="{{ old('title', $isEdit ? $promotion->title : '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="Contoh: Bonus Member Baru 100%">
        @error('title')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Konten</label>
        <select name="type" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
            @foreach($types as $value => $label)
                <option value="{{ $value }}" {{ $selectedType === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        @error('type')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori Filter</label>
        <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
            @foreach($categories as $value => $label)
                <option value="{{ $value }}" {{ $selectedCategory === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        @error('category')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
        <div class="flex items-center space-x-3">
            <input type="hidden" name="is_active" value="0">
            <label class="inline-flex items-center cursor-pointer select-none">
                <input type="checkbox" name="is_active" value="1" class="w-5 h-5 text-indigo-600 border-gray-300 rounded" {{ (int) $isActiveValue === 1 ? 'checked' : '' }}>
                <span class="ml-2 text-sm text-gray-700">Aktifkan promosi</span>
            </label>
        </div>
        @error('is_active')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mb-6">
    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Detail</label>
    <textarea name="description" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500" placeholder="Rincian promosi ditampilkan saat pengguna klik tombol detail.">{{ old('description', $isEdit ? $promotion->description : '') }}</textarea>
    @error('description')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-8">
    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Promosi</label>
    <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
    <p class="text-xs text-gray-500 mt-2">Format yang didukung: JPG, PNG, WEBP, SVG maks 4MB.</p>
    @error('image')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror

    @if($isEdit && $promotion->image_url)
        <div class="mt-4">
            <span class="block text-sm font-medium text-gray-700 mb-2">Pratinjau Saat Ini</span>
            <img src="{{ $promotion->image_url }}" alt="{{ $promotion->title }}" class="w-full max-w-md rounded-lg border border-gray-200">
        </div>
    @endif
</div>
