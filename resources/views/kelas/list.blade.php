<div class="flex column">

@include('templates.header')
<style>
.option-header{
    background: #00e640;
    border: 1px solid white;
    color: white;
}
.wrap {
    flex-wrap: wrap;
}
</style>
<main class="container flex row" id="kelas">
    <section class="flex column">
        <div class="flex row" id="search-box">
            <input type="text" name="search-query" id="search-query" />
            <button class="primary-background">Cari</button>
        </div>

        <div class="option flex column">
            <ul class="flex column">
                @foreach($teacher_options as $option)
                    <li><a href="{{ $option['link'] }}">{{ $option['title'] }}</a></li>
                @endforeach
            </ul>
            <h2 class="option-header">Kategori</h2>
            <ul class="flex column">
                @foreach($category_options as $option)
                    <li><a href="{{ $option['link'] }}">{{ $option['title'] }}</a></li>
                @endforeach
            </ul>      
        </div>
    </section>
    
    <section class="flex-1">
        <ul class="flex row wrap" id="class-list">
            @foreach($classes as $class)
                <li class="flex-1 flex column class-card">
                    <a href="{{ $class['link'] }}">
                        <div class="class-img-holder">
                            <img src="{{ asset($class['image']) }}" />
                        </div>
                        <p class="class-name bold">{{ $class['title'] }}</p>
                        <p>{{ $class['instructor'] }}</p>
                        <p class="light">{{ $class['date'] }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
</main>

@include('templates.footer')

</div>