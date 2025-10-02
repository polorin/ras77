<!-- Header Component -->
@php
    $sidebarMenuColor = $settings['sidebar_menu_bg_color'] ?? '#d77f03';
    $sidebarMenuOpacitySetting = $settings['sidebar_menu_bg_opacity'] ?? 0.7;
    $sidebarMenuOpacity = is_numeric($sidebarMenuOpacitySetting) ? max(0, min(1, (float) $sidebarMenuOpacitySetting)) : 0.7;
    $sidebarMenuHex = ltrim($sidebarMenuColor ?? '', '#');
    if (strlen($sidebarMenuHex) === 3) {
        $sidebarMenuHex = preg_replace('/(.)/', '$1$1', $sidebarMenuHex);
    }
    $sidebarMenuRgb = [215, 127, 3];
    if (strlen($sidebarMenuHex) === 6) {
        $sidebarMenuRgb = [
            hexdec(substr($sidebarMenuHex, 0, 2)),
            hexdec(substr($sidebarMenuHex, 2, 2)),
            hexdec(substr($sidebarMenuHex, 4, 2)),
        ];
    }
    $sidebarMenuBgStyle = sprintf('rgba(%d, %d, %d, %.2f)', $sidebarMenuRgb[0], $sidebarMenuRgb[1], $sidebarMenuRgb[2], $sidebarMenuOpacity);
@endphp
<header id="main-header" class="fixed inset-x-0 top-0 z-50 w-full shadow-lg transition-colors duration-300"
    style="background-color: {{ $settings['header_bg_color'] ?? '#1a1a1a' }}; padding-top: env(safe-area-inset-top);">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <!-- Logo Tengah -->
            <div class="flex-1 flex items-center justify-center">
                <a href="{{ auth()->check() ? route('member.home') : route('home') }}" class="inline-block">
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
                <div class="flex items-center gap-3">
                    <button type="button" class="text-white hover:text-yellow-400 focus:outline-none">
                        <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/layout/bell.svg?v=20250528" alt="Notifikasi" class="h-6 w-6">
                    </button>
                    <button id="menuToggle" class="text-white hover:text-yellow-400 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Slide Menu -->
    <div id="slideMenu" class="fixed top-0 right-0 h-full w-80 transform translate-x-full transition-transform duration-300 z-50 shadow-2xl"
        style="background-color: {{ $settings['sidebar_bg_color'] ?? '#0f0f0f' }};">
        <div class="flex flex-col h-full">
            <!-- Header dengan logo dan close button -->
            <div class="flex items-center justify-between p-4 border-b border-gray-800">
                <div class="flex items-center">
                    @if(!empty($settings['logo']))
                        <img src="{{ asset('storage/logos/' . $settings['logo']) }}"
                             alt="RAS77"
                             class="h-8 object-contain">
                    @else
                        <div class="text-xl font-bold text-yellow-400 tracking-wider">
                            RAS77
                        </div>
                    @endif
                </div>
                <button id="closeMenu" class="text-white hover:text-orange-400 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Menu Content -->
            <div class="flex-1 overflow-y-auto px-4 py-6">
                @guest
                    <!-- Tombol MASUK dengan background orange -->
                    <button type="button" data-login-modal-trigger
                            class="w-full text-white font-bold py-3 px-4 rounded-lg mb-3 transition-colors text-sm uppercase tracking-wide hover:opacity-90"
                            style="background-color: {{ $sidebarMenuBgStyle }};">
                        MASUK
                    </button>

                    <!-- Tombol DAFTAR dengan background transparan dan border orange -->
                    <button onclick="window.location.href='{{ route('register') }}'"
                            class="w-full bg-transparent hover:bg-orange-500 hover:bg-opacity-10 text-orange-500 font-bold py-3 px-4 border-2 border-orange-500 rounded-lg mb-6 transition-colors text-sm uppercase tracking-wide">
                        DAFTAR
                    </button>
                @else
                    <div class="mb-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="text-left text-white font-semibold text-lg tracking-wide uppercase">
                                {{ strtoupper(auth()->user()->username) }}
                            </div>
                            <div class="flex items-center gap-2">
                                <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/loyalty/badge/bronze.svg?v=20250528" alt="Bronze" class="h-6 w-6">
                                <span class="font-semibold text-lg" style="background: -webkit-linear-gradient(#d18a6d,#744a3b); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                    BRONZE
                                </span>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <div class="w-full flex items-center justify-start gap-3 rounded-lg border border-gray-700 bg-black/70 px-3 py-1.5">
                                <span class="text-sm font-semibold text-white">IDR</span>
                                <span class="text-lg font-bold text-green-400">0</span>
                            </div>

                            <div class="w-full flex items-center justify-start gap-3 rounded-lg border border-gray-700 bg-black/70 px-3 py-1.5">
                                <span class="rounded px-2 py-0.5 text-xs font-semibold text-white uppercase" style="background-color: rgba(148, 163, 184, 0.35);">EXP</span>
                                <span class="text-base font-semibold text-white">0</span>
                            </div>
                        </div>

                        <div class="flex rounded-lg border border-gray-700 overflow-hidden" style="background-color: #1f1f1f;">
                            <button type="button" class="flex-1 px-3 py-3 text-center text-xs font-semibold text-white hover:bg-white/10 transition space-y-2" style="background-color: #1f1f1f;">
                                <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/tabs/withdrawal.svg?v=20250528" alt="Deposit" class="mx-auto h-6 w-6">
                                <span class="block">Deposit</span>
                            </button>
                            <span class="w-px bg-gray-600"></span>
                            <button type="button" class="flex-1 px-3 py-3 text-center text-xs font-semibold text-white hover:bg-white/10 transition space-y-2" style="background-color: #1f1f1f;">
                                <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/tabs/withdrawal.svg?v=20250528" alt="Penarikan" class="mx-auto h-6 w-6">
                                <span class="block">Penarikan</span>
                            </button>
                            <span class="w-px bg-gray-600"></span>
                            <button type="button" class="flex-1 px-3 py-3 text-center text-xs font-semibold text-white hover:bg-white/10 transition space-y-2" style="background-color: #1f1f1f;">
                                <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/tabs/redemption-store.svg?v=20250528" alt="Penukaran" class="mx-auto h-6 w-6">
                                <span class="block">Penukaran</span>
                            </button>
                        </div>
                    </div>
                @endguest

                <!-- Menu Pencarian -->
                <div class="mb-4">
                    <div class="flex items-center rounded-lg p-3 border border-black hover:border-black transition-colors"
                        style="background-color: {{ $sidebarMenuBgStyle }};">
                        <i class="fas fa-search text-black mr-3 text-base"></i>
                        <input type="text" placeholder="Pencarian"
                               class="bg-transparent text-white placeholder-white flex-1 outline-none text-sm">
                    </div>
                </div>

                @auth
                    <div class="mb-4">
                        <button class="w-full flex items-center justify-between rounded-lg p-3 border border-gray-700 hover:border-orange-500 transition-colors text-white text-sm"
                                style="background-color: {{ $sidebarMenuBgStyle }};">
                            <div class="flex items-center">
                                <i class="fas fa-gift text-black mr-3 text-base"></i>
                                <span>Bonus</span>
                            </div>
                        </button>
                    </div>

                    <div class="mb-4">
                        <button class="w-full flex items-center justify-between rounded-lg p-3 border border-gray-700 hover:border-orange-500 transition-colors text-white text-sm"
                                style="background-color: {{ $sidebarMenuBgStyle }};">
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-black mr-3 text-base"></i>
                                <span>Pesan</span>
                            </div>
                        </button>
                    </div>
                @endauth

                <!-- Menu Permainan dengan dropdown -->
                <div class="mb-4">
                    <button id="gameMenuToggle" class="w-full flex items-center justify-between rounded-lg p-3 border border-gray-700 hover:border-orange-500 transition-colors text-white text-sm hover:opacity-90"
                        style="background-color: {{ $sidebarMenuBgStyle }};">
                        <div class="flex items-center">
                            <i class="fas fa-gamepad text-black mr-3 text-base"></i>
                            <span>Permainan</span>
                        </div>
                        <i id="gameMenuIcon" class="fas fa-chevron-right text-orange-500 transition-transform"></i>
                    </button>

                    <!-- Dropdown Permainan -->
                    <div id="gameMenuDropdown" class="hidden mt-2 bg-black rounded-lg border border-gray-700 overflow-hidden">
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-900 transition-colors text-sm border-b border-gray-700 last:border-b-0">
                            <i class="fas fa-fire text-orange-500 mr-3 text-xs"></i>
                            <span>HOT GAMES</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-900 transition-colors text-sm border-b border-gray-700 last:border-b-0">
                            <i class="fas fa-coins text-orange-500 mr-3 text-xs"></i>
                            <span>SLOTS</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-900 transition-colors text-sm border-b border-gray-700 last:border-b-0">
                            <i class="fas fa-flag-checkered text-orange-500 mr-3 text-xs"></i>
                            <span>RACE</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-900 transition-colors text-sm border-b border-gray-700 last:border-b-0">
                            <i class="fas fa-hashtag text-orange-500 mr-3 text-xs"></i>
                            <span>TOGEL</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-900 transition-colors text-sm border-b border-gray-700 last:border-b-0">
                            <i class="fas fa-futbol text-orange-500 mr-3 text-xs"></i>
                            <span>OLAHRAGA</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-900 transition-colors text-sm border-b border-gray-700 last:border-b-0">
                            <i class="fas fa-chart-line text-orange-500 mr-3 text-xs"></i>
                            <span>CRASH GAME</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-900 transition-colors text-sm border-b border-gray-700 last:border-b-0">
                            <i class="fas fa-gamepad text-orange-500 mr-3 text-xs"></i>
                            <span>ARCADE</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-900 transition-colors text-sm border-b border-gray-700 last:border-b-0">
                            <i class="fas fa-diamond text-orange-500 mr-3 text-xs"></i>
                            <span>POKER</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-900 transition-colors text-sm border-b border-gray-700 last:border-b-0">
                            <i class="fas fa-trophy text-orange-500 mr-3 text-xs"></i>
                            <span>ESPORTS</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-900 transition-colors text-sm border-b border-gray-700 last:border-b-0">
                            <i class="fas fa-crow text-orange-500 mr-3 text-xs"></i>
                            <span>SABUNG AYAM</span>
                        </a>
                    </div>
                </div>

                @auth
                    <div class="mb-4">
                        <button class="w-full flex items-center justify-between rounded-lg p-3 border border-gray-700 hover:border-orange-500 transition-colors text-white text-sm"
                                style="background-color: {{ $sidebarMenuBgStyle }};">
                            <div class="flex items-center">
                                <i class="fas fa-medal text-black mr-3 text-base"></i>
                                <span>Hadiah Loyalitas</span>
                            </div>
                        </button>
                    </div>

                    <div class="mb-4">
                        <button class="w-full flex items-center justify-between rounded-lg p-3 border border-gray-700 hover:border-orange-500 transition-colors text-white text-sm"
                                style="background-color: {{ $sidebarMenuBgStyle }};">
                            <div class="flex items-center">
                                <i class="fas fa-dice text-black mr-3 text-base"></i>
                                <span>Riwayat Taruhan</span>
                            </div>
                        </button>
                    </div>

                    <div class="mb-4">
                        <button class="w-full flex items-center justify-between rounded-lg p-3 border border-gray-700 hover:border-orange-500 transition-colors text-white text-sm"
                                style="background-color: {{ $sidebarMenuBgStyle }};">
                            <div class="flex items-center">
                                <i class="fas fa-receipt text-black mr-3 text-base"></i>
                                <span>Riwayat Klaim</span>
                            </div>
                        </button>
                    </div>

                    <div class="mb-4">
                        <button class="w-full flex items-center justify-between rounded-lg p-3 border border-gray-700 hover:border-orange-500 transition-colors text-white text-sm"
                                style="background-color: {{ $sidebarMenuBgStyle }};">
                            <div class="flex items-center">
                                <i class="fas fa-user-friends text-black mr-3 text-base"></i>
                                <span>Referral</span>
                            </div>
                        </button>
                    </div>
                @endauth

                <!-- Menu Bahasa Indonesia -->
                <div class="mb-4">
                    <button id="languageMenuToggle" class="w-full flex items-center justify-between rounded-lg p-3 border border-gray-700 hover:border-orange-500 transition-colors text-white text-sm hover:opacity-90"
                        style="background-color: {{ $sidebarMenuBgStyle }};">
                        <div class="flex items-center">
                            <i class="fas fa-globe text-black mr-3 text-base"></i>
                            <span>Bahasa Indonesia</span>
                        </div>
                        <i id="languageMenuIcon" class="fas fa-chevron-right text-orange-500 transition-transform"></i>
                    </button>

                    <!-- Dropdown Bahasa -->
                    <div id="languageMenuDropdown" class="hidden mt-2 bg-black rounded-lg border border-gray-700 overflow-hidden">
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-700 transition-colors text-sm border-b border-gray-600 last:border-b-0">
                            <img src="https://flagcdn.com/w20/id.png" alt="Indonesia" class="mr-3 w-5 h-auto">
                            <span>Bahasa Indonesia</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-700 transition-colors text-sm border-b border-gray-600 last:border-b-0">
                            <img src="https://flagcdn.com/w20/us.png" alt="English" class="mr-3 w-5 h-auto">
                            <span>English</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-700 transition-colors text-sm border-b border-gray-600 last:border-b-0">
                            <img src="https://flagcdn.com/w20/cn.png" alt="Chinese" class="mr-3 w-5 h-auto">
                            <span>中文</span>
                        </a>
                    </div>
                </div>

                <!-- Menu Versi Desktop -->
                <div class="mb-4">
                    <button id="versionMenuToggle" class="w-full flex items-center justify-between rounded-lg p-3 border border-gray-700 hover:border-orange-500 transition-colors text-white text-sm hover:opacity-90"
                        style="background-color: {{ $sidebarMenuBgStyle }};">
                        <div class="flex items-center">
                            <i class="fas fa-desktop text-black mr-3 text-base"></i>
                            <span>Versi Desktop</span>
                        </div>
                        <i id="versionMenuIcon" class="fas fa-chevron-right text-orange-500 transition-transform"></i>
                    </button>

                    <!-- Dropdown Versi -->
                    <div id="versionMenuDropdown" class="hidden mt-2 bg-black rounded-lg border border-gray-700 overflow-hidden">
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-900 transition-colors text-sm border-b border-gray-700 last:border-b-0">
                            <i class="fas fa-desktop text-orange-500 mr-3 text-xs"></i>
                            <span>Versi Desktop</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-900 transition-colors text-sm border-b border-gray-700 last:border-b-0">
                            <i class="fas fa-mobile-alt text-orange-500 mr-3 text-xs"></i>
                            <span>Versi Mobile</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 text-white hover:bg-gray-900 transition-colors text-sm border-b border-gray-700 last:border-b-0">
                            <i class="fas fa-tablet-alt text-orange-500 mr-3 text-xs"></i>
                            <span>Versi Tablet</span>
                        </a>
                    </div>
                </div>

                @auth
                    <form method="POST" action="{{ route('logout') }}" class="mt-6">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-between rounded-lg p-3 border border-red-600 text-red-100 transition-colors text-sm hover:bg-red-600/20">
                            <div class="flex items-center">
                                <i class="fas fa-sign-out-alt mr-3 text-base"></i>
                                <span>Keluar</span>
                            </div>
                            <i class="fas fa-chevron-right text-red-400"></i>
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>

    <!-- Overlay -->
    <div id="menuOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menuToggle');
        const closeMenu = document.getElementById('closeMenu');
        const slideMenu = document.getElementById('slideMenu');
        const menuOverlay = document.getElementById('menuOverlay');

        // Menu toggle functionality
        if (menuToggle && slideMenu && menuOverlay) {
            menuToggle.addEventListener('click', () => {
                slideMenu.classList.remove('translate-x-full');
                menuOverlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Prevent body scroll
            });

            const closeMenuFunc = () => {
                slideMenu.classList.add('translate-x-full');
                menuOverlay.classList.add('hidden');
                document.body.style.overflow = ''; // Restore body scroll
            };

            closeMenu.addEventListener('click', closeMenuFunc);
            menuOverlay.addEventListener('click', closeMenuFunc);
        }

        // Dropdown toggle functionality
        function setupDropdown(toggleId, dropdownId, iconId) {
            const toggle = document.getElementById(toggleId);
            const dropdown = document.getElementById(dropdownId);
            const icon = document.getElementById(iconId);

            if (toggle && dropdown && icon) {
                toggle.addEventListener('click', () => {
                    const isHidden = dropdown.classList.contains('hidden');

                    // Close all other dropdowns
                    document.querySelectorAll('[id$="MenuDropdown"]').forEach(dd => {
                        if (dd !== dropdown) dd.classList.add('hidden');
                    });
                    document.querySelectorAll('[id$="MenuIcon"]').forEach(ic => {
                        if (ic !== icon) ic.classList.remove('rotate-90');
                    });

                    // Toggle current dropdown
                    if (isHidden) {
                        dropdown.classList.remove('hidden');
                        icon.classList.add('rotate-90');
                    } else {
                        dropdown.classList.add('hidden');
                        icon.classList.remove('rotate-90');
                    }
                });
            }
        }

        // Setup all dropdowns
        setupDropdown('gameMenuToggle', 'gameMenuDropdown', 'gameMenuIcon');
        setupDropdown('languageMenuToggle', 'languageMenuDropdown', 'languageMenuIcon');
        setupDropdown('versionMenuToggle', 'versionMenuDropdown', 'versionMenuIcon');

        // Close dropdowns when clicking outside
        document.addEventListener('click', (e) => {
            const dropdownButtons = ['gameMenuToggle', 'languageMenuToggle', 'versionMenuToggle'];
            const dropdowns = ['gameMenuDropdown', 'languageMenuDropdown', 'versionMenuDropdown'];
            const icons = ['gameMenuIcon', 'languageMenuIcon', 'versionMenuIcon'];

            let clickedOnButton = false;
            dropdownButtons.forEach(buttonId => {
                const button = document.getElementById(buttonId);
                if (button && (button.contains(e.target) || button === e.target)) {
                    clickedOnButton = true;
                }
            });

            if (!clickedOnButton) {
                dropdowns.forEach(dropdownId => {
                    const dropdown = document.getElementById(dropdownId);
                    if (dropdown && !dropdown.contains(e.target)) {
                        dropdown.classList.add('hidden');
                    }
                });
                icons.forEach(iconId => {
                    const icon = document.getElementById(iconId);
                    if (icon) icon.classList.remove('rotate-90');
                });
            }
        });

        // Handle search input
        const searchInput = document.querySelector('#slideMenu input[type="text"]');
        if (searchInput) {
            searchInput.addEventListener('focus', () => {
                searchInput.parentElement.classList.add('ring-2', 'ring-orange-500');
            });

            searchInput.addEventListener('blur', () => {
                searchInput.parentElement.classList.remove('ring-2', 'ring-orange-500');
            });
        }
    });
</script>
