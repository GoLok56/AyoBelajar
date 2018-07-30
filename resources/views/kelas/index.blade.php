@include('templates.header')

<br>

<main class="container row">
    @include('templates.kelas.sidebar')
    
    <section class="col s9">
        <?php $classList = 0; ?>
        @foreach($classes as $class)
            @if (sizeof($class['class']) > 0) 
                <?php $classList++; ?>
                <h5>{{ $class['category'] }}</h5>

                <div class="row">
                @foreach($class['class'] as $class_to_show)
                    <div class="col s4">
                        <div class="card small">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="{{ asset($class_to_show->foto) }}">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">{{ $class_to_show->nama }}<i class="material-icons right">more_vert</i></span>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">{{ $class_to_show->nama }}<i class="material-icons right">close</i></span>
                                <p>{{ $class_to_show->instructor->nama }}</p>
                                <p>Rp. {{ number_format($class_to_show->harga) }}</p>
                                <p>{{ $class_to_show->tanggal_dibuat }}</p>
                            </div>
                            <div class="card-action">
                                @if($hapus && $class_to_show->id_pengguna === session('userId'))
                                <a href="/kelas/ubah/{{ $class_to_show->id_kelas }}" class="green-text">Ubah</a>
                                <a href="/kelas/hapus/{{ $class_to_show->id_kelas }}" class="green-text">Hapus</a>
                                @elseif(@hapus)
                                <a href="/kelas/{{ $class_to_show->id_kelas }}" class="green-text">Detail</a>
                                <a href="/kelas/hapus/{{ $class_to_show->id_kelas }}" class="green-text">Hapus</a>
                                @else
                                <a href="/kelas/{{ $class_to_show->id_kelas }}" class="green-text">Detail</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <a href="{{ $class['link'] }}" class="btn waves-effect waves-light light-blue accent-2">More</a>
            @endif
        @endforeach

        @if($classList === 0)
            <p>Belum ada kelas</p>
        @endif 
    </section>
</main>

@include('templates.footer')

<script>
    $(document).ready(function() {
    })
</script>