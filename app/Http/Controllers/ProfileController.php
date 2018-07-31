<?php

namespace App\Http\Controllers;

use App\Pengguna;
use App\KelasPelajar;
use App\BuktiPembayaran;
use App\MateriKelasPelajar;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends BaseController
{
    function index() {
        $user = Pengguna::where('id_pengguna', '=', session('userId'))->first();

        foreach($user->kelas as $class) {
          $kelasPelajar = KelasPelajar::where('id_pengguna',session('userId'))->where('id_kelas',$class->id_kelas)->first();
          if($kelasPelajar) {
            $progress = $this->progresMateri($kelasPelajar->id_kelas_pelajar);

            $class->progress = $progress;
            $class->id_kelas_pelajar = $kelasPelajar->id_kelas_pelajar;
          }
        }

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

        Pengguna::where('email', Session::get('userEmail'))
            ->update(['nama' => $data['nama'], 'biografi' => $data['biografi']]);
        Session::put('userName', $data['nama']);
        Session::put('userBiografi', $data['biografi']);

        return redirect('/profil/ubah');
    }

    function buktiPembayaran() {
      $user = Pengguna::where('id_pengguna', '=', session('userId'))->first();
      $users = $user;

      $userKelas = [];
      foreach ($user->kelas as $user) {
        $userKelas[$user->id_kelas] = $user->nama;
      }

      return view('profil.uploadBuktiPembayaran', [
          'selected' => 'Upload Bukti Pembayaran',
          'menu_selected' => 'Upload Bukti Pembayaran',
          'user' => $users,
          'user_kelas' => $userKelas
      ]);
    }

    function listBuktiPembayaran() {
      $userKelas = KelasPelajar::all();
      $user = Pengguna::where('id_pengguna', '=', session('userId'))->first();

      return view('profil.listBuktiPembayaran', [
          'selected' => 'List Bukti Pembayaran',
          'menu_selected' => 'Bukti Pembayaran',
          'user' => $user,
          'user_kelas' => $userKelas
      ]);
    }

    function simpanBuktiPembayaran(Request $req) {
      $data = $req->all();

      $dataKelas = KelasPelajar::where('id_pengguna', '=', session('userId'))
                  ->where('id_kelas',$data['kelas'])->first();

      if($dataKelas->status == 0) {

        $path = '';
        $file = $req->file('file');
        if($file !== null) {
            $path = $file->getClientOriginalName();
            $file->move('bukti_pembayaran/', $path);
        }

        BuktiPembayaran::create([
            'id_kelas_pelajar' => $dataKelas->id_kelas_pelajar,
            'file' => "bukti_pembayaran/$path"
        ]);

        $dataKelas->status = 1;

        $dataKelas->save();
      }

      return redirect('/profil');
    }

    function konfirmBuktiPembayaran(Request $req) {
      $data = $req->all();

      $dataKelas = KelasPelajar::find($data['id_kelas_pelajar']);

      if($data['konfirmasi'] == 'setuju') {
        $dataKelas->status = 2;
      }else{
        $dataKelas->status = 3;
      }

      $dataKelas->save();

      return redirect('/profil/buktipembayaran/list');
      dd($dataKelas);
    }

    function progresMateri($id_kelas_pelajar) {
      $jmlMateri = MateriKelasPelajar::where('id_kelas_pelajar',$id_kelas_pelajar)
      ->count();

      $progresSelesai = MateriKelasPelajar::where('id_kelas_pelajar',$id_kelas_pelajar)
      ->where('status', '1')
      ->count();

      if((!$jmlMateri) && (!$progresSelesai))
        return 0;

      return $progresSelesai / $jmlMateri * 100;
    }
}
