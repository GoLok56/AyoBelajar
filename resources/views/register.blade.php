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
        <form action="/register" class="flex column" method="post">
            <div class="flex row">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="John Doe" />
            </div>

            <div class="flex row">
                <label for="biografi">Biografi</label>
                <textarea name="biografi" id="biografi" cols="30" rows="5"></textarea>
            </div>

            <div class="flex row">
                <label for="photo">Poto Profil</label>
                <input type="file" name="photo" id="photo">
            </div>

            <div class="flex row">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="example@email.com" />
            </div>

            <div class="flex row">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="******" />
            </div>

            <div class="flex row">
                <label for="tipe">Tipe</label>
                <input type="radio" name="tipe" id="tipe1"> Pengajar
                <input type="radio" name="tipe" id="tipe2"> Pelajar
            </div>

            <input type="submit" value="Daftar" class="primary-background">
        </form>
    </main>

@include('templates.footer')

</div>