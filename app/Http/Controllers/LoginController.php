<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LoginController extends BaseController
{
    function index() {
        return view('login', ['selected' => 'Login']);
    }

    function login() {
        return view('kelas.detail', ['selected' => 'Kelas', 'class' => $class]);
    }
}
