<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [
        'npm',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'asal_sma',
        'foto',
        'prodi_id'
    ];
    // kolom yang bisa diisi

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
