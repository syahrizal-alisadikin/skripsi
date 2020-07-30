<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NamaMatkul extends Model
{
    protected $table = "mata_kuliah";
    protected $fillable = ['kode', 'nama', 'sks'];

    public function nama_matkul()
    {
    	return $this->hasMany(Matakuliah::class);	
    }
}
