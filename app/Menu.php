<?php

namespace App;

class Menu {
    public static function get($userType) {

    }

    public static function getTeacherOption($userType) {
        if ($userType === 'Pengajar' || $userType === 'Admin') { 
            return [
                [ 
                    'title' => '+ Tambah Kelas', 
                    'link' => "/kelas/tambah"
                ]
            ];
        }

        return [];
    }

    public static function getCategoryAdd($userType) {
        if ($userType === 'Admin') {
            return true;
        }

        return [];
    }
}