<?php

namespace App\Http\Controllers;

use App\Services\PesertaLolosService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PesertaLolosController extends Controller
{
    protected $service;

    public function __construct(PesertaLolosService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $peserta_lolos = $this->service->getAllActiveLolos();
        return view('admin.peserta_lolos.index', compact('peserta_lolos'));
    }

    public function edit($id)
    {
        try {
            $peserta = $this->service->getById($id);
            // Anda dapat mengarahkan ke halaman edit Peserta utama atau view detail khusus
            return view('admin.peserta_lolos.edit', compact('peserta')); 
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Data peserta lolos tidak ditemukan: ' . $e->getMessage());
            return back();
        }
    }
}
