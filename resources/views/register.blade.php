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
    

    <main class="flex column flex-1">
        {{ Form::open(['url' => 'register', 'class' => 'flex column']) }}
            <div class="flex row">
                {{ Form::label('nama', 'Nama') }}
                {{ Form::text('nama', '', ['id' => 'nama', 'placeholder' => 'John Doe']) }}
            </div>

            <div class="flex row">
                {{ Form::label('biografi', 'Biografi') }}
                {{ Form::textarea('biografi', '', ['id' => 'biografi', 'placeholder' => 'John Doe', 'cols' => '30', 'row' => '5']) }}
            </div>

            <div class="flex row">
                {{ Form::label('photo', 'Poto Profil') }}
                {{ Form::file('photo') }}
            </div>

            <div class="flex row">
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', '', ['placeholder' => 'example@email.com']) }}
            </div>

            <div class="flex row">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['placeholder' => '******']) }}
            </div>

            <div class="flex row">
                {{ Form::label('tipe', 'Tipe') }}
                {{ Form::radio('tipe', 'Pelajar', true) }} Pelajar
                {{ Form::radio('tipe', 'Pengajar', false) }} Pengajar
            </div>

            <input type="submit" value="Daftar" class="primary-background">
        {{ Form::close() }}
    </main>

@include('templates.footer')

</div>