@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Peserta</li>
            <li class="breadcrumb-item active">Daftar Hasil Penilaian</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Hasil Penilaian</h4>
    </div>
    <div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <form method="GET" action="{{ route('admin.hasil_penilaian.index') }}" class="mb-3">
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
            <table id="datatable" class="table table-striped table-bordered align-middle">
                <thead class="table-light">
                    <tr class="text-center">
                        <th style="width: 5%">No</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Sekolah</th>
                        <th>Dapil</th>
                        <th>Ranking</th>
                        <th>CV</th>
                        <th>Esai</th>
                        <th>Video</th>
                        <th>Total</th>
                        <th>Penilai</th>
                        <th style="width: 10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($hasil_penilaian as $index => $item)
                        <tr>
                            <td class="text-center">{{ $hasil_penilaian->firstItem() + $index }}</td>
                            <td>{{ $item->nisn ?? 'N/A' }}</td>
                            <td>{{ $item->nama ?? 'N/A' }}</td>
                            <td>{{ $item->asal_sekolah ?? 'N/A' }}</td>
                            <td>{{ $item->nama_dapil ?? 'N/A' }}</td>
                            <td class="text-center">({{ $hasil_penilaian->firstItem() + $index }})</td>
                            
                            <td class="text-center">{{ number_format($item->nilai_cv, 2) }}</td>
                            <td class="text-center">{{ number_format($item->nilai_esai, 3) }}</td>
                            <td class="text-center">{{ number_format($item->nilai_video, 2) }}</td>
                            <td class="text-center">{{ number_format($item->nilai_total, 3) }}</td>
                            
                            <td>
                                {{ $item->user_cv ?? '-' }}<br>
                                {{ $item->user_esai ?? '-' }}<br>
                                {{ $item->user_video ?? '-' }}
                            </td>
                            
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="#" class="btn btn-sm btn-primary">
                                        VIEW
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center">Tidak ada data peserta untuk tahun {{ $tahun }}.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div class="d-flex justify-content-center">
                {{ $hasil_penilaian->appends(['tahun' => $tahun])->links() }}
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush