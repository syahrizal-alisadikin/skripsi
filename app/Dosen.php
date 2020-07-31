<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Authenticatable
{
    use Notifiable;

    // use SoftDeletes;
    protected $table = "dosen";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'kode', 'password'];

    protected $hidden = [];

    public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class, 'id_jurusan', 'id');
    }
}
