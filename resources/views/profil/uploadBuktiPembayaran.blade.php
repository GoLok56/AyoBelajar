@include('templates.header')

<br>

<main class="container row">
    @include('templates.profile.sidebar', ['menu_selected' => 'Upload Bukti Pembayaran'])

    <section class="col s9">
        <div class="row">
          {{ Form::open(['url' => 'profil/buktipembayaran', 'files' => true]) }}
              <div class="input-field">
                {{ Form::select('kelas', $user_kelas, '', ['id' => 'kategori']) }}
                {{ Form::label('kelas', 'Kelas') }}
              </div>
              <div class="file-field input-field">
                  <div class="btn green accent-3 waves-light waves-effect">
                      <span>Foto Bukti Pembayaran</span>
                      {{ Form::file('file') }}
                  </div>

                  <div class="file-path-wrapper">
                      <input class="file-path validate" type="text">
                  </div>
              </div>
              <button class="btn light-blue accent-2 waves-light waves-effect" type="submit">Simpan</button>
          {{ Form::close() }}
        </div>
    </section>
</main>

@include('templates.footer')

</div>
<script>
    $(document).ready(function() {
        $('select').formSelect()
    })
</script>
