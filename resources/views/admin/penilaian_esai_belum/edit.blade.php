@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item"><a href="{{ route('admin.penilaian_esai_belum.index') }}">Data Penilaian Esai</a></li>
            <li class="breadcrumb-item active">Penilaian Esai Peserta</li>
        </ol>
        <h4 class="main-title mb-0">Penilaian Esai: {{ $peserta->nama }}</h4>
    </div>
</div>

<div class="row">

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header fw-bold">Data Esai Peserta</div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Nama:</strong> {{ $peserta->nama }} <br>
                    <strong>NISN:</strong> {{ $peserta->nisn }} <br>
                    <strong>Asal Sekolah:</strong> {{ $peserta->asal_sekolah }}
                </div>
                
                <hr>
                
                @if($peserta->dataEsai)
                    <div class="mb-3">
                        <h5 class="mb-1">Judul Esai:</h5>
                        <p>{{ $peserta->dataEsai->judul ?? 'Tidak ada judul' }}</p>
                    </div>

                    <div class="mb-3">
                        <h5 class="mb-1">Isi Esai:</h5>
                        <div style="white-space: pre-wrap; background-color: #f8f9fa; border: 1px solid #dee2e6; padding: 15px; border-radius: 5px; max-height: 400px; overflow-y: auto;">{{ $peserta->dataEsai->isi ?? 'Tidak ada isi esai' }}</div>
                    </div>

                    <div class="mb-3">
                        <h5 class="mb-1">Daftar Pustaka:</h5>
                        <div style="white-space: pre-wrap; background-color: #f8f9fa; border: 1px solid #dee2e6; padding: 15px; border-radius: 5px; max-height: 200px; overflow-y: auto;">{{ $peserta->dataEsai->daftar_pustaka ?? 'Tidak ada daftar pustaka' }}</div>
                    </div>
                @else
                    <div class="alert alert-warning">Peserta ini belum menginput data esai.</div>
                @endif

            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header fw-bold bg-warning">Formulir Penilaian Esai</div>
            <div class="card-body">
                <form action="{{ route('admin.penilaian_esai_belum.update', $peserta->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nilai_esai" class="form-label fw-bold">Nilai Akhir Esai</label>
                        <input type="number" step="0.01" min="0" max="100" 
                               name="nilai_esai" id="nilai_esai" 
                               class="form-control @error('nilai_esai') is-invalid @enderror" 
                               value="{{ old('nilai_esai', $peserta->nilai_esai) }}" required>
                        @error('nilai_esai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nilai_turnitin" class="form-label fw-bold">Nilai Turnitin (%)</label>
                        <input type="number" step="0.01" min="0" max="100" 
                               name="nilai_turnitin" id="nilai_turnitin" 
                               class="form-control @error('nilai_turnitin') is-invalid @enderror" 
                               value="{{ old('nilai_turnitin', $peserta->nilai_turnitin) }}" required>
                        @error('nilai_turnitin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="catatan_esai" class="form-label fw-bold">Catatan Penilai</label>
                        <textarea name="catatan_esai" id="catatan_esai" 
                                  class="form-control @error('catatan_esai') is-invalid @enderror" 
                                  rows="5" 
                                  placeholder="Beri masukan atau catatan...">{{ old('catatan_esai', $peserta->catatan_esai) }}</textarea>
                        @error('catatan_esai')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Simpan Penilaian Esai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection