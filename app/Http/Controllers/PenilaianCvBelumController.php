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

    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        $peserta_cv_belum = $this->service->getAllBelumDinilai($request);
        return view('admin.penilaian_cv_belum.index', compact('peserta_cv_belum', 'tahun'));
    }

    public function edit($id)
    {
        try {
            $peserta = $this->service->getById($id);
            return view('admin.penilaian_cv_belum.edit', compact('peserta')); 
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Peserta tidak ditemukan: ' . $e->getMessage());
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'catatan_cv' => 'nullable|string|max:1000',
            'nilai_turnitin' => 'nullable|numeric|min:0|max:100',
            'status_durasi_video' => 'nullable|boolean',
            'pa' => 'nullable|numeric|min:0',
            'pna' => 'nullable|numeric|min:0',
            'po' => 'nullable|numeric|min:0',
            'kk' => 'nullable|numeric|min:0',
        ]);

        try {
            $this->service->updatePenilaianCv($id, $validated);

            Alert::success('Berhasil', 'CV peserta telah berhasil dinilai.');
            return redirect()->route('admin.penilaian_cv_belum.index');

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}
