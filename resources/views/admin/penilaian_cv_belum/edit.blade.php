@extends('layouts.app')

@section('content')
<style>
    .info-box {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
    }
    .info-label {
        width: 100px;
        font-weight: 600;
        color: #555;
    }
    .info-value {
        flex: 1;
        padding: 0.375rem 0.75rem;
        background-color: #e9ecef;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
    }
    .form-label-fixed {
        width: 60px;
        text-align: left;
        font-weight: 600;
        margin-top: 0.5rem;
    }
</style>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item"><a href="{{ route('admin.penilaian_cv_belum.index') }}">Data Penilaian CV</a></li>
            <li class="breadcrumb-item active">Edit Penilaian CV (Belum)</li>
        </ol>
        <h4 class="main-title mb-0">Edit Penilaian CV (Belum)</h4>
    </div>
</div>

<form action="{{ route('admin.penilaian_cv_belum.update', $peserta->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- BAGIAN 1: INFO PESERTA --}}
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="info-box">
                        <span class="info-label">NISN</span>
                        <div class="info-value">{{ $peserta->nisn ?? 'N/A' }}</div>
                    </div>
                    <div class="info-box">
                        <span class="info-label">Nama</span>
                        <div class="info-value">{{ $peserta->nama ?? 'N/A' }}</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-box">
                        <span class="info-label">Sekolah</span>
                        <div class="info-value">{{ $peserta->asal_sekolah ?? 'N/A' }}</div>
                    </div>
                    <div class="info-box">
                        <span class="info-label">Dapil</span>
                        <div class="info-value">{{ $peserta->nama_dapil ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- BAGIAN 2: TABEL DATA CV (PENGGUNA_DATA) --}}
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th style="width: 5%">No.</th>
                            <th>Kegiatan</th>
                            <th>Tingkat</th>
                            <th>Partisipasi</th>
                            <th>Judul</th>
                            <th>Lokasi</th>
                            <th>Tahun</th>
                            <th>Bukti</th>
                            <th>Penilaian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peserta->dataCv as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $item->kegiatan->kegiatan ?? 'N/A' }}</td>
                                <td>{{ $item->tingkat->tingkat ?? 'N/A' }}</td>
                                <td>{{ $item->partisipasi->partisipasi ?? 'N/A' }}</td>
                                <td>{{ $item->judul ?? 'N/A' }}</td>
                                <td>{{ $item->lokasi ?? 'N/A' }}</td>
                                <td class="text-center">{{ $item->tahun ?? 'N/A' }}</td>
                                <td class="text-center">
                                    @if($item->file_name)
                                        <a href="#" class="btn btn-sm btn-outline-primary">DOWNLOAD</a>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input" disabled>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Peserta ini belum menginput data CV (prestasi/pengalaman).</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- BAGIAN 3: CATATAN, ESAI, VIDEO, DAN FORM SKOR --}}
    <div class="card mb-4">
        <div class="card-body">
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="catatan_cv" class="form-label fw-bold">Catatan</label>
                        <textarea name="catatan_cv" id="catatan_cv" class="form-control" rows="3">{{ old('catatan_cv', $peserta->catatan_cv) }}</textarea>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">File Esai</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $peserta->dataEsai->file_name ?? 'Tidak ada file' }}" readonly>
                        @if($peserta->dataEsai && $peserta->dataEsai->file_name)
                            <a href="#" class="btn btn-outline-secondary">OPEN ESAI</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="nilai_turnitin" class="form-label fw-bold">Nilai Turnitin</label>
                    <input type="number" step="0.01" name="nilai_turnitin" id="nilai_turnitin" 
                           class="form-control" value="{{ old('nilai_turnitin', $peserta->nilai_turnitin) }}">
                </div>
            </div>

            <div class="row mb-3 align-items-center">
                <div class="col-md-6">
                    <label class="form-label fw-bold">URL</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $peserta->dataVideo->url ?? 'Tidak ada URL' }}" readonly>
                        @if($peserta->dataVideo && $peserta->dataVideo->url)
                            <a href="{{ $peserta->dataVideo->url }}" target="_blank" class="btn btn-outline-secondary">OPEN VIDEO</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" value="1" id="status_durasi_video" 
                               name="status_durasi_video" {{ old('status_durasi_video', $peserta->status_durasi_video) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="status_durasi_video">
                            Durasi Video 3 Menit
                        </label>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <h5 class="fw-bold mb-3">Formulir Penilaian CV</h5>
                    <div class="d-flex align-items-center mb-2">
                        <label for="pa" class="form-label-fixed">PA</label>
                        <input type="number" step="0.01" name="pa" id="pa" class="form-control" value="{{ old('pa') }}">
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <label for="pna" class="form-label-fixed">PNA</label>
                        <input type="number" step="0.01" name="pna" id="pna" class="form-control" value="{{ old('pna') }}">
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <label for="po" class="form-label-fixed">PO</label>
                        <input type="number" step="0.01" name="po" id="po" class="form-control" value="{{ old('po') }}">
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <label for="kk" class="form-label-fixed">KK</label>
                        <input type="number" step="0.01" name="kk" id="kk" class="form-control" value="{{ old('kk') }}">
                    </div>

                    <div class="d-flex justify-content-start gap-2">
                        <a href="{{ route('admin.penilaian_cv_belum.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Penilaian CV</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection

