<?php

namespace App\Http\Controllers;

use Storage;
use App\Kategori;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class KategoriController extends BaseController
{
    function form() {
        return view('kategori.form', ['selected' => 'Kelas']);
    }

    function tambah(Request $req) {
        $data = $req->all();

        Kategori::create([
            "nama" => $data['nama']
        ]);

        return redirect('/kelas');
    }
}