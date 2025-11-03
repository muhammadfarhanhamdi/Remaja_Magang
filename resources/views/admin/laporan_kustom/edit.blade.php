@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Peserta</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.laporan_kustom.index') }}">Laporan Kustom</a></li>
        </ol>
        <h4 class="main-title mb-0">Edit Laporan: {{ $laporan->judul }}</h4>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('admin.laporan_kustom.update', $laporan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="judul" class="form-label fw-bold">Judul Laporan</label>
                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror"
                       placeholder="Masukkan judul laporan" value="{{ old('judul', $laporan->judul) }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="sql" class="form-label fw-bold">Query SQL (Gunakan SELECT)</label>
                <textarea name="sql" id="sql" class="form-control @error('sql') is-invalid @enderror" rows="5"
                          placeholder="Contoh: SELECT nama, email, nilai_total FROM pengguna WHERE status_lolos = 1">{{ old('sql', $laporan->sql) }}</textarea>
                @error('sql')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('admin.laporan_kustom.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white fw-bold">
        Hasil Data ({{ $results->count() }} Baris)
        <span class="float-end">Query dieksekusi saat halaman dimuat</span>
    </div>
    <div class="card-body">
        
        @if($queryError)
            <div class="alert alert-danger">
                <strong>Query Gagal Dieksekusi:</strong><br>
                <pre class="mb-0">{{ $queryError }}</pre>
            </div>
        @endif

        @if(!$queryError && $results->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 5%">No</th>
                            @foreach($columns as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $index => $row)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                @foreach($columns as $column)
                                    <td>{{ $row->$column }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif(!$queryError && $results->isEmpty())
            <div class="alert alert-warning mb-0">Tidak ada data ditemukan untuk query ini.</div>
        @endif
    </div>
</div>
@endsection