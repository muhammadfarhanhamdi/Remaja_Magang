@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item">Data Peserta</li>
                <li class="breadcrumb-item active">Daftar Penilaian</li>
            </ol>
            <h4 class="main-title mb-0">Daftar Penilaian</h4>
        </div>
        <div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <form method="GET" action="{{ route('admin.penilaian.index') }}" class="mb-3">
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
                                    <option value="{{ $y }}" {{ $y == $tahun ? 'selected' : '' }}>
                                        {{ $y }}</option>
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
                            <th style="width: 7%">CV</th>
                            <th style="width: 7%">Esai</th>
                            <th style="width: 7%">Video</th>
                            <th style="width: 15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peserta as $index => $item)
                            @php
                                $has_cv = $item->penilaian->firstWhere('id_skoring', 1);
                                $has_esai = $item->penilaian->firstWhere('id_skoring', 2);
                                $has_video = $item->penilaian->firstWhere('id_skoring', 3);
                                $actions = [];
                                if (!$has_cv) {
                                    // Biru
                                    $actions[] =
                                        '<a href="' .
                                        route('admin.penilaian.create', [
                                            'id_pengguna' => $item->id,
                                            'id_skoring' => 1,
                                        ]) .
                                        '" class="btn btn-sm btn-primary">CV</a>';
                                }
                                if (!$has_esai) {
                                    $actions[] =
                                        '<a href="' .
                                        route('admin.penilaian.create', [
                                            'id_pengguna' => $item->id,
                                            'id_skoring' => 2,
                                        ]) .
                                        '" class="btn btn-sm btn-success">ESAI</a>';
                                }
                                if (!$has_video) {
                                    $actions[] =
                                        '<a href="' .
                                        route('admin.penilaian.create', [
                                            'id_pengguna' => $item->id,
                                            'id_skoring' => 3,
                                        ]) .
                                        '" class="btn btn-sm btn-warning">VIDEO</a>';
                                }
                            @endphp
                            <tr>
                                <td class="text-center">{{ $peserta->firstItem() + $index }}</td>
                                <td>{{ $item->nisn ?? 'N/A' }}</td>
                                <td>{{ $item->nama ?? 'N/A' }}</td>
                                <td>{{ $item->asal_sekolah ?? 'N/A' }}</td>
                                <td>{{ $item->nama_dapil ?? 'N/A' }}</td>

                                <td class="text-center">
                                    @if ($has_cv)
                                        <span class="text-success fs-lg"><i class="ri-check-line"></i></span>
                                    @else
                                        <span class="text-danger fs-lg"><i class="ri-close-line"></i></span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($has_esai)
                                        <span class="text-success fs-lg"><i class="ri-check-line"></i></span>
                                    @else
                                        <span class="text-danger fs-lg"><i class="ri-close-line"></i></span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($has_video)
                                        <span class="text-success fs-lg"><i class="ri-check-line"></i></span>
                                    @else
                                        <span class="text-danger fs-lg"><i class="ri-close-line"></i></span>
                                    @endif
                                </td>

                                {{-- Kolom Aksi dengan wrapper 'd-flex' --}}
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        {!! implode(' ', $actions) !!}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data peserta untuk tahun
                                    {{ $tahun }}.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div classd="d-flex justify-content-center">
                    {{ $peserta->appends(['tahun' => $tahun])->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
