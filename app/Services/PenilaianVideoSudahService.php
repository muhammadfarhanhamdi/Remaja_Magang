<?php

namespace App\Services;

use App\Models\PesertaModel; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianVideoSudahService
{
    public function getAllSudahDinilai(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        return PesertaModel::whereYear('tanggal_pendaftaran', $tahun)
            ->where('status', 1)
            ->where('status_video', 1)
            ->orderByDesc('nilai_video') 
            ->paginate(20);
    }

    public function getById($id)
    {
        return PesertaModel::where('id', $id)
            ->where('status', 1)
            ->where('status_video', 1)
            ->firstOrFail();
    }

    public function batalPenilaian($id)
    {
        $peserta = PesertaModel::findOrFail($id);
        
        $peserta->update([
            'nilai_video' => null,
            'catatan_video' => null,
            'user_video' => null,
            'status_durasi_video' => 0,
            'status_lokasi_video' => 0,
            'status_video' => 0,
        ]);

        return $peserta;
    }
}
