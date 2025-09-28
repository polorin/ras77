<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Panel Kontrol</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom scrollbar untuk sidebar */
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
                    <!-- Mobile Menu Toggle -->
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
        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <!-- Welcome Card -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">
                <i class="fas fa-home mr-2 text-indigo-600"></i>
                Selamat Datang di Dashboard Admin
            </h2>
            <p class="text-gray-600">Panel kontrol untuk mengelola website utama.</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-full">
                        <i class="fas fa-users text-blue-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Users</h3>
                        <p class="text-2xl font-bold text-blue-600">0</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-full">
                        <i class="fas fa-chart-line text-green-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Analytics</h3>
                        <p class="text-2xl font-bold text-green-600">0</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-100 rounded-full">
                        <i class="fas fa-cog text-yellow-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Settings</h3>
                        <p class="text-2xl font-bold text-yellow-600">Ready</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-100 rounded-full">
                        <i class="fas fa-shield-alt text-purple-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-800">Security</h3>
                        <p class="text-2xl font-bold text-purple-600">Active</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">
                <i class="fas fa-bolt mr-2 text-indigo-600"></i>
                Quick Actions
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <button class="p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-indigo-500 hover:bg-indigo-50 transition-colors">
                    <i class="fas fa-plus text-2xl text-gray-400 mb-2"></i>
                    <p class="text-gray-600">Add New Content</p>
                </button>
                <button class="p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-indigo-500 hover:bg-indigo-50 transition-colors">
                    <i class="fas fa-edit text-2xl text-gray-400 mb-2"></i>
                    <p class="text-gray-600">Edit Settings</p>
                </button>
                <button class="p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-indigo-500 hover:bg-indigo-50 transition-colors">
                    <i class="fas fa-chart-bar text-2xl text-gray-400 mb-2"></i>
                    <p class="text-gray-600">View Reports</p>
                </button>
            </div>
        </div>
        </div>
    </div>

    <!-- JavaScript untuk toggle sidebar dan submenu -->
    <script>
        // Toggle sidebar mobile
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
            sidebarOverlay.classList.toggle('hidden');
        });

        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });

        // Toggle submenu
        function toggleSubmenu(submenuId) {
            const submenu = document.getElementById(submenuId);
            const icon = document.getElementById(submenuId + '-icon');
            
            submenu.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        // Tutup sidebar saat klik link di mobile
        const sidebarLinks = document.querySelectorAll('#sidebar a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth < 1024) {
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                }
            });
        });

        // Responsive check
        function checkWindowSize() {
            if (window.innerWidth >= 1024) {
                sidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            }
        }

        window.addEventListener('resize', checkWindowSize);
        checkWindowSize();
    </script>
</body>
</html>