<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Promosi - Admin Panel</title>
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

    @include('admin.components.sidebar')

    <div class="lg:ml-64 pt-16">
        <div class="py-8 px-4">
            <nav class="mb-6">
                <ol class="flex text-sm text-gray-600">
                    <li><a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600">Dashboard</a></li>
                    <li class="mx-2">/</li>
                    <li><a href="{{ route('admin.promosi.index') }}" class="hover:text-indigo-600">Promosi</a></li>
                    <li class="mx-2">/</li>
                    <li class="text-gray-900 font-semibold">Edit</li>
                </ol>
            </nav>

            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    <i class="fas fa-edit mr-2 text-indigo-600"></i>
                    Edit Promosi
                </h2>
                <p class="text-gray-600">Perbarui informasi promosi untuk memastikan data tetap akurat.</p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <form action="{{ route('admin.promosi.update', $promotion) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('admin.promotions._form', ['promotion' => $promotion])

                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs text-gray-500">Slug unik: <span class="font-medium text-gray-700">{{ $promotion->slug }}</span></p>
                        </div>
                        <div class="flex space-x-3">
                            <a href="{{ route('admin.promosi.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors">Batal</a>
                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                                <i class="fas fa-save mr-2"></i>
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
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
