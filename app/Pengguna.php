<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    public $timestamps = false;

    protected $fillable = ['nama', 'biografi', 'foto_profil', 'email', 'password', 'tipe'];

    public function kelas() {
        return $this->belongsToMany("App\Kelas", 'kelaspelajar', 'id_pengguna', 'id_kelas');
    }

    public function has($classId) {
        foreach ($this->kelas as $class) {
            if ($class->id_kelas === $classId) {
                return true;
            } 
        }

        return false;
    }
}
