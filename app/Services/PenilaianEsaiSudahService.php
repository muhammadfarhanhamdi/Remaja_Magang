<?php

namespace App\Services;

use App\Models\PesertaModel; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianEsaiSudahService
{
    public function getAllSudahDinilai(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        return PesertaModel::whereYear('tanggal_pendaftaran', $tahun)
            ->where('status', 1)
            ->where('status_esai', 1)
            ->orderByDesc('nilai_esai') 
            ->paginate(20);
    }

    public function getById($id)
    {
        return PesertaModel::where('id', $id)
            ->where('status', 1)
            ->where('status_esai', 1)
            ->firstOrFail();
    }

    public function batalPenilaian($id)
    {
        $peserta = PesertaModel::findOrFail($id);
        
        $peserta->update([
            'nilai_esai' => null,
            'catatan_esai' => null,
            'user_esai' => null,
            'nilai_turnitin' => 0,
            'status_esai' => 0,
        ]);

        return $peserta;
    }
}
