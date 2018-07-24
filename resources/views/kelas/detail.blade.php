<div class="flex column">

@include('templates.header')

<main class="container flex column" id="class-detail">
    <section class="flex row">
        <img src="{{ asset($class->poto ) }}" />
        <div class="flex column">
            <div class="flex row">
                <div class="flex column">
                    <p class="class-name bold">{{ $class->nama }}</p>
                    <p id="class-price">Rp. {{ number_format($class->harga, 0, ',', '.') }}</p>
                </div>
                <button class="primary-background" id="ambil-kelas">Ambil Kelas</button>
            </div>
            <p class="class-desc">{{ $class->deskripsi }}</p>
        </div>
    </section>

    <h3 id="list-materi">List Materi</h3>

    <ul class="flex column" id="class-course">
        <?php $totalMateri = 0 ?>
        @foreach($class->materi as $course)
            <?php $totalMateri++ ?>
            <li class="flex row">
                <img src="{{ $course['image'] }}">
                <p>{{ $course->nama }}</p>
            </li>
        @endforeach

        @if($totalMateri === 0)
            <li class="flex row">
                <p>Belum ada materi</p>
            </li>
        @endif
    </ul>
</main>

@include('templates.footer')

</div>