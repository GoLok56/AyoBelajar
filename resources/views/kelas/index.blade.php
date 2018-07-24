<div class="flex column">

@include('templates.header')

<main class="container flex row" id="kelas">
    @include('templates.kelas.sidebar');
    
    <section class="flex-1">
        <ul class="flex column" id="class-list">
            <?php $classList = 0; ?>
            @foreach($classes as $class)
                @if (sizeof($class['class']) > 0) 
                    <?php $classList++; ?>
                    <li class="flex column">
                        <div class="flex row class-header">
                            <h3 class="bold">{{ $class['category'] }}</h3>
                            <a href="{{ $class['link'] }}" class="class-more">More</a>
                        </div>

                        <ul class="flex row" id="class-cards">
                            @foreach($class['class'] as $class_to_show)
                                <li class="flex-1 flex column class-card">
                                    <a href="/kelas/{{ $class_to_show->id_kelas }}">
                                        <div class="class-img-holder">
                                            <img src="{{ asset($class_to_show->poto) }}" />
                                        </div>
                                        <p class="class-name bold">{{ $class_to_show->nama }}</p>
                                        <p>{{ $class_to_show->instructor->nama }}</p>
                                        <p class="light">{{ $class_to_show->tanggal_dibuat }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach

            @if($classList === 0)
                <p>Belum ada kelas</p>
            @endif 
        </ul>
    </section>
</main>

@include('templates.footer')

</div>