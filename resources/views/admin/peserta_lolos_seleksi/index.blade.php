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
</div>

<div class="card">
    <div class="card-body">

        <form method="GET" action="{{ route('admin.peserta_lolos_seleksi.index') }}" class="mb-3">
            <div class="row">
                <div class="col-md-2">
                    <div class="input-group">
                        <span class="input-group-text">Tahun</span>
                        <select class="form-select" name="tahun" onchange="this.form.submit()">
                            @php
                                $startYear = 2020;
                                $currentYear = date('Y');
                            @endphp
                            @for ($y = $currentYear; $y >= $startYear; $y--)
                                <option value="{{ $y }}" {{ $y == $tahun ? 'selected' : '' }}>{{ $y }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
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
                    @forelse($peserta_lolos_seleksi as $index => $item)
                        <tr>
                            <td class="text-center">{{ $peserta_lolos_seleksi->firstItem() + $index }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->asal_sekolah ?? '-' }}</td>
                            <td class="text-center fw-bold">{{ number_format($item->nilai_total, 3) }}</td>
                            <td class="text-center">
                                @if($item->status_lolos == 1)
                                    <span class="badge bg-success">Lolos Seleksi</span>
                                @else
                                    <span class="badge bg-warning">Menunggu</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.peserta.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="ri-eye-line"></i> Detail
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data peserta lolos seleksi untuk tahun {{ $tahun }}.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $peserta_lolos_seleksi->appends(['tahun' => $tahun])->links() }}
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush