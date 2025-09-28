<!-- Header Component -->
<header id="main-header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" 
    style="background-color: {{ $settings['header_bg_color'] ?? '#1a1a1a' }};">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Logo Tengah -->
            <div class="flex-1 flex justify-center">
                <a href="{{ route('home') }}" class="inline-block">
                    @if(!empty($settings['logo']))
                        <img src="{{ asset('storage/logos/' . $settings['logo']) }}"
                             alt="RAS77"
                             class="h-10 md:h-12 object-contain">
                    @else
                        <div class="text-2xl md:text-3xl font-bold text-yellow-400 tracking-wider">
                            RAS77
                        </div>
                    @endif
                </a>
            </div>
            
            <!-- Toggle Menu Kanan -->
            <div class="absolute right-4">
                <button id="menuToggle" class="text-white hover:text-yellow-400 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Slide Menu -->
    <div id="slideMenu" class="fixed top-0 right-0 h-full w-64 bg-gray-900 transform translate-x-full transition-transform duration-300 z-50 shadow-xl">
        <div class="p-4">
            <button id="closeMenu" class="absolute top-4 right-4 text-gray-400 hover:text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            
            <div class="mt-12">
                <h3 class="text-yellow-400 font-bold mb-4">Menu</h3>
                <!-- Menu items akan ditambahkan nanti -->
                <div class="space-y-2">
                    <a href="#" class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded">
                        Menu Item 1
                    </a>
                    <a href="#" class="block px-4 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded">
                        Menu Item 2
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Overlay -->
    <div id="menuOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
</header>

<script>
    const menuToggle = document.getElementById('menuToggle');
    const closeMenu = document.getElementById('closeMenu');
    const slideMenu = document.getElementById('slideMenu');
    const menuOverlay = document.getElementById('menuOverlay');
    
    menuToggle.addEventListener('click', () => {
        slideMenu.classList.remove('translate-x-full');
        menuOverlay.classList.remove('hidden');
    });
    
    const closeMenuFunc = () => {
        slideMenu.classList.add('translate-x-full');
        menuOverlay.classList.add('hidden');
    };
    
    closeMenu.addEventListener('click', closeMenuFunc);
    menuOverlay.addEventListener('click', closeMenuFunc);
</script>