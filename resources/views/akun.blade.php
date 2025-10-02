@extends('layouts.main')

@section('title', 'Akun Saya')

@section('content')
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
                <div class="loyalty-chest">
                    <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/loyalty/chest-available.webp?v=20250528" alt="Loyalty Chest" class="chest-icon">
                </div>
            </div>
        </div>
    </div>

    <!-- Account Content Area -->
    <div class="account-content">
        <!-- Account Tabs -->
        <div class="account-tabs">
            <button class="tab-item active">
                <svg class="tab-icon" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
                <span class="tab-label">AKUN SAYA</span>
            </button>
            <button class="tab-item">
                <svg class="tab-icon" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                </svg>
                <span class="tab-label">UBAH KATA SANDI</span>
            </button>
            <button class="tab-item">
                <svg class="tab-icon" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                </svg>
                <span class="tab-label">PROFIL SAYA</span>
            </button>
            <button class="tab-item">
                <svg class="tab-icon" width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                </svg>
                <span class="tab-label">RIWAYAT PENUKARAN</span>
            </button>
        </div>

        <!-- Account Information Section -->
        <div class="info-section-wrapper">
            <div class="info-header">
                INFORMASI AKUN
            </div>

            <div class="info-content">
                <div class="info-row">
                    <div class="info-label">NAMA LENGKAP</div>
                    <div class="info-separator">:</div>
                    <div class="info-value">{{ Auth::user()->name ?? '-' }}</div>
                </div>

                <div class="info-row">
                    <div class="info-label">EMAIL</div>
                    <div class="info-separator">:</div>
                    <div class="info-value">
                        @if(Auth::user()->email)
                            {{ Auth::user()->email }}
                        @else
                            <div class="email-alert">
                                <svg class="alert-icon" width="16" height="16" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                <span>Alamat email belum di isi!</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">NAMA PENGGUNA</div>
                    <div class="info-separator">:</div>
                    <div class="info-value">{{ Auth::user()->username ?? '-' }}</div>
                </div>

                <div class="info-row">
                    <div class="info-label">ID PENGGUNA APLIKASI MOBILE</div>
                    <div class="info-separator">:</div>
                    <div class="info-value">
                        @if(Auth::user()->username)
                            {{ '7L5' . strtoupper(Auth::user()->username) . '@NXT' }}
                        @else
                            -
                        @endif
                    </div>
                </div>

                <div class="info-row">
                    <div class="info-label">MATA UANG</div>
                    <div class="info-separator">:</div>
                    <div class="info-value">IDR</div>
                </div>
            </div>
        </div>
    </div>
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

/* Account Content Area */
.account-content {
    padding: 0;
    min-height: 300px;
    background: #1a1a1a;
}

/* Account Tabs */
.account-tabs {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    background: #2d2d2d;
    border-bottom: 1px solid #333;
    gap: 0;
}

.tab-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 14px 8px;
    background: #2d2d2d;
    border: none;
    border-right: 1px solid #333;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.tab-item:last-child {
    border-right: none;
}

.tab-item.active {
    background: #ff9500;
}

.tab-item:not(.active):hover {
    background: #3d3d3d;
}

.tab-icon {
    width: 24px;
    height: 24px;
    margin-bottom: 6px;
    color: #999;
    transition: color 0.3s ease;
}

.tab-item.active .tab-icon {
    color: #000;
}

.tab-label {
    font-size: 10px;
    font-weight: 600;
    text-align: center;
    color: #999;
    letter-spacing: 0.3px;
    line-height: 1.2;
    transition: color 0.3s ease;
}

.tab-item.active .tab-label {
    color: #000;
}

/* Info Section Wrapper */
.info-section-wrapper {
    margin: 16px;
    background: #1a1a1a;
}

.info-header {
    background: #ff9500;
    color: #000;
    font-size: 14px;
    font-weight: 700;
    padding: 12px 16px;
    text-align: center;
    letter-spacing: 1px;
}

.info-content {
    background: #2d2d2d;
    padding: 0;
}

.info-row {
    display: grid;
    grid-template-columns: 1fr auto 1.2fr;
    align-items: start;
    gap: 12px;
    padding: 14px 16px;
    border-bottom: 1px solid #1a1a1a;
}

.info-row:last-child {
    border-bottom: none;
}

.info-label {
    color: white;
    font-size: 11px;
    font-weight: 600;
    text-align: right;
    letter-spacing: 0.3px;
    line-height: 1.4;
}

.info-separator {
    color: white;
    font-size: 12px;
    font-weight: 600;
}

.info-value {
    color: white;
    font-size: 12px;
    font-weight: 600;
    text-align: left;
    word-break: break-word;
}

/* Email Alert */
.email-alert {
    display: flex;
    align-items: center;
    gap: 6px;
    background: #dc2626;
    color: white;
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
}

.alert-icon {
    width: 16px;
    height: 16px;
    flex-shrink: 0;
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

    .account-content {
        padding: 24px;
    }
}
</style>
@endpush

@push('scripts')
<script>
    // Hide status alert after 5 seconds
    document.addEventListener('DOMContentLoaded', () => {
        const alert = document.getElementById('memberStatusAlert');
        if (alert) {
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 400);
            }, 5000);
        }
    });
</script>
@endpush
