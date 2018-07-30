<style>
body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
}

main {
    flex: 1 0 auto;
}  
</style>

@include('templates.header')

<main class="valign-wrapper">
    <div class="container">
        {{ Form::open(['url' => '/kelas/ubah', 'files' => true]) }}
            {{ csrf_field() }}
            {{ Form::hidden('id', $class->id_kelas) }}

            <div class="input-field">
                {{ Form::label('nama', 'Nama') }}
                {{ Form::text('nama', $class->nama, ['id' => 'nama', 'required' => true]) }}
            </div>

            <div class="input-field">
                {{ Form::label('deskripsi', 'Deskripsi') }}
                {{ Form::textarea('deskripsi', $class->deskripsi, ['id' => 'deskripsi', 'class' => 'materialize-textarea', 'required' => true]) }}
            </div>

            <div class="input-field">
                {{ Form::label('harga', 'Harga') }}
                {{ Form::number('harga', $class->harga, ['id' => 'harga', 'required' => true]) }}
            </div>

            <div class="file-field input-field">
                <div class="btn green accent-3 waves-light waves-effect">
                    <span>Foto Kelas</span>
                    {{ Form::file('photo') }}
                </div>

                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>

            <div class="input-field">
                {{ Form::select('kategori', $categories, '', ['id' => 'kategori']) }}
                {{ Form::label('kategori', 'Kategori') }}
            </div>

            <button class="btn light-blue accent-2 waves-light waves-effect" type="submit">Simpan</button>
        {{ Form::close() }}
    </div>
</main>

@include('templates.footer')

<script>
    $(document).ready(function() {
        $('select').formSelect()
    })
</script>