<?php

namespace App\Controllers;

class Generalmeds extends BaseController
{
    public function index(): string
    {
        return view('generalmeds');
    }
}
