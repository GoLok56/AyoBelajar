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
        {{ Form::open(['files' => true]) }}
            {{ csrf_field() }}
            <div class="input-field">
                {{ Form::label('nama', 'Nama') }}
                {{ Form::text('nama', '', ['id' => 'nama', 'required' => true]) }}
            </div>

            <div class="input-field">
                {{ Form::label('biografi', 'Biografi') }}
                {{ Form::textarea('biografi', '', ['id' => 'biografi', 'class' => 'materialize-textarea', 'required' => true]) }}
            </div>

            <div class="file-field input-field">
                <div class="btn green accent-3 waves-light waves-effect">
                    <span>Foto Profil</span>
                    {{ Form::file('photo', ['id' => 'photo']) }}
                </div>

                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>

            <div class="input-field">
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', '', ['required' => true, 'id' => 'email']) }}
            </div>

            <div class="input-field">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['required' => true, 'id' => 'password']) }}
            </div>

            {{ Form::label('tipe', 'Tipe') }}
            <p>
                <label>
                    {{ Form::radio('tipe', 'Pelajar', true) }}
                    <span>Pelajar</span>
                </label>
            </p>
            <p>
                <label>
                    {{ Form::radio('tipe', 'Pengajar', false) }}
                    <span>Pengajar</span>
                </label>
            </p>

            <button class="btn light-blue accent-2 waves-light waves-effect" id="daftar" type="submit">Daftar</button>
        {{ Form::close() }}
    </div>
</main>

@include('templates.footer')
