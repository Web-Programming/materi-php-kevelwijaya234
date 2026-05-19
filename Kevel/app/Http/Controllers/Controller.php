<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    //
}

// Ambil data user yang sedang login
$user = Auth::user(); // objek User
$userId = Auth::id(); // hanya ID-nya
$isLogin = Auth::check(); // true/false