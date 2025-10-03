@extends('layouts.main')

@section('title', 'Ubah Kata Sandi')

@section('content')
    <!-- Page Header -->
    <div class="password-page-header">
        UBAH KATA SANDI
    </div>

    <!-- Password Change Form -->
    <div class="password-form-container">
        <!-- Catatan Section -->
        <div class="password-notes">
            <div class="notes-title">Catatan:</div>
            <ol class="notes-list">
                <li>Kata Sandi harus terdiri dari 8-20 karakter.</li>
                <li>Kata Sandi harus mengandung huruf dan angka.</li>
                <li>Kata Sandi tidak boleh mengandung username.</li>
                <li>Kata Sandi tidak boleh mengandung simbol &, <, atau ></li>
            </ol>
        </div>

        <!-- Form Fields -->
        <form id="changePasswordForm" class="password-form" method="POST" action="#">
            @csrf
            
            <!-- Kata Sandi Saat Ini -->
            <div class="form-group">
                <label for="current_password" class="form-label">Kata Sandi Saat Ini</label>
                <input 
                    type="password" 
                    id="current_password" 
                    name="current_password" 
                    class="form-input"
                    placeholder="Kata Sandi Saat Ini"
                    required
                >
            </div>

            <!-- Kata Sandi Baru -->
            <div class="form-group">
                <label for="new_password" class="form-label">Kata Sandi Baru</label>
                <div class="input-with-icon">
                    <input 
                        type="password" 
                        id="new_password" 
                        name="new_password" 
                        class="form-input"
                        placeholder="Kata Sandi Baru"
                        required
                    >
                    <button type="button" class="toggle-password" data-target="new_password">
                        <svg class="eye-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Ulangi Kata Sandi -->
            <div class="form-group">
                <label for="confirm_password" class="form-label">Ulangi Kata Sandi</label>
                <div class="input-with-icon">
                    <input 
                        type="password" 
                        id="confirm_password" 
                        name="confirm_password" 
                        class="form-input"
                        placeholder="Ulangi Kata Sandi"
                        required
                    >
                    <button type="button" class="toggle-password" data-target="confirm_password">
                        <svg class="eye-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Kode Verifikasi -->
            <div class="form-group">
                <label for="verification_code" class="form-label">Kode Verifikasi</label>
                <div class="verification-group">
                    <input 
                        type="text" 
                        id="verification_code" 
                        name="verification_code" 
                        class="form-input verification-input"
                        placeholder="Kode Verifikasi"
                        required
                    >
                    <div class="captcha-container">
                        <div class="captcha-image" id="captchaImage">
                            <span class="captcha-text">0b44d6</span>
                        </div>
                        <button type="button" class="refresh-captcha" onclick="refreshCaptcha()">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 2v6m0 0h-6m6 0l-3.5-3.29c-1.07-1.01-2.37-1.74-3.79-2.12-1.42-.38-2.92-.38-4.34 0-1.42.38-2.72 1.11-3.79 2.12C4.51 5.78 3.5 7.34 3.21 9.04c-.29 1.7.13 3.45 1.16 4.96M3 22v-6m0 0h6m-6 0l3.5 3.29c1.07 1.01 2.37 1.74 3.79 2.12 1.42.38 2.92.38 4.34 0 1.42-.38 2.72-1.11 3.79-2.12 1.07-1.01 2.08-2.57 2.37-4.27.29-1.7-.13-3.45-1.16-4.96"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">
                UBAH KATA SANDI
            </button>
        </form>
    </div>
@endsection

@push('styles')
<style>
/* Password Page Header */
.password-page-header {
    background: linear-gradient(90deg, #ff9500 0%, #ffb84d 100%);
    color: white;
    font-size: 20px;
    font-weight: 700;
    text-align: center;
    padding: 16px 20px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

/* Form Container */
.password-form-container {
    background: #1a1a1a;
    min-height: calc(100vh - 60px);
    padding: 20px 16px;
}

/* Password Notes */
.password-notes {
    background: #2d2d2d;
    border: 1px solid #444;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 24px;
}

.notes-title {
    color: #ff9500;
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 12px;
}

.notes-list {
    margin: 0;
    padding-left: 20px;
    color: white;
}

.notes-list li {
    font-size: 13px;
    line-height: 1.8;
    margin-bottom: 8px;
    color: #e0e0e0;
}

.notes-list li:last-child {
    margin-bottom: 0;
}

/* Form Styles */
.password-form {
    max-width: 600px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 24px;
}

.form-label {
    display: block;
    color: white;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 8px;
    letter-spacing: 0.3px;
}

.form-input {
    width: 100%;
    background: #2d2d2d;
    border: 1px solid #444;
    border-radius: 6px;
    color: white;
    font-size: 14px;
    padding: 14px 16px;
    transition: all 0.3s ease;
}

.form-input::placeholder {
    color: #666;
}

.form-input:focus {
    outline: none;
    border-color: #ff9500;
    background: #333;
}

/* Input with Icon (Password Toggle) */
.input-with-icon {
    position: relative;
}

.input-with-icon .form-input {
    padding-right: 50px;
}

.toggle-password {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    background: transparent;
    border: none;
    color: #999;
    cursor: pointer;
    padding: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color 0.3s ease;
}

.toggle-password:hover {
    color: #ff9500;
}

.eye-icon {
    width: 20px;
    height: 20px;
    stroke-width: 2;
}

/* Verification Group */
.verification-group {
    display: flex;
    gap: 12px;
    align-items: stretch;
}

.verification-input {
    flex: 1;
}

.captcha-container {
    display: flex;
    gap: 8px;
    align-items: stretch;
}

.captcha-image {
    background: linear-gradient(135deg, #b8d4e8 0%, #9ec5dd 100%);
    border: 1px solid #7fb3d5;
    border-radius: 6px;
    padding: 8px 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 120px;
}

.captcha-text {
    font-size: 24px;
    font-weight: 700;
    color: #2d2d2d;
    letter-spacing: 4px;
    font-family: 'Courier New', monospace;
    text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5);
}

.refresh-captcha {
    background: transparent;
    border: 1px solid #444;
    border-radius: 6px;
    color: #ff9500;
    cursor: pointer;
    padding: 8px 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.refresh-captcha:hover {
    background: #2d2d2d;
    border-color: #ff9500;
}

/* Submit Button */
.submit-btn {
    width: 100%;
    background: linear-gradient(90deg, #ff9500 0%, #ffb84d 100%);
    color: white;
    font-size: 16px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    border: none;
    border-radius: 8px;
    padding: 16px 24px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(255, 149, 0, 0.3);
    margin-top: 32px;
}

.submit-btn:hover {
    background: linear-gradient(90deg, #ffb84d 0%, #ff9500 100%);
    box-shadow: 0 6px 16px rgba(255, 149, 0, 0.4);
    transform: translateY(-2px);
}

.submit-btn:active {
    transform: translateY(0);
}

/* Desktop Responsive */
@media (min-width: 768px) {
    .password-page-header {
        font-size: 24px;
        padding: 20px 24px;
    }

    .password-form-container {
        padding: 32px 24px;
    }

    .password-notes {
        padding: 24px 28px;
    }

    .notes-title {
        font-size: 18px;
    }

    .notes-list li {
        font-size: 14px;
    }

    .form-label {
        font-size: 15px;
    }

    .form-input {
        font-size: 15px;
        padding: 16px 18px;
    }

    .captcha-image {
        min-width: 140px;
        padding: 10px 24px;
    }

    .captcha-text {
        font-size: 26px;
    }

    .submit-btn {
        font-size: 18px;
        padding: 18px 28px;
    }
}
</style>
@endpush

@push('scripts')
<script>
    // Toggle password visibility
    document.addEventListener('DOMContentLoaded', () => {
        const toggleButtons = document.querySelectorAll('.toggle-password');
        
        toggleButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                
                if (input.type === 'password') {
                    input.type = 'text';
                    this.classList.add('active');
                } else {
                    input.type = 'password';
                    this.classList.remove('active');
                }
            });
        });

        // Form validation
        const form = document.getElementById('changePasswordForm');
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const currentPassword = document.getElementById('current_password').value;
            const newPassword = document.getElementById('new_password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const verificationCode = document.getElementById('verification_code').value;

            // Validation checks
            if (newPassword.length < 8 || newPassword.length > 20) {
                alert('Kata sandi harus terdiri dari 8-20 karakter.');
                return;
            }

            if (!/[a-zA-Z]/.test(newPassword) || !/[0-9]/.test(newPassword)) {
                alert('Kata sandi harus mengandung huruf dan angka.');
                return;
            }

            if (/[&<>]/.test(newPassword)) {
                alert('Kata sandi tidak boleh mengandung simbol &, <, atau >');
                return;
            }

            if (newPassword !== confirmPassword) {
                alert('Kata sandi baru dan konfirmasi tidak cocok.');
                return;
            }

            if (!verificationCode) {
                alert('Silakan masukkan kode verifikasi.');
                return;
            }

            // If validation passes, you can submit the form
            alert('Validasi berhasil! Form akan disubmit.');
            // Uncomment to actually submit:
            // this.submit();
        });
    });

    // Refresh captcha function
    function refreshCaptcha() {
        const captchaText = document.querySelector('.captcha-text');
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let newCaptcha = '';
        
        for (let i = 0; i < 6; i++) {
            newCaptcha += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        
        captchaText.textContent = newCaptcha;
    }
</script>
@endpush
