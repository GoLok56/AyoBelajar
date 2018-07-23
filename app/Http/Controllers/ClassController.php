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

        $category_options = [];
        $classes = [];
        foreach ($categories as $category) {
            array_push($category_options, [
                'title' => $category->nama, 
                'link' => "/kelas/kategori/$category->id_kategori"
            ]);

            $class = Kelas::where('id_kategori', '=', $category->id_kategori)
                ->limit(3)
                ->get();

            $item_class = [];
            foreach ($class as $item) {
                array_push($item_class, [
                    'title' => $item->nama, 
                    'image' => $item->poto, 
                    'instructor' => $item->instructor->nama, 
                    'date' => $item->tanggal_dibuat,
                    'link' => "/kelas/$item->id_kelas"
                ]);
            } 

            array_push($classes, [
                'category' => $category->nama, 
                'link' => "/kelas/kategori/$category->id_kategori", 
                "class" => $item_class
            ]);
        }

        return view('kelas.index', [
            'selected' => 'Kelas', 
            'classes' => $classes, 
            'category_options' => $category_options, 
            'teacher_options' => Menu::getTeacherOption($userType),
            'category_add' => Menu::getCategoryAdd($userType)
        ]);
    }

    function detail($id) {
        $class = Kelas::find($id);

        $kelas = [
            'title' => $class->nama, 
            'image' => $class->poto, 
            'instructor' => $class->instructor->nama, 
            'tanggal_dibuat' => $class->tanggal_dibuat,
            'price' => $class->harga,
            'desc' => $class->deskripsi,
            'courses' => [
                ['title' => 'Pengenalan Gitar', 'image' => 'https://static.bmdstatic.com/pk/product/medium/YAMAHA-Gitar-Klasik-GL1-Natural-SKU00413628-2016624111115.jpg'],
                ['title' => 'Pengenalan Gitar', 'image' => 'https://static.bmdstatic.com/pk/product/medium/YAMAHA-Gitar-Klasik-GL1-Natural-SKU00413628-2016624111115.jpg'],
                ['title' => 'Pengenalan Gitar', 'image' => 'https://static.bmdstatic.com/pk/product/medium/YAMAHA-Gitar-Klasik-GL1-Natural-SKU00413628-2016624111115.jpg'],
            ]
        ];
        return view('kelas.detail', ['selected' => 'Kelas', 'class' => $kelas]);
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
            'id_pengguna' => session('user_id'),
            'id_kategori' => $data['kategori']
        ]);
        return redirect('/kelas');
    }

    function kategori($category) {
        $classes = Kelas::where('id_kategori', '=', $category)->get();
        $categories = Kategori::all();

        $teacher_options = [];
        if (session('userType') == 'Pengajar' || session('userType') == 'Admin') {
            array_push($teacher_options,  ['title' =>'+ Tambah Kelas', 'link' => "/kelas/tambah"]);
        } 

        $category_options = [];
        foreach ($categories as $category) {
            array_push($category_options, ['title' => $category->nama, 'link' => "/kelas/kategori/$category->id_kategori"]);
        }

        $kelas = [];
        foreach ($classes as $class) {
            array_push($kelas, [
                'title' => $class->nama, 
                'image' => $class->poto, 
                'instructor' => $class->instructor->nama, 
                'date' => $class->tanggal_dibuat,
                'link' => "/kelas/$class->id_kelas"
            ]);
        } 

        return view('kelas.list', [
            'selected' => 'Kelas', 
            'classes' => $kelas, 
            'category_options' => $category_options, 
            'teacher_options' => $teacher_options
        ]);
    }
}
