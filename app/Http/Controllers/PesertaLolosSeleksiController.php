<?php

namespace App\Http\Controllers;

use App\Services\PesertaLolosSeleksiService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PesertaLolosSeleksiController extends Controller
{
    protected $service;

    public function __construct(PesertaLolosSeleksiService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $peserta_lolos_seleksi = $this->service->getAllActiveLolosSeleksi();
        return view('admin.peserta_lolos_seleksi.index', compact('peserta_lolos_seleksi'));
    }

    public function edit($id)
    {
        try {
            $peserta = $this->service->getById($id);
            return view('admin.peserta_lolos_seleksi.edit', compact('peserta')); 
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data peserta lolos seleksi tidak ditemukan: ' . $e->getMessage());
            return back();
        }
    }
}