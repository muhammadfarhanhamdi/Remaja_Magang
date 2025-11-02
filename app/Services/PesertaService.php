<?php

namespace App\Services;

use App\Models\PesertaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaService
{
    public function getAllActive()
    {
        return PesertaModel::where('status', 1)
            ->where('peran', '!=', 'guest')
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
            'peran' => 'required|string|in:admin,reviewer,peserta', 
            'handphone' => 'nullable|string|max:100',
        ];

        $messages = [
            'nama.required' => 'Nama peserta harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'peran.required' => 'Peran peserta harus diisi.',
        ];

        return $request->validate($rules, $messages);
    }

    public function createPeserta(array $data)
    {
        return PesertaModel::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'handphone' => $data['handphone'] ?? null,
            'peran' => $data['peran'],
            'status' => 1,
        ]);
    }

    public function updatePeserta($id, array $data)
    {
        $peserta = PesertaModel::findOrFail($id);
        $peserta->update([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'handphone' => $data['handphone'] ?? $peserta->handphone,
            'peran' => $data['peran'],
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