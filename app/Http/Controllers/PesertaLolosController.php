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

    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        $peserta_lolos = $this->service->getAllActiveLolos($request);
        return view('admin.peserta_lolos.index', compact('peserta_lolos', 'tahun'));
    }
}