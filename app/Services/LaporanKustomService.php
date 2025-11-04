<?php

namespace App\Services;

use App\Models\LaporanKustomModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LaporanKustomService
{
    public function getDataForLaporanView($id)
    {
        $laporan = $this->getById($id);

        $results = collect();
        $columns = [];
        $queryError = null;

        try {
            $results = $this->executeQuery($laporan->sql);
            $columns = $results->isNotEmpty() ? array_keys((array) $results->first()) : [];

        } catch (\Exception $e) {
            $queryError = $e->getMessage();
        }

        return [
            'laporan' => $laporan,
            'results' => $results,
            'columns' => $columns,
            'queryError' => $queryError,
        ];
    }

    public function getAllActive()
    {
        return LaporanKustomModel::where('status', 1)
            ->orderByDesc('tanggal_input')
            ->get();
    }

    public function getById($id)
    {
        return LaporanKustomModel::where('id', $id)
            ->where('status', 1)
            ->firstOrFail();
    }

    public function validateLaporanData(Request $request)
    {
        return $request->validate([
            'judul' => 'required|string|max:255',
            'sql' => 'required|string',
        ], [
            'judul.required' => 'Judul laporan harus diisi.',
            'sql.required' => 'Query SQL harus diisi.',
        ]);
    }

    public function createLaporan(array $data)
    {
        return LaporanKustomModel::create([
            'judul' => $data['judul'],
            'sql' => $data['sql'],
            'status' => 1,
        ]);
    }

    public function updateLaporan($id, array $data)
    {
        $laporan = LaporanKustomModel::findOrFail($id);
        $laporan->update([
            'judul' => $data['judul'],
            'sql' => $data['sql'],
        ]);

        return $laporan;
    }

    public function softDeleteLaporan($id)
    {
        $laporan = LaporanKustomModel::findOrFail($id);
        $laporan->update([
            'status' => 9,
        ]);

        return $laporan;
    }

    public function executeQuery($sql)
    {
        $modelInstance = new LaporanKustomModel();
        $connection = $modelInstance->getConnectionName();
                
        try {
            $results = DB::connection($connection)->select($sql);
            return collect($results);
        } catch (\Exception $e) {
            throw new \Exception("Gagal menjalankan query: " . $e->getMessage());
        }
    }
}