<!-- Sidebar -->
<aside id="sidebar" class="fixed left-0 top-0 bottom-0 w-64 bg-gray-900 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-30 pt-16">
    <div class="h-full overflow-y-auto sidebar-scroll">
        <nav class="p-4 space-y-1">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600' : '' }} rounded-lg hover:bg-indigo-700 transition-colors group">
                <i class="fas fa-home w-5 mr-3"></i>
                <span class="font-medium">Dashboard</span>
            </a>

            <!-- User Management -->
            <div class="menu-group">
                <button onclick="toggleSubmenu('userSubmenu')" class="w-full flex items-center justify-between px-4 py-3 rounded-lg hover:bg-gray-800 transition-colors group">
                    <div class="flex items-center">
                        <i class="fas fa-users w-5 mr-3"></i>
                        <span class="font-medium">User</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform" id="userSubmenu-icon"></i>
                </button>
                <div id="userSubmenu" class="hidden mt-1 ml-8 space-y-1">
                    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-800 text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-list text-xs mr-2"></i> Data User
                    </a>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-800 text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-university text-xs mr-2"></i> Data Bank
                    </a>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-800 text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-plus text-xs mr-2"></i> Tambah User
                    </a>
                </div>
            </div>

            <!-- Rekening -->
            <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition-colors group">
                <i class="fas fa-credit-card w-5 mr-3"></i>
                <span class="font-medium">Rekening</span>
            </a>

            <!-- Games -->
            <div class="menu-group">
                <button onclick="toggleSubmenu('gamesSubmenu')" class="w-full flex items-center justify-between px-4 py-3 rounded-lg hover:bg-gray-800 transition-colors group {{ request()->is('admin/games*') ? 'bg-gray-800' : '' }}">
                    <div class="flex items-center">
                        <i class="fas fa-gamepad w-5 mr-3"></i>
                        <span class="font-medium">Games</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform {{ request()->is('admin/games*') ? 'rotate-180' : '' }}" id="gamesSubmenu-icon"></i>
                </button>
                <div id="gamesSubmenu" class="{{ request()->is('admin/games*') ? '' : 'hidden' }} mt-1 ml-8 space-y-1">
                    <a href="{{ route('admin.games.index') }}" class="block px-4 py-2 rounded hover:bg-gray-800 text-sm {{ request()->routeIs('admin.games.index') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white' }}">
                        <i class="fas fa-dice text-xs mr-2"></i> List Games
                    </a>
                    <a href="{{ route('admin.games.create') }}" class="block px-4 py-2 rounded hover:bg-gray-800 text-sm {{ request()->routeIs('admin.games.create') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white' }}">
                        <i class="fas fa-plus text-xs mr-2"></i> Tambah Game
                    </a>
                </div>
            </div>

            <!-- Transaksi -->
            <div class="menu-group">
                <button onclick="toggleSubmenu('transaksiSubmenu')" class="w-full flex items-center justify-between px-4 py-3 rounded-lg hover:bg-gray-800 transition-colors group">
                    <div class="flex items-center">
                        <i class="fas fa-exchange-alt w-5 mr-3"></i>
                        <span class="font-medium">Transaksi</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform" id="transaksiSubmenu-icon"></i>
                </button>
                <div id="transaksiSubmenu" class="hidden mt-1 ml-8 space-y-1">
                    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-800 text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-download text-xs mr-2"></i> Deposit
                    </a>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-800 text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-upload text-xs mr-2"></i> Withdraw
                    </a>
                </div>
            </div>

            <!-- Promosi -->
            <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition-colors group">
                <i class="fas fa-bullhorn w-5 mr-3"></i>
                <span class="font-medium">Promosi</span>
            </a>

            <!-- Memo -->
            <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition-colors group">
                <i class="fas fa-envelope w-5 mr-3"></i>
                <span class="font-medium">Memo</span>
                <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">3</span>
            </a>

            <!-- Refferal -->
            <a href="#" class="flex items-center px-4 py-3 rounded-lg hover:bg-gray-800 transition-colors group">
                <i class="fas fa-user-friends w-5 mr-3"></i>
                <span class="font-medium">Refferal</span>
            </a>

            <!-- Settings -->
            <div class="menu-group">
                <button onclick="toggleSubmenu('settingSubmenu')" class="w-full flex items-center justify-between px-4 py-3 rounded-lg hover:bg-gray-800 transition-colors group {{ request()->is('admin/settings/*') ? 'bg-gray-800' : '' }}">
                    <div class="flex items-center">
                        <i class="fas fa-cog w-5 mr-3"></i>
                        <span class="font-medium">Setting</span>
                    </div>
                    <i class="fas fa-chevron-down text-xs transition-transform {{ request()->is('admin/settings/*') ? 'rotate-180' : '' }}" id="settingSubmenu-icon"></i>
                </button>
                <div id="settingSubmenu" class="{{ request()->is('admin/settings/*') ? '' : 'hidden' }} mt-1 ml-8 space-y-1">
                    <a href="{{ route('admin.settings.tampilan') }}" class="block px-4 py-2 rounded hover:bg-gray-800 text-sm {{ request()->routeIs('admin.settings.tampilan') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:text-white' }}">
                        <i class="fas fa-palette text-xs mr-2"></i> Tampilan
                    </a>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-800 text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-paint-brush text-xs mr-2"></i> Warna & Icon
                    </a>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-800 text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-image text-xs mr-2"></i> Gambar
                    </a>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-800 text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-sliders-h text-xs mr-2"></i> Pengaturan Umum
                    </a>
                </div>
            </div>
        </nav>
    </div>
</aside>

<!-- Overlay untuk mobile -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden lg:hidden"></div>