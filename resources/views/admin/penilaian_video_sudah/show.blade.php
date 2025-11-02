@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Penilaian Video</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.penilaian_video_sudah.index') }}">Daftar Penilaian Video (Sudah)</a></li>
        </ol>
        <h4 class="main-title mb-0">Hasil Penilaian Video: {{ $video->peserta->nama ?? 'N/A' }}</h4>
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
        <h5 class="card-title fw-bold">Hasil Akhir Penilaian</h5>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Penilai:</strong> {{ $video->user_update ?? 'N/A' }}</p>
                <p><strong>Tanggal Dinilai:</strong> {{ $video->tanggal_update ? date('d-m-Y H:i', strtotime($video->tanggal_update)) : '-' }}</p>
            </div>
            <div class="col-md-6">
                {{-- Diasumsikan kolom 'nilai_video' dan 'catatan_video' disimpan di PesertaModel --}}
                <p><strong>Nilai Akhir Video:</strong> <span class="fs-4 fw-bold text-success">{{ number_format($peserta->nilai_video ?? 0, 2) }}</span></p>
            </div>
        </div>

        <h5 class="card-title fw-bold mt-4">Catatan Penilai:</h5>
        <div class="p-3 border rounded bg-light">
            {!! nl2br(e($peserta->catatan_video ?? 'Tidak ada catatan.')) !!}
        </div>

        <a href="{{ route('admin.penilaian_video_sudah.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection