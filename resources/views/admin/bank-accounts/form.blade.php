@extends('layouts.admin')

@section('title', isset($bankAccount) ? 'Edit Rekening Bank' : 'Tambah Rekening Bank')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">{{ isset($bankAccount) ? 'Edit Rekening Bank' : 'Tambah Rekening Bank' }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.bank-accounts.index') }}">Rekening Bank</a></li>
        <li class="breadcrumb-item active">{{ isset($bankAccount) ? 'Edit' : 'Tambah' }}</li>
    </ol>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-university me-1"></i>
                    Form Rekening Bank
                </div>
                <div class="card-body">
                    <form action="{{ isset($bankAccount) ? route('admin.bank-accounts.update', $bankAccount->id) : route('admin.bank-accounts.store') }}" method="POST">
                        @csrf
                        @if(isset($bankAccount))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="bank_name" class="form-label">Nama Bank <span class="text-danger">*</span></label>
                            <select class="form-select @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name" required>
                                <option value="">-- Pilih Bank --</option>
                                <option value="Bank Central Asia (BCA)" {{ old('bank_name', $bankAccount->bank_name ?? '') == 'Bank Central Asia (BCA)' ? 'selected' : '' }}>Bank Central Asia (BCA)</option>
                                <option value="Bank Mandiri" {{ old('bank_name', $bankAccount->bank_name ?? '') == 'Bank Mandiri' ? 'selected' : '' }}>Bank Mandiri</option>
                                <option value="Bank Negara Indonesia (BNI)" {{ old('bank_name', $bankAccount->bank_name ?? '') == 'Bank Negara Indonesia (BNI)' ? 'selected' : '' }}>Bank Negara Indonesia (BNI)</option>
                                <option value="Bank Rakyat Indonesia (BRI)" {{ old('bank_name', $bankAccount->bank_name ?? '') == 'Bank Rakyat Indonesia (BRI)' ? 'selected' : '' }}>Bank Rakyat Indonesia (BRI)</option>
                                <option value="Bank CIMB Niaga" {{ old('bank_name', $bankAccount->bank_name ?? '') == 'Bank CIMB Niaga' ? 'selected' : '' }}>Bank CIMB Niaga</option>
                                <option value="Bank Danamon" {{ old('bank_name', $bankAccount->bank_name ?? '') == 'Bank Danamon' ? 'selected' : '' }}>Bank Danamon</option>
                                <option value="Bank Permata" {{ old('bank_name', $bankAccount->bank_name ?? '') == 'Bank Permata' ? 'selected' : '' }}>Bank Permata</option>
                            </select>
                            @error('bank_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="account_number" class="form-label">Nomor Rekening <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('account_number') is-invalid @enderror" 
                                   id="account_number" name="account_number" 
                                   value="{{ old('account_number', $bankAccount->account_number ?? '') }}" 
                                   placeholder="Contoh: 1234567890" required>
                            @error('account_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="account_holder_name" class="form-label">Nama Pemilik Rekening <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('account_holder_name') is-invalid @enderror" 
                                   id="account_holder_name" name="account_holder_name" 
                                   value="{{ old('account_holder_name', $bankAccount->account_holder_name ?? '') }}" 
                                   placeholder="Nama sesuai rekening bank" required>
                            @error('account_holder_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="bank_logo_url" class="form-label">URL Logo Bank (Opsional)</label>
                            <input type="url" class="form-control @error('bank_logo_url') is-invalid @enderror" 
                                   id="bank_logo_url" name="bank_logo_url" 
                                   value="{{ old('bank_logo_url', $bankAccount->bank_logo_url ?? '') }}" 
                                   placeholder="https://example.com/logo.png">
                            <small class="text-muted">Kosongkan jika menggunakan logo default</small>
                            @error('bank_logo_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sort_order" class="form-label">Urutan Tampil</label>
                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                                   id="sort_order" name="sort_order" 
                                   value="{{ old('sort_order', $bankAccount->sort_order ?? 0) }}" 
                                   min="0">
                            <small class="text-muted">Semakin kecil angka, semakin awal tampil</small>
                            @error('sort_order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
                                       {{ old('is_active', $bankAccount->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Aktif
                                </label>
                            </div>
                            <small class="text-muted">Hanya rekening aktif yang akan ditampilkan di deposit page</small>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.bank-accounts.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> {{ isset($bankAccount) ? 'Update' : 'Simpan' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-info-circle me-1"></i>
                    Informasi
                </div>
                <div class="card-body">
                    <p class="small">
                        <strong>Tips:</strong>
                    </p>
                    <ul class="small">
                        <li>Pastikan nomor rekening benar dan aktif</li>
                        <li>Nama pemilik harus sesuai dengan rekening bank</li>
                        <li>Rekening yang aktif akan muncul di halaman deposit user</li>
                        <li>Atur urutan untuk menentukan prioritas tampilan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
