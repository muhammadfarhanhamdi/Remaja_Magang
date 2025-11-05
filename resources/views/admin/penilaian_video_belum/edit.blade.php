@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item"><a href="{{ route('admin.penilaian_video_belum.index') }}">Data Penilaian
                        Video</a></li>
                <li class="breadcrumb-item active">Penilaian Video Peserta</li>
            </ol>
            <h4 class="main-title mb-0">Edit Penilaian Video (Belum)</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.penilaian_video_belum.update', $peserta->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold">NISN</label>
                            <div class="col-sm-6">
                                <input type="text" disabled class="form-control" value="{{ $peserta->nisn }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold">Nama</label>
                            <div class="col-sm-6">
                                <input type="text" disabled class="form-control" value="{{ $peserta->nama }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold">Sekolah</label>
                            <div class="col-sm-6">
                                <input type="text" disabled class="form-control" value="{{ $peserta->asal_sekolah }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold">Dapil</label>
                            <div class="col-sm-6">
                                <input type="text" disabled class="form-control"
                                    value="{{ $peserta->nama_dapil ?? 'Tidak ada dapil' }}">
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold">Judul</label>
                            <div class="col-sm-6">
                                <input type="text" disabled class="form-control"
                                    value="{{ $peserta->dataVideo->judul ?? 'Tidak ada judul' }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold">Media Sosial</label>
                            <div class="col-sm-6">
                                <input type="text" disabled class="form-control"
                                    value="{{ $peserta->dataVideo->media_sosial ?? 'N/A' }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label fw-bold">URL</label>
                            <div class="col-sm-6">
                                @if ($peserta->dataVideo && $peserta->dataVideo->url)
                                    <a href="{{ $peserta->dataVideo->url }}" target="_blank" class="form-control-plaintext"
                                        style="padding-top: 0.5rem; padding-left: 0;">
                                        {{ $peserta->dataVideo->url }}
                                    </a>
                                @else
                                    <span class="form-control-plaintext">Tidak ada URL</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="catatan_video" class="col-sm-2 col-form-label fw-bold">Catatan</label>
                            <div class="col-sm-6">
                                <textarea name="catatan_video" id="catatan_video" class="form-control @error('catatan_video') is-invalid @enderror"
                                    rows="4" placeholder="Beri masukan atau catatan...">{{ old('catatan_video', $peserta->catatan_video) }}</textarea>
                                @error('catatan_video')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2 d-flex justify-content-end">
                                <button type="submit" name="action" value="simpan"
                                    class="btn btn-success me-2">Simpan</button>
                                <button type="submit" name="action" value="selesai"
                                    class="btn btn-primary me-2">Selesai</button>
                                <a href="{{ route('admin.penilaian_video_belum.index') }}"
                                    class="btn btn-secondary">Batal</a>
                            </div>
                        </div>

                        <hr>

                        <div class="row mb-3">
                            <label for="status_durasi_video" class="col-sm-2 col-form-label fw-bold">Durasi Video 3
                                Menit</label>
                            <div class="col-sm-3 d-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="status_durasi_video"
                                        name="status_durasi_video" value="1"
                                        {{ old('status_durasi_video', $peserta->status_durasi_video) == 1 ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h5 class="mb-3 fw-bold">Rubrik Penilaian</h5>
                        <div class="row mb-2">
                            <label for="video_kesesuaian_tema" class="col-sm-3 col-form-label">Kesesuaian Tema</label>
                            <div class="col-sm-3">
                                <input type="number" step="0.01" min="0" max="100"
                                    name="video_kesesuaian_tema" id="video_kesesuaian_tema"
                                    class="form-control @error('video_kesesuaian_tema') is-invalid @enderror"
                                    value="{{ old('video_kesesuaian_tema', $peserta->video_kesesuaian_tema ?? 0) }}">
                                @error('video_kesesuaian_tema')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="video_orisinalitas" class="col-sm-3 col-form-label">Orisinalitas</label>
                            <div class="col-sm-3">
                                <input type="number" step="0.01" min="0" max="100"
                                    name="video_orisinalitas" id="video_orisinalitas"
                                    class="form-control @error('video_orisinalitas') is-invalid @enderror"
                                    value="{{ old('video_orisinalitas', $peserta->video_orisinalitas ?? 0) }}">
                                @error('video_orisinalitas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="video_public_speaking" class="col-sm-3 col-form-label">Public Speaking</label>
                            <div class="col-sm-3">
                                <input type="number" step="0.01" min="0" max="100"
                                    name="video_public_speaking" id="video_public_speaking"
                                    class="form-control @error('video_public_speaking') is-invalid @enderror"
                                    value="{{ old('video_public_speaking', $peserta->video_public_speaking ?? 0) }}">
                                @error('video_public_speaking')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label for="video_kreativitas_konsep" class="col-sm-3 col-form-label">Kreativitas
                                Konsep</label>
                            <div class="col-sm-3">
                                <input type="number" step="0.01" min="0" max="100"
                                    name="video_kreativitas_konsep" id="video_kreativitas_konsep"
                                    class="form-control @error('video_kreativitas_konsep') is-invalid @enderror"
                                    value="{{ old('video_kreativitas_konsep', $peserta->video_kreativitas_konsep ?? 0) }}">
                                @error('video_kreativitas_konsep')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
