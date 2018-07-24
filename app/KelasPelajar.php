<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelasPelajar extends Model
{
    protected $table = 'kelaspelajar';
    protected $primaryKey = 'id_kelas_pelajar';
    public $timestamps = false;

    protected $fillable = ['id_pengguna', 'id_kelas', 'tanggal_mulai', 'status'];
}
