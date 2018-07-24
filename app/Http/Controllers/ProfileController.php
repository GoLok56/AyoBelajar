<?php

namespace App\Http\Controllers;

use App\Pengguna;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends BaseController
{
    function index() {
        $user = Pengguna::where('id_pengguna', '=', session('userId'))->first();

        return view('profil.index', [
            'selected' => 'Profil', 
            'menu_selected' => 'Kelas Yang Saya Ikuti', 
            'user' => $user
        ]);
    }

    function payment() {
        $user = Pengguna::where('id_pengguna', '=', session('userId'))->first();

        return view('profil.payment', [
            'selected' => 'Profil', 
            'menu_selected' => 'Status Pembayaran', 
            'user' => $user
        ]);
    }

    function edit() {
        $user = Pengguna::where('id_pengguna', '=', session('userId'))->first();

        return view('profil.edit', [
            'selected' => 'Profil', 
            'menu_selected' => 'Ubah Profil', 
            'user' => $user
        ]);
    }

    function save(Request $req) {
        $data = $req->all();

        Pengguna::where('email', Session::get('user_email'))
            ->update(['nama' => $data['nama'], 'biografi' => $data['biografi']]);
        Session::put('user_name', $data['nama']);
        Session::put('user_biography', $data['biografi']);
    
        return redirect('/profil/ubah');    
    }
}
