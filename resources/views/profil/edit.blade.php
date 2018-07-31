@include('templates.header')

<br>

<main class="container row">
    @include('templates.profile.sidebar')

    <section class="col s9">
        <div class="row">
          {{ Form::open(['url' => 'profil/simpan']) }}
              <div class="input-field">
                  {{ Form::label('nama', 'Nama') }}
                  {{ Form::text('nama', $user->nama, ['id' => 'nama', 'placeholder' => 'John Doe']) }}
              </div>

              <div class="input-field">
                  {{ Form::label('biografi', 'Biografi') }}
                  {{ Form::textarea('biografi', $user->biografi, ['id' => 'biografi', 'class' => 'materialize-textarea', 'placeholder' => 'John Doe', 'cols' => '30', 'row' => '5']) }}
              </div>
              <input type="submit" value="Simpan" id="submit-profile" class="primary-background">
          {{ Form::close() }}
        </div>
    </section>
</main>

@include('templates.footer')

</div>
