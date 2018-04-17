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
        <form action="/login" class="flex column" method="post">
            <div class="flex row">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="example@email.com" />
            </div>
            <div class="flex row">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="******" />
            </div>
            <a href="/register">Belum punya akun? Daftar disini!</a>
            <input type="submit" value="Login" class="primary-background">
        </form>
    </main>

@include('templates.footer')

</div>