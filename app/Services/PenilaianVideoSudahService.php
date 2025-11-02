<?php

namespace App\Services;

use App\Models\VideoModel;
use Illuminate\Http\Request;

class PenilaianVideoSudahService
{
    public function getAllSudahDinilai()
    {
        return VideoModel::where('status', 1)
            ->whereNotNull('user_update') 
            ->with('peserta') 
            ->orderByDesc('tanggal_update') 
            ->get();
    }

    public function getById($id)
    {
        return VideoModel::where('id', $id)
            ->where('status', 1)
            ->whereNotNull('user_update')
            ->with('peserta')
            ->firstOrFail();
    }
}