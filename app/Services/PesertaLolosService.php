<?php

namespace App\Services;

use App\Models\PesertaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaLolosService
{
    public function getAllActiveLolos()
    {
        return PesertaModel::where('status', 1)
            ->where('status_lolos', 1)
            ->orderByDesc('tanggal_pendaftaran')
            ->get();
    }

    public function getById($id)
    {
        return PesertaModel::where('id', $id)
            ->where('status', 1)
            ->where('status_lolos', 1)
            ->firstOrFail();
    }

    public function validatePesertaLolosData(Request $request)
    {
        return $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:100',
        ], [
            'nama.required' => 'Nama peserta harus diisi.',
            'email.required' => 'Email harus diisi.',
        ]);
    }
}
