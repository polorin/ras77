@extends('layouts.main')

@section('title', 'RAS77 - Situs Slot Online No.1 Indonesia')

@section('content')
    <!-- Info Bar -->
<div class="text-white py-2 px-4" style="background-color: rgb(215, 127, 3);">
        <div class="flex items-center justify-center space-x-2 text-xs md:text-sm">
            <i class="fas fa-volume-up"></i>
        <div class="overflow-hidden whitespace-nowrap">
            <div class="animate-scroll">
                RAS77 SB Salam webku! Ayo main sekarang JUGA! Bermain dengan permainan yang telah dikelolrimpengaman dari
            </div>
        </div>
        </div>
    </div>


    <!-- Image Slider -->
<div class="relative overflow-hidden w-full">
    <div class="slider-container h-48 sm:h-56 md:h-64 lg:h-80 xl:h-96 w-full">
            @if(isset($settings['slider_images']) && !empty($settings['slider_images']))
            <div id="imageSlider" class="relative h-full w-full">
                    @foreach($settings['slider_images'] as $index => $image)
                        <div class="slider-item {{ $index === 0 ? 'active' : '' }} absolute inset-0 transition-opacity duration-1000">
                            <img src="{{ asset('storage/sliders/' . $image) }}"
                             alt="Slider {{ $index + 1 }}"
                             class="w-full h-full object-cover sm:object-contain md:object-cover">
                        </div>
                    @endforeach

                    <!-- Slider dots -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                        @foreach($settings['slider_images'] as $index => $image)
                        <button class="slider-dot w-3 h-3 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-white bg-opacity-50' }} shadow-lg"
                                    data-slide="{{ $index }}"></button>
                        @endforeach
                    </div>
                </div>
            @else
                <!-- Default slider jika belum ada gambar -->
            <div class="bg-gradient-to-r from-purple-600 to-blue-600 h-full flex items-center">
                <div class="text-center w-full px-4">
                    <h1 class="text-xl sm:text-2xl md:text-4xl lg:text-5xl font-bold mb-2 text-white">
                            HADIAH KEJUTAN<br>
                        <span class="text-2xl sm:text-3xl md:text-5xl lg:text-6xl text-yellow-400">SETIAP HARI</span>
                        </h1>
                    <p class="text-sm sm:text-lg md:text-xl text-gray-200">KLAIM SEKARANG JUGA</p>
                    <p class="text-xs sm:text-sm md:text-base mt-2 text-gray-300">Dapatkan bonus menarik setiap harinya</p>
                </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Action Buttons -->
    @guest
        <div class="grid grid-cols-2">
            <button onclick="window.location.href='{{ route('register') }}'"
                class="text-white font-bold py-3 px-4 hover:opacity-90 transition-opacity"
                style="background-color: rgb(215, 127, 3);">
                Daftar
            </button>
            <button type="button" data-login-modal-trigger
                class="bg-gray-700 text-white font-bold py-3 px-4 hover:bg-gray-800 transition-colors">
                Masuk
            </button>
        </div>
    @endguest

<!-- Jackpot Play Section -->
<div class="py-4">
    <!-- Jackpot Play Text dengan Logo Pragmatic diatas kata PLAY -->
    <div class="text-center mb-2">
        <div class="jackpot-play-text flex items-end justify-center space-x-3">
            <!-- Teks JACKPOT -->
            <span class="font-black text-3xl md:text-4xl lg:text-5xl xl:text-6xl uppercase tracking-wide" style="color: #fd6f16;">
                JACKPOT
            </span>

            <!-- Container untuk Logo + PLAY -->
            <div class="flex flex-col items-center">
                <!-- Logo Pragmatic Play diatas PLAY -->
                @if(!empty($settings['pragmatic_logo']))
                    <img src="{{ asset('storage/logos/' . $settings['pragmatic_logo']) }}"
                         alt="Pragmatic Play"
                         class="h-8 md:h-10 lg:h-12 xl:h-14 mb-1">
                @else
                    <!-- Default Pragmatic Play styled logo -->
                    <div class="bg-gradient-to-r from-red-600 to-orange-500 px-3 py-1.5 rounded text-sm md:text-base mb-1">
                        <span class="text-white font-bold tracking-wide">PRAGMATIC</span>
                    </div>
                @endif

                <!-- Teks PLAY berwarna biru -->
                <span class="font-black text-3xl md:text-4xl lg:text-5xl xl:text-6xl uppercase tracking-wide text-blue-500">
                    PLAY
                </span>
            </div>
        </div>
    </div>

    <!-- Progressive Jackpot - Full width ke samping layar -->
    <div class="mb-1">
        <div class="jackpot-display-container">
            <!-- Outer orange border -->
            <div class="jackpot-outer-border">
                <!-- Inner black container with LED dots -->
                <div class="jackpot-inner-black">
                    <!-- LED dots pattern -->
                    <div class="led-dots-container">
                        <!-- Top dots -->
                        <div class="led-dots-top">
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                        </div>

                        <!-- Bottom dots -->
                        <div class="led-dots-bottom">
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                        </div>

                        <!-- Left dots -->
                        <div class="led-dots-left">
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                        </div>

                        <!-- Right dots -->
                        <div class="led-dots-right">
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                            <div class="led-dot"></div>
                        </div>
                    </div>

                    <!-- Jackpot text display -->
                    <div class="jackpot-text-display">
                        <span class="idr-text">IDR</span> <span id="progressive_jackpot">8.960.069.342</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Game Categories Slide Menu -->
<div class="game-categories-container">
    <div class="game-categories-slider" style="background-color: {{ $settings['game_menu_bg_color'] ?? '#1a1a1a' }};">
        <!-- Navigation Arrow Left -->
        <button class="game-nav-arrow game-nav-left" id="gameNavLeft">
            <i class="fas fa-chevron-left"></i>
        </button>

        <!-- Navigation Arrow Right -->
        <button class="game-nav-arrow game-nav-right" id="gameNavRight">
            <i class="fas fa-chevron-right"></i>
        </button>

        <div class="game-categories-track" id="gameSlider">
            <!-- Hot Games -->
            <div class="game-category-item">
                @if(isset($settings['icon_hot_games']) && $settings['icon_hot_games'])
                    <img src="{{ asset('storage/game-icons/' . $settings['icon_hot_games']) }}" alt="Hot Games" class="category-icon">
                @else
                    <i class="fas fa-fire category-icon-default"></i>
                @endif
                <span class="category-label">HOT GAMES</span>
            </div>

            <!-- Slots -->
            <div class="game-category-item">
                @if(isset($settings['icon_slots']) && $settings['icon_slots'])
                    <img src="{{ asset('storage/game-icons/' . $settings['icon_slots']) }}" alt="Slots" class="category-icon">
                @else
                    <i class="fas fa-coins category-icon-default"></i>
                @endif
                <span class="category-label">SLOTS</span>
            </div>

            <!-- Race -->
            <div class="game-category-item">
                @if(isset($settings['icon_race']) && $settings['icon_race'])
                    <img src="{{ asset('storage/game-icons/' . $settings['icon_race']) }}" alt="Race" class="category-icon">
                @else
                    <i class="fas fa-flag-checkered category-icon-default"></i>
                @endif
                <span class="category-label">RACE</span>
            </div>

            <!-- Togel -->
            <div class="game-category-item">
                @if(isset($settings['icon_togel']) && $settings['icon_togel'])
                    <img src="{{ asset('storage/game-icons/' . $settings['icon_togel']) }}" alt="Togel" class="category-icon">
                @else
                    <i class="fas fa-hashtag category-icon-default"></i>
                @endif
                <span class="category-label">TOGEL</span>
            </div>

            <!-- Olahraga -->
            <div class="game-category-item">
                @if(isset($settings['icon_olahraga']) && $settings['icon_olahraga'])
                    <img src="{{ asset('storage/game-icons/' . $settings['icon_olahraga']) }}" alt="Olahraga" class="category-icon">
                @else
                    <i class="fas fa-futbol category-icon-default"></i>
                @endif
                <span class="category-label">OLAHRAGA</span>
            </div>

            <!-- Crash Game -->
            <div class="game-category-item">
                @if(isset($settings['icon_crashgame']) && $settings['icon_crashgame'])
                    <img src="{{ asset('storage/game-icons/' . $settings['icon_crashgame']) }}" alt="Crash Game" class="category-icon">
                @else
                    <i class="fas fa-chart-line category-icon-default"></i>
                @endif
                <span class="category-label">CRASH GAME</span>
            </div>

            <!-- Arcade -->
            <div class="game-category-item">
                @if(isset($settings['icon_arcade']) && $settings['icon_arcade'])
                    <img src="{{ asset('storage/game-icons/' . $settings['icon_arcade']) }}" alt="Arcade" class="category-icon">
                @else
                    <i class="fas fa-gamepad category-icon-default"></i>
                @endif
                <span class="category-label">ARCADE</span>
            </div>

            <!-- Poker -->
            <div class="game-category-item">
                @if(isset($settings['icon_poker']) && $settings['icon_poker'])
                    <img src="{{ asset('storage/game-icons/' . $settings['icon_poker']) }}" alt="Poker" class="category-icon">
                @else
                    <i class="fas fa-diamond category-icon-default"></i>
                @endif
                <span class="category-label">POKER</span>
            </div>

            <!-- Esports -->
            <div class="game-category-item">
                @if(isset($settings['icon_esports']) && $settings['icon_esports'])
                    <img src="{{ asset('storage/game-icons/' . $settings['icon_esports']) }}" alt="Esports" class="category-icon">
                @else
                    <i class="fas fa-trophy category-icon-default"></i>
                @endif
                <span class="category-label">ESPORTS</span>
            </div>

            <!-- Sabung Ayam -->
            <div class="game-category-item">
                @if(isset($settings['icon_sabung_ayam']) && $settings['icon_sabung_ayam'])
                    <img src="{{ asset('storage/game-icons/' . $settings['icon_sabung_ayam']) }}" alt="Sabung Ayam" class="category-icon">
                @else
                    <i class="fas fa-crow category-icon-default"></i>
                @endif
                <span class="category-label">SABUNG AYAM</span>
            </div>
        </div>
    </div>

<!-- Main Content -->
<div class="container mx-auto px-4 py-4">
    <!-- Header Game Populer -->
    <div class="game-populer-header inline-block">
        <div class="header-bg px-4 py-2">
            <h2 class="section-title">Game Populer</h2>
        </div>
    </div>

    <!-- Panel Game Populer -->
    <div class="popular-games-panel">
        <button type="button" class="popular-games-nav popular-games-nav--left" aria-label="Geser game populer ke kiri">
            <i class="fas fa-chevron-left"></i>
        </button>
        <div class="popular-games-track">
            <div class="popular-games-grid">
                <?php if(isset($popularGames) && count($popularGames) > 0): ?>
                    <?php foreach($popularGames as $game): ?>
                        <article class="popular-game-card">
                            <div class="popular-game-thumb">
                                <?php if(filter_var($game['image'], FILTER_VALIDATE_URL)): ?>
                                    <img src="<?php echo htmlspecialchars($game['image']); ?>" alt="<?php echo htmlspecialchars($game['name']); ?>" class="popular-game-image">
                                <?php else: ?>
                                    <img src="<?php echo asset('storage/games/' . $game['image']); ?>" alt="<?php echo htmlspecialchars($game['name']); ?>" class="popular-game-image">
                                <?php endif; ?>
                                <div class="popular-game-overlay">
                                    <span class="popular-game-cta">Main</span>
                                </div>
                            </div>
                            <div class="popular-game-info">
                                <h3 class="popular-game-name"><?php echo htmlspecialchars($game['name']); ?></h3>
                            </div>
                        </article>
                <?php
                    endforeach;
                else:
                    $defaultGames = [
                        ['name' => 'Sweet Bonanza', 'icon' => 'fa-candy-cane'],
                        ['name' => 'Mahjong Wins', 'icon' => 'fa-dice'],
                        ['name' => 'Sticky Bandits', 'icon' => 'fa-hat-cowboy'],
                        ['name' => 'Sugai', 'icon' => 'fa-fish'],
                        ['name' => 'Mahjong Ways', 'icon' => 'fa-dice'],
                        ['name' => 'Wukong Blaze', 'icon' => 'fa-dragon'],
                        ['name' => 'Bang Gacor', 'icon' => 'fa-bomb'],
                        ['name' => 'Fortuna', 'icon' => 'fa-gem']
                    ];

                    foreach($defaultGames as $game):
                ?>
                    <article class="popular-game-card">
                        <div class="popular-game-thumb popular-game-thumb--placeholder">
                            <div class="popular-game-placeholder">
                                <i class="fas <?php echo $game['icon']; ?>"></i>
                            </div>
                            <div class="popular-game-overlay">
                                <span class="popular-game-cta">Main</span>
                            </div>
                        </div>
                        <div class="popular-game-info">
                            <h3 class="popular-game-name"><?php echo htmlspecialchars($game['name']); ?></h3>
                        </div>
                    </article>
                <?php
                    endforeach;
                endif;
                ?>
                </div>
            </div>
            <button type="button" class="popular-games-nav popular-games-nav--right" aria-label="Geser game populer ke kanan">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Image Slider
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('imageSlider');
        if (slider) {
            const slides = slider.querySelectorAll('.slider-item');
            const dots = slider.parentElement.querySelectorAll('.slider-dot');
            let currentSlide = 0;

            function showSlide(index) {
                // Hide all slides
                slides.forEach((slide, i) => {
                    slide.classList.remove('active');
                    slide.style.opacity = i === index ? '1' : '0';
                });

                // Update dots
                dots.forEach((dot, i) => {
                    if (i === index) {
                        dot.classList.remove('bg-white', 'bg-opacity-50');
                        dot.classList.add('bg-white');
                    } else {
                        dot.classList.remove('bg-white');
                        dot.classList.add('bg-white', 'bg-opacity-50');
                    }
                });
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }

            // Add click event to dots
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    currentSlide = index;
                    showSlide(currentSlide);
                });
            });

            // Auto slide every 5 seconds
            if (slides.length > 1) {
                setInterval(nextSlide, 5000);
            }
        }

        // Popular games horizontal controls
        const popularTrack = document.querySelector('.popular-games-track');
        const popularNavLeft = document.querySelector('.popular-games-nav--left');
        const popularNavRight = document.querySelector('.popular-games-nav--right');

        const scrollPopularGames = (direction) => {
            if (!popularTrack) return;
            const step = Math.max(popularTrack.clientWidth * 0.8, 220);
            popularTrack.scrollBy({ left: direction * step, behavior: 'smooth' });
        };

        if (popularNavLeft) {
            popularNavLeft.addEventListener('click', () => scrollPopularGames(-1));
        }

        if (popularNavRight) {
            popularNavRight.addEventListener('click', () => scrollPopularGames(1));
        }

        // Jackpot Counter Animation - mirip website asli
        function animateJackpotCounter() {
            const counter = document.getElementById('progressive_jackpot');
            if (counter) {
                const currentValue = parseFloat(counter.textContent.replace(/\./g, ''));
                const increment = Math.random() * 50000 + 10000; // Random increment between 10k-60k
                const newValue = currentValue + increment;

                // Format with dots as thousand separators
                counter.textContent = newValue.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
        }

        // Update jackpot every 2 seconds
        setInterval(animateJackpotCounter, 2000);

        // Game Categories Slider
        let gameSliderPosition = 0;
        let isDragging = false;
        let startX = 0;
        let currentX = 0;
        let initialPosition = 0;
        const enableGameAutoSlide = false;
        let autoSlideInterval = null;

        const gameSlider = document.getElementById('gameSlider');
        const gameNavLeft = document.getElementById('gameNavLeft');
        const gameNavRight = document.getElementById('gameNavRight');
        const gameItems = gameSlider.querySelectorAll('.game-category-item');
        const itemWidth = 120; // Width of each item + margin
        const totalItems = gameItems.length;
        const visibleItems = Math.floor(window.innerWidth / itemWidth);
        const maxPosition = -(totalItems - visibleItems) * itemWidth;

        function updateSliderPosition() {
            gameSlider.style.transform = `translateX(${gameSliderPosition}px)`;
        }

        function slideLeft() {
            gameSliderPosition += itemWidth;
            if (gameSliderPosition > 0) {
                gameSliderPosition = maxPosition;
            }
            updateSliderPosition();
        }

        function slideRight() {
            gameSliderPosition -= itemWidth;
            if (gameSliderPosition < maxPosition) {
                gameSliderPosition = 0;
            }
            updateSliderPosition();
        }

        function autoSlideGames() {
            if (!isDragging) {
                slideRight();
            }
        }

        // Touch/Mouse events for manual sliding
        gameSlider.addEventListener('mousedown', (e) => {
            isDragging = true;
            startX = e.clientX;
            initialPosition = gameSliderPosition;
            gameSlider.style.cursor = 'grabbing';
            gameSlider.style.transition = 'none';
        });

        gameSlider.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            e.preventDefault();
            currentX = e.clientX;
            const diff = startX - currentX;
            gameSliderPosition = initialPosition - diff;
            updateSliderPosition();
        });

        gameSlider.addEventListener('mouseup', () => {
            if (!isDragging) return;
            isDragging = false;
            gameSlider.style.cursor = 'grab';
            gameSlider.style.transition = 'transform 0.5s ease-in-out';

            // Snap to nearest item
            const snapPosition = Math.round(gameSliderPosition / itemWidth) * itemWidth;
            gameSliderPosition = Math.max(maxPosition, Math.min(0, snapPosition));
            updateSliderPosition();
        });

        gameSlider.addEventListener('mouseleave', () => {
            if (isDragging) {
                isDragging = false;
                gameSlider.style.cursor = 'grab';
                gameSlider.style.transition = 'transform 0.5s ease-in-out';

                // Snap to nearest item
                const snapPosition = Math.round(gameSliderPosition / itemWidth) * itemWidth;
                gameSliderPosition = Math.max(maxPosition, Math.min(0, snapPosition));
                updateSliderPosition();
            }
        });

        // Touch events for mobile
        gameSlider.addEventListener('touchstart', (e) => {
            isDragging = true;
            startX = e.touches[0].clientX;
            initialPosition = gameSliderPosition;
            gameSlider.style.transition = 'none';
        });

        gameSlider.addEventListener('touchmove', (e) => {
            if (!isDragging) return;
            e.preventDefault();
            currentX = e.touches[0].clientX;
            const diff = startX - currentX;
            gameSliderPosition = initialPosition - diff;
            updateSliderPosition();
        });

        gameSlider.addEventListener('touchend', () => {
            if (!isDragging) return;
            isDragging = false;
            gameSlider.style.transition = 'transform 0.5s ease-in-out';

            // Snap to nearest item
            const snapPosition = Math.round(gameSliderPosition / itemWidth) * itemWidth;
            gameSliderPosition = Math.max(maxPosition, Math.min(0, snapPosition));
            updateSliderPosition();
        });

        // Navigation arrows
        gameNavLeft.addEventListener('click', () => {
            slideLeft();
        });

        gameNavRight.addEventListener('click', () => {
            slideRight();
        });

        // Auto slide every 5 seconds (increased from 3)
        if (enableGameAutoSlide && totalItems > visibleItems) {
            autoSlideInterval = setInterval(autoSlideGames, 5000);
        }

        // Pause auto slide on hover/touch
        gameSlider.addEventListener('mouseenter', () => {
            if (enableGameAutoSlide && autoSlideInterval) {
                clearInterval(autoSlideInterval);
            }
        });

        gameSlider.addEventListener('mouseleave', () => {
            if (enableGameAutoSlide && totalItems > visibleItems) {
                autoSlideInterval = setInterval(autoSlideGames, 5000);
            }
        });

        // Game Populer Slider (2 rows x 4 columns per page)
        let currentGameSlide = 0;
        const gamesGrid = document.getElementById('gamesGrid');
        const gamesWrapper = document.getElementById('gamesWrapper');
        const allGameItems = Array.from(gamesGrid ? gamesGrid.querySelectorAll('.game-item') : []);
        const gamesPerSlideDesktop = 8; // 2 rows x 4 cols
        const gamesPerSlideMobile = 8;  // 4 rows x 2 cols -> still 8 items
        const isMobile = window.innerWidth <= 768;
        const gamesPerSlide = isMobile ? gamesPerSlideMobile : gamesPerSlideDesktop;

        // Group items into slides
        if (gamesGrid && allGameItems.length > 0) {
            const slidesNeeded = Math.ceil(allGameItems.length / gamesPerSlide);
            const fragment = document.createDocumentFragment();
            for (let s = 0; s < slidesNeeded; s++) {
                const slide = document.createElement('div');
                slide.className = 'games-slide';
                const start = s * gamesPerSlide;
                const end = start + gamesPerSlide;
                allGameItems.slice(start, end).forEach(item => slide.appendChild(item));
                fragment.appendChild(slide);
            }
            gamesGrid.innerHTML = '';
            gamesGrid.appendChild(fragment);
        }

        function getTotalSlides() {
            return gamesGrid ? gamesGrid.querySelectorAll('.games-slide').length : 0;
        }

        function showGamesSlide(slideIndex) {
            const total = getTotalSlides();
            if (!gamesGrid || total === 0) return;
            currentGameSlide = (slideIndex + total) % total;
            const offset = currentGameSlide * 100;
            gamesGrid.style.transform = `translateX(-${offset}%)`;
        }

        function nextGamesSlide() { showGamesSlide(currentGameSlide + 1); }
        function prevGamesSlide() { showGamesSlide(currentGameSlide - 1); }

        // Navigation buttons for games
        const gamesNext = document.getElementById('gamesNext');
        const gamesPrev = document.getElementById('gamesPrev');
        if (gamesNext) gamesNext.addEventListener('click', nextGamesSlide);
        if (gamesPrev) gamesPrev.addEventListener('click', prevGamesSlide);

        // Touch/drag to swipe games slider
        let gDragging = false, gStartX = 0, gDeltaX = 0;
        function startDrag(x) {
            gDragging = true; gStartX = x; gDeltaX = 0; gamesGrid.style.transition = 'none';
        }
        function moveDrag(x) {
            if (!gDragging) return; gDeltaX = x - gStartX;
        }
        function endDrag() {
            if (!gDragging) return; gDragging = false; gamesGrid.style.transition = 'transform 0.5s ease-in-out';
            const threshold = gamesWrapper.offsetWidth * 0.15;
            if (Math.abs(gDeltaX) > threshold) {
                if (gDeltaX < 0) nextGamesSlide(); else prevGamesSlide();
            } else {
                showGamesSlide(currentGameSlide);
            }
        }
        if (gamesWrapper) {
            gamesWrapper.addEventListener('mousedown', e => startDrag(e.clientX));
            window.addEventListener('mousemove', e => moveDrag(e.clientX));
            window.addEventListener('mouseup', endDrag);
            gamesWrapper.addEventListener('touchstart', e => startDrag(e.touches[0].clientX), { passive: true });
            gamesWrapper.addEventListener('touchmove', e => moveDrag(e.touches[0].clientX), { passive: true });
            gamesWrapper.addEventListener('touchend', endDrag);
        }

        // Auto slide games every 5 seconds
        if (getTotalSlides() > 1) {
            setInterval(nextGamesSlide, 5000);
        }
    });
</script>

<style>
    .slider-item {
        transition: opacity 1s ease-in-out;
        margin: 0;
        padding: 0;
        width: 100vw;
        left: 50%;
        margin-left: -50vw;
        position: absolute;
    }

    .slider-item:not(.active) {
        opacity: 0;
    }

    .slider-item.active {
        opacity: 1;
    }

    .slider-container {
        margin: 0;
        padding: 0;
        width: 100vw;
        left: 50%;
        margin-left: -50vw;
        position: relative;
    }

    .slider-container img {
        margin: 0;
        padding: 0;
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Untuk mobile, gunakan object-position center untuk menghindari crop yang buruk */
    @media (max-width: 640px) {
        .slider-container img {
            object-fit: cover;
            object-position: center;
        }
    }

    /* Untuk tablet dan desktop yang lebih besar */
    @media (min-width: 641px) {
        .slider-container img {
            object-fit: cover;
        }
    }

    .animate-scroll {
        animation: scroll-left 20s linear infinite;
    }

    @keyframes scroll-left {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    /* Memastikan slider dots terlihat dengan baik */
    .slider-dot {
        backdrop-filter: blur(2px);
        transition: all 0.3s ease;
    }

    .slider-dot:hover {
        transform: scale(1.2);
    }

    /* Progressive Jackpot Styling - Full width layar */
    .jackpot-display-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw;
        left: 50%;
        margin-left: -50vw;
        position: relative;
        padding: 0 8px;
    }

    .jackpot-outer-border {
        background: linear-gradient(45deg, #ff9600, #ffb84d, #ff9600);
        border-radius: 25px;
        padding: 6px;
        box-shadow: 0 0 20px rgba(255, 150, 0, 0.6);
        width: 100%;
        max-width: 100%;
    }

    .jackpot-inner-black {
        background: #000000;
        border-radius: 20px;
        position: relative;
        padding: 22px 36px;
        min-height: 82px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .led-dots-container {
        position: absolute;
        inset: 8px;
        pointer-events: none;
    }

    /* LED Dots positioning */
    .led-dots-top {
        position: absolute;
        top: 0;
        left: 20px;
        right: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .led-dots-bottom {
        position: absolute;
        bottom: 0;
        left: 20px;
        right: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .led-dots-left {
        position: absolute;
        left: 0;
        top: 15px;
        bottom: 15px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .led-dots-right {
        position: absolute;
        right: 0;
        top: 15px;
        bottom: 15px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .led-dot {
        width: 3px;
        height: 3px;
        background: #ffffff;
        border-radius: 50%;
        box-shadow: 0 0 4px rgba(255, 255, 255, 0.8);
        animation: led-blink 2s infinite;
    }

    @keyframes led-blink {
        0%, 100% {
            opacity: 0.3;
            box-shadow: 0 0 2px rgba(255, 255, 255, 0.3);
        }
        50% {
            opacity: 1;
            box-shadow: 0 0 6px rgba(255, 255, 255, 1);
        }
    }

    /* Stagger the LED animation */
    .led-dot:nth-child(1) { animation-delay: 0s; }
    .led-dot:nth-child(2) { animation-delay: 0.1s; }
    .led-dot:nth-child(3) { animation-delay: 0.2s; }
    .led-dot:nth-child(4) { animation-delay: 0.3s; }
    .led-dot:nth-child(5) { animation-delay: 0.4s; }
    .led-dot:nth-child(6) { animation-delay: 0.5s; }
    .led-dot:nth-child(7) { animation-delay: 0.6s; }
    .led-dot:nth-child(8) { animation-delay: 0.7s; }
    .led-dot:nth-child(9) { animation-delay: 0.8s; }

        .payment-methods__grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1.15rem 1.35rem;
        }
    .led-dot:nth-child(10) { animation-delay: 0.9s; }
    .led-dot:nth-child(11) { animation-delay: 1.0s; }
    .led-dot:nth-child(12) { animation-delay: 1.1s; }
        .payment-methods {
            margin-top: 2rem;
        }

        .payment-methods__grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem 1.2rem;
        }

        .payment-methods__item img {
            max-height: 44px;
        }

        .payment-methods__status {
            height: 42px;
        }
    .led-dot:nth-child(13) { animation-delay: 1.2s; }
    .led-dot:nth-child(14) { animation-delay: 1.3s; }
    .led-dot:nth-child(15) { animation-delay: 1.4s; }

    .jackpot-text-display {
        font-family: 'Open24DisplaySt', 'Orbitron', 'Arial', 'Helvetica', sans-serif;
        font-size: 52px;
        font-weight: 900;
        text-align: center;
        z-index: 10;
        position: relative;
        display: inline-flex;
        align-items: baseline;
        gap: 12px;
        text-transform: uppercase;
        line-height: 1.08;
        letter-spacing: 8px;
    }

    .jackpot-text-display .idr-text,
    .jackpot-text-display #progressive_jackpot {
        display: inline-block;
        line-height: 1;
    }

    .idr-text {
        color: #ff9600;
        font-weight: 900;
        letter-spacing: 8px;
        margin-right: 2px;
    }

    #progressive_jackpot {
        color: #ffffff;
        font-variant-numeric: tabular-nums;
        font-weight: 900;
        text-rendering: optimizeLegibility;
        letter-spacing: 8px;
    }
        .jackpot-display-container {
            padding: 0 4px;
        }

        .jackpot-text-display {
            font-size: 36px;
            letter-spacing: 6px;
            gap: 10px;
        }

        .idr-text {
            letter-spacing: 6px;
            margin-right: 2px;
        }

        #progressive_jackpot {
            letter-spacing: 6px;
        }

        .jackpot-inner-black {
            padding: 18px 28px;
            min-height: 76px;
        }

        .led-dots-top, .led-dots-bottom {
            left: 15px;
            right: 15px;
        }

        .led-dots-left, .led-dots-right {
            top: 12px;
            bottom: 12px;
        }
    }

    @media (max-width: 480px) {
        .jackpot-display-container {
            padding: 0 2px;
        }

        .jackpot-text-display {
            font-size: 32px;
            letter-spacing: 5px;
            gap: 8px;
        }

        .idr-text {
            letter-spacing: 5px;
            margin-right: 2px;
        }

        #progressive_jackpot {
            letter-spacing: 5px;
        }

        .jackpot-inner-black {
            padding: 14px 24px;
            min-height: 68px;
        }

        .led-dot {
            width: 2px;
            height: 2px;
        }

        .led-dots-top, .led-dots-bottom {
            left: 10px;
            right: 10px;
        }

        .led-dots-left, .led-dots-right {
            top: 10px;
            bottom: 10px;
        }
    }

    @media (min-width: 768px) {
        .jackpot-display-container {
            padding: 0 12px;
        }

        .jackpot-text-display {
            font-size: 58px;
            letter-spacing: 10px;
            gap: 14px;
        }

        .idr-text {
            letter-spacing: 10px;
            margin-right: 4px;
        }

        #progressive_jackpot {
            letter-spacing: 10px;
        }

        .jackpot-inner-black {
            padding: 26px 42px;
            min-height: 96px;
        }
    }

    @media (min-width: 1024px) {
        .jackpot-display-container {
            padding: 0 16px;
        }

        .jackpot-text-display {
            font-size: 68px;
            letter-spacing: 12px;
            gap: 16px;
        }

        .idr-text {
            letter-spacing: 12px;
            margin-right: 4px;
        }

        #progressive_jackpot {
            letter-spacing: 12px;
        }

        .jackpot-inner-black {
            padding: 30px 48px;
            min-height: 104px;
        }
    }

    /* Font Open24DisplaySt styling */
    .jackpot-text-display {
        text-rendering: optimizeSpeed;
        font-feature-settings: "tnum";
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* Load Open24DisplaySt font jika tersedia */
    @font-face {
        font-family: 'Open24DisplaySt';
        src: url('{{ asset('fonts/Open24DisplaySt.woff') }}') format('woff');
        font-weight: normal;
        font-style: normal;
        font-display: swap;
    }

    /* Game Categories Slide Menu Styling */
    .game-categories-container {
        width: 100vw;
        left: 50%;
        margin-left: -50vw;
        position: relative;
        overflow: hidden;
    }

    .game-categories-slider {
        padding: 12px 0;
        overflow: hidden;
        position: relative;
    }

    .game-categories-track {
        display: flex;
        transition: transform 0.5s ease-in-out;
        gap: 16px;
        padding: 0 20px;
        cursor: grab;
    }

    .game-categories-track:active {
        cursor: grabbing;
    }

    .game-category-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        min-width: 100px;
        padding: 12px 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        border-radius: 0;
        background: transparent;
        border: none;
    }

    .game-category-item:hover {
        transform: translateY(-2px);
    }

    .category-icon {
        width: 36px;
        height: 36px;
        object-fit: contain;
        margin-bottom: 10px;
        filter: brightness(1.1);
    }

    .category-icon-default {
        font-size: 36px;
        color: #ffffff;
        margin-bottom: 10px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    }

    .category-label {
        font-size: 11px;
        font-weight: 700;
        color: #ffffff;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.7);
        line-height: 1.2;
        max-width: 80px;
        word-wrap: break-word;
        margin-bottom: 4px;
    }

    /* Navigation Arrows */
    .game-nav-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.5);
        border: none;
        color: #ffffff;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 10;
        font-size: 16px;
    }

    .game-nav-arrow:hover {
        background: rgba(0, 0, 0, 0.8);
        transform: translateY(-50%) scale(1.1);
    }
    @media (max-width: 480px) {
        .payment-methods__title {
            font-size: 0.95rem;
            letter-spacing: 0.06em;
            text-align: center;
        }

        .payment-methods__grid {
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 0.7rem;
        }

        .payment-methods__item img {
            width: 84px;
            height: 32px;
        }

        .payment-methods__status {
            height: 28px;
        }
        .game-nav-right {
            right: 5px;
        }
    }

    /* Responsive adjustments for game menu */
    @media (max-width: 640px) {
        .game-categories-slider {
            padding: 1px 0;
        }

        .game-categories-track {
            gap: 12px;
            padding: 0 16px;
        }

        .game-category-item {
            min-width: 80px;
            padding: 10px 6px;
        }

        .category-icon {
            width: 28px;
            height: 28px;
            margin-bottom: 8px;
        }

        .category-icon-default {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .category-label {
            font-size: 9px;
            max-width: 70px;
            margin-bottom: 2px;
        }
    }

    @media (min-width: 768px) {
        .game-categories-slider {
            padding: 14px 0;
        }

        .game-categories-track {
            gap: 20px;
            padding: 0 24px;
        }

        .game-category-item {
            min-width: 110px;
            padding: 14px 12px;
        }

        .category-icon {
            width: 40px;
            height: 40px;
            margin-bottom: 12px;
        }

        .category-icon-default {
            font-size: 40px;
            margin-bottom: 12px;
        }

        .category-label {
            font-size: 12px;
            max-width: 90px;
            margin-bottom: 4px;
        }
    }

    @media (min-width: 1024px) {
        .game-categories-slider {
            padding: 16px 0;
        }

        .game-categories-track {
            gap: 24px;
            padding: 0 32px;
        }

        .game-category-item {
            min-width: 120px;
            padding: 16px 14px;
        }

        .category-icon {
            width: 44px;
            height: 44px;
            margin-bottom: 14px;
        }

        .category-icon-default {
            font-size: 44px;
            margin-bottom: 14px;
        }

        .category-label {
            font-size: 13px;
            max-width: 100px;
            margin-bottom: 6px;
        }
    }

    /* Game Populer Section Styling - 100% mirip gambar */
    .game-populer-header {
    display: inline-block; /* jangan full baris */
    margin: 0;
}

.header-bg {
    display: inline-block;
    background: #ff8c00;
    padding: 7px 55px 7px 3px; /* urutan: atas kanan bawah kiri */
    position: relative;
    clip-path: polygon(0 0, 88% 0, 100% 100%, 0% 100%);
}

.section-title {
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    margin: 0;
    line-height
}

    .nav-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: #ff8c00;
        border: none;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        color: white;
        font-size: 14px;
        cursor: pointer;
        z-index: 10;
        box-shadow: 0 2px 8px rgba(255, 140, 0, 0.3);
        transition: all 0.3s ease;
    }

    .nav-arrow:hover {
        transform: translateY(-50%) scale(1.1);
        box-shadow: 0 6px 20px rgba(255, 140, 0, 0.6);
    }

    .nav-prev {
        left: -12px;
    }

    .nav-next {
        right: -12px;
    }

    .games-wrapper {
        overflow: hidden;
        margin: 0 10px;
    }

    .games-grid {
        display: flex;
        transition: transform 0.5s ease-in-out;
        will-change: transform;
        height: 320px;
        width: 100%;
    }
    .games-slide {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: repeat(2, 1fr);
        gap: 6px;
        flex: 0 0 100%;
        width: 100%;
        height: 320px;
    }

    .game-item {
        background: transparent;
        border-radius: 0;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s ease;
        border: none;
        position: relative;
    }

    .game-item:hover {
        transform: translateY(-2px);
    }

    .game-thumbnail {
        position: relative;
        height: 120px;
        overflow: hidden;
        border-radius: 4px;
    }

    .game-image {
        width: 100%;
        height: 100%;
        object-fit: contain; /* show full poster without cropping */
        object-position: center;
        background: transparent;
        transition: transform 0.3s ease;
    }

    .game-item:hover .game-image {
        transform: scale(1.1);
    }

    .demo-game-bg {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .game-icon {
        font-size: 40px;
        color: rgba(255, 255, 255, 0.9);
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
    }

    .game-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .game-item:hover .game-overlay {
        opacity: 1;
    }

    .game-overlay i {
        color: #ff8c00;
        font-size: 24px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.8);
    }

    .game-name {
        padding: 6px 4px;
        color: #ffffff;
        font-size: 10px;
        font-weight: 700;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        line-height: 1.1;
        background: transparent;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.8);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Responsive Design untuk Game Populer */
    @media (max-width: 768px) {
        .games-slider-container { height: 380px; }
        .games-grid { height: 340px; }
        .games-slide {
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(4, 1fr);
            gap: 6px;
            height: 340px;
        }
        .game-thumbnail { height: 100px; }
        .game-name { height: 28px; font-size: 9px; padding: 4px 2px; }
        .nav-arrow { width: 30px; height: 30px; font-size: 12px; }
    }

    @media (max-width: 480px) {
        .games-slider-container { padding: 12px; margin: 0 5px; height: 360px; }
        .games-grid { height: 330px; }
        .games-slide { gap: 6px; height: 330px; }
        .game-thumbnail { height: 90px; }
        .game-name { font-size: 8px; height: 22px; padding: 3px 2px; }
        .nav-arrow { width: 25px; height: 25px; font-size: 10px; }
        .nav-prev { left: -8px; }
        .nav-next { right: -8px; }
    }

    /* Popular Games Section Styling - Full Width */
    .popular-games-heading {
        display: flex;
        align-items: center;
    }

    .popular-games-heading__badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.4rem 1.8rem;
        border-radius: 9999px;
        background: linear-gradient(135deg, #ff7a18 0%, #ffae35 100%);
        color: #0f172a;
        letter-spacing: 0.22em;
        text-transform: uppercase;
        font-weight: 800;
        box-shadow: 0 18px 35px rgba(255, 122, 24, 0.45);
    }

    .popular-games-panel {
    position: relative;
    padding: 12px 18px 18px;
    background: transparent;
    border: 3px solid rgba(255, 155, 55, 0.4);
    border-radius: 0;       /* 🚀 bikin kotak lurus */
    box-shadow: none;
    overflow: hidden;
    backdrop-filter: none;
    margin-top: 0;          /* 🚀 hilangkan jarak dari header */
}

    .popular-games-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 42px;
        height: 42px;
        border-radius: 9999px;
        border: none;
        background: transparent;
        color: rgba(255, 255, 255, 0.85);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform 0.2s ease, color 0.2s ease;
        box-shadow: none;
        z-index: 2;
    }

    .popular-games-nav:hover {
        transform: translateY(-50%) scale(1.06);
        color: #facc15;
    }

    .popular-games-nav i {
        font-size: 1.05rem;
    }

    .popular-games-nav--left {
        left: 4px;
    }

    .popular-games-nav--right {
        right: 4px;
    }

    .popular-games-panel::after {
        content: none;
    }

    .popular-games-track {
        overflow-x: auto;
        padding: 0 16px 18px;
        mask-image: linear-gradient(90deg, transparent 0%, #000 8%, #000 92%, transparent 100%);
    }

    .popular-games-grid {
        position: relative;
        display: grid;
        grid-auto-flow: column;
        grid-template-rows: repeat(2, minmax(0, 1fr));
        grid-auto-columns: 140px;
        column-gap: 1.5rem;
        row-gap: 1.5rem;
        z-index: 1;
    }

    .popular-game-card {
        position: relative;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        width: 140px;
        padding: 0.85rem;
        background: transparent;
        overflow: hidden;
        transition: transform 0.35s ease, border-color 0.35s ease, box-shadow 0.35s ease;
        box-shadow: none;
    }

    .popular-game-card:hover {
        transform: translateY(-6px);
        border-color: rgba(255, 195, 95, 0.75);
        box-shadow: 0 26px 48px rgba(255, 140, 0, 0.25);
    }

    .popular-game-thumb {
        position: relative;
        aspect-ratio: 1 / 1;
        overflow: hidden;
        background: rgba(20, 20, 20, 0.88);
        border: 1px solid rgba(255, 170, 0, 0.22);
        box-shadow: inset 0 0 0 1px rgba(255, 190, 100, 0.18);
    }

    .popular-game-thumb--placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .popular-game-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        font-size: 2.1rem;
        color: rgba(255, 255, 255, 0.82);
    }

    .popular-game-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .popular-game-card:hover .popular-game-image {
        transform: scale(1.08);
    }

    .popular-game-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0) 25%, rgba(0, 0, 0, 0.78) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .popular-game-card:hover .popular-game-overlay {
        opacity: 1;
    }

    .popular-game-cta {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1.3rem;
        border-radius: 9999px;
        background: linear-gradient(120deg, #f97316 0%, #facc15 100%);
        color: #0f172a;
        font-size: 0.65rem;
        font-weight: 800;
        letter-spacing: 0.24em;
        text-transform: uppercase;
        box-shadow: 0 12px 22px rgba(249, 115, 22, 0.45);
    }

    .popular-game-info {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 0;
        gap: 0.4rem;
        text-align: center;
    }

    .popular-game-name {
        margin: 0;
        color: #ff8c00;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        line-height: 1.2;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .popular-games-track::-webkit-scrollbar {
        height: 6px;
    }

    .popular-games-track::-webkit-scrollbar-track {
        background: rgba(15, 15, 15, 0.4);
        border-radius: 9999px;
    }

    .popular-games-track::-webkit-scrollbar-thumb {
        background: rgba(249, 115, 22, 0.6);
        border-radius: 9999px;
    }

    .payment-methods {
        margin-top: 2.5rem;
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
        filter: none;
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

    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border: 0;
    }

    @media (max-width: 1024px) {
        .popular-games-panel {
            padding: 7px 1px 7px;
        }

        .popular-games-grid {
            grid-auto-columns: 128px;
            column-gap: 1.3rem;
            row-gap: 1.3rem;
        }

        .popular-game-card {
            width: 128px;
            padding: 0.75rem;
            border-radius: 17px;
        }

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
        .popular-games-panel {
            padding: 7px 1px 7px;
        }

        .popular-games-nav {
            width: 34px;
            height: 34px;
        }

        .popular-games-grid {
            grid-auto-columns: 118px;
            column-gap: 1.15rem;
            row-gap: 1.15rem;
        }

        .popular-game-card {
            width: 118px;
            padding: 0.7rem;
            border-radius: 16px;
        }

        .popular-game-name {
            font-size: 0.7rem;
            letter-spacing: 0.08em;
        }

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
        .popular-games-panel {
            padding: 7px 1px 7px;
        }

        .popular-games-nav {
            width: 30px;
            height: 30px;
        }

        .popular-games-grid {
            grid-auto-columns: 108px;
            column-gap: 0.1rem;
            row-gap: 1rem;
        }

        .popular-game-card {
            width: 108px;
            padding: 0.65rem;
            border-radius: 14px;
        }

        .popular-game-name {
            font-size: 0.68rem;
            letter-spacing: 0.07em;
        }

        .popular-game-cta {
            padding: 0.45rem 1.1rem;
            letter-spacing: 0.2em;
        }

        .popular-games-heading__badge {
            padding: 0.3rem 1.2rem;
            font-size: 0.85rem;
            letter-spacing: 0.16em;
        }
    }
</style>
@endpush
