<div class="flex column">

@include('templates.header')

<main class="container flex row flex-1">
    @include('templates.profile_sidebar')

    <section id="form-profile">
        <form action="/profil/simpan" method="post" class="flex column">
            <div class="flex row">
                <label for="name">Nama</label>
                <input type="text" name="name" id="form-name" value="{{ $user['name'] }}" />
            </div>

            <div class="flex row">
                <label for="biograpi">Biograpi</label>
                <textarea name="biograpi" id="form-bio" cols="30" rows="10">{{ $user['biography'] }}</textarea>
            </div>

            <div class="flex row">
                <label for="oldpass">Password Lama</label>
                <input type="password" name="oldpass" id="form-oldpass" />
            </div>

            <div class="flex row">
                <label for="newpass">Password Baru</label>
                <input type="password" name="newpass" id="form-newpass" />
            </div>

            <div class="flex row">
                <label for="newpassconfirm">Konfirmasi Password Baru</label>
                <input type="password" name="newpassconfirm" id="form-newpassconfirm" />
            </div>

            <input type="submit" value="Simpan" id="submit-profile" class="primary-background">
        </form>
    </section>
</main>

@include('templates.footer')

</div>