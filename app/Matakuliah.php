<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matakuliah extends Model
{
    use SoftDeletes;
    protected $table = "jadwal";
    protected $fillable = ['id_matkul', 'id_dosen','id_jurusan', 'jenis_kelas', 'hari', 'jam_mulai', 'jam_selesai'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'id_semester', 'id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }

    public function matkul()
    {
        return $this->belongsTo(NamaMatkul::class, 'id_matkul', 'id');
    }
}