@include('templates.header')

<br>

<main class="container row">
    @include('templates.profile.sidebar')

    <section class="col s9">
        <div class="row">
            @foreach($user->kelas as $class)
                <div class="col s4">
                    <div class="card large">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ asset($class->foto) }}">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">{{ $class->nama }}</span>
                            <p>
                              <b>instructor</b> : {{ $class->instructor->nama }}
                            </p>
                            <p>
                              <b>Tanggal Mulai</b> : {{ $class->pivot->tanggal_mulai }}
                            </p>
                            <p>
                              <b>Status Pembayaran</b> : {{$class->pivot->status == 0 ? 'Belum Ada' : ($class->pivot->status == 1 ? 'Menunggu Konfirmasi' : ($class->pivot->status == 2 ? 'Berhasil dikonfirmasi' : 'Konfirmasi Ditolak'))}}
                            </p>
                            <p>
                              <b>Progress</b> : {{round($class->progress)}} %
                            </p>
                            <div class="card-action">
                              {{ Form::open(['url' => '/kelas/masuk']) }}
                                {{ Form::hidden('id_kelas_pelajar', $class->id_kelas_pelajar) }}
                                @if($class->pivot->status == 0)
                                  <a href="/profil/buktipembayaran" class="btn light-blue accent-2 waves-light waves-effect">Konfirmasi Pembayaran</a>
                                @else
                                  <button class="btn light-blue accent-2 waves-light waves-effect" type="submit" {{$class->pivot->status != 2 ? 'disabled' : ''}}>Masuk</button>
                                @endif
                              {{ Form::close() }}
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>

@include('templates.footer')
