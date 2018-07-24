<?php

namespace App\Http\Controllers;

use Storage;
use App\Kategori;
use App\Kelas;
use App\Pengguna;
use App\Menu;
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
                ->limit(3)
                ->get();

            array_push($classes, [
                'category' => $category->nama, 
                'link' => "/kelas/kategori/$category->id_kategori", 
                "class" => $class
            ]);
        }

        return view('kelas.index', [
            'selected' => 'Kelas', 
            'classes' => $classes, 
            'categories' => $categories, 
            'teacher_options' => Menu::getTeacherOption($userType),
            'category_add' => Menu::getCategoryAdd($userType)
        ]);
    }

    function detail($id) {
        $class = Kelas::find($id);

        return view('kelas.detail', ['selected' => 'Kelas', 'class' => $class]);
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
            'poto' => "photos/$path",
            'harga' => $data['harga'],
            'tanggal_dibuat' => $created,
            'id_pengguna' => session('userId'),
            'id_kategori' => $data['kategori']
        ]);
        return redirect('/kelas');
    }

    function kategori($category) {
        $classes = Kelas::where('id_kategori', '=', $category)->get();
        $categories = Kategori::all();
        $userType = session('userType');

        return view('kelas.list', [
            'selected' => 'Kelas', 
            'classes' => $classes, 
            'categories' => $categories, 
            'teacher_options' => Menu::getTeacherOption($userType),
            'category_add' => Menu::getCategoryAdd($userType)
        ]);
    }

    function kelasSaya() {
        $classes = Kelas::where('id_pengguna', '=', session('userId'))->get();
        $categories = Kategori::all();
        $userType = session('userType');

        return view('kelas.list', [
            'selected' => 'Kelas', 
            'classes' => $classes, 
            'categories' => $categories, 
            'teacher_options' => Menu::getTeacherOption($userType),
            'category_add' => Menu::getCategoryAdd($userType)
        ]);
    }
}
