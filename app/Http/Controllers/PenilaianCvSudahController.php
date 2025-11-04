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

    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        $peserta_cv_sudah = $this->service->getAllSudahDinilai($request);
        
        return view('admin.penilaian_cv_sudah.index', compact('peserta_cv_sudah', 'tahun'));
    }

    public function show($id)
    {
        try {
            $peserta = $this->service->getById($id);
            
            return redirect()->route('admin.penilaian_cv_belum.edit', $peserta->id);

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data Hasil Penilaian CV tidak ditemukan: ' . $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->batalPenilaian($id);
            Alert::success('Berhasil', 'Penilaian CV telah dibatalkan. Peserta dikembalikan ke daftar "Belum Dinilai".');
            return redirect()->route('admin.penilaian_cv_sudah.index');

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}