@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Penilaian Esai</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.penilaian_esai_belum.index') }}">Daftar Penilaian Esai (Belum)</a></li>
        </ol>
        <h4 class="main-title mb-0">Penilaian Esai: {{ $esai->judul }}</h4>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-primary text-white fw-bold">Konten Esai dari {{ $esai->peserta->nama ?? 'N/A' }}</div>
    <div class="card-body">
        <h6>**Isi Esai:**</h6>
        <div class="p-3 border rounded mb-3" style="max-height: 300px; overflow-y: auto;">
            {!! nl2br(e($esai->isi)) !!}
        </div>

        <h6>**Daftar Pustaka:**</h6>
        <div class="p-3 border rounded bg-light">
            {!! nl2br(e($esai->daftar_pustaka)) !!}
        </div>

        @if($esai->file_name)
            <p class="mt-3">
                <i class="ri-file-text-line"></i> Dokumen Asli: <a href="#">{{ $esai->file_name }}</a>
            </p>
        @endif
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.penilaian_esai_sudah.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_esai" value="{{ $esai->id }}">
            <input type="hidden" name="id_pengguna" value="{{ $esai->id_pengguna }}">

            <div class="mb-4">
                <label for="skor_esai" class="form-label fw-bold">Skor Penilaian Esai</label>
                <input type="number" step="any" name="skor_esai" id="skor_esai" class="form-control" 
                    placeholder="Masukkan skor (0 - 100)" required style="width: 200px;">
            </div>

            <div class="mb-4">
                <label for="catatan_penilai" class="form-label fw-bold">Catatan / Komentar Penilai</label>
                <textarea name="catatan_penilai" id="catatan_penilai" class="form-control" rows="4"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan dan Tandai Sudah Dinilai</button>
            <a href="{{ route('admin.penilaian_esai_belum.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
