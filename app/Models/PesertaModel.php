<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Dapil;
use App\Models\PenilaianModel;
use App\Models\PenggunaDataModel;
use App\Models\PenggunaEsaiModel;
use App\Models\PenggunaVideoModel;

class PesertaModel extends Model
{
    use HasFactory;

    // protected $connection = 'db_parja';
    protected $table = 'pengguna';
    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'tanggal_pendaftaran' => 'date',
        'credential_expire' => 'datetime',
        'tanggal_input' => 'datetime',
        'tanggal_update' => 'datetime',
        'nilai_cv' => 'float',
        'nilai_esai' => 'float',
        'nilai_video' => 'float',
        'nilai_total' => 'float',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_input = Auth::check() ? Auth::user()->username : 'system';
            $model->tanggal_input = now();
        });

        static::updating(function ($model) {
            $model->user_update = Auth::check() ? Auth::user()->username : 'system';
            $model->tanggal_update = now();
        });
    }
    public function dapil()
    {
        return $this->belongsTo(DapilModel::class, 'id_dapil'); 
    }
    public function penilaian()
    {
        return $this->hasMany(PenilaianModel::class, 'id_pengguna', 'id');
    }

    public function dataCv()
    {
        return $this->hasMany(PenggunaDataModel::class, 'id_pengguna', 'id');
    }
    
    public function dataEsai()
    {
        return $this->hasOne(PenggunaEsaiModel::class, 'id_pengguna', 'id');
    }

    public function dataVideo()
    {
        return $this->hasOne(PenggunaVideoModel::class, 'id_pengguna', 'id');
    }

}