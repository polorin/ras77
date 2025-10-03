@extends('layouts.admin')

@section('title', 'Rekening Bank')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Rekening Bank</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Rekening Bank</li>
    </ol>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-university me-1"></i>
                    Daftar Rekening Bank
                </div>
                <a href="{{ route('admin.bank-accounts.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Rekening
                </a>
            </div>
        </div>
        <div class="card-body">
            @if($bankAccounts->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">No</th>
                                <th width="20%">Nama Bank</th>
                                <th width="15%">Nomor Rekening</th>
                                <th width="20%">Nama Pemilik</th>
                                <th width="10%">Status</th>
                                <th width="10%">Urutan</th>
                                <th width="20%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bankAccounts as $index => $account)
                                <tr>
                                    <td>{{ $bankAccounts->firstItem() + $index }}</td>
                                    <td>{{ $account->bank_name }}</td>
                                    <td><code>{{ $account->account_number }}</code></td>
                                    <td>{{ $account->account_holder_name }}</td>
                                    <td>
                                        <form action="{{ route('admin.bank-accounts.toggle-active', $account->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-{{ $account->is_active ? 'success' : 'secondary' }}">
                                                <i class="fas fa-{{ $account->is_active ? 'check-circle' : 'times-circle' }}"></i>
                                                {{ $account->is_active ? 'Aktif' : 'Nonaktif' }}
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">{{ $account->sort_order }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.bank-accounts.edit', $account->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.bank-accounts.destroy', $account->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus rekening ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    {{ $bankAccounts->links() }}
                </div>
            @else
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> Belum ada rekening bank. Silakan tambahkan rekening baru.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
