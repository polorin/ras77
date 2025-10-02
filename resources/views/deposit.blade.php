@extends('home')

@section('title', 'Deposit')

@section('content')
<div class="deposit-page">
    <!-- Tabs: Deposit dan Penarikan -->
    <div class="deposit-tabs">
        <button class="tab-button active" data-tab="deposit">
            <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/tabs/withdrawal.svg?v=20250528" alt="Deposit" class="tab-icon">
            <span>DEPOSIT</span>
        </button>
        <button class="tab-button" data-tab="withdrawal">
            <img src="https://dsuown9evwz4y.cloudfront.net/Images/~normad-alpha/dark-orange/mobile/tabs/withdrawal.svg?v=20250528" alt="Penarikan" class="tab-icon">
            <span>PENARIKAN</span>
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
                <label class="form-label">
                    Jumlah <span class="required">*</span>
                </label>
                <div class="amount-input-container">
                    <input type="text" 
                           class="amount-input" 
                           placeholder="IDR" 
                           value="0.00"
                           id="depositAmount">
                    <div class="qris-logo-container">
                        <img src="https://dsuown9evwz4y.cloudfront.net/Images/banks/qris.svg?v=20250528" alt="QRIS" class="qris-logo">
                        <button class="toggle-btn">
                            <svg width="12" height="8" viewBox="0 0 12 8" fill="none">
                                <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="amount-limits">
                    <span>Min: 25,000.00</span>
                    <span>Max: 10,000,000.00</span>
                </div>
            </div>

            <!-- Jumlah yang ditransfer -->
            <div class="form-group">
                <label class="form-label">Jumlah yang ditransfer</label>
                <select class="form-select">
                    <option value="">IDR 0</option>
                    <option value="25000">IDR 25,000</option>
                    <option value="50000">IDR 50,000</option>
                    <option value="100000">IDR 100,000</option>
                    <option value="200000">IDR 200,000</option>
                    <option value="500000">IDR 500,000</option>
                    <option value="1000000">IDR 1,000,000</option>
                </select>
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
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
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
    width: 24px;
    height: 24px;
    filter: brightness(0.7);
}

.tab-button.active .tab-icon {
    filter: brightness(0) invert(0);
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
    background: #2d2d2d;
    border: 1px solid #3a3a3a;
    border-radius: 6px;
    padding: 12px 16px;
}

.amount-input {
    flex: 1;
    background: transparent;
    border: none;
    color: white;
    font-size: 14px;
    font-weight: 600;
    outline: none;
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

.amount-limits {
    display: flex;
    justify-content: space-between;
    margin-top: 8px;
    font-size: 11px;
    color: #999;
}

.form-select {
    width: 100%;
    padding: 12px 16px;
    background: #2d2d2d;
    border: 1px solid #3a3a3a;
    border-radius: 6px;
    color: #ff9500;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    outline: none;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L6 6L11 1' stroke='%23999' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 16px center;
    padding-right: 40px;
}

.form-select:hover {
    border-color: #4a4a4a;
}

.form-select option {
    background: #2d2d2d;
    color: white;
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

    // Amount input formatting
    const amountInput = document.getElementById('depositAmount');
    
    amountInput.addEventListener('focus', function() {
        if (this.value === '0.00') {
            this.value = '';
        }
    });

    amountInput.addEventListener('blur', function() {
        if (this.value === '' || this.value === '0') {
            this.value = '0.00';
        } else {
            // Format as number with 2 decimals
            const num = parseFloat(this.value.replace(/,/g, ''));
            if (!isNaN(num)) {
                this.value = num.toFixed(2);
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
