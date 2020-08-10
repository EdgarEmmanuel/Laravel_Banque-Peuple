<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function getLogin(){
        return view('login');
    }

    public function getPageCni(){
        return view('admin.cni');
    }
}
