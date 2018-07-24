<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';
    protected $primaryKey = 'id_materi';
    public $timestamps = false;

    protected $fillable = ['nama', 'video', 'id_kelas'];
}
