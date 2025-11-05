<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\PesertaModel;
use App\Models\KriteriaModel;

class HasilPenilaianModel extends Model
{
    use HasFactory;

    protected $table = 'pengguna_total';
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

    public function kriteria()
    {
        return $this->belongsTo(KriteriaModel::class, 'id_kriteria', 'id');
    }
}

