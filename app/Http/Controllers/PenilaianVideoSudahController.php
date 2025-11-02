<?php

namespace App\Http\Controllers;

use App\Services\PenilaianVideoSudahService;
use App\Models\PesertaModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianVideoSudahController extends Controller
{
    protected $service;

    public function __construct(PenilaianVideoSudahService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $video_sudah = $this->service->getAllSudahDinilai();
        return view('admin.penilaian_video_sudah.index', compact('video_sudah'));
    }

    public function show($id)
    {
        try {
            $video = $this->service->getById($id);
            $peserta = PesertaModel::find($video->id_pengguna);

            return view('admin.penilaian_video_sudah.show', compact('video', 'peserta'));

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data Hasil Penilaian Video tidak ditemukan: ' . $e->getMessage());
            return back();
        }
    }
}