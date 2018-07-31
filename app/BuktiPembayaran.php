<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuktiPembayaran extends Model
{
  protected $table = 'buktipembayaran';
  protected $primaryKey = 'id_bukti';
  public $timestamps = false;

  protected $fillable = ['id_kelas_pelajar','file'];

  public function pelajar() {
      return $this->belongsTo('App\KelasPelajar', 'id_kelas_pelajar', 'id_kelas_pelajar');
  }
}
