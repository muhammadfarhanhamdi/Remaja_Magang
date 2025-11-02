@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Peserta</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.laporan_kustom.index') }}">Laporan Kustom</a></li>
        </ol>
        <h4 class="main-title mb-0">Tambah Laporan Kustom</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.laporan_kustom.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="judul" class="form-label fw-bold">Judul Laporan</label>
                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
                    placeholder="Masukkan judul laporan" value="{{ old('judul') }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="sql" class="form-label fw-bold">Query SQL (Gunakan SELECT)</label>
                <textarea name="sql" id="sql" class="form-control @error('sql') is-invalid @enderror" rows="5"
                    placeholder="Contoh: SELECT nama, email, nilai_total FROM pengguna WHERE status_lolos = 1">{{ old('sql') }}</textarea>
                @error('sql')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.laporan_kustom.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection