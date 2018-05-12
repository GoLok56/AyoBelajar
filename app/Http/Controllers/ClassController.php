<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ClassController extends BaseController
{
    function index() {
        $categories = Kategori::all();
        
        $category_options = [];
        foreach ($categories as $category) {
            array_push($category_options, ['title' => $category->nama, 'link' => "/kelas/$category->nama"]);
        }
    
        $classes = [
            ['category' => 'Musik', 'link' => '#', 'class' => [
                ['title' => 'Belajar Gitar', 'image' => 'https://i2.wp.com/bukubiruku.com/wp-content/uploads/2016/10/gitar-chord-a.jpeg?resize=680%2C383&ssl=1', 'instructor' => 'Satria', 'date' => '12-12-2012'],
                ['title' => 'Piano, from zero to hero', 'image' => 'https://2.bp.blogspot.com/-PwXGW65h5Pc/VJak7OLNbAI/AAAAAAAAADI/0SC7R7I6uz4/s1600/Notasi%2BPiano.jpg', 'instructor' => 'Adi', 'date' => '10-08-2012'],
                ['title' => 'Pintar bermain drum', 'image' => 'http://4.bp.blogspot.com/-Dw-QtGrlYmk/TobiuuMBkVI/AAAAAAAABP8/-f3I8H6LTmU/s1600/Untitled.jpg', 'instructor' => 'Putra', 'date' => '12-11-2012']
            ]],
            ['category' => 'Teknologi', 'link' => '#', 'class' => [
                ['title' => '7 Hari Belajar GoLang', 'image' => 'https://cdn2.hubspot.net/hubfs/3917309/old-assets/old-theme/Images/golang-gopher-laptop.png', 'instructor' => 'Satria', 'date' => '12-12-2012'],
                ['title' => 'NodeJS Sampai Jago', 'image' => 'https://cdn.colorlib.com/wp/wp-content/uploads/sites/2/nodejs-frameworks.png', 'instructor' => 'Adi', 'date' => '10-08-2012'],
                ['title' => 'Serba-serbi NodeJS', 'image' => 'https://ih1.redbubble.net/image.109336634.1604/flat,550x550,075,f.u1.jpg', 'instructor' => 'Putra', 'date' => '12-11-2012']
            ]],
            ['category' => 'Bisnis', 'link' => '#', 'class' => [
                ['title' => 'A-Z Model Bisnis', 'image' => 'https://i.ytimg.com/vi/ORSZmfhVURo/maxresdefault.jpg', 'instructor' => 'Satria', 'date' => '12-12-2012'],
                ['title' => 'Lebih dalam tentang Model Pendapatan', 'image' => 'https://digitalmarketer.id/wp-content/uploads/2015/03/Model-Bisnis.jpg', 'instructor' => 'Adi', 'date' => '10-08-2012'],
                ['title' => 'Belajar Meningkatkan Profit', 'image' => 'https://inspiratorfreak.com/wp-content/uploads/2017/01/Untitled-1-copy.jpg', 'instructor' => 'Putra', 'date' => '12-11-2012']
            ]]
        ];

        return view('kelas.index', ['selected' => 'Kelas', 'classes' => $classes, 'category_options' => $category_options]);
    }

    function detail($id) {
        $class = [
            'title' => 'Belajar Gitar', 
            'image' => 'https://i2.wp.com/bukubiruku.com/wp-content/uploads/2016/10/gitar-chord-a.jpeg?resize=680%2C383&ssl=1', 
            'instructor' => 'Satria', 
            'date' => '12-12-2012',
            'price' => 20000,
            'desc' => 'Belajar gitar mudah dari ga bisa msampe bisa. Dan bisa langusng konser ke Rock Am Ring.',
            'courses' => [
                ['title' => 'Pengenalan Gitar', 'image' => 'https://static.bmdstatic.com/pk/product/medium/YAMAHA-Gitar-Klasik-GL1-Natural-SKU00413628-2016624111115.jpg'],
                ['title' => 'Pengenalan Gitar', 'image' => 'https://static.bmdstatic.com/pk/product/medium/YAMAHA-Gitar-Klasik-GL1-Natural-SKU00413628-2016624111115.jpg'],
                ['title' => 'Pengenalan Gitar', 'image' => 'https://static.bmdstatic.com/pk/product/medium/YAMAHA-Gitar-Klasik-GL1-Natural-SKU00413628-2016624111115.jpg'],
            ]
        ];
        return view('kelas.detail', ['selected' => 'Kelas', 'class' => $class]);
    }
}
