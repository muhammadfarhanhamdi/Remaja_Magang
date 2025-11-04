<?php

namespace App\Services;

use App\Models\PesertaModel; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HasilPenilaianModel; 

class HasilPenilaianService
{
    public function getAllActive(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        return PesertaModel::whereYear('tanggal_pendaftaran', $tahun) 
            ->where('status', 1)
            ->orderByDesc('nilai_total') 
            ->paginate(20);
    }

    public function getById($id)
    {
        return HasilPenilaianModel::where('id', $id)
            ->where('status', 1)
            ->with(['peserta'])
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