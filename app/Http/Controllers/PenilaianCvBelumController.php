<?php

namespace App\Http\Controllers;

use App\Services\PenilaianCvBelumService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianCvBelumController extends Controller
{
    protected $service;

    public function __construct(PenilaianCvBelumService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $peserta_cv_belum = $this->service->getAllBelumDinilai();
        return view('admin.penilaian_cv_belum.index', compact('peserta_cv_belum'));
    }

    public function edit($id)
    {
        try {
            $peserta = $this->service->getById($id);
            
            return view('admin.penilaian_cv_belum.edit', compact('peserta')); 
            
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Peserta tidak ditemukan atau sudah dinilai: ' . $e->getMessage());
            return back();
        }
    }
}