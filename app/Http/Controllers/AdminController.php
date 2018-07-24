<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminController extends BaseController
{
    function backup() {
        $date = date("d-m-y");
        exec('mysqldump -u root ayobelajar --result-file="F:\Kuliah\Semester 4\Sistem Basis Data\Tugas Besar\AyoBelajar\backup\AyoBelajar_' . $date . '.sql"');

        return redirect('/');
    }

    function restore() {
        return view('admin.restore', [ 'selected' => 'Home' ]);
    }

    function doRestore(Request $req) {
        exec('mysql -u root ayobelajar < ' . $req->file('restore')->path());

        return redirect('/');
    }
}