<?php
    use App\Menu;

    if(Session::has('login')) {
        $menus = Menu::get(session('userType'));
    } else {
        $menus = [
            [ "title" => "Home", "link" => "/" ],
            [ "title" => "Login", "link" => "/login" ]
        ];
    }
?>

<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
<title>AyoBelajar</title>
</head>
<body>
    <header>
        <nav class="red ">
            <div class="nav-wrapper container">
                <a href="/" class="brand-logo">AyoBelajar</a>
                <ul class="right">
                    @foreach($menus as $menu)
                        <li class="{{ $selected == $menu['title'] ? 'active' : '' }}">
                            <a href="{{ $menu['link'] }}">
                                {{ $menu['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </header>