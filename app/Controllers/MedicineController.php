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

        // Sending a GET request to the OpenFDA API and get the response in JSON format
        $response = file_get_contents($apiUrl);
        // Decode the JSON response into a PHP array
        $data = json_decode($response, true);

        // Returning the 'medicine_result' view, passing the API data and search term to display
        return view('medicine_result', ['data' => $data, 'searchTerm' => $searchTerm]);
    }
}
