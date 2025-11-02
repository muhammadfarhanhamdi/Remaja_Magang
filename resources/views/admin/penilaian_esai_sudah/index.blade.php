@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Penilaian Esai</li>
            <li class="breadcrumb-item active">Daftar Penilaian Esai (Sudah)</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Esai yang Sudah Dinilai</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered align-middle">
                <thead class="table-light">
                    <tr class="text-center">
                        <th style="width: 5%">No</th>
                        <th>Nama Peserta</th>
                        <th>Judul Esai</th>
                        <th>Penilai</th>
                        <th>Status</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($esai_sudah as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->peserta->nama ?? 'Peserta Tidak Ditemukan' }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->user_update ?? 'N/A' }}</td>
                            <td class="text-center">
                                <span class="badge bg-success">SUDAH DINILAI</span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.penilaian_esai_sudah.show', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="ri-eye-line"></i> Lihat Hasil
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
