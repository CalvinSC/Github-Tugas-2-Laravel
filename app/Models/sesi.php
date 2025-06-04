<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sesi extends Model
{
    protected $table = 'sesi'; // nama tabel

    protected $fillable = [
        'nama'
    ];

    public function jadwal()
    {
        return $this->hasMany(jadwal::class, 'sesi_id', 'id');
    }
    
}
