<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    public $timestamps = false;

    protected $fillable = ['nama', 'deskripsi', 'harga', 'tanggal_dibuat', 'poto', 'id_pengguna', 'id_kategori'];

    public function instructor() {
        return $this->belongsTo('App\Pengguna', 'id_pengguna', 'id_pengguna');
    }

    public function pelajar() {
        return $this->belongsToMany('App\Pengguna', 'kelaspelajar', 'id_kelas', 'id_pengguna');
    }
}
