@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item"><a href="{{ route('admin.penilaian_video_belum.index') }}">Data Penilaian
                        Video</a></li>
                <li class="breadcrumb-item active">Penilaian Video Peserta</li>
            </ol>
            <h4 class="main-title mb-0">Penilaian Video: {{ $peserta->nama }}</h4>
        </div>
    </div>

    <div class="row">

        @php
            $videoUrl = $peserta->dataVideo->url ?? null;
            $embedUrl = null;
            if ($videoUrl) {
                if (str_contains($videoUrl, 'youtube.com/watch?v=')) {
                    $videoId = substr($videoUrl, strpos($videoUrl, 'v=') + 2);
                    $videoId = explode('&', $videoId)[0];
                    $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                } elseif (str_contains($videoUrl, 'youtu.be/')) {
                    $videoId = substr($videoUrl, strpos($videoUrl, 'youtu.be/') + 9);
                    $videoId = explode('?', $videoId)[0];
                    $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                }
            }
        @endphp

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header fw-bold">Video Peserta</div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Nama:</strong> {{ $peserta->nama }} <br>
                        <strong>Judul Video:</strong> {{ $peserta->dataVideo->judul ?? 'Tidak ada judul' }} <br>
                        <strong>URL Asli:</strong>
                        @if ($videoUrl)
                            <a href="{{ $videoUrl }}" target="_blank">{{ $videoUrl }}</a>
                        @else
                            'Tidak ada URL'
                        @endif
                    </div>

                    <hr>

                    @if ($embedUrl)
                        <div class_ ="ratio ratio-16x9">
                            <iframe src="{{ $embedUrl }}" title="Video Peserta" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    @elseif($videoUrl)
                        <div class="alert alert-warning">
                            Tidak dapat memutar video. Silakan klik URL asli di atas untuk menonton.
                        </div>
                    @else
                        <div class="alert alert-danger">
                            Peserta ini belum menginput data video.
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header fw-bold bg-warning">Formulir Penilaian Video</div>
                <div class="card-body">
                    <form action="{{ route('admin.penilaian_video_belum.update', $peserta->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nilai_video" class="form-label fw-bold">Nilai Akhir Video</label>
                            <input type="number" step="0.01" min="0" max="100" name="nilai_video"
                                id="nilai_video" class="form-control @error('nilai_video') is-invalid @enderror"
                                value="{{ old('nilai_video', $peserta->nilai_video) }}" required>
                            @error('nilai_video')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Pengecekan Video</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="status_durasi_video"
                                    name="status_durasi_video"
                                    {{ old('status_durasi_video', $peserta->status_durasi_video) == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_durasi_video">
                                    Durasi Sesuai (Sudah dicek)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="status_lokasi_video"
                                    name="status_lokasi_video"
                                    {{ old('status_lokasi_video', $peserta->status_lokasi_video) == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_lokasi_video">
                                    Lokasi Sesuai (Sudah dicek)
                                </label>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="catatan_video" class="form-label fw-bold">Catatan Penilai</label>
                            <textarea name="catatan_video" id="catatan_video" class="form-control @error('catatan_video') is-invalid @enderror"
                                rows="5" placeholder="Beri masukan atau catatan...">{{ old('catatan_video', $peserta->catatan_video) }}</textarea>
                            @error('catatan_video')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Simpan Penilaian Video</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
