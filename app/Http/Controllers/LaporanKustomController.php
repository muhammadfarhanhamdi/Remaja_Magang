<?php

namespace App\Http\Controllers;

use App\Services\LaporanKustomService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanKustomController extends Controller
{
    protected $service;

    public function __construct(LaporanKustomService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $laporan = $this->service->getAllActive();
        return view('admin.laporan_kustom.index', compact('laporan'));
    }

    public function create()
    {
        return view('admin.laporan_kustom.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->service->validateLaporanData($request);
            $laporan = $this->service->createLaporan($validated);
            Alert::success('Berhasil', 'Laporan Kustom berhasil ditambahkan.');
            return redirect()->route('admin.laporan_kustom.edit', $laporan->id);

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $data = $this->service->getDataForLaporanView($id);

        return view('admin.laporan_kustom.edit', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->service->validateLaporanData($request);
            $this->service->updateLaporan($id, $validated);

            Alert::success('Berhasil', 'Laporan Kustom berhasil diperbarui.');
            
            return redirect()->route('admin.laporan_kustom.index');

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }
    
    public function lihat($id)
    {
        $data = $this->service->getDataForLaporanView($id);

        if ($data['queryError']) {
            Alert::error('Gagal', 'Gagal menjalankan query: ' . $data['queryError']);
            return back();
        }

        return view('admin.laporan_kustom.lihat', $data);
    }

    public function destroy($id)
    {
        try {
            $this->service->softDeleteLaporan($id);
            Alert::success('Berhasil', 'Laporan Kustom berhasil dihapus.');
            return redirect()->route('admin.laporan_kustom.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}