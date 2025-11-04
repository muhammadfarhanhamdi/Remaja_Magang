@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Penilaian CV</li>
            <li class="breadcrumb-item active">Daftar Penilaian CV (Sudah)</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Peserta yang CV-nya Sudah Dinilai</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <form method="GET" action="{{ route('admin.penilaian_cv_sudah.index') }}" class="mb-3">
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
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Sekolah</th>
                        <th>Dapil</th>
                        <th>Ranking</th>
                        <th>Nilai CV</th>
                        <th>Status CV</th>
                        <th>Penilai</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peserta_cv_sudah as $index => $item)
                        <tr>
                            <td class="text-center">{{ $peserta_cv_sudah->firstItem() + $index }}</td>
                            <td>{{ $item->nisn ?? 'N/A' }}</td>
                            <td>{{ $item->nama ?? 'N/A' }}</td>
                            <td>{{ $item->asal_sekolah ?? 'N/A' }}</td>
                            <td>{{ $item->nama_dapil ?? 'N/A' }}</td>
                            <td class="text-center">({{ $peserta_cv_sudah->firstItem() + $index }})</td>
                            <td class="text-center fw-bold">{{ number_format($item->nilai_cv ?? 0, 2) }}</td>
                            <td class="text-center">
                                <span class="badge bg-success"><i class="ri-check-line"></i> SUDAH DINILAI</span>
                            </td>
                            <td>{{ $item->user_cv ?? '-' }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.penilaian_cv_belum.edit', $item->id) }}" class="btn btn-sm btn-info">
                                        VIEW CV
                                    </a>
                                    <form action="{{ route('admin.penilaian_cv_sudah.destroy', $item->id) }}" method="POST" class="form-batal" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger btn-batal">
                                            BATAL CV
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">Tidak ada data CV yang sudah dinilai untuk tahun {{ $tahun }}.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div class="d-flex justify-content-center">
                {{ $peserta_cv_sudah->appends(['tahun' => $tahun])->links() }}
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    $('.btn-batal').on('click', function(e) {
        e.preventDefault();
        let form = $(this).closest('form');
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: 'Yakin ingin membatalkan?',
                text: 'Penilaian CV ini akan dihapus dan peserta akan dikembalikan ke daftar "Belum Dinilai".',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, batalkan!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        } else {
            if (confirm('Yakin ingin membatalkan penilaian CV ini?')) {
                form.submit();
            }
        }
    });
});
</script>
@endpush