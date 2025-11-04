<?php

namespace App\Http\Controllers;

use App\Services\PenilaianEsaiSudahService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianEsaiSudahController extends Controller
{
    protected $service;

    public function __construct(PenilaianEsaiSudahService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        $peserta_esai_sudah = $this->service->getAllSudahDinilai($request);
        
        return view('admin.penilaian_esai_sudah.index', compact('peserta_esai_sudah', 'tahun'));
    }

    public function show($id)
    {
        try {
            $peserta = $this->service->getById($id);
            
            return redirect()->route('admin.penilaian_esai_belum.edit', $peserta->id);

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data Hasil Penilaian Esai tidak ditemukan: ' . $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->batalPenilaian($id);
            Alert::success('Berhasil', 'Penilaian Esai telah dibatalkan. Peserta dikembalikan ke daftar "Belum Dinilai".');
            return redirect()->route('admin.penilaian_esai_sudah.index');

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}
