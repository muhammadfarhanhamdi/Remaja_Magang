<?php

namespace App\Http\Controllers;

use App\Services\PesertaService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PesertaController extends Controller
{
    protected $service;

    public function __construct(PesertaService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $peserta = $this->service->getAllActive();
        return view('admin.peserta.index', compact('peserta'));
    }

    public function create()
    {
        return view('admin.peserta.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->service->validatePesertaData($request);
            $peserta = $this->service->createPeserta($validated);

            Alert::success('Berhasil', 'Peserta berhasil ditambahkan.');
            return redirect()->route('admin.peserta.edit', $peserta->id);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $peserta = $this->service->getById($id);
        return view('admin.peserta.edit', compact('peserta'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->merge(['id' => $id]);
            $validated = $this->service->validatePesertaData($request, true);
            $this->service->updatePeserta($id, $validated);

            Alert::success('Berhasil', 'Data Peserta berhasil diperbarui.');
            return redirect()->route('admin.peserta.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->softDeletePeserta($id);
            Alert::success('Berhasil', 'Peserta berhasil dihapus.');
            return redirect()->route('admin.peserta.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}