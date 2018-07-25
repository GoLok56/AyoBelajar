<section class="col s3">
    {{ Form::open(['url' => '/kelas/cari', 'method' => 'get']) }}
        <div class="row">
            <div class="col s12">
                <div class="input-field inline">
                    {{ Form::text('query') }}
                    {{ Form::label('query', 'Cari') }}
                </div>
                <button class="btn light-blue accent-2 waves-effect waves-light" type="submit"=>Cari</button>
            </div>
        </div>
    {{ Form::close() }}

    <div class="row">
        @if(sizeof($teacher_options) > 0)
        <div class="col s12">
            <h5>Pilihan</h5>
        </div>
        @endif
    </div>
    
    <div class="row">
        <div class="col s12">
            <ul class="collection">
                @foreach($teacher_options as $option)
                <li class="collection-item">
                    <a href="{{ $option['link'] }}">{{ $option['title'] }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <h5>Kategori</h5>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <ul class="collection">
                @foreach($categories as $category)
                <li class="collection-item">
                    <a href="/kelas/kategori/{{ $category->id_kategori }}">{{ $category->nama }}</a>
                </li>
                @endforeach @if($category_add)
                <li class="collection-item">
                    <a href="/kategori/tambah">+ Tambah Kategori</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</section>
