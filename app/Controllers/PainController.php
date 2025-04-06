<?php
namespace App\Controllers;
use App\Models\MedicineModel;
use CodeIgniter\Controller;

class PainController extends BaseController
{
    public function index()
    {   
        // Getting the selected sort option from the query string (default is 'name')
        $sort = $this->request->getGet('sort_by') ?? 'name';
        // Creating a new instance of the MedicineModel
        $model = new MedicineModel();
        // Fetching 12 medicines
        $meds = $model->orderBy($sort, 'ASC')->limit(12)->findAll();
        // Returning the view with the fetched medicines and selected sort option
        return view('Pain', [
            'meds' => $meds,
            'sort_by' => $sort
        ]);
    }
    // This function is handling the search logic from the user input
    public function search()
    {
        helper('text');

        $request = service('request');

        // Grabbing user input from the GET request
        $name = $request->getGet('medicine_name');
        $sideEffect = $request->getGet('side_effect');
        $purpose = $request->getGet('purpose');


        // Creating a new instance of the MedicineModel
        $model = new MedicineModel();

        // Starting a query to search for medicines by name
        $query = $model->like('name', $name);
        if ($sideEffect) $query->like('side_effects', $sideEffect);
        if ($purpose) $query->like('purpose', $purpose);

        // Getting all matching medicines from the database
        $meds = $query->findAll();


        // If medicines are found locally, displaying them in the PainResult view
        if (!empty($meds)) {
            return view('PainResult', ['meds' => $meds, 'source' => 'db']);
        }


        // If not found in DB, trying to fetch from OpenFDA API using these fields
        $fields = ['openfda.brand_name', 'openfda.generic_name', 'openfda.substance_name', 'description'];
        $data = [];


        // Looping through each field to try and find matches in the OpenFDA API
        foreach ($fields as $field) {
            $url = 'https://api.fda.gov/drug/label.json?limit=10&search=' . $field . ':' . urlencode($name);
            $response = @file_get_contents($url);
            $data = json_decode($response, true);
            if (!empty($data['results'])) break;
        }



        // If API has returned results, formatting them for display
        $apiMeds = [];
        if (!empty($data['results'])) {
            foreach ($data['results'] as $item) {
                $imagePath = FCPATH . 'images/' . strtolower($name) . '.jpg';



                // Creating a new array of medicine data from API
                $apiMeds[] = [
                    'name'         => strtoupper($name),
                    'purpose'      => $item['purpose'][0] ?? 'No purpose info available',
                    'side_effects' => $item['adverse_reactions'][0] ?? 'No side effects info',
                    'image_url'    => file_exists($imagePath)
                        ? '/images/' . strtolower($name) . '.jpg'
                        : base_url('images/no-image.jpg')
                ];
            }
        }


        // Returning the view with the API results if found
        return view('PainResult', ['apiMeds' => $apiMeds, 'searched' => $name, 'source' => 'api']);
    }

    public function save()
    {
        $model = new MedicineModel();
        $data = [
            'name'         => $this->request->getPost('name'),
            'purpose'      => $this->request->getPost('purpose'),
            'side_effects' => $this->request->getPost('side_effects'),
            'image_url'    => $this->request->getPost('image_url')
        ];



        // Inserting the data into the database and redirecting back with a success or error message
        if ($model->insert($data)) {
            return redirect()->to('/pain')->with('success', 'Medicine saved to pharmacy!');
        } else {
            return redirect()->to('/pain')->with('error', 'Failed to save medicine.');
        }
    }
}
