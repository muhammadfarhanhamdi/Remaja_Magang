<?php

namespace App\Services;

use App\Models\HasilPenilaianModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilPenilaianService
{
    public function getAllActive()
    {
        return HasilPenilaianModel::where('status', 1)
            ->with(['peserta', 'kriteria'])
            ->orderByDesc('tanggal_input')
            ->get();
    }

    public function getById($id)
    {
        return HasilPenilaianModel::where('id', $id)
            ->where('status', 1)
            ->with(['peserta', 'kriteria'])
            ->firstOrFail();
    }

    public function validateHasilPenilaianData(Request $request)
    {
        return $request->validate([
            'id_pengguna' => 'required|integer|exists:pengguna,id',
            'id_kriteria' => 'required|integer|exists:kriteria,id',
            'bobot' => 'required|integer',
            'skor' => 'required|numeric',
            'nilai' => 'required|numeric',
        ], [
            'id_pengguna.required' => 'ID Peserta harus diisi.',
            'id_kriteria.required' => 'ID Kriteria harus diisi.',
            'bobot.required' => 'Bobot harus diisi.',
            'skor.required' => 'Skor harus diisi.',
            'nilai.required' => 'Nilai harus diisi.',
        ]);
    }

    public function createHasilPenilaian(array $data)
    {
        return HasilPenilaianModel::create([
            'id_pengguna' => $data['id_pengguna'],
            'id_kriteria' => $data['id_kriteria'],
            'bobot' => $data['bobot'],
            'skor' => $data['skor'],
            'nilai' => $data['nilai'],
            'status' => 1,
        ]);
    }

    public function updateHasilPenilaian($id, array $data)
    {
        $hasil = HasilPenilaianModel::findOrFail($id);
        $hasil->update([
            'id_pengguna' => $data['id_pengguna'],
            'id_kriteria' => $data['id_kriteria'],
            'bobot' => $data['bobot'],
            'skor' => $data['skor'],
            'nilai' => $data['nilai'],
        ]);

        return $hasil;
    }

    public function softDeleteHasilPenilaian($id)
    {
        $hasil = HasilPenilaianModel::findOrFail($id);
        $hasil->update([
            'status' => 9,
        ]);

        return $hasil;
    }
}