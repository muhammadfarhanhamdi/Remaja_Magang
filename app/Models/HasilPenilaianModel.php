<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class HasilPenilaianModel extends Model
{
    use HasFactory;

    // protected $connection = 'db_parja';
    protected $table = 'pengguna';
    protected $primaryKey = 'id';

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'bobot' => 'integer',
        'skor' => 'float',
        'nilai' => 'float',
        'tanggal_input' => 'datetime',
        'tanggal_update' => 'datetime',
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

    public function peserta()
    {
        return $this->belongsTo(PesertaModel::class, 'id_pengguna', 'id');
    }

    // public function kriteria()
    // {
    //     return $this->belongsTo(KriteriaModel::class, 'id_kriteria', 'id');
    // }
}