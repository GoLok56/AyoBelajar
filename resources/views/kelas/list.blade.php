@include('templates.header')

<br>

<main class="container row">
    @include('templates.kelas.sidebar')

    <section class="col s9">
        <h5>{{ $category }}</h5>
        @if(sizeof($classes) === 0)
        <p>Tidak ditemukan</p>
        @endif
        @foreach($classes as $class)
        <div class="col s4">
            <div class="card small">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="{{ asset($class->foto) }}">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">{{ $class->nama }}
                        <i class="material-icons right">more_vert</i>
                    </span>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">{{ $class->nama }}
                        <i class="material-icons right">close</i>
                    </span>
                    <p>{{ $class->instructor->nama }}</p>
                    <p>Rp. {{ number_format($class->harga) }}</p>
                    <p>{{ $class->tanggal_dibuat }}</p>
                </div>
                <div class="card-action">
                    @if($category === session('userName'))
                    <a href="/kelas/materi/{{ $class->id_kelas }}" class="green-text">Tambah Materi</a>
                    @elseif($hapus && $class->id_pengguna === session('userId'))
                    <a href="/kelas/ubah/{{ $class->id_kelas }}" class="green-text">Ubah</a>
                    <a href="/kelas/hapus/{{ $class->id_kelas }}" class="green-text">Hapus</a>
                    @elseif(@hapus)
                    <a href="/kelas/{{ $class->id_kelas }}" class="green-text">Detail</a>
                    <a href="/kelas/hapus/{{ $class->id_kelas }}" class="green-text">Hapus</a>
                    @else
                    <a href="/kelas/{{ $class->id_kelas }}" class="green-text">Detail</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </section>
</main>

@include('templates.footer')
