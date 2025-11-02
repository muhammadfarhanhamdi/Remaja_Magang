<?php

namespace App\Http\Controllers;

use App\Services\PenilaianCvSudahService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianCvSudahController extends Controller
{
    protected $service;

    public function __construct(PenilaianCvSudahService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $peserta_cv_sudah = $this->service->getAllSudahDinilai();
        return view('admin.penilaian_cv_sudah.index', compact('peserta_cv_sudah'));
    }

    public function show($id)
    {
        try {
            $peserta = $this->service->getById($id);
            
            return view('admin.penilaian_cv_sudah.show', compact('peserta'));

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data Hasil Penilaian CV tidak ditemukan: ' . $e->getMessage());
            return back();
        }
    }
}