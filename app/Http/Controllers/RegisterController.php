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

        $path = '';
        $file = $req->file('photo');
        if($file !== null){ 
            $path = 'photos/' . $data['nama'] . '_' . $file->getClientOriginalName();
            $file->move('photos/', $path);
        }

        Pengguna::create([
            'nama' => $data['nama'],
            'biografi' => $data['biografi'],
            'foto_profil' => "photos/$path",
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tipe' => $data['tipe']
        ]);
        return redirect('/login');
    }
}
