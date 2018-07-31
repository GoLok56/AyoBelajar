<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasPelajar extends Model
{
    protected $table = 'kelaspelajar';
    protected $primaryKey = 'id_kelas_pelajar';
    public $timestamps = false;

    protected $fillable = ['id_pengguna', 'id_kelas', 'tanggal_mulai', 'status'];

    public function pengguna() {
        return $this->belongsTo('App\Pengguna', 'id_pengguna', 'id_pengguna');
    }

    public function kelas() {
        return $this->belongsTo('App\Kelas', 'id_kelas', 'id_kelas');
    }

    public function materi() {
        return $this->hasMany('App\Materi', 'id_kelas', 'id_kelas');
    }

    public function bukti() {
        return $this->hasOne('App\BuktiPembayaran', 'id_kelas_pelajar', 'id_kelas_pelajar');
    }
}
