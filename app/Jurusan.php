<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = "jurusan";
    protected $fillable = ['name'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'id_jurusan', 'id');
    }

    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class, 'id_jurusan', 'id');
    }
}
