<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('common/header');
        echo view('home');
        echo view('common/footer');
    }
}
