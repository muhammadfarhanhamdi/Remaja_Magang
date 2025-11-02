<?php

namespace App\Http\Controllers;

use App\Services\HasilPenilaianService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HasilPenilaianController extends Controller
{
    protected $service;

    public function __construct(HasilPenilaianService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $hasil_penilaian = $this->service->getAllActive();
        return view('admin.hasil_penilaian.index', compact('hasil_penilaian'));
    }

    public function create()
    {
        return view('admin.hasil_penilaian.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->service->validateHasilPenilaianData($request);
            $hasil = $this->service->createHasilPenilaian($validated);

            Alert::success('Berhasil', 'Data Hasil Penilaian berhasil ditambahkan.');
            return redirect()->route('admin.hasil_penilaian.edit', $hasil->id);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $hasil_penilaian = $this->service->getById($id);
        return view('admin.hasil_penilaian.edit', compact('hasil_penilaian'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->service->validateHasilPenilaianData($request);
            $this->service->updateHasilPenilaian($id, $validated);

            Alert::success('Berhasil', 'Data Hasil Penilaian berhasil diperbarui.');
            return redirect()->route('admin.hasil_penilaian.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->softDeleteHasilPenilaian($id);
            Alert::success('Berhasil', 'Data Hasil Penilaian berhasil dihapus.');
            return redirect()->route('admin.hasil_penilaian.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}