@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Penilaian CV</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.penilaian_cv_sudah.index') }}">Daftar Penilaian CV (Sudah)</a></li>
        </ol>
        <h4 class="main-title mb-0">Hasil Penilaian CV: {{ $peserta->nama }}</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-bold">Rincian Penilaian</h5>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Nama Peserta:</strong> {{ $peserta->nama }}</p>
                <p><strong>Email:</strong> {{ $peserta->email }}</p>
                <p><strong>Asal Sekolah:</strong> {{ $peserta->asal_sekolah ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Nilai Akhir CV:</strong> <span class="fs-4 fw-bold text-success">{{ number_format($peserta->nilai_cv ?? 0, 2) }}</span></p>
                <p><strong>Status:</strong> <span class="badge bg-success">SUDAH DINILAI</span></p>
            </div>
        </div>

        <h5 class="card-title fw-bold mt-4">Detail Penilaian:</h5>
        
        <div class="alert alert-warning mb-3">
            **PERHATIAN:** Detail rincian skor per kriteria harus diimplementasikan dengan data dari tabel pendukung (seperti data riwayat pendidikan, pengalaman, dll. peserta) yang sudah diskor, karena tabel `pengguna` umumnya hanya menyimpan skor total.
        </div>

        <a href="{{ route('admin.penilaian_cv_sudah.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection