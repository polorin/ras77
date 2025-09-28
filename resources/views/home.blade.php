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
<div class="grid grid-cols-2">
        <button onclick="window.location.href='{{ route('register') }}'"
            class="text-white font-bold py-4 px-4 hover:opacity-90 transition-opacity"
            style="background-color: rgb(215, 127, 3);">
            Daftar
        </button>
        <button onclick="window.location.href='{{ route('login') }}'"
            class="bg-gray-700 text-white font-bold py-4 px-4 hover:bg-gray-800 transition-colors">
            Masuk
        </button>
    </div>
    
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
<div class="game-categories-container py-4">
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
</div>

<!-- Main Content -->
<div class="container mx-auto px-4 py-6">
    <!-- Game Popular Section -->
    <div class="mb-8">
        <div class="flex items-center mb-4">
            <div class="bg-gradient-to-r from-amber-600 to-amber-500 px-4 py-2 rounded-l-md">
                <h2 class="text-xl font-bold uppercase text-white">GAME POPULER</h2>
            </div>
        </div>
        
        <!-- Games Grid -->
        <div class="overflow-x-auto custom-scrollbar pb-4">
            <div class="grid grid-cols-2 grid-flow-col gap-3 min-w-max">
                <?php
                // Assuming $popularGames is already available from your existing database connection
                if(isset($popularGames) && count($popularGames) > 0):
                    foreach($popularGames as $game):
                ?>
                    <div class="game-card bg-gradient-to-b from-amber-900 to-amber-800 rounded-lg overflow-hidden shadow-lg w-36">
                        <div class="relative">
                            <div class="w-full h-36 overflow-hidden">
                                <?php if(filter_var($game['image'], FILTER_VALIDATE_URL)): ?>
                                    <img src="<?php echo htmlspecialchars($game['image']); ?>" 
                                         alt="<?php echo htmlspecialchars($game['name']); ?>" 
                                         class="w-full h-full object-cover">
                                <?php else: ?>
                                    <img src="<?php echo asset('storage/games/' . $game['image']); ?>" 
                                         alt="<?php echo htmlspecialchars($game['name']); ?>" 
                                         class="w-full h-full object-cover">
                                <?php endif; ?>
                                
                                <!-- Play button overlay -->
                                <div class="play-overlay absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-50 flex items-center justify-center transition-all duration-300">
                                    <div class="w-10 h-10 rounded-full bg-amber-500 flex items-center justify-center transform scale-0 hover:scale-100 transition-transform duration-300">
                                        <i class="fas fa-play text-white ml-1 text-sm"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Game name -->
                            <div class="p-2 bg-amber-800">
                                <h3 class="text-xs font-semibold text-center text-white truncate"><?php echo htmlspecialchars($game['name']); ?></h3>
                            </div>
                        </div>
                    </div>
                <?php 
                    endforeach;
                else:
                    // Default games if no data from database
                    $defaultGames = [
                        ['name' => 'Sweet Bonan.', 'icon' => 'fa-candy-cane'],
                        ['name' => 'Mahjong Win...', 'icon' => 'fa-dice'],
                        ['name' => 'Sticky Bandit...', 'icon' => 'fa-hat-cowboy'],
                        ['name' => 'Sugai', 'icon' => 'fa-fish'],
                        ['name' => 'Mahjong Ways', 'icon' => 'fa-dice'],
                        ['name' => 'Wukong - Bla...', 'icon' => 'fa-dragon'],
                        ['name' => 'Bang Gacor...', 'icon' => 'fa-bomb'],
                        ['name' => 'Forti', 'icon' => 'fa-gem']
                    ];
                    
                    foreach($defaultGames as $game):
                ?>
                    <div class="game-card bg-gradient-to-b from-amber-900 to-amber-800 rounded-lg overflow-hidden shadow-lg w-36">
                        <div class="relative">
                            <div class="w-full h-36 overflow-hidden">
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-amber-700 to-amber-600">
                                    <i class="fas <?php echo $game['icon']; ?> text-4xl text-white opacity-80"></i>
                                </div>
                                
                                <!-- Play button overlay -->
                                <div class="play-overlay absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-50 flex items-center justify-center transition-all duration-300">
                                    <div class="w-10 h-10 rounded-full bg-amber-500 flex items-center justify-center transform scale-0 hover:scale-100 transition-transform duration-300">
                                        <i class="fas fa-play text-white ml-1 text-sm"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Game name -->
                            <div class="p-2 bg-amber-800">
                                <h3 class="text-xs font-semibold text-center text-white truncate"><?php echo $game['name']; ?></h3>
                            </div>
                        </div>
                    </div>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom scrollbar for horizontal scrolling */
    .custom-scrollbar::-webkit-scrollbar {
        height: 6px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #1e293b;
        border-radius: 3px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #475569;
        border-radius: 3px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #64748b;
    }
    
    /* Game card hover effect */
    .game-card {
        transition: all 0.3s ease;
    }
    
    .game-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.5);
    }
</style>

<!-- Main Content dengan padding untuk konten di bawah -->
<div class="container mx-auto px-4">
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
        let autoSlideInterval;
        
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
        if (totalItems > visibleItems) {
            autoSlideInterval = setInterval(autoSlideGames, 5000);
        }
        
        // Pause auto slide on hover/touch
        gameSlider.addEventListener('mouseenter', () => {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
            }
        });
        
        gameSlider.addEventListener('mouseleave', () => {
            if (totalItems > visibleItems) {
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
        padding: 15px 25px;
        min-height: 60px;
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
    .led-dot:nth-child(10) { animation-delay: 0.9s; }
    .led-dot:nth-child(11) { animation-delay: 1.0s; }
    .led-dot:nth-child(12) { animation-delay: 1.1s; }
    .led-dot:nth-child(13) { animation-delay: 1.2s; }
    .led-dot:nth-child(14) { animation-delay: 1.3s; }
    .led-dot:nth-child(15) { animation-delay: 1.4s; }

    .jackpot-text-display {
        font-family: 'Open24DisplaySt', 'Arial', 'Helvetica', sans-serif;
        font-size: 36px;
        font-weight: 900;
        letter-spacing: 6px;
        text-align: center;
        z-index: 10;
        position: relative;
        text-transform: uppercase;
        line-height: 1.2;
        word-spacing: 8px;
    }

    .idr-text {
        color: #ff9600;
        font-weight: 900;
        letter-spacing: 6px;
    }

    #progressive_jackpot {
        color: #ffffff;
        font-variant-numeric: tabular-nums;
        font-weight: 900;
        text-rendering: optimizeLegibility;
        letter-spacing: 6px;
    }

    /* Responsive design - Full width ke ujung layar dengan Upper Clock digital font */
    @media (max-width: 640px) {
        .jackpot-display-container {
            padding: 0 4px;
        }
        
        .jackpot-text-display {
            font-size: 26px;
            letter-spacing: 4px;
            font-weight: 900;
            word-spacing: 6px;
        }
        
        .idr-text {
            letter-spacing: 4px;
        }
        
        #progressive_jackpot {
            letter-spacing: 4px;
        }
        
        .jackpot-inner-black {
            padding: 12px 20px;
            min-height: 60px;
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
            font-size: 22px;
            letter-spacing: 3px;
            font-weight: 900;
            word-spacing: 4px;
        }
        
        .idr-text {
            letter-spacing: 3px;
        }
        
        #progressive_jackpot {
            letter-spacing: 3px;
        }
        
        .jackpot-inner-black {
            padding: 10px 15px;
            min-height: 52px;
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
            font-size: 42px;
            letter-spacing: 8px;
            font-weight: 900;
            word-spacing: 10px;
        }
        
        .idr-text {
            letter-spacing: 8px;
        }
        
        #progressive_jackpot {
            letter-spacing: 8px;
        }
        
        .jackpot-inner-black {
            padding: 18px 30px;
            min-height: 80px;
        }
    }

    @media (min-width: 1024px) {
        .jackpot-display-container {
            padding: 0 16px;
        }
        
        .jackpot-text-display {
            font-size: 48px;
            letter-spacing: 10px;
            font-weight: 900;
            word-spacing: 12px;
        }
        
        .idr-text {
            letter-spacing: 10px;
        }
        
        #progressive_jackpot {
            letter-spacing: 10px;
        }
        
        .jackpot-inner-black {
            padding: 20px 40px;
            min-height: 90px;
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
        src: url('https://fonts.cdnfonts.com/css/open24-display-st') format('woff2'),
             url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900') format('woff2');
        font-weight: 400 900;
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
    
    .game-nav-left {
        left: 10px;
    }
    
    .game-nav-right {
        right: 10px;
    }
    
    /* Hide arrows on very small screens */
    @media (max-width: 480px) {
        .game-nav-arrow {
            width: 35px;
            height: 35px;
            font-size: 14px;
        }
        
        .game-nav-left {
            left: 5px;
        }
        
        .game-nav-right {
            right: 5px;
        }
    }
    
    /* Responsive adjustments for game menu */
    @media (max-width: 640px) {
        .game-categories-slider {
            padding: 10px 0;
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
    .game-populer-section {
        margin-top: 20px;
    }
    
    .game-populer-header {
        position: relative;
    }
    
    .header-bg {
        background: #ff8c00;
        padding: 8px 0;
        position: relative;
        clip-path: polygon(0 0, calc(100% - 20px) 0, 100% 100%, 20px 100%);
        box-shadow: 0 2px 8px rgba(255, 140, 0, 0.3);
    }
    
    .section-title {
        color: #ffffff;
        font-size: 18px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin: 0;
        padding-left: 20px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
    }
    
    .games-slider-container {
        background: #1a1a1a;
        border: 2px solid #ff8c00;
        border-radius: 8px;
        padding: 15px;
        position: relative;
        overflow: hidden;
        height: 350px;
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
</style>
@endpush
