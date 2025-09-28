<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Tampilan - Admin Panel</title>
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

    <!-- Include Sidebar dari dashboard -->
    @include('admin.components.sidebar')

    <!-- Main Content -->
    <div class="lg:ml-64 pt-16">
        <div class="py-8 px-4">
            <!-- Breadcrumb -->
            <nav class="mb-6">
                <ol class="flex text-sm text-gray-600">
                    <li><a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600">Dashboard</a></li>
                    <li class="mx-2">/</li>
                    <li><a href="#" class="hover:text-indigo-600">Settings</a></li>
                    <li class="mx-2">/</li>
                    <li class="text-gray-900 font-semibold">Tampilan</li>
                </ol>
            </nav>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg flex items-center">
                    <i class="fas fa-times-circle mr-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            <!-- Page Title -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    <i class="fas fa-palette mr-2 text-indigo-600"></i>
                    Pengaturan Tampilan Website
                </h2>
                <p class="text-gray-600">Kelola logo, warna, dan icon untuk website utama</p>
            </div>

            <form action="{{ route('admin.settings.tampilan.update') }}" method="POST" enctype="multipart/form-data" id="tampilanForm">
                @csrf
                
                <!-- Logo Settings -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">
                        <i class="fas fa-image mr-2 text-indigo-600"></i>
                        Logo Website
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Logo Utama</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4">
                                @if(isset($settings['logo']) && $settings['logo'])
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/logos/' . $settings['logo']) }}"
                                             alt="Current Logo"
                                             class="h-20 mx-auto">
                                        <p class="text-xs text-center text-gray-500 mt-2">Logo saat ini</p>
                                    </div>
                                @endif
                                <input type="file"
                                       name="logo"
                                       id="logo"
                                       accept="image/*,.svg,.webp,.bmp,.tiff,.ico"
                                       class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                <p class="text-xs text-gray-500 mt-2">Format: PNG, JPG, JPEG, GIF, SVG, WEBP, BMP, TIFF, ICO (Max: 2MB)</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preview</label>
                            <div class="border rounded-lg p-4 bg-gray-900 h-32 flex items-center justify-center">
                                <div id="logo-preview" class="text-yellow-400 text-2xl font-bold">
                                    @if(isset($settings['logo']) && $settings['logo'])
                                        <img src="{{ asset('storage/logos/' . $settings['logo']) }}" alt="Logo" class="h-12">
                                    @else
                                        RAS77
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Images Settings -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">
                        <i class="fas fa-images mr-2 text-indigo-600"></i>
                        Gambar Slider Beranda
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Upload Gambar Slider</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4">
                                <input type="file"
                                       name="slider_images[]"
                                       id="slider_images"
                                       accept="image/*"
                                       multiple
                                       class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                <p class="text-xs text-gray-500 mt-2">Format: PNG, JPG, JPEG, GIF (Max: 2MB per file). Pilih beberapa gambar untuk slider.</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preview Gambar Saat Ini</label>
                            <div class="border rounded-lg p-4 bg-gray-50 max-h-64 overflow-y-auto">
                                @if(isset($settings['slider_images']) && !empty($settings['slider_images']))
                                    <div class="grid grid-cols-2 gap-2">
                                        @foreach($settings['slider_images'] as $index => $image)
                                            <div class="relative group">
                                                <img src="{{ asset('storage/sliders/' . $image) }}"
                                                     alt="Slider {{ $index + 1 }}"
                                                     class="w-full h-20 object-cover rounded">
                                                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded flex items-center justify-center">
                                                    <button type="button"
                                                            onclick="removeSliderImage('{{ $image }}')"
                                                            class="text-red-500 hover:text-red-700">
                                                        <i class="fas fa-trash text-lg"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center text-gray-500 py-8">
                                        <i class="fas fa-images text-4xl mb-2"></i>
                                        <p class="text-sm">Belum ada gambar slider</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Hidden inputs untuk gambar yang akan dihapus -->
                    <input type="hidden" name="remove_slider_images" id="remove_slider_images" value="">
                    
                    <div class="mt-4 p-3 bg-blue-50 border border-blue-200 rounded">
                        <p class="text-sm text-blue-800">
                            <i class="fas fa-info-circle mr-1"></i>
                            <strong>Tips:</strong> Gambar slider akan ditampilkan secara bergiliran di halaman beranda.
                            Ukuran optimal: 1200x600 pixels. Jika tidak ada gambar, akan ditampilkan banner default.
                        </p>
                    </div>
                </div>

                <!-- Jackpot Play Settings -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">
                        <i class="fas fa-trophy mr-2 text-indigo-600"></i>
                        Pengaturan Jackpot Play
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Pragmatic Play Logo -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Logo Pragmatic Play</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4">
                                @if(isset($settings['pragmatic_logo']) && $settings['pragmatic_logo'])
                                    <div class="mb-3">
                                        <img src="{{ asset('storage/logos/' . $settings['pragmatic_logo']) }}"
                                             alt="Pragmatic Play Logo"
                                             class="h-16 mx-auto">
                                        <p class="text-xs text-center text-gray-500 mt-2">Logo Pragmatic Play saat ini</p>
                                    </div>
                                @endif
                                <input type="file"
                                       name="pragmatic_logo"
                                       id="pragmatic_logo"
                                       accept="image/*"
                                       class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                <p class="text-xs text-gray-500 mt-2">Format: PNG, JPG, JPEG, GIF (Max: 1MB)</p>
                            </div>
                        </div>
                        
                        <!-- Preview Jackpot Display -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preview Progressive Jackpot</label>
                            <div class="border rounded-lg p-4 bg-gray-900 flex items-center justify-center">
                                <div class="relative max-w-xs">
                                    <div class="bg-gradient-to-r from-orange-500 via-yellow-400 to-orange-500 p-1 rounded-full">
                                        <div class="bg-black rounded-full py-2 px-4">
                                            <div class="text-yellow-400 font-bold text-sm text-center">
                                                IDR 8.959.962.498
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-info-circle mr-1"></i>
                                Progressive jackpot menggunakan custom CSS animation, tidak perlu upload file.
                            </p>
                        </div>
                    </div>
                    
                    <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded">
                        <p class="text-sm text-yellow-800">
                            <i class="fas fa-lightbulb mr-1"></i>
                            <strong>Tips:</strong> Logo Pragmatic Play akan ditampilkan di atas teks "JACKPOT PLAY".
                            GIF animasi akan muncul di bawah counter jackpot untuk menarik perhatian pengunjung.
                        </p>
                    </div>
                </div>

                <!-- Color Settings -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">
                        <i class="fas fa-paint-brush mr-2 text-indigo-600"></i>
                        Pengaturan Warna
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Background Utama -->
                        <div class="lg:col-span-3">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-palette mr-1"></i>
                                Warna Background Utama Website
                            </label>
                            <div class="flex items-center space-x-3">
                                <input type="color"
                                       name="main_bg_color"
                                       id="main_bg_color"
                                       value="{{ $settings['main_bg_color'] ?? '#111827' }}"
                                       class="h-12 w-24 border rounded cursor-pointer">
                                <input type="text"
                                       id="main_bg_hex"
                                       value="{{ $settings['main_bg_color'] ?? '#111827' }}"
                                       class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                       placeholder="#111827">
                                <div class="preview-main-bg w-16 h-12 border rounded" style="background-color: {{ $settings['main_bg_color'] ?? '#111827' }};"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Background utama untuk semua halaman website</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Warna Background Header
                            </label>
                            <div class="flex items-center space-x-3">
                                <input type="color"
                                       name="header_bg_color"
                                       id="header_bg_color"
                                       value="{{ $settings['header_bg_color'] ?? '#1a1a1a' }}"
                                       class="h-10 w-20 border rounded cursor-pointer">
                                <input type="text"
                                       id="header_bg_hex"
                                       value="{{ $settings['header_bg_color'] ?? '#1a1a1a' }}"
                                       class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                       placeholder="#1a1a1a">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Warna Background Bottom Navigation
                            </label>
                            <div class="flex items-center space-x-3">
                                <input type="color"
                                       name="bottom_nav_bg_color"
                                       id="bottom_nav_bg_color"
                                       value="{{ $settings['bottom_nav_bg_color'] ?? '#1a1a1a' }}"
                                       class="h-10 w-20 border rounded cursor-pointer">
                                <input type="text"
                                       id="bottom_nav_hex"
                                       value="{{ $settings['bottom_nav_bg_color'] ?? '#1a1a1a' }}"
                                       class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                       placeholder="#1a1a1a">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Preview Colors -->
                    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-700 mb-3">Preview Warna:</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                            <div class="text-center">
                                <div class="w-full h-16 rounded mb-2 preview-main-bg" style="background-color: {{ $settings['main_bg_color'] ?? '#111827' }};"></div>
                                <span class="text-gray-600">Background Utama</span>
                            </div>
                            <div class="text-center">
                                <div class="w-full h-16 rounded mb-2" style="background-color: {{ $settings['header_bg_color'] ?? '#1a1a1a' }};"></div>
                                <span class="text-gray-600">Header</span>
                            </div>
                            <div class="text-center">
                                <div class="w-full h-16 rounded mb-2" style="background-color: {{ $settings['bottom_nav_bg_color'] ?? '#1a1a1a' }};"></div>
                                <span class="text-gray-600">Bottom Nav</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Icon Settings for Bottom Navigation -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">
                        <i class="fas fa-icons mr-2 text-indigo-600"></i>
                        Icon Bottom Navigation
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Beranda Icon -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Icon Beranda</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_beranda']) && $settings['icon_beranda'])
                                    <img src="{{ asset('storage/icons/' . $settings['icon_beranda']) }}"
                                         alt="Icon Beranda"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-home text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_beranda"
                                       accept="image/*,.svg,.webp,.bmp,.tiff,.ico"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                        
                        <!-- Promosi Icon -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Icon Promosi</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_promosi']) && $settings['icon_promosi'])
                                    <img src="{{ asset('storage/icons/' . $settings['icon_promosi']) }}"
                                         alt="Icon Promosi"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-gift text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_promosi"
                                       accept="image/*,.svg,.webp,.bmp,.tiff,.ico"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                        
                        <!-- Masuk Icon -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Icon Masuk</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_masuk']) && $settings['icon_masuk'])
                                    <img src="{{ asset('storage/icons/' . $settings['icon_masuk']) }}"
                                         alt="Icon Masuk"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-sign-in-alt text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_masuk"
                                       accept="image/*,.svg,.webp,.bmp,.tiff,.ico"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                        
                        <!-- Hub.Kami Icon -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Icon Hub.Kami</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_hubkami']) && $settings['icon_hubkami'])
                                    <img src="{{ asset('storage/icons/' . $settings['icon_hubkami']) }}"
                                         alt="Icon Hub.Kami"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-phone text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_hubkami"
                                       accept="image/*,.svg,.webp,.bmp,.tiff,.ico"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                        
                        <!-- Akun Icon -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Icon Akun Saya</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_akun']) && $settings['icon_akun'])
                                    <img src="{{ asset('storage/icons/' . $settings['icon_akun']) }}"
                                         alt="Icon Akun"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-user text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_akun"
                                       accept="image/*,.svg,.webp,.bmp,.tiff,.ico"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                    </div>
                    
                    <p class="text-xs text-gray-500 mt-4">
                        <i class="fas fa-info-circle mr-1"></i>
                        Upload icon dalam format PNG, SVG, JPG, GIF, WEBP, BMP, TIFF, atau ICO dengan background transparan untuk hasil terbaik (Max: 500KB)
                    </p>
                </div>

                <!-- Game Categories Menu Settings -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">
                        <i class="fas fa-gamepad mr-2 text-indigo-600"></i>
                        Menu Slide Game Categories
                    </h3>
                    
                    <!-- Background Color Setting -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-palette mr-1"></i>
                            Warna Background Menu Game
                        </label>
                        <div class="flex items-center space-x-3">
                            <input type="color"
                                   name="game_menu_bg_color"
                                   id="game_menu_bg_color"
                                   value="{{ $settings['game_menu_bg_color'] ?? '#1a1a1a' }}"
                                   class="h-10 w-20 border rounded cursor-pointer">
                            <input type="text"
                                   id="game_menu_bg_hex"
                                   value="{{ $settings['game_menu_bg_color'] ?? '#1a1a1a' }}"
                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                   placeholder="#1a1a1a">
                            <div class="preview-game-menu-bg w-16 h-10 border rounded" style="background-color: {{ $settings['game_menu_bg_color'] ?? '#1a1a1a' }};"></div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Background untuk menu slide game categories</p>
                    </div>
                    
                    <!-- Game Icons Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                        <!-- Hot Games -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Hot Games</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_hot_games']) && $settings['icon_hot_games'])
                                    <img src="{{ asset('storage/game-icons/' . $settings['icon_hot_games']) }}"
                                         alt="Hot Games"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-fire text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_hot_games"
                                       accept="image/*"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                        
                        <!-- Slots -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Slots</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_slots']) && $settings['icon_slots'])
                                    <img src="{{ asset('storage/game-icons/' . $settings['icon_slots']) }}"
                                         alt="Slots"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-coins text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_slots"
                                       accept="image/*"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                        
                        <!-- Race -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Race</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_race']) && $settings['icon_race'])
                                    <img src="{{ asset('storage/game-icons/' . $settings['icon_race']) }}"
                                         alt="Race"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-flag-checkered text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_race"
                                       accept="image/*"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                        
                        <!-- Togel -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Togel</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_togel']) && $settings['icon_togel'])
                                    <img src="{{ asset('storage/game-icons/' . $settings['icon_togel']) }}"
                                         alt="Togel"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-hashtag text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_togel"
                                       accept="image/*"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                        
                        <!-- Olahraga -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Olahraga</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_olahraga']) && $settings['icon_olahraga'])
                                    <img src="{{ asset('storage/game-icons/' . $settings['icon_olahraga']) }}"
                                         alt="Olahraga"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-futbol text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_olahraga"
                                       accept="image/*"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                        
                        <!-- Crash Game -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Crash Game</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_crashgame']) && $settings['icon_crashgame'])
                                    <img src="{{ asset('storage/game-icons/' . $settings['icon_crashgame']) }}"
                                         alt="Crash Game"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-chart-line text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_crashgame"
                                       accept="image/*"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                        
                        <!-- Arcade -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Arcade</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_arcade']) && $settings['icon_arcade'])
                                    <img src="{{ asset('storage/game-icons/' . $settings['icon_arcade']) }}"
                                         alt="Arcade"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-gamepad text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_arcade"
                                       accept="image/*"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                        
                        <!-- Poker -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Poker</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_poker']) && $settings['icon_poker'])
                                    <img src="{{ asset('storage/game-icons/' . $settings['icon_poker']) }}"
                                         alt="Poker"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-diamond text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_poker"
                                       accept="image/*"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                        
                        <!-- Esports -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Esports</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_esports']) && $settings['icon_esports'])
                                    <img src="{{ asset('storage/game-icons/' . $settings['icon_esports']) }}"
                                         alt="Esports"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-trophy text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_esports"
                                       accept="image/*"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                        
                        <!-- Sabung Ayam -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Sabung Ayam</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-3">
                                @if(isset($settings['icon_sabung_ayam']) && $settings['icon_sabung_ayam'])
                                    <img src="{{ asset('storage/game-icons/' . $settings['icon_sabung_ayam']) }}"
                                         alt="Sabung Ayam"
                                         class="h-8 mx-auto mb-2">
                                @else
                                    <i class="fas fa-crow text-2xl text-gray-400 block text-center mb-2"></i>
                                @endif
                                <input type="file"
                                       name="icon_sabung_ayam"
                                       accept="image/*"
                                       class="w-full text-xs text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:bg-indigo-50 file:text-indigo-700">
                            </div>
                        </div>
                    </div>
                    
                    <p class="text-xs text-gray-500 mt-4">
                        <i class="fas fa-info-circle mr-1"></i>
                        Upload icon untuk setiap kategori game dalam format PNG, SVG, JPG dengan background transparan (Max: 500KB)
                    </p>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between">
                    <a href="{{ route('admin.dashboard') }}"
                       class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                    <button type="submit"
                            class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Pengaturan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Sync color picker dengan text input
        document.getElementById('main_bg_color').addEventListener('change', function(e) {
            document.getElementById('main_bg_hex').value = e.target.value;
            // Update preview
            document.querySelectorAll('.preview-main-bg').forEach(function(el) {
                el.style.backgroundColor = e.target.value;
            });
        });
        
        document.getElementById('main_bg_hex').addEventListener('input', function(e) {
            document.getElementById('main_bg_color').value = e.target.value;
            // Update preview
            document.querySelectorAll('.preview-main-bg').forEach(function(el) {
                el.style.backgroundColor = e.target.value;
            });
        });
        
        document.getElementById('header_bg_color').addEventListener('change', function(e) {
            document.getElementById('header_bg_hex').value = e.target.value;
        });
        
        document.getElementById('header_bg_hex').addEventListener('input', function(e) {
            document.getElementById('header_bg_color').value = e.target.value;
        });
        
        document.getElementById('bottom_nav_bg_color').addEventListener('change', function(e) {
            document.getElementById('bottom_nav_hex').value = e.target.value;
        });
        
        document.getElementById('bottom_nav_hex').addEventListener('input', function(e) {
            document.getElementById('bottom_nav_bg_color').value = e.target.value;
        });
        
        // Game menu background color sync
        document.getElementById('game_menu_bg_color').addEventListener('change', function(e) {
            document.getElementById('game_menu_bg_hex').value = e.target.value;
            // Update preview
            document.querySelectorAll('.preview-game-menu-bg').forEach(function(el) {
                el.style.backgroundColor = e.target.value;
            });
        });
        
        document.getElementById('game_menu_bg_hex').addEventListener('input', function(e) {
            document.getElementById('game_menu_bg_color').value = e.target.value;
            // Update preview
            document.querySelectorAll('.preview-game-menu-bg').forEach(function(el) {
                el.style.backgroundColor = e.target.value;
            });
        });
        
        // Preview logo
        document.getElementById('logo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('logo-preview').innerHTML =
                        `<img src="${e.target.result}" alt="Logo Preview" class="h-12">`;
                }
                reader.readAsDataURL(file);
            }
        });

        // Preview Pragmatic Play logo
        const pragmaticLogoInput = document.getElementById('pragmatic_logo');
        if (pragmaticLogoInput) {
            pragmaticLogoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Find the preview container for pragmatic logo
                        const container = pragmaticLogoInput.closest('.border-2').querySelector('.mb-3');
                        if (container) {
                            container.querySelector('img').src = e.target.result;
                        } else {
                            // Create new preview if none exists
                            const newPreview = document.createElement('div');
                            newPreview.className = 'mb-3';
                            newPreview.innerHTML = `
                                <img src="${e.target.result}" alt="Pragmatic Play Logo" class="h-16 mx-auto">
                                <p class="text-xs text-center text-gray-500 mt-2">Logo Pragmatic Play (Preview)</p>
                            `;
                            pragmaticLogoInput.parentNode.insertBefore(newPreview, pragmaticLogoInput);
                        }
                    }
                    reader.readAsDataURL(file);
                }
            });
        }

        // Preview Jackpot GIF
        const jackpotGifInput = document.getElementById('jackpot_gif');
        if (jackpotGifInput) {
            jackpotGifInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Find the preview container for jackpot gif
                        const container = jackpotGifInput.closest('.border-2').querySelector('.mb-3');
                        if (container) {
                            container.querySelector('img').src = e.target.result;
                        } else {
                            // Create new preview if none exists
                            const newPreview = document.createElement('div');
                            newPreview.className = 'mb-3';
                            newPreview.innerHTML = `
                                <img src="${e.target.result}" alt="Jackpot GIF" class="h-20 mx-auto">
                                <p class="text-xs text-center text-gray-500 mt-2">GIF Jackpot (Preview)</p>
                            `;
                            jackpotGifInput.parentNode.insertBefore(newPreview, jackpotGifInput);
                        }
                    }
                    reader.readAsDataURL(file);
                }
            });
        }

        // Preview slider images
        document.getElementById('slider_images').addEventListener('change', function(e) {
            const files = e.target.files;
            const previewContainer = document.querySelector('.grid.grid-cols-2.gap-2');
            
            if (files && files.length > 0) {
                // Clear empty state if exists
                const emptyState = document.querySelector('.text-center.text-gray-500.py-8');
                if (emptyState) {
                    emptyState.remove();
                }
                
                // Add new previews
                Array.from(files).forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const previewDiv = document.createElement('div');
                            previewDiv.className = 'relative group';
                            previewDiv.innerHTML = `
                                <img src="${e.target.result}"
                                     alt="New Image"
                                     class="w-full h-20 object-cover rounded border-2 border-green-500">
                                <div class="absolute top-1 right-1 bg-green-500 text-white text-xs px-1 rounded">NEW</div>
                            `;
                            
                            if (previewContainer) {
                                previewContainer.appendChild(previewDiv);
                            }
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }
        });

        // Function untuk menghapus gambar slider
        function removeSliderImage(imageName) {
            if (confirm('Yakin ingin menghapus gambar ini?')) {
                const removeInput = document.getElementById('remove_slider_images');
                const currentRemoves = removeInput.value ? removeInput.value.split(',') : [];
                currentRemoves.push(imageName);
                removeInput.value = currentRemoves.join(',');
                
                // Hide the image element
                const imageElements = document.querySelectorAll('img[src*="' + imageName + '"]');
                imageElements.forEach(img => {
                    const parentDiv = img.closest('.relative.group');
                    if (parentDiv) {
                        parentDiv.style.opacity = '0.5';
                        parentDiv.querySelector('.absolute').innerHTML = '<span class="text-red-500"><i class="fas fa-times"></i> Akan Dihapus</span>';
                    }
                });
            }
        }

        // Make removeSliderImage global
        window.removeSliderImage = removeSliderImage;

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
