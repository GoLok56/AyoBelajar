<?php
    use App\Menu;

    $profile_menus = Menu::getProfileMenu();
?>

<section class="flex column">
    <div class="flex row">
        <img class="user-image" src="{{ $user->poto_profil === '' ? asset('img/anonym.png') : $user->poto_profil }}" />
        <p class="user-name">{{ $user->nama }}</p>
    </div>

    <ul class="flex column" id="profile-menus">
        @foreach($profile_menus as $menu)
            <li><a href="{{ $menu['link'] }}" class="{{ $menu_selected == $menu['title'] ? 'selected' : '' }}">{{ $menu['title'] }}</a></li>
        @endforeach
    </ul>
</section>