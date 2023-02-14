<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        //di('dsadsad'); exit;
        return view('welcome_message');
    }
}
