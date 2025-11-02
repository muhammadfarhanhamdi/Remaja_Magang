<?php

namespace App\Services;

use App\Models\EsaiModel;
use Illuminate\Http\Request;

class PenilaianEsaiBelumService
{
    public function getAllBelumDinilai()
    {
        return EsaiModel::where('status', 1)
            ->whereNull('user_update') 
            ->with('peserta') 
            ->orderByDesc('tanggal_input') 
            ->get();
    }

    public function getById($id)
    {
        return EsaiModel::where('id', $id)
            ->where('status', 1)
            ->whereNull('user_update')
            ->with('peserta')
            ->firstOrFail();
    }
}
