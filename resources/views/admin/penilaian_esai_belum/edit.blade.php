@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item"><a href="{{ route('admin.penilaian_esai_belum.index') }}">Data Penilaian Esai</a></li>
            <li class="breadcrumb-item active">Penilaian Esai Peserta</li>
        </ol>
        <h4 class="main-title mb-0">Edit Penilaian Esai (Belum)</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('admin.penilaian_esai_belum.update', $peserta->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="card">
                <div class="card-body">
                    
                    {{-- Bagian Data Peserta (Read-only) --}}
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
                            <input type="text" disabled class="form-control" value="{{ $peserta->nama_dapil ?? 'Tidak ada dapil' }}">
                        </div>
                    </div>

                    <hr>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold">Judul</label>
                        <div class="col-sm-6">
                            <input type="text" disabled class="form-control" value="{{ $peserta->dataEsai->judul ?? 'Tidak ada judul' }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label fw-bold">File Esai</label>
                        <div class="col-sm-6">
                            @if($peserta->dataEsai && $peserta->dataEsai->file_name)
                                <a href="#" target="_blank" class="form-control-plaintext" style="padding-top: 0.5rem; padding-left: 0;">
                                    {{ $peserta->dataEsai->file_name }}
                                </a>
                            @else
                                <span class="form-control-plaintext">Tidak ada file</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="catatan_esai" class="col-sm-2 col-form-label fw-bold">Catatan</label>
                        <div class="col-sm-6">
                             <textarea name="catatan_esai" id="catatan_esai" 
                                      class="form-control @error('catatan_esai') is-invalid @enderror" 
                                      rows="4" 
                                      placeholder="Beri masukan atau catatan...">{{ old('catatan_esai', $peserta->catatan_esai) }}</textarea>
                            @error('catatan_esai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2 d-flex justify-content-end">
                            <button type="submit" name="action" value="simpan" class="btn btn-success me-2">Simpan</button>
                            <button type="submit" name="action" value="selesai" class="btn btn-primary me-2">Selesai</button>
                            <a href="{{ route('admin.penilaian_esai_belum.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>

                    <hr>

                    {{-- Bagian Nilai Turnitin --}}
                    <div class="row mb-3">
                        <label for="nilai_turnitin" class="col-sm-2 col-form-label fw-bold">Nilai Turnitin</label>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="number" step="0.01" min="0" max="100" 
                                       name="nilai_turnitin" id="nilai_turnitin" 
                                       class="form-control @error('nilai_turnitin') is-invalid @enderror" 
                                       value="{{ old('nilai_turnitin', $peserta->nilai_turnitin) }}" required>
                                <span class="input-group-text">%</span>
                                @error('nilai_turnitin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr>

                    <h5 class="mb-3 fw-bold">Rubrik Penilaian</h5>
                    
                    <div class="row mb-2">
                        <label for="orisinalitas" class="col-sm-3 col-form-label">Orisinalitas</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" min="0" max="100" name="orisinalitas" id="orisinalitas" class="form-control @error('orisinalitas') is-invalid @enderror" value="{{ old('orisinalitas', $peserta->orisinalitas ?? 0) }}">
                            @error('orisinalitas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="kesesuaian_tema" class="col-sm-3 col-form-label">Kesesuaian Tema</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" min="0" max="100" name="kesesuaian_tema" id="kesesuaian_tema" class="form-control @error('kesesuaian_tema') is-invalid @enderror" value="{{ old('kesesuaian_tema', $peserta->kesesuaian_tema ?? 0) }}">
                             @error('kesesuaian_tema') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="eksplorasi_tema" class="col-sm-3 col-form-label">Eksplorasi Tema</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" min="0" max="100" name="eksplorasi_tema" id="eksplorasi_tema" class="form-control @error('eksplorasi_tema') is-invalid @enderror" value="{{ old('eksplorasi_tema', $peserta->eksplorasi_tema ?? 0) }}">
                             @error('eksplorasi_tema') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="keterkaitan_dpr" class="col-sm-3 col-form-label">Keterkaitan dengan Fungsi DPR</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" min="0" max="100" name="keterkaitan_dpr" id="keterkaitan_dpr" class="form-control @error('keterkaitan_dpr') is-invalid @enderror" value="{{ old('keterkaitan_dpr', $peserta->keterkaitan_dpr ?? 0) }}">
                             @error('keterkaitan_dpr') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="proporsionalitas" class="col-sm-3 col-form-label">Proporsionalitas</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" min="0" max="100" name="proporsionalitas" id="proporsionalitas" class="form-control @error('proporsionalitas') is-invalid @enderror" value="{{ old('proporsionalitas', $peserta->proporsionalitas ?? 0) }}">
                             @error('proporsionalitas') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="gaya_penulisan" class="col-sm-3 col-form-label">Gaya Penulisan</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" min="0" max="100" name="gaya_penulisan" id="gaya_penulisan" class="form-control @error('gaya_penulisan') is-invalid @enderror" value="{{ old('gaya_penulisan', $peserta->gaya_penulisan ?? 0) }}">
                             @error('gaya_penulisan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="referensi" class="col-sm-3 col-form-label">Referensi</label>
                        <div class="col-sm-3">
                            <input type="number" step="0.01" min="0" max="100" name="referensi" id="referensi" class="form-control @error('referensi') is-invalid @enderror" value="{{ old('referensi', $peserta->referensi ?? 0) }}">
                             @error('referensi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>
    </div>
</div>
@endsection