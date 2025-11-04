<?php

namespace App\Services;

use App\Models\PesertaModel;
use Illuminate\Http\Request;

class PesertaLolosSeleksiService
{
    public function getAllActiveLolosSeleksi(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        return PesertaModel::whereYear('tanggal_pendaftaran', $tahun)
            ->where('status', 1)
            ->where('status_lolos', 1)
            ->orderByDesc('nilai_total')
            ->paginate(20);
    }

    public function getById($id)
    {
        return PesertaModel::where('id', $id)
            ->where('status', 1)
            ->where('status_lolos', 1)
            ->firstOrFail();
    }
}