@extends('layouts.main')

@section('title', 'Hubungi Kami - RAS77')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-4xl mb-10">
    @php
        $hasTelegram = !empty($settings['hubungi_telegram_image']);
        $hasWhatsapp = !empty($settings['hubungi_whatsapp_image']);
        $gridCols = ($hasTelegram && $hasWhatsapp) ? 'grid-cols-2' : 'grid-cols-1 sm:grid-cols-2';
    @endphp

    <!-- Gambar Utama dengan overlay label -->
    @if(!empty($settings['hubungi_main_image']))
        <div class="mb-8">
            <div class="relative rounded-2xl overflow-hidden shadow-lg">
                <img src="{{ asset('storage/hubungi/' . $settings['hubungi_main_image']) }}"
                     alt="Hubungi Kami"
                     class="w-full h-52 sm:h-64 lg:h-80 object-cover">
                <x-hubungi.support-badge />
            </div>
        </div>
    @endif

    <!-- Gambar Telegram dan WhatsApp - prioritas tampilan mobile -->
    <div class="grid {{ $gridCols }} gap-4 max-w-xl sm:max-w-2xl mx-auto">
        <!-- Telegram -->
        @if($hasTelegram)
            <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300">
                @if(!empty($settings['hubungi_telegram_url']))
                    <a href="{{ $settings['hubungi_telegram_url'] }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="block">
                        <div class="relative aspect-[4/3]">
                            <img src="{{ asset('storage/hubungi/' . $settings['hubungi_telegram_image']) }}"
                                 alt="Telegram"
                                 class="w-full h-full object-cover transition-all duration-300 group-hover:brightness-110">
                            <x-hubungi.support-badge small />
                        </div>
                    </a>
                @else
                    <div class="relative aspect-[4/3]">
                        <img src="{{ asset('storage/hubungi/' . $settings['hubungi_telegram_image']) }}"
                             alt="Telegram"
                             class="w-full h-full object-cover">
                        <x-hubungi.support-badge small />
                    </div>
                @endif
            </div>
        @endif

        <!-- WhatsApp -->
        @if($hasWhatsapp)
            <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-lg transition-all duration-300">
                @if(!empty($settings['hubungi_whatsapp_url']))
                    <a href="{{ $settings['hubungi_whatsapp_url'] }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="block">
                        <div class="relative aspect-[4/3]">
                            <img src="{{ asset('storage/hubungi/' . $settings['hubungi_whatsapp_image']) }}"
                                 alt="WhatsApp"
                                 class="w-full h-full object-cover transition-all duration-300 group-hover:brightness-110">
                            <x-hubungi.support-badge small />
                        </div>
                    </a>
                @else
                    <div class="relative aspect-[4/3]">
                        <img src="{{ asset('storage/hubungi/' . $settings['hubungi_whatsapp_image']) }}"
                             alt="WhatsApp"
                             class="w-full h-full object-cover">
                        <x-hubungi.support-badge small />
                    </div>
                @endif
            </div>
        @endif
    </div>

    <!-- Fallback jika tidak ada gambar -->
    @if(empty($settings['hubungi_main_image']) && empty($settings['hubungi_telegram_image']) && empty($settings['hubungi_whatsapp_image']))
        <div class="text-center py-12">
            <div class="bg-gray-800 rounded-2xl p-8 mx-auto max-w-lg">
                <i class="fas fa-comments text-4xl text-yellow-500 mb-4"></i>
                <h2 class="text-xl font-bold text-white mb-3">Hubungi Kami</h2>
                <p class="text-gray-300 mb-4 text-sm">Silakan hubungi admin untuk mengatur gambar dan link pada halaman ini.</p>
                <div class="space-y-2">
                    <p class="text-xs text-gray-400">
                        <i class="fas fa-cog mr-2"></i>
                        Pengaturan dapat diatur di Admin Panel → Settings → Pengaturan Umum
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>

@push('styles')
<style>
    /* Animasi hover untuk gambar */
    .group:hover img {
        transform: scale(1.02);
    }

    /* Smooth scroll untuk mobile */
    @media (max-width: 768px) {
        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }

    /* Loading animation untuk gambar */
    img {
        transition: all 0.3s ease;
    }

    img:not([src]) {
        opacity: 0;
    }
</style>
@endpush

@push('scripts')
<script>
    // Lazy loading untuk gambar
    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('img[data-src]');

        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('opacity-0');
                    observer.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));

        // Smooth hover effects
        const linkElements = document.querySelectorAll('a[target="_blank"]');
        linkElements.forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });

            link.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>
@endpush
@endsection
