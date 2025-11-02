@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Peserta</li>
            <li class="breadcrumb-item active">Daftar Peserta (Lolos Seleksi)</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Peserta (Lolos Seleksi)</h4>
    </div>
    {{-- Biasanya tombol export/cetak hasil seleksi ada di sini --}}
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered align-middle">
                <thead class="table-light">
                    <tr class="text-center">
                        <th style="width: 5%">No</th>
                        <th>Nama</th>
                        <th>Asal Sekolah</th>
                        <th>Nilai Total</th>
                        <th>Status Lolos</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peserta_lolos_seleksi as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->asal_sekolah ?? '-' }}</td>
                            <td class="text-center fw-bold">{{ number_format($item->nilai_total, 2) }}</td>
                            <td class="text-center">
                                @if($item->status_lolos == 1)
                                    <span class="badge bg-success">Lolos Seleksi</span>
                                @else
                                    <span class="badge bg-warning">Menunggu</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.peserta_lolos_seleksi.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="ri-eye-line"></i> Detail
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