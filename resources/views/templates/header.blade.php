<?php
    $hasLogin = Session::has('login');
    if($hasLogin) {
        $menus = [
            [ "title" => "Home", "link" => "/" ],
            [ "title" => "Kelas", "link" => "/kelas" ],
            [ "title" => "Profil", "link" => "/profil" ]
        ];
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
<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet"> 
<title>AyoBelajar</title>
</head>
<body>
    <header>
        <div class="container flex row" id="header">
            <h1 class="bold"><a href="/">AyoBelajar</a></h1>
            <ul>
                @foreach($menus as $menu)
                    <li><a href="{{ $menu['link'] }}" class="{{ $selected == $menu['title'] ? 'selected' : '' }}">{{ $menu['title'] }}</a></li>
                @endforeach
            </ul>
        </div>
    </header>