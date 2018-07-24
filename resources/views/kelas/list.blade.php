<div class="flex column">

@include('templates.header')
<style>
.wrap {
    flex-wrap: wrap;
}
</style>
<main class="container flex row" id="kelas">
    @include('templates.kelas.sidebar')
    
    <section class="flex-1">
        <ul class="flex row wrap" id="class-list">
            @foreach($classes as $class)
                <li class="flex-1 flex column class-card">
                    <a href="/kelas/{{ $class->id_kelas }}">
                        <div class="class-img-holder">
                            <img src="{{ asset($class->poto) }}" />
                        </div>
                        <p class="class-name bold">{{ $class->nama }}</p>
                        <p>{{ $class->instructor->nama }}</p>
                        <p class="light">{{ $class->tanggal_dibuat }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
</main>

@include('templates.footer')

</div>