<?php

namespace App\Http\Controllers;

use App\Services\PenilaianService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianController extends Controller
{
    protected $service;

    public function __construct(PenilaianService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $penilaian = $this->service->getAllActive();
        return view('admin.penilaian.index', compact('penilaian'));
    }

    public function create()
    {
        // Biasanya di sini akan memuat daftar Pengguna dan Skoring untuk dipilih
        return view('admin.penilaian.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->service->validatePenilaianData($request);
            $penilaian = $this->service->createPenilaian($validated);

            Alert::success('Berhasil', 'Data Penilaian berhasil ditambahkan.');
            return redirect()->route('admin.penilaian.edit', $penilaian->id);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $penilaian = $this->service->getById($id);
        return view('admin.penilaian.edit', compact('penilaian'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->service->validatePenilaianData($request);
            $this->service->updatePenilaian($id, $validated);

            Alert::success('Berhasil', 'Data Penilaian berhasil diperbarui.');
            return redirect()->route('admin.penilaian.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->softDeletePenilaian($id);
            Alert::success('Berhasil', 'Data Penilaian berhasil dihapus.');
            return redirect()->route('admin.penilaian.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}