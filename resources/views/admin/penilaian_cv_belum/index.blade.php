@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Penilaian CV</li>
            <li class="breadcrumb-item active">Daftar Penilaian CV (Belum)</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Peserta yang CV-nya Belum Dinilai</h4>
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
                        <th>Email</th>
                        <th>Asal Sekolah</th>
                        <th>Status</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peserta_cv_belum as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->asal_sekolah ?? '-' }}</td>
                            <td class="text-center">
                                <span class="badge bg-danger">BELUM DINILAI</span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    {{-- Mengarahkan ke form penilaian (di sini diasumsikan route peserta edit) --}}
                                    <a href="{{ route('admin.penilaian_cv_belum.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="ri-edit-line"></i> Mulai Nilai
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