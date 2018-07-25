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
        {{ Form::open() }}
            <div class="input-field">
                {{ Form::text('nama', '', ['id' => 'nama', 'required' => true]) }}
                {{ Form::label('nama', 'Nama') }}
            </div>

            <button id="tambah" class="btn light-blue accent-2 waves-effect waves-light white-text">Tambah</button>

            @if(session('error'))
            <p class='error'>{{ session('error') }}</p>
            @endif
        {{ Form::close() }}
    </div>
</main>

@include('templates.footer')

<script>
    $(document).ready(function() {
        $('#tambah').click(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/kategori/tambah',
                data: {
                    nama: $('#nama').val()
                },
                success: function(response) {
                    if (response.status === 200) {
                        window.location = '/'
                    } else {
                        $('#error').html(response.message)
                    }
                }
            })
        })

        $('form').submit(function(evt) {
            evt.preventDefault()
        })
    })
</script>