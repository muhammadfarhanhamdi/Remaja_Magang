<?php

namespace App\Http\Controllers;

use App\Services\PenilaianEsaiSudahService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\PesertaModel;
use App\Models\DataEsaiModel;

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
            $data = $this->service->getDetailById($id);

            return view('admin.penilaian_esai_sudah.show', [
                'peserta' => $data['peserta'],
                'esai' => $data['esai']
            ]);

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data peserta atau esai tidak ditemukan: ' . $e->getMessage());
            return back();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->batalkanPenilaian($id);
            Alert::success('Berhasil', 'Penilaian esai telah dibatalkan dan dikembalikan ke daftar "Belum Dinilai".');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat membatalkan: ' . $e->getMessage());
        }
        
        return redirect()->route('admin.penilaian_esai_sudah.index');
    }
}