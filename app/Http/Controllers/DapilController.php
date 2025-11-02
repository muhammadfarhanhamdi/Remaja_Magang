<?php

namespace App\Http\Controllers;

use App\Services\DapilService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DapilController extends Controller
{
    protected $service;

    public function __construct(DapilService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $dapil = $this->service->getAllActive();
        return view('admin.dapil.index', compact('dapil'));
    }

    public function create()
    {
        return view('admin.dapil.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $this->service->validateDapilData($request);
            $dapil = $this->service->createDapil($validated);

            Alert::success('Berhasil', 'Data Dapil berhasil ditambahkan.');
            return redirect()->route('admin.dapil.edit', $dapil->id);
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $dapil = $this->service->getById($id);
        return view('admin.dapil.edit', compact('dapil'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->service->validateDapilData($request);
            $this->service->updateDapil($id, $validated);

            Alert::success('Berhasil', 'Data Dapil berhasil diperbarui.');
            return redirect()->route('admin.dapil.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->softDeleteDapil($id);
            Alert::success('Berhasil', 'Data Dapil berhasil dihapus.');
            return redirect()->route('admin.dapil.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }
}
