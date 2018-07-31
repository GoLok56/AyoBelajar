<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';
    protected $primaryKey = 'id_materi';
    public $timestamps = false;

    protected $fillable = ['nama', 'foto', 'video', 'id_kelas'];

    public function kelas() {
      return $this->belongsTo('App\Kelas', 'id_kelas', 'id_kelas');
    }
}
