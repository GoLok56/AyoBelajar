<?php

namespace App\Http\Controllers;

use App\Pengguna;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends BaseController
{
    function index() {
        $user_photo = '';
        if(Session::has('user_photo')) $user_photo = Session::get('user_photo');

        $user = ['name' => Session::get('user_name'), 'image' => $user_photo];

        $classes = [
            ['title' => 'Belajar Gitar', 'image' => 'https://i2.wp.com/bukubiruku.com/wp-content/uploads/2016/10/gitar-chord-a.jpeg?resize=680%2C383&ssl=1', 'instructor' => 'Satria', 'date' => '12-12-2012', 'progress' => 70, 'start_date' => '10/10/2010'],
            ['title' => 'Piano, from zero to hero', 'image' => 'https://2.bp.blogspot.com/-PwXGW65h5Pc/VJak7OLNbAI/AAAAAAAAADI/0SC7R7I6uz4/s1600/Notasi%2BPiano.jpg', 'instructor' => 'Adi', 'date' => '10-08-2012', 'progress' => 70, 'start_date' => '10/10/2010'],
            ['title' => 'Pintar bermain drum', 'image' => 'http://4.bp.blogspot.com/-Dw-QtGrlYmk/TobiuuMBkVI/AAAAAAAABP8/-f3I8H6LTmU/s1600/Untitled.jpg', 'instructor' => 'Putra', 'date' => '12-11-2012', 'progress' => 70, 'start_date' => '10/10/2010'],
            ['title' => '7 Hari Belajar GoLang', 'image' => 'https://cdn2.hubspot.net/hubfs/3917309/old-assets/old-theme/Images/golang-gopher-laptop.png', 'instructor' => 'Satria', 'date' => '12-12-2012', 'progress' => 70, 'start_date' => '10/10/2010'],
            ['title' => 'NodeJS Sampai Jago', 'image' => 'https://cdn.colorlib.com/wp/wp-content/uploads/sites/2/nodejs-frameworks.png', 'instructor' => 'Adi', 'date' => '10-08-2012', 'progress' => 70, 'start_date' => '10/10/2010'],
            ['title' => 'Serba-serbi NodeJS', 'image' => 'https://ih1.redbubble.net/image.109336634.1604/flat,550x550,075,f.u1.jpg', 'instructor' => 'Putra', 'date' => '12-11-2012', 'progress' => 70, 'start_date' => '10/10/2010'],
            ['title' => 'A-Z Model Bisnis', 'image' => 'https://i.ytimg.com/vi/ORSZmfhVURo/maxresdefault.jpg', 'instructor' => 'Satria', 'date' => '12-12-2012', 'progress' => 70, 'start_date' => '10/10/2010'],
            ['title' => 'Lebih dalam tentang Model Pendapatan', 'image' => 'https://digitalmarketer.id/wp-content/uploads/2015/03/Model-Bisnis.jpg', 'instructor' => 'Adi', 'date' => '10-08-2012', 'progress' => 70, 'start_date' => '10/10/2010'],
            ['title' => 'Belajar Meningkatkan Profit', 'image' => 'https://inspiratorfreak.com/wp-content/uploads/2017/01/Untitled-1-copy.jpg', 'instructor' => 'Putra', 'date' => '12-11-2012', 'progress' => 70, 'start_date' => '10/10/2010']
        ];

        return view('profil.index', ['selected' => 'Profil', 'menu_selected' => 'Kelas Saya', 'user' => $user, 'classes' => $classes]);
    }

    function payment() {
        $user_photo = '';
        if(Session::has('user_photo')) $user_photo = Session::get('user_photo');

        $user = ['name' => Session::get('user_name'), 'image' => $user_photo];

        $classes = [
            ['title' => 'Belajar Gitar', 'status' => 0],
            ['title' => 'Piano, from zero to hero', 'status' => 0],
            ['title' => 'Pintar bermain drum', 'status' => 1],
            ['title' => '7 Hari Belajar GoLang', 'status' => 0],
            ['title' => 'NodeJS Sampai Jago', 'status' => 1],
            ['title' => 'Serba-serbi NodeJS', 'status' => 1],
            ['title' => 'A-Z Model Bisnis', 'status' => 1],
            ['title' => 'Lebih dalam tentang Model Pendapatan', 'status' => 0],
            ['title' => 'Belajar Meningkatkan Profit', 'status' => 0]
        ];

        return view('profil.payment', ['selected' => 'Profil', 'menu_selected' => 'Status Pembayaran', 'user' => $user, 'classes' => $classes]);
    }

    function edit() {
        $user_photo = '';
        if(Session::has('user_photo')) $user_photo = Session::get('user_photo');

        $user = [
            'name' => Session::get('user_name'), 
            'image' => $user_photo, 
            'biography' => Session::get('user_biography')
        ];

        return view('profil.edit', ['selected' => 'Profil', 'menu_selected' => 'Ubah Profil', 'user' => $user]);
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
