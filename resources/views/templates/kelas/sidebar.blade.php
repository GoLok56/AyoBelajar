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
            @foreach($categories as $category)
                <li><a href="/kelas/kategori/{{ $category->id_kategori }}">{{ $category->nama }}</a></li>
            @endforeach
            @if($category_add)
                <li><a href="/kategori/tambah">+ Tambah Kategori</a></li>
            @endif
        </ul>      
    </div>
</section>