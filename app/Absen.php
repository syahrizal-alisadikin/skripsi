<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absen extends Model
{
    protected $table = "absen";
    protected $fillable = ['id_jadwal', 'id_dosen', 'keterangan', 'alesan', 'tanggal', 'jam_masuk', 'jam_keluar'];

    public function jadwal()
    {
        return $this->BelongsTo(Matakuliah::class, 'id_jadwal', 'id');
    }
}
