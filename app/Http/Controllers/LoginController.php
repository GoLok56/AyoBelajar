<?php

namespace App\Http\Controllers;

use App\Pengguna;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends BaseController
{
    function index() {
        return view('login', ['selected' => 'Login']);
    }

    function login(Request $req) {
        $data = $req->all();
        
        $users = Pengguna::where('email', $data['email'])->get();
        
        foreach ($users as $user) {
            if(Hash::check($data['password'], $user->password)) {
                Session::put('login', 1);
                Session::put('userId', $user->id_pengguna);
                Session::put('userName', $user->nama);
                Session::put('userType', $user->tipe);
                Session::put('userEmail', $user->email);
                Session::put('userPhoto', $user->poto_profil);
                Session::put('userBiografi', $user->biografi);
                return [
                    'status' => 200,
                    'message' => 'Berhasil melakukan login!'
                ];
            } else {
                return [
                    'status' => 401,
                    'message' => 'Password salah!'
                ];
            }
        }

        return [
            'status' => 401,
            'message' => 'Pengguna tidak ditemukan!'
        ];
    }

    function logout() {
        Session::flush();
        return redirect('/');
    }
}
