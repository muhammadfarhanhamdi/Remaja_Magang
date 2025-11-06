@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <h4 class="main-title mb-0">Selamat Datang di Dashboard Admin</h4>
    </div>
</div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
    @foreach($stats as $stat)
    <div class="col">
        <div class="card card-hover h-100 {{ $stat['color'] }} text-white shadow">
            <div class="card-body p-4">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="text-uppercase fw-semibold mb-1">{{ $stat['title'] }}</h6>
                        <h2 class="display-5 fw-bold mb-0">{{ number_format($stat['count']) }}</h2>
                    </div>
                    <div class="ms-3">
                        <i class="{{ $stat['icon'] }} display-3 opacity-50"></i>
                    </div>
                </div>
            </div>
            {{-- <div class="card-footer bg-white bg-opacity-10 border-0 pt-0 pb-1">
                <a href="#" class="text-white-50 small">Lihat Detail <i class="ri-arrow-right-line align-middle"></i></a>
            </div> --}}
        </div>
    </div>
    @endforeach
</div>

<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-light">
                <h6 class="mb-0 fw-semibold">Informasi Sistem</h6>
            </div>
            <div class="card-body">
                <p>Sistem ini dirancang untuk mengelola data referensi, arsip dokumen, dan proses penilaian peserta magang secara terpusat.</p>
                <ul>
                    <li>Gunakan menu samping untuk mengakses data master dan fitur penilaian.</li>
                    <li>Pastikan data di tabel referensi (Kegiatan, Tingkat) sudah lengkap sebelum memulai penilaian.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection