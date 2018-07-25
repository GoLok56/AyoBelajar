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
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', '', ['id' => 'email', 'required' => true]) }}
            </div>
            <div class="input-field">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['id' => 'password', 'required' => true]) }}
            </div>
            <p><a href="/register" class="green-text">Belum punya akun? Daftar disini!</a></p>
            <button class="btn light-blue accent-2 waves-light waves-effect" id="login">Login</button>
            <p class='red-text' id="error"></p>
        {{ Form::close() }}
    </div>
</main>

@include('templates.footer')

<script>
    $(document).ready(function() {
        $('#login').click(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/login',
                data: {
                    email: $('#email').val(),
                    password: $('#password').val()
                },
                success: function(response) {
                    if (response.status === 200) {
                        window.location = '/kelas'
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
