<?php

namespace App\Services;

use App\Models\KegiatanModel;
use App\Models\ArsipModel;
use App\Models\NotaDinasRevisiModel; 
use App\Models\LaporanKustomModel; 

class DashboardService
{
    public function getSummaryStats()
    {
        
        $totalKegiatan = KegiatanModel::where('status', 1)->count();
        $totalArsip = ArsipModel::where('status', 1)->count();
        $totalNota = NotaDinasRevisiModel::where('status', 1)->count();
        $totalLaporanKustom = LaporanKustomModel::where('status', 1)->count();

        return [
            [
                'title' => 'Total Kegiatan Referensi',
                'count' => $totalKegiatan,
                'icon' => 'ri-calendar-event-line',
                'color' => 'bg-primary'
            ],
            [
                'title' => 'Total Arsip Dokumen',
                'count' => $totalArsip,
                'icon' => 'ri-archive-line',
                'color' => 'bg-info'
            ],
            [
                'title' => 'Total Nota Dinas / Surat',
                'count' => $totalNota,
                'icon' => 'ri-mail-line',
                'color' => 'bg-warning'
            ],
            [
                'title' => 'Total Laporan Kustom',
                'count' => $totalLaporanKustom,
                'icon' => 'ri-line-chart-line',
                'color' => 'bg-success'
            ]
        ];
    }
}