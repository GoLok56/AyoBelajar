<div class="flex column">

@include('templates.header')

<main class="container flex row flex-1">
    @include('templates.profile_sidebar')

    <section id="form-profile">
        {{ Form::open(['url' => 'profil/simpan', 'class' => 'flex column']) }}
            <div class="flex row"> 
                {{ Form::label('nama', 'Nama') }}
                {{ Form::text('nama', $user['name'], ['id' => 'nama', 'placeholder' => 'John Doe']) }} 
            </div>

            <div class="flex row">
                {{ Form::label('biografi', 'Biografi') }}
                {{ Form::textarea('biografi', $user['biography'], ['id' => 'biografi', 'placeholder' => 'John Doe', 'cols' => '30', 'row' => '5']) }}
            </div>
            <input type="submit" value="Simpan" id="submit-profile" class="primary-background">
        {{ Form::close() }}
    </section>
</main>

@include('templates.footer')

</div>