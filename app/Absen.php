<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = "absen";
    protected $fillable = ['id_jadwal', 'id_dosen', 'keterangan', 'alesan', 'tanggal'];
}
