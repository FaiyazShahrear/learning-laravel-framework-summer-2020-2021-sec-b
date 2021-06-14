<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        

        return view('home.index')
                 ->withId('12')
                 ->withName('xyz');
    }
}
