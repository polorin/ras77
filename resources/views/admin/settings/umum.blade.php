<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Umum - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @if(!empty($settings['favicon']))
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/favicons/' . $settings['favicon']) }}">
    @endif
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
                    <li><a href="#" class="hover:text-indigo-600">Settings</a></li>
                    <li class="mx-2">/</li>
                    <li class="text-gray-900 font-semibold">Pengaturan Umum</li>
                </ol>
            </nav>

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <h3 class="font-semibold mb-2"><i class="fas fa-triangle-exclamation mr-2"></i>Terjadi kesalahan</h3>
                    <ul class="list-disc ml-5 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900">Metode Pembayaran</h2>
                            <p class="text-sm text-gray-500">Kelola ikon metode pembayaran yang akan tampil di halaman utama.</p>
                        </div>
                        <button type="button" id="addPaymentMethodBtn" class="inline-flex items-center justify-center px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-semibold shadow-sm hover:bg-indigo-500 transition-colors">
                            <i class="fas fa-plus mr-2"></i> Tambah Metode
                        </button>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.settings.umum.update') }}" enctype="multipart/form-data" class="px-6 py-6 space-y-6">
                    @csrf

                    <div id="paymentMethodsList" class="space-y-4">
                        @forelse($paymentMethods as $index => $method)
                            <div class="bg-gray-50 border border-gray-200 rounded-xl p-4" data-payment-method>
                                <div class="flex flex-col lg:flex-row gap-4 lg:items-center">
                                    <div class="w-full lg:w-40 h-24 bg-white border border-dashed border-gray-300 rounded-lg flex items-center justify-center overflow-hidden">
                                        <img src="{{ asset('storage/payment-methods/' . $method['image']) }}" alt="Metode Pembayaran" class="max-h-full max-w-full object-contain">
                                    </div>
                                    <div class="flex-1 grid gap-4 sm:grid-cols-2">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                            <select name="payment_methods[{{ $index }}][status]" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                                <option value="online" {{ ($method['status'] ?? 'online') === 'online' ? 'selected' : '' }}>Online</option>
                                                <option value="offline" {{ ($method['status'] ?? 'online') === 'offline' ? 'selected' : '' }}>Offline</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-2">Ganti Gambar</label>
                                            <input type="file" name="payment_methods[{{ $index }}][image]" accept="image/png,image/jpeg,image/svg+xml,image/webp" class="block w-full text-sm text-gray-500 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
                                            <input type="hidden" name="payment_methods[{{ $index }}][existing_image]" value="{{ $method['image'] }}" data-existing-image>
                                        </div>
                                    </div>
                                    <div class="flex lg:flex-col lg:items-end">
                                        <button type="button" class="inline-flex items-center px-3 py-2 rounded-lg text-sm font-semibold text-red-600 hover:bg-red-50 transition-colors" data-action="remove-method">
                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="bg-gray-50 border border-dashed border-gray-300 rounded-xl p-6 text-center text-gray-500 text-sm">
                                Belum ada metode pembayaran. Klik tombol "Tambah Metode" untuk menambahkan.
                            </div>
                        @endforelse
                    </div>

                    <div id="removedPaymentMethods"></div>

                    <div class="border-t border-gray-200 pt-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <p class="text-sm text-gray-500">Format yang didukung: JPG, PNG, SVG, WEBP. Ukuran maksimal 2MB.</p>
                        <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-indigo-600 text-white text-sm font-semibold shadow-sm hover:bg-indigo-500 transition-colors">
                            <i class="fas fa-save mr-2"></i> Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>

            <!-- Pengaturan Halaman Hubungi -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mt-8">
                <div class="px-6 py-5 border-b border-gray-100">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-900">Halaman Hubungi Kami</h2>
                            <p class="text-sm text-gray-500">Kelola gambar dan link untuk halaman hubungi kami.</p>
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.settings.umum.update') }}" enctype="multipart/form-data" class="px-6 py-6 space-y-6">
                    @csrf

                    <!-- Gambar Utama -->
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Gambar Utama</h3>
                        <div class="flex flex-col lg:flex-row gap-4 lg:items-center">
                            <div class="w-full lg:w-60 h-32 bg-white border border-dashed border-gray-300 rounded-lg flex items-center justify-center overflow-hidden">
                                @if(!empty($settings['hubungi_main_image']))
                                    <img src="{{ asset('storage/hubungi/' . $settings['hubungi_main_image']) }}" alt="Gambar Utama Hubungi" class="max-h-full max-w-full object-contain">
                                @else
                                    <span class="text-gray-400 text-sm">Preview Gambar Utama</span>
                                @endif
                            </div>
                            <div class="flex-1">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Upload Gambar Utama</label>
                                <input type="file" name="hubungi_main_image" accept="image/png,image/jpeg,image/jpg,image/svg+xml,image/webp" class="block w-full text-sm text-gray-500 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
                                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, SVG, WEBP. Maksimal 5MB.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Gambar Telegram dan WhatsApp -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Telegram -->
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Telegram</h3>
                            <div class="space-y-4">
                                <div class="w-full h-24 bg-white border border-dashed border-gray-300 rounded-lg flex items-center justify-center overflow-hidden">
                                    @if(!empty($settings['hubungi_telegram_image']))
                                        <img src="{{ asset('storage/hubungi/' . $settings['hubungi_telegram_image']) }}" alt="Gambar Telegram" class="max-h-full max-w-full object-contain">
                                    @else
                                        <span class="text-gray-400 text-sm">Preview Telegram</span>
                                    @endif
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload Gambar Telegram</label>
                                    <input type="file" name="hubungi_telegram_image" accept="image/png,image/jpeg,image/jpg,image/svg+xml,image/webp" class="block w-full text-sm text-gray-500 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Link Telegram</label>
                                    <input type="url" name="hubungi_telegram_url" value="{{ $settings['hubungi_telegram_url'] ?? '' }}" placeholder="https://t.me/yourusername" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                </div>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">WhatsApp</h3>
                            <div class="space-y-4">
                                <div class="w-full h-24 bg-white border border-dashed border-gray-300 rounded-lg flex items-center justify-center overflow-hidden">
                                    @if(!empty($settings['hubungi_whatsapp_image']))
                                        <img src="{{ asset('storage/hubungi/' . $settings['hubungi_whatsapp_image']) }}" alt="Gambar WhatsApp" class="max-h-full max-w-full object-contain">
                                    @else
                                        <span class="text-gray-400 text-sm">Preview WhatsApp</span>
                                    @endif
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload Gambar WhatsApp</label>
                                    <input type="file" name="hubungi_whatsapp_image" accept="image/png,image/jpeg,image/jpg,image/svg+xml,image/webp" class="block w-full text-sm text-gray-500 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Link WhatsApp</label>
                                    <input type="url" name="hubungi_whatsapp_url" value="{{ $settings['hubungi_whatsapp_url'] ?? '' }}" placeholder="https://wa.me/628123456789" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 pt-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <p class="text-sm text-gray-500">Format yang didukung: JPG, PNG, SVG, WEBP. Ukuran maksimal 5MB.</p>
                        <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg bg-indigo-600 text-white text-sm font-semibold shadow-sm hover:bg-indigo-500 transition-colors">
                            <i class="fas fa-save mr-2"></i> Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script id="paymentMethodTemplate" type="text/template">
        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4" data-payment-method>
            <div class="flex flex-col lg:flex-row gap-4 lg:items-center">
                <div class="w-full lg:w-40 h-24 bg-white border border-dashed border-gray-300 rounded-lg flex items-center justify-center text-gray-400 text-sm">
                    Preview Gambar
                </div>
                <div class="flex-1 grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="payment_methods[__INDEX__][status]" class="w-full border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                            <option value="online">Online</option>
                            <option value="offline" selected>Offline</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Unggah Gambar</label>
                        <input type="file" name="payment_methods[__INDEX__][image]" accept="image/png,image/jpeg,image/svg+xml,image/webp" class="block w-full text-sm text-gray-500 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
                    </div>
                </div>
                <div class="flex lg:flex-col lg:items-end">
                    <button type="button" class="inline-flex items-center px-3 py-2 rounded-lg text-sm font-semibold text-red-600 hover:bg-red-50 transition-colors" data-action="remove-method">
                        <i class="fas fa-trash-alt mr-1"></i> Hapus
                    </button>
                </div>
            </div>
        </div>
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', () => {
                    sidebar.classList.toggle('-translate-x-full');
                    sidebarOverlay.classList.toggle('hidden');
                });
            }

            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', () => {
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                });
            }

            const paymentMethodsList = document.getElementById('paymentMethodsList');
            const addButton = document.getElementById('addPaymentMethodBtn');
            const template = document.getElementById('paymentMethodTemplate').innerHTML.trim();
            const removedContainer = document.getElementById('removedPaymentMethods');
            let methodIndex = {{ count($paymentMethods) }};

            const bindRemoveHandlers = (scope) => {
                const target = scope || paymentMethodsList;
                target.querySelectorAll('[data-action="remove-method"]').forEach(button => {
                    button.addEventListener('click', () => {
                        const wrapper = button.closest('[data-payment-method]');
                        if (!wrapper) return;
                        const existingInput = wrapper.querySelector('input[data-existing-image]');
                        if (existingInput && existingInput.value) {
                            const hidden = document.createElement('input');
                            hidden.type = 'hidden';
                            hidden.name = 'payment_methods_removed[]';
                            hidden.value = existingInput.value;
                            removedContainer.appendChild(hidden);
                        }
                        wrapper.remove();
                    }, { once: true });
                });
            };

            bindRemoveHandlers();

            if (addButton) {
                addButton.addEventListener('click', () => {
                    const html = template.replace(/__INDEX__/g, methodIndex);
                    const temp = document.createElement('div');
                    temp.innerHTML = html;
                    const element = temp.firstElementChild;
                    paymentMethodsList.appendChild(element);
                    bindRemoveHandlers(element);
                    methodIndex++;
                });
            }
        });
    </script>
</body>
</html>
