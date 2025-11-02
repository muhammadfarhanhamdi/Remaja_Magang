@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Peserta</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.laporan_kustom.index') }}">Laporan Kustom</a></li>
        </ol>
        <h4 class="main-title mb-0">Hasil Laporan: {{ $laporan->judul }}</h4>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header bg-light fw-bold">Query yang Dieksekusi:</div>
    <div class="card-body">
        <pre class="text-monospace p-2 bg-light rounded">{{ $laporan->sql }}</pre>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white fw-bold">Hasil Data ({{ $results->count() }} Baris)</div>
    <div class="card-body">
        @if($results->isNotEmpty())
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
        @else
            <div class="alert alert-warning mb-0">Tidak ada data ditemukan untuk query ini.</div>
        @endif
    </div>
    <div class="card-footer">
        <a href="{{ route('admin.laporan_kustom.index') }}" class="btn btn-secondary">Kembali ke Daftar Laporan</a>
    </div>
</div>
@endsection