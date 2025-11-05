<?php

namespace App\Services;

use App\Models\PesertaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianEsaiSudahService
{
    public function getAllSudahDinilai(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        return PesertaModel::whereYear('tanggal_pendaftaran', $tahun)
            ->where('status', 1)
            ->where('status_esai', 1)
            ->orderBy('nilai_esai', 'DESC')
            ->paginate(20);
    }

    public function getDetailById($id)
    {
        $peserta = PesertaModel::where('id', $id)
            ->where('status_esai', 1)
            ->firstOrFail();

        $esai = $peserta->dataEsai; 

        if (!$esai) {
             $esai = new \stdClass();
             $esai->judul = 'Data Esai Tidak Ditemukan';
             $esai->isi = '';
             $esai->daftar_pustaka = '';
        }

        return [
            'peserta' => $peserta,
            'esai' => $esai
        ];
    }

    public function batalkanPenilaian($id)
    {
        $peserta = PesertaModel::findOrFail($id);

        $peserta->update([
            'status_esai' => 0,
            'user_esai' => null,
            'catatan_esai' => null,
            'nilai_esai' => 0,
            'orisinalitas' => 0,
            'kesesuaian_tema' => 0,
            'eksplorasi_tema' => 0,
            'keterkaitan_dpr' => 0,
            'proporsionalitas' => 0,
            'gaya_penulisan' => 0,
            'referensi' => 0,
        ]);

        return $peserta;
    }
}