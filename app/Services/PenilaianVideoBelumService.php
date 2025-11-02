<?php

namespace App\Services;

use App\Models\VideoModel;
use Illuminate\Http\Request;

class PenilaianVideoBelumService
{
    public function getAllBelumDinilai()
    {
        return VideoModel::where('status', 1)
            ->whereNull('user_update') 
            ->with('peserta') 
            ->orderByDesc('tanggal_input') 
            ->get();
    }

    public function getById($id)
    {
        return VideoModel::where('id', $id)
            ->where('status', 1)
            ->whereNull('user_update')
            ->with('peserta')
            ->firstOrFail();
    }
}