<?php
    if(Session::has('login')) {
        $started_link = '/kelas';
    } else {
        $started_link = '/login';
    }
?>

@include('templates.header')

<div class="parallax-container valign-wrapper">
    <div class="container center">
        <h5 class="white-text">"Study as if you were going to live forever. Live as if you were going to die tomorrow"</h5>
        <a class="btn waves-effect waves-light light-blue accent-2" href="{{ $started_link }}">Mulai Belajar</a>
    </div>
    <div class="parallax"><img src="{{ asset('img/parallax.jpg') }}"></div>
</div>

<main class="container" id="home">
    <div class="section">
        <div class="row">
            <div class="col m4">
                <div class="icon-block">
                    <h2 class="center red-text">
                        <i class="material-icons medium">featured_video</i>
                    </h2>
                    <h5 class="center">Belajar Lewat Video</h5>

                    <p class="light">
                        Bosan dengan membaca materi? Tambah ilmumu dengan membaca lebih banyak lagi.
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center red-text">
                        <i class="material-icons medium">computer</i>
                    </h2>
                    <h5 class="center">Dimana saja</h5>

                    <p class="light">
                        Belajar ilmu-ilmu baru tanpa harus ke tempat kursus. Lakukan dengan komputer personalmu.
                    </p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center red-text">
                        <i class="material-icons medium">people</i>
                    </h2>
                    <h5 class="center">Berbagi</h5>

                    <p class="light">
                        Bagikan ilmu yang kamu miliki. Dapatkan bayaran sesuai yang diinginkan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>

@include('templates.footer')

<script>
    $(document).ready(function() {
        $('.parallax').parallax()
    })
</script>