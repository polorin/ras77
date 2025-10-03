@extends('layouts.main')

@section('title', 'Deposit')

@section('content')
<div class="deposit-page">
    <!-- Tabs: Deposit dan Penarikan -->
    <div class="deposit-tabs">
        <button class="tab-button active" data-tab="deposit">
            <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/tabs/withdrawal.svg?v=20250528" alt="Deposit" class="tab-icon">
            <span class="tab-text">DEPOSIT</span>
        </button>
        <button class="tab-button" data-tab="withdrawal">
            <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/tabs/withdrawal.svg?v=20250528" alt="Penarikan" class="tab-icon">
            <span class="tab-text">PENARIKAN</span>
        </button>
    </div>

    <!-- Deposit Content -->
    <div class="tab-content active" id="deposit-content">
        <!-- Metode Pembayaran -->
        <div class="payment-methods-section">
            <h3 class="section-title">Metode Pembayaran</h3>
            
            <div class="payment-methods-grid">
                <button class="payment-method-btn active" data-method="qris">
                    <img src="https://dsuown9evwz4y.cloudfront.net/Images/payment-types/QR.svg?v=20250528" alt="QRIS" class="method-icon">
                    <span>QRIS</span>
                </button>
                
                <button class="payment-method-btn" data-method="va">
                    <img src="https://dsuown9evwz4y.cloudfront.net/Images/payment-types/VA.svg?v=20250528" alt="Virtual Account" class="method-icon">
                    <span>Virtual A...</span>
                </button>
                
                <button class="payment-method-btn" data-method="bank">
                    <img src="https://dsuown9evwz4y.cloudfront.net/Images/payment-types/BANK.svg?v=20250528" alt="Bank" class="method-icon">
                    <span>Bank</span>
                </button>
                
                <button class="payment-method-btn" data-method="emoney">
                    <img src="https://dsuown9evwz4y.cloudfront.net/Images/payment-types/EMONEY.svg?v=20250528" alt="E-Money" class="method-icon">
                    <span>E-Money</span>
                </button>
                
                <button class="payment-method-btn" data-method="spin">
                    <img src="https://spin-wheel.sidesupports.com/scripts/spin.png" alt="Spin Wheel" class="method-icon">
                    <span>Spin Wheel</span>
                </button>
            </div>
        </div>

        <!-- Riwayat Deposit -->
        <div class="deposit-history-section">
            <div class="history-header">
                <span>Riwayat Deposit</span>
                <div class="balance-info">
                    <span>Saldo Saya</span>
                    <span class="balance-amount">0.00</span>
                </div>
            </div>
        </div>

        <!-- Form Deposit -->
        <div class="deposit-form-section">
            <!-- Jumlah -->
            <div class="form-group">
                <div class="label-with-logo">
                    <label class="form-label">
                        Jumlah <span class="required">*</span>
                    </label>
                    <div class="qris-logo-label">
                        <img src="https://dsuown9evwz4y.cloudfront.net/Images/banks/qris.svg?v=20250528" alt="QRIS" class="qris-logo">
                        <button class="toggle-btn-label">
                            <svg width="12" height="8" viewBox="0 0 12 8" fill="none">
                                <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="amount-input-container">
                    <span class="input-prefix">IDR</span>
                    <input type="text" 
                           class="amount-input" 
                           placeholder="0" 
                           value="0"
                           id="depositAmount">
                </div>
                <div class="amount-limits">
                    <span>Min: 20,000.00</span>
                    <span>Max: 10,000,000.00</span>
                </div>
            </div>

            <!-- Jumlah yang ditransfer -->
            <div class="form-group">
                <div class="transfer-section-header">
                    <span class="form-label">Jumlah yang ditransfer</span>
                    <div class="transfer-amount-display">
                        <span class="transfer-amount-label">IDR</span>
                        <span class="transfer-amount-value" id="transferAmountValue">0</span>
                        <button class="transfer-toggle-btn">
                            <svg width="12" height="8" viewBox="0 0 12 8" fill="none">
                                <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Transfer Details Dropdown (Hidden by default) -->
                <div class="transfer-details" id="transferDetails" style="display: none;">
                    <div class="transfer-detail-row">
                        <span class="detail-label">Riwayat Deposit</span>
                    </div>
                    <div class="transfer-detail-row">
                        <span class="detail-label">Jumlah yang ditransfer</span>
                        <span class="detail-value" id="detailTransferAmount">IDR 0</span>
                    </div>
                    <div class="transfer-detail-row">
                        <span class="detail-label">Biaya Admin</span>
                        <span class="detail-value">Rp 0</span>
                    </div>
                    <div class="transfer-detail-row">
                        <span class="detail-label">Jumlah yang didapat</span>
                        <span class="detail-value" id="detailReceivedAmount">IDR 0</span>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">
                KIRIM
            </button>
        </div>

        <!-- Form Deposit BANK TRANSFER -->
        <div class="deposit-form-section" id="bank-form" style="display: none;">
            <!-- Jumlah -->
            <div class="form-group">
                <label class="form-label">
                    Jumlah <span class="required">*</span>
                </label>
                <div class="amount-input-container">
                    <span class="input-prefix">IDR</span>
                    <input type="text" class="amount-input" placeholder="0" value="0" id="bankDepositAmount">
                </div>
                <div class="amount-limits">
                    <span>Min: 25,000.00</span>
                    <span>Max: 100,000,000.00</span>
                </div>
            </div>

            <!-- Akun Asal -->
            <div class="form-group">
                <label class="form-label">
                    Akun Asal <span class="required">*</span>
                </label>
                <div class="account-select-container">
                    <select class="account-select" id="sourceAccount">
                        <option value="">Pilih Akun Asal</option>
                        @if(Auth::check())
                            @foreach(Auth::user()->activeBankAccounts as $account)
                                <option value="{{ $account->id }}" {{ $account->is_primary ? 'selected' : '' }}>
                                    {{ $account->provider }} - {{ $account->account_number }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    <button class="add-account-btn" type="button" id="showBankAccountsBtn">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M10 4V16M4 10H16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Akun Tujuan -->
            <div class="form-group">
                <label class="form-label">
                    Akun Tujuan <span class="required">*</span>
                </label>
                <select class="account-select" id="destinationAccount">
                    <option value="">Pilih Akun Tujuan</option>
                    <option value="bca-0670950263" data-bank="BCA" data-holder="BETARI NUR AZIS">BCA - 0670950263</option>
                    <option value="mandiri-1234567890" data-bank="Mandiri" data-holder="PT RAS77">Mandiri - 1234567890</option>
                </select>
            </div>

            <!-- Destination Account Info Card -->
            <div class="destination-account-card" id="destinationAccountInfo" style="display: none;">
                <div class="account-card-header">
                    <div class="account-holder-name" id="accountHolderName">BETARI NUR AZIS</div>
                    <div class="account-number-display">
                        <span id="accountNumberDisplay">0670-9502-63</span>
                        <button class="copy-btn" type="button" onclick="copyAccountNumber()">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M7 7V4C7 3.44772 7.44772 3 8 3H16C16.5523 3 17 3.44772 17 4V12C17 12.5523 16.5523 13 16 13H13M4 7H12C12.5523 7 13 7.44772 13 8V16C13 16.5523 12.5523 17 12 17H4C3.44772 17 3 16.5523 3 16V8C3 7.44772 3.44772 7 4 7Z" stroke="currentColor" stroke-width="1.5"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="account-card-footer">
                    <div class="admin-fee">
                        <span class="admin-fee-label">Biaya Admin:</span>
                        <span class="admin-fee-value">IDR 0.00</span>
                    </div>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" alt="Bank Logo" class="bank-logo-card" id="bankLogoCard">
                </div>
            </div>

            <!-- Jumlah yang ditransfer -->
            <div class="form-group">
                <div class="transfer-section-header" id="bankTransferHeader">
                    <span class="form-label">Jumlah yang ditransfer</span>
                    <div class="transfer-amount-display">
                        <span class="transfer-amount-label">IDR</span>
                        <span class="transfer-amount-value" id="bankTransferAmountValue">0</span>
                        <button class="transfer-toggle-btn" type="button">
                            <svg width="12" height="8" viewBox="0 0 12 8" fill="none">
                                <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Transfer Details Dropdown -->
                <div class="transfer-details" id="bankTransferDetails" style="display: none;">
                    <div class="transfer-detail-row">
                        <span class="detail-label">Rincian Deposit</span>
                    </div>
                    <div class="transfer-detail-row">
                        <span class="detail-label">Jumlah yang ditransfer</span>
                        <span class="detail-value" id="bankDetailTransferAmount">IDR 0</span>
                    </div>
                    <div class="transfer-detail-row">
                        <span class="detail-label">Biaya Admin</span>
                        <span class="detail-value">IDR 0.00</span>
                    </div>
                    <div class="transfer-detail-row">
                        <span class="detail-label">Jumlah yang didapat</span>
                        <span class="detail-value" id="bankDetailReceivedAmount">IDR 0</span>
                    </div>
                </div>
            </div>

            <!-- Bukti Transfer -->
            <div class="form-group">
                <label class="form-label">Bukti Transfer</label>
                <div class="file-upload-container">
                    <input type="file" id="proofOfTransfer" accept="image/*" style="display: none;">
                    <label for="proofOfTransfer" class="file-upload-label">
                        <button type="button" class="file-upload-btn" onclick="document.getElementById('proofOfTransfer').click();">
                            Pilih File
                        </button>
                        <span class="file-upload-text" id="fileUploadText">tidak ada file yang dipilih</span>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">
                KIRIM
            </button>
        </div>
    </div>

    <!-- Withdrawal Content (Hidden by default) -->
    <div class="tab-content" id="withdrawal-content">
        <div class="coming-soon">
            <p>Fitur Penarikan akan segera hadir...</p>
        </div>
    </div>

    <!-- Modal: Bank Akun Asal (List of User's Bank Accounts) -->
    <div class="modal-overlay" id="bankAccountsModal" style="display: none;">
        <div class="modal-container">
            <div class="modal-header">
                <h3 class="modal-title">Bank Akun Asal</h3>
                <button class="modal-close-btn" onclick="closeBankAccountsModal()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <!-- List of User's Bank Accounts -->
                <div class="bank-accounts-list" id="bankAccountsList">
                    @if(Auth::check())
                        @php
                            $user = Auth::user();
                            $bankAccounts = $user->bankAccounts()->orderBy('is_primary', 'desc')->orderBy('created_at', 'desc')->get();
                        @endphp
                        
                        @if($bankAccounts->count() > 0)
                            @foreach($bankAccounts as $index => $account)
                                <div class="bank-account-item">
                                    <div class="account-radio">
                                        <input type="radio" name="selected_account" value="{{ $account->id }}" id="account_{{ $account->id }}" {{ $account->is_primary ? 'checked' : '' }}>
                                    </div>
                                    <div class="account-info">
                                        <div class="bank-logo-container">
                                            @php
                                                $bankLogos = [
                                                    'Bank Central Asia (BCA)' => 'https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg',
                                                    'Bank Mandiri' => 'https://upload.wikimedia.org/wikipedia/id/a/ad/Bank_Mandiri_logo_2016.svg',
                                                    'Bank Negara Indonesia (BNI)' => 'https://upload.wikimedia.org/wikipedia/id/5/55/BNI_logo.svg',
                                                    'Bank Rakyat Indonesia (BRI)' => 'https://upload.wikimedia.org/wikipedia/id/2/2e/BRI_2020.svg',
                                                ];
                                                $logoUrl = $bankLogos[$account->provider] ?? 'https://via.placeholder.com/48x48?text=Bank';
                                            @endphp
                                            <img src="{{ $logoUrl }}" alt="{{ $account->provider }}" class="account-bank-logo">
                                        </div>
                                        <div class="account-details">
                                            <div class="account-bank-number">{{ $account->provider }} | {{ $account->account_number }}</div>
                                            <div class="account-holder">{{ $account->account_holder_name }}</div>
                                        </div>
                                    </div>
                                    <div class="account-status">
                                        <span class="status-indicator {{ $account->is_primary ? 'active' : '' }}"></span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div style="text-align: center; padding: 20px; color: #999;">
                                <p>Belum ada akun bank terdaftar</p>
                                <p style="font-size: 12px; margin-top: 8px;">Silakan tambahkan akun bank Anda</p>
                            </div>
                        @endif
                    @endif
                </div>

                <!-- Add Account Button -->
                <div class="add-account-section">
                    <button class="add-account-modal-btn" type="button" onclick="showAddAccountModal()">
                        <div class="add-account-icon">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none">
                                <rect x="5" y="10" width="30" height="20" rx="2" stroke="currentColor" stroke-width="2"/>
                                <path d="M8 15H32M20 22V26" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <span class="add-account-text">TAMBAH AKUN</span>
                        <div class="add-account-plus">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Add New Account Form -->
    <div class="modal-overlay" id="addAccountModal" style="display: none;">
        <div class="modal-container modal-form">
            <div class="modal-header">
                <h3 class="modal-title">Akun <span class="required">*</span></h3>
                <button class="modal-close-btn" onclick="closeAddAccountModal()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form id="addAccountForm" class="add-account-form">
                    <!-- Pilih Akun (Bank Dropdown) -->
                    <div class="form-group-modal">
                        <label class="form-label-modal">Akun <span class="required">*</span></label>
                        <div class="custom-select-wrapper">
                            <select class="form-select-modal" id="bankProviderSelect" required>
                                <option value="">— Pilih Akun —</option>
                                <option value="Bank Central Asia (BCA)">Bank Central Asia (BCA)</option>
                                <option value="Bank Mandiri">Bank Mandiri</option>
                                <option value="Bank Negara Indonesia (BNI)">Bank Negara Indonesia (BNI)</option>
                                <option value="Bank Rakyat Indonesia (BRI)">Bank Rakyat Indonesia (BRI)</option>
                                <option value="Bank CIMB Niaga">Bank CIMB Niaga</option>
                                <option value="Bank Danamon">Bank Danamon</option>
                                <option value="Bank Permata">Bank Permata</option>
                                <option value="Bank Tabungan Negara (BTN)">Bank Tabungan Negara (BTN)</option>
                                <option value="Bank Mega">Bank Mega</option>
                                <option value="Bank Panin">Bank Panin</option>
                                <option value="Bank OCBC NISP">Bank OCBC NISP</option>
                                <option value="Bank Sinarmas">Bank Sinarmas</option>
                                <option value="Bank Bukopin">Bank Bukopin</option>
                                <option value="Bank BTPN">Bank BTPN</option>
                                <option value="Bank Maybank Indonesia">Bank Maybank Indonesia</option>
                                <option value="Bank HSBC Indonesia">Bank HSBC Indonesia</option>
                                <option value="Bank Muamalat">Bank Muamalat</option>
                                <option value="Bank Syariah Indonesia">Bank Syariah Indonesia</option>
                                <option value="Bank Jago">Bank Jago</option>
                                <option value="Bank Commonwealth">Bank Commonwealth</option>
                                <option value="Bank Mayora">Bank Mayora</option>
                                <option value="Bank Mestika">Bank Mestika</option>
                                <option value="Bank Victoria">Bank Victoria</option>
                                <option value="Bank Woori Saudara">Bank Woori Saudara</option>
                                <option value="BPD DKI">BPD DKI</option>
                                <option value="BPD Jabar Banten (BJB)">BPD Jabar Banten (BJB)</option>
                                <option value="BPD Jawa Tengah (Bank Jateng)">BPD Jawa Tengah (Bank Jateng)</option>
                                <option value="BPD Jawa Timur (Bank Jatim)">BPD Jawa Timur (Bank Jatim)</option>
                                <option value="BPD Sumatera Utara (Bank Sumut)">BPD Sumatera Utara (Bank Sumut)</option>
                                <option value="BPD Sumatera Barat (Bank Nagari)">BPD Sumatera Barat (Bank Nagari)</option>
                                <option value="BPD Aceh">BPD Aceh</option>
                                <option value="BPD Riau Kepri">BPD Riau Kepri</option>
                                <option value="BPD Sumsel Babel">BPD Sumsel Babel</option>
                                <option value="BPD Kalimantan Barat">BPD Kalimantan Barat</option>
                                <option value="BPD Kalimantan Selatan">BPD Kalimantan Selatan</option>
                                <option value="BPD Kalimantan Timur">BPD Kalimantan Timur</option>
                                <option value="BPD Papua">BPD Papua</option>
                                <option value="BPD Nusa Tenggara Timur (Bank NTT)">BPD Nusa Tenggara Timur (Bank NTT)</option>
                                <option value="BPD Nusa Tenggara Barat (Bank NTB)">BPD Nusa Tenggara Barat (Bank NTB)</option>
                            </select>
                            <div class="select-arrow">
                                <svg width="12" height="8" viewBox="0 0 12 8" fill="none">
                                    <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Nomor Rekening -->
                    <div class="form-group-modal">
                        <label class="form-label-modal">Nomor Rekening <span class="required">*</span></label>
                        <input type="text" 
                               class="form-input-modal" 
                               id="accountNumberInput" 
                               placeholder="Nomor Rekening Anda"
                               required>
                    </div>

                    <!-- Nama Lengkap (Readonly) -->
                    <div class="form-group-modal">
                        <label class="form-label-modal">Nama Lengkap <span class="required">*</span></label>
                        <input type="text" 
                               class="form-input-modal" 
                               id="fullNameInput" 
                               value="{{ Auth::check() ? (Auth::user()->full_name ?? Auth::user()->name) : '' }}"
                               readonly>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-account-btn">
                        Tambahkan Akun
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@parent
@endsection

@push('styles')
<style>
/* Deposit Page Styles */
.deposit-page {
    background: #1a1a1a;
    min-height: calc(100vh - 120px);
    padding-bottom: 80px;
}

/* Tabs */
.deposit-tabs {
    display: flex;
    background: #000;
    border-bottom: 1px solid #333;
}

.tab-button {
    flex: 1;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 14px 16px;
    background: #000;
    border: none;
    color: #999;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 0.5px;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
}

.tab-button.active {
    background: #ff9500;
    color: #000;
}

.tab-button:not(.active):hover {
    background: #1a1a1a;
    color: #fff;
}

.tab-icon {
    width: 20px;
    height: 20px;
    filter: brightness(0.7);
}

.tab-button.active .tab-icon {
    filter: brightness(0) invert(0);
}

.tab-text {
    white-space: nowrap;
}

/* Tab Content */
.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

/* Payment Methods Section */
.payment-methods-section {
    padding: 20px 16px;
    background: #1a1a1a;
    border-bottom: 1px solid #2d2d2d;
}

.section-title {
    color: white;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 12px;
    letter-spacing: 0.3px;
}

.payment-methods-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 12px;
}

.payment-method-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 12px 8px;
    background: #2d2d2d;
    border: 2px solid #2d2d2d;
    border-radius: 8px;
    color: #999;
    font-size: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.payment-method-btn:hover {
    background: #3a3a3a;
    border-color: #4a4a4a;
}

.payment-method-btn.active {
    background: #ff9500;
    border-color: #ff9500;
    color: #000;
}

.method-icon {
    width: 32px;
    height: 32px;
    object-fit: contain;
    background: #c0c0c0;
    padding: 6px;
    border-radius: 6px;
}

.payment-method-btn span {
    text-align: center;
    line-height: 1.2;
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Deposit History Section */
.deposit-history-section {
    padding: 16px;
    background: #1a1a1a;
    border-bottom: 1px solid #2d2d2d;
}

.history-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.history-header > span {
    color: white;
    font-size: 13px;
    font-weight: 600;
}

.balance-info {
    display: flex;
    align-items: center;
    gap: 8px;
    color: white;
    font-size: 12px;
}

.balance-amount {
    color: #ff9500;
    font-weight: 700;
}

/* Form Section */
.deposit-form-section {
    padding: 20px 16px;
    background: #1a1a1a;
}

.form-group {
    margin-bottom: 20px;
}

.form-label {
    display: block;
    color: white;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 8px;
}

.required {
    color: #ff9500;
}

.amount-input-container {
    position: relative;
    display: flex;
    align-items: center;
    gap: 8px;
    background: #2d2d2d;
    border: 1px solid #3a3a3a;
    border-radius: 6px;
    padding: 10px 16px;
}

.input-prefix {
    color: white;
    font-size: 13px;
    font-weight: 600;
    white-space: nowrap;
}

.amount-input {
    flex: 1;
    background: transparent;
    border: none;
    color: white;
    font-size: 14px;
    font-weight: 600;
    outline: none;
    min-width: 0;
}

.amount-input::placeholder {
    color: #666;
}

.qris-logo-container {
    display: flex;
    align-items: center;
    gap: 8px;
    padding-left: 12px;
    border-left: 1px solid #4a4a4a;
}

.qris-logo {
    width: 40px;
    height: 20px;
    object-fit: contain;
}

.toggle-btn {
    background: transparent;
    border: none;
    color: #4ade80;
    cursor: pointer;
    padding: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.toggle-btn:hover {
    color: #22c55e;
}

/* Label with Logo */
.label-with-logo {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
}

.qris-logo-label {
    display: flex;
    align-items: center;
    gap: 8px;
}

.qris-logo {
    width: 40px;
    height: 20px;
    object-fit: contain;
}

.toggle-btn-label {
    background: transparent;
    border: none;
    color: #4ade80;
    cursor: pointer;
    padding: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.toggle-btn-label:hover {
    color: #22c55e;
}

.amount-limits {
    display: flex;
    justify-content: space-between;
    margin-top: 8px;
    font-size: 11px;
    color: #999;
}

/* Transfer Section */
.transfer-section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 16px;
    background: #2d2d2d;
    border: 1px solid #3a3a3a;
    border-radius: 6px;
    cursor: pointer;
}

.transfer-section-header:hover {
    border-color: #4a4a4a;
}

.transfer-amount-display {
    display: flex;
    align-items: center;
    gap: 8px;
}

.transfer-amount-label {
    color: white;
    font-size: 12px;
    font-weight: 600;
}

.transfer-amount-value {
    color: #ff9500;
    font-size: 14px;
    font-weight: 700;
}

.transfer-toggle-btn {
    background: transparent;
    border: none;
    color: white;
    cursor: pointer;
    padding: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.transfer-toggle-btn:hover {
    color: #ff9500;
}

.transfer-details {
    margin-top: 8px;
    background: #2d2d2d;
    border: 1px solid #3a3a3a;
    border-radius: 6px;
    padding: 8px 0;
}

.transfer-detail-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 16px;
    border-bottom: 1px solid #3a3a3a;
}

.transfer-detail-row:last-child {
    border-bottom: none;
}

.detail-label {
    color: white;
    font-size: 12px;
    font-weight: 500;
}

.detail-value {
    color: #ff9500;
    font-size: 13px;
    font-weight: 700;
}

/* Submit Button */
.submit-btn {
    width: 100%;
    padding: 14px;
    background: linear-gradient(135deg, #ff9500 0%, #ff8000 100%);
    border: none;
    border-radius: 6px;
    color: #000;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: uppercase;
}

.submit-btn:hover {
    background: linear-gradient(135deg, #ff8000 0%, #ff7000 100%);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(255, 149, 0, 0.3);
}

.submit-btn:active {
    transform: translateY(0);
}

/* Bank Transfer Form Specific Styles */
.account-select-container {
    display: flex;
    align-items: center;
    gap: 8px;
}

.account-select {
    flex: 1;
    background: #2d2d2d;
    border: 1px solid #3a3a3a;
    border-radius: 6px;
    padding: 12px 16px;
    color: white;
    font-size: 13px;
    outline: none;
    cursor: pointer;
}

.account-select option {
    background: #2d2d2d;
    color: white;
}

.add-account-btn {
    background: #ff9500;
    border: none;
    border-radius: 6px;
    padding: 10px;
    color: #000;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.add-account-btn:hover {
    background: #ff8000;
}

.destination-account-card {
    background: #2d2d2d;
    border: 1px solid #3a3a3a;
    border-radius: 8px;
    padding: 16px;
    margin-top: 12px;
}

.account-card-header {
    margin-bottom: 12px;
}

.account-holder-name {
    color: white;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 8px;
}

.account-number-display {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #1a1a1a;
    padding: 10px 12px;
    border-radius: 6px;
}

.account-number-display span {
    color: #ff9500;
    font-size: 16px;
    font-weight: 700;
    letter-spacing: 1px;
}

.copy-btn {
    background: transparent;
    border: none;
    color: #ff9500;
    cursor: pointer;
    padding: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.copy-btn:hover {
    color: #ff8000;
}

.account-card-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 12px;
    border-top: 1px solid #3a3a3a;
}

.admin-fee {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.admin-fee-label {
    color: #999;
    font-size: 11px;
}

.admin-fee-value {
    color: white;
    font-size: 13px;
    font-weight: 600;
}

.bank-logo-card {
    width: 60px;
    height: 30px;
    object-fit: contain;
}

.file-upload-container {
    background: #2d2d2d;
    border: 1px solid #3a3a3a;
    border-radius: 6px;
    padding: 12px 16px;
}

.file-upload-label {
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
}

.file-upload-btn {
    background: #ff9500;
    border: none;
    border-radius: 4px;
    padding: 8px 16px;
    color: #000;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.file-upload-btn:hover {
    background: #ff8000;
}

.file-upload-text {
    color: #999;
    font-size: 12px;
}

/* Coming Soon */
.coming-soon {
    padding: 60px 20px;
    text-align: center;
}

.coming-soon p {
    color: #999;
    font-size: 14px;
}

/* Responsive */
@media (max-width: 480px) {
    .payment-methods-grid {
        grid-template-columns: repeat(5, 1fr);
        gap: 8px;
    }

    .payment-method-btn {
        padding: 10px 6px;
        gap: 4px;
    }

    .method-icon {
        width: 28px;
        height: 28px;
    }

    .payment-method-btn span {
        font-size: 9px;
    }
}

@media (min-width: 768px) {
    .deposit-page {
        max-width: 600px;
        margin: 0 auto;
    }

    .payment-methods-grid {
        grid-template-columns: repeat(5, 1fr);
        gap: 16px;
    }

    .payment-method-btn {
        padding: 16px 12px;
    }

    .method-icon {
        width: 40px;
        height: 40px;
    }
}

/* Modal Styles */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.85);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    padding: 20px;
}

.modal-container {
    background: #1a1a1a;
    border-radius: 16px;
    max-width: 500px;
    width: 100%;
    max-height: 90vh;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    border: 1px solid #2d2d2d;
}

.modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 24px;
    border-bottom: 1px solid #2d2d2d;
}

.modal-title {
    color: white;
    font-size: 18px;
    font-weight: 700;
    margin: 0;
}

.modal-close-btn {
    background: transparent;
    border: none;
    color: #999;
    cursor: pointer;
    padding: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color 0.2s;
}

.modal-close-btn:hover {
    color: white;
}

.modal-body {
    padding: 24px;
    overflow-y: auto;
    flex: 1;
}

/* Bank Accounts List Modal */
.bank-accounts-list {
    margin-bottom: 24px;
}

.bank-account-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px;
    background: #2d2d2d;
    border: 2px solid #2d2d2d;
    border-radius: 12px;
    margin-bottom: 12px;
    cursor: pointer;
    transition: all 0.3s;
}

.bank-account-item:hover {
    background: #3a3a3a;
    border-color: #ff9500;
}

.account-radio input[type="radio"] {
    width: 20px;
    height: 20px;
    cursor: pointer;
    accent-color: #4ade80;
}

.account-info {
    display: flex;
    align-items: center;
    gap: 12px;
    flex: 1;
}

.bank-logo-container {
    width: 48px;
    height: 48px;
    background: white;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 8px;
}

.account-bank-logo {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.account-details {
    flex: 1;
}

.account-bank-number {
    color: white;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 4px;
}

.account-holder {
    color: #999;
    font-size: 12px;
}

.account-status {
    display: flex;
    align-items: center;
}

.status-indicator {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 2px solid #666;
    background: transparent;
}

.status-indicator.active {
    background: #4ade80;
    border-color: #4ade80;
}

/* Add Account Section */
.add-account-section {
    margin-top: 24px;
}

.add-account-modal-btn {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    background: #2d2d2d;
    border: 2px solid #3a3a3a;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s;
    color: white;
}

.add-account-modal-btn:hover {
    background: #3a3a3a;
    border-color: #ff9500;
}

.add-account-icon {
    color: #999;
}

.add-account-text {
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0.5px;
}

.add-account-plus {
    width: 32px;
    height: 32px;
    background: #1a1a2e;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}

/* Add Account Form Modal */
.modal-form {
    max-width: 460px;
}

.add-account-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-group-modal {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.form-label-modal {
    color: white;
    font-size: 13px;
    font-weight: 600;
}

.custom-select-wrapper {
    position: relative;
}

.form-select-modal {
    width: 100%;
    padding: 14px 16px;
    background: #2d2d2d;
    border: 1px solid #3a3a3a;
    border-radius: 8px;
    color: white;
    font-size: 14px;
    cursor: pointer;
    appearance: none;
    outline: none;
    transition: all 0.3s;
}

.form-select-modal:focus {
    border-color: #ff9500;
}

.select-arrow {
    position: absolute;
    right: 16px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    pointer-events: none;
}

.form-input-modal {
    width: 100%;
    padding: 14px 16px;
    background: #2d2d2d;
    border: 1px solid #3a3a3a;
    border-radius: 8px;
    color: white;
    font-size: 14px;
    outline: none;
    transition: all 0.3s;
}

.form-input-modal:focus {
    border-color: #ff9500;
}

.form-input-modal:read-only {
    background: #1a1a1a;
    color: #999;
    cursor: not-allowed;
}

.form-input-modal::placeholder {
    color: #666;
}

.submit-account-btn {
    width: 100%;
    padding: 14px 24px;
    background: #1a1a2e;
    border: none;
    border-radius: 24px;
    color: white;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s;
    margin-top: 8px;
}

.submit-account-btn:hover {
    background: #252540;
}

.submit-account-btn:active {
    transform: scale(0.98);
}

/* Modal Responsive */
@media (max-width: 640px) {
    .modal-container {
        max-width: 100%;
        max-height: 85vh;
    }
    
    .modal-header {
        padding: 16px 20px;
    }
    
    .modal-body {
        padding: 20px;
    }
    
    .bank-account-item {
        padding: 12px;
    }
    
    .account-bank-number {
        font-size: 13px;
    }
}

/* Toast Notification Styles */
.toast-notification {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #2d2d2d;
    border-radius: 12px;
    padding: 16px 20px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
    z-index: 10000;
    opacity: 0;
    transform: translateX(400px);
    transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    max-width: 400px;
    border: 1px solid #3a3a3a;
}

.toast-notification.show {
    opacity: 1;
    transform: translateX(0);
}

.toast-content {
    display: flex;
    align-items: center;
    gap: 12px;
}

.toast-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: bold;
    flex-shrink: 0;
}

.toast-success .toast-icon {
    background: #4ade80;
    color: #000;
}

.toast-error .toast-icon {
    background: #ef4444;
    color: #fff;
}

.toast-message {
    color: white;
    font-size: 14px;
    font-weight: 500;
    line-height: 1.4;
}

.toast-success {
    border-left: 4px solid #4ade80;
}

.toast-error {
    border-left: 4px solid #ef4444;
}

/* Toast Mobile Responsive */
@media (max-width: 640px) {
    .toast-notification {
        top: 10px;
        right: 10px;
        left: 10px;
        max-width: none;
        transform: translateY(-100px);
    }
    
    .toast-notification.show {
        transform: translateY(0);
    }
}
</style>
@endpush

@push('scripts')
<script>
// Toast Notification Function
function showToast(message, type = 'success', duration = 4000) {
    console.log('showToast called:', { message, type, duration });
    
    // Remove existing toast if any
    const existingToast = document.getElementById('toast-notification');
    if (existingToast) {
        existingToast.remove();
    }

    // Create toast element
    const toast = document.createElement('div');
    toast.id = 'toast-notification';
    toast.className = `toast-notification toast-${type}`;
    toast.innerHTML = `
        <div class="toast-content">
            <div class="toast-icon">
                ${type === 'success' ? '✓' : '✕'}
            </div>
            <span class="toast-message">${message}</span>
        </div>
    `;

    // Add to body
    document.body.appendChild(toast);
    console.log('Toast element added to body');

    // Show toast with animation
    setTimeout(() => {
        toast.classList.add('show');
        console.log('Toast show class added');
    }, 100);

    // Auto hide after duration
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => {
            toast.remove();
        }, 300);
    }, duration);
    
    return toast;
}

document.addEventListener('DOMContentLoaded', function() {
    // Tab switching
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const tabName = this.getAttribute('data-tab');

            // Remove active class from all tabs and contents
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));

            // Add active class to clicked tab and corresponding content
            this.classList.add('active');
            document.getElementById(tabName + '-content').classList.add('active');
        });
    });

    // Payment method selection and form switching
    const paymentMethods = document.querySelectorAll('.payment-method-btn');
    const qrisForm = document.querySelector('.deposit-form-section:not(#bank-form)');
    const bankForm = document.getElementById('bank-form');

    paymentMethods.forEach(method => {
        method.addEventListener('click', function() {
            // Remove active class from all methods
            paymentMethods.forEach(m => m.classList.remove('active'));
            
            // Add active class to clicked method
            this.classList.add('active');
            
            const methodName = this.getAttribute('data-method');
            console.log('Selected payment method:', methodName);
            
            // Switch between forms based on method
            if (methodName === 'bank') {
                if (qrisForm) qrisForm.style.display = 'none';
                if (bankForm) bankForm.style.display = 'block';
            } else {
                if (qrisForm) qrisForm.style.display = 'block';
                if (bankForm) bankForm.style.display = 'none';
            }
        });
    });

    // Transfer details toggle
    const transferHeader = document.querySelector('.transfer-section-header');
    const transferDetails = document.getElementById('transferDetails');
    const transferToggleBtn = document.querySelector('.transfer-toggle-btn');

    if (transferHeader && transferDetails && transferToggleBtn) {
        transferHeader.addEventListener('click', function() {
            const isHidden = transferDetails.style.display === 'none';
            
            if (isHidden) {
                transferDetails.style.display = 'block';
                transferToggleBtn.style.transform = 'rotate(180deg)';
            } else {
                transferDetails.style.display = 'none';
                transferToggleBtn.style.transform = 'rotate(0deg)';
            }
        });
    }

    // Amount input formatting and transfer amount update
    const amountInput = document.getElementById('depositAmount');
    const transferAmountValue = document.getElementById('transferAmountValue');
    const detailTransferAmount = document.getElementById('detailTransferAmount');
    const detailReceivedAmount = document.getElementById('detailReceivedAmount');
    
    function updateTransferAmounts(amount) {
        const numAmount = parseFloat(amount) || 0;
        const formattedAmount = numAmount.toLocaleString('id-ID');
        
        // Update all display elements
        if (transferAmountValue) {
            transferAmountValue.textContent = formattedAmount;
        }
        if (detailTransferAmount) {
            detailTransferAmount.textContent = 'IDR ' + formattedAmount;
        }
        if (detailReceivedAmount) {
            detailReceivedAmount.textContent = 'IDR ' + formattedAmount;
        }
    }
    
    amountInput.addEventListener('focus', function() {
        if (this.value === '0' || this.value === '0.00') {
            this.value = '';
        }
    });

    amountInput.addEventListener('blur', function() {
        if (this.value === '' || this.value === '0') {
            this.value = '0';
            updateTransferAmounts(0);
        } else {
            // Keep as entered, just remove invalid chars
            const num = parseFloat(this.value.replace(/[^\d.]/g, ''));
            if (!isNaN(num)) {
                this.value = num.toString();
                updateTransferAmounts(num);
            }
        }
    });

    amountInput.addEventListener('input', function() {
        // Remove non-numeric characters except decimal point
        this.value = this.value.replace(/[^\d.]/g, '');
        
        // Prevent multiple decimal points
        const parts = this.value.split('.');
        if (parts.length > 2) {
            this.value = parts[0] + '.' + parts.slice(1).join('');
        }
        
        // Update transfer amounts in real-time
        const num = parseFloat(this.value) || 0;
        updateTransferAmounts(num);
    });

    // Bank Transfer Form Handlers
    const bankAmountInput = document.getElementById('bankDepositAmount');
    const bankTransferAmountValue = document.getElementById('bankTransferAmountValue');
    const bankDetailTransferAmount = document.getElementById('bankDetailTransferAmount');
    const bankDetailReceivedAmount = document.getElementById('bankDetailReceivedAmount');
    const bankTransferHeader = document.getElementById('bankTransferHeader');
    const bankTransferDetails = document.getElementById('bankTransferDetails');
    const destinationAccount = document.getElementById('destinationAccount');
    const destinationAccountInfo = document.getElementById('destinationAccountInfo');
    const accountHolderName = document.getElementById('accountHolderName');
    const accountNumberDisplay = document.getElementById('accountNumberDisplay');
    const bankLogoCard = document.getElementById('bankLogoCard');
    const proofOfTransfer = document.getElementById('proofOfTransfer');
    const fileUploadText = document.getElementById('fileUploadText');

    // Bank amount input handler
    if (bankAmountInput) {
        function updateBankTransferAmounts(amount) {
            const numAmount = parseFloat(amount) || 0;
            const formattedAmount = numAmount.toLocaleString('id-ID');
            
            if (bankTransferAmountValue) {
                bankTransferAmountValue.textContent = formattedAmount;
            }
            if (bankDetailTransferAmount) {
                bankDetailTransferAmount.textContent = 'IDR ' + formattedAmount;
            }
            if (bankDetailReceivedAmount) {
                bankDetailReceivedAmount.textContent = 'IDR ' + formattedAmount;
            }
        }

        bankAmountInput.addEventListener('focus', function() {
            if (this.value === '0' || this.value === '0.00') {
                this.value = '';
            }
        });

        bankAmountInput.addEventListener('blur', function() {
            if (this.value === '' || this.value === '0') {
                this.value = '0';
                updateBankTransferAmounts(0);
            } else {
                const num = parseFloat(this.value.replace(/[^\\d.]/g, ''));
                if (!isNaN(num)) {
                    this.value = num.toString();
                    updateBankTransferAmounts(num);
                }
            }
        });

        bankAmountInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^\\d.]/g, '');
            const parts = this.value.split('.');
            if (parts.length > 2) {
                this.value = parts[0] + '.' + parts.slice(1).join('');
            }
            const num = parseFloat(this.value) || 0;
            updateBankTransferAmounts(num);
        });
    }

    // Bank transfer details toggle
    if (bankTransferHeader && bankTransferDetails) {
        bankTransferHeader.addEventListener('click', function() {
            const isHidden = bankTransferDetails.style.display === 'none';
            const toggleBtn = this.querySelector('.transfer-toggle-btn');
            
            if (isHidden) {
                bankTransferDetails.style.display = 'block';
                if (toggleBtn) toggleBtn.style.transform = 'rotate(180deg)';
            } else {
                bankTransferDetails.style.display = 'none';
                if (toggleBtn) toggleBtn.style.transform = 'rotate(0deg)';
            }
        });
    }

    // Destination account selection handler
    if (destinationAccount) {
        destinationAccount.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const bank = selectedOption.getAttribute('data-bank');
            const holder = selectedOption.getAttribute('data-holder');
            const accountNumber = selectedOption.value.split('-')[1];

            if (this.value && destinationAccountInfo) {
                destinationAccountInfo.style.display = 'block';
                
                if (accountHolderName) {
                    accountHolderName.textContent = holder || 'N/A';
                }
                
                if (accountNumberDisplay) {
                    accountNumberDisplay.textContent = accountNumber || '';
                }
                
                // Update bank logo based on bank
                if (bankLogoCard && bank) {
                    const bankLogos = {
                        'BCA': 'https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg',
                        'Mandiri': 'https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg',
                        'BNI': 'https://upload.wikimedia.org/wikipedia/id/5/55/BNI_logo.svg'
                    };
                    bankLogoCard.src = bankLogos[bank] || bankLogos['BCA'];
                }
            } else {
                if (destinationAccountInfo) {
                    destinationAccountInfo.style.display = 'none';
                }
            }
        });
    }

    // File upload handler
    if (proofOfTransfer && fileUploadText) {
        proofOfTransfer.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                fileUploadText.textContent = this.files[0].name;
            } else {
                fileUploadText.textContent = 'tidak ada file yang dipilih';
            }
        });
    }

    // Copy account number function
    window.copyAccountNumber = function() {
        const accountNumber = document.getElementById('accountNumberDisplay').textContent;
        navigator.clipboard.writeText(accountNumber.replace(/-/g, '')).then(function() {
            alert('Nomor rekening berhasil disalin!');
        }).catch(function(err) {
            console.error('Failed to copy:', err);
        });
    };

    // Form submission
    document.querySelector('.submit-btn').addEventListener('click', function(e) {
        e.preventDefault();
        
        const amount = parseFloat(amountInput.value);
        const minAmount = 25000;
        const maxAmount = 10000000;

        if (isNaN(amount) || amount < minAmount) {
            alert(`Jumlah minimum deposit adalah IDR ${minAmount.toLocaleString('id-ID')}`);
            return;
        }

        if (amount > maxAmount) {
            alert(`Jumlah maximum deposit adalah IDR ${maxAmount.toLocaleString('id-ID')}`);
            return;
        }

        const selectedMethod = document.querySelector('.payment-method-btn.active');
        if (!selectedMethod) {
            alert('Silakan pilih metode pembayaran');
            return;
        }

        console.log('Submitting deposit:', {
            amount: amount,
            method: selectedMethod.getAttribute('data-method')
        });

        alert('Fitur deposit akan segera diaktifkan!');
    });

    // Modal Functions
    const bankAccountsModal = document.getElementById('bankAccountsModal');
    const addAccountModal = document.getElementById('addAccountModal');
    const showBankAccountsBtn = document.getElementById('showBankAccountsBtn');

    // Show Bank Accounts Modal
    if (showBankAccountsBtn) {
        showBankAccountsBtn.addEventListener('click', function(e) {
            e.preventDefault();
            showBankAccountsModal();
        });
    }

    // Close modal when clicking outside
    if (bankAccountsModal) {
        bankAccountsModal.addEventListener('click', function(e) {
            if (e.target === bankAccountsModal) {
                closeBankAccountsModal();
            }
        });
    }

    if (addAccountModal) {
        addAccountModal.addEventListener('click', function(e) {
            if (e.target === addAccountModal) {
                closeAddAccountModal();
            }
        });
    }

    // Add Account Form Submit
    const addAccountForm = document.getElementById('addAccountForm');
    if (addAccountForm) {
        addAccountForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const bankProvider = document.getElementById('bankProviderSelect').value;
            const accountNumber = document.getElementById('accountNumberInput').value;
            const fullName = document.getElementById('fullNameInput').value;
            const submitBtn = addAccountForm.querySelector('.submit-account-btn');

            console.log('Form submission started...', { bankProvider, accountNumber, fullName });

            if (!bankProvider || !accountNumber) {
                showToast('Silakan lengkapi semua field yang diperlukan', 'error');
                return;
            }

            // Disable button while submitting
            submitBtn.disabled = true;
            submitBtn.textContent = 'Menambahkan...';

            // Send to server via AJAX
            fetch('{{ route("bank-accounts.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    provider: bankProvider,
                    account_number: accountNumber,
                    account_holder_name: fullName,
                    is_primary: false
                })
            })
            .then(response => {
                console.log('Response status:', response.status);
                return response.json().then(data => ({
                    status: response.status,
                    data: data
                }));
            })
            .then(({ status, data }) => {
                console.log('Response data:', data);
                
                if (status >= 200 && status < 300 && data.success) {
                    // Show success toast with longer duration
                    showToast('✓ Akun bank berhasil ditambahkan!', 'success', 3000);
                    
                    // Reset form
                    addAccountForm.reset();
                    document.getElementById('fullNameInput').value = fullName;
                    
                    // Close modals and reload after toast is visible
                    setTimeout(() => {
                        closeAddAccountModal();
                        closeBankAccountsModal();
                        
                        // Reload page to show new account
                        window.location.reload();
                    }, 2500);
                } else {
                    // Handle validation errors
                    if (data.errors) {
                        const errorMessages = Object.values(data.errors).flat().join(', ');
                        showToast('Error: ' + errorMessages, 'error');
                    } else {
                        showToast('Gagal menambahkan akun: ' + (data.message || 'Unknown error'), 'error');
                    }
                    
                    // Re-enable button
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Tambahkan Akun';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Terjadi kesalahan koneksi. Silakan coba lagi.', 'error');
                
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.textContent = 'Tambahkan Akun';
            });
        });
    }
});

// Global functions for modal controls
function showBankAccountsModal() {
    const modal = document.getElementById('bankAccountsModal');
    if (modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

function closeBankAccountsModal() {
    const modal = document.getElementById('bankAccountsModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}

function showAddAccountModal() {
    const bankAccountsModal = document.getElementById('bankAccountsModal');
    const addAccountModal = document.getElementById('addAccountModal');
    
    // Hide bank accounts modal
    if (bankAccountsModal) {
        bankAccountsModal.style.display = 'none';
    }
    
    // Show add account modal
    if (addAccountModal) {
        addAccountModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

function closeAddAccountModal() {
    const addAccountModal = document.getElementById('addAccountModal');
    if (addAccountModal) {
        addAccountModal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
    
    // Show back the bank accounts modal
    showBankAccountsModal();
}
</script>
@endpush
