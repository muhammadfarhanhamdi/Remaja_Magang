<?php

namespace App\Http\Controllers;

use App\Services\PenilaianEsaiBelumService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianEsaiBelumController extends Controller
{
    protected $service;

    public function __construct(PenilaianEsaiBelumService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $esai_belum = $this->service->getAllBelumDinilai();
        return view('admin.penilaian_esai_belum.index', compact('esai_belum'));
    }

    public function edit($id)
    {
        try {
            $esai = $this->service->getById($id);
            
            return view('admin.penilaian_esai_belum.edit', compact('esai')); 

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Esai tidak ditemukan atau sudah dinilai: ' . $e->getMessage());
            return back();
        }
    }
}
