<!-- Bottom Navigation Component -->
<nav id="bottom-nav" class="fixed bottom-0 left-0 right-0 z-40 border-t border-gray-700 shadow-2xl"
     style="background-color: {{ $settings['bottom_nav_bg_color'] ?? '#1a1a1a' }}; padding-bottom: env(safe-area-inset-bottom);">
    <div class="grid grid-cols-5 h-16">
        <!-- Beranda -->
        @auth
            <a href="{{ route('member.home') }}"
               class="flex flex-col items-center justify-center text-gray-400 hover:text-yellow-400 transition-colors {{ request()->routeIs('member.home') ? 'text-yellow-400' : '' }}">
                @if(!empty($settings['icon_beranda']))
                    <img src="{{ asset('storage/icons/' . $settings['icon_beranda']) }}" class="w-6 h-6 mb-1">
                @else
                    <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                @endif
                <span class="text-xs">Beranda</span>
            </a>
        @else
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
        @endauth
        
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
        
        @guest
            <!-- Masuk (Login/Register) -->
            <button type="button" data-login-modal-trigger
               class="flex flex-col items-center justify-center w-full h-full cursor-pointer text-gray-400 hover:text-yellow-400 transition-colors focus:outline-none">
                @if(!empty($settings['icon_masuk']))
                    <img src="{{ asset('storage/icons/' . $settings['icon_masuk']) }}" class="w-6 h-6 mb-1">
                @else
                    <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                @endif
                <span class="text-xs">Masuk</span>
            </button>
        @endguest

        @auth
            <!-- Depo/Wd untuk user login -->
            <a href="{{ route('deposit') }}"
               class="flex flex-col items-center justify-center w-full h-full text-gray-400 hover:text-yellow-400 transition-colors {{ request()->routeIs('deposit') ? 'text-yellow-400' : '' }}">
                <span class="w-8 h-8 mb-1 rounded-full bg-orange-500 flex items-center justify-center text-black">
                    <i class="fas fa-dollar-sign text-sm"></i>
                </span>
                <span class="text-xs">Depo/Wd</span>
            </a>
        @endauth
        
        <!-- Hub. Kami -->
        <a href="{{ route('hubungi') }}"
           class="group flex flex-col items-center justify-center text-gray-400 hover:text-yellow-400 transition-colors {{ request()->routeIs('hubungi') ? 'text-yellow-400' : '' }}">
            @if(!empty($settings['icon_hubkami']))
                <img src="{{ asset('storage/icons/' . $settings['icon_hubkami']) }}" class="w-6 h-6 mb-1 hub-pulse">
            @else
                <svg class="w-6 h-6 mb-1 hub-pulse text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                </svg>
            @endif
            <span class="text-xs">Hub.Kami</span>
        </a>
        
        <!-- Akun Saya -->
        @auth
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
        @else
            <button type="button" onclick="showLoginWarning()"
               class="flex flex-col items-center justify-center text-gray-400 hover:text-yellow-400 transition-colors">
                @if(!empty($settings['icon_akun']))
                    <img src="{{ asset('storage/icons/' . $settings['icon_akun']) }}" class="w-6 h-6 mb-1">
                @else
                    <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                @endif
                <span class="text-xs">Akun Saya</span>
            </button>
        @endauth
    </div>
</nav>

<!-- Login Warning Modal (Guest Only) -->
@guest
<div id="loginWarningModal" class="login-warning-modal" style="display: none;">
    <div class="modal-overlay" onclick="closeLoginWarning()"></div>
    <div class="modal-content">
        <button class="modal-close" onclick="closeLoginWarning()">×</button>
        <div class="modal-icon">
            <svg width="60" height="60" viewBox="0 0 24 24" fill="none">
                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM13 17H11V15H13V17ZM13 13H11V7H13V13Z" fill="#ff9500"/>
            </svg>
        </div>
        <div class="modal-message">Silahkan login terlebih dahulu.</div>
        <button class="modal-ok-btn" onclick="redirectToHome()">OK</button>
    </div>
</div>

<style>
.login-warning-modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.8);
}

.modal-content {
    position: relative;
    background: #1a1a1a;
    border: 2px solid #ff9500;
    border-radius: 12px;
    padding: 30px 24px 24px;
    max-width: 320px;
    width: 90%;
    text-align: center;
    z-index: 10000;
    animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.modal-close {
    position: absolute;
    top: 10px;
    right: 10px;
    background: transparent;
    border: none;
    color: white;
    font-size: 28px;
    cursor: pointer;
    line-height: 1;
    padding: 0;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color 0.2s;
}

.modal-close:hover {
    color: #ff9500;
}

.modal-icon {
    margin-bottom: 16px;
    display: flex;
    justify-content: center;
}

.modal-message {
    color: white;
    font-size: 15px;
    font-weight: 500;
    margin-bottom: 24px;
    line-height: 1.5;
}

.modal-ok-btn {
    background: #ff9500;
    color: #000;
    border: none;
    padding: 12px 40px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.modal-ok-btn:hover {
    background: #ff8800;
    transform: scale(1.05);
}

.modal-ok-btn:active {
    transform: scale(0.98);
}
</style>

<script>
function showLoginWarning() {
    const modal = document.getElementById('loginWarningModal');
    if (modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

function closeLoginWarning() {
    const modal = document.getElementById('loginWarningModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
}

function redirectToHome() {
    window.location.href = '{{ route('home') }}';
}

// Close modal with ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeLoginWarning();
    }
});
</script>
@endguest
