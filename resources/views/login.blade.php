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
        {{ Form::open(['url' => 'login', 'class' => 'flex column']) }}
            <div class="flex row">
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', '', ['placeholder' => 'example@email.com']) }}
            </div>
            <div class="flex row">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['placeholder' => '******']) }}
            </div>
            <a href="/register">Belum punya akun? Daftar disini!</a>
            <input type="submit" value="Login" class="primary-background">
            @if(session('error'))
            <p class='error'>{{ session('error') }}</p>
            @endif
        {{ Form::close() }}
    </main>

@include('templates.footer')

</div>