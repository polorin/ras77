<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Game - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-scroll::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.1);
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 4px;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed top-0 left-0 right-0 z-40">
        <div class="px-4">
            <div class="flex justify-between items-center py-3">
                <div class="flex items-center">
                    <button id="sidebarToggle" class="lg:hidden mr-3 text-gray-600 hover:text-gray-800 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <i class="fas fa-shield-alt text-2xl text-indigo-600 mr-3"></i>
                    <h1 class="text-xl font-bold text-gray-800">Admin Panel</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600 hidden sm:block">
                        <i class="fas fa-user mr-1"></i>
                        {{ session('admin_username') }}
                    </span>
                    <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded-lg hover:bg-red-600 transition-colors text-sm">
                            <i class="fas fa-sign-out-alt mr-1"></i>
                            <span class="hidden sm:inline">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Include Sidebar -->
    @include('admin.components.sidebar')

    <!-- Main Content -->
    <div class="lg:ml-64 pt-16">
        <div class="py-8 px-4">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <ol class="flex text-sm text-gray-600">
                    <li><a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600">Dashboard</a></li>
                    <li class="mx-2">/</li>
                    <li><a href="{{ route('admin.games.index') }}" class="hover:text-indigo-600">Kelola Games</a></li>
                    <li class="mx-2">/</li>
                    <li class="text-gray-900 font-semibold">Tambah Game</li>
                </ol>
            </nav>

            <!-- Page Title -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    <i class="fas fa-plus mr-2 text-indigo-600"></i>
                    Tambah Game Baru
                </h2>
                <p class="text-gray-600">Tambahkan game baru dengan upload gambar atau gunakan URL</p>
            </div>

            <!-- Form -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <form action="{{ route('admin.games.store') }}" method="POST" enctype="multipart/form-data" id="gameForm">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Game Info -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-gamepad mr-1"></i>
                                    Nama Game *
                                </label>
                                <input type="text" 
                                       name="name" 
                                       value="{{ old('name') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                       placeholder="Contoh: Sweet Bonanza"
                                       required>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-align-left mr-1"></i>
                                    Deskripsi
                                </label>
                                <textarea name="description" 
                                          rows="3"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                          placeholder="Deskripsi singkat tentang game">{{ old('description') }}</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-tags mr-1"></i>
                                    Kategori
                                </label>
                                <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $key => $label)
                                        <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-building mr-1"></i>
                                    Provider
                                </label>
                                <input type="text" 
                                       name="provider" 
                                       value="{{ old('provider') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                       placeholder="Contoh: Pragmatic Play">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-link mr-1"></i>
                                    URL Game
                                </label>
                                <input type="url" 
                                       name="game_url" 
                                       value="{{ old('game_url') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                       placeholder="https://game.example.com/game-url">
                            </div>
                        </div>
                        
                        <!-- Image Settings -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-image mr-1"></i>
                                    Tipe Gambar *
                                </label>
                                <div class="flex space-x-4">
                                    <label class="flex items-center">
                                        <input type="radio" name="image_type" value="upload" class="mr-2" checked onchange="toggleImageInput()">
                                        <i class="fas fa-upload mr-1"></i>
                                        Upload File
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="image_type" value="url" class="mr-2" onchange="toggleImageInput()">
                                        <i class="fas fa-link mr-1"></i>
                                        URL Link
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Upload Image -->
                            <div id="uploadSection">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Upload Gambar Game</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4">
                                    <input type="file"
                                           name="image"
                                           id="image"
                                           accept="image/*"
                                           class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                    <p class="text-xs text-gray-500 mt-2">Format: PNG, JPG, JPEG, GIF, WEBP (Max: 2MB)</p>
                                </div>
                            </div>
                            
                            <!-- URL Image -->
                            <div id="urlSection" class="hidden">
                                <label class="block text-sm font-medium text-gray-700 mb-2">URL Gambar Game</label>
                                <input type="url" 
                                       name="image_url" 
                                       id="image_url"
                                       value="{{ old('image_url') }}"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                       placeholder="https://example.com/game-image.jpg">
                                <p class="text-xs text-gray-500 mt-1">Masukkan URL gambar game (JPG, PNG, GIF, WEBP)</p>
                            </div>
                            
                            <!-- Preview -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Preview Gambar</label>
                                <div class="border rounded-lg p-4 bg-gray-50 h-48 flex items-center justify-center">
                                    <div id="image-preview" class="text-gray-400 text-center">
                                        <i class="fas fa-image text-4xl mb-2"></i>
                                        <p>Preview gambar akan muncul di sini</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Settings -->
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-sort-numeric-up mr-1"></i>
                                Urutan Tampil
                            </label>
                            <input type="number" 
                                   name="sort_order" 
                                   value="{{ old('sort_order', 0) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                   min="0">
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_active" value="1" class="mr-2" {{ old('is_active', true) ? 'checked' : '' }}>
                                <i class="fas fa-eye mr-1"></i>
                                Game Aktif
                            </label>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_popular" value="1" class="mr-2" {{ old('is_popular') ? 'checked' : '' }}>
                                <i class="fas fa-star mr-1"></i>
                                Tandai Sebagai Populer
                            </label>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="mt-8 flex justify-between">
                        <a href="{{ route('admin.games.index') }}"
                           class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali
                        </a>
                        <button type="submit"
                                class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Game
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function toggleImageInput() {
            const imageType = document.querySelector('input[name="image_type"]:checked').value;
            const uploadSection = document.getElementById('uploadSection');
            const urlSection = document.getElementById('urlSection');
            
            if (imageType === 'upload') {
                uploadSection.classList.remove('hidden');
                urlSection.classList.add('hidden');
                document.getElementById('image_url').removeAttribute('required');
                document.getElementById('image').setAttribute('required', 'required');
            } else {
                uploadSection.classList.add('hidden');
                urlSection.classList.remove('hidden');
                document.getElementById('image').removeAttribute('required');
                document.getElementById('image_url').setAttribute('required', 'required');
            }
        }

        // Preview image upload
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-preview').innerHTML =
                        `<img src="${e.target.result}" alt="Preview" class="max-h-44 max-w-full object-contain rounded">`;
                }
                reader.readAsDataURL(file);
            }
        });

        // Preview URL image
        document.getElementById('image_url').addEventListener('input', function(e) {
            const url = e.target.value;
            if (url) {
                document.getElementById('image-preview').innerHTML =
                    `<img src="${url}" alt="Preview" class="max-h-44 max-w-full object-contain rounded" onerror="this.parentElement.innerHTML='<div class=\\'text-red-400 text-center\\'><i class=\\'fas fa-exclamation-triangle text-4xl mb-2\\'></i><p>Gagal memuat gambar</p></div>'">`;
            }
        });

        // Toggle sidebar mobile
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (sidebarToggle && sidebar && sidebarOverlay) {
            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
                sidebarOverlay.classList.toggle('hidden');
            });

            sidebarOverlay.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            });
        }

        // Toggle submenu
        function toggleSubmenu(submenuId) {
            const submenu = document.getElementById(submenuId);
            const icon = document.getElementById(submenuId + '-icon');
            
            if (submenu && icon) {
                submenu.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            }
        }
    </script>
</body>
</html>