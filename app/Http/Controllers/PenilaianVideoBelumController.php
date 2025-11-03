<?php

namespace App\Http\Controllers;

use App\Services\PenilaianVideoBelumService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianVideoBelumController extends Controller
{
    protected $service;

    public function __construct(PenilaianVideoBelumService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        $peserta_video_belum = $this->service->getAllBelumDinilai($request);
        
        return view('admin.penilaian_video_belum.index', compact('peserta_video_belum', 'tahun'));
    }

    public function edit($id)
    {
        try {
            $peserta = $this->service->getById($id);
            
            return view('admin.penilaian_video_belum.edit', compact('peserta')); 

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Peserta tidak ditemukan: ' . $e->getMessage());
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nilai_video' => 'required|numeric|min:0|max:100',
            'status_durasi_video' => 'nullable|boolean',
            'status_lokasi_video' => 'nullable|boolean',
            'catatan_video' => 'nullable|string|max:1000',
        ]);

        try {
            $this->service->updatePenilaianVideo($id, $validated);

            Alert::success('Berhasil', 'Video peserta telah berhasil dinilai.');
            return redirect()->route('admin.penilaian_video_belum.index');

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}