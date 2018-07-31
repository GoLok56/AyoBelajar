<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriKelasPelajar extends Model
{
    protected $table = 'materikelaspelajar';

    public $timestamps = false;

    protected $fillable = ['id_kelas_pelajar', 'id_materi', 'status'];

    public function materi() {
      return $this->belongsTo('App\Materi', 'id_materi', 'id_materi');
    }
}
