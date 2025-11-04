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

    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        $peserta_esai_belum = $this->service->getAllBelumDinilai($request);
        
        return view('admin.penilaian_esai_belum.index', compact('peserta_esai_belum', 'tahun'));
    }

    public function edit($id)
    {
        try {
            $peserta = $this->service->getById($id);
            
            return view('admin.penilaian_esai_belum.edit', compact('peserta')); 

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Peserta tidak ditemukan: ' . $e->getMessage());
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nilai_esai' => 'required|numeric|min:0|max:100',
            'nilai_turnitin' => 'required|numeric|min:0|max:100',
            'catatan_esai' => 'nullable|string|max:1000',
        ]);

        try {
            $this->service->updatePenilaianEsai($id, $validated);

            Alert::success('Berhasil', 'Esai peserta telah berhasil dinilai.');
            return redirect()->route('admin.penilaian_esai_belum.index');

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}