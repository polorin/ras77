<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Games - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @if(!empty($settings['favicon']))
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/favicons/' . $settings['favicon']) }}">
    @endif
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
                    <li class="text-gray-900 font-semibold">Kelola Games</li>
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
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">
                            <i class="fas fa-gamepad mr-2 text-indigo-600"></i>
                            Kelola Games
                        </h2>
                        <p class="text-gray-600">Manage semua games untuk website dan tandai sebagai populer</p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.games.create') }}"
                           class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                            <i class="fas fa-plus mr-2"></i>
                            Tambah Game
                        </a>
                        <button onclick="toggleBulkModal()"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                            <i class="fas fa-upload mr-2"></i>
                            Bulk Upload
                        </button>
                    </div>
                </div>
            </div>

            <!-- Games Table -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Game
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kategori
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Provider
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Populer
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($games as $game)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-16 w-16">
                                                @if($game->image_type === 'url')
                                                    <img src="{{ $game->image }}" alt="{{ $game->name }}" class="h-16 w-16 rounded-lg object-cover">
                                                @else
                                                    <img src="{{ asset('storage/games/' . $game->image) }}" alt="{{ $game->name }}" class="h-16 w-16 rounded-lg object-cover">
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $game->name }}</div>
                                                @if($game->image_type === 'url')
                                                    <div class="text-xs text-blue-600">
                                                        <i class="fas fa-link mr-1"></i>URL
                                                    </div>
                                                @else
                                                    <div class="text-xs text-green-600">
                                                        <i class="fas fa-upload mr-1"></i>Upload
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ ucwords(str_replace('_', ' ', $game->category ?? 'Umum')) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $game->provider ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('admin.games.toggle-active', $game) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-sm px-3 py-1 rounded-full font-medium transition-colors {{ $game->is_active ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-red-100 text-red-800 hover:bg-red-200' }}">
                                                @if($game->is_active)
                                                    <i class="fas fa-check mr-1"></i>Aktif
                                                @else
                                                    <i class="fas fa-times mr-1"></i>Nonaktif
                                                @endif
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('admin.games.toggle-popular', $game) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-sm px-3 py-1 rounded-full font-medium transition-colors {{ $game->is_popular ? 'bg-yellow-100 text-yellow-800 hover:bg-yellow-200' : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }}">
                                                @if($game->is_popular)
                                                    <i class="fas fa-star mr-1"></i>Populer
                                                @else
                                                    <i class="far fa-star mr-1"></i>Biasa
                                                @endif
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.games.edit', $game) }}"
                                               class="text-indigo-600 hover:text-indigo-900">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.games.destroy', $game) }}" method="POST" class="inline"
                                                  onsubmit="return confirm('Yakin ingin menghapus game {{ $game->name }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                        <i class="fas fa-gamepad text-4xl mb-4 text-gray-300"></i>
                                        <p class="text-lg font-medium">Belum ada games</p>
                                        <p class="text-sm">Tambahkan games pertama Anda untuk memulai</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                @if($games->hasPages())
                    <div class="px-6 py-4 bg-gray-50">
                        {{ $games->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bulk Upload Modal -->
    <div id="bulkModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900">
                        <i class="fas fa-upload mr-2 text-indigo-600"></i>
                        Bulk Upload Games
                    </h3>
                    <button onclick="toggleBulkModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <form action="{{ route('admin.games.bulk-store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Format Input Games</label>
                        <div class="bg-gray-50 p-3 rounded text-sm text-gray-600 mb-3">
                            <strong>Format per baris:</strong><br>
                            <code>Nama Game|URL Gambar|URL Game (opsional)</code><br><br>
                            <strong>Contoh:</strong><br>
                            <code>Sweet Bonanza|https://example.com/sweet-bonanza.jpg|https://game.example.com/sweet-bonanza</code><br>
                            <code>Mahjong Ways|https://example.com/mahjong.png</code>
                        </div>
                        <textarea name="games" 
                                  rows="10" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                  placeholder="Masukkan data games, satu game per baris..."></textarea>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori Default</label>
                            <select name="category" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                                <option value="">Pilih Kategori</option>
                                <option value="hot_games">Hot Games</option>
                                <option value="slots">Slots</option>
                                <option value="race">Race</option>
                                <option value="togel">Togel</option>
                                <option value="olahraga">Olahraga</option>
                                <option value="crashgame">Crash Game</option>
                                <option value="arcade">Arcade</option>
                                <option value="poker">Poker</option>
                                <option value="esports">Esports</option>
                                <option value="sabung_ayam">Sabung Ayam</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Provider Default</label>
                            <input type="text" 
                                   name="provider" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                                   placeholder="Contoh: Pragmatic Play">
                        </div>
                    </div>
                    
                    <div class="flex justify-end space-x-3">
                        <button type="button" 
                                onclick="toggleBulkModal()"
                                class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                            Batal
                        </button>
                        <button type="submit" 
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                            <i class="fas fa-upload mr-2"></i>
                            Upload Games
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Toggle bulk modal
        function toggleBulkModal() {
            const modal = document.getElementById('bulkModal');
            modal.classList.toggle('hidden');
        }

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

        // Close modal on ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modal = document.getElementById('bulkModal');
                if (!modal.classList.contains('hidden')) {
                    toggleBulkModal();
                }
            }
        });
    </script>
</body>
</html>