@extends('layouts.main')

@section('title', 'Daftar Akun')

@section('content')
    @php
        $accentColor = $settings['sidebar_menu_bg_color'] ?? '#d77f03';
    @endphp
    <div class="max-w-3xl mx-auto px-4 py-8 space-y-8">
        <div class="rounded-xl overflow-hidden shadow-lg border border-gray-800" style="background: transparent;">
            <div class="px-6 py-4 text-white font-semibold text-lg tracking-wide"
                 style="background-color: {{ $accentColor }};">
                Informasi Pribadi
            </div>
            <div class="px-6 py-6 space-y-5" style="background: transparent;">
                @if ($errors->any())
                    <div class="rounded-lg border border-red-500/60 bg-red-500/10 px-4 py-3 text-sm text-red-200">
                        Silakan periksa kembali data yang diisi.
                    </div>
                @endif

                @if (session('status'))
                    <div class="rounded-lg border border-green-500/60 bg-green-500/10 px-4 py-3 text-sm text-green-200">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ route('register.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 gap-5">
                        <label class="block">
                            <span class="text-sm text-gray-200 font-medium">Nama Pengguna</span>
                            <input type="text" name="username" required value="{{ old('username') }}"
                                   class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-700 text-white placeholder-gray-400 bg-transparent focus:outline-none focus:ring-2 focus:ring-orange-400"
                                   placeholder="Masukkan nama pengguna">
                            @error('username')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </label>

                        <div>
                            <span class="text-sm text-gray-200 font-medium">Kata Sandi</span>
                            <div class="mt-2 relative">
                                <input type="password" name="password" required data-password-field value=""
                                       class="w-full px-4 py-3 rounded-lg border border-gray-700 text-white placeholder-gray-400 bg-transparent focus:outline-none focus:ring-2 focus:ring-orange-400"
                                       placeholder="Masukkan kata sandi">
                                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white" data-toggle-password>
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <span class="text-sm text-gray-200 font-medium">Ulangi Kata Sandi</span>
                            <div class="mt-2 relative">
                                <input type="password" name="password_confirmation" required data-password-field value=""
                                       class="w-full px-4 py-3 rounded-lg border border-gray-700 text-white placeholder-gray-400 bg-transparent focus:outline-none focus:ring-2 focus:ring-orange-400"
                                       placeholder="Ulangi kata sandi">
                                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white" data-toggle-password>
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <label class="block">
                            <span class="text-sm text-gray-200 font-medium">Nomor WhatsApp</span>
                            <input type="tel" name="whatsapp" required value="{{ old('whatsapp') }}"
                                   class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-700 text-white placeholder-gray-400 bg-transparent focus:outline-none focus:ring-2 focus:ring-orange-400"
                                   placeholder="Contoh: 6281234567890">
                            @error('whatsapp')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </label>
                    </div>

                    <div class="rounded-xl overflow-hidden border border-gray-800 mt-8" style="background: transparent;">
                        <div class="px-6 py-4 text-white font-semibold text-lg tracking-wide"
                             style="background-color: {{ $accentColor }};">
                            Informasi Pembayaran
                        </div>
                        <div class="px-6 py-6 space-y-6" style="background: transparent;">
                            <input type="hidden" name="payment_method" id="paymentMethodInput" value="{{ old('payment_method', 'bank') }}">
                            <div>
                                <span class="text-sm text-gray-200 font-medium">Metode Pembayaran</span>
                                <div class="mt-3 grid grid-cols-2 gap-3">
                                    <button type="button" class="method-button px-4 py-3 rounded-lg border border-orange-400 text-white font-semibold bg-orange-500 bg-opacity-20" data-method="bank">
                                        Bank
                                    </button>
                                    <button type="button" class="method-button px-4 py-3 rounded-lg border border-gray-700 text-gray-300 hover:border-orange-400" data-method="ewallet">
                                        E-Wallet
                                    </button>
                                    @error('payment_method')
                                        <p class="col-span-2 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <span class="text-sm text-gray-200 font-medium">Pilih Penyedia</span>
                                <select name="provider" id="providerSelect" required
                                        class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-700 text-white bg-transparent focus:outline-none focus:ring-2 focus:ring-orange-400">
                                </select>
                                @error('provider')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <label class="block">
                                <span class="text-sm text-gray-200 font-medium">Nomor Rekening / Akun</span>
                                <input type="text" name="account_number" required value="{{ old('account_number') }}"
                                       class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-700 text-white placeholder-gray-400 bg-transparent focus:outline-none focus:ring-2 focus:ring-orange-400"
                                       placeholder="Masukkan nomor rekening atau akun">
                                @error('account_number')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </label>

                            <label class="block">
                                <span class="text-sm text-gray-200 font-medium">Nama Lengkap</span>
                                <input type="text" name="full_name" required value="{{ old('full_name') }}"
                                       class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-700 text-white placeholder-gray-400 bg-transparent focus:outline-none focus:ring-2 focus:ring-orange-400"
                                       placeholder="Masukkan nama sesuai rekening">
                                @error('full_name')
                                    <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                @enderror
                            </label>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <label class="block">
                                    <span class="text-sm text-gray-200 font-medium">Verifikasi Captcha</span>
                                    <div class="mt-2 flex items-center justify-between border border-gray-700 rounded-lg px-4 py-3 bg-transparent">
                                        <span id="captchaCode" class="text-2xl font-bold tracking-widest text-orange-400"></span>
                                        <button type="button" id="refreshCaptcha" class="text-sm text-gray-300 hover:text-white">
                                            <i class="fas fa-sync-alt mr-1"></i>Ubah kode
                                        </button>
                                    </div>
                                    <input type="hidden" name="captcha_expected" id="captchaExpected" value="{{ old('captcha_expected') }}">
                                </label>
                                <label class="block">
                                    <span class="text-sm text-gray-200 font-medium">Masukkan Kode</span>
                                    <input type="text" name="captcha" inputmode="numeric" pattern="\d{4}" maxlength="4" required value="{{ old('captcha') }}"
                                           class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-700 text-white placeholder-gray-400 bg-transparent focus:outline-none focus:ring-2 focus:ring-orange-400"
                                           placeholder="4 digit angka">
                                    @error('captcha')
                                        <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                                    @enderror
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                            class="w-full py-3 rounded-lg text-sm font-semibold text-white mt-4 hover:opacity-90"
                            style="background-color: {{ $accentColor }};">
                        Daftar
                    </button>

                    <p class="text-xs text-gray-400 text-center leading-relaxed">
                        Dengan klik tombol <span class="font-semibold text-white">DAFTAR</span>, saya menyatakan bahwa saya berumur di atas 18 tahun.
                        Saya telah membaca dan menyetujui Syarat dan Ketentuan dari PLANET77.
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const methodButtons = document.querySelectorAll('.method-button');
            const providerSelect = document.getElementById('providerSelect');
            const paymentMethodInput = document.getElementById('paymentMethodInput');
            const captchaExpectedInput = document.getElementById('captchaExpected');
            const captchaInput = document.querySelector('input[name="captcha"]');
            const defaultMethod = @json(old('payment_method', 'bank'));
            const defaultProvider = @json(old('provider'));
            const previousCaptcha = @json(old('captcha_expected'));
            const banks = [
                'Bank Central Asia (BCA)', 'Bank Mandiri', 'Bank Negara Indonesia (BNI)', 'Bank Rakyat Indonesia (BRI)',
                'Bank CIMB Niaga', 'Bank Danamon', 'Bank Permata', 'Bank Tabungan Negara (BTN)', 'Bank Mega',
                'Bank Panin', 'Bank OCBC NISP', 'Bank Sinarmas', 'Bank Bukopin', 'Bank BTPN',
                'Bank Maybank Indonesia', 'Bank HSBC Indonesia', 'Bank Muamalat', 'Bank Syariah Indonesia',
                'Bank Jago', 'Bank Commonwealth', 'Bank Mayora', 'Bank Mestika', 'Bank Victoria',
                'Bank Woori Saudara', 'BPD DKI', 'BPD Jabar Banten (BJB)', 'BPD Jawa Tengah (Bank Jateng)',
                'BPD Jawa Timur (Bank Jatim)', 'BPD Sumatera Utara (Bank Sumut)', 'BPD Sumatera Barat (Bank Nagari)',
                'BPD Aceh', 'BPD Riau Kepri', 'BPD Sumsel Babel', 'BPD Kalimantan Barat', 'BPD Kalimantan Selatan',
                'BPD Kalimantan Timur', 'BPD Papua', 'BPD Nusa Tenggara Timur (Bank NTT)', 'BPD Nusa Tenggara Barat (Bank NTB)'
            ];

            const ewallets = [
                'OVO', 'GoPay', 'DANA', 'LinkAja', 'ShopeePay', 'Sakuku', 'i.saku',
                'AstraPay', 'Blu by BCA Digital', 'Jenius Pay', 'Kredivo', 'SPIN Pay', 'Paytren',
                'TrueMoney', 'SiCepat Pay', 'GrabPay', 'PayPal'
            ];

            function populateOptions(options, selectedValue = null) {
                providerSelect.innerHTML = '';
                options.forEach(option => {
                    const opt = document.createElement('option');
                    opt.value = option;
                    opt.textContent = option;
                    providerSelect.appendChild(opt);
                });

                if (selectedValue && options.includes(selectedValue)) {
                    providerSelect.value = selectedValue;
                }
            }

            function setActiveMethod(method) {
                if (paymentMethodInput) {
                    paymentMethodInput.value = method;
                }
                methodButtons.forEach(button => {
                    if (button.dataset.method === method) {
                        button.classList.remove('border-gray-700', 'text-gray-300');
                        button.classList.add('border-orange-400', 'text-white');
                        button.classList.add('bg-orange-500', 'bg-opacity-20');
                        button.style.backgroundColor = 'rgba(245, 158, 11, 0.2)';
                    } else {
                        button.classList.add('border-gray-700', 'text-gray-300');
                        button.classList.remove('border-orange-400', 'text-white');
                        button.classList.remove('bg-orange-500', 'bg-opacity-20');
                        button.style.backgroundColor = 'transparent';
                    }
                });
            }

            methodButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const method = button.dataset.method;
                    setActiveMethod(method);
                    populateOptions(method === 'bank' ? banks : ewallets);
                });
            });

            // Toggle password visibility
            document.querySelectorAll('[data-toggle-password]').forEach(toggle => {
                toggle.addEventListener('click', () => {
                    const input = toggle.previousElementSibling;
                    if (!input) return;
                    const isHidden = input.getAttribute('type') === 'password';
                    input.setAttribute('type', isHidden ? 'text' : 'password');
                    toggle.innerHTML = isHidden ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
                });
            });

            // Captcha
            const captchaCode = document.getElementById('captchaCode');
            const refreshCaptcha = document.getElementById('refreshCaptcha');
            function generateCaptcha() {
                const value = Math.floor(1000 + Math.random() * 9000);
                if (captchaCode) {
                    captchaCode.textContent = value;
                }
                if (captchaExpectedInput) {
                    captchaExpectedInput.value = value;
                }
                if (captchaInput) {
                    captchaInput.value = '';
                }
            }
            if (refreshCaptcha) {
                refreshCaptcha.addEventListener('click', generateCaptcha);
            }

            // Initial states
            const firstMethod = defaultMethod === 'ewallet' ? 'ewallet' : 'bank';
            setActiveMethod(firstMethod);
            populateOptions(firstMethod === 'bank' ? banks : ewallets, defaultProvider);

            if (previousCaptcha) {
                if (captchaCode) {
                    captchaCode.textContent = previousCaptcha;
                }
                if (captchaExpectedInput) {
                    captchaExpectedInput.value = previousCaptcha;
                }
            } else {
                generateCaptcha();
            }
        });
    </script>
@endpush
