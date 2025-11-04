@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dapil.index') }}">Daftar Dapil</a></li>
        </ol>
        <h4 class="main-title mb-0">Edit Dapil: {{ $dapil->dapil }}</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.dapil.update', $dapil->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="id_provinsi" class="form-label fw-bold" style="width:150px; margin-top:8px;">Provinsi</label>
                <div class="d-flex flex-row gap-2">
                    <select name="id_provinsi" id="id_provinsi" class="form-select @error('id_provinsi') is-invalid @enderror" style="width:500px;" required>
                        <option value="">Pilih Provinsi</option>
                        @php
                            $current_value = $dapil->id_provinsi . '|' . $dapil->provinsi;
                        @endphp
                        
                        @foreach($provinces as $province)
                            @php $option_value = $province['id'] . '|' . $province['name']; @endphp
                            <option value="{{ $option_value }}" 
                                {{ old('id_provinsi', $current_value) == $option_value ? 'selected' : '' }}>
                                {{ $province['name'] }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">*</span>
                </div>
                @error('id_provinsi')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="id_kabupaten" class="form-label fw-bold" style="width:150px; margin-top:8px;">ID Kabupaten</label>
                <div class="d-flex flex-row gap-2">
                    <input type="number" name="id_kabupaten" id="id_kabupaten" class="form-control @error('id_kabupaten') is-invalid @enderror"
                        value="{{ old('id_kabupaten', $dapil->id_kabupaten) }}" style="width:500px;" required>
                    <span class="text-danger">*</span>
                </div>
                @error('id_kabupaten')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="kabupaten" class="form-label fw-bold" style="width:150px; margin-top:8px;">Nama Kabupaten</label>
                <div class="d-flex flex-row gap-2">
                    <input type="text" name="kabupaten" id="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror"
                        value="{{ old('kabupaten', $dapil->kabupaten) }}" style="width:500px;" required>
                    <span class="text-danger">*</span>
                </div>
                @error('kabupaten')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="id_dapil" class="form-label fw-bold" style="width:150px; margin-top:8px;">ID Dapil</label>
                <div class="d-flex flex-row gap-2">
                    <input type="number" name="id_dapil" id="id_dapil" class="form-control @error('id_dapil') is-invalid @enderror"
                        value="{{ old('id_dapil', $dapil->id_dapil) }}" style="width:500px;" required>
                    <span class="text-danger">*</span>
                </div>
                @error('id_dapil')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 d-flex align-items-start gap-2">
                <label for="dapil" class="form-label fw-bold" style="width:150px; margin-top:8px;">Nama Dapil</label>
                <div class="d-flex flex-row gap-2">
                    <input type="text" name="dapil" id="dapil" class="form-control @error('dapil') is-invalid @enderror"
                        value="{{ old('dapil', $dapil->dapil) }}" style="width:500px;" required>
                    <span class="text-danger">*</span>
                </div>
                @error('dapil')
                    <div class="invalid-feedback d-block ms-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Perbarui</button>
            <a href="{{ route('admin.dapil.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection