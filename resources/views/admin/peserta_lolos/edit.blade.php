@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Peserta</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.peserta_lolos.index') }}">Daftar Peserta (Lolos)</a></li>
        </ol>
        <h4 class="main-title mb-0">Detail Peserta Lolos: {{ $peserta->nama }}</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Nama:</strong> {{ $peserta->nama }}</p>
                <p><strong>Email:</strong> {{ $peserta->email }}</p>
                <p><strong>Handphone:</strong> {{ $peserta->handphone }}</p>
                <p><strong>Peran:</strong> {{ $peserta->peran }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Status Lolos:</strong> 
                    @if($peserta->status_lolos == 1)
                        <span class="badge bg-success">Lolos</span>
                    @else
                        <span class="badge bg-danger">Tidak Lolos</span>
                    @endif
                </p>
                <p><strong>Nilai Total:</strong> {{ number_format($peserta->nilai_total, 2) }}</p>
                <p><strong>Tanggal Pendaftaran:</strong> {{ $peserta->tanggal_pendaftaran ? date('d-m-Y', strtotime($peserta->tanggal_pendaftaran)) : '-' }}</p>
                <p><strong>Catatan CV:</strong> {{ $peserta->catatan_cv ?? '-' }}</p>
            </div>
        </div>

        <a href="{{ route('admin.peserta.edit', $peserta->id) }}" class="btn btn-info mt-3">
             <i class="ri-pencil-line"></i> Edit Data Peserta
        </a>
        <a href="{{ route('admin.peserta_lolos.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
</div>
@endsection
