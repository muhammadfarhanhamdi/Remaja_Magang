<?php

namespace App\Services;

use App\Models\PesertaModel; // <-- DIUBAH
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianEsaiBelumService
{
    public function getAllBelumDinilai(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        return PesertaModel::whereYear('tanggal_pendaftaran', $tahun)
            ->where('status', 1)
            ->where('status_esai', 0)
            ->orderByDesc('nilai_total')
            ->paginate(20);
    }

    public function getById($id)
    {
        return PesertaModel::with('dataEsai') 
            ->where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function updatePenilaianEsai($id, array $data)
    {
        $peserta = PesertaModel::findOrFail($id);
        
        $peserta->update([
            'nilai_esai' => $data['nilai_esai'],
            'nilai_turnitin' => $data['nilai_turnitin'],
            'catatan_esai' => $data['catatan_esai'] ?? null,
            'user_esai' => Auth::check() ? Auth::user()->name : 'system',
            'status_esai' => 1, 
        ]);

        return $peserta;
    }
}