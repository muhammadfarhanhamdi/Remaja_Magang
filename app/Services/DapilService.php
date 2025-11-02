<?php

namespace App\Services;

use App\Models\DapilModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DapilService
{
    public function getAllActive()
    {
        return DapilModel::orderByDesc('id_dapil')
            ->get();
    }

    public function getById($id)
    {
        return DapilModel::where('id', $id)
            ->firstOrFail();
    }

    public function validateDapilData(Request $request)
    {
        return $request->validate([
            'id_kabupaten' => 'required|integer',
            'kabupaten' => 'required|string|max:255',
            'id_provinsi' => 'required|integer',
            'provinsi' => 'required|string|max:255',
            'id_dapil' => 'required|integer',
            'dapil' => 'required|string|max:255',
        ], [
            'id_kabupaten.required' => 'ID Kabupaten harus diisi.',
            'kabupaten.required' => 'Nama Kabupaten harus diisi.',
            'id_provinsi.required' => 'ID Provinsi harus diisi.',
            'provinsi.required' => 'Nama Provinsi harus diisi.',
            'id_dapil.required' => 'ID Dapil harus diisi.',
            'dapil.required' => 'Nama Dapil harus diisi.',
        ]);
    }

    public function createDapil(array $data)
    {
        return DapilModel::create([
            'id_kabupaten' => $data['id_kabupaten'],
            'kabupaten' => $data['kabupaten'],
            'id_provinsi' => $data['id_provinsi'],
            'provinsi' => $data['provinsi'],
            'id_dapil' => $data['id_dapil'],
            'dapil' => $data['dapil'],
            'user_input' => Auth::check() ? Auth::user()->username : 'system',
        ]);
    }

    public function updateDapil($id, array $data)
    {
        $dapil = DapilModel::findOrFail($id);
        $dapil->update([
            'id_kabupaten' => $data['id_kabupaten'],
            'kabupaten' => $data['kabupaten'],
            'id_provinsi' => $data['id_provinsi'],
            'provinsi' => $data['provinsi'],
            'id_dapil' => $data['id_dapil'],
            'dapil' => $data['dapil'],
        ]);

        return $dapil;
    }

    public function softDeleteDapil($id)
    {
        $dapil = DapilModel::findOrFail($id);
        return $dapil; 
    }
}
