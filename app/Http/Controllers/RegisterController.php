<?php

namespace App\Http\Controllers;

use App\Pengguna;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends BaseController
{
    function index() {
        return view('register', ['selected' => 'Login']);
    }

    function register(Request $req) {
        $data = $req->all();

        $photo = '';
        if($data['photo'] !== null) $photo = $data['photo'];

        Pengguna::create([
            'nama' => $data['nama'],
            'biografi' => $data['biografi'],
            'poto_profil' => $photo,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tipe' => $data['tipe']
        ]);
        return redirect('/');
    }
}
