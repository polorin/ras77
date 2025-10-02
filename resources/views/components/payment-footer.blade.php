@php
    $paymentMethods = $paymentMethods ?? ($settings['payment_methods'] ?? []);
@endphp

@if(!empty($paymentMethods))
    <section class="payment-methods relative z-10">
        <h2 class="payment-methods__title">Metode Pembayaran</h2>
        <div class="payment-methods__grid">
            @foreach($paymentMethods as $method)
                @php
                    $isOnline = ($method['status'] ?? 'offline') === 'online';
                    $imagePath = !empty($method['image']) ? asset('storage/payment-methods/' . $method['image']) : null;
                @endphp

                @if($imagePath)
                    <article class="payment-methods__item">
                        <span class="payment-methods__status {{ $isOnline ? 'payment-methods__status--online' : 'payment-methods__status--offline' }}" aria-hidden="true"></span>
                        <img src="{{ $imagePath }}" alt="Metode pembayaran" loading="lazy">
                        <span class="sr-only">Metode pembayaran {{ $isOnline ? 'aktif' : 'nonaktif' }}</span>
                    </article>
                @endif
            @endforeach
        </div>
    </section>
@endif

<div class="text-white py-6">
    <div class="text-center mb-4">
        <h2 class="uppercase tracking-wide text-base font-arialbold font-bold">Tetap Terhubung Dengan Kami</h2>
    </div>
    <div class="flex justify-center space-x-6 text-2xl">
        <a href="https://facebook.com" target="_blank" class="text-white hover:text-blue-500">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://t.me" target="_blank" class="text-white hover:text-blue-400">
            <i class="fab fa-telegram-plane"></i>
        </a>
        <a href="https://instagram.com" target="_blank" class="text-white hover:text-pink-500">
            <i class="fab fa-instagram"></i>
        </a>
    </div>
</div>

<footer class="bg-[#1c1c1c] text-white text-sm">
    <div class="max-w-screen-lg mx-auto flex flex-row justify-center items-center divide-x divide-gray-500 text-center overflow-x-auto">
        <a href="#" class="px-4 py-3 leading-tight whitespace-nowrap">
            Tentang <br> RAS77
        </a>

        <a href="#" class="px-4 py-3 leading-tight whitespace-nowrap">
            Responsible <br> Gambling
        </a>

        <a href="#" class="px-4 py-3 leading-tight whitespace-nowrap">
            Pusat Bantuan
        </a>

        <a href="#" class="px-4 py-3 leading-tight whitespace-nowrap">
            Syarat dan <br> Ketentuan
        </a>
    </div>
</footer>

<section class="text-white py-10 px-5">
    <div class="max-w-screen-lg mx-auto space-y-10">
        <div class="text-center space-y-4 max-w-screen-md mx-auto">
            <h2 class="text-2xl md:text-3xl font-bold leading-snug">
                RAS77: Semua <br class="md:hidden">
                Permainan Favorit <br class="md:hidden">
                dalam Satu Akun
            </h2>
            <p class="text-gray-300 text-sm md:text-base leading-relaxed">
                RAS77 adalah platform game online yang memang dirancang untuk memberikan pengalaman bermain yang sangat simpel serta seru.
                Tak hanya fokus pada slot saja, situs kami juga menawarkan banyak pilihan permainan seperti live casino, togel, taruhan bola,
                dan game arcade—semua bisa diakses hanya dengan satu akun.
            </p>
        </div>

        <div class="space-y-4 max-w-screen-md mx-auto">
            <h3 class="text-lg font-semibold uppercase">Mengapa Memilih RAS77?</h3>
            <ul class="list-decimal list-inside space-y-2 text-gray-300 text-sm md:text-base leading-relaxed">
                <li>Lengkap &amp; simpel: satu akun untuk seluruh game apapun.</li>
                <li>Keamanan terjamin: informasi pengguna dilindungi enkripsi canggih.</li>
                <li>Mudah diakses: dapat dimainkan lewat HP atau desktop dengan tampilan yang keren.</li>
                <li>Fairplay: mekanisme RNG menjamin permainan yang sangat adil dan transparan.</li>
                <li>Layanan 24 jam: bantuan member tersedia 24 jam tanpa henti.</li>
            </ul>
        </div>

        <div class="space-y-6">
            <h3 class="text-base font-semibold uppercase tracking-wide text-center">
                Perbandingan RAS77 dengan Situs Lain
            </h3>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-600 text-sm md:text-base">
                    <thead>
                        <tr class="bg-white text-black text-left">
                            <th class="px-4 py-3 border border-gray-600">Fitur</th>
                            <th class="px-4 py-3 border border-gray-600">RAS77</th>
                            <th class="px-4 py-3 border border-gray-600">Situs Lain</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-300">
                        <tr class="bg-[#2a2a2a]">
                            <td class="px-4 py-3 border border-gray-600">Pilihan Permainan</td>
                            <td class="px-4 py-3 border border-gray-600">Sangat lengkap</td>
                            <td class="px-4 py-3 border border-gray-600">Biasanya terbatas</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 border border-gray-600">Sertifikasi Fairplay</td>
                            <td class="px-4 py-3 border border-gray-600">Resmi &amp; adil (RNG)</td>
                            <td class="px-4 py-3 border border-gray-600">Kurang jelas</td>
                        </tr>
                        <tr class="bg-[#2a2a2a]">
                            <td class="px-4 py-3 border border-gray-600">Akses via Perangkat</td>
                            <td class="px-4 py-3 border border-gray-600">Responsif untuk semua</td>
                            <td class="px-4 py-3 border border-gray-600">Kurang optimal</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 border border-gray-600">Layanan Bantuan</td>
                            <td class="px-4 py-3 border border-gray-600">24 jam / setiap hari</td>
                            <td class="px-4 py-3 border border-gray-600">Tidak selalu konsisten</td>
                        </tr>
                        <tr class="bg-[#2a2a2a]">
                            <td class="px-4 py-3 border border-gray-600">Bonus &amp; Event</td>
                            <td class="px-4 py-3 border border-gray-600">Banyak dan menarik</td>
                            <td class="px-4 py-3 border border-gray-600">Terbatas atau jarang</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="text-gray-300 text-sm md:text-base leading-relaxed text-center">
                Kalau Anda sedang mencari situs yang aman, lengkap, dan mudah dimainkan,
                <span class="font-semibold text-white">RAS77</span> merupakan pilihan yang sempurna.
                Selain menyediakan banyak jenis permainan, kami juga menawarkan kenyamanan dengan sistem terbaru
                dan pelayanan yang siap membantu Anda 24 jam.
            </p>
        </div>
    </div>
</section>

<footer class="bg-[#181818] text-gray-400 text-center py-5">
    <p class="text-sm md:text-base">
        © 2025 <span class="text-white font-semibold">RAS77</span>. Semua hak cipta dilindungi.
    </p>
</footer>

@once
    <style>
        .payment-methods {
            margin-top: 2.5rem;
            position: relative;
            z-index: 10;
        }

        .payment-methods__title {
            margin: 0 0 1.1rem;
            color: #f8fafc;
            font-family: Arial, sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            text-align: center;
        }

        .payment-methods__grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            column-gap: 0.75rem;
            row-gap: 0.65rem;
            justify-items: center;
        }

        .payment-methods__item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
        }

        .payment-methods__item img {
            width: 112px;
            height: 42px;
            object-fit: contain;
        }

        .payment-methods__status {
            width: 4px;
            min-width: 4px;
            height: 38px;
            border-radius: 9999px;
            background: #475569;
        }

        .payment-methods__status--online {
            background: #22c55e;
        }

        .payment-methods__status--offline {
            background: #ef4444;
        }

        @media (max-width: 1024px) {
            .payment-methods__grid {
                column-gap: 0.6rem;
                row-gap: 0.5rem;
            }

            .payment-methods__item img {
                width: 100px;
                height: 38px;
            }

            .payment-methods__status {
                height: 32px;
            }
        }

        @media (max-width: 768px) {
            .payment-methods__grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
                column-gap: 0.5rem;
                row-gap: 0.45rem;
            }

            .payment-methods__item img {
                width: 92px;
                height: 34px;
            }

            .payment-methods__status {
                height: 28px;
            }
        }

        @media (max-width: 480px) {
            .payment-methods__title {
                font-size: 1.1rem;
                letter-spacing: 0.08em;
                text-align: center;
            }

            .payment-methods__grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
                column-gap: 0.45rem;
                row-gap: 0.4rem;
            }

            .payment-methods__item img {
                width: 78px;
                height: 30px;
            }

            .payment-methods__status {
                height: 24px;
            }
        }
    </style>
@endonce
