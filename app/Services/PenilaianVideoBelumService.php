<?php

namespace App\Services;

use App\Models\PesertaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianVideoBelumService
{
    public function getAllBelumDinilai(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        return PesertaModel::whereYear('tanggal_pendaftaran', $tahun)
            ->where('status', 1)
            ->where('status_video', 0)
            ->orderByDesc('nilai_total')
            ->paginate(20);
    }

    public function getById($id)
    {
        return PesertaModel::with('dataVideo')
            ->where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function updatePenilaianVideo($id, array $data)
    {
        $peserta = PesertaModel::findOrFail($id);
        
        $peserta->update([
            'nilai_video' => $data['nilai_video'],
            'status_durasi_video' => $data['status_durasi_video'] ?? 0,
            'status_lokasi_video' => $data['status_lokasi_video'] ?? 0,
            'catatan_video' => $data['catatan_video'] ?? null,
            'user_video' => Auth::check() ? Auth::user()->name : 'system',
            'status_video' => 1,
        ]);

        return $peserta;
    }
}