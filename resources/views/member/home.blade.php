@extends('home')

@section('title', 'Beranda Member')

@section('content')
    <!-- Info Bar -->
    <div class="member-info-bar text-white py-2 px-4" style="background-color: rgb(215, 127, 3);">
        <div class="flex items-center justify-center space-x-2 text-xs md:text-sm">
            <i class="fas fa-volume-up"></i>
            <div class="overflow-hidden whitespace-nowrap">
                <div class="animate-scroll">
                    RAS77 SB Salam webku! Ayo main sekarang JUGA! Bermain dengan permainan yang telah dikelolrimpengaman dari
                </div>
            </div>
        </div>
    </div>

    @if (session('status'))
    @endif

    <!-- Member Dashboard Info - Mobile First -->
    <div class="member-dashboard-info">
        @if (session('status'))
            <div id="memberStatusAlert" class="member-status-alert mb-4 w-full rounded-lg border border-green-500/50 bg-green-500/10 px-4 py-3 text-sm text-green-100">
                {{ session('status') }}
            </div>
        @endif

        <!-- Top Row: Username and IDR Balance -->
        <div class="dashboard-top-row">
            <div class="dashboard-username">
                <span class="username-text">{{ strtoupper(Auth::user()->username ?? 'BGUSRMDN') }}</span>
            </div>

            <div class="dashboard-balance-group">
                <div class="balance-container">
                    <span class="balance-label">IDR</span>
                    <span class="balance-amount">0.00</span>
                    <svg class="balance-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none">
                        <path d="M1 1L5 5L9 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <button class="refresh-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                        <path d="M21 2V8M21 8H15M21 8L18 5.29C16.93 3.61 15.19 2.5 13.21 2.14C11.24 1.78 9.21 2.19 7.59 3.29C5.97 4.38 4.9 6.06 4.59 7.96C4.29 9.86 4.77 11.79 5.91 13.31M3 22V16M3 16H9M3 16L6 18.71C7.07 20.39 8.81 21.5 10.79 21.86C12.76 22.22 14.79 21.81 16.41 20.71C18.03 19.62 19.1 17.94 19.41 16.04C19.71 14.14 19.23 12.21 18.09 10.69" stroke="#ff9500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Member Stats Sections -->
        <div class="dashboard-info-sections">
            <div class="info-section">
                <div class="bronze-badge">
                    <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/loyalty/badge/bronze.svg?v=20250528" alt="Bronze" class="bronze-icon">
                    <span class="bronze-text" style="background: -webkit-linear-gradient(#d18a6d,#744a3b); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">BRONZE</span>
                </div>

                <div class="exp-section">
                    <span class="exp-badge">EXP</span>
                    <div class="exp-value">0%</div>
                    <svg class="exp-arrow" width="6" height="10" viewBox="0 0 6 10" fill="none">
                        <path d="M1 1L5 5L1 9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

            <div class="info-section">
                <div class="loyalty-header">
                    <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/loyalty/loyalty-point-icon.svg?v=20250528" alt="Loyalty Point" class="loyalty-icon">
                    <span class="loyalty-label">LOYALTY POINT</span>
                </div>

                <div class="lp-section">
                    <span class="lp-badge">LP</span>
                    <div class="lp-value">0</div>
                    <svg class="lp-arrow" width="6" height="10" viewBox="0 0 6 10" fill="none">
                        <path d="M1 1L5 5L1 9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

            <div class="info-section info-section--chest">
                <div class="loyalty-chest" onclick="openDailyRewardModal()">
                    <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/loyalty/chest-available.webp?v=20250528" alt="Loyalty Chest" class="chest-icon">
                </div>
            </div>
        </div>
    </div>

    @parent
@endsection

@push('styles')
<style>
/* Mobile-First Design */
.member-dashboard-info {
    background: linear-gradient(135deg, #2d2d2d 0%, #1a1a1a 100%);
    border-bottom: 1px solid #333;
    padding: 10px 16px 16px;
}

.member-status-alert {
    transition: opacity 0.4s ease;
}

/* Top Row: Username and IDR Balance */
.dashboard-top-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 12px;
    gap: 16px;
}

.dashboard-username .username-text {
    color: white;
    font-size: 16px;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
}

.dashboard-balance-group {
    display: flex;
    align-items: center;
    gap: 8px;
}

.balance-container {
    display: flex;
    align-items: center;
    background: #000000;
    border: 1px solid #333;
    border-radius: 6px;
    padding: 4px 22px 4px 12px;
    gap: 6px;
    min-width: 180px;
    justify-content: flex-start;
}

.balance-label {
    color: white;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.balance-amount {
    color: #4ade80;
    font-size: 14px;
    font-weight: 700;
    text-align: left;
}

.balance-arrow {
    opacity: 0.7;
    margin-left: auto;
}

.refresh-btn {
    background: transparent;
    border: none;
    padding: 4px;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.refresh-btn:hover {
    background: rgba(255, 149, 0, 0.1);
}

/* Second Row: Bronze and Loyalty Point Labels */
.dashboard-info-sections {
    display: flex;
    align-items: stretch;
    gap: 0;
    margin-top: 10px;
    border-radius: 6px;
    overflow: hidden;
}

.info-section {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    gap: 10px;
    padding: 8px 10px;
    position: relative;
}

.info-section + .info-section {
}

.info-section + .info-section::before {
    content: "";
    position: absolute;
    left: -1px;
    top: 4px;
    bottom: 4px;
    width: 1px;
    background: rgba(255, 255, 255, 0.3);
}

.info-section--chest {
    flex: 0 0 auto;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding: 8px 6px;
    margin-left: auto;
    align-self: stretch;
}

/* Bronze Badge */
.bronze-badge {
    display: flex;
    align-items: center;
    gap: 6px;
}

.bronze-icon {
    height: 20px;
    width: 20px;
}

.bronze-text {
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.5px;
}

.loyalty-header {
    display: flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
    flex-wrap: nowrap;
}

.loyalty-icon {
    height: 16px;
    width: 16px;
}

.loyalty-label {
    color: white;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    display: inline-block;
    white-space: nowrap;
}

/* EXP Section */
.exp-section {
    display: flex;
    align-items: center;
    gap: 8px;
}

.exp-badge {
    background: #6b7280;
    color: white;
    font-size: 9px;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 4px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.exp-value {
    background: #000000;
    color: white;
    font-size: 11px;
    font-weight: 600;
    padding: 3px 16px 3px 14px;
    border-radius: 4px;
    min-width: 70px;
    text-align: left;
}

.exp-arrow {
    opacity: 0.7;
    margin-left: 4px;
}

/* LP Section */
.lp-section {
    display: flex;
    align-items: center;
    gap: 8px;
}

.lp-badge {
    background: #ff9500;
    color: white;
    font-size: 9px;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 4px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.lp-value {
    background: #000000;
    color: #ff9500;
    font-size: 11px;
    font-weight: 600;
    padding: 3px 16px 3px 14px;
    border-radius: 4px;
    min-width: 70px;
    text-align: left;
}

.lp-arrow {
    opacity: 0.7;
    margin-left: 4px;
}

/* Separators */

/* Loyalty Chest */
.loyalty-chest {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    width: 100%;
    height: 100%;
}

.chest-icon {
    height: 26px;
    width: 26px;
    object-fit: contain;
}

/* Desktop adjustments */
@media (min-width: 768px) {
    .member-dashboard-info {
        padding: 16px 24px;
    }

    .dashboard-top-row {
        margin-bottom: 16px;
    }

    .dashboard-username .username-text {
        font-size: 18px;
    }

    .balance-container {
        padding: 6px 28px 6px 16px;
        gap: 10px;
        min-width: 210px;
    }

    .balance-label {
        font-size: 14px;
    }

    .balance-amount {
        font-size: 16px;
    }

    .bronze-text {
        font-size: 16px;
    }

    .bronze-icon {
        height: 24px;
        width: 24px;
    }

    .dashboard-info-sections {
        margin-top: 14px;
    }

    .info-section {
        padding: 10px 16px;
        gap: 14px;
        position: relative;
    }

    .info-section--chest {
        padding: 8px 10px;
    }

    .loyalty-label {
        font-size: 14px;
    }

    .loyalty-icon {
        height: 18px;
        width: 18px;
    }

    .exp-badge {
        font-size: 10px;
        padding: 4px 10px;
    }

    .exp-value {
        font-size: 12px;
        padding: 4px 24px 4px 18px;
        min-width: 90px;
        text-align: left;
    }

    .lp-badge {
        font-size: 10px;
        padding: 4px 10px;
    }

    .lp-value {
        font-size: 12px;
        padding: 4px 24px 4px 18px;
        min-width: 90px;
        text-align: left;
    }

    .chest-icon {
        height: 32px;
        width: 32px;
    }
}
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.text-white.py-2.px-4').forEach((bar) => {
            if (!bar.classList.contains('member-info-bar')) {
                bar.remove();
            }
        });
    });

    // Daily Reward Modal Functions
    let dailyRewardClaimed = false;
    let countdownInterval = null;

    function openDailyRewardModal() {
        const modal = document.getElementById('dailyRewardModal');
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            
            // Show appropriate state
            if (dailyRewardClaimed) {
                showClaimedState();
            } else {
                showUnclaimedState();
            }
        }
    }

    function closeDailyRewardModal() {
        const modal = document.getElementById('dailyRewardModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
            if (countdownInterval) {
                clearInterval(countdownInterval);
            }
        }
    }

    function showUnclaimedState() {
        document.getElementById('unclaimedState').style.display = 'block';
        document.getElementById('claimedState').style.display = 'none';
    }

    function showClaimedState() {
        document.getElementById('unclaimedState').style.display = 'none';
        document.getElementById('claimedState').style.display = 'block';
        startCountdown();
    }

    function claimReward() {
        dailyRewardClaimed = true;
        
        // Change chest icon to open
        const chestIcons = document.querySelectorAll('.chest-icon');
        chestIcons.forEach(icon => {
            icon.src = 'https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/loyalty/chest-open.webp?v=20250528';
        });
        
        showClaimedState();
    }

    function startCountdown() {
        // Set end time to 8 hours, 8 minutes, 5 seconds from now
        const endTime = new Date();
        endTime.setHours(endTime.getHours() + 8);
        endTime.setMinutes(endTime.getMinutes() + 8);
        endTime.setSeconds(endTime.getSeconds() + 5);

        updateCountdown(endTime);
        
        if (countdownInterval) {
            clearInterval(countdownInterval);
        }
        
        countdownInterval = setInterval(() => {
            updateCountdown(endTime);
        }, 1000);
    }

    function updateCountdown(endTime) {
        const now = new Date();
        const diff = endTime - now;

        if (diff <= 0) {
            if (countdownInterval) {
                clearInterval(countdownInterval);
            }
            document.getElementById('hoursDigit').textContent = '0';
            document.getElementById('minutesDigit').textContent = '0';
            document.getElementById('secondsDigit').textContent = '0';
            return;
        }

        const hours = Math.floor(diff / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);

        document.getElementById('hoursDigit').textContent = hours;
        document.getElementById('minutesDigit').textContent = minutes;
        document.getElementById('secondsDigit').textContent = seconds;
    }

    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDailyRewardModal();
        }
    });
</script>
@endpush

<!-- Daily Reward Modal -->
<div id="dailyRewardModal" class="daily-reward-modal" style="display: none;">
    <div class="modal-overlay" onclick="closeDailyRewardModal()"></div>
    <div class="modal-content">
        <button class="modal-close" onclick="closeDailyRewardModal()">×</button>
        
        <!-- Unclaimed State -->
        <div id="unclaimedState" class="reward-state">
            <div class="chest-image-container">
                <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/loyalty/chest-available.webp?v=20250528" alt="Chest Closed" class="chest-modal-image">
            </div>
            
            <h2 class="modal-title">HADIAH LOGIN HARIAN</h2>
            
            <p class="modal-description">
                Kembali setiap hari untuk mengambil bonus EXP gratis!
            </p>
            
            <p class="modal-subdescription">
                Regangkan EXP dengan konsekuen 7 hari berturut-turut.<br>
                Login Harian untuk mendapat level/royalitas dan mendapatkan yang lebih besar jalan ini! Letak in<br>
                mendapat kan berubah dalam 24 setelah klaim terakhir.
            </p>
            
            <button class="claim-button" onclick="claimReward()">
                KLAIM SEKARANG
            </button>
        </div>
        
        <!-- Claimed State -->
        <div id="claimedState" class="reward-state" style="display: none;">
            <div class="chest-image-container">
                <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/loyalty/chest-open.webp?v=20250528" alt="Chest Open" class="chest-modal-image">
            </div>
            
            <div class="double-exp-badge">+DOUBLE EXP</div>
            
            <p class="modal-description">
                Double EXP adalah event yang dapat diisual dan dapat<br>
                manakalan akan langsung dan kuis dari EXP pada semua hukum.
            </p>
            
            <p class="countdown-label">EXP ganda akan berakhir dalam:</p>
            
            <div class="countdown-timer">
                <div class="timer-unit">
                    <div class="timer-digit" id="hoursDigit">8</div>
                    <div class="timer-label">JAM</div>
                </div>
                <div class="timer-separator">:</div>
                <div class="timer-unit">
                    <div class="timer-digit" id="minutesDigit">8</div>
                    <div class="timer-label">MENIT</div>
                </div>
                <div class="timer-separator">:</div>
                <div class="timer-unit">
                    <div class="timer-digit" id="secondsDigit">5</div>
                    <div class="timer-label">DETIK</div>
                </div>
            </div>
            
            <button class="claimed-button" disabled>
                SUDAH DIKLAIM
            </button>
            
            <p class="next-claim-text">
                Klaim hadiah lagi dalam: <span class="next-claim-emoji">😊</span> <span class="next-claim-time">10:41:48</span>
            </p>
        </div>
    </div>
</div>

<style>
/* Daily Reward Modal */
.daily-reward-modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.modal-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.85);
}

.modal-content {
    position: relative;
    background: linear-gradient(135deg, #2d2d2d 0%, #1a1a1a 100%);
    border: 2px solid #444;
    border-radius: 16px;
    padding: 40px 24px 24px;
    max-width: 380px;
    width: 100%;
    text-align: center;
    z-index: 10000;
    animation: modalSlideIn 0.3s ease-out;
    max-height: 90vh;
    overflow-y: auto;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.modal-close {
    position: absolute;
    top: 12px;
    right: 12px;
    background: transparent;
    border: none;
    color: white;
    font-size: 32px;
    cursor: pointer;
    line-height: 1;
    padding: 0;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color 0.2s;
    font-weight: 300;
}

.modal-close:hover {
    color: #ff9500;
}

.chest-image-container {
    margin-bottom: 24px;
    display: flex;
    justify-content: center;
}

.chest-modal-image {
    width: 180px;
    height: 180px;
    object-fit: contain;
}

.modal-title {
    color: white;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 16px;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.modal-description {
    color: #d1d5db;
    font-size: 13px;
    line-height: 1.6;
    margin-bottom: 12px;
    padding: 0 12px;
}

.modal-subdescription {
    color: #9ca3af;
    font-size: 11px;
    line-height: 1.5;
    margin-bottom: 24px;
    padding: 0 8px;
}

.claim-button {
    background: linear-gradient(135deg, #ff9500 0%, #ff8000 100%);
    color: #000;
    border: none;
    padding: 14px 40px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s;
    text-transform: uppercase;
    letter-spacing: 1px;
    width: 100%;
    max-width: 280px;
}

.claim-button:hover {
    background: linear-gradient(135deg, #ff8000 0%, #ff7000 100%);
    transform: scale(1.02);
}

.claim-button:active {
    transform: scale(0.98);
}

/* Claimed State */
.double-exp-badge {
    color: #4ade80;
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 16px;
    text-shadow: 0 0 10px rgba(74, 222, 128, 0.5);
    letter-spacing: 1px;
}

.countdown-label {
    color: white;
    font-size: 13px;
    margin-bottom: 16px;
    font-weight: 500;
}

.countdown-timer {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    margin-bottom: 24px;
    padding: 16px;
    background: rgba(0, 0, 0, 0.3);
    border-radius: 8px;
}

.timer-unit {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
}

.timer-digit {
    background: #4a4a4a;
    color: white;
    font-size: 28px;
    font-weight: 700;
    padding: 12px 16px;
    border-radius: 8px;
    min-width: 60px;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);
}

.timer-label {
    color: #9ca3af;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.timer-separator {
    color: white;
    font-size: 24px;
    font-weight: 700;
    padding-bottom: 24px;
}

.claimed-button {
    background: #6b7280;
    color: #d1d5db;
    border: none;
    padding: 14px 40px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    width: 100%;
    max-width: 280px;
    cursor: not-allowed;
    opacity: 0.7;
}

.next-claim-text {
    color: #9ca3af;
    font-size: 12px;
    margin-top: 16px;
}

.next-claim-emoji {
    display: inline-block;
    margin: 0 4px;
}

.next-claim-time {
    color: #4ade80;
    font-weight: 600;
}

/* Responsive */
@media (max-width: 480px) {
    .modal-content {
        padding: 32px 20px 20px;
        max-width: 340px;
    }

    .chest-modal-image {
        width: 150px;
        height: 150px;
    }

    .modal-title {
        font-size: 16px;
    }

    .timer-digit {
        font-size: 24px;
        padding: 10px 12px;
        min-width: 50px;
    }

    .countdown-timer {
        gap: 8px;
        padding: 12px;
    }
}

/* Cursor pointer for chest */
.loyalty-chest {
    cursor: pointer;
    transition: transform 0.2s ease;
}

.loyalty-chest:hover {
    transform: scale(1.1);
}

.loyalty-chest:active {
    transform: scale(0.95);
}
</style>
