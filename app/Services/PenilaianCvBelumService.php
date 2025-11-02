<?php

namespace App\Services;

use App\Models\PesertaModel;
use Illuminate\Http\Request;

class PenilaianCvBelumService
{
    public function getAllBelumDinilai()
    {
        return PesertaModel::where('status', 1)
            ->where('status_cv', 0) 
            ->orderByDesc('tanggal_input') 
            ->get();
    }

    public function getById($id)
    {
        return PesertaModel::where('id', $id)
            ->where('status', 1)
            ->where('status_cv', 0)
            ->firstOrFail();
    }
}