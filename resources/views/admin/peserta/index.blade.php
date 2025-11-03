@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Peserta</li>
            <li class="breadcrumb-item active">Daftar Peserta</li>
        </ol>
        <h4 class="main-title mb-0">Daftar Peserta</h4>
    </div>
    <div>
        <a href="{{ route('admin.peserta.create') }}" class="btn btn-success">
            <i class="ri-add-line"></i> Tambah Peserta
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
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Email</th>
                        <th>Sekolah</th>
                        <th>Dapil</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peserta as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nisn ?? '-' }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->asal_sekolah ?? '-' }}</td>
                            <td>{{ $item->nama_dapil ?? '-' }}</td>
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
            // Fallback jika Swal tidak ada
            if (confirm('Yakin ingin menghapus data ini?')) {
                form.submit();
            }
        }
    });
});
</script>
@endpush