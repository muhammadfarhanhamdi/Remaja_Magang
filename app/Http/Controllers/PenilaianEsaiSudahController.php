<?php

namespace App\Http\Controllers;

use App\Services\PenilaianEsaiSudahService;
use App\Models\PesertaModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianEsaiSudahController extends Controller
{
    protected $service;

    public function __construct(PenilaianEsaiSudahService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $esai_sudah = $this->service->getAllSudahDinilai();
        return view('admin.penilaian_esai_sudah.index', compact('esai_sudah'));
    }

    public function show($id)
    {
        try {
            $esai = $this->service->getById($id);
            
            $peserta = PesertaModel::find($esai->id_pengguna);

            return view('admin.penilaian_esai_sudah.show', compact('esai', 'peserta'));

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data Hasil Penilaian Esai tidak ditemukan: ' . $e->getMessage());
            return back();
        }
    }
}
