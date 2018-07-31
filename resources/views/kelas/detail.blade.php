<div class="flex column">

@include('templates.header')

<main class="container flex column" id="class-detail">
    <section class="flex row">
        <img src="{{ asset($class->foto ) }}" />
        <div class="flex column">
            <div class="flex row">
                <div class="flex column">
                    <p class="class-name bold">{{ $class->nama }}</p>
                    <p id="class-price">Rp. {{ number_format($class->harga, 0, ',', '.') }}</p>
                </div>
                @if (!$user->has($class->id_kelas))
                    @if($user->tipe == 'Pelajar')
                      <a class="primary-text" href="/kelas/ambil/{{ $class->id_kelas }}">Ambil Kelas</a>
                    @endif
                @else
                    {{ Form::open(['url' => '/kelas/masuk']) }}
                      {{ Form::hidden('id_kelas_pelajar', $userKelas->id_kelas_pelajar) }}
                      @if($userKelas->status == 0)
                        <a href="/profil/buktipembayaran" class="btn light-blue accent-2 waves-light waves-effect">Konfirmasi Pembayaran</a>
                      @else
                        <button class="btn light-blue accent-2 waves-light waves-effect" type="submit" {{$userKelas->status != 2 ? 'disabled' : ''}}>Masuk</button>
                      @endif
                    {{ Form::close() }}
                @endif
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
                <img src="{{ asset($course['foto']) }}">
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
