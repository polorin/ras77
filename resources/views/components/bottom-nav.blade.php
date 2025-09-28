<!-- Bottom Navigation Component -->
<nav id="bottom-nav" class="fixed bottom-0 left-0 right-0 z-40 border-t border-gray-700"
     style="background-color: {{ $settings['bottom_nav_bg_color'] ?? '#1a1a1a' }};">
    <div class="grid grid-cols-5 h-16">
        <!-- Beranda -->
        <a href="{{ route('home') }}"
           class="flex flex-col items-center justify-center text-gray-400 hover:text-yellow-400 transition-colors {{ request()->routeIs('home') ? 'text-yellow-400' : '' }}">
            @if(!empty($settings['icon_beranda']))
                <img src="{{ asset('storage/icons/' . $settings['icon_beranda']) }}" class="w-6 h-6 mb-1">
            @else
                <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
            @endif
            <span class="text-xs">Beranda</span>
        </a>
        
        <!-- Promosi -->
        <a href="{{ route('promosi') }}"
           class="flex flex-col items-center justify-center text-gray-400 hover:text-yellow-400 transition-colors {{ request()->routeIs('promosi') ? 'text-yellow-400' : '' }}">
            @if(!empty($settings['icon_promosi']))
                <img src="{{ asset('storage/icons/' . $settings['icon_promosi']) }}" class="w-6 h-6 mb-1">
            @else
                <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd"></path>
                    <path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z"></path>
                </svg>
            @endif
            <span class="text-xs">Promosi</span>
        </a>
        
        <!-- Masuk (Login/Register) -->
        <a href="{{ route('login') }}"
           class="flex flex-col items-center justify-center text-gray-400 hover:text-yellow-400 transition-colors {{ request()->routeIs('login') ? 'text-yellow-400' : '' }}">
            @if(!empty($settings['icon_masuk']))
                <img src="{{ asset('storage/icons/' . $settings['icon_masuk']) }}" class="w-6 h-6 mb-1">
            @else
                <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
            @endif
            <span class="text-xs">Masuk</span>
        </a>
        
        <!-- Hub. Kami -->
        <a href="{{ route('hubungi') }}"
           class="flex flex-col items-center justify-center text-gray-400 hover:text-yellow-400 transition-colors {{ request()->routeIs('hubungi') ? 'text-yellow-400' : '' }}">
            @if(!empty($settings['icon_hubkami']))
                <img src="{{ asset('storage/icons/' . $settings['icon_hubkami']) }}" class="w-6 h-6 mb-1">
            @else
                <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                </svg>
            @endif
            <span class="text-xs">Hub.Kami</span>
        </a>
        
        <!-- Akun Saya -->
        <a href="{{ route('akun') }}"
           class="flex flex-col items-center justify-center text-gray-400 hover:text-yellow-400 transition-colors {{ request()->routeIs('akun') ? 'text-yellow-400' : '' }}">
            @if(!empty($settings['icon_akun']))
                <img src="{{ asset('storage/icons/' . $settings['icon_akun']) }}" class="w-6 h-6 mb-1">
            @else
                <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
            @endif
            <span class="text-xs">Akun Saya</span>
        </a>
    </div>
</nav>