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
        {{ Form::open(['url' => '/kelas/materi', 'files' => true]) }}
            {{ csrf_field() }}
            {{ Form::hidden('id', $class->id_kelas) }}

            <div class="input-field">
                {{ Form::label('nama', 'Nama Kelas') }}
                {{ Form::text('nama', $class->nama, ['id' => 'nama', 'required' => true, 'disabled' => true]) }}
            </div>

            <div class="input-field">
                {{ Form::label('nama', 'Nama Materi') }}
                {{ Form::text('nama', '', ['id' => 'nama', 'required' => true]) }}
            </div>

            <div class="file-field input-field">
                <div class="btn green accent-3 waves-light waves-effect">
                    <span>Foto Materi</span>
                    {{ Form::file('photo') }}
                </div>

                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" required>
                </div>
            </div>

            <div class="file-field input-field">
                <div class="btn green accent-3 waves-light waves-effect">
                    <span>Video</span>
                    {{ Form::file('video') }}
                </div>

                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" required>
                </div>
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
