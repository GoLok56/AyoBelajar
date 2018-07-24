<?php

namespace App;

class Menu {
    public static function get($userType) {
        if ($userType === 'Admin') {
            return [
                [ "title" => "Home", "link" => "/" ],
                [ "title" => "Kelas", "link" => "/kelas" ],
                [ "title" => "Profil", "link" => "/profil" ],
                [ "title" => "Backup", "link" => "/admin/backup" ],
                [ "title" => "Restore", "link" => "/admin/restore" ],
                [ "title" => "Logout", "link" => "/logout"]
            ];
        } else {
            return [
                [ "title" => "Home", "link" => "/" ],
                [ "title" => "Kelas", "link" => "/kelas" ],
                [ "title" => "Profil", "link" => "/profil" ],
                [ "title" => "Logout", "link" => "/logout"]
            ];
        }
    }

    public static function getTeacherOption($userType) {
        if ($userType === 'Pengajar' || $userType === 'Admin') { 
            return [
                [ 
                    'title' => '+ Tambah Kelas', 
                    'link' => "/kelas/tambah"
                ],
                [
                    'title' => 'Kelas Saya',
                    'link' => '/kelas/saya'
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