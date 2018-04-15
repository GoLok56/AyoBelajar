<div class="flex column">

@include('templates.header')

<main class="flex row container flex-1">
    @include('templates.profile_sidebar')

    <section class="flex-1">
        <ul class="flex column">
            @foreach($classes as $class)
                <li class="flex row class-profile">
                    <img src="{{ $class['image'] }}">
                    <div class="flex column class-profile-desc">
                        <div class="flex row class-profile-header">
                            <p class="class-name bold">{{ $class['title'] }}</p>
                            <p>{{ $class['progress'] }}%</p>
                        </div>
                        <p>{{ $class['instructor'] }}</p>
                        <p>{{ $class['start_date'] }}</p>
                        <button class="primary-background class-profile-button">Masuk</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</main>

@include('templates.footer')

</div>