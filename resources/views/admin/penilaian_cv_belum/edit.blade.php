@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item"><a href="{{ route('admin.penilaian_cv_belum.index') }}">Data Penilaian CV</a></li>
            <li class="breadcrumb-item active">Penilaian CV Peserta</li>
        </ol>
        <h4 class="main-title mb-0">Penilaian CV: {{ $peserta->nama }}</h4>
    </div>
</div>

<div class="row">

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header fw-bold">Data CV Peserta</div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>Nama:</strong> {{ $peserta->nama }} <br>
                    <strong>NISN:</strong> {{ $peserta->nisn }} <br>
                    <strong>Asal Sekolah:</strong> {{ $peserta->asal_sekolah }} <br>
                    <strong>Dapil:</strong> {{ $peserta->nama_dapil }}
                </div>
                
                <hr>
                <h5 class="mb-3">Item Data CV (dari tabel `pengguna_data`)</h5>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-sm">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Judul/Kegiatan</th>
                                <th>Tahun</th>
                                <th>Lokasi</th>
                                <th>Sertifikat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($peserta->dataCv as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>
                                        <strong>{{ $item->judul }}</strong><br>
                                    </td>
                                    <td class="text-center">{{ $item->tahun ?? '-' }}</td>
                                    <td>{{ $item->lokasi ?? '-' }}</td>
                                    <td class="text-center">
                                        @if($item->file_name)
                                            <a href="{{ Storage::url('sertifikat/' . $item->file_name) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                Lihat
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Peserta ini belum menginput data CV (prestasi/pengalaman).</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header fw-bold bg-warning">Formulir Penilaian CV</div>
            <div class="card-body">
                <form action="{{ route('admin.penilaian_cv_belum.update', $peserta->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nilai_cv" class="form-label fw-bold">Nilai Akhir CV</label>
                        <input type="number" step="0.01" min="0" max="100" 
                               name="nilai_cv" id="nilai_cv" 
                               class="form-control @error('nilai_cv') is-invalid @enderror" 
                               value="{{ old('nilai_cv', $peserta->nilai_cv) }}" required>
                        @error('nilai_cv')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="catatan_cv" class="form-label fw-bold">Catatan Penilai</label>
                        <textarea name="catatan_cv" id="catatan_cv" 
                                  class="form-control @error('catatan_cv') is-invalid @enderror" 
                                  rows="5" 
                                  placeholder="Beri masukan atau catatan...">{{ old('catatan_cv', $peserta->catatan_cv) }}</textarea>
                        @error('catatan_cv')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Simpan Penilaian CV</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection