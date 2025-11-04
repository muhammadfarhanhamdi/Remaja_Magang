<?php

namespace App\Http\Controllers;

use App\Services\PenilaianVideoSudahService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianVideoSudahController extends Controller
{
    protected $service;

    public function __construct(PenilaianVideoSudahService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        $peserta_video_sudah = $this->service->getAllSudahDinilai($request);
        
        return view('admin.penilaian_video_sudah.index', compact('peserta_video_sudah', 'tahun'));
    }

    public function show($id)
    {
        try {
            $peserta = $this->service->getById($id);
            
            return redirect()->route('admin.penilaian_video_belum.edit', $peserta->id);

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data Hasil Penilaian Video tidak ditemukan: ' . $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->batalPenilaian($id);
            Alert::success('Berhasil', 'Penilaian Video telah dibatalkan. Peserta dikembalikan ke daftar "Belum Dinilai".');
            return redirect()->route('admin.penilaian_video_sudah.index');

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}
