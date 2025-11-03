<?php

namespace App\Services;

use App\Models\PesertaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaLolosService
{
    public function getAllActiveLolos(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        return PesertaModel::whereYear('tanggal_pendaftaran', $tahun)
            ->where('status', 1)
            ->where('status_lolos', 1)
            ->orderByDesc('nilai_total') 
            ->paginate(20);
    }
}