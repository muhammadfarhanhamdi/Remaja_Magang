@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Peserta</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.peserta.index') }}">Daftar Peserta</a></li>
        </ol>
        <h4 class="main-title mb-0">Edit Peserta</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.peserta.update', $peserta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="nama" class="form-label fw-bold" style="width:150px; margin-top:8px;">Nama</label>
                <div class="d-flex flex-row gap-2">
                    <input type="text" name="nama" id="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama', $peserta->nama) }}" style="width:500px;" required>
                    <span class="text-danger">*</span>
                </div>
                @error('nama')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="email" class="form-label fw-bold" style="width:150px; margin-top:8px;">Email</label>
                <div class="d-flex flex-row gap-2">
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $peserta->email) }}" style="width:500px;" required>
                    <span class="text-danger">*</span>
                </div>
                @error('email')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="handphone" class="form-label fw-bold" style="width:150px; margin-top:8px;">Handphone</label>
                <div class="d-flex flex-row gap-2">
                    <input type="text" name="handphone" id="handphone" class="form-control @error('handphone') is-invalid @enderror"
                        value="{{ old('handphone', $peserta->handphone) }}" style="width:500px;">
                    <span class="text-danger"></span>
                </div>
                @error('handphone')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="peran" class="form-label fw-bold" style="width:150px; margin-top:8px;">Peran</label>
                <div class="d-flex flex-row gap-2">
                    <select name="peran" id="peran" class="form-select @error('peran') is-invalid @enderror" style="width:500px;" required>
                        @php $oldPeran = old('peran', $peserta->peran); @endphp
                        <option value="">Pilih Peran</option>
                        <option value="peserta" {{ $oldPeran == 'peserta' ? 'selected' : '' }}>Peserta</option>
                        <option value="reviewer" {{ $oldPeran == 'reviewer' ? 'selected' : '' }}>Reviewer</option>
                        <option value="admin" {{ $oldPeran == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    <span class="text-danger">*</span>
                </div>
                @error('peran')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('admin.peserta.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
