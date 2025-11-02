<?php

namespace App\Services;

use App\Models\PesertaModel;
use Illuminate\Http\Request;

class PesertaLolosSeleksiService
{
    public function getAllActiveLolosSeleksi()
    {
        return PesertaModel::where('status', 1)
            ->where('status_lolos', 1)
            ->orderByDesc('nilai_total')
            ->get();
    }

    public function getById($id)
    {
        return PesertaModel::where('id', $id)
            ->where('status', 1)
            ->where('status_lolos', 1)
            ->firstOrFail();
    }

}