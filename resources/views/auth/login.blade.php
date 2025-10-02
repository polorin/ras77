@extends('layouts.main')

@section('title', 'Masuk Akun')

@section('content')
    @php
        $accentColor = $settings['sidebar_menu_bg_color'] ?? '#d77f03';
    @endphp
    <div class="max-w-lg mx-auto px-4 py-16">
        <div class="rounded-xl border border-gray-800 bg-transparent shadow-lg overflow-hidden">
            <div class="px-6 py-4 text-white font-semibold text-lg tracking-wide" style="background-color: {{ $accentColor }};">
                Masuk Akun
            </div>
            <div class="px-6 py-8 space-y-6">
                @if ($errors->login->any())
                    <div class="rounded-lg border border-red-500/60 bg-red-500/10 px-4 py-3 text-sm text-red-200">
                        {{ $errors->login->first() }}
                    </div>
                @elseif ($errors->any())
                    <div class="rounded-lg border border-red-500/60 bg-red-500/10 px-4 py-3 text-sm text-red-200">
                        {{ $errors->first() }}
                    </div>
                @endif

                @if (session('status'))
                    <div class="rounded-lg border border-green-500/60 bg-green-500/10 px-4 py-3 text-sm text-green-200">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm text-gray-200 font-medium" for="login-page-username">Nama Pengguna</label>
                        <input id="login-page-username" type="text" name="username" autocomplete="username" required value="{{ old('username') }}"
                               class="mt-2 w-full rounded-lg border border-gray-700 bg-transparent px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-400"
                               placeholder="Masukkan nama pengguna">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-200 font-medium" for="login-page-password">Kata Sandi</label>
                        <div class="mt-2 relative">
                            <input id="login-page-password" type="password" name="password" autocomplete="current-password" required
                                   class="w-full rounded-lg border border-gray-700 bg-transparent px-4 py-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-400"
                                   placeholder="Masukkan kata sandi">
                        </div>
                    </div>

                    <div class="flex items-center justify-between text-sm text-gray-300">
                        <label class="inline-flex items-center space-x-2">
                            <input type="checkbox" name="remember" class="rounded border-gray-600 bg-transparent text-orange-400 focus:ring-orange-400">
                            <span>Ingat saya</span>
                        </label>
                        <a href="#" class="text-orange-400 hover:text-yellow-300">Lupa sandi?</a>
                    </div>

                    <button type="submit"
                            class="w-full rounded-lg py-3 text-sm font-semibold text-white hover:opacity-90"
                            style="background-color: {{ $accentColor }};">
                        Masuk
                    </button>
                </form>

                <p class="text-center text-xs text-gray-400">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-semibold text-orange-400 hover:text-yellow-300">Daftar Sekarang</a>
                </p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.DISABLE_LOGIN_MODAL_AUTO_OPEN = true;
    </script>
@endpush
