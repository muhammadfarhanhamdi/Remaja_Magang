<?php

namespace App\Http\Controllers;

use App\Services\PenilaianVideoBelumService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenilaianVideoBelumController extends Controller
{
    protected $service;

    public function __construct(PenilaianVideoBelumService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $video_belum = $this->service->getAllBelumDinilai();
        return view('admin.penilaian_video_belum.index', compact('video_belum'));
    }

    public function edit($id)
    {
        try {
            $video = $this->service->getById($id);
            
            return view('admin.penilaian_video_belum.edit', compact('video')); 

        } catch (\Exception $e) {
            Alert::error('Gagal', 'Video tidak ditemukan atau sudah dinilai: ' . $e->getMessage());
            return back();
        }
    }
}