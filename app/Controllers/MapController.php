<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MapController extends Controller
{
    public function index()
    {
        return view('map_view'); // Load the view
    }
}
