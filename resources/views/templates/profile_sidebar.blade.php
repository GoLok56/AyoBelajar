<?php
    $profile_menus = [
        ['title' => 'Kelas Saya', 'link' => '/profil'],
        ['title' => 'Status Pembayaran', 'link' => '/profil/pembayaran'],
        ['title' => 'Ubah Profil', 'link' => '/profil/ubah'],
    ]
?>

<section class="flex column">
    <div class="flex row">
        <img class="user-image" src="{{ $user['image'] }}" />
        <p class="user-name">{{ $user['name'] }}</p>
    </div>

    <ul class="flex column" id="profile-menus">
        @foreach($profile_menus as $menu)
            <li><a href="{{ $menu['link'] }}" class="{{ $menu_selected == $menu['title'] ? 'selected' : '' }}">{{ $menu['title'] }}</a></li>
        @endforeach
    </ul>
</section>