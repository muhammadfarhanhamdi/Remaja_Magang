@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Peserta</li>
            <li class="breadcrumb-item active">Laporan Kustom</li>
        </ol>
        <h4 class="main-title mb-0">Laporan Kustom</h4>
    </div>
    <div>
        <a href="{{ route('admin.laporan_kustom.create') }}" class="btn btn-success">
            <i class="ri-add-line"></i> Tambah Laporan
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-striped table-bordered align-middle">
                <thead class="table-light">
                    <tr class="text-center">
                        <th style="width: 5%">No</th>
                        <th>Judul Laporan</th>
                        <th style="width: 30%">Query SQL</th>
                        <th style="width: 25%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporan as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->judul }}</td>
                            <td class="text-monospace small">{{ Str::limit($item->sql, 100) }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.laporan_kustom.view', $item->id) }}" class="btn btn-sm btn-info">
                                        <i class="ri-eye-line"></i> Lihat Hasil
                                    </a>
                                    <a href="{{ route('admin.laporan_kustom.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                        <i class="ri-edit-line"></i> Edit
                                    </a>

                                    <form action="{{ route('admin.laporan_kustom.destroy', $item->id) }}" method="POST" class="form-hapus" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger btn-hapus">
                                            <i class="ri-delete-bin-line"></i> Hapus
                                        </button>
                                    </form>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    $('.btn-hapus').on('click', function(e) {
        e.preventDefault();
        let form = $(this).closest('form');
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Laporan ini akan dihapus permanen!',
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