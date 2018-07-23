<div class="flex column">

@include('templates.header')
<style>
label { min-width:75px; }
main { align-items: center; }
main > form { margin: auto; }
main > form > * { margin-top: 8px; }
main > form > input { padding: 8px; }
main > form > input:hover { cursor: pointer; }
a { font-size: 0.75em; }
</style>
<main class="container flex row" id="kelas">
    {{ Form::open(['url' => 'kelas/tambah', 'class' => 'flex column', 'files' => true]) }}
        {{ csrf_field() }}
        <div class="flex row">
            {{ Form::label('nama', 'Nama') }}
            {{ Form::text('nama', '', ['id' => 'nama', 'placeholder' => 'Nama Kelas']) }}
        </div>

        <div class="flex row">
            {{ Form::label('deskripsi', 'Deskripsi') }}
            {{ Form::textarea('deskripsi', '', ['id' => 'deskripsi', 'placeholder' => 'Deskripsi', 'cols' => '30', 'row' => '5']) }}
        </div>

        <div class="flex row">
            {{ Form::label('harga', 'Harga') }}
            {{ Form::number('harga', '', ['id' => 'harga', 'placeholder' => '100000']) }}
        </div>

        <div class="flex row">
            {{ Form::label('photo', 'Poto Kelas') }}
            {{ Form::file('photo') }}
        </div>

        <div class="flex row">
            {{ Form::label('kategori', 'Kategori') }}
            {{ Form::select('kategori', $categories, '', ['id' => 'kategori']) }}
        </div>

        <input type="submit" value="Simpan" class="primary-background">
    {{ Form::close() }}
</main>

@include('templates.footer')

</div>