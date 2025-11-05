<?php

namespace App\Services;

use App\Models\PesertaModel;
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
        
        $nilai_esai = ($data['orisinalitas'] ?? 0) +
                      ($data['kesesuaian_tema'] ?? 0) +
                      ($data['eksplorasi_tema'] ?? 0) +
                      ($data['keterkaitan_dpr'] ?? 0) +
                      ($data['proporsionalitas'] ?? 0) +
                      ($data['gaya_penulisan'] ?? 0) +
                      ($data['referensi'] ?? 0);
        
        $peserta->update([
            'nilai_esai' => $nilai_esai,
            'nilai_turnitin' => $data['nilai_turnitin'],
            'catatan_esai' => $data['catatan_esai'] ?? null,
            'orisinalitas' => $data['orisinalitas'] ?? 0,
            'kesesuaian_tema' => $data['kesesuaian_tema'] ?? 0,
            'eksplorasi_tema' => $data['eksplorasi_tema'] ?? 0,
            'keterkaitan_dpr' => $data['keterkaitan_dpr'] ?? 0,
            'proporsionalitas' => $data['proporsionalitas'] ?? 0,
            'gaya_penulisan' => $data['gaya_penulisan'] ?? 0,
            'referensi' => $data['referensi'] ?? 0,
            'user_esai' => Auth::check() ? Auth::user()->name : 'system',
            'status_esai' => 1, 
        ]);

        return $peserta;
    }
}