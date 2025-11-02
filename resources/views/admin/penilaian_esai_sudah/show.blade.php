@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Penilaian Esai</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.penilaian_esai_sudah.index') }}">Daftar Penilaian Esai (Sudah)</a></li>
        </ol>
        <h4 class="main-title mb-0">Hasil Penilaian Esai: {{ $esai->judul }}</h4>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-primary text-white fw-bold">Konten Esai dari {{ $peserta->nama ?? 'N/A' }}</div>
    <div class="card-body">
        <h6>**Isi Esai:**</h6>
        <div class="p-3 border rounded mb-3" style="max-height: 250px; overflow-y: auto;">
            {!! nl2br(e($esai->isi)) !!}
        </div>

        <h6>**Daftar Pustaka:**</h6>
        <div class="p-3 border rounded bg-light">
            {!! nl2br(e($esai->daftar_pustaka)) !!}
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-bold">Hasil Akhir</h5>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Penilai:</strong> {{ $esai->user_update ?? 'N/A' }}</p>
                <p><strong>Tanggal Dinilai:</strong> {{ $esai->tanggal_update ? date('d-m-Y H:i', strtotime($esai->tanggal_update)) : '-' }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Nilai Akhir Esai:</strong> <span class="fs-4 fw-bold text-success">{{ number_format($peserta->nilai_esai ?? 0, 2) }}</span></p>
                <p><strong>Catatan Penilai:</strong> {{ $peserta->catatan_esai ?? '-' }}</p>
            </div>
        </div>

        <a href="{{ route('admin.penilaian_esai_sudah.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
