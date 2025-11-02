<?php

namespace App\Services;

use App\Models\EsaiModel;
use Illuminate\Http\Request;

class PenilaianEsaiSudahService
{
    public function getAllSudahDinilai()
    {
        return EsaiModel::where('status', 1)
            ->whereNotNull('user_update') 
            ->with('peserta') 
            ->orderByDesc('tanggal_update') 
            ->get();
    }

    public function getById($id)
    {
        return EsaiModel::where('id', $id)
            ->where('status', 1)
            ->whereNotNull('user_update')
            ->with('peserta')
            ->firstOrFail();
    }
}
