@extends('layouts.app')

@section('content')
    {{-- Style block disalin persis dari file view CV --}}
    <style>
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.3rem;
        }

        .form-control[readonly] {
            background-color: #e9ecef;
            opacity: 1;
            border: 1px solid #ced4da;
        }

        .table-sm th,
        .table-sm td {
            padding: 0.4rem;
            vertical-align: middle;
        }

        .score-table th {
            background-color: #f8f9fa;
        }

        .table thead th {
            font-weight: 600;
            font-size: 0.875rem;
            vertical-align: middle;
        }

        .table tbody td {
            font-size: 0.875rem;
        }

        .table .form-control-sm {
            font-size: 0.8rem;
            height: calc(1.5em + 0.5rem + 2px);
        }

        .table td.p-1 {
            padding: 0.25rem !important;
        }
    </style>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <ol class="breadcrumb fs-sm mb-1">
                <li class="breadcrumb-item"><a href="{{ route('admin.penilaian_esai_sudah.index') }}">Data Penilaian Esai
                        (Sudah)</a></li>
                <li class="breadcrumb-item active">View Penilaian Esai</li>
            </ol>
            <h4 class="main-title mb-0">View Penilaian Esai (Sudah)</h4>
        </div>
        <div>
            <a href="{{ route('admin.penilaian_esai_sudah.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title mb-3">Data Siswa</h5>
            <div class="row">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">NISN</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->nisn ?? 'N/A' }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Nama</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->nama ?? 'N/A' }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Sekolah</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->asal_sekolah ?? 'N/A' }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Dapil</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->nama_dapil ?? 'N/A' }}" readonly>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Tgl. Pendaftaran</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm"
                            value="{{ $peserta->tanggal_pendaftaran ? $peserta->tanggal_pendaftaran->format('d-m-Y') : 'N/A' }}"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Nama</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->nama ?? 'N/A' }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Nama Panggilan</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->nama_panggilan ?? 'N/A' }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">NISN</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->nisn ?? 'N/A' }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Asal Sekolah</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->asal_sekolah ?? 'N/A' }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Provinsi</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->nama_provinsi ?? 'N/A' }}" readonly>
                    </div>
                </div>
                 <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Kabupaten/Kota</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->nama_kabupaten ?? 'N/A' }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Dapil</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->nama_dapil ?? 'N/A' }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Handphone</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->handphone ?? 'N/A' }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Handphone Orangtua</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->handphone_orangtua ?? 'N/A' }}"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Handphone Wali Murid</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->handphone_wali_murid ?? 'N/A' }}"
                            readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Penilai</LAbel>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-sm" value="{{ $peserta->user_esai ?? 'N/A' }}" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label form-label">Catatan</label>
                    <div class="col-sm-7">
                        <textarea class="form-control form-control-sm" rows="5" readonly>{{ $peserta->catatan_esai ?? '' }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-sm-12 offset-sm-6 d-flex justify-content-end">
                            <a href="{{ route('admin.penilaian_esai_sudah.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title mb-3">Rekapitulasi Skor Penilaian Esai</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm score-table align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th style="width: 5%;">No.</th>
                            <th class="text-start">Kriteria</th>
                            <th style="width: 20%;">Skor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1.</td>
                            <td>Orisinalitas</td>
                            <td class="text-center">{{ number_format($peserta->orisinalitas ?? 0, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">2.</td>
                            <td>Kesesuaian Tema</td>
                            <td class="text-center">{{ number_format($peserta->kesesuaian_tema ?? 0, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">3.</td>
                            <td>Eksplorasi Tema</td>
                            <td class="text-center">{{ number_format($peserta->eksplorasi_tema ?? 0, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="text-center">4.</td>
                            <td>Keterkaitan dengan Fungsi DPR</td>
                            <td class="text-center">{{ number_format($peserta->keterkaitan_dpr ?? 0, 2) }}</td>
                        </tr>
                         <tr>
                            <td class="text-center">5.</td>
                            <td>Proporsionalitas</td>
                            <td class="text-center">{{ number_format($peserta->proporsionalitas ?? 0, 2) }}</td>
                        </tr>
                         <tr>
                            <td class="text-center">6.</td>
                            <td>Gaya Penulisan</td>
                            <td class="text-center">{{ number_format($peserta->gaya_penulisan ?? 0, 2) }}</td>
                        </tr>
                         <tr>
                            <td class="text-center">7.</td>
                            <td>Referensi</td>
                            <td class="text-center">{{ number_format($peserta->referensi ?? 0, 2) }}</td>
                        </tr>
                    </tbody>
                    <tfoot class="fw-bold">
                        <tr>
                            <td colspan="2" class="text-end">Nilai Akhir (Rata-rata)</td>
                            <td class="text-center text-success fs-5">{{ number_format($peserta->nilai_esai ?? 0, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title mb-3">Rekapitulasi Nilai Total</h5>
            <form action="{{ route('admin.penilaian_esai_sudah.index') }}" method="GET">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm align-middle">
                        <thead class="table-light text-center">
                            <tr class="text-center">
                                <th style="width: 8%;">No.</th>
                                <th style="width: 20%;">Kriteria</th>
                                <th style="width: 18%;">Bobot</th>
                                <th style="width: 18%;">Skor</th>
                                <th style="width: 18%;">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                             <tr>
                                <td class="p-1">
                                    <input type="text" class="form-control form-control-sm text-center"
                                        name="filter_no" value="{{ request('filter_no') }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="form-control form-control-sm" name="filter_kriteria"
                                        value="{{ request('filter_kriteria') }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="form-control form-control-sm" name="filter_bobot"
                                        value="{{ request('filter_bobot') }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="form-control form-control-sm" name="filter_skor"
                                        value="{{ request('filter_skor') }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="form-control form-control-sm" name="filter_nilai"
                                        value="{{ request('filter_nilai') }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">1.</td>
                                <td class="align-middle">ESAI</td>
                                <td class="text-center align-middle">35%</td>
                                <td class="text-center align-middle">96,35</td>
                                <td class="text-center align-middle">33,72</td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">2.</td>
                                <td class="align-middle">ESAI</td>
                                <td class="text-center align-middle">35%</td>
                                <td class="text-center align-middle">96,35</td>
                                <td class="text-center align-middle">33,72</td>
                            </tr>
                        </tbody>
                        <tfoot class="fw-bold">
                            <tr>
                                <td colspan="4" class="text-end align-middle">Total</td>
                                <td class="text-center align-middle text-primary fs-5">67,44</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </form>
        </div>
    </div>
@endsection