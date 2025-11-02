@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Penilaian CV</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.penilaian_cv_belum.index') }}">Daftar Penilaian CV (Belum)</a></li>
        </ol>
        <h4 class="main-title mb-0">Penilaian CV untuk: {{ $peserta->nama }}</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="text-danger mb-4">Status Penilaian: Belum Dinilai</h5>

        <div class="alert alert-info" role="alert">
            <i class="ri-information-line"></i> Silakan klik tombol di bawah untuk diarahkan ke **Form Penilaian CV** utama peserta ini.
        </div>

        <p><strong>Nama Peserta:</strong> {{ $peserta->nama }}</p>
        <p><strong>Email:</strong> {{ $peserta->email }}</p>
        <p><strong>Asal Sekolah:</strong> {{ $peserta->asal_sekolah ?? '-' }}</p>

        <hr>

        <a href="{{ route('admin.peserta.edit', $peserta->id) }}" class="btn btn-warning">
            <i class="ri-arrow-right-line"></i> Lanjutkan ke Form Penilaian CV
        </a>
        <a href="{{ route('admin.penilaian_cv_belum.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection