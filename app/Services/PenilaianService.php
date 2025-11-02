<?php

namespace App\Services;

use App\Models\PenilaianModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianService
{
    public function getAllActive()
    {
        // Mengambil semua data penilaian aktif
        return PenilaianModel::where('status', 1)
            ->orderByDesc('tanggal_input')
            ->get();
    }

    public function getById($id)
    {
        return PenilaianModel::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function validatePenilaianData(Request $request)
    {
        // Validasi dasar untuk kolom kunci di pengguna_nilai
        return $request->validate([
            'id_pengguna' => 'required|integer|exists:pengguna,id', // Memastikan ID pengguna ada
            'id_skoring' => 'required|integer|exists:skoring,id',   // Memastikan ID skoring ada
            'bobot' => 'required|numeric',
            'skor' => 'required|numeric',
            'nilai' => 'required|numeric',
        ], [
            'id_pengguna.required' => 'ID Pengguna harus diisi.',
            'id_skoring.required' => 'ID Skoring harus diisi.',
            'bobot.required' => 'Bobot harus diisi.',
            'skor.required' => 'Skor harus diisi.',
            'nilai.required' => 'Nilai harus diisi.',
        ]);
    }

    public function createPenilaian(array $data)
    {
        return PenilaianModel::create([
            'id_pengguna' => $data['id_pengguna'],
            'id_skoring' => $data['id_skoring'],
            'bobot' => $data['bobot'],
            'skor' => $data['skor'],
            'nilai' => $data['nilai'],
            'status' => 1,
        ]);
    }

    public function updatePenilaian($id, array $data)
    {
        $penilaian = PenilaianModel::findOrFail($id);
        $penilaian->update([
            'id_pengguna' => $data['id_pengguna'],
            'id_skoring' => $data['id_skoring'],
            'bobot' => $data['bobot'],
            'skor' => $data['skor'],
            'nilai' => $data['nilai'],
        ]);

        return $penilaian;
    }

    public function softDeletePenilaian($id)
    {
        $penilaian = PenilaianModel::findOrFail($id);
        $penilaian->update([
            'status' => 9, 
        ]);

        return $penilaian;
    }
}