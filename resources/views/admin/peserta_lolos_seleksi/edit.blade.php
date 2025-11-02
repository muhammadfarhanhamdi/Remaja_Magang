@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Peserta</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.peserta_lolos_seleksi.index') }}">Daftar Peserta (Lolos Seleksi)</a></li>
        </ol>
        <h4 class="main-title mb-0">Detail Peserta Lolos Seleksi: {{ $peserta->nama }}</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Nama:</strong> {{ $peserta->nama }}</p>
                <p><strong>NISN:</strong> {{ $peserta->nisn ?? '-' }}</p>
                <p><strong>Email:</strong> {{ $peserta->email }}</p>
                <p><strong>Handphone:</strong> {{ $peserta->handphone }}</p>
                <p><strong>Asal Sekolah:</strong> {{ $peserta->asal_sekolah ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Nilai Total:</strong> <span class="fs-4 fw-bold text-primary">{{ number_format($peserta->nilai_total, 2) }}</span></p>
                <p><strong>Status Lolos Seleksi:</strong> 
                    @if($peserta->status_lolos == 1)
                        <span class="badge bg-success">Lolos Seleksi</span>
                    @else
                        <span class="badge bg-warning">Menunggu Keputusan</span>
                    @endif
                </p>
                <p><strong>Dapil:</strong> {{ $peserta->nama_dapil ?? '-' }}</p>
                <p><strong>Tanggal Pendaftaran:</strong> {{ $peserta->tanggal_pendaftaran ? date('d-m-Y', strtotime($peserta->tanggal_pendaftaran)) : '-' }}</p>
            </div>
        </div>

        <a href="{{ route('admin.peserta.edit', $peserta->id) }}" class="btn btn-info mt-3">
             <i class="ri-pencil-line"></i> Edit Data Peserta
        </a>
        <a href="{{ route('admin.peserta_lolos_seleksi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection