@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Penilaian Video</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.penilaian_video_belum.index') }}">Daftar Penilaian Video (Belum)</a></li>
        </ol>
        <h4 class="main-title mb-0">Penilaian Video untuk: {{ $video->peserta->nama ?? 'N/A' }}</h4>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-primary text-white fw-bold">Detail Video</div>
    <div class="card-body">
        <p><strong>Judul Video:</strong> {{ $video->judul }}</p>
        <p><strong>Media Sosial:</strong> {{ $video->media_sosial }}</p>
        <p><strong>URL Video:</strong> <a href="{{ $video->url }}" target="_blank" class="text-primary">{{ $video->url }} <i class="ri-external-link-line"></i></a></p>
        
        @if(str_contains($video->url, 'youtube.com') || str_contains($video->url, 'youtu.be'))
            <div class="mt-3">
                <iframe width="560" height="315" src="{{ str_replace('watch?v=', 'embed/', $video->url) }}" frameborder="0" allowfullscreen></iframe>
            </div>
        @endif
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.peserta.update', $video->id_pengguna) }}" method="POST">
            @csrf
            @method('PUT')
            
            <h5 class="card-title fw-bold mb-3">Form Penilaian</h5>

            <div class="mb-4">
                <label for="nilai_video" class="form-label fw-bold">Skor Penilaian Video</label>
                <input type="number" step="any" name="nilai_video" id="nilai_video" class="form-control @error('nilai_video') is-invalid @enderror" 
                    placeholder="Masukkan skor (0 - 100)" required style="width: 200px;">
                @error('nilai_video')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="catatan_video" class="form-label fw-bold">Catatan / Komentar Penilai</label>
                <textarea name="catatan_video" id="catatan_video" class="form-control @error('catatan_video') is-invalid @enderror" rows="4"></textarea>
                @error('catatan_video')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            {{-- Tombol submit ini akan memperbarui kolom nilai_video, catatan_video, dan user_update/tanggal_update di tabel pengguna --}}
            <button type="submit" class="btn btn-primary">Simpan dan Tandai Sudah Dinilai</button>
            <a href="{{ route('admin.penilaian_video_belum.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection