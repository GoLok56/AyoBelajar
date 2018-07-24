<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    public $timestamps = false;

    protected $fillable = ['nama', 'biografi', 'poto_profil', 'email', 'password', 'tipe'];

    public function kelas() {
        return $this->belongsToMany("App\Kelas", 'kelaspelajar', 'id_pengguna', 'id_kelas');
    }
}
