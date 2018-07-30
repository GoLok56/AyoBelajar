<?php

namespace App\Http\Controllers;

use Storage;
use App\Kategori;
use App\Kelas;
use App\Pengguna;
use App\Menu;
use App\KelasPelajar;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ClassController extends BaseController
{
    function index() {
        $categories = Kategori::all();
        $userType = session('userType');

        $classes = [];  
        foreach ($categories as $category) {
            $class = Kelas::where('id_kategori', '=', $category->id_kategori)
                ->orderBy('id_kelas', 'desc')
                ->limit(3)
                ->get();

            array_push($classes, [
                'category' => $category->nama, 
                'link' => "/kelas/kategori/$category->id_kategori", 
                "class" => $class
            ]);
        }

        $hapus = $userType === 'Admin';

        return view('kelas.index', [
            'selected' => 'Kelas', 
            'classes' => $classes,
            'hapus' => $hapus,
            'categories' => $categories, 
            'teacher_options' => Menu::getTeacherOption($userType),
            'category_add' => Menu::getCategoryAdd($userType)
        ]);
    }

    function detail($id) {
        $class = Kelas::find($id);
        $user = Pengguna::find(session('userId'));
        
        return view('kelas.detail', ['selected' => 'Kelas', 'class' => $class, 'user' => $user]);
    }

    function form() {
        $categories = Kategori::all();

        $kategori = [];
        foreach ($categories as $category) {
            $kategori[$category->id_kategori] = $category->nama;
        }

        return view('kelas.form', [
            'selected' => 'Kelas', 
            'categories' => $kategori
        ]);
    }

    function tambah(Request $req) {
        $data = $req->all();

        $path = '';
        $file = $req->file('photo');
        if($file !== null){ 
            $path = $file->getClientOriginalName();
            $file->move('photos/', $path);
        }

        $today = getdate();
        $created = "$today[year]/$today[mon]/$today[mday]";

        Kelas::create([
            'nama' => $data['nama'],
            'deskripsi' => $data['deskripsi'],
            'foto' => "photos/$path",
            'harga' => $data['harga'],
            'tanggal_dibuat' => $created,
            'id_pengguna' => session('userId'),
            'id_kategori' => $data['kategori']
        ]);
        return redirect('/kelas');
    }

    function kategori($category) {
        $classes = Kelas::where('id_kategori', '=', $category)
                ->orderBy('id_kelas', 'desc')        
                ->get();
        $categories = Kategori::all();
        $category = Kategori::find($category);
        $userType = session('userType');

        $hapus = $userType === 'Admin';

        return view('kelas.list', [
            'selected' => 'Kelas', 
            'classes' => $classes, 
            'categories' => $categories,
            'hapus' => $hapus,
            'category' => $category->nama, 
            'teacher_options' => Menu::getTeacherOption($userType),
            'category_add' => Menu::getCategoryAdd($userType)
        ]);
    }

    function kelasSaya() {
        $categories = Kategori::all();
        $userType = session('userType');

        $classes = [];  
        foreach ($categories as $category) {
            $class = Kelas::where('id_kategori', '=', $category->id_kategori)
                ->where('id_pengguna', '=', session('userId'))
                ->orderBy('id_kelas', 'desc')
                ->limit(3)
                ->get();

            array_push($classes, [
                'category' => $category->nama, 
                'link' => "/kelas/kategori/saya/$category->id_kategori", 
                "class" => $class
            ]);
        }

        return view('kelas.index', [
            'selected' => 'Kelas', 
            'classes' => $classes,
            'hapus' => true,
            'categories' => $categories, 
            'teacher_options' => Menu::getTeacherOption($userType),
            'category_add' => Menu::getCategoryAdd($userType)
        ]);
    }

    function kelasSayaCategory($category) {
        $classes = Kelas::where('id_kategori', '=', $category)
                ->where('id_pengguna', '=', session('userId'))
                ->orderBy('id_kelas', 'desc')        
                ->get();
        $categories = Kategori::all();
        $category = Kategori::find($category);
        $userType = session('userType');

        return view('kelas.list', [
            'selected' => 'Kelas', 
            'classes' => $classes, 
            'categories' => $categories,
            'hapus' => true,
            'category' => $category->nama, 
            'teacher_options' => Menu::getTeacherOption($userType),
            'category_add' => Menu::getCategoryAdd($userType)
        ]);
    }

    function ambil($id) {
        $today = getdate();
        $created = "$today[year]/$today[mon]/$today[mday]";

        KelasPelajar::create([
            "id_pengguna" => session('userId'),
            "id_kelas" => $id,
            "tanggal_mulai" => $created,
            "status" => 0
        ]);

        return redirect('/kelas/' . $id);
    }

    function hapus($id) {
        Kelas::destroy($id);

        return redirect('/kelas/');
    }

    function cari(Request $req) {
        $classes = Kelas::where('nama', 'LIKE', '%' . $req->input('query') . '%')->get();
        $categories = Kategori::all();
        $userType = session('userType');

        return view('kelas.list', [
            'selected' => 'Kelas', 
            'classes' => $classes, 
            'categories' => $categories,
            'hapus' => true,
            'category' => 'Query pencarian: ' . $req->input('query'), 
            'teacher_options' => Menu::getTeacherOption($userType),
            'category_add' => Menu::getCategoryAdd($userType)
        ]);
    }

    function ubah($id) {
        $categories = Kategori::all();
        $class = Kelas::find($id);

        $kategori = [];
        foreach ($categories as $category) {
            $kategori[$category->id_kategori] = $category->nama;
        }

        return view('kelas.ubah', [
            'selected' => 'Kelas', 
            'categories' => $kategori,
            'class' => $class
        ]);
    }

    function update(Request $req) {
        $data = $req->all();

        $path = '';
        $file = $req->file('photo');
        if($file !== null){ 
            $path = $file->getClientOriginalName();
            $file->move('photos/', $path);
            Kelas::find($data['id'])
                ->update([
                    'nama' => $data['nama'],
                    'deskripsi' => $data['deskripsi'],
                    'foto' => "photos/$path",
                    'harga' => $data['harga'],
                    'id_kategori' => $data['kategori']
                ]);
        } else {
            Kelas::find($data['id'])
                ->update([
                    'nama' => $data['nama'],
                    'deskripsi' => $data['deskripsi'],
                    'harga' => $data['harga'],
                    'id_kategori' => $data['kategori']
                ]);
        }

        return redirect('/kelas');
    }

    function materi() {
        $classes = Kelas::where('id_pengguna', '=', session('userId'))
                ->orderBy('id_kelas', 'desc')
                ->get();
        $categories = Kategori::all();
        $userType = session('userType');

        return view('kelas.list', [
            'selected' => 'Kelas', 
            'classes' => $classes, 
            'categories' => $categories,
            'hapus' => false,
            'category' => session('userName'), 
            'teacher_options' => Menu::getTeacherOption($userType),
            'category_add' => Menu::getCategoryAdd($userType)
        ]);
    }

    function formTambahMateri($id) {
        $class = Kelas::find($id);
        return view('kelas.formMateri', [
            'selected' => 'Kelas',
            'class' => $class
        ]);
    }
}
