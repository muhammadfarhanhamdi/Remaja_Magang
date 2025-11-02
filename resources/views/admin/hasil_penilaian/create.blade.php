@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Peserta</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.hasil_penilaian.index') }}">Daftar Hasil Penilaian</a></li>
        </ol>
        <h4 class="main-title mb-0">Tambah Hasil Penilaian</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.hasil_penilaian.store') }}" method="POST">
            @csrf

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="id_pengguna" class="form-label fw-bold" style="width:150px; margin-top:8px;">ID Peserta</label>
                <div class="d-flex flex-row gap-2">
                    <input type="number" name="id_pengguna" id="id_pengguna" class="form-control @error('id_pengguna') is-invalid @enderror"
                        placeholder="Masukkan ID Peserta" value="{{ old('id_pengguna') }}" style="width:500px;" required>
                    <span class="text-danger">*</span>
                </div>
                @error('id_pengguna')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="id_kriteria" class="form-label fw-bold" style="width:150px; margin-top:8px;">ID Kriteria</label>
                <div class="d-flex flex-row gap-2">
                    <input type="number" name="id_kriteria" id="id_kriteria" class="form-control @error('id_kriteria') is-invalid @enderror"
                        placeholder="Masukkan ID Kriteria" value="{{ old('id_kriteria') }}" style="width:500px;" required>
                    <span class="text-danger">*</span>
                </div>
                @error('id_kriteria')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="bobot" class="form-label fw-bold" style="width:150px; margin-top:8px;">Bobot</label>
                <div class="d-flex flex-row gap-2">
                    <input type="number" name="bobot" id="bobot" class="form-control @error('bobot') is-invalid @enderror"
                        placeholder="Masukkan bobot" value="{{ old('bobot') }}" style="width:500px;" required>
                    <span class="text-danger">*</span>
                </div>
                @error('bobot')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="skor" class="form-label fw-bold" style="width:150px; margin-top:8px;">Skor</label>
                <div class="d-flex flex-row gap-2">
                    <input type="number" step="any" name="skor" id="skor" class="form-control @error('skor') is-invalid @enderror"
                        placeholder="Masukkan skor" value="{{ old('skor') }}" style="width:500px;" required>
                    <span class="text-danger">*</span>
                </div>
                @error('skor')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="nilai" class="form-label fw-bold" style="width:150px; margin-top:8px;">Nilai Akhir</label>
                <div class="d-flex flex-row gap-2">
                    <input type="number" step="any" name="nilai" id="nilai" class="form-control @error('nilai') is-invalid @enderror"
                        placeholder="Masukkan nilai akhir" value="{{ old('nilai') }}" style="width:500px;" required>
                    <span class="text-danger">*</span>
                </div>
                @error('nilai')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.hasil_penilaian.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection