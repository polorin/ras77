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
    </div>

    <!-- Withdrawal Content (Hidden by default) -->
    <div class="tab-content" id="withdrawal-content">
        <div class="coming-soon">
            <p>Fitur Penarikan akan segera hadir...</p>
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
</style>
@endpush

@push('scripts')
<script>
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

    // Payment method selection
    const paymentMethods = document.querySelectorAll('.payment-method-btn');

    paymentMethods.forEach(method => {
        method.addEventListener('click', function() {
            // Remove active class from all methods
            paymentMethods.forEach(m => m.classList.remove('active'));
            
            // Add active class to clicked method
            this.classList.add('active');
            
            const methodName = this.getAttribute('data-method');
            console.log('Selected payment method:', methodName);
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
});
</script>
@endpush
