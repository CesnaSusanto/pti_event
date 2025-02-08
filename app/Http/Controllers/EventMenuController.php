<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventMenuController extends Controller
{
    public function index(){
        return view('user.MenuEvent');
    }
}