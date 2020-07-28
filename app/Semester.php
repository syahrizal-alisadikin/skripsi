<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = "semester";
    protected $fillable = ['name'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_semester', 'id');
    }

    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class, 'id_jurusan', 'id');
    }
}
