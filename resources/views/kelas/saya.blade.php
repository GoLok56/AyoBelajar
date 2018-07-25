@include('templates.header')

<br>

<main class="container row">
    @include('templates.kelas.sidebar')

    <section class="col s9">
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
                    <a href="/kelas/{{ $class->id_kelas }}" class="green-text">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </section>
</main>

@include('templates.footer')