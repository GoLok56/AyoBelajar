<div class="flex column">

@include('templates.header')

<main class="flex row container flex-1">
    @include('templates.profile.sidebar')

    <section class="flex-1">
        <ul class="flex column">
            @foreach($user->kelas as $class)
                <li class="flex row class-profile">
                    <img src="{{ $class->poto }}">
                    <div class="flex column class-profile-desc">
                        <div class="flex row class-profile-header">
                            <p class="class-name bold">{{ $class->nama }}</p>
                            <p>80%</p>
                        </div>
                        <p>{{ $class->instructor->nama }}</p>
                        <p>{{ $class->tanggal_mulai }}</p>
                        <button class="primary-background class-profile-button">Masuk</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</main>

@include('templates.footer')

</div>