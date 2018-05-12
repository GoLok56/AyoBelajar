<div class="flex column">

@include('templates.header')
<style>
.option-header{
    background: #00e640;
    border: 1px solid white;
    color: white;
}
</style>
<main class="container flex row" id="kelas">
    <section class="flex column">
        <div class="flex row" id="search-box">
            <input type="text" name="search-query" id="search-query" />
            <button class="primary-background">Cari</button>
        </div>

        <div class="option">
            <h2 class="option-header">Kategori</h2>
            <ul class="flex column">
                @foreach($category_options as $option)
                    <li><a href="{{ $option['link'] }}">{{ $option['title'] }}</a></li>
                @endforeach
            </ul>      
        </div>
    </section>
    
    <section class="flex-1">
        <ul class="flex column" id="class-list">
            @foreach($classes as $class)
                <li class="flex column">
                    <div class="flex row class-header">
                        <h3 class="bold">{{ $class['category'] }}</h3>
                        <a href="{{ $class['link'] }}" class="class-more">More</a>
                    </div>

                    <ul class="flex row" id="class-cards">
                        @foreach($class['class'] as $class_to_show)
                            <li class="flex-1 flex column class-card">
                                <div class="class-img-holder">
                                    <img src="{{ $class_to_show['image'] }}" />
                                </div>
                                <p class="class-name bold">{{ $class_to_show['title'] }}</p>
                                <p>{{ $class_to_show['instructor'] }}</p>
                                <p class="light">{{ $class_to_show['date'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </section>
</main>

@include('templates.footer')

</div>