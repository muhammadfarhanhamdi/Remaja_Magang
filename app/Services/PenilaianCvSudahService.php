<?php

namespace App\Services;

use App\Models\PesertaModel; 
use Illuminate\Http\Request;

class PenilaianCvSudahService
{
    public function getAllSudahDinilai()
    {
        return PesertaModel::where('status', 1)
            ->where('status_cv', 1)
            ->orderByDesc('tanggal_update')
            ->get();
    }

    public function getById($id)
    {
        return PesertaModel::where('id', $id)
            ->where('status', 1)
            ->where('status_cv', 1)
            ->firstOrFail();
    }
}