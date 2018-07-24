<div class="flex column">

@include('templates.header')

<main class="container flex row flex-1">
    @include('templates.profile.sidebar', ['menu_selected' => 'Status Pembayaran'])
    
    <section class="flex-1">
        <ul class="flex column">
            @foreach($user->kelas as $class)
                <li class="flex column status">
                    <p class="class-name bold">{{ $class->nama }}</p>
                    @if($class->status === 0)
                        <p>Belum Dibayar</p>
                        <button class="primary-background">Konfirmasi</button>
                    @else
                        <p>Lunas</p>
                    @endif
                </li>
            @endforeach
        </ul>
    </section>
</main>

@include('templates.footer')

</div>