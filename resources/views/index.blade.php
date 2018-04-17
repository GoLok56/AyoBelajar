<?php
    if(Session::has('login')) {
        $started_link = '/kelas';
    } else {
        $started_link = '/login';
    }
?>

<div class="flex column">

@include('templates.header')

<main class="container flex column flex-1" id="home">
    <p class="quotes">"Study as if you were going to live forever. Live as if you were going to die tomorrow"</p>
    <a class="primary-background" href="{{ $started_link }}">Mulai Belajar</a>
</main>

@include('templates.footer')

</div>