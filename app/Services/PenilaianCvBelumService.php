<?php

namespace App\Services;

use App\Models\PesertaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianCvBelumService
{
    public function getAllBelumDinilai(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        return PesertaModel::whereYear('tanggal_pendaftaran', $tahun)
            ->where('status', 1)
            ->where('status_cv', 0) 
            ->orderByDesc('nilai_total') 
            ->paginate(20);
    }

    public function getById($id)
    {
        return PesertaModel::with('dataCv')
            ->where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function updatePenilaianCv($id, array $data)
    {
        $peserta = PesertaModel::findOrFail($id);
        
        $peserta->update([
            'nilai_cv' => $data['nilai_cv'],
            'catatan_cv' => $data['catatan_cv'] ?? null,
            'user_cv' => Auth::check() ? Auth::user()->name : 'system',
            'status_cv' => 1,
        ]);

        return $peserta;
    }
}