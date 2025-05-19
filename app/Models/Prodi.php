<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi'; //nama tabel
    protected $fillable = [
        'nama',
        'singkatan',
        'kaprodi',
        'Sekretaris',
        'fakultas_id'
    ]; //kolom yang bisa diisi
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id');
    }
    
}
