<?php
    use App\Menu;

    $profile_menus = Menu::getProfileMenu($user->tipe);
?>

<style media="screen">
  .user-image {
    margin-top: 20;
    width: 10em;
  }
</style>

<section class="col s3">
    <div class="row">
        <div class="col s12">
            <img class="user-image" src="{{ $user->poto_profil == '' ? asset('img/anonym.png') : $user->poto_profil }}" />
            <p class="user-name">{{ $user->nama }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <ul class="collection" id="profile-menus">
              @foreach($profile_menus as $menu)
                  <li class="collection-item">
                    <a href="{{ $menu['link'] }}" class="{{ $menu_selected == $menu['title'] ? 'selected' : '' }}">{{ $menu['title'] }}</a>
                  </li>
              @endforeach
            </ul>
        </div>
    </div>
</section>
