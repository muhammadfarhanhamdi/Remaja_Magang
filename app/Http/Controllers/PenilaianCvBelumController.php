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
            'nilai_cv' => 'required|numeric|min:0|max:100',
            'catatan_cv' => 'nullable|string|max:1000',
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