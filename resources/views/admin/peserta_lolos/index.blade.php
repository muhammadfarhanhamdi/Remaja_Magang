@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Peserta</li>
            <li class="breadcrumb-item active">Daftar Peserta (Lolos)</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Peserta (Lolos)</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <form method="GET" action="{{ route('admin.peserta_lolos.index') }}" class="mb-3">
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
                        <th>Nilai CV</th>
                        <th>Nilai Esai</th>
                        <th>Nilai Video</th>
                        <th>Nilai Total</th>
                        <th style="width: 20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peserta_lolos as $index => $item)
                        <tr>
                            <td class="text-center">{{ $peserta_lolos->firstItem() + $index }}</td>
                            <td>{{ $item->nisn ?? 'N/A' }}</td>
                            <td>{{ $item->nama ?? 'N/A' }}</td>
                            <td>{{ $item->asal_sekolah ?? 'N/A' }}</td>
                            <td>{{ $item->nama_dapil ?? 'N/A' }}</td>
                            <td class="text-center">{{ number_format($item->nilai_cv, 2) }}</td>
                            <td class="text-center">{{ number_format($item->nilai_esai, 3) }}</td>
                            <td class="text-center">{{ number_format($item->nilai_video, 2) }}</td>
                            <td class="text-center">{{ number_format($item->nilai_total, 3) }}</td>
                            
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.peserta.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="ri-edit-line"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.peserta.destroy', $item->id) }}" method="POST" class="form-hapus" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger btn-hapus">
                                            <i class="ri-delete-bin-line"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">Tidak ada data peserta lolos untuk tahun {{ $tahun }}.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div class="d-flex justify-content-center">
                {{ $peserta_lolos->appends(['tahun' => $tahun])->links() }}
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    $('.btn-hapus').on('click', function(e) {
        e.preventDefault();
        let form = $(this).closest('form');
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        } else {
            if (confirm('Yakin ingin menghapus data ini?')) {
                form.submit();
            }
        }
    });
});
</script>
@endpush