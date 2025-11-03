@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Penilaian Esai</li>
            <li class="breadcrumb-item active">Daftar Penilaian Esai (Belum)</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Esai yang Belum Dinilai</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <form method="GET" action="{{ route('admin.penilaian_esai_belum.index') }}" class="mb-3">
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
                        <th>ID Peserta</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Sekolah</th>
                        <th>Dapil</th>
                        <th>Ranking</th>
                        <th>Nilai CV</th>
                        <th>Nilai Esai</th>
                        <th>Status Esai</th>
                        <th>Penilai</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peserta_esai_belum as $index => $item)
                        <tr>
                            <td class="text-center">{{ $peserta_esai_belum->firstItem() + $index }}</td>
                            <td class="text-center">{{ $item->id }}</td>
                            <td>{{ $item->nisn ?? 'N/A' }}</td>
                            <td>{{ $item->nama ?? 'N/A' }}</td>
                            <td>{{ $item->asal_sekolah ?? 'N/A' }}</td>
                            <td>{{ $item->nama_dapil ?? 'N/A' }}</td>
                            <td class="text-center">({{ $peserta_esai_belum->firstItem() + $index }})</td>
                            
                            <td class="text-center">{{ number_format($item->nilai_cv ?? 0, 2) }}</td>

                            <td class="text-center">{{ number_format($item->nilai_esai ?? 0, 3) }}</td>
                            
                            <td class="text-center">
                                @if($item->status_esai == 1)
                                    <span class="text-success fs-lg"><i class="ri-check-line"></i></span>
                                @else
                                    <span class="text-danger fs-lg"><i class="ri-close-line"></i></span>
                                @endif
                            </td>
                            
                            <td>{{ $item->user_esai ?? '-' }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.penilaian_esai_belum.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                        Penilaian Esai
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center">Tidak ada data Esai yang perlu dinilai untuk tahun {{ $tahun }}.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div class="d-flex justify-content-center">
                {{ $peserta_esai_belum->appends(['tahun' => $tahun])->links() }}
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush