<?php

namespace App\Services;

use App\Models\PesertaModel; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianCvSudahService
{
    public function getAllSudahDinilai(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        return PesertaModel::whereYear('tanggal_pendaftaran', $tahun)
            ->where('status', 1)
            ->where('status_cv', 1)
            ->orderByDesc('nilai_cv') 
            ->paginate(20);
    }

    public function getById($id)
    {
        return PesertaModel::where('id', $id)
            ->where('status', 1)
            ->where('status_cv', 1)
            ->firstOrFail();
    }

    public function batalPenilaian($id)
    {
        $peserta = PesertaModel::findOrFail($id);
        
        $peserta->update([
            'nilai_cv' => null,
            'catatan_cv' => null,
            'user_cv' => null,
            'status_cv' => 0,
        ]);

        return $peserta;
    }
}