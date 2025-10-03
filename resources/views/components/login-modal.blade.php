<div id="loginModal" class="fixed inset-0 z-50 hidden" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="absolute inset-0 bg-black/70" data-login-modal-close></div>

    <div class="relative z-10 flex min-h-screen items-center justify-center px-4 py-10">
        <div class="relative w-full max-w-sm rounded-2xl border border-white/10 bg-[#080808dc] shadow-2xl">
            <button type="button" class="absolute right-4 top-4 text-gray-400 transition hover:text-white focus:outline-none" aria-label="Tutup" data-login-modal-close>
                <i class="fas fa-times text-lg"></i>
            </button>

            <div class="px-6 py-7 space-y-6">
                <div class="text-center space-y-2">
                    <span class="inline-flex items-center justify-center text-xs font-semibold uppercase tracking-[0.3em] text-white">Masuk</span>
                        <hr class="border-t border-white/80 mx-2" />

                </div>

                <form id="loginForm" class="space-y-4" method="POST" action="{{ route('login.submit') }}">
                    @csrf
                    <div class="space-y-1.5">
                        <label for="loginUsername" class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-300">Nama Pengguna</label>
                        <div class="relative">
                            <input id="loginUsername" name="username" type="text" autocomplete="username" data-autofocus value="{{ old('username') }}"
                                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-white placeholder:text-gray-500 focus:border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400/40"
                                   placeholder="Masukkan nama pengguna">
                            <span class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-gray-500">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        @error('username', 'login')
                            <p class="text-xs text-red-300">{{ $message }}</p>
                        @enderror
                        <p id="usernameError" class="text-xs text-red-300 hidden"></p>
                    </div>

                        <div class="space-y-1.5">
                        <label for="loginPassword" class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-300">Kata Sandi</label>
                        <div class="relative">
                            <input id="loginPassword" name="password" type="password" autocomplete="current-password" data-password-input
                                   class="w-full rounded-xl border border-white/10 bg-white/5 px-4 py-3 pr-12 text-sm text-white placeholder:text-gray-500 focus:border-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400/40"
                                   placeholder="Masukkan kata sandi">
                            <button type="button" class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-white focus:outline-none" data-password-toggle>
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <button type="button" class="ml-auto block text-xs font-semibold text-[rgb(215,127,3)] hover:text-yellow-300 focus:outline-none">
                            Lupa sandi?
                        </button>
                        @error('password', 'login')
                            <p class="text-xs text-red-300">{{ $message }}</p>
                        @enderror
                        <p id="passwordError" class="text-xs text-red-300 hidden"></p>
                    </div>

                    <button type="submit" class="w-full rounded-xl bg-[rgb(215,127,3)] px-4 py-3 text-sm font-bold uppercase tracking-[0.25em] text-white shadow-lg shadow-yellow-400/30 transition hover:bg-yellow-300">
                        Masuk
                    </button>
                </form>

                <p class="text-center text-xs text-gray-400">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-semibold text-[rgb(215,127,3)] hover:text-yellow-300">Daftar Sekarang</a>
                </p>
            </div>
        </div>
    </div>
</div>

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const modal = document.getElementById('loginModal');
                if (!modal) return;

                const openers = document.querySelectorAll('[data-login-modal-trigger]');
                const closers = modal.querySelectorAll('[data-login-modal-close]');
                const passwordToggle = modal.querySelector('[data-password-toggle]');
                const passwordInput = modal.querySelector('[data-password-input]');

                const openModal = () => {
                    modal.classList.remove('hidden');
                    modal.setAttribute('aria-hidden', 'false');
                    document.body.classList.add('overflow-hidden');
                    const firstField = modal.querySelector('[data-autofocus]');
                    if (firstField) {
                        setTimeout(() => firstField.focus(), 50);
                    }
                };

                const closeModal = () => {
                    modal.classList.add('hidden');
                    modal.setAttribute('aria-hidden', 'true');
                    document.body.classList.remove('overflow-hidden');
                };

                openers.forEach(button => {
                    button.addEventListener('click', event => {
                        event.preventDefault();
                        openModal();
                    });
                });

                closers.forEach(button => {
                    button.addEventListener('click', () => closeModal());
                });

                document.addEventListener('keydown', event => {
                    if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                        closeModal();
                    }
                });

                if (passwordToggle && passwordInput) {
                    passwordToggle.addEventListener('click', () => {
                        const isVisible = passwordInput.type === 'text';
                        passwordInput.type = isVisible ? 'password' : 'text';
                        passwordToggle.innerHTML = isVisible ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
                    });
                }

                const hasLoginErrors = @json($errors->login->any());
                if (hasLoginErrors && !window.DISABLE_LOGIN_MODAL_AUTO_OPEN) {
                    openModal();
                }

                // Form validation
                const loginForm = document.getElementById('loginForm');
                const usernameInput = document.getElementById('loginUsername');
                const passwordInput = document.getElementById('loginPassword');
                const usernameError = document.getElementById('usernameError');
                const passwordError = document.getElementById('passwordError');

                if (loginForm) {
                    loginForm.addEventListener('submit', function(event) {
                        // Reset error messages
                        usernameError.classList.add('hidden');
                        passwordError.classList.add('hidden');
                        usernameError.textContent = '';
                        passwordError.textContent = '';

                        let hasError = false;

                        // Validate username
                        if (!usernameInput.value.trim()) {
                            usernameError.textContent = 'Silakan masukkan nama pengguna';
                            usernameError.classList.remove('hidden');
                            hasError = true;
                        }

                        // Validate password
                        if (!passwordInput.value.trim()) {
                            passwordError.textContent = 'Silakan masukkan kata sandi';
                            passwordError.classList.remove('hidden');
                            hasError = true;
                        }

                        // Prevent form submission if there are errors
                        if (hasError) {
                            event.preventDefault();
                            // Focus on first empty field
                            if (!usernameInput.value.trim()) {
                                usernameInput.focus();
                            } else if (!passwordInput.value.trim()) {
                                passwordInput.focus();
                            }
                        }
                    });
                }
            });
        </script>
    @endpush
@endonce
