<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    protected $table = 'jadwal'; // nama tabel

    protected $fillable = [
        'hari',
        'jam_mulai',
        'jam_selesai',
        'sesi_id',
        'mata_kuliah_id',
        'dosen_id'
    ];

    public function sesi()
    {
        return $this->belongsTo(sesi::class, 'sesi_id', 'id');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(mata_kuliah::class, 'mata_kuliah_id', 'id');
    }
}
