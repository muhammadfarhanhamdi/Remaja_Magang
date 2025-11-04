<?php

namespace App\Services;

use App\Models\PesertaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PesertaService
{
    public function getAllActive()
    {
        return PesertaModel::where('status', 1)
            ->orderByDesc('tanggal_pendaftaran')
            ->get();
    }

    public function getById($id)
    {
        return PesertaModel::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function validatePesertaData(Request $request, $isUpdate = false)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:pengguna,email,' . ($isUpdate ? $request->id : 'NULL') . ',id',
            // 'peran' => 'required|string|in:admin,reviewer,peserta', 
            'nisn' => 'nullable|string|max:100',
            'handphone' => 'nullable|string|max:100',
            'asal_sekolah' => 'nullable|string|max:255',
            'jenis_kelamin' => 'nullable|string|in:l,p',
            'nama_dapil' => 'nullable|string|max:100',
        ];

        $messages = [
            'nama.required' => 'Nama peserta harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.unique' => 'Email ini sudah terdaftar.',
            // 'peran.required' => 'Peran peserta harus diisi.',
        ];

        return $request->validate($rules, $messages);
    }

    public function createPeserta(array $data)
    {
        $defaultSandi = '123456'; 

        $dataToCreate = [
            'nama' => $data['nama'],
            'email' => $data['email'],
            // 'peran' => $data['peran'],
            'nisn' => $data['nisn'] ?? null,
            'handphone' => $data['handphone'] ?? null,
            'asal_sekolah' => $data['asal_sekolah'] ?? null,
            'jenis_kelamin' => $data['jenis_kelamin'] ?? null,
            'nama_dapil' => $data['nama_dapil'] ?? null,
            'sandi' => md5($defaultSandi),
            'tanggal_pendaftaran' => now()->toDateString(), 
            'status' => 1,
        ];
        
        return PesertaModel::create($dataToCreate);
    }

    public function updatePeserta($id, array $data)
    {
        $peserta = PesertaModel::findOrFail($id);
        $peserta->update([
            'nama' => $data['nama'],
            'email' => $data['email'],
            // 'peran' => $data['peran'],
            'nisn' => $data['nisn'] ?? $peserta->nisn,
            'handphone' => $data['handphone'] ?? $peserta->handphone,
            'asal_sekolah' => $data['asal_sekolah'] ?? $peserta->asal_sekolah,
            'jenis_kelamin' => $data['jenis_kelamin'] ?? $peserta->jenis_kelamin,
            'nama_dapil' => $data['nama_dapil'] ?? $peserta->nama_dapil,
        ]);

        return $peserta;
    }

    public function softDeletePeserta($id)
    {
        $peserta = PesertaModel::findOrFail($id);
        $peserta->update([
            'status' => 9,
        ]);

        return $peserta;
    }
}
