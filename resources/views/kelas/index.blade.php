<?php

    $sort_options = [
        ['title' => 'Yang Terbaru', 'link' => '#'],
        ['title' => 'Yang Terlama', 'link' => '#'],
        ['title' => 'Yang Termurah', 'link' => '#'],
        ['title' => 'Yang Termahal', 'link' => '#']
    ];

    $category_options = [
        ['title' => 'Musik', 'link' => '#'],
        ['title' => 'Teknologi', 'link' => '#'],
        ['title' => 'Bisnis', 'link' => '#']
    ];

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

?>

<div class="flex column">

@include('templates.header')

<main class="container flex row" id="kelas">
    <section class="flex column">
        <div class="flex row" id="search-box">
            <input type="text" name="search-query" id="search-query" />
            <button class="primary-background">Cari</button>
        </div>

        <div class="option">
            <h2 class="option-header primary-background">Urutkan</h2>
            <ul class="flex column">
                @foreach($sort_options as $option)
                    <li><a href="{{ $option['link'] }}">{{ $option['title'] }}</a></li>
                @endforeach
            </ul>
        </div>
        
        <div class="option">
            <h2 class="option-header primary-background">Kategori</h2>
            <ul class="flex column">
                @foreach($category_options as $option)
                    <li><a href="{{ $option['link'] }}">{{ $option['title'] }}</a></li>
                @endforeach
            </ul>      
        </div>
    </section>
    
    <section class="flex-1">
        <ul class="flex column" id="class-list">
            @foreach($classes as $class)
                <li class="flex column">
                    <div class="flex row class-header">
                        <h3 class="bold">{{ $class['category'] }}</h3>
                        <a href="{{ $class['link'] }}" class="class-more">More</a>
                    </div>

                    <ul class="flex row" id="class-cards">
                        @foreach($class['class'] as $class_to_show)
                            <li class="flex-1 flex column class-card">
                                <div class="class-img-holder">
                                    <img src="{{ $class_to_show['image'] }}" />
                                </div>
                                <p class="class-name bold">{{ $class_to_show['title'] }}</p>
                                <p>{{ $class_to_show['instructor'] }}</p>
                                <p class="light">{{ $class_to_show['date'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </section>
</main>

@include('templates.footer')

</div>