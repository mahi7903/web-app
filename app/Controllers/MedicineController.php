<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MedicineController extends Controller
{
    public function index()
    {
        return view('medicine_search');
    }

    public function search()
    {
        $searchTerm = $this->request->getGet('medicine_name');
        $apiUrl = 'https://api.fda.gov/drug/label.json?search=' . urlencode($searchTerm);

        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        return view('medicine_result', ['data' => $data, 'searchTerm' => $searchTerm]);
    }
}
