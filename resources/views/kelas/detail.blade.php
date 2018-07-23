<div class="flex column">

@include('templates.header')

<main class="container flex column" id="class-detail">
    <section class="flex row">
        <img src="{{ asset($class['image']) }}" />
        <div class="flex column">
            <div class="flex row">
                <div class="flex column">
                    <p class="class-name bold">{{ $class['title'] }}</p>
                    <p id="class-price">Rp. {{ number_format($class['price'], 0, ',', '.') }}</p>
                </div>
                <button class="primary-background" id="ambil-kelas">Ambil Kelas</button>
            </div>
            <p class="class-desc">{{ $class['desc'] }}</p>
        </div>
    </section>

    <h3 id="list-materi">List Materi</h3>

    <ul class="flex column" id="class-course">
        @foreach($class['courses'] as $course)
            <li class="flex row">
                <img src="{{ $course['image'] }}">
                <p>{{ $course['title'] }}</p>
            </li>
        @endforeach
    </ul>
</main>

@include('templates.footer')

</div>