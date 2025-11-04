<?php

namespace App\Services;

use App\Models\DapilModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DapilService
{
    private function getProvincesData()
    {
        return [
            ['id' => 11, 'name' => 'Aceh'], ['id' => 12, 'name' => 'Sumatera Utara'],
            ['id' => 13, 'name' => 'Sumatera Barat'], ['id' => 14, 'name' => 'Riau'],
            ['id' => 15, 'name' => 'Jambi'], ['id' => 16, 'name' => 'Sumatera Selatan'],
            ['id' => 17, 'name' => 'Bengkulu'], ['id' => 18, 'name' => 'Lampung'],
            ['id' => 19, 'name' => 'Kepulauan Bangka Belitung'], ['id' => 21, 'name' => 'Kepulauan Riau'],
            ['id' => 31, 'name' => 'DKI Jakarta'], ['id' => 32, 'name' => 'Jawa Barat'],
            ['id' => 33, 'name' => 'Jawa Tengah'], ['id' => '34', 'name' => 'DI Yogyakarta'],
            ['id' => 35, 'name' => 'Jawa Timur'], ['id' => 36, 'name' => 'Banten'],
            ['id' => 51, 'name' => 'Bali'], ['id' => 52, 'name' => 'Nusa Tenggara Barat'],
            ['id' => 53, 'name' => 'Nusa Tenggara Timur'], ['id' => 61, 'name' => 'Kalimantan Barat'],
            ['id' => 62, 'name' => 'Kalimantan Tengah'], ['id' => 63, 'name' => 'Kalimantan Selatan'],
            ['id' => 64, 'name' => 'Kalimantan Timur'], ['id' => 65, 'name' => 'Kalimantan Utara'],
            ['id' => 71, 'name' => 'Sulawesi Utara'], ['id' => 72, 'name' => 'Sulawesi Tengah'],
            ['id' => 73, 'name' => 'Sulawesi Selatan'], ['id' => 74, 'name' => 'Sulawesi Tenggara'],
            ['id' => 75, 'name' => 'Gorontalo'], ['id' => 76, 'name' => 'Sulawesi Barat'],
            ['id' => 81, 'name' => 'Maluku'], ['id' => 82, 'name' => 'Maluku Utara'],
            ['id' => 91, 'name' => 'Papua'], ['id' => 92, 'name' => 'Papua Barat'],
            ['id' => 93, 'name' => 'Papua Selatan'], ['id' => 94, 'name' => 'Papua Tengah'],
            ['id' => 95, 'name' => 'Papua Pegunungan'], ['id' => 96, 'name' => 'Papua Barat Daya'],
        ];
    }
    
    public function getProvinces()
    {
        return $this->getProvincesData();
    }
    
    public function getAllActive()
    {
        // PERBAIKAN: Hapus where('status', 1)
        return DapilModel::orderByDesc('id_dapil')
            ->get();
    }

    public function getById($id)
    {
        return DapilModel::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function validateDapilData(Request $request)
    {
        return $request->validate([
            'id_provinsi' => 'required|string', 
            'id_kabupaten' => 'required|integer',
            'kabupaten' => 'required|string|max:255',
            'id_dapil' => 'required|integer',
            'dapil' => 'required|string|max:255',
        ], [
            'id_provinsi.required' => 'Provinsi harus dipilih.',
            'id_kabupaten.required' => 'ID Kabupaten harus diisi.',
            'kabupaten.required' => 'Nama Kabupaten harus diisi.',
            'id_dapil.required' => 'ID Dapil harus diisi.',
            'dapil.required' => 'Nama Dapil harus diisi.',
        ]);
    }

    private function processProvinceData(array $data)
    {
        list($id_provinsi, $provinsi) = explode('|', $data['id_provinsi']);
        
        $data['id_provinsi'] = (int) $id_provinsi;
        $data['provinsi'] = $provinsi;
        $data['No'] = $data['No'] ?? 0;

        return $data;
    }

    public function createDapil(array $data)
    {
        $processedData = $this->processProvinceData($data);

        return DapilModel::create([
            'No' => $processedData['No'],
            'id_kabupaten' => $processedData['id_kabupaten'],
            'kabupaten' => $processedData['kabupaten'],
            'id_provinsi' => $processedData['id_provinsi'],
            'provinsi' => $processedData['provinsi'],
            'id_dapil' => $processedData['id_dapil'],
            'dapil' => $processedData['dapil'],
            'status' => 1,
        ]);
    }

    public function updateDapil($id, array $data)
    {
        $dapil = DapilModel::findOrFail($id);
        $processedData = $this->processProvinceData($data);

        $dapil->update([
            'No' => $processedData['No'],
            'id_kabupaten' => $processedData['id_kabupaten'],
            'kabupaten' => $processedData['kabupaten'],
            'id_provinsi' => $processedData['id_provinsi'],
            'provinsi' => $processedData['provinsi'],
            'id_dapil' => $processedData['id_dapil'],
            'dapil' => $processedData['dapil'],
        ]);

        return $dapil;
    }

    public function softDeleteDapil($id)
    {
        $dapil = DapilModel::findOrFail($id);
        $dapil->update([
            'status' => 9,
        ]);

        return $dapil;
    }
}