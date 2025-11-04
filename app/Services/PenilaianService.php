<?php

namespace App\Services;

use App\Models\PenilaianModel;
use App\Models\PesertaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianService
{
    public function getAllActive(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        return PesertaModel::with([ 
            'penilaian' => function ($query) {
                $query->where('status', 1); 
            },
            'dapil' 
        ])
            ->whereYear('tanggal_pendaftaran', $tahun) 
            ->where('status', 1)     
            ->orderBy('nama', 'asc')
            ->paginate(20); 
    }

    public function getById($id)
    {
        return PenilaianModel::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function validatePenilaianData(Request $request)
    {
        return $request->validate([
            'id_pengguna' => 'required|integer|exists:pengguna,id', 
            'id_skoring' => 'required|integer|exists:skoring,id',   
            'bobot' => 'required|numeric',
            'skor' => 'required|numeric',
            'nilai' => 'required|numeric',
        ], [
            'id_pengguna.required' => 'ID Peserta harus diisi.',
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